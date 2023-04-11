let browser_language = navigator.language
browser_language = browser_language.slice(0, 2)
console.log(browser_language)

function createWelcome(language_data) {
    let h1 = document.querySelector(".welcome > h1")

    if (browser_language in language_data.welcome.h1) {
        h1.innerHTML = language_data.welcome.h1[browser_language]
    } else {
        h1.innerHTML = language_data.welcome.h1.en
    }
}

function createAboutUs(language_data) {
    let h4 = document.querySelector(".aboutUs > h4")
    let p = document.querySelector(".aboutUs > p")

    if (browser_language in language_data.aboutUs.h4) {
        h4.innerHTML = language_data.aboutUs.h4[browser_language]
        p.innerHTML = language_data.aboutUs.p[browser_language]
    } else {
        h4.innerHTML = language_data.aboutUs.h4.en
        p.innerHTML = language_data.aboutUs.p.en
    }
}

function createClientSetup(language_data) {
    let h4 = document.querySelector(".clientSetup > h4")
    let p = document.querySelector(".clientSetup > p")

    if (browser_language in language_data.clientSetup.h4) {
        h4.innerHTML = language_data.clientSetup.h4[browser_language]
        p.innerHTML = language_data.clientSetup.p[browser_language]
    } else {
        h4.innerHTML = language_data.clientSetup.h4.en
        p.innerHTML = language_data.clientSetup.p.en
    }
}

function createDiscord(language_data) {
    let h4 = document.querySelector(".discord > h4")
    let p = document.querySelector(".discord > p")

    if (browser_language in language_data.discord.h4) {
        h4.innerHTML = language_data.discord.h4[browser_language]
        p.innerHTML = language_data.discord.p[browser_language]
    } else {
        h4.innerHTML = language_data.discord.h4.en
        p.innerHTML = language_data.discord.p.en
    }
}

function createRulesInfo(language_data) {
    let h4 = document.querySelector(".rules > h4")
    let ul = document.querySelector(".rules > ul")

    if (browser_language in language_data.rules.h4) {
        h4.innerHTML = language_data.rules.h4[browser_language]

        language_data.rules.li.forEach((rule) => {
            let li = document.createElement("li")
            li.innerHTML = rule[browser_language]
            ul.appendChild(li)
        })

    } else {
        h4.innerHTML = language_data.rules.h4.en

        language_data.li.forEach((rule) => {
            let li = document.createElement("li")
            li.innerHTML = rule.en
            ul.appendChild(li)
        })
    }
}

function createServerInfo(language_data) {
    let h4 = document.querySelector(".serverSettings > h4")
    let ul = document.querySelector(".serverSettings > ul")

    if (browser_language in language_data.serverSettings.h4) {
        h4.innerHTML = language_data.serverSettings.h4[browser_language]

        language_data.serverSettings.li.forEach((setting) => {
            let li = document.createElement("li")
            li.innerHTML = setting[browser_language]
            ul.appendChild(li)
        })

    } else {
        h4.innerHTML = language_data.serverSettings.h4.en

        language_data.serverSettings.li.forEach((setting) => {
            let li = document.createElement("li")
            li.innerHTML = setting.en
            ul.appendChild(li)
        })
    }
}

function createContribute(language_data) {
    let h4 = document.querySelector(".contribute > h4")
    let p = document.querySelector(".contribute > p")
    let ul = document.querySelector(".contribute > ul")

    if (browser_language in language_data.contribute.h4) {
        h4.innerHTML = language_data.contribute.h4[browser_language]
        p.innerHTML = language_data.contribute.p[browser_language]

        language_data.contribute.li.forEach((listItem) => {
            let li = document.createElement("li")
            li.innerHTML = listItem[browser_language]
            ul.appendChild(li)
        })

    } else {
        h4.innerHTML = language_data.contribute.h4.en
        p.innerHTML = language_data.contribute.p.en

        language_data.contribute.li.forEach((listItem) => {
            let li = document.createElement("li")
            li.innerHTML = listItem.en
            ul.appendChild(li)
        })
    }
}

function createBug(language_data) {
    let h4 = document.querySelector(".foundBug > h4")
    let p = document.querySelector(".foundBug > p")
    let ul = document.querySelector(".foundBug > ul")

    if (browser_language in language_data.foundBug.h4) {
        h4.innerHTML = language_data.foundBug.h4[browser_language]
        p.innerHTML = language_data.foundBug.p[browser_language]

        language_data.foundBug.li.forEach((listItem) => {
            let li = document.createElement("li")
            li.innerHTML = listItem[browser_language]
            ul.appendChild(li)
        })

    } else {
        h4.innerHTML = language_data.foundBug.h4.en
        p.innerHTML = language_data.foundBug.p.en

        language_data.foundBug.li.forEach((listItem) => {
            let li = document.createElement("li")
            li.innerHTML = listItem.en
            ul.appendChild(li)
        })
    }
}

function createYourOwnServer(language_data) {
    let h4 = document.querySelector(".yourOwnServer > h4")
    let p = document.querySelector(".yourOwnServer > p")
    let ul = document.querySelector(".yourOwnServer > ul")

    if (browser_language in language_data.yourOwnServer.h4) {
        h4.innerHTML = language_data.yourOwnServer.h4[browser_language]
        p.innerHTML = language_data.yourOwnServer.p[browser_language]

        language_data.yourOwnServer.li.forEach((listItem) => {
            let li = document.createElement("li")
            li.innerHTML = listItem[browser_language]
            ul.appendChild(li)
        })

    } else {
        h4.innerHTML = language_data.yourOwnServer.h4.en
        p.innerHTML = language_data.yourOwnServer.p.en

        language_data.yourOwnServer.li.forEach((listItem) => {
            let li = document.createElement("li")
            li.innerHTML = listItem.en
            ul.appendChild(li)
        })
    }
}

function createContributeUpstream(language_data) {
    let h4 = document.querySelector(".contributeUpstream > h4")
    let p = document.querySelector(".contributeUpstream > p")
    let ul = document.querySelector(".contributeUpstream > ul")

    if (browser_language in language_data.contributeUpstream.h4) {
        h4.innerHTML = language_data.contributeUpstream.h4[browser_language]
        p.innerHTML = language_data.contributeUpstream.p[browser_language]

        language_data.contributeUpstream.li.forEach((listItem) => {
            let li = document.createElement("li")
            li.innerHTML = listItem[browser_language]
            ul.appendChild(li)
        })

    } else {
        h4.innerHTML = language_data.contributeUpstream.h4.en
        p.innerHTML = language_data.contributeUpstream.p.en

        language_data.contributeUpstream.li.forEach((listItem) => {
            let li = document.createElement("li")
            li.innerHTML = listItem.en
            ul.appendChild(li)
        })
    }
}

async function get_language_data() {
    const response = await fetch('./script/language/index.json')
    const language_data = await response.json()
    createWelcome(language_data)
    createAboutUs(language_data)
    createClientSetup(language_data)
    createDiscord(language_data)
    createRulesInfo(language_data)
    createServerInfo(language_data)
    createContribute(language_data)
    createBug(language_data)
    createYourOwnServer(language_data)
    createContributeUpstream(language_data)
}

get_language_data()