<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("gamessitedatabase", $con);

$result = mysql_query("SELECT * FROM `gm_madden08-ATL_3_info` Where `PreSeason` = 'Y'");

echo "<br />";
echo '<table class="table table-hover" id="ATL_3_Reg_Team" style="text-align: center; font-size: small">';
echo '<tr>';
echo '<td colspan="2">', 'Preseason Info', '</td>';
echo '</tr>';

if (!isset($_SESSION['Admin'])) {
    $_SESSION['Admin'] = False;
} if ($_SESSION['Admin'] == true) {

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Field'], '</td>', '<td id="', $row['Row'], '/ATL/3" onclick="updateInfo(this)">', $row['Value'], '</td>';
        echo '</tr>';
    }
}

if ($_SESSION['Admin'] == false) {

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Field'], '</td>', '<td id="', $row['Row'], 'ATL3" onclick="">', $row['Value'], '</td>';
        echo '</tr>';
    }
}

echo '</table>';
mysql_close($con);
?>