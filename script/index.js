const information = {
    "index": {
        "rules": {
            "h4": {
                "es": "LAS REGLAS",
                "zh": "玩家守则",
                "en": "THE RULES"
            },
            "li": [
                {
                    "es": "No seas malo con la gente (discriminar, etc).",
                    "zh": "请不要骚扰其他玩家，包括并不限制与辱骂，人身攻击等。",
                    "en": "Don't be mean to people (discriminate, etc)."
                },
                {
                    "es": "No hagas beneficio de vulnerabilidades en el juego.",
                    "zh": "请勿使用修改器等作弊软件。",
                    "en": "Don't exploit the game."
                },
                {
                    "es": "Si encuentras una vulnerabilidad, dinoslo en discord.",
                    "zh": "如果您发现有人使用修改器等作弊软件，请在Discord通知我们。",
                    "en": "If you find an exploit, tell us in discord."
                },
                {
                    "es": "Puedes utilizar mas de un personaje a la vez, usar addons y plugins; con tal que no estes malogrando la diversion de los demas.",
                    "zh": "在不影响他人游戏体验的条件下，你可以使用multibox, addons或者plugins。",
                    "en": "You can multibox, and use addons, plugins; as long as you are not messing other people's fun."
                },
                {
                    "es": "Mantener el drama fuera del juego y/o discord. Estamos aqui para divertirnos.",
                    "zh": "观点不合请心平气和地讨论，请不要在Chat以及Discord吵架（喜欢吵得人请去微博或推特）。",
                    "en": "Keep the drama away from in-game chat and/or discord. We are here to have fun."
                }
            ]
        },
        "serverSettings": {
            "h4": {
                "es": "OPCIONES DEL SERVIDOR",
                "zh": "",
                "en": "SERVER SETTINGS"
            },
            "li": [
                {
                    "es": "No hay limite de nivel. Puedes subir de nivel hasta 99, y ponerte traje iLvl.",
                    "zh": "",
                    "en": "No levelcap, You can level up to 99, and wear iLvl gear."
                },
                {
                    "es": "Trusts estan habilitados.",
                    "zh": "",
                    "en": "Trusts are enabled."
                },
                {
                    "es": "Todas las actualizaciones de calidad de vida(Teleporte de Libro/Cristal, Field/Ground of Valor, Records of Eminence).",
                    "zh": "",
                    "en": "All quality of life updates (Book/Crystal teleport, Field/Ground of Valor, Records of Eminence)"
                },
                {
                    "es": "El contenido no esta bloqueado. Puedes acceder todas las misiones/expansiones, con tal que esten programadas.",
                    "zh": "",
                    "en": "Content is not locked, you can access all missions/expansions, as long as they have been scripted"
                },
                {
                    "es": "Todo lo dicho previamente require ser desbloqueado mediante la afinacion de las misiones.",
                    "zh": "",
                    "en": "All of the above four items require them being unlocked thru completion of their relevant retail quests."
                }
            ]
        },
        "contribute": {
            "h4": {
                "es": "CONTRIBUYE A xiweb",
                "zh": "",
                "en": "CONTRIBUTE TO xiweb"
            },
            "p": {
                "es": "Te agradecemos de antemano la entrega de PR o informe de errores o nuevas caracteristicas. Este en un proyecto de pasatiempo persona. No soy bueno en esto pero me alegraria el poder mejorarlo.",
                "zh": "",
                "en": "You are more than welcome to submit a PR or bug report about typos or new features. This is a hobby project for myself, I am not really good at it but I am more than happy to improve it."
            },
            "li": [
                {
                    "es": "<a href='https://github.com/kaincenteno/xiweb'>xiweb Github</a>.",
                    "zh": "<a href='https://github.com/kaincenteno/xiweb'>xiweb Github</a>。",
                    "en": "<a href='https://github.com/kaincenteno/xiweb'>xiweb Github</a>."
                },
                {
                    "es": "<a href='https://github.com/kaincenteno/wiki'>wiki Github</a>.",
                    "zh": "<a href='https://github.com/kaincenteno/wiki'>wiki Github</a>。",
                    "en": "<a href='https://github.com/kaincenteno/wiki'>wiki Github</a>."
                }
            ]
        }
    }
}

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

function createBug() {
    let h4 = document.querySelector(".foundBug > h4")
    let p = document.querySelector(".foundBug > p")
    let ul = document.querySelector(".foundBug > ul")

    if (browser_language.startsWith('es')) {
        h4.innerHTML = "ENCONTRASTE UN ERROR EN EL JUEGO"
        p.innerHTML = "Si haz encontrado un error en el juego, te recomendamos crear una discusion:"
        const bugList = [
            "<a href='https://github.com/LandSandBoat/server/discussions'>Discusion de Github del LandSandBoat Server</a>",
        ]

        bugList.forEach((setting) => {
            let li = document.createElement("li")
            li.innerHTML = setting
            ul.appendChild(li)
        })
    } else {
        h4.innerHTML = "FOUND A BUG IN THE GAME"
        p.innerHTML = "We encourage you to submit it through a discussion. If you have found a bug in the game: "
        const bugList = [
            "<a href='https://github.com/LandSandBoat/server/discussions'>LandSandBoat Server Github Discussion</a>",
        ]

        bugList.forEach((setting) => {
            let li = document.createElement("li")
            li.innerHTML = setting
            ul.appendChild(li)
        })
    }
}

function createYourOwnServer() {
    let h4 = document.querySelector(".yourOwnServer > h4")
    let p = document.querySelector(".yourOwnServer > p")
    let ul = document.querySelector(".yourOwnServer > ul")


    if (browser_language.startsWith('es')) {
        h4.innerHTML = "CREA TU PROPIO SERVIDOR"
        p.innerHTML = "Puedes encontrar toda la informacion necesaria para crear tu propio servidor en la wiki de Github del LandSandBoat Server. Nosotros (xiweb) no provehemos soporte para crear tu propio servidor."
        const ownServerList = [
            "<a href='https://github.com/LandSandBoat/server/wiki'>Github Wiki del LandSandBoat Server</a>",
        ]

        ownServerList.forEach((setting) => {
            let li = document.createElement("li")
            li.innerHTML = setting
            ul.appendChild(li)
        })
    } else {
        h4.innerHTML = "RUN YOUR OWN SERVER"
        p.innerHTML = "You can find all the information needed to run your own private server by going to the project's github wiki. We (xiweb) do not provide support for setting up your own server."
        const ownServerList = [
            "<a href='https://github.com/LandSandBoat/server/wiki'>LandSandBoat Server Github Wiki</a>",
        ]

        ownServerList.forEach((setting) => {
            let li = document.createElement("li")
            li.innerHTML = setting
            ul.appendChild(li)
        })
    }
}

function createContributeUpstream() {
    let h4 = document.querySelector(".contributeUpstream > h4")
    let p = document.querySelector(".contributeUpstream > p")
    let ul = document.querySelector(".contributeUpstream > ul")

    if (browser_language.startsWith('es')) {
        h4.innerHTML = "CONTRIBUYE UPSTREAM (REPO LANDSANDBOAT)"
        p.innerHTML = "Upstream tienes estandares altos en el codigo que es fusionado. POR FAVOR revise la guia antes de crear cualquier trabajo. No queremos que los sentimientos de nadie sean heridos y/o su tiempo malgastado"
        const upstreamList = [
            "<a href='https://github.com/LandSandBoat/server'>Github del LandSandBoat Server</a>",
        ]

        upstreamList.forEach((setting) => {
            let li = document.createElement("li")
            li.innerHTML = setting
            ul.appendChild(li)
        })
    } else {
        h4.innerHTML = "CONTRIBUTE UPSTREAM (LANDSANDBOAT REPO)"
        p.innerHTML = "Upstream has high standards on the code being merged. PLEASE PLEASE PLEASE check past PRs and read their guidelines before submitting any work. We do not want anyone's feelings hurt and/or their time wasted."
        const upstreamList = [
            "<a href='https://github.com/LandSandBoat/server'>LandSandBoat Server Github</a>",
        ]

        upstreamList.forEach((setting) => {
            let li = document.createElement("li")
            li.innerHTML = setting
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
    createBug()
    createYourOwnServer()
    createContributeUpstream()
}

get_language_data()