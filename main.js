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
        console.log(data)
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

        console.log('OBA:', objOba)
        console.log('CAERB:', objCaerb)
        paintChartsGauge(chartOba, objOba)
        paintChartsGauge(chartcaerb, objCaerb)
    })
}

const navClick = (bu) => {
    getCustomerRankingData(bu)
    getAnuualKpiData(bu)
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
                        name: data.name,
                    },
                ],
                axisLabel: {
                    show: false,
                },
                detail: {
                    formatter: `${data.name} %`,
                    fontSize: 20,
                    fontWeight: 400,
                    color: 'black',
                    offsetCenter: [0, '-35%'],
                },
                pointer: {
                    itemStyle: {
                        color: 'auto',
                    },
                    offsetCenter: [0, -10],
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
                radius: '190%',
                startAngle: 180,
                endAngle: 0,
            },
        ],
    }

    myChart.setOption(option)
}

// Render
const renderNavBar = (data) => {
    data.forEach((item) => {
        if (item === buSelected) {
            navBar.innerHTML += `<a class="nav-item nav-link active" href="#">${item}</a>`
            navClick(buSelected)
            getAnuualKpiData(buSelected)
        } else navBar.innerHTML += `<a class="nav-item nav-link" href="#">${item}</a>`
    })
}
renderNavBar(bu)
