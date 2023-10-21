async function getAHCategoryID() {
  const response = await fetch("/globals/ahID.json")
  const jsonData = response.json()

  return jsonData
}

async function queryAuctionHouse(itemName) {
  const response = await fetch("/auctionhouse/php/query_auction_house.php?" + new URLSearchParams({
    "itemName": itemName
  }))
  const jsonData = response.json()

  return jsonData
}

// Gets text from field and creates table
function triggerSearchEvent() {
  let fieldQuery = document.getElementById('itemField').value
  fieldQuery = fieldQuery.replace(/\s/g, '_')
  let ahIdPromise = getAHCategoryID()
  let auctionHousePromise = queryAuctionHouse(fieldQuery)

  Promise.all([ahIdPromise, auctionHousePromise])
    .then((values) => {
      createAuctionHouseTable(values)
    })
}

function createAuctionHouseTable(values) {
  const ahId = values[0]
  const auctionHouse = values[1]

  const itemCategory = auctionHouse[0]
  const itemName = auctionHouse[1]
  const itemStackable = auctionHouse[2]
  const itemListingCount = auctionHouse[3]

  let div = document.querySelector(".auctionHouse")

  // checks if table exists, if so erases it.
  if (document.getElementById("auctionHouseTable")) {
    document.getElementById("auctionHouseTable").remove()
  }

  let table = document.createElement('table')
  table.setAttribute("id", "auctionHouseTable")
  div.appendChild(table)
  table.classList.add('plaintable')

  let thead = document.createElement('thead')
  table.appendChild(thead)

  let th1 = document.createElement('th')
  let th2 = document.createElement('th')
  let th3 = document.createElement('th')
  let th4 = document.createElement('th')
  th1.textContent = 'Category'
  th2.textContent = 'Name'
  th3.textContent = 'Stack'
  th4.textContent = 'Listings'

  let tr = document.createElement('tr')
  thead.appendChild(tr)
  tr.appendChild(th1)
  tr.appendChild(th2)
  tr.appendChild(th3)
  tr.appendChild(th4)

  let tbody = document.createElement('tbody')
  table.appendChild(tbody)

  for (let i = 0; i < itemName.length; i++) {
    let tdata1 = document.createElement('td')
    let tdata2 = document.createElement('td')
    let tdata3 = document.createElement('td')
    let tdata4 = document.createElement('td')
    tdata1.textContent = ahId[itemCategory[i]]
    tdata2.textContent = itemName[i]
    tdata3.textContent = itemStackable[i]
    tdata4.textContent = itemListingCount[i]
    let row2 = document.createElement('tr')
    row2.appendChild(tdata1)
    row2.appendChild(tdata2)
    row2.appendChild(tdata3)
    row2.appendChild(tdata4)
    tbody.appendChild(row2)
  }

  console.log(ahId)
  console.log(auctionHouse)
}

document.getElementById('searchButton').addEventListener('click', function() {
  triggerSearchEvent()
})

document.getElementById('itemField').addEventListener('keyup', function(event) {
  if (event.code === 'Enter') {
    triggerSearchEvent()
  }
})
