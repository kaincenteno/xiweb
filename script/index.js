let browser_language = navigator.language
console.log(browser_language)

function createWelcome() {
    let div = document.querySelector('.welcome')
    let h1 = document.createElement('h1')

    if (browser_language.startsWith('es')) {
        h1.innerHTML = "BIENVENIDO A xiweb"

        div.appendChild(h1)
    } else {
        h1.innerHTML = "WELCOME TO xiweb"

        div.appendChild(h1)
    }
}

function createAboutUs() {
    let div = document.querySelector('.about-us')
    let h4 = document.createElement('h4')
    let p = document.createElement("p")

    if (browser_language.startsWith('es')) {
        h4.innerHTML = "SOBRE NOSOTROS"
        p.innerHTML = "xiweb es una pagina web para mostrar estadisticas de un servidor LandSandBoat, que es un emulador de FFXI"

        div.appendChild(h4)
        div.appendChild(p)
    } else {
        h4.innerHTML = "ABOUT US"
        p.innerHTML = "xiweb is a website to show stats from a LandSandBoat server, which is an FFXI emulator."

        div.appendChild(h4)
        div.appendChild(p)
    }
}

function createClientSetup() {
    let div = document.querySelector('.client-setup')
    let h4 = document.createElement('h4')
    let p = document.createElement('p')

    if (browser_language.startsWith('es')) {
        h4.innerHTML = "CONFIGURACION DEL CLIENT"
        p.innerHTML = "Por favor visita <a href='https://wiki.catsangel.com'>nuestra wiki</a> para encontrar la guia en como instalar tu cliente."

        div.appendChild(h4)
        div.appendChild(p)
    } else {
        h4.innerHTML = "CLIENT SETUP"
        p.innerHTML = "Please visit <a href='https://wiki.catsangel.com'>Our Wiki</a> to find how to install your client."

        div.appendChild(h4)
        div.appendChild(p)
    }
}

function createDiscord() {
    let div = document.querySelector('.discord')
    let h4 = document.createElement('h4')
    let p = document.createElement('p')

    if (browser_language.startsWith('es')) {
        h4.innerHTML = "DISCORD"
        p.innerHTML = "Puedes accederlo <a href='https://discord.gg/77j69vffNM'>aqui</a>."

        div.appendChild(h4)
        div.appendChild(p)
    } else {
        h4.innerHTML = "DISCORD"
        p.innerHTML = "You can access it <a href='https://discord.gg/77j69vffNM'>here</a>."

        div.appendChild(h4)
        div.appendChild(p)
    }
}

function createRulesInfo() {
    let div = document.querySelector('.rules')
    let h4 = document.createElement('h4')
    let ul = document.createElement("ul")

    if (browser_language.startsWith('es')) {
        h4.innerHTML = "LAS REGLAS"
        const rules = [
            "No seas malo con la gente (discriminar, etc).",
            "No hagas beneficio de vulnerabilidades en el juego.",
            "Si encuentras una vulnerabilidad, dinoslo en discord.",
            "Puedes utilizar mas de un personaje a la vez, usar addons y plugins; con tal que no estes malogrando la diversion de los demas.",
            "Mantener el drama fuera del juego y/o discord. Estamos aqui para divertirnos.",
        ]

        div.appendChild(h4)
        div.appendChild(ul)
        rules.forEach((rule) => {
            let li = document.createElement("li")
            li.innerHTML = rule
            ul.appendChild(li)
        })
    } else {
        h4.innerHTML = "THE RULES"
        const rules = [
            "Don't be mean to people (discriminate, etc).",
            "Don't exploit the game.",
            "If you find an exploit, tell us in discord.",
            "You can multibox, and use addons, plugins; as long as you are not messing other people's fun.",
            "Keep the drama away from in-game chat and/or discord. We are here to have fun.",
        ]

        div.appendChild(h4)
        div.appendChild(ul)
        rules.forEach((rule) => {
            let li = document.createElement("li")
            li.innerHTML = rule
            ul.appendChild(li)
        })
    }
}

function createServerInfo() {
    let div = document.querySelector(".server-settings")
    let h4 = document.createElement('h4')
    let ul = document.createElement("ul")

    if (browser_language.startsWith('es')) {
        h4.innerHTML = "OPCIONES DEL SERVIDOR"
        const settingsList = [
            "No hay limite de nivel. Puedes subir de nivel hasta 99, y ponerte traje iLvl",
            "Trusts estan habilitados",
            "Todas las actualizaciones de calidad de vida(Teleporte de Libro/Cristal), Field/Ground of Valor, Records of Eminence)",
            "El contenido no esta bloqueado. Puedes acceder todas las misiones/expansiones, con tal que esten programadas.",
            "Todo lo dicho previamente require ser desbloqueado mediante la afinacion de las misiones.",
        ]

        div.appendChild(h4)
        div.appendChild(ul)
        settingsList.forEach((setting) => {
            let li = document.createElement("li")
            li.innerHTML = setting
            ul.appendChild(li)
        })
    } else {
        h4.innerHTML = "SERVER SETTINGS"
        const settingsList = [
            "No levelcap, You can level up to 99, and wear iLvl gear",
            "Trusts are enabled",
            "All quality of life updates (Book/Crystal teleport, Field/Ground of Valor, Records of Eminence)",
            "Content is not locked, you can access all missions/expansions, as long as they have been scripted",
            "All of the above four items require them being unlocked thru completion of their relevant retail quests.",
        ]

        div.appendChild(h4)
        div.appendChild(ul)
        settingsList.forEach((setting) => {
            let li = document.createElement("li")
            li.innerHTML = setting
            ul.appendChild(li)
        })
    }
}

function createContribute() {
    let div = document.querySelector(".contribute")
    let h4 = document.createElement('h4')
    let p = document.createElement('p')
    let ul = document.createElement("ul")

    if (browser_language.startsWith('es')) {
        h4.innerHTML = "CONTRIBUYE A xiweb"
        p.innerHTML = "Te agradecemos de antemano la entrega de PR o informe de errores o nuevas caracteristicas. Este en un proyecto de pasatiempo persona. No soy bueno en esto pero me alegraria el poder mejorarlo."
        const contributeList = [
            "<a href='https://github.com/kaincenteno/xiweb'>xiweb Github</a>",
            "<a href='https://github.com/kaincenteno/wiki'>wiki Github</a>",
        ]

        div.appendChild(h4)
        div.appendChild(p)
        div.appendChild(ul)
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

        div.appendChild(h4)
        div.appendChild(p)
        div.appendChild(ul)
        contributeList.forEach((setting) => {
            let li = document.createElement("li")
            li.innerHTML = setting
            ul.appendChild(li)
        })
    }
}

function createBug() {
    let div = document.querySelector(".found-bug")
    let h4 = document.createElement('h4')
    let p = document.createElement('p')
    let ul = document.createElement("ul")

    if (browser_language.startsWith('es')) {
        h4.innerHTML = "ENCONTRASTE UN ERROR EN EL JUEGO"
        p.innerHTML = "Si haz encontrado un error en el juego, te recomendamos crear una discusion:"
        const bugList = [
            "<a href='https://github.com/LandSandBoat/server/discussions'>Discusion de Github del LandSandBoat Server</a>",
        ]

        div.appendChild(h4)
        div.appendChild(p)
        div.appendChild(ul)
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

        div.appendChild(h4)
        div.appendChild(p)
        div.appendChild(ul)
        bugList.forEach((setting) => {
            let li = document.createElement("li")
            li.innerHTML = setting
            ul.appendChild(li)
        })
    }
}

function createYourOwnServer() {
    let div = document.querySelector(".your-own-server")
    let h4 = document.createElement('h4')
    let p = document.createElement('p')
    let ul = document.createElement("ul")

    if (browser_language.startsWith('es')) {
        h4.innerHTML = "CREA TU PROPIO SERVIDOR"
        p.innerHTML = "Puedes encontrar toda la informacion necesaria para crear tu propio servidor en la wiki de Github del LandSandBoat Server. Nosotros (xiweb) no provehemos soporte para crear tu propio servidor."
        const ownServerList = [
            "<a href='https://github.com/LandSandBoat/server/wiki'>Github Wiki del LandSandBoat Server</a>",
        ]

        div.appendChild(h4)
        div.appendChild(p)
        div.appendChild(ul)
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

        div.appendChild(h4)
        div.appendChild(p)
        div.appendChild(ul)
        ownServerList.forEach((setting) => {
            let li = document.createElement("li")
            li.innerHTML = setting
            ul.appendChild(li)
        })
    }
}

function createContributeUpstream() {
    let div = document.querySelector(".contribute-upstream")
    let h4 = document.createElement('h4')
    let p = document.createElement('p')
    let ul = document.createElement("ul")

    if (browser_language.startsWith('es')) {
        h4.innerHTML = "CONTRIBUYE UPSTREAM (REPO LANDSANDBOAT)"
        p.innerHTML = "Upstream tienes estandares altos en el codigo que es fusionado. POR FAVOR revise la guia antes de crear cualquier trabajo. No queremos que los sentimientos de nadie sean heridos y/o su tiempo malgastado"
        const upstreamList = [
            "<a href='https://github.com/LandSandBoat/server'>Github del LandSandBoat Server</a>",
        ]

        div.appendChild(h4)
        div.appendChild(p)
        div.appendChild(ul)
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

        div.appendChild(h4)
        div.appendChild(p)
        div.appendChild(ul)
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
