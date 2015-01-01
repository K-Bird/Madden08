<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

//Head Coach History
$GetHCHistory = mysql_query("Select * From `{$fran}_coaches` where `Title`='HC'", $con) or die(mysql_error());

echo '<div id="HCHistoryTable" style="display: none">
    <table class="table" style="font-size: smaller">';

while ($HCItem = mysql_fetch_array($GetHCHistory)) {

    echo '<tr><td>Year ', $HCItem['Year'], '</td><td>', $HCItem['Name'], '</td></tr>';
}

echo '</table>
</div>';

//Offensive Coordinator History
$GetOCHistory = mysql_query("Select * From `{$fran}_coaches` where `Title`='OC'", $con) or die(mysql_error());

echo '<div id="OCHistoryTable" style="display: none">
    <table class="table" style="font-size: smaller">';

while ($OCItem = mysql_fetch_array($GetOCHistory)) {

    echo '<tr><td>Year ', $OCItem['Year'], '</td><td>', $OCItem['Name'], '</td></tr>';
}

echo '</table>
</div>';

//Defensive Coordinator History
$GetDCHistory = mysql_query("Select * From `{$fran}_coaches` where `Title`='DC'", $con) or die(mysql_error());

echo '<div id="DCHistoryTable" style="display: none">
    <table class="table" style="font-size: smaller">';

while ($DCItem = mysql_fetch_array($GetDCHistory)) {

    echo '<tr><td>Year ', $DCItem['Year'], '</td><td>', $DCItem['Name'], '</td></tr>';
}

echo '</table>
</div>';

//Special Teams Coordinator History
$GetSTHistory = mysql_query("Select * From `{$fran}_coaches` where `Title`='ST'", $con) or die(mysql_error());

echo '<div id="STHistoryTable" style="display: none">
    <table class="table" style="font-size: smaller">';

while ($STItem = mysql_fetch_array($GetSTHistory)) {

    echo '<tr><td>Year ', $STItem['Year'], '</td><td>', $STItem['Name'], '</td></tr>';
}

echo '</table>
</div>';
