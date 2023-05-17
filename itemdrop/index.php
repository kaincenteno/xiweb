<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="xiweb Item Drop Info">
    <title>xiweb - Item Drop Info</title>
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <link rel="icon" type="image/png" href="/favicon-32.png" sizes="32x32">
</head>

<body>
  <div class="content">
    <div class='menu'></div>

    <h1>List of items dropped by mobs</h1>
    <p>Enter at least four letters of the item you are searching for</p>

    <input type='text' id='itemField' value=''>
    <button id='searchButton'>Search</button>

    <div id='result'></div>
  </div>

  <script type="text/javascript" src="/script/menu.js"></script>
  <script type="text/javascript" src="/itemdrop/script/queryItemDrop.js"></script>
</body>
