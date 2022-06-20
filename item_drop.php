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
                REPLACE(ib.name, "_", " ") AS "item_name",
                CONCAT(md.itemRate * 0.1, "%") AS "drop_rate",
                REPLACE(mg.name, "_", " ") AS "mob_name",
                REPLACE(zs.name,"_"," ") AS "zone_name"
            FROM  mob_droplist md
            INNER JOIN 
                item_basic ib ON md.itemId = ib.itemid
            INNER JOIN
                mob_groups mg ON md.dropId = mg.dropid
            INNER JOIN
                zone_settings zs ON zs.zoneid = mg.zoneid
            ORDER BY zone_name, mob_name, item_name ASC;');
        $i = 0;
        while ($row = $queryItems->fetch()){
            $item_name[$i] = $row["item_name"];
            $drop_rate[$i] = $row["drop_rate"];
            $mob_name[$i] = $row["mob_name"];
            $zone_name[$i] = $row["zone_name"];
            $i = $i + 1;
        }
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }

    ?>

    <script>
        itemName = <?php echo json_encode($item_name); ?>;
        dropRate = <?php echo json_encode($drop_rate); ?>;
        mobName = <?php echo json_encode($mob_name); ?>;
        zoneName = <?php echo json_encode($zone_name); ?>;

        function itemSearch() {
            fieldQuery = document.getElementById('itemField').value;
            console.log(fieldQuery)


            // create table node
            table = document.createElement('table')
            
            // create table header node
            thead = document.createElement('thead')

            // create all content inside table header
            thead1 = document.createElement('th')
            thead2 = document.createElement('th')
            thead3 = document.createElement('th')
            thead4 = document.createElement('th')
            thead1.innerHTML = 'Item'
            thead2.innerHTML = 'Drop Rate'
            thead3.innerHTML = 'Mob'
            thead4.innerHTML = 'Zone'
            row1 = document.createElement('tr')
            row1.appendChild(thead1)
            row1.appendChild(thead2)
            row1.appendChild(thead3)
            row1.appendChild(thead4)
            thead.appendChild(row1)

            // create table body node
            tbody = document.createElement('tbody')

            // Creating Content Rows
            for (let i = 0; i < itemName.length; i++) {
                if (itemName[i].includes(fieldQuery.toLowerCase()) && itemName[i].length >= 4 ) {
                    tdata1 = document.createElement('td')
                    tdata2 = document.createElement('td')
                    tdata3 = document.createElement('td')
                    tdata4 = document.createElement('td')
                    tdata1.innerHTML = itemName[i]
                    tdata2.innerHTML = dropRate[i]
                    tdata3.innerHTML = mobName[i]
                    tdata4.innerHTML = zoneName[i]
                    row2 = document.createElement('tr')
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
            document.getElementById('result').appendChild(table)
        }
    </script>

    <input type='text' id='itemField' value=''>
    <button onclick='itemSearch()'>Search</button>

    <div id='result'></div>

    
</body>
