fetch("weather/php/queryZoneWeather.php")
  .then((response) => {
    if(!response.ok){
      throw new Error("Something went wrong!")
    }

    return response.json()
  })

  .then((data) => {

    let tbody = document.querySelector(".weather_body")

    for (let zone = 0; zone < data.length; zone++) {
    let tr = document.createElement("tr")
    tbody.appendChild(tr)

      for (let x = 0; x < data[zone].length; x++) {
        let td = document.createElement("td")
        td.innerHTML = data[zone][x]
        tr.appendChild(td)
      }
    }
  })

  .catch(console.error);
