<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("gamessitedatabase", $con);

$result = mysql_query("SELECT * FROM `gm_madden08-ATL_3_offseason-coach`");

echo '<table class="table table-hover" id="coach_table" style="text-align: center; font-size: small">';
echo '<tr><td colspan="20">Coaching Changes</td></tr>';
echo '<tr>';
echo '<td>Position</td>',
 '<td>', 'Name', '</td>',
 '<td>Age</td>',
 '<td>', 'Change', '</td>',
 '<td title="Motovation">', 'MOT', '</td>',
 '<td title="Ethics">', 'ETH', '</td>',
 '<td title="Chemistry">', 'CHM', '</td>',
 '<td title="Knowledge">', 'KNO', '</td>',
 '<td title="Offense">', 'OFF', '</td>',
 '<td title="Defense">', 'DEF', '</td>',
 '<td title="Offensive Line">', 'OL', '</td>',
 '<td title="Quarterback">', 'QB', '</td>',
 '<td title="Half Back">', 'HB', '</td>',
 '<td title="Wide Reciever">', 'WR', '</td>',
 '<td title="Defensive Line">', 'DL', '</td>',
 '<td title="Line Backer">', 'LB', '</td>',
 '<td title="Defensive Back">', 'DB', '</td>',
 '<td title="Safety">', 'S', '</td>',
 '<td title="Kicker">', 'K', '</td>',
 '<td title="Punter">', 'P', '</td>';
echo '</tr>';

if (!isset($_SESSION['Admin'])) {
    $_SESSION['Admin'] = False;
} if ($_SESSION['Admin'] == true) {

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Position'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/Name" onclick="updateCoach(this)">', $row['Name'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/Age" onclick="updateCoach(this)">', $row['Age'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/Chg" onclick="updateCoach(this)">', $row['Chg'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/Moto" onclick="updateCoach(this)">', $row['Moto'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/Eth" onclick="updateCoach(this)">', $row['Eth'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/Chem" onclick="updateCoach(this)">', $row['Chem'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/Kno" onclick="updateCoach(this)">', $row['Kno'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/Off" onclick="updateCoach(this)">', $row['Off'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/Def" onclick="updateCoach(this)">', $row['Def'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/OL" onclick="updateCoach(this)">', $row['OL'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/QB" onclick="updateCoach(this)">', $row['QB'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/RB" onclick="updateCoach(this)">', $row['RB'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/WR" onclick="updateCoach(this)">', $row['WR'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/DL" onclick="updateCoach(this)">', $row['DL'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/LB" onclick="updateCoach(this)">', $row['LB'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/DB" onclick="updateCoach(this)">', $row['DB'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/S" onclick="updateCoach(this)">', $row['S'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/K" onclick="updateCoach(this)">', $row['K'], '</td>',
        '<td id="', $row['Row'], '/ATL/3/P" onclick="updateCoach(this)">', $row['P'], '</td>';
        echo '</tr>';
    }
}

if ($_SESSION['Admin'] == false) {

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Position'], '</td>',
        '<td>', $row['Name'], '</td>',
        '<td>', $row['Age'], '</td>',
        '<td>', $row['Chg'], '</td>',
        '<td>', $row['Moto'], '</td>',
        '<td>', $row['Eth'], '</td>',
        '<td>', $row['Chem'], '</td>',
        '<td>', $row['Kno'], '</td>',
        '<td>', $row['Off'], '</td>',
        '<td>', $row['Def'], '</td>',
        '<td>', $row['OL'], '</td>',
        '<td>', $row['QB'], '</td>',
        '<td>', $row['RB'], '</td>',
        '<td>', $row['WR'], '</td>',
        '<td>', $row['DL'], '</td>',
        '<td>', $row['LB'], '</td>',
        '<td>', $row['DB'], '</td>',
        '<td>', $row['S'], '</td>',
        '<td>', $row['K'], '</td>',
        '<td>', $row['P'], '</td>';
        echo '</tr>';
    }
}

echo '</table>';
mysql_close($con);
?>