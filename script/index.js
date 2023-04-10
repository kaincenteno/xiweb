const information = {
    "index": {
        "welcome": {
            "h1": {
                "es": "BIENVENIDO A xiweb",
                "zh": "欢迎来到xiweb",
                "en": "WELCOME TO xiweb"
            }
        },
        "aboutUs": {
            "h4": {
                "es": "SOBRE NOSOTROS",
                "zh": "关于我们",
                "en": "ABOUT US"
            },
            "p": {
                "es": "xiweb es una pagina web para mostrar estadisticas de un servidor LandSandBoat, que es un emulador de FFXI.",
                "zh": "xiweb是一个用来展示LandSandBoat服务器数据的网站，LandSandBoat服务器是一个FFXI模拟器。",
                "en": "xiweb is a website to show stats from a LandSandBoat server, which is an FFXI emulator."
            }
        },
        "clientSetup": {
            "h4": {
                "es": "CONFIGURACION DEL CLIENT",
                "zh": "客户端配置",
                "en": "CLIENT SETUP"
            },
            "p": {
                "es": "Por favor visita <a href='https://wiki.catsangel.com'>nuestra wiki</a> para encontrar la guia en como instalar tu cliente.",
                "zh": "关于如何创建客户端，请访问<a href='https://wiki.catsangel.com'>我们的Wiki页面</a>。",
                "en": "Please visit <a href='https://wiki.catsangel.com'>Our Wiki</a> to find how to install your client."
            }
        },
        "discord": {
            "h4": {
                "es": "DISCORD",
                "zh": "DISCORD",
                "en": "DISCORD"
            },
            "p": {
                "es": "Puedes accederlo <a href='https://discord.gg/77j69vffNM'>aqui</a>.",
                "zh": "点击<a href='https://discord.gg/77j69vffNM'>这里</a>访问。",
                "en": "You can access it <a href='https://discord.gg/77j69vffNM'>here</a>."
            }
        },
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
        }
    }
}

console.log(information)

let browser_language = navigator.language
browser_language = browser_language.slice(0, 2)
console.log(browser_language)

function createWelcome() {
    let h1 = document.querySelector(".welcome > h1")

    if (browser_language in information.index.welcome.h1) {
        h1.innerHTML = information.index.welcome.h1[browser_language]
    } else {
        h1.innerHTML = information.index.welcome.h1.en
    }
}

function createAboutUs() {
    let h4 = document.querySelector(".aboutUs > h4")
    let p = document.querySelector(".aboutUs > p")

    if (browser_language in information.index.aboutUs.h4) {
        h4.innerHTML = information.index.aboutUs.h4[browser_language]
        p.innerHTML = information.index.aboutUs.p[browser_language]
    } else {
        h4.innerHTML = information.index.aboutUs.h4.en
        p.innerHTML = information.index.aboutUs.p.en
    }
}

function createClientSetup() {
    let h4 = document.querySelector(".clientSetup > h4")
    let p = document.querySelector(".clientSetup > p")

    if (browser_language in information.index.clientSetup.h4) {
        h4.innerHTML = information.index.clientSetup.h4[browser_language]
        p.innerHTML = information.index.clientSetup.p[browser_language]
    } else {
        h4.innerHTML = information.index.clientSetup.h4.en
        p.innerHTML = information.index.clientSetup.p.en
    }
}

function createDiscord() {
    let h4 = document.querySelector(".discord > h4")
    let p = document.querySelector(".discord > p")

    if (browser_language in information.index.discord.h4) {
        h4.innerHTML = information.index.discord.h4[browser_language]
        p.innerHTML = information.index.discord.p[browser_language]
    } else {
        h4.innerHTML = information.index.discord.h4.en
        p.innerHTML = information.index.discord.p.en
    }
}

function createRulesInfo() {
    let h4 = document.querySelector(".rules > h4")
    let ul = document.querySelector(".rules > ul")

    if (browser_language in information.index.rules.h4) {
        h4.innerHTML = information.index.rules.h4[browser_language]

        information.index.rules.li.forEach((rule) => {
            let li = document.createElement("li")
            li.innerHTML = rule[browser_language]
            ul.appendChild(li)
        })

    } else {
        h4.innerHTML = h4.innerHTML = information.index.rules.h4.en

        information.index.rules.li.forEach((rule) => {
            let li = document.createElement("li")
            li.innerHTML = rule[browser_language]
            ul.appendChild(li)
        })
    }
}

function createServerInfo() {
    let h4 = document.querySelector(".serverSettings > h4")
    let ul = document.querySelector(".serverSettings > ul")

    if (browser_language in information.index.serverSettings.h4) {
        h4.innerHTML = information.index.serverSettings.h4[browser_language]

        information.index.serverSettings.li.forEach((setting) => {
            let li = document.createElement("li")
            li.innerHTML = setting[browser_language]
            ul.appendChild(li)
        })

    } else {
        h4.innerHTML = information.index.serverSettings.h4.en

        information.index.serverSettings.li.forEach((setting) => {
            let li = document.createElement("li")
            li.innerHTML = setting[browser_language]
            ul.appendChild(li)
        })
    }
}

function createContribute() {
    let h4 = document.querySelector(".contribute > h4")
    let p = document.querySelector(".contribute > p")
    let ul = document.querySelector(".contribute > ul")

    if (browser_language.startsWith('es')) {
        h4.innerHTML = "CONTRIBUYE A xiweb"
        p.innerHTML = "Te agradecemos de antemano la entrega de PR o informe de errores o nuevas caracteristicas. Este en un proyecto de pasatiempo persona. No soy bueno en esto pero me alegraria el poder mejorarlo."
        const contributeList = [
            "<a href='https://github.com/kaincenteno/xiweb'>xiweb Github</a>",
            "<a href='https://github.com/kaincenteno/wiki'>wiki Github</a>",
        ]

        contributeList.forEach((setting) => {
            let li = document.createElement("li")
            li.innerHTML = setting
            ul.appendChild(li)
        })
    } else {
        h4.innerHTML = "CONTRIBUTE TO xiweb"
        p.innerHTML = "You are more than welcome to submit a PR or bug report about typos or new features. This is a hobby project for myself, I am not really good at it but I am more than happy to improve it."
        const contributeList = [
            "<a href='https://github.com/kaincenteno/xiweb'>xiweb Github</a>",
            "<a href='https://github.com/kaincenteno/wiki'>wiki Github</a>",
        ]

        contributeList.forEach((setting) => {
            let li = document.createElement("li")
            li.innerHTML = setting
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

createWelcome()
createAboutUs()
createClientSetup()
createDiscord()
createRulesInfo()
createServerInfo()
createContribute()
createBug()
createYourOwnServer()
createContributeUpstream()
