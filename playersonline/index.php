<!DOCTYPE html>
<html lang="en">
<?php header("Refresh: 120"); ?>
<script async type="text/javascript" src="../script/menu.js"></script>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Shows information of players currently online">
  <title>xiweb - Players Online</title>
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="icon" type="image/png" href="favicon-32.png" sizes="32x32">
</head>

<body>
  <div class="content">
    <div class='menu'>
      <table>
        <tbody>
          <tr><tr>
        </tbody>
      </table>
    </div>

    <div class="onlineNow">
      <h1>Characters Online:</h1>
      <table class="plaintable">
        <thead>
          <tr>
            <th>Main Job</th>
            <th>Sub Job</th>
            <th>Name</th>
            <th>Zone</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>

    <script type='module'>
      function createBody() {
        const jobRequest = new Request('../globals/job.json')
        let tbody = document.querySelector(".onlineNow > table > tbody")
        <?php include_once 'php/query_players_online.php'; ?>
        let playersOnline = <?php echo json_encode(query_players_online()); ?>

        // Creating Content Rows
        fetch(jobRequest)
          .then((response) => response.json())
          .then((data) => {
            for (let i = 0; i < playersOnline.length; i++) {
              let td1 = document.createElement('td')
              let td2 = document.createElement('td')
              let td3 = document.createElement('td')
              let td4 = document.createElement('td')
              td1.innerHTML = playersOnline[i]['mlvl'] + " " + data[playersOnline[i]['mjob']]
              if (playersOnline[i]['slvl'] == 0) {
                td2.innerHTML = ''
              } else {
                td2.innerHTML = playersOnline[i]['slvl'] + " " + data[playersOnline[i]['sjob']]
              }
              td3.innerHTML = playersOnline[i]['charname']
              td4.innerHTML = playersOnline[i]['zonename']
              let row2 = document.createElement('tr')
              row2.appendChild(td1)
              row2.appendChild(td2)
              row2.appendChild(td3)
              row2.appendChild(td4)
              tbody.appendChild(row2)
            }
          })
          .catch(console.error);
        }

      createBody()
    </script>
  </div>
</body>
