<!DOCTYPE html>
<html lang="en">
<?php require'functions/query_auction_house.php'; ?>
<script async type="text/javascript" src="script/menu.js"></script>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="xiweb Auction House">
    <title>xiweb - Auction House</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="icon" type="image/png" href="favicon-32.png" sizes="32x32">
</head>

<body>
    <div class='menu'></div>
    <h1> Items in Auction House</h1>
    <p>Enter at least four letters of the item you are searching for</p>
    <?php
        $returnArray = query_auction_house();
        $category = $returnArray[0];
        $name = $returnArray[1];
        $stack  = $returnArray[2];
        $listings = $returnArray[3];
    ?>

<script type='module'>
        let category = <?php echo json_encode($category); ?>;
        let name = <?php echo json_encode($name); ?>;
        let stack = <?php echo json_encode($stack); ?>;
        let listings = <?php echo json_encode($listings); ?>;

        function itemSearch() {
            let fieldQuery = document.getElementById('itemField').value;
            console.log(fieldQuery)

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
            thead1.innerHTML = 'Category'
            thead2.innerHTML = 'Name'
            thead3.innerHTML = 'Stack'
            thead4.innerHTML = 'Listings'
            let row1 = document.createElement('tr')
            row1.appendChild(thead1)
            row1.appendChild(thead2)
            row1.appendChild(thead3)
            row1.appendChild(thead4)
            thead.appendChild(row1)

            // create table body node
            let tbody = document.createElement('tbody')

            // Creating Content Rows
            for (let i = 0; i < name.length; i++) {
                if (name[i].includes(fieldQuery.toLowerCase()) && name[i].length >= 5 ) {
                    let tdata1 = document.createElement('td')
                    let tdata2 = document.createElement('td')
                    let tdata3 = document.createElement('td')
                    let tdata4 = document.createElement('td')
                    tdata1.innerHTML = category[i]
                    tdata2.innerHTML = name[i]
                    tdata3.innerHTML = stack[i]
                    tdata4.innerHTML = listings[i]
                    let row2 = document.createElement('tr')
                    row2.appendChild(tdata1)
                    row2.appendChild(tdata2)
                    row2.appendChild(tdata3)
                    row2.appendChild(tdata4)
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
</body>
