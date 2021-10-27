// API host name
const hostName = 'http://tw071273p/cq-warroom/'
let qs = Qs
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded'

// dom
const navBar = document.querySelector('.navbar-nav'),
    rateValue = document.querySelector('.rate-value')
// Value Default
let buSelected = 'TV'
// Date
const today = new Date()
const yearCurrent = today.getFullYear()
const monthCurrent = today.getDate() < 5 ? today.getMonth() : today.getMonth() + 1
console.log(monthCurrent)
// Object
const bu = ['TV', 'CE', 'IAVM', 'MONITOR', 'MP', 'NB', 'TABLET', 'AA']
const greenLamp = [
    '1/2',
    '1/3',
    '1/4',
    '1/5',
    '1/6',
    '1/7',
    '1/8',
    '2/4',
    '2/5',
    '2/6',
    '2/7',
    '2/8',
    '3/7',
    '3/8',
    'A',
    'G',
    '1/9',
    '2/9',
    '3/9',
]
const yellowLamp = ['2/3', '3/4', '3/5', '3/6', '3/10', '4/6', '4/7', '4/8', '5/8', 'B', 'Y', '4/9', '5/9', '6/9']
const redLamp = [
    '3/3',
    '4/4',
    '4/5',
    '5/5',
    '5/6',
    '5/7',
    '6/6',
    '6/7',
    '6/8',
    '7/7',
    '7/8',
    '8/8',
    'C',
    'R',
    '7/9',
    '8/9',
    '9/9',
]

// get json
const getCustomerRankingData = (bu) => {
    axios.get(hostName + 'warroom_customer_ranking.php').then((res) => {
        let data = res.data
        if (bu === 'AA') bu = ['AA-BD4', 'AUTO-BD5']
        else bu = [bu]
        const tbody = document.querySelector('.rank-tbody')
        const dataBu = data.filter((e) => bu.includes(e.application))
        const customer = Array.from(new Set(dataBu.map((e) => e.brand))).sort()
        tbody.innerHTML = ''
        customer.forEach((item) => {
            const data = dataBu.filter((e) => e.brand === item)
            const [actualCurrent] = data.filter((e) => e.TYPE === 'actural_c')
            const [actualPast] = data.filter((e) => e.TYPE === 'actural_p')
            const [forecastPast] = data.filter((e) => e.TYPE === 'forecast_c')
            const [forecastCurrent] = data.filter((e) => e.TYPE === 'forecast_p')
            let dateActual = new Date(`${actualCurrent.year} ${actualCurrent.month}`).getTime()
            let today = new Date()
            let thisMonth = today.getMonth()
            let dateLast3Month = today.setMonth(today.getMonth() - 3)
            let pastDiv = ''
            let currentDiv = ''
            let isNew = false
            const checkLight = (lamp) => {
                let light = ''
                switch (lamp) {
                    case 'G':
                        light = 'green'
                        break
                    case 'Y':
                        light = 'yellow'
                        break
                    case 'R':
                        light = 'red'
                        break
                    default:
                        break
                }
                return light
            }
            const regex = new RegExp('^[a-zA-Z]')
            /* Actual Current日期距離現在時間超過3個月 */
            /* True: Past: Actual_Past , Current: Actual_Current */
            /* False: Past: Actual_Current , Current: Forecast_Current */
            if (dateActual >= dateLast3Month) {
                pastDiv = `
                <div>
                    <span>${regex.test(actualPast.rank) ? '' : actualPast.rank}</span>
                    <div class="circle ${checkLight(actualPast.lamp)}"></div>
                </div>
                `
                currentDiv = `
                <div>
                    <span>${regex.test(actualCurrent.rank) ? '' : actualCurrent.rank}</span>
                    <div class="light-current circle ${checkLight(actualCurrent.lamp)}"></div>
                </div>
                `
                if (Number(actualCurrent.month) === thisMonth) isNew = true
            } else {
                pastDiv = `
                <div>
                    <span>${regex.test(actualCurrent.rank) ? '' : actualCurrent.rank}</span>
                    <div class="circle ${checkLight(actualCurrent.lamp)}"></div>
                </div>
                `
                currentDiv = `
                <div>
                    <span>${regex.test(forecastCurrent.rank) ? '' : forecastCurrent.rank}</span>
                    <div class="light-current circle ${checkLight(forecastCurrent.lamp)}"></div>
                </div>
                `
                if (Number(forecastCurrent.month) === thisMonth) isNew = true
            }

            tbody.innerHTML += `
        <tr>
           <td><img src="./images/${item}.png" alt="${item}"/></td>
           <td colspan="2">${pastDiv}</td>
           <td colspan="2">${currentDiv}</td>
           <td class="${isNew ? 'new-case' : 'old-case'}">New</td>
        </tr>
        `
        })
        rateValue.innerHTML = calculateRate()
    })
}

const getAnnualKpiData = (bu) => {
    axios.post(hostName + 'warroom_annual_metrics.php', qs.stringify({ Bu: bu })).then((res) => {
        const data = res.data[0]
        // dom
        const chartOba = document.querySelector('.chart-oba'),
            chartcaerb = document.querySelector('.chart-caerb')

        // echarts OBA Cost
        const objOba = {}
        console.log(
            'Target:',
            data.OBA_Cost_Target,
            'Last year:',
            data.OBA_Cost_LastYear,
            'Target > Last year',
            data.OBA_Annual_Target > data.OBA_Cost_LastYear
        )
        data.OBA_Cost_LastYear =
            data.OBA_Annual_Target > data.OBA_Cost_LastYear ? data.OBA_Annual_Target : data.OBA_Cost_LastYear
        const maxAnnual = (Number(data.OBA_Cost_LastYear) / 80) * 100
        objOba.value = Math.floor((Number(data.OBA_Annual_Cost) / maxAnnual) * 100)
        objOba.name = Math.floor((Number(data.OBA_Annual_Cost) / Number(data.OBA_Annual_Target)) * 10000) / 100
        objOba.axis = Math.floor((Number(data.OBA_Annual_Target) / maxAnnual) * 10) / 10
        // echarts CAERB
        const objCaerb = {}
        const maxCaerb = (Number(data.CAERB_LastYear) / 80) * 100
        objCaerb.value = Math.floor((Number(data.CAERB_total) / maxCaerb) * 100)
        objCaerb.name = Math.floor((Number(data.CAERB_total) / Number(data.CAERB_target)) * 10000) / 100
        objCaerb.axis = Math.floor((Number(data.CAERB_target) / maxCaerb) * 10) / 10

        paintChartsGauge(chartOba, objOba)
        paintChartsGauge(chartcaerb, objCaerb)
    })
}

const getAnnualOBACost = (bu) => {
    $.ajax({
        url: 'http://tnvqis03/JsonServiceTest/jsonQuery.do?dataRequestName=cq-warroom-PROD-OBA_Cost001',
        dataType: 'jsonp',
        jsonp: 'jsonpCallback',
    }).then((res) => {
        if (bu === 'AA') bu = 'BD'
        const data = res.filter((e) => e.APPLICATION.includes(bu))
        let valueCost = checkValue(data.map((e) => e.SORTING_FEE))
        let valueTarget = checkValue(data.map((e) => e.TARGET))
        valueCost = Math.floor(valueCost / 10000) / 100
        valueTarget = Math.floor(valueTarget / 10000) / 100
        const valueObaAnnualActual = document.querySelector('.value-oba-annual-actual'),
            valueObaAnnualTarget = document.querySelector('.value-oba-annual-target')
        if (valueCost >= valueTarget) {
            valueObaAnnualActual.style.color = 'red'
        } else {
            valueObaAnnualActual.style.color = 'blue'
        }
        valueObaAnnualActual.innerHTML = `${valueCost}M`
        valueObaAnnualTarget.innerHTML = `${valueTarget}M`
    })
}

const getAnnualCAERB = (bu) => {
    $.ajax({
        url: 'http://tnvqis03/JsonServiceTest/jsonQuery.do?dataRequestName=cq-warroom-PROD-CAERB001',
        dataType: 'jsonp',
        jsonp: 'jsonpCallback',
    }).then((res) => {
        if (bu === 'AA') bu = 'BD'
        const data = res.filter((e) => e.APPLICATION.includes(bu))
        let valueOpen = checkValue(data.filter((e) => e.STSTUS === 'OPEN').map((e) => e.CAERB_COUNT))
        let valueClose = checkValue(data.filter((e) => e.STSTUS === 'CLOSE').map((e) => e.CAERB_COUNT))
        let valueTarget = checkValue(data.filter((e) => e.STSTUS === 'TARGET').map((e) => e.CAERB_COUNT))
        const valueCaerbOpenClose = document.querySelector('.value-caerb-open-close'),
            valueCaerbTaget = document.querySelector('.value-caerb-target')

        if (valueOpen + valueClose >= valueTarget) {
            valueCaerbOpenClose.style.color = 'red'
        } else {
            valueCaerbOpenClose.style.color = 'blue'
        }
        valueCaerbOpenClose.innerHTML = `${valueOpen}/${valueClose}`
        valueCaerbTaget.innerHTML = valueTarget
    })
}

const getKpiJson = (bu) => {
    const getDataOBACost = () => {
        return $.ajax({
            url: 'http://tnvqis03/JsonServiceTest/jsonQuery.do?dataRequestName=cq-warroom-PROD-OBA_Cost002',
            dataType: 'jsonp',
            jsonp: 'jsonpCallback',
        })
    }
    const getDataOBARate = () => {
        return $.ajax({
            url: 'http://tnvqis03/JsonServiceTest/jsonQuery.do?dataRequestName=cq-warroom-PROD-OBA_Rate001',
            dataType: 'jsonp',
            jsonp: 'jsonpCallback',
        })
    }
    const getDataCustomerClaim = () => {
        return $.ajax({
            url: 'http://tnvqis03/JsonServiceTest/jsonQuery.do?dataRequestName=cq-warroom-PROD-Customer_Claim001',
            dataType: 'jsonp',
            jsonp: 'jsonpCallback',
        })
    }

    /* 燈號邏輯 */
    const pictureLight = (past, current, type) => {
        let str = ''
        let props = []

        if (type === 0) props = ['SORT_RATE', 'TARGET']
        else if (type === 1) props = ['SORTING_FEE', 'TARGET']
        else if (type === 2) props = ['TOTAL_COST', 'TARGET']
        let valuePast, valueCurrent, valueTarget
        if (type === 0) {
            valuePast = Number(past[props[0]].replace('%', ''))
            valueCurrent = Number(current[props[0]].replace('%', ''))
            valueTarget = Number(current[props[1]].replace('%', ''))
        } else {
            valuePast = Number(past[props[0]])
            valueCurrent = Number(current[props[0]])
            valueTarget = Number(current[props[1]])
        }

        /* [達標/不達標] 這個月跟上個月比 */
        str = valueCurrent <= valueTarget ? '達標' : '不達標'

        /* [好/持平/爛] 這個月跟Target比 */
        if (valueCurrent < valuePast) {
            str += '好'
        } else if (valueCurrent === valuePast) {
            str += '持平'
        } else if (valueCurrent > valuePast) {
            str += '爛'
        }

        return str
    }

    $.when(getDataOBACost(), getDataOBARate(), getDataCustomerClaim()).then((cost, rate, customerclaim) => {
        // AA => 'AA-BD4, AUTO-BD5'
        if (bu === 'AA') bu = ['AA-BD4', 'AUTO-BD5']
        else bu = [bu]
        let dataRate = rate[0].filter((e) => bu.includes(e.APPLICATION))
        let dataCost = cost[0].filter((e) => bu.includes(e.PRODUCT_TYPE))
        let dataClaim = customerclaim[0].filter((e) => bu.includes(e.PRODUCT_TYPE))
        let targetRate, targetCost, targetCliam
        let obaRateMax = 0
        let obaCostMax = 0
        let customerClaimMax = 0
        const tdData = (index, color) => {
            let valueAcutal, valueTarget, imgLight
            if (index === 0) {
                /* 資料依YM排序 */
                dataRate.sort((a, b) => {
                    const monthA = Number(a.YM.slice(-2))
                    const monthB = Number(b.YM.slice(-2))

                    return monthA - monthB
                })
                const [dataLastMonth, dataThisMonth] = dataRate.slice(-2)

                valueAcutal = dataThisMonth.SORT_RATE + '/月'
                valueTarget = dataThisMonth.TARGET + '/月'
                imgLight = pictureLight(dataLastMonth, dataThisMonth, index)

                targetRate = Number(dataThisMonth.TARGET.replace('%', ''))
            } else if (index === 1) {
                /* 資料依YM排序 */
                dataCost.sort((a, b) => {
                    const monthA = Number(a.YM.slice(-2))
                    const monthB = Number(b.YM.slice(-2))

                    return monthA - monthB
                })
                const [dataLastMonth, dataThisMonth] = dataCost.slice(-2)

                /* Cost計算 value * (這個月已過天數 / 這個月天數) */
                const month = today.getMonth()
                const dayThismonth = new Date(yearCurrent, month + 1, 0).getDate()
                const dateToday = today.getDate()
                const rate = dateToday / dayThismonth
                console.log(dataThisMonth.SORTING_FEE, rate)
                valueAcutal = Math.floor((dataThisMonth.SORTING_FEE * rate) / 10000) / 100 + 'M/月'
                valueTarget = Math.floor(dataThisMonth.TARGET / 10000) / 100 + 'M/月'
                imgLight = pictureLight(dataLastMonth, dataThisMonth, index)

                targetCost = Math.floor(dataThisMonth.TARGET / 10000) / 100
            } else if (index === 2) {
                /* 資料依YM排序 */
                dataClaim.sort((a, b) => {
                    const monthA = Number(a.YM.slice(-2))
                    const monthB = Number(b.YM.slice(-2))

                    return monthA - monthB
                })
                if (dataClaim.length < 2) {
                    dataClaim = new Array(2 - dataClaim.length)
                        .fill({ TOTAL_COST: 0, TARGET: 0, YM: '0000' })
                        .concat(dataClaim)
                }
                const [dataLastMonth, dataThisMonth] = dataClaim.slice(-2)

                valueAcutal = (dataThisMonth.TOTAL_COST === null ? 0 : dataThisMonth.TOTAL_COST) + 'M/月'
                valueTarget = dataThisMonth.TARGET + 'M/月'
                imgLight = pictureLight(dataLastMonth, dataThisMonth, index)

                targetCliam = Number(dataThisMonth.TARGET)
            }
            let tdContent = `
            <td style="background-color:${color};">${valueAcutal}</td>
            <td style="background-color:${color};">${valueTarget}</td>
            <td style="background-color:${color};"><img src="./images/${imgLight}.png" alt="燈號"/></td>
            `
            return tdContent
        }

        const tdChart = (type, index) => {
            const chartDom = document.querySelector(`.chart-line-${index}`)
            const obj = {}
            if (type === 0) {
                /* Rate： AA 只取 AA-BD4 */
                if (bu.includes('AA-BD4')) dataRate = dataRate.filter((e) => e.APPLICATION === 'AA-BD4')
                /* 只抓近六個月 */
                if (dataRate.length > 6) dataRate.shift()
                dataRate.forEach((e) => {
                    if (obaRateMax < Number(e.TARGET.replace('%', '')) * 1.5) {
                        obaRateMax = Number(e.TARGET.replace('%', '')) * 1.5
                    }
                    if (obaRateMax < Number(e.SORT_RATE.replace('%', ''))) {
                        obaRateMax = Number(e.SORT_RATE.replace('%', '')) * 1.05
                    }
                })
                obj.name = 'Sorting Rate'
                obj.xAxis = dataRate.map((e) => Number(e.YM.slice(-2)))
                obj.value = dataRate.map((e) => Number(e.SORT_RATE.replace('%', '')))
                obj.target = targetRate
                obj.max = obaRateMax
                obj.gt = -0.01
            } else if (type === 1) {
                /* AA */
                if (bu.length > 1)
                    dataCost = (() => {
                        const ym = Array.from(new Set(dataCost.map((e) => e.YM)))
                        const arr = []
                        ym.forEach((month) => {
                            arr.push({
                                SORTING_FEE: dataCost
                                    .filter((e) => e.YM === month)
                                    .map((e) => e.SORTING_FEE)
                                    .reduce((a, b) => a + b),
                                TARGET: dataCost
                                    .filter((e) => e.YM === month)
                                    .map((e) => e.TARGET)
                                    .reduce((a, b) => a + b),
                                PRODUCT_TYPE: 'AA',
                                YM: month,
                            })
                        })
                        return arr
                    })()
                dataCost.forEach((e) => {
                    if (obaCostMax < e.TARGET * 1.5) {
                        obaCostMax = e.TARGET * 1.5
                    }
                    if (obaCostMax < e.SORTING_FEE) {
                        obaCostMax = e.SORTING_FEE * 1.05
                    }
                })
                obj.name = 'Sorting Cost'
                obj.xAxis = dataCost.map((e) => Number(e.YM.slice(-2)))
                obj.value = dataCost.map((e) => Math.floor(e.SORTING_FEE / 10000) / 100)
                obj.target = targetCost
                obj.max = Math.floor(obaCostMax / 10000) / 100
                obj.gt = -1
            } else if (type === 2) {
                /* 資料不足6個月 補0*/
                console.log(dataClaim)
                dataClaim.forEach((e) => {
                    if (customerClaimMax < Number(e.TARGET) * 1.5) {
                        customerClaimMax = Number(e.TARGET) * 1.5
                    }
                    if (customerClaimMax < Number(e.TOTAL_COST === null ? '0' : e.TOTAL_COST)) {
                        customerClaimMax = Number(e.TOTAL_COST === null ? '0' : e.TOTAL_COST) * 1.05
                    }
                })
                obj.name = 'Customer Claim'
                obj.xAxis = dataClaim.map((e) => Number(e.YM.slice(-2)))
                obj.value = dataClaim.map((e) => Number(e.TOTAL_COST === null ? '0' : e.TOTAL_COST))
                /* 資料不足6個月 補0*/
                if (obj.xAxis.length < 6) {
                    let l = 6 - obj.xAxis.length
                    const min = Math.min(...obj.xAxis)
                    for (let i = 1; i <= l; i++) {
                        obj.xAxis.unshift(min - i)
                        obj.value.unshift(0)
                    }
                }
                obj.target = targetCliam
                obj.max = customerClaimMax
                obj.gt = -1
            }
            paintChartLine(chartDom, obj)
        }

        const titleIndex = ['OBA Sorting Rate', '當月預估 OBA Sorting Cost', 'Customer Claim']

        const lastDiv = (index, color) => {
            if (index === 0) return `<td class="chart-sankey" rowspan="3" style="background-color:${color}"></td>`
            else return ''
        }

        const trendTbody = document.querySelector('.block-trend tbody')
        let tbodyContent = ''
        titleIndex.forEach((item, index) => {
            let backgrounColor = index % 2 === 0 ? '#C0DEFF' : '#DEFFC0'
            tbodyContent += `
          <tr>
            <td style="background-color:${backgrounColor}">${item.split(' ').join('<br>')}</td>
            ${tdData(index, backgrounColor)}
            <td style="background-color:${backgrounColor}"><div class="chart-line-${index + 1}"></div></td>
            ${lastDiv(index, backgrounColor)}
          </tr>
          `
        })

        trendTbody.innerHTML = tbodyContent
        titleIndex.forEach((item, index) => {
            tdChart(index, index + 1)
        })
    })
}

const getSankeyData = (bu) => {
    const getDataOBACost = () => {
        return $.ajax({
            url: 'http://tnvqis03/JsonServiceTest/jsonQuery.do?dataRequestName=cq-warroom-PROD-OBA_Cost003',
            dataType: 'jsonp',
            jsonp: 'jsonpCallback',
        })
    }
    const getDataOBARate = () => {
        return $.ajax({
            url: 'http://tnvqis03/JsonServiceTest/jsonQuery.do?dataRequestName=cq-warroom-PROD-OBA_Rate002',
            dataType: 'jsonp',
            jsonp: 'jsonpCallback',
        })
    }
    const getDataCustomerClaim = () => {
        return $.ajax({
            url: 'http://tnvqis03/JsonServiceTest/jsonQuery.do?dataRequestName=cq-warroom-PROD-Customer_Claim002',
            dataType: 'jsonp',
            jsonp: 'jsonpCallback',
        })
    }
    $.when(getDataOBACost(), getDataOBARate(), getDataCustomerClaim()).then((cost, rate, customerclaim) => {
        // AA => 'AA-BD4, AUTO-BD5'
        if (bu === 'AA') bu = ['AA-BD4', 'AUTO-BD5']
        else bu = [bu]
        const dataRate = rate[0].filter((e) => bu.includes(e.PRODUCT_TYPE))
        const dataCost = cost[0].filter((e) => bu.includes(e.PRODUCT_TYPE))
        const dataClaim = customerclaim[0].filter((e) => bu.includes(e.PRODUCT_TYPE))

        const chartSankey = document.querySelector('.chart-sankey')
        const kpiColor = {
            'OBA Sorting Rate': '#70E0E0',
            'OBA Sorting Cost': '#E0FF70',
            'Customer Claim': '#FFA8E0',
        }

        // customer
        const customerName = Array.from(
            new Set(
                [
                    dataRate.map((e) => e.CUST_GROUP),
                    dataCost.map((e) => e.CUST_GROUP),
                    dataClaim.map((e) => e.CUSTOMER_GROUP),
                ].flat()
            )
        ).sort()
        const colorRightList = generateColor(customerName.length)

        // obj to echarts
        const obj = {}
        obj.value = []
        // left source
        for (let i = 0; i < 3; i++) {
            let key = Object.keys(kpiColor)[i]
            let value = Object.values(kpiColor)[i]
            if (i === 0) {
                if (dataRate.length > 0)
                    obj.value.push({
                        name: key,
                        itemStyle: { color: value },
                    })
                else return ''
            } else if (i === 1) {
                if (dataCost.length > 0)
                    obj.value.push({
                        name: key,
                        itemStyle: { color: value },
                    })
                else return ''
            } else if (i === 2) {
                if (dataClaim.length > 0)
                    obj.value.push({
                        name: key,
                        itemStyle: { color: value },
                    })
                else return ''
            }
        }
        // right target
        customerName.forEach((item, index) => {
            obj.value.push({ name: item, itemStyle: { color: colorRightList[index] } })
        })
        // links
        obj.links = []
        Object.keys(kpiColor).forEach((category, index) => {
            if (index === 0) {
                const totalValue = dataRate.map((e) => e.INSPECTION_QTY).reduce((a, b) => a + b)
                dataRate.forEach((item) => {
                    const value = item.INSPECTION_QTY / totalValue
                    obj.links.push({
                        source: category,
                        target: item.CUST_GROUP,
                        value: value,
                        lineStyle: { color: 'gradient' },
                    })
                })
            } else if (index === 1) {
                const totalValue = dataCost.map((e) => e.SORTING_FEE).reduce((a, b) => a + b)
                dataCost.forEach((item) => {
                    const value = item.SORTING_FEE / totalValue
                    obj.links.push({
                        source: category,
                        target: item.CUST_GROUP,
                        value: value,
                        lineStyle: { color: 'gradient' },
                    })
                })
            } else if (index === 2) {
                // const totalValue = dataClaim.map((e) => e.INSPECTION_QTY).reduce((a, b) => a + b)
                const totalValue = dataClaim.map((e) => e.TOTAL_COST).length
                dataClaim.forEach((item) => {
                    const value = 1 / totalValue
                    obj.links.push({
                        source: category,
                        target: item.CUSTOMER_GROUP,
                        value: value,
                        lineStyle: { color: 'gradient' },
                    })
                })
            }
        })

        paintChartSankey(chartSankey, obj)
    })
}

const navClick = (bu) => {
    getCustomerRankingData(bu)
    getAnnualKpiData(bu)
    getAnnualOBACost(bu)
    getAnnualCAERB(bu)
    getKpiJson(bu)
    getSankeyData(bu)
}

function calculateRate() {
    const lightCurrent = document.querySelectorAll('.light-current')
    const total = lightCurrent.length
    let green = 0
    lightCurrent.forEach((e) => {
        if (e.classList.contains('green')) green += 1
    })

    return Math.floor((green / total) * 100) + '%'
}

// echarts
const paintChartsGauge = (dom, data) => {
    let myChart = echarts.init(dom)
    let option
    option = {
        series: [
            {
                type: 'gauge',
                detail: { show: false },
                data: [
                    {
                        value: data.value,
                        name: data.name + ' %',
                        title: {
                            offsetCenter: [0, '-35%'],
                        },
                    },
                ],
                axisLabel: {
                    show: false,
                },
                detail: {
                    show: false,
                    formatter: `${data.name} %`,
                    fontSize: 20,
                    fontWeight: 400,
                    color: 'black',
                    offsetCenter: [0, '-35%'],
                },
                pointer: {
                    offsetCenter: [0, -10],
                    showAbove: false,
                    itemStyle: {
                        color: 'auto',
                    },
                },
                axisLine: {
                    lineStyle: {
                        color: [
                            [data.axis, '#00AE75'],
                            [0.8, '#FFEC4C'],
                            [1, '#E54733'],
                        ],
                        width: 50,
                    },
                },
                axisTick: {
                    distance: -50,
                    length: 10,
                    lineStyle: {
                        color: 'white',
                    },
                },
                splitLine: {
                    distance: -50,
                    length: 30,
                    lineStyle: {
                        color: 'white',
                        width: 2,
                    },
                },
                center: ['50%', '98%'],
                radius: '160%',
                startAngle: 180,
                endAngle: 0,
            },
        ],
    }

    myChart.clear()
    myChart.setOption(option)
    setTimeout(function () {
        window.addEventListener('resize', () => {
            myChart.resize()
        })
    }, 200)
}

const paintChartLine = (dom, data) => {
    let myChart = echarts.init(dom)
    let option
    option = {
        grid: {
            right: '1%',
            bottom: '35%',
            top: '35%',
        },
        xAxis: {
            data: data.xAxis,
            axisLabel: {
                formatter: '{value}月',
            },
        },
        yAxis: {
            show: false,
            splitLine: {
                show: true,
            },
        },
        visualMap: {
            top: -100,
            right: -100,
            pieces: [
                {
                    gt: data.gt,
                    lte: data.target,
                    color: '#008000',
                },
                {
                    gt: data.target,
                    lte: data.max,
                    color: '#e60000',
                },
            ],
        },
        series: {
            name: data.name,
            label: {
                show: true,
                formatter: function (e) {
                    if (e.seriesName.includes('Rate')) return `${e.data}%`
                    else return `${e.data}M`
                },
            },
            type: 'line',
            data: data.value,
            lineStyle: {
                width: 6,
            },
        },
    }

    myChart.clear()
    myChart.setOption(option)

    setTimeout(function () {
        window.addEventListener('resize', () => {
            myChart.resize()
        })
    }, 200)
}

const paintChartSankey = (dom, data) => {
    let myChart = echarts.init(dom)
    let option
    option = {
        series: [
            {
                type: 'sankey',
                data: data.value,
                links: data.links,
                focusNodeAdjacency: 'allEdges',
                itemStyle: {
                    borderWidth: 1,
                    color: '#1b6199',
                    borderColor: '#fff',
                },
                lineStyle: {
                    curveness: 0.5,
                    opacity: 0.5,
                },
                layoutIterations: 0,
            },
        ],
    }

    myChart.clear()
    myChart.setOption(option)

    setTimeout(function () {
        window.addEventListener('resize', () => {
            myChart.resize()
        })
    }, 200)
}

// Random Color
const generateColor = (num) => {
    let arr = []
    let hex = () => {
        return (Math.round(Math.random() * 127) + 127).toString(16)
    }
    for (let i = 0; i < num; i++) {
        arr.push(`#${hex()}${hex()}${hex()}`)
    }
    return arr
}

// Render
const renderNavBar = (data) => {
    data.forEach((item) => {
        if (item === buSelected) {
            navBar.innerHTML += `<a class="nav-item nav-link active" href="#">${item}</a>`
            navClick(buSelected)
        } else navBar.innerHTML += `<a class="nav-item nav-link" href="#">${item}</a>`
    })
}
renderNavBar(bu)

// function
function checkValue(arr) {
    let value
    if (arr.length < 1) value = 0
    else if (arr.length > 1) value = arr.reduce((a, b) => a + b)
    else value = arr[0]
    return value
}
// Event
navBar.addEventListener('click', (params) => {
    let target = params.target
    if (target.matches('.nav-link')) {
        Array.from(navBar.children).forEach((el) => {
            el.classList.remove('active')
        })
        target.classList.add('active')
        buSelected = target.innerText
        navClick(buSelected)
    }
})
