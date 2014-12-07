<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$GetCapHistory = mysql_query("Select * From `{$fran}_info` where `Preseason`='Y' and `Field`='Salary Cap'", $con) or die(mysql_error());

echo '<div id="capHistoryTable" style="display: none">
    <table class="table" style="font-size: smaller">';

while ($CapItem = mysql_fetch_array($GetCapHistory)) {

    echo '<tr><td>Year ',$CapItem['Year'],'</td><td>',$CapItem['Value'],'</td></tr>';
}

echo '</table>
</div>';