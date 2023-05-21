async function getLanguageData() {
    let response = await fetch("/script/language/index.json")
    let jsonData =  response.json()

    return jsonData
  }

let languageDataPromise = getLanguageData()

Promise.all([languageDataPromise])
    .then((values) => {
        let languageData = values[0]
        let browser_language = navigator.language
        browser_language = browser_language.slice(0, 2)

        for(let languageId in languageData) {
            if (["zh", "es"].includes(browser_language)) {
                let idTag = document.getElementById(languageId)
                idTag.textContent = languageData[languageId][browser_language]
            } else {
                let idTag = document.getElementById(languageId)
                idTag.textContent = languageData[languageId]["en"]
            }
        }
    })
