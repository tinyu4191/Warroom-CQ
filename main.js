// API host name
const hostName = 'http://tw071273p/cq-warroom/'
let qs = Qs
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded'

// dom
const navBar = document.querySelector('.navbar-nav')

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

const navClick = (bu) => {
    axios.post(hostName + 'warroom_customer_ranking.php', qs.stringify({ Bu: bu })).then((res) => {
        let data = res.data
        const tbody = document.querySelector('.rank-tbody')
        tbody.innerHTML = ''
        const switchLamp = (value) => {
            let lamp = ''
            switch (true) {
                case greenLamp.includes(value):
                    lamp = 'G'
                    break
                case yellowLamp.includes(value):
                    lamp = 'Y'
                    break
                case redLamp.includes(value):
                    lamp = 'R'
                    break

                default:
                    console.log(value)
            }
            return lamp
        }
        data.forEach((item) => {
            item.PastLamp = switchLamp(item.Past)
            item.CurrentLamp = switchLamp(item.Current)
            tbody.innerHTML += `
        <tr>
           <td>${item.CustomerName}</td>
           <td>${item.Past}</td>
           <td>${item.PastLamp}</td>
           <td>${item.Current}</td>
           <td>${item.CurrentLamp}</td>
           <td>${item.UpdateData}</td>
        </tr>
        `
        })
        console.table(data)
    })
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
