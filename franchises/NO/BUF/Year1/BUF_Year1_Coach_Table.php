<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("gamessitedatabase", $con);

$result = mysql_query("SELECT * FROM `gm_madden08-buf_1_offseason-coach`");

echo '<table class="CSSTableGenerator" id="coach_table">';
echo '<tr><td colspan="19">Coaching Changes</td></tr>';
echo '<tr>';
echo '<td>Position</td>',
 '<td>', 'Name', '</td>',
 '<td>Age</td>',
 '<td>', 'Change', '</td>',
 '<td>', 'Motovation', '</td>',
 '<td>', 'Ethics', '</td>',
 '<td>', 'Chemistry', '</td>',
 '<td>', 'Knowledge', '</td>',
 '<td>', 'Offense', '</td>',
 '<td>', 'Defense', '</td>',
 '<td>', 'Offensive Line', '</td>',
 '<td>', 'Quarterback', '</td>',
 '<td>', 'Half Back', '</td>',
 '<td>', 'Wide Receiver', '</td>',
 '<td>', 'Defensive Line', '</td>',
 '<td>', 'Line Backer', '</td>',
 '<td>', 'Defensive Back', '</td>',
 '<td>', 'Safety', '</td>',
 '<td>', 'Kicker', '</td>',
 '<td>', 'Punter', '</td>';
echo '</tr>';

if (!isset($_SESSION['Admin'])) {
    $_SESSION['Admin'] = False;
} if ($_SESSION['Admin'] == true) {

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Position'], '</td>',
        '<td id="', $row['Row'], 'buf1Name" onclick="updateCoach(this)">', $row['Name'], '</td>',
        '<td id="', $row['Row'], 'buf1Age" onclick="updateCoach(this)">', $row['Age'], '</td>',
        '<td id="', $row['Row'], 'buf1Chg" onclick="updateCoach(this)">', $row['Chg'], '</td>',
        '<td id="', $row['Row'], 'buf1Moto" onclick="updateCoach(this)">', $row['Moto'], '</td>',
        '<td id="', $row['Row'], 'buf1Eth" onclick="updateCoach(this)">', $row['Eth'], '</td>',
        '<td id="', $row['Row'], 'buf1Chem" onclick="updateCoach(this)">', $row['Chem'], '</td>',
        '<td id="', $row['Row'], 'buf1Kno" onclick="updateCoach(this)">', $row['Kno'], '</td>',
        '<td id="', $row['Row'], 'buf1Off" onclick="updateCoach(this)">', $row['Off'], '</td>',
        '<td id="', $row['Row'], 'buf1Def" onclick="updateCoach(this)">', $row['Def'], '</td>',
        '<td id="', $row['Row'], 'buf1OL" onclick="updateCoach(this)">', $row['OL'], '</td>',
        '<td id="', $row['Row'], 'buf1QB" onclick="updateCoach(this)">', $row['QB'], '</td>',
        '<td id="', $row['Row'], 'buf1RB" onclick="updateCoach(this)">', $row['RB'], '</td>',
        '<td id="', $row['Row'], 'buf1WR" onclick="updateCoach(this)">', $row['WR'], '</td>',
        '<td id="', $row['Row'], 'buf1DL" onclick="updateCoach(this)">', $row['DL'], '</td>',
        '<td id="', $row['Row'], 'buf1LB" onclick="updateCoach(this)">', $row['LB'], '</td>',
        '<td id="', $row['Row'], 'buf1DB" onclick="updateCoach(this)">', $row['DB'], '</td>',
        '<td id="', $row['Row'], 'buf1S" onclick="updateCoach(this)">', $row['S'], '</td>',
        '<td id="', $row['Row'], 'buf1K" onclick="updateCoach(this)">', $row['K'], '</td>',
        '<td id="', $row['Row'], 'buf1P" onclick="updateCoach(this)">', $row['P'], '</td>';
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