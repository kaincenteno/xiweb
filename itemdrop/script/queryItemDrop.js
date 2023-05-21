let DROPTYPE
let ITEMNAME
let ZONEID
let MOBNAME
let itemId
let dropType
let dropRate
let poolId
let zoneName


fetch('/globals/droptype.json')
    .then(response => response.json())
    .then(data => {
        DROPTYPE = data
    })
    .catch(console.error)

fetch('/globals/itemname.json')
    .then(response => response.json())
    .then(data => {
        ITEMNAME = data
    })
    .catch(console.error)

fetch('/globals/zoneid.json')
    .then(response => response.json())
    .then(data => {
        ZONEID = data
    })
    .catch(console.error)

fetch('/globals/mobname.json')
    .then(response => response.json())
    .then(data => {
        MOBNAME = data
    })
    .catch(console.error)

fetch('/itemdrop/php/query_item_drop.php')
    .then(response => response.json())
    .then(data => {
        itemId = data[0],
        dropType = data[1],
        dropRate = data[2],
        poolId = data[3],
        zoneName = data[4]
    })
    .catch(console.error)

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
    thead1.textContent = 'Item'
    thead2.textContent = 'Drop Type'
    thead3.textContent = 'Drop Rate'
    thead4.textContent = 'Mob'
    thead5.textContent = 'Zone'
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
            tdata1.textContent = ITEMNAME[itemId[i]]
            tdata2.textContent = DROPTYPE[dropType[i]]
            tdata3.textContent = dropRate[i]
            tdata4.textContent = MOBNAME[poolId[i]]
            tdata5.textContent = ZONEID[zoneName[i]]
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
    document.getElementById('result').textContent = ''
    document.getElementById('result').appendChild(table)
}

document.getElementById('searchButton').addEventListener('click', itemSearch)
document.getElementById('itemField').addEventListener('keyup', function(event) {
    if (event.code === 'Enter') {
        event.preventDefault()
        itemSearch()
    }
})
