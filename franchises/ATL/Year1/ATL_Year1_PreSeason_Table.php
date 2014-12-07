<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$result = mysql_query("SELECT * FROM `{$fran}_info` Where `Preseason` = 'Y' and `Year` = '1'");

echo "<br />";
echo '<table class="table" id="', $fran, '_', $franYear, '_preseason" style="text-align: center; font-size: small">';

if (!isset($_SESSION['Admin'])) {
    $_SESSION['Admin'] = False;
} if ($_SESSION['Admin'] == true) {

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Field'], '</td>', '<td id="', $row['Row'], '/atl/1" onclick="updateInfo(this)">', $row['Value'], '</td>';
        echo '</tr>';
    }
}

if ($_SESSION['Admin'] == false) {

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Field'], '</td>', '<td id="', $row['Row'], 'atl1" onclick=""><span id="',$row['Identify'],'History" style="cursor: pointer" data-toggle="popover" title="History" data-content="">', $row['Value'], '</span></td>';
        echo '</tr>';
    }
}

echo '</table>';

include ('../../history/preseasonHistory.php');

mysql_close($con);
?>