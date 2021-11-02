// API host name
const hostName = 'http://tw071273p/cq-warroom/'
let qs = Qs
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded'

// dom
const navBar = document.querySelector('.navbar-nav'),
    rateValue = document.querySelector('.rate-value')
// Value Default
let buSelected = 'IAVM'
// Date
const today = new Date()
const yearCurrent = today.getFullYear()
const monthCurrent = today.getMonth() + 1
// month補0
function styleMonth(month) {
    return (month = month < 10 ? `0${month}` : month)
}
const arrSixyearmonth = []
for (let i = 0; i < 6; i++) {
    if (monthCurrent - i <= 0) arrSixyearmonth.unshift(`${String(yearCurrent - 1)}${styleMonht(monthCurrent + 12 - i)}`)
    else arrSixyearmonth.unshift(`${String(yearCurrent)}${styleMonth(monthCurrent - i)}`)
}
const arrSixmonth = arrSixyearmonth.map((e) => Number(e.slice(-2)))
// Object
const bu = ['IAVM', 'MONITOR', 'NB', 'TV', 'AA', 'CE', 'MP', 'TABLET']

// PRODUCT_TYPE Rule
const productTypeRule = (item) => {
    if (item.PRODUCT_TYPE === 'OPEN_CELL_TV' || item.PRODUCT_TYPE === 'SET_TV') item.PRODUCT_TYPE = 'TV'
    else if (item.PRODUCT_TYPE === 'IAV' || item.PRODUCT_TYPE === 'MEDICAL' || item.PRODUCT_TYPE === 'OPEN_CELL_XRAY')
        item.PRODUCT_TYPE = 'IAVM'
    else if (item.PRODUCT_TYPE === 'OPEN_CELL_MONITOR') item.PRODUCT_TYPE = 'MONITOR'
    else if (item.PRODUCT_TYPE === 'AA-BD4' || item.PRODUCT_TYPE === 'AUTO-BD5') item.PRODUCT_TYPE = 'AA'
    return item
}

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
            const [forecastPast] = data.filter((e) => e.TYPE === 'forecast_p')
            const [forecastCurrent] = data.filter((e) => e.TYPE === 'forecast_c')
            let dateActual = new Date(`${actualCurrent.year} ${actualCurrent.month}`).getTime()
            let dateLast3Month = new Date()
            dateLast3Month = dateLast3Month.setMonth(dateLast3Month.getMonth() - 3)
            let dateLast2Week = new Date()
            dateLast2Week = dateLast2Week.setTime(dateLast2Week.getTime() - 24 * 3600 * 1000 * 14)
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
            const regex = new RegExp('[/]')
            /* Actual Current日期距離現在時間超過3個月 */
            /* True: Past: Actual_Past , Current: Actual_Current */
            /* False: Past: Actual_Current , Current: Forecast_Current */

            if (dateActual >= dateLast3Month) {
                pastDiv = `
                <div>
                    <span>${regex.test(actualPast.rank) ? actualPast.rank : ''}</span>
                    <div class="circle ${checkLight(actualPast.lamp)}"></div>
                </div>
                `
                currentDiv = `
                <div>
                    <span>${regex.test(actualCurrent.rank) ? actualCurrent.rank : ''}</span>
                    <div class="light-current circle ${checkLight(actualCurrent.lamp)}"></div>
                </div>
                `
                if (new Date(actualCurrent.insertdate).getTime() >= dateLast2Week) isNew = true
            } else {
                pastDiv = `
                <div>
                    <span>${regex.test(actualCurrent.rank) ? actualCurrent.rank : ''}</span>
                    <div class="circle ${checkLight(actualCurrent.lamp)}"></div>
                </div>
                `
                currentDiv = `
                <div>
                    <span>${regex.test(forecastCurrent.rank) ? forecastCurrent.rank : ''}</span>
                    <div class="light-current circle ${checkLight(forecastCurrent.lamp)}"></div>
                </div>
                `
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

const getAnnualOBACost = (bu) => {
    $.ajax({
        url: jsonPath + '/jsonQuery.do?dataRequestName=cq-warroom-PROD-OBA_Cost001',
        dataType: 'jsonp',
        jsonp: 'jsonpCallback',
    }).then((res) => {
        if (bu === 'AA') bu = ['AA-BD4', 'AUTO-BD5']
        else bu = [bu]
        const data = res.filter((e) => bu.includes(e.APPLICATION))
        const obj = {}
        let valueCost = checkValue(data.map((e) => e.SORTING_FEE))
        let valueTarget = checkValue(data.map((e) => e.TARGET))
        /* chart data */
        obj.target = valueTarget
        obj.valueCostCurrent = valueCost
        obj.valueLastYear = checkValue(data.map((e) => e.LAST_YEAR_FEE))
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

        let { target, valueCostCurrent, valueLastYear } = obj
        valueLastYear = target > valueLastYear ? target : valueLastYear
        const maxAnnual = (Number(valueLastYear) / 80) * 100

        obj.value = Math.floor((Number(valueCostCurrent) / maxAnnual) * 100)
        obj.name = Math.floor((Number(valueCostCurrent) / Number(target)) * 10000) / 100
        obj.axis = Math.floor((Number(target) / maxAnnual) * 10) / 10

        // 儀表圖
        const chartOba = document.querySelector('.chart-oba')
        paintChartsGauge(chartOba, obj)
    })
}

const getAnnualCAERB = (bu) => {
    $.ajax({
        url: jsonPath + '/jsonQuery.do?dataRequestName=cq-warroom-PROD-CAERB001',
        dataType: 'jsonp',
        jsonp: 'jsonpCallback',
    }).then((res) => {
        if (bu === 'AA') bu = 'BD'
        const data = res.filter((e) => e.APPLICATION.includes(bu))
        let valueOpen = checkValue(data.filter((e) => e.STSTUS === 'OPEN').map((e) => e.CAERB_COUNT))
        let valueClose = checkValue(data.filter((e) => e.STSTUS === 'CLOSE').map((e) => e.CAERB_COUNT))
        let valueTarget = checkValue(data.filter((e) => e.STSTUS === 'TARGET').map((e) => e.CAERB_COUNT))
        /* chart data */
        const obj = {}
        obj.target = valueTarget
        obj.total = valueOpen + valueClose
        obj.lastYear = checkValue(data.filter((e) => e.STSTUS === 'last_year').map((e) => e.CAERB_COUNT))
        const valueCaerbOpenClose = document.querySelector('.value-caerb-open-close'),
            valueCaerbTaget = document.querySelector('.value-caerb-target')

        if (valueOpen + valueClose >= valueTarget) {
            valueCaerbOpenClose.style.color = 'red'
        } else {
            valueCaerbOpenClose.style.color = 'blue'
        }
        valueCaerbOpenClose.innerHTML = `${valueOpen}/${valueClose}`
        valueCaerbTaget.innerHTML = valueTarget

        const { target, total, lastYear } = obj
        const maxCaerb = (Number(lastYear) / 80) * 100
        obj.value = Math.floor((Number(total) / maxCaerb) * 100)
        obj.name = Math.floor((Number(total) / Number(target)) * 10000) / 100
        obj.axis = Math.floor((Number(target) / maxCaerb) * 10) / 10
        // 儀表圖
        const chartcaerb = document.querySelector('.chart-caerb')
        paintChartsGauge(chartcaerb, obj)
    })
}

const getKpiJson = (bu) => {
    const getDataOBACost = () => {
        return $.ajax({
            url: jsonPath + '/jsonQuery.do?dataRequestName=cq-warroom-PROD-OBA_Cost002',
            dataType: 'jsonp',
            jsonp: 'jsonpCallback',
        })
    }
    const getDataOBARate = () => {
        return $.ajax({
            url: jsonPath + '/jsonQuery.do?dataRequestName=cq-warroom-PROD-OBA_Rate001',
            dataType: 'jsonp',
            jsonp: 'jsonpCallback',
        })
    }
    const getDataActualClaim = () => {
        return $.ajax({
            url: jsonPath + '/jsonQuery.do?dataRequestName=CRC_IN_APPR_PROC_AMT001',
            dataType: 'jsonp',
            jsonp: 'jsonpCallback',
        })
    }
    const getDataCustomerClaimMonthly = () => {
        return $.ajax({
            url: jsonPath + '/jsonQuery.do?dataRequestName=cq-warroom-PROD-Customer_Claim003',
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

    $.when(getDataOBACost(), getDataOBARate(), getDataActualClaim(), getDataCustomerClaimMonthly()).then(
        (cost, rate, actualClaim, claimMonthly) => {
            // AA => 'AA-BD4, AUTO-BD5'
            if (bu === 'AA') bu = ['AA-BD4', 'AUTO-BD5']
            else bu = [bu]
            let dataRate = rate[0].filter((e) => bu.includes(e.APPLICATION))
            let dataCost = cost[0].filter((e) => bu.includes(e.PRODUCT_TYPE))
            let dataActualClaim = actualClaim[0]
                .map((item) => productTypeRule(item))
                .filter((e) => bu.includes(e.PRODUCT_TYPE))
            let dataClaimMonthly = claimMonthly[0].filter((e) => bu.includes(e.PRODUCT_TYPE))
            /* Claim Monthly 月份補0 */
            arrSixyearmonth.forEach((ym) => {
                const yearMonthRate = dataRate.map((e) => e.YM)
                const yearMonthCost = dataCost.map((e) => e.YM)
                const yearMonthsClaimMonthly = dataClaimMonthly.map((e) => e.YEAR_MONTH.replace('-', ''))
                if (!yearMonthRate.includes(ym))
                    dataRate.push({
                        APPLICATION: dataRate.map((e) => e.APPLICATION)[0],
                        YM: ym,
                        TARGET: dataRate.map((e) => e.TARGET)[0],
                        SORT_RATE: '0%',
                    })
                if (!yearMonthCost.includes(ym))
                    dataCost.push({
                        PRODUCT_TYPE: dataCost.map((e) => e.PRODUCT_TYPE)[0],
                        YM: ym,
                        TARGET: dataCost.map((e) => e.TARGET)[0],
                        SORTING_FEE: 0,
                    })
                if (!yearMonthsClaimMonthly.includes(ym))
                    dataClaimMonthly.push({
                        PRODUCT_TYPE: dataClaimMonthly.map((e) => e.PRODUCT_TYPE)[0],
                        YEAR_MONTH: ym,
                        AMOUNT: 0,
                        TYPE: 'CRC',
                    })
            })
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

                    /* Cost計算 value * / 這個月已過天數 * 這個月天數 */
                    const month = today.getMonth()
                    const dayThismonth = new Date(yearCurrent, month + 1, 0).getDate()
                    const dateToday = today.getDate()
                    const rate = dayThismonth / dateToday
                    valueAcutal = Math.floor((dataThisMonth.SORTING_FEE * rate) / 10000) / 100 + 'M/月'
                    valueTarget = Math.floor(dataThisMonth.TARGET / 10000) / 100 + 'M/月'
                    imgLight = pictureLight(dataLastMonth, dataThisMonth, index)

                    targetCost = Math.floor(dataThisMonth.TARGET / 10000) / 100
                } else if (index === 2) {
                    /* Claim Monthly */
                    const [targetClaim] = dataClaimMonthly.filter((e) => e.TYPE === 'TARGET')
                    const valueClaim = dataClaimMonthly.filter((e) => e.TYPE === 'CRC')
                    const [dataLastMonth, dataThisMonth] = dataClaimMonthly.slice(-2)

                    /* Actual Claim */
                    let valueActualClaim = dataActualClaim.map((e) => e.AMOUNT)
                    valueActualClaim = valueActualClaim.length > 0 ? valueActualClaim.reduce((a, b) => a + b) : 0
                    valueAcutal = Math.floor(valueActualClaim / 10000) / 100 + 'M/月'
                    valueTarget = targetClaim.AMOUNT + 'M/月'
                    imgLight = (() => {
                        let str = ''
                        const valueCurrent = Number(valueAcutal.replace('M/月', ''))
                        const valuePast = Math.floor(dataLastMonth.AMOUNT / 10000) / 100
                        /* [達標/不達標] 這個月跟上個月比 */
                        str = valueCurrent <= targetClaim.AMOUNT ? '達標' : '不達標'

                        /* [好/持平/爛] 這個月跟Target比 */
                        if (valueCurrent < valuePast) {
                            str += '好'
                        } else if (valueCurrent === valuePast) {
                            str += '持平'
                        } else if (valueCurrent > valuePast) {
                            str += '爛'
                        }

                        return str
                    })()

                    targetCliam = Number(targetClaim.AMOUNT)
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
                    dataRate.forEach((e) => {
                        if (obaRateMax < Number(e.TARGET.replace('%', '')) * 1.5) {
                            obaRateMax = Number(e.TARGET.replace('%', '')) * 1.5
                        }
                        if (obaRateMax < Number(e.SORT_RATE.replace('%', ''))) {
                            obaRateMax = Number(e.SORT_RATE.replace('%', '')) * 1.05
                        }
                    })
                    obj.name = 'Sorting Rate'
                    obj.xAxis = arrSixmonth
                    let arr = []
                    arrSixyearmonth.forEach((ym) => {
                        let item = dataRate.filter((e) => e.YM === ym)[0]
                        if (item === undefined)
                            item = {
                                YM: ym,
                                SORT_RATE: '0%',
                            }
                        arr.push(item)
                    })
                    dataRate = arr

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
                    obj.xAxis = arrSixmonth
                    let arr = []
                    arrSixyearmonth.forEach((ym) => {
                        let item = dataCost.filter((e) => e.YM === ym)[0]
                        if (item === undefined)
                            item = {
                                YM: ym,
                                SORTING_FEE: 0,
                            }
                        arr.push(item)
                    })
                    dataCost = arr
                    obj.value = dataCost.map((e) => Math.floor(e.SORTING_FEE / 10000) / 100)
                    obj.target = targetCost
                    obj.max = Math.floor(obaCostMax / 10000) / 100
                    obj.gt = -1
                } else if (type === 2) {
                    /* 資料不足6個月 補0*/
                    dataClaimMonthly.forEach((e) => {
                        if (e.TYPE === 'TARGET') {
                            customerClaimMax =
                                customerClaimMax < Number(e.AMOUNT) * 1.5
                                    ? (customerClaimMax = Number(e.AMOUNT) * 1.5)
                                    : customerClaimMax
                        } else {
                            customerClaimMax =
                                customerClaimMax < Number(e.AMOUNT)
                                    ? (customerClaimMax = Number(e.AMOUNT) * 1.05)
                                    : customerClaimMax
                        }
                    })
                    obj.name = 'Customer Claim'
                    obj.xAxis = arrSixmonth
                    obj.value = dataClaimMonthly
                        .filter((e) => e.TYPE === 'CRC')
                        .slice(-6)
                        .map((e) => Math.floor(e.AMOUNT / 10000) / 100)
                    if (dataActualClaim.length > 0)
                        obj.value[5] =
                            Math.floor(dataActualClaim.map((e) => e.AMOUNT).reduce((a, b) => a + b) / 10000) / 100
                    obj.target = targetCliam
                    obj.max = Math.floor(customerClaimMax / 10000) / 100
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
            getSankeyData(bu)
        }
    )
}

const getSankeyData = (bu) => {
    const getDataOBACost = () => {
        return $.ajax({
            url: jsonPath + '/jsonQuery.do?dataRequestName=cq-warroom-PROD-OBA_Cost003',
            dataType: 'jsonp',
            jsonp: 'jsonpCallback',
        })
    }
    const getDataOBARate = () => {
        return $.ajax({
            url: jsonPath + '/jsonQuery.do?dataRequestName=cq-warroom-PROD-OBA_Rate002',
            dataType: 'jsonp',
            jsonp: 'jsonpCallback',
        })
    }
    const getDataActualClaim = () => {
        return $.ajax({
            url: jsonPath + '/jsonQuery.do?dataRequestName=CRC_IN_APPR_PROC_AMT001',
            dataType: 'jsonp',
            jsonp: 'jsonpCallback',
        })
    }
    $.when(getDataOBACost(), getDataOBARate(), getDataActualClaim()).then((cost, rate, actualClaim) => {
        const dataRate = rate[0].filter((e) => bu.includes(e.PRODUCT_TYPE))
        const dataCost = cost[0].filter((e) => bu.includes(e.PRODUCT_TYPE))
        const dataActualClaim = actualClaim[0]
            .map((item) => productTypeRule(item))
            .filter((e) => bu.includes(e.PRODUCT_TYPE))

        const chartSankey = document.querySelector('.chart-sankey')
        const kpiColor = {
            'OBA Sorting Rate': '#4285f4',
            'OBA Sorting Cost': '#fbbc05',
            'Customer Claim': '#ea4335',
        }
        // customer
        const customerName = Array.from(
            new Set(
                [
                    dataRate.map((e) => e.CUST_GROUP),
                    dataCost.map((e) => e.CUST_GROUP),
                    dataActualClaim.map((e) => e.CUST_GROUP),
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
                obj.value.push({
                    name: key,
                    itemStyle: { color: value },
                })
            } else if (i === 1) {
                obj.value.push({
                    name: key,
                    itemStyle: { color: value },
                })
            } else if (i === 2) {
                obj.value.push({
                    name: key,
                    itemStyle: { color: value },
                })
            }
        }
        obj.value.push({
            name: 'none',
            itemStyle: { color: 'transparent', borderWidth: 0 },
            label: { show: false },
        })
        // right target
        customerName.forEach((item, index) => {
            obj.value.push({ name: item, itemStyle: { color: colorRightList[index] } })
        })
        // links
        obj.links = []
        Object.keys(kpiColor).forEach((category, index) => {
            if (index === 0) {
                if (dataRate.length < 1)
                    return obj.links.push({
                        source: category,
                        target: 'none',
                        value: 0.2,
                        lineStyle: { color: 'transparent' },
                    })
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
                if (dataCost.length < 1)
                    return obj.links.push({
                        source: category,
                        target: 'none',
                        value: 0.3,
                        lineStyle: { color: 'transparent' },
                    })
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
                if (dataActualClaim.length < 1)
                    return obj.links.push({
                        source: category,
                        target: 'none',
                        value: 0.3,
                        lineStyle: { color: 'transparent' },
                    })
                const totalValue = dataActualClaim.map((e) => e.AMOUNT).reduce((a, b) => a + b)
                dataActualClaim.forEach((item) => {
                    const value = item.AMOUNT / totalValue
                    obj.links.push({
                        source: category,
                        target: item.CUST_GROUP,
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
    getAnnualOBACost(bu)
    getAnnualCAERB(bu)
    getKpiJson(bu)
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
                    min: data.gt,
                    max: data.target * 1.05,
                    color: '#008000',
                },
                {
                    min: data.target * 1.05,
                    color: '#e60000',
                },
            ],
            borderWidth: 0,
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
        return (Math.round(Math.random() * 154) + 100).toString(16)
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
