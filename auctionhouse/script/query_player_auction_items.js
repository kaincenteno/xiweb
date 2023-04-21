async function getAHCategoryID() {
  const response = await fetch("globals/ahID.json")
  const jsonData = await response.json()
  return jsonData
}

fetch("auctionhouse/php/queryPlayerAuctionItems.php")
  .then((response) => {
    if(!response.ok){
      throw new Error("Something went wrong!");
    }

    return response.json()
  })

  .then((data) => {

    const itemCategory = data[0]
    const itemName = data[1]
    const itemStackable = data[2]
    const itemListingCount = data[3]

    if (itemCategory.length == 0) {
      return
    }

    let div = document.querySelector(".myAuctionHouse")
    let h1 = document.createElement('h1')
    h1.innerHTML = "First Player Items In Auction House"
    div.appendChild(h1)

    let table = document.createElement('table')
    div.appendChild(table)
    table.classList.add('plaintable')

    let thead = document.createElement('thead')
    table.appendChild(thead)

    let th1 = document.createElement('th')
    let th2 = document.createElement('th')
    let th3 = document.createElement('th')
    let th4 = document.createElement('th')
    th1.innerHTML = 'Category'
    th2.innerHTML = 'Name'
    th3.innerHTML = 'Stack'
    th4.innerHTML = 'Listings'

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
      tdata1.innerHTML = itemCategory[i]
      tdata2.innerHTML = itemName[i]
      tdata3.innerHTML = itemStackable[i]
      tdata4.innerHTML = itemListingCount[i]
      let row2 = document.createElement('tr')
      row2.appendChild(tdata1)
      row2.appendChild(tdata2)
      row2.appendChild(tdata3)
      row2.appendChild(tdata4)
      tbody.appendChild(row2)
    }

    let ahID = getAHCategoryID()
    Promise.allSettled([ahID])
      .then((results) =>
        results.forEach((result) => {
          let categoryId = document.querySelectorAll(".myAuctionHouse > table > tbody > tr > td:first-child")

          for (let element of categoryId) {
            element.innerHTML = result.value[element.innerHTML]

          }}
        )
      )
  })
