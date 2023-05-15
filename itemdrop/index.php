<!DOCTYPE html>
<html lang="en">
<?php require_once'php/query_item_drop.php'; ?>
<script async type="text/javascript" src="../script/menu.js"></script>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="xiweb Item Drop Info">
    <title>xiweb - Item Drop Info</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="icon" type="image/png" href="favicon-32.png" sizes="32x32">
</head>

<body>
  <div class="content">
    <div class='menu'></div>

    <h1>List of items dropped by mobs</h1>
    <p>Enter at least four letters of the item you are searching for</p>

    <script type='module'>
        let ITEMNAME
        let ZONEID
        let MOBNAME
        import DROPTYPE from './globals/DROPTYPE.js'
        fetch('./globals/itemname.json')
            .then(response => response.json())
            .then(data => {
                ITEMNAME = data
            })
        fetch('./globals/zoneid.json')
            .then(response => response.json())
            .then(data => {
                ZONEID = data
            })
        fetch('./globals/mobname.json')
            .then(response => response.json())
            .then(data => {
                MOBNAME = data
            })

        let [itemId, dropType, dropRate, poolId, zoneName] = <?php echo json_encode(query_item_drop()); ?>

        function itemSearch() {
            let fieldQuery = document.getElementById('itemField').value

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
            thead1.innerHTML = 'Item'
            thead2.innerHTML = 'Drop Type'
            thead3.innerHTML = 'Drop Rate'
            thead4.innerHTML = 'Mob'
            thead5.innerHTML = 'Zone'
            let row1 = document.createElement('tr')
            row1.appendChild(thead1)
            row1.appendChild(thead2)
            row1.appendChild(thead3)
            row1.appendChild(thead4)
            row1.appendChild(thead5)
            thead.appendChild(row1)

            // create table body node
            let tbody = document.createElement('tbody')

            // Creating Content Rows
            for (let i = 0; i < itemId.length; i++) {
                if (ITEMNAME[itemId[i]].includes(fieldQuery.toLowerCase()) && ITEMNAME[itemId[i]].length >= 5 ) {
                    let tdata1 = document.createElement('td')
                    let tdata2 = document.createElement('td')
                    let tdata3 = document.createElement('td')
                    let tdata4 = document.createElement('td')
                    let tdata5 = document.createElement('td')
                    tdata1.innerHTML = ITEMNAME[itemId[i]]
                    tdata2.innerHTML = DROPTYPE[dropType[i]]
                    tdata3.innerHTML = dropRate[i]
                    tdata4.innerHTML = MOBNAME[poolId[i]]
                    tdata5.innerHTML = ZONEID[zoneName[i]]
                    let row2 = document.createElement('tr')
                    row2.appendChild(tdata1)
                    row2.appendChild(tdata2)
                    row2.appendChild(tdata3)
                    row2.appendChild(tdata4)
                    row2.appendChild(tdata5)
                    tbody.appendChild(row2)
                }
            }

            // Append all content from above to table header and body
            table.appendChild(thead)
            table.appendChild(tbody)

            // Inserts table inside the div
            document.getElementById('result').innerHTML = ''
            document.getElementById('result').appendChild(table)
        }

        document.getElementById('searchButton').addEventListener('click', itemSearch)
        document.getElementById('itemField').addEventListener('keyup', function(event) {
            if (event.code === 'Enter') {
                event.preventDefault()
                itemSearch()
            }
        })

    </script>

    <input type='text' id='itemField' value=''>
    <button id='searchButton'>Search</button>

    <div id='result'></div>
  </div>
</body>
