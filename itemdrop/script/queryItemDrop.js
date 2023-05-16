let DROPTYPE
let ITEMNAME
let ZONEID
let MOBNAME
let itemId
let dropType
let dropRate
let poolId
let zoneName


fetch('./globals/droptype.json')
    .then(response => response.json())
    .then(data => {
        DROPTYPE = data
    })
fetch('./globals/itemname.json')
    .then(response => response.json())
    .then(data => {
        ITEMNAME = data
    })
fetch('./globals/zoneid.json')
    .then(response => response.json())
    .then(data => {
        ZONEID = data
    })
fetch('./globals/mobname.json')
    .then(response => response.json())
    .then(data => {
        MOBNAME = data
    })

fetch('./itemdrop/php/query_item_drop.php')
    .then(response => response.json())
    .then(data => {
        itemId = data[0],
        dropType = data[1],
        dropRate = data[2],
        poolId = data[3],
        zoneName = data[4]
    })

function itemSearch() {
    let fieldQuery = document.getElementById('itemField').value

    // create table node
    let table = document.createElement('table')
    table.classList.add('plaintable')

    // create table header node
    let thead = document.createElement('thead')

    // create all content inside table header
    let thead1 = document.createElement('th')
    let thead2 = document.createElement('th')
    let thead3 = document.createElement('th')
    let thead4 = document.createElement('th')
    let thead5 = document.createElement('th')
    thead1.innerHTML = 'Item'
    thead2.innerHTML = 'Drop Type'
    thead3.innerHTML = 'Drop Rate'
    thead4.innerHTML = 'Mob'
    thead5.innerHTML = 'Zone'
    let row1 = document.createElement('tr')
    row1.appendChild(thead1)
    row1.appendChild(thead2)
    row1.appendChild(thead3)
    row1.appendChild(thead4)
    row1.appendChild(thead5)
    thead.appendChild(row1)

    // create table body node
    let tbody = document.createElement('tbody')

    // Creating Content Rows
    for (let i = 0; i < itemId.length; i++) {
        if (ITEMNAME[itemId[i]].includes(fieldQuery.toLowerCase()) && ITEMNAME[itemId[i]].length >= 5 ) {
            let tdata1 = document.createElement('td')
            let tdata2 = document.createElement('td')
            let tdata3 = document.createElement('td')
            let tdata4 = document.createElement('td')
            let tdata5 = document.createElement('td')
            tdata1.innerHTML = ITEMNAME[itemId[i]]
            tdata2.innerHTML = DROPTYPE[dropType[i]]
            tdata3.innerHTML = dropRate[i]
            tdata4.innerHTML = MOBNAME[poolId[i]]
            tdata5.innerHTML = ZONEID[zoneName[i]]
            let row2 = document.createElement('tr')
            row2.appendChild(tdata1)
            row2.appendChild(tdata2)
            row2.appendChild(tdata3)
            row2.appendChild(tdata4)
            row2.appendChild(tdata5)
            tbody.appendChild(row2)
        }
    }

    // Append all content from above to table header and body
    table.appendChild(thead)
    table.appendChild(tbody)

    // Inserts table inside the div
    document.getElementById('result').innerHTML = ''
    document.getElementById('result').appendChild(table)
}

document.getElementById('searchButton').addEventListener('click', itemSearch)
document.getElementById('itemField').addEventListener('keyup', function(event) {
    if (event.code === 'Enter') {
        event.preventDefault()
        itemSearch()
    }
})
