<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("gamessitedatabase", $con);

$result = mysql_query("SELECT * FROM `gm_madden08-ATL_3_reg-team`");

echo "<br />";
echo '<table class="table table-hover" id="ATL_3_Reg_Team" style="text-align: center; font-size: small">';
echo '<tr>';
echo '<td colspan="2">', 'Team Stats', '</td>';
echo '</tr>';

if (!isset($_SESSION['Admin'])) {
    $_SESSION['Admin'] = False;
} if ($_SESSION['Admin'] == true) {

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Stat'], '</td>', '<td id="', $row['Row'], '/ATL/3" onclick="updateTeamStat(this)">', $row['Value'], '</td>';
        echo '</tr>';
    }
}

if ($_SESSION['Admin'] == false) {

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Stat'], '</td>', '<td id="', $row['Row'], 'ATL1" onclick="">', $row['Value'], '</td>';
        echo '</tr>';
    }
}

echo '</table>';
mysql_close($con);
?>