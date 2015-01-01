<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

//Assets History
$GetAssetHistory = mysql_query("Select * From `{$fran}_info` where `Field`='Team Assets'", $con) or die(mysql_error());

echo '<div id="assetHistoryTable" style="display: none">
    <table class="table" style="font-size: smaller">';

while ($AssetItem = mysql_fetch_array($GetAssetHistory)) {

    echo '<tr><td>Year ',$AssetItem['Year'],'</td><td>',$AssetItem['Value'],'</td></tr>';
}

echo '</table>
</div>';

//Regular Season Simulated History
$GetRegSimHistory = mysql_query("Select * From `{$fran}_info` where `Field`='Regular Season Simulated'", $con) or die(mysql_error());

echo '<div id="regsimHistoryTable" style="display: none">
    <table class="table" style="font-size: smaller">';

while ($RegSimItem = mysql_fetch_array($GetRegSimHistory)) {

    echo '<tr><td>Year ',$RegSimItem['Year'],'</td><td>',$RegSimItem['Value'],'</td></tr>';
}

echo '</table>
</div>';

//Training Staff History
$GettrainStaffHistory = mysql_query("Select * From `{$fran}_info` where `Field`='Training Staff'", $con) or die(mysql_error());

echo '<div id="trainHistoryTable" style="display: none">
    <table class="table" style="font-size: smaller">';

while ($trainStaffItem = mysql_fetch_array($GettrainStaffHistory)) {

    echo '<tr><td>Year ',$trainStaffItem['Year'],'</td><td>',$trainStaffItem['Value'],'</td></tr>';
}

echo '</table>
</div>';

//Relocation History
$GetReloHistory = mysql_query("Select * From `{$fran}_info` where `Field`='Team Relocated'", $con) or die(mysql_error());

echo '<div id="reloHistoryTable" style="display: none">
    <table class="table" style="font-size: smaller">';

while ($ReloItem = mysql_fetch_array($GetReloHistory)) {

    echo '<tr><td>Year ',$ReloItem['Year'],'</td><td>',$ReloItem['Value'],'</td></tr>';
}

echo '</table>
</div>';