function createMenu() {
    let div = document.querySelector('.menu')
    let table = document.createElement('table')
    let th = document.createElement("th")

    const menuItems = [
        "<button onClick=\"location.href=\'./index.php\'\" type=\"button\">Home</button>",
        "<button onClick=\"location.href=\'https://status.catsangel.com\'\" type=\"button\">Server Status</button>",
        "<button onClick=\"location.href=\'./playersonline.php\'\" type=\"button\">Players Currently Online</button>",
        "<button onClick=\"location.href=\'./weather.php\'\" type=\"button\">Weather Forecast</button>",
        "<button onClick=\"location.href=\'./auctionhouse.php\'\" type=\"button\">Auction House</button>",
        "<button onClick=\"location.href=\'./item_drop.php\'\" type=\"button\">Item Drop</button>",
        "<button onClick=\"location.href=\'./my_account.php\'\" type=\"button\">My Account</button>",
    ]

    div.appendChild(table)
    table.appendChild(th)

    menuItems.forEach((item) => {
        let td = document.createElement("td")
        td.innerHTML = item
        th.appendChild(td)
    })
}

createMenu()
