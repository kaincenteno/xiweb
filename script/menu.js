function createMenu() {
    let tr = document.querySelector(".menu > table > tbody > tr")
    let rootUrl = window.location.origin



    const menuItems = [
        "<button onClick=\"location.href='" + rootUrl + "/index.php'\" type=\"button\">Home</button>",
        "<button onClick=\"location.href='https://status.catsangel.com'\" type=\"button\">Server Status</button>",
        "<button onClick=\"location.href='" + rootUrl + "/playersonline'\" type=\"button\">Players Currently Online</button>",
        "<button onClick=\"location.href='" + rootUrl + "/weather'\" type=\"button\">Weather Forecast</button>",
        "<button onClick=\"location.href='" + rootUrl + "/auctionhouse'\" type=\"button\">Auction House</button>",
        "<button onClick=\"location.href='" + rootUrl + "/itemdrop'\" type=\"button\">Item Drop</button>",
        "<button onClick=\"location.href='" + rootUrl + "/my_account.php'\" type=\"button\">My Account</button>",
    ]

    menuItems.forEach((item) => {
        let td = document.createElement("td")
        td.innerHTML = item
        tr.appendChild(td)
    })
}

createMenu()
