<?php
require 'functions/query_players_online.php';
header("Refresh: 120");
?>
<script async type="text/javascript" src="script/menu.js"></script>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Shows information of players currently online">
    <title>Canaria - Players Online</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <div class='menu'></div>
    <h3>Characters Online:</h3>

    <script type='module'>
        //import JOB from './globals/job.json' assert {type: 'json'}
        const jobRequest = new Request('./globals/job.json');

        let playersOnline = <?php echo json_encode(query_players_online()); ?>

        let div = document.querySelector(".players_table")

        // create table node
        let table = document.createElement('table')
        table.classList.add('plaintable')

        // create table header node
        let thead = document.createElement('thead')

        // create all content inside table header
        let thead1 = document.createElement('th')
        let thead2 = document.createElement('th')
        let thead3 = document.createElement('th')
        let thead4 = document.createElement('th')
        let thead5 = document.createElement('th')
        thead1.innerHTML = 'Name'
        thead2.innerHTML = 'Zone'
        thead3.innerHTML = 'Main Job'
        thead4.innerHTML = 'Sub Job'
        let row1 = document.createElement('tr')
        row1.appendChild(thead1)
        row1.appendChild(thead2)
        row1.appendChild(thead3)
        row1.appendChild(thead4)
        thead.appendChild(row1)

        // create table body node
        let tbody = document.createElement('tbody')

        // Creating Content Rows
        fetch(jobRequest)
            .then((response) => response.json())
            .then((data) => {
                for (let i = 0; i < playersOnline.length; i++) {

                    let tdata1 = document.createElement('td')
                    let tdata2 = document.createElement('td')
                    let tdata3 = document.createElement('td')
                    let tdata4 = document.createElement('td')
                    tdata1.innerHTML = playersOnline[i]['charname']
                    tdata2.innerHTML = playersOnline[i]['mlvl'] + " " + data[playersOnline[i]['mjob']]
                    tdata3.innerHTML = playersOnline[i]['slvl'] + " " + data[playersOnline[i]['sjob']]
                    tdata4.innerHTML = playersOnline[i]['zonename']
                    let row2 = document.createElement('tr')
                    row2.appendChild(tdata1)
                    row2.appendChild(tdata2)
                    row2.appendChild(tdata3)
                    row2.appendChild(tdata4)
                    tbody.appendChild(row2)
                }
            })
            .catch(console.error);

        // Append all content from above to table header and body
        table.appendChild(thead)
        table.appendChild(tbody)

        // Inserts table inside the div
        div.innerHTML = ''
        div.appendChild(table)
    </script>

    <div class='players_table'></div>
</body>
