// API host name
const hostName = 'http://tw071273p/cq-warroom/'
let qs = Qs
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded'

// dom
const navBar = document.querySelector('.navbar-nav'),
    rateValue = document.querySelector('.rate-value')
// Value Default
let buSelected = 'TV'
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

const getCustomerRankingData = (bu) => {
    axios.post(hostName + 'warroom_customer_ranking.php', qs.stringify({ Bu: bu })).then((res) => {
        let data = res.data
        const tbody = document.querySelector('.rank-tbody')
        tbody.innerHTML = ''
        const switchLamp = (value) => {
            let lamp = ''
            switch (true) {
                case greenLamp.includes(value):
                    lamp = 'green'
                    break
                case yellowLamp.includes(value):
                    lamp = 'yellow'
                    break
                case redLamp.includes(value):
                    lamp = 'red'
                    break

                default:
                    console.log(value)
            }
            return lamp
        }
        const regex = new RegExp('^[a-zA-Z]+$')
        data.forEach((item) => {
            item.PastLamp = switchLamp(item.Past)
            item.CurrentLamp = switchLamp(item.Current)
            const pastDiv = `<div><span>${regex.test(item.Past) ? '' : item.Past}</span><div class="circle ${
                item.PastLamp
            }"></div></div>`
            const currentDiv = `<div><span>${regex.test(item.Current) ? '' : item.Current}</span><div class="circle ${
                item.CurrentLamp
            }"></div></div>`
            tbody.innerHTML += `
        <tr>
           <td><img src="./images/${item.CustomerName}.png"/></td>
           <td colspan="2">${pastDiv}</td>
           <td colspan="2">${currentDiv}</td>
           <td class="${item.UpdateData === 'New' ? 'new-case' : 'old-case'}">${item.UpdateData}</td>
        </tr>
        `
        })
        rateValue.innerHTML = calculateRate(data)
    })
}

const getAnuualKpiData = (bu) => {
    axios.post(hostName + 'warroom_annual_metrics.php', qs.stringify({ Bu: bu })).then((res) => {
        const data = res.data[0]
        // dom
        const valueObaAnnualActual = document.querySelector('.value-oba-annual-actual'),
            valueObaAnnualTarget = document.querySelector('.value-oba-annual-target'),
            valueCaerbOpenClose = document.querySelector('.value-caerb-open-close'),
            valueCaerbTarget = document.querySelector('.value-caerb-target'),
            chartOba = document.querySelector('.chart-oba'),
            chartcaerb = document.querySelector('.chart-caerb')

        valueObaAnnualActual.innerHTML = `${Math.floor((data.OBA_Annual_Cost / 1000000) * 100) / 100} M`
        valueObaAnnualTarget.innerHTML = `${Math.floor((data.OBA_Annual_Target / 1000000) * 100) / 100} M`
        valueCaerbOpenClose.innerHTML = `${data.CAERB_Open}/${data.CAERB_close}`
        valueCaerbTarget.innerHTML = `${data.CAERB_target}`
        if (Number(data.OBA_Annual_Cost) >= Number(data.OBA_Annual_Target)) valueObaAnnualActual.style.color = 'red'
        else valueObaAnnualActual.style.color = 'blue'
        if (Number(data.CAERB_Open) + Number(data.CAERB_close) >= Number(data.CAERB_target))
            valueCaerbOpenClose.style.color = 'red'
        else valueCaerbOpenClose.style.color = 'blue'

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

const getKpiData = (bu) => {
    async function allData() {
        const kpi = await axios.post(hostName + 'warroom_annual_metrics.php', qs.stringify({ Bu: bu }))
        const kpiTrend = await axios.post(hostName + 'warroom_kpi_trend.php', qs.stringify({ Bu: bu }))
        const kpiShare = await axios.post(hostName + 'warroom_kpi_share.php', qs.stringify({ Bu: bu }))

        return {
            kpi,
            kpiTrend,
            kpiShare,
        }
    }
    allData().then((res) => {
        const { kpi, kpiTrend, kpiShare } = res
        const titleIndex = ['OBA Sorting Rate', '當月預估 OBA Sorting Cost', 'Customer Claim']
        const tdData = (type, color) => {
            let tdContent = ''
            let data = kpi.data[0]
            if (type.includes('Rate')) {
                tdContent = `
              <td style="background-color:${color};">${Math.floor(Number(data.OBA_Rate) * 10000) / 100}%/月</td>
              <td style="background-color:${color};">${Math.floor(Number(data.OBA_Rate_Target) * 10000) / 100}%/月</td>
              <td style="background-color:${color};"><img src="./images/${data.Rate_Performance}${
                    data.Rate_Improve
                }.png"/></td>
              `
            } else if (type.includes('Cost')) {
                tdContent = `
              <td style="background-color:${color};">${
                    Math.floor((Number(data.OBA_Estimate) / 1000000) * 100) / 100
                }M/月</td>
              <td style="background-color:${color};">${
                    Math.floor((Number(data.OBA_Cost_Target) / 1000000) * 100) / 100
                }M/月</td>
              <td style="background-color:${color};"><img src="./images/${data.OBA_Cost_M_Performance}${
                    data.OBA_Cost_M_Improve
                }.png"/></td>
              `
            } else if (type.includes('Claim')) {
                tdContent = `
              <td style="background-color:${color};">${
                    Math.floor((Number(data.Customer_Claim) / 1000000) * 100) / 100
                }M/月</td>
              <td style="background-color:${color};">${
                    Math.floor((Number(data.Customer_Claim_Target) / 1000000) * 100) / 100
                }M/月</td>
              <td style="background-color:${color};"><img src="./images/${data.Customer_Claim_Performance}${
                    data.Customer_Claim_Improve
                }.png"/></td>
              `
            }
            return tdContent
        }

        const tdChart = (type, index) => {
            let data = kpiTrend.data
            let l = data.length
            const chartDom = document.querySelector(`.chart-line-${index}`)
            data = data.slice(l - 6)
            const obj = {}
            obj.xAxis = data.map((e) => e.Month)

            let obaRateMax = 0
            let obaCostMax = 0
            let customerClaimMax = 0

            obj.name = type

            if (type.includes('Rate')) {
                obj.value = data.map((e) => Math.floor(e.OBA_Rate * 10000) / 100)
                obj.target = Math.floor(data[5].OBA_Rate_Target * 10000) / 100
                data.forEach((e) => {
                    if (obaRateMax < (Math.floor(e.OBA_Rate_Target * 10000) / 100) * 1.5) {
                        obaRateMax = (Math.floor(e.OBA_Rate_Target * 10000) / 100) * 1.5
                    }
                    if (obaRateMax < Math.floor(e.OBA_Rate * 10000) / 100) {
                        obaRateMax = (Math.floor(e.OBA_Rate * 10000) / 100) * 1.05
                    }
                })
                obj.max = obaRateMax
                obj.gt = -0.01
            } else if (type.includes('Cost')) {
                obj.value = data.map((e, index) => {
                    if (index === '5') return Math.floor(Number(e.OBA_Estimate) / 10000) / 100
                    else return Math.floor(Number(e.OBA_Cost) / 10000) / 100
                })
                obj.target = Math.floor(Number(data[5].OBA_Cost_Target) / 10000) / 100
                data.forEach((e) => {
                    if (obaCostMax < e.OBA_Cost_Target * 1.5) {
                        obaCostMax = e.OBA_Cost_Target * 1.5
                    }
                    if (obaCostMax < e.OBA_Cost) {
                        obaCostMax = e.OBA_Cost * 1.05
                    }
                })
                obj.max = Math.floor(obaCostMax / 10000) / 100
                obj.gt = -1
            } else if (type.includes('Claim')) {
                obj.value = data.map((e) => Math.floor(Number(e.Customer_Claim) / 10000) / 100)
                obj.target = Math.floor(Number(data[5].Customer_Claim_Target) / 10000) / 100
                data.forEach((e) => {
                    if (customerClaimMax < e.Customer_Claim_Target * 1.5) {
                        customerClaimMax = e.Customer_Claim_Target * 1.5
                    }
                    if (customerClaimMax < e.Customer_Claim) {
                        customerClaimMax = e.Customer_Claim * 1.05
                    }
                })
                obj.max = Math.floor(customerClaimMax / 10000) / 100
                obj.gt = -1
            }

            paintChartLine(chartDom, obj)
        }

        const lastDiv = (index, color) => {
            if (index === 0) return `<td class="chart-sankey" rowspan="3" style="background-color:${color}"></td>`
            else return ''
        }

        const renderSankey = () => {
            const chartSankey = document.querySelector('.chart-sankey')
            let data = kpiShare.data
            console.log(data)
            const kpiColor = {
                'OBA Sorting Rate': '#70E0E0',
                'OBA Sorting Cost': '#E0FF70',
                'Customer Claim': '#FFA8E0',
            }
            const kpi = Array.from(new Set(data.map((e) => e.KPI)))
            const customerName = Array.from(new Set(data.map((e) => e.CustomerName)))
            const colorList = generateColor(customerName.length)
            const obj = {}
            obj.value = []
            kpi.forEach((item) => {
                obj.value.push({
                    name: item,
                    itemStyle: { color: kpiColor[item.trim()] },
                })
            })
            customerName.forEach((item, index) => {
                obj.value.push({ name: item, itemStyle: { color: colorList[index] } })
            })
            obj.links = []
            data.forEach((item) => {
                obj.links.push({
                    source: item.KPI,
                    target: item.CustomerName,
                    value: item.Share,
                    lineStyle: { color: 'gradient' },
                })
            })

            paintChartSankey(chartSankey, obj)
        }

        const trendTbody = document.querySelector('.block-trend tbody')
        let tbodyContent = ''
        titleIndex.forEach((item, index) => {
            let backgrounColor = index % 2 === 0 ? '#C0DEFF' : '#DEFFC0'
            tbodyContent += `
          <tr>
            <td style="background-color:${backgrounColor}">${item.split(' ').join('<br>')}</td>
            ${tdData(item, backgrounColor)}
            <td style="background-color:${backgrounColor}"><div class="chart-line-${index + 1}"></div></td>
            ${lastDiv(index, backgrounColor)}
          </tr>
          `
        })

        trendTbody.innerHTML = tbodyContent
        titleIndex.forEach((item, index) => {
            tdChart(item, index + 1)
        })
        renderSankey()
    })
}

const navClick = (bu) => {
    getCustomerRankingData(bu)
    getAnuualKpiData(bu)
    getKpiData(bu)
}
function calculateRate(data) {
    const totalValue = data.length
    const overTargetValue = data.filter((e) => e.CurrentLamp === 'green').length

    return `${((overTargetValue / totalValue) * 100).toFixed(0)}%`
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
        // tooltip: {
        //     trigger: 'axis',
        // },
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
                    console.log(e.seriesName)
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
            getAnuualKpiData(buSelected)
            getKpiData(buSelected)
        } else navBar.innerHTML += `<a class="nav-item nav-link" href="#">${item}</a>`
    })
}
renderNavBar(bu)

// Event
navBar.addEventListener('click', (params) => {
    let target = params.target
    Array.from(navBar.children).forEach((el) => {
        el.classList.remove('active')
    })
    target.classList.add('active')
    buSelected = target.innerText
    navClick(buSelected)
})
