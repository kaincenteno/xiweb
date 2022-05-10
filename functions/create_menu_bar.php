<?php 
function create_menu_bar(){
    echo '<table class="menubar"><tr>';
    echo '<td><button onClick="location.href=\'./index.php\'" type="button">Home</button></td>';
    echo '<td><button onClick="location.href=\'https://status.catsangel.com\'" type="button">Server Status</button></td>';
    echo '<td><button onClick="location.href=\'./playersonline.php\'" type="button">Players Currently Online</button></td>';
    echo '<td><button onClick="location.href=\'./weather.php\'" type="button">Weather Forecast</button></td>';
    echo '<td><button onClick="location.href=\'./auctionhouse.php\'" type="button">Auction House</button></td>';
    echo '</tr></table>';
}
?>
