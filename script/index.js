function createRulesInfo() {
    var div = document.querySelector('.rules')
    var h4 = document.createElement('h4')
    var ul = document.createElement("ul")

    h4.innerHTML = "THE RULES"
    const rules = [
        "Don't be mean to people (discriminate, etc).",
        "Don't exploit the game.",
        "If you find an exploit, tell us in discord/rocketchat",
        "You can multibox, and use addons, plugins; as long as you are not messing other people's fun.",
        "Keep the drama away from in-game chat and/or discord/rocketchat, we are here to have fun.",
    ]

    div.appendChild(h4)
    div.appendChild(ul)
    rules.forEach((rule) => {
        var li = document.createElement("li")
        li.innerHTML = rule
        ul.appendChild(li)
    })
}

function createServerInfo() {
    var div = document.querySelector(".server-settings")
    var h4 = document.createElement('h4')
    var ul = document.createElement("ul")

    h4.innerHTML = "SERVER SETTINGS"
    const settingsList = [
        "No levelcap, You can level up to 99, and wear iLvl gear",
        "Trusts are enabled",
        "All quality of life updates (Book/Crystal teleport, Field/Ground of Valor, Records of Eminence)",
        "Content is not locked, you can access all missions/expansions, as long as they have been scripted",
        "All of the above four items require them being unlocked thru completion of their relevant retails quests.",
    ]

    div.appendChild(h4)
    div.appendChild(ul)
    settingsList.forEach((setting) => {
        var li = document.createElement("li")
        li.innerHTML = setting
        ul.appendChild(li)
    })
}

createRulesInfo()
createServerInfo()
