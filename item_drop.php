<!DOCTYPE php>
<html lang="en">
<?php
require'functions/create_menu_bar.php';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="xiweb Item Drop Info">
    <title>xiweb - Item Drop Info</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>

	<?php create_menu_bar();?>
    <h1>List of items dropped by mobs</h1>
    <p>Enter at least four letters of the item you are searching for</p>
    <?php 

    require 'config/database.conf';
        
    $item_name = array();
    $drop_rate = array();
    $mob_name = array();
    $zone_name = array();

    try {
        $conn = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $queryItems  = $conn->query('
            SELECT
                md.itemId,
                CONCAT(md.itemRate * 0.1, "%") AS "drop_rate",
                mg.poolid,
                mg.zoneid
            FROM  mob_droplist md
            INNER JOIN
                mob_groups mg ON md.dropId = mg.dropid
            ORDER BY mg.zoneid, mg.poolid, itemId ASC;');
        $i = 0;
        while ($row = $queryItems->fetch()){
            $item_id[$i] = $row["itemId"];
            $drop_rate[$i] = $row["drop_rate"];
            $pool_id[$i] = $row["poolid"];
            $zone_name[$i] = $row["zoneid"];
            $i = $i + 1;
        }
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }

    ?>

    <script type='module'>
        import ITEMNAME from './globals/ITEMNAME.js'
        import ZONEID from '/globals/ZONEID.js'
        import MOBNAME from '/globals/MOBNAME.js'
    
        let itemId = <?php echo json_encode($item_id); ?>;
        let dropRate = <?php echo json_encode($drop_rate); ?>;
        let poolId = <?php echo json_encode($pool_id); ?>;
        let zoneName = <?php echo json_encode($zone_name); ?>;

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
            thead1.innerHTML = 'Item'
            thead2.innerHTML = 'Drop Rate'
            thead3.innerHTML = 'Mob'
            thead4.innerHTML = 'Zone'
            let row1 = document.createElement('tr')
            row1.appendChild(thead1)
            row1.appendChild(thead2)
            row1.appendChild(thead3)
            row1.appendChild(thead4)
            thead.appendChild(row1)

            // create table body node
            let tbody = document.createElement('tbody')

            // Creating Content Rows
            for (let i = 0; i < itemId.length; i++) {
                if (ITEMNAME[itemId[i]].includes(fieldQuery.toLowerCase()) && ITEMNAME[itemId[i]].length >= 4 ) {
                    let tdata1 = document.createElement('td')
                    let tdata2 = document.createElement('td')
                    let tdata3 = document.createElement('td')
                    let tdata4 = document.createElement('td')
                    tdata1.innerHTML = ITEMNAME[itemId[i]]
                    tdata2.innerHTML = dropRate[i]
                    tdata3.innerHTML = MOBNAME[poolId[i]]
                    tdata4.innerHTML = ZONEID[zoneName[i]]
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
            document.getElementById('result').innerHTML = '';
            document.getElementById('result').appendChild(table)
        }
        
        document.getElementById('searchButton').addEventListener('click', itemSearch);
    </script>

    <input type='text' id='itemField' value=''>
    <button id='searchButton'>Search</button>

    <div id='result'></div>
</body>
