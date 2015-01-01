<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

//Salary Cap History
$GetCapHistory = mysql_query("Select * From `{$fran}_info` where `Preseason`='Y' and `Field`='Salary Cap'", $con) or die(mysql_error());

echo '<div id="capHistoryTable" style="display: none">
    <table class="table" style="font-size: smaller">';

while ($CapItem = mysql_fetch_array($GetCapHistory)) {

    echo '<tr><td>Year ',$CapItem['Year'],'</td><td>',$CapItem['Value'],'</td></tr>';
}

echo '</table>
</div>';

//Cap Room History
$GetRoomHistory = mysql_query("Select * From `{$fran}_info` where `Preseason`='Y' and `Field`='Cap Room'", $con) or die(mysql_error());

echo '<div id="roomHistoryTable" style="display: none">
    <table class="table" style="font-size: smaller">';

while ($RoomItem = mysql_fetch_array($GetRoomHistory)) {

    echo '<tr><td>Year ',$RoomItem['Year'],'</td><td>',$RoomItem['Value'],'</td></tr>';
}

echo '</table>
</div>';

//Cap Penalties History
$GetPenHistory = mysql_query("Select * From `{$fran}_info` where `Preseason`='Y' and `Field`='Cap Penalties'", $con) or die(mysql_error());

echo '<div id="penHistoryTable" style="display: none">
    <table class="table" style="font-size: smaller">';

while ($PenItem = mysql_fetch_array($GetPenHistory)) {

    echo '<tr><td>Year ',$PenItem['Year'],'</td><td>',$PenItem['Value'],'</td></tr>';
}

echo '</table>
</div>';

//Team Salary History
$GetSalaryHistory = mysql_query("Select * From `{$fran}_info` where `Preseason`='Y' and `Field`='Team Salary'", $con) or die(mysql_error());

echo '<div id="salaryHistoryTable" style="display: none">
    <table class="table" style="font-size: smaller">';

while ($SalaryItem = mysql_fetch_array($GetSalaryHistory)) {

    echo '<tr><td>Year ',$SalaryItem['Year'],'</td><td>',$SalaryItem['Value'],'</td></tr>';
}

echo '</table>
</div>';

//NFL Icons History
$GetIconsHistory = mysql_query("Select * From `{$fran}_info` where `Preseason`='Y' and `Field`='NFL Icons'", $con) or die(mysql_error());

echo '<div id="iconsHistoryTable" style="display: none">
    <table class="table" style="font-size: smaller">';

while ($IconsItem = mysql_fetch_array($GetIconsHistory)) {

    echo '<tr><td>Year ',$IconsItem['Year'],'</td><td>',$IconsItem['Value'],'</td></tr>';
}

echo '</table>
</div>';

//Rivals History
$GetRivalsHistory = mysql_query("Select * From `{$fran}_info` where `Preseason`='Y' and `Field`='Rivals'", $con) or die(mysql_error());

echo '<div id="rivalsHistoryTable" style="display: none">
    <table class="table" style="font-size: smaller">';

while ($RivalsItem = mysql_fetch_array($GetRivalsHistory)) {

    echo '<tr><td>Year ',$RivalsItem['Year'],'</td><td>',$RivalsItem['Value'],'</td></tr>';
}

echo '</table>
</div>';