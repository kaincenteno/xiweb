function createMenu() {
    let div = document.querySelector(".menu")
    let rootUrl = window.location.origin

    const menuItems = [
        ["Home", `${rootUrl}/index.html`],
        ["Server Status", "https://status.catsangel.com"],
        ["Players Currently Online", `${rootUrl}/playersonline`],
        ["Weather Forecast", `${rootUrl}/weather`],
        ["Auction House", `${rootUrl}/auctionhouse`],
        ["Item Drop", `${rootUrl}/itemdrop`],
        ["My Account", `${rootUrl}/my_account.php`],
    ]

    menuItems.forEach((item) => {
        let button = document.createElement("button")
        button.textContent = item[0]
        button.setAttribute("onClick", `location.href='${item[1]}'`)
        div.appendChild(button)
    })
}

createMenu()
