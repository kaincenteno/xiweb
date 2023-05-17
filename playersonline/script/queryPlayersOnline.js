async function getJobIds() {
  let response = await fetch("/globals/job.json")
  let jsonData =  response.json()

  return jsonData
}

async function getPlayersOnline() {
  let response = await fetch("/playersonline/php/query_players_online.php")
  let jsonData = response.json()

  return jsonData
}

let jobIdPromise = getJobIds()
let playersOnlinePromise = getPlayersOnline()

Promise.all([jobIdPromise, playersOnlinePromise])
  .then((values) => {
    let jobId = values[0]
    let playersOnline = values[1]
    let tbody = document.querySelector(".onlineNow > table > tbody")

    for(let row = 0; row < playersOnline.length; row++) {
      let tr = document.createElement("tr")

      let td1 = document.createElement("td")
      let td2 = document.createElement("td")
      let td3 = document.createElement("td")
      let td4 = document.createElement("td")
      td1.textContent = playersOnline[row]["mlvl"] + " " + jobId[playersOnline[row]["mjob"]]
      tr.appendChild(td1)

      if(playersOnline[row]["slvl"] == 0) {
        td2.textContent = ""
      } else {
        td2.textContent = playersOnline[row]["slvl"] + " " + jobId[playersOnline[row]["sjob"]]
      }
      tr.appendChild(td2)

      td3.textContent = playersOnline[row]["charname"]
      tr.appendChild(td3)
      td4.textContent = playersOnline[row]["zonename"]
      tr.appendChild(td4)

      tbody.appendChild(tr)
    }
  })
