function createMenu() {
    let tr = document.querySelector(".menu > table > tbody > tr")

    const menuItems = [
        "<button onClick=\"location.href='./index.php'\" type=\"button\">Home</button>",
        "<button onClick=\"location.href='https://status.catsangel.com'\" type=\"button\">Server Status</button>",
        "<button onClick=\"location.href='./playersonline.php'\" type=\"button\">Players Currently Online</button>",
        "<button onClick=\"location.href='./weather.php'\" type=\"button\">Weather Forecast</button>",
        "<button onClick=\"location.href='./auctionhouse'\" type=\"button\">Auction House</button>",
        "<button onClick=\"location.href='./item_drop.php'\" type=\"button\">Item Drop</button>",
        "<button onClick=\"location.href='./my_account.php'\" type=\"button\">My Account</button>",
    ]

    menuItems.forEach((item) => {
        let td = document.createElement("td")
        td.innerHTML = item
        tr.appendChild(td)
    })
}

createMenu()
