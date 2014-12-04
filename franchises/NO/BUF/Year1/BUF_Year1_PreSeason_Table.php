<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("gamessitedatabase", $con);

$result = mysql_query("SELECT * FROM `gm_madden08-buf_1_info` Where `PreSeason` = 'Y'");

echo "<br />";
echo '<table class="CSSTableGenerator" id="buf_1_Preseason">';
echo '<tr>';
echo '<td colspan="2">', 'Preseason Info', '</td>';
echo '</tr>';

if (!isset($_SESSION['Admin'])) {
    $_SESSION['Admin'] = False;
} if ($_SESSION['Admin'] == true) {

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Field'], '</td>', '<td id="', $row['Row'], 'buf1" onclick="updateInfo(this)">', $row['Value'], '</td>';
        echo '</tr>';
    }
}

if ($_SESSION['Admin'] == false) {

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Field'], '</td>', '<td id="', $row['Row'], 'buf1" onclick="">', $row['Value'], '</td>';
        echo '</tr>';
    }
}

echo '</table>';
mysql_close($con);
?>