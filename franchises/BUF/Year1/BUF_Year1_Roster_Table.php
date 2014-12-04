<?php
$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("gamessitedatabase", $con);

/* * ** Coaching Table *** */
echo '<table class="table table-hover" id="BUF_1_Coaches" style="text-align: center; font-size: small">';
echo '<tr>';
echo '<td colspan="4">Coaches</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Head Coach</td>', '<td>', 'Offensive Coordinator', '</td>', '<td>', 'Defensive Coordinator', '</td>', '<td>', 'Special Teams Coordinator', '</td>';
echo '</tr>';
echo '<tr>';

/* HC Cell Block */
$HCresult = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='HC'");
$numRows = mysql_num_rows($HCresult);
if ($numRows > 0) {
    $HCrow = mysql_fetch_array($HCresult);
    echo '<td>', $HCrow['Name'], '</td>';
} else {
    echo '<td>No HC</td>';
}

/* OC Cell Block */
$OCresult = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='OC'");
$numRows = mysql_num_rows($OCresult);
if ($numRows > 0) {
    $OCrow = mysql_fetch_array($OCresult);
    echo '<td>', $OCrow['Name'], '</td>';
} else {
    echo '<td>No OC</td>';
}

/* DC Cell Block */
$DCresult = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='DC'");
$numRows = mysql_num_rows($DCresult);
if ($numRows > 0) {
    $DCrow = mysql_fetch_array($DCresult);
    echo '<td>', $DCrow['Name'], '</td>';
} else {
    echo '<td>No DC</td>';
}

/* ST Cell Block */
$STresult = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='ST'");
$numRows = mysql_num_rows($STresult);
if ($numRows > 0) {
    $STrow = mysql_fetch_array($STresult);
    echo '<td>', $STrow['Name'], '</td>';
} else {
    echo '<td>No ST</td>';
}

echo '</table><br>';

/* * ** Depth Chart Table *** */
echo '<table class="table table-hover" id="buf_1_DepthChart" style="text-align: center; font-size: small">
    <tr>
        <td colspan="7">Depth Chart</td>
    </tr>
    <tr>
        <td colspan="4">Offence</td>
        <td colspan="3">Defense</td>
    </tr>
    <tr>
        <td>3rd String</td>
        <td>2nd String</td>
        <td>Starter</td>
        <td colspan="2" >Position</td>
        <td>Starter</td>
        <td>2nd String</td>
    </tr>
    <tr>
        <td></td>
        <td></td>';

/* WR1 Cell Block */
$WR1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='WR1'");
$numRows = mysql_num_rows($WR1result);
if ($numRows > 0) {
    $WR1row = mysql_fetch_array($WR1result);
    echo '<td>'; if ($WR1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $WR1row['Name'], ' ', $WR1row['Weapon'], '<br> Overall: ', $WR1row['Overall'], ' Age: ', $WR1row['Age'], '<br> [ ', $WR1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No WR1</td>';
}

echo '<td>Wide Receiver #1</td>
        <td>Cornerback #1</td>';

/* CB1 Cell Block */
$CB1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='CB1'");
$numRows = mysql_num_rows($CB1result);
if ($numRows > 0) {
    $CB1row = mysql_fetch_array($CB1result);
    echo '<td>'; if ($CB1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $CB1row['Name'], ' ', $CB1row['Weapon'], '<br> Overall: ', $CB1row['Overall'], ' Age: ', $CB1row['Age'], '<br> [ ', $CB1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No CB1</td>';
}


echo '<td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>';

/* WR4 Cell Block */
$WR4result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='WR4'");
$numRows = mysql_num_rows($WR4result);
if ($numRows > 0) {
    $WR4row = mysql_fetch_array($WR4result);
    echo '<td>'; if ($WR4row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $WR4row['Name'], ' ', $WR4row['Weapon'], '<br> Overall: ', $WR4row['Overall'], ' Age: ', $WR4row['Age'], '<br> [ ', $WR4row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No WR4</td>';
}

echo '<td>Wide Receiver #4</td>
        <td>Cornerback #4</td>';

/* CB4 Cell Block */
$CB4result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='CB4'");
$numRows = mysql_num_rows($CB4result);
if ($numRows > 0) {
    $CB4row = mysql_fetch_array($CB4result);
    echo '<td>'; if ($CB4row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $CB4row['Name'], ' ', $CB4row['Weapon'], '<br> Overall: ', $CB4row['Overall'], ' Age: ', $CB4row['Age'], '<br> [ ', $CB4row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No CB4</td>';
}

echo '<td></td>
    </tr>
    <tr>
        <td></td>';

/* LT2 Cell Block */
$LT2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='LT2'");
$numRows = mysql_num_rows($LT2result);
if ($numRows > 0) {
    $LT2row = mysql_fetch_array($LT2result);
    echo '<td>'; if ($LT2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $LT2row['Name'], ' ', $LT2row['Weapon'], '<br> Overall: ', $LT2row['Overall'], ' Age: ', $LT2row['Age'], '<br> [ ', $LT2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No LT2</td>';
}

/* LT1 Cell Block */
$LT1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='LT1'");
$numRows = mysql_num_rows($LT1result);
if ($numRows > 0) {
    $LT1row = mysql_fetch_array($LT1result);
    echo '<td>'; if ($LT1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $LT1row['Name'], ' ', $LT1row['Weapon'], '<br> Overall: ', $LT1row['Overall'], ' Age: ', $LT1row['Age'], '<br> [ ', $LT1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No LT1</td>';
}

echo '<td>Left Tackle</td>
        <td>Left Outside Linebacker</td>';

/* LOLB1 Cell Block */
$LOLB1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='LOLB1'");
$numRows = mysql_num_rows($LOLB1result);
if ($numRows > 0) {
    $LOLB1row = mysql_fetch_array($LOLB1result);
    echo '<td>'; if ($LOLB1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $LOLB1row['Name'], ' ', $LOLB1row['Weapon'], '<br> Overall: ', $LOLB1row['Overall'], ' Age: ', $LOLB1row['Age'], '<br> [ ', $LOLB1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No LOLB1</td>';
}

/* LOLB2 Cell Block */
$LOLB2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='LOLB2'");
$numRows = mysql_num_rows($LOLB2result);
if ($numRows > 0) {
    $LOLB2row = mysql_fetch_array($LOLB2result);
    echo '<td>'; if ($LOLB2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $LOLB2row['Name'], ' ', $LOLB2row['Weapon'], '<br> Overall: ', $LOLB2row['Overall'], ' Age: ', $LOLB2row['Age'], '<br> [ ', $LOLB2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No LOLB2</td>';
}

echo '</tr>
    <tr>
        <td></td>';

/* LG2 Cell Block */
$LG2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='LG2'");
$numRows = mysql_num_rows($LG2result);
if ($numRows > 0) {
    $LG2row = mysql_fetch_array($LG2result);
    echo '<td>'; if ($LG2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $LG2row['Name'], ' ', $LG2row['Weapon'], '<br> Overall: ', $LG2row['Overall'], ' Age: ', $LG2row['Age'], '<br> [ ', $LG2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No LG2</td>';
}

/* LG1 Cell Block */
$LG1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='LG1'");
$numRows = mysql_num_rows($LG1result);
if ($numRows > 0) {
    $LG1row = mysql_fetch_array($LG1result);
    echo '<td>'; if ($LG1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $LG1row['Name'], ' ', $LG1row['Weapon'], '<br> Overall: ', $LG1row['Overall'], ' Age: ', $LG1row['Age'], '<br> [ ', $LG1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No LG1</td>';
}

echo '<td>Left Guard</td>
        <td>Middle Linebacker #1</td>';

/* MLB1 Cell Block */
$MLB1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='MLB1'");
$numRows = mysql_num_rows($MLB1result);
if ($numRows > 0) {
    $MLB1row = mysql_fetch_array($MLB1result);
    echo '<td>'; if ($MLB1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $MLB1row['Name'], ' ', $MLB1row['Weapon'], '<br> Overall: ', $MLB1row['Overall'], ' Age: ', $MLB1row['Age'], '<br> [ ', $MLB1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No MLB1</td>';
}

echo '<td></td>
    </tr>
    <tr>
        <td></td>';

/* C2 Cell Block */
$C2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='C2'");
$numRows = mysql_num_rows($C2result);
if ($numRows > 0) {
    $C2row = mysql_fetch_array($C2result);
    echo '<td>'; if ($C2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $C2row['Name'], ' ', $C2row['Weapon'], '<br> Overall: ', $C2row['Overall'], ' Age: ', $C2row['Age'], '<br> [ ', $C2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No C2</td>';
}

/* C1 Cell Block */
$C1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='C1'");
$numRows = mysql_num_rows($C1result);
if ($numRows > 0) {
    $C1row = mysql_fetch_array($C1result);
    echo '<td>'; if ($C1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $C1row['Name'], ' ', $C1row['Weapon'], '<br> Overall: ', $C1row['Overall'], ' Age: ', $C1row['Age'], '<br> [ ', $C1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No C1</td>';
}

echo '<td>Center</td>
        <td>Left End</td>';

/* LE1 Cell Block */
$LE1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='LE1'");
$numRows = mysql_num_rows($LE1result);
if ($numRows > 0) {
    $LE1row = mysql_fetch_array($LE1result);
    echo '<td>'; if ($LE1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $LE1row['Name'], ' ', $LE1row['Weapon'], '<br> Overall: ', $LE1row['Overall'], ' Age: ', $LE1row['Age'], '<br> [ ', $LE1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No LE1</td>';
}

/* LE2 Cell Block */
$LE2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='LE2'");
$numRows = mysql_num_rows($LE2result);
if ($numRows > 0) {
    $LE2row = mysql_fetch_array($LE2result);
    echo '<td>'; if ($LE2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $LE2row['Name'], ' ', $LE2row['Weapon'], '<br> Overall: ', $LE2row['Overall'], ' Age: ', $LE2row['Age'], '<br> [ ', $LE2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No LE2</td>';
}

echo '</tr>
    <tr>
        <td></td>';

/* RG2 Cell Block */
$RG2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='RG2'");
$numRows = mysql_num_rows($RG2result);
if ($numRows > 0) {
    $RG2row = mysql_fetch_array($RG2result);
    echo '<td>'; if ($RG2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $RG2row['Name'], ' ', $RG2row['Weapon'], '<br> Overall: ', $RG2row['Overall'], ' Age: ', $RG2row['Age'], '<br> [ ', $RG2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No RG2</td>';
}

/* RG1 Cell Block */
$RG1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='RG1'");
$numRows = mysql_num_rows($RG1result);
if ($numRows > 0) {
    $RG1row = mysql_fetch_array($RG1result);
    echo '<td>'; if ($RG1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $RG1row['Name'], ' ', $RG1row['Weapon'], '<br> Overall: ', $RG1row['Overall'], ' Age: ', $RG1row['Age'], '<br> [ ', $RG1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No RG1</td>';
}

echo '<td>Right Guard</td>
        <td>Defensive Tackle</td>';

/* DT1 Cell Block */
$DT1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='DT1'");
$numRows = mysql_num_rows($DT1result);
if ($numRows > 0) {
    $DT1row = mysql_fetch_array($DT1result);
    echo '<td>'; if ($DT1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $DT1row['Name'], ' ', $DT1row['Weapon'], '<br> Overall: ', $DT1row['Overall'], ' Age: ', $DT1row['Age'], '<br> [ ', $DT1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No DT1</td>';
}

/* DT2 Cell Block */
$DT2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='DT2'");
$numRows = mysql_num_rows($DT2result);
if ($numRows > 0) {
    $DT2row = mysql_fetch_array($DT2result);
    echo '<td>'; if ($DT2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $DT2row['Name'], ' ', $DT2row['Weapon'], '<br> Overall: ', $DT2row['Overall'], ' Age: ', $DT2row['Age'], '<br> [ ', $DT2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No DT2</td>';
}

echo '</tr>
    <tr>
        <td></td>';

/* RT2 Cell Block */
$RT2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='RT2'");
$numRows = mysql_num_rows($RT2result);
if ($numRows > 0) {
    $RT2row = mysql_fetch_array($RT2result);
    echo '<td>'; if ($RT2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $RT2row['Name'], ' ', $RT2row['Weapon'], '<br> Overall: ', $RT2row['Overall'], ' Age: ', $RT2row['Age'], '<br> [ ', $RT2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No RT2</td>';
}

/* RT1 Cell Block */
$RT1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='RT1'");
$numRows = mysql_num_rows($RT1result);
if ($numRows > 0) {
    $RT1row = mysql_fetch_array($RT1result);
    echo '<td>'; if ($RT1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $RT1row['Name'], ' ', $RT1row['Weapon'], '<br> Overall: ', $RT1row['Overall'], ' Age: ', $RT1row['Age'], '<br> [ ', $RT1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No RT1</td>';
}

echo '<td>Right Tackle</td>
        <td>Right End</td>';

/* RE1 Cell Block */
$RE1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='RE1'");
$numRows = mysql_num_rows($RE1result);
if ($numRows > 0) {
    $RE1row = mysql_fetch_array($RE1result);
    echo '<td>'; if ($RE1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $RE1row['Name'], ' ', $RE1row['Weapon'], '<br> Overall: ', $RE1row['Overall'], ' Age: ', $RE1row['Age'], '<br> [ ', $RE1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No RE1</td>';
}

/* RE2 Cell Block */
$RE2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='RE2'");
$numRows = mysql_num_rows($RE2result);
if ($numRows > 0) {
    $RE2row = mysql_fetch_array($RE2result);
    echo '<td>'; if ($RE2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $RE2row['Name'], ' ', $RE2row['Weapon'], '<br> Overall: ', $RE2row['Overall'], ' Age: ', $RE2row['Age'], '<br> [ ', $RE2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No RE2</td>';
}

echo '</tr>
    <tr>
        <td></td>
        <td></td>';

/* WR3 Cell Block */
$WR3result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='WR3'");
$numRows = mysql_num_rows($WR3result);
if ($numRows > 0) {
    $WR3row = mysql_fetch_array($WR3result);
    echo '<td>'; if ($WR3row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $WR3row['Name'], ' ', $WR3row['Weapon'], '<br> Overall: ', $WR3row['Overall'], ' Age: ', $WR3row['Age'], '<br> [ ', $WR3row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No WR3</td>';
}

echo '<td>Wide Receiver #3</td>
        <td>Middle Linebacker #2</td>';

/* MLB2 Cell Block */
$MLB2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='MLB2'");
$numRows = mysql_num_rows($MLB2result);
if ($numRows > 0) {
    $MLB2row = mysql_fetch_array($MLB2result);
    echo '<td>'; if ($MLB2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $MLB2row['Name'], ' ', $MLB2row['Weapon'], '<br> Overall: ', $MLB2row['Overall'], ' Age: ', $MLB2row['Age'], '<br> [ ', $MLB2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No MLB2</td>';
}

echo '<td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>';

/* WR2 Cell Block */
$WR2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='WR2'");
$numRows = mysql_num_rows($WR2result);
if ($numRows > 0) {
    $WR2row = mysql_fetch_array($WR2result);
    echo '<td>'; if ($WR2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $WR2row['Name'], ' ', $WR2row['Weapon'], '<br> Overall: ', $WR2row['Overall'], ' Age: ', $WR2row['Age'], '<br> [ ', $WR2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No WR2</td>';
}

echo '<td>Wide Receiver #2</td>
        <td>Right Outside Linebacker</td>';

/* ROLB1 Cell Block */
$ROLB1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='ROLB1'");
$numRows = mysql_num_rows($ROLB1result);
if ($numRows > 0) {
    $ROLB1row = mysql_fetch_array($ROLB1result);
    echo '<td>'; if ($ROLB1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $ROLB1row['Name'], ' ', $ROLB1row['Weapon'], '<br> Overall: ', $ROLB1row['Overall'], ' Age: ', $ROLB1row['Age'], '<br> [ ', $ROLB1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No ROLB1</td>';
}

/* ROLB2 Cell Block */
$ROLB2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='ROLB2'");
$numRows = mysql_num_rows($ROLB2result);
if ($numRows > 0) {
    $ROLB2row = mysql_fetch_array($ROLB2result);
    echo '<td>'; if ($ROLB2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $ROLB2row['Name'], ' ', $ROLB2row['Weapon'], '<br> Overall: ', $ROLB2row['Overall'], ' Age: ', $ROLB2row['Age'], '<br> [ ', $ROLB2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No ROLB2</td>';
}

echo '</tr>
    <tr>
        <td></td>';

/* TE2 Cell Block */
$TE2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='TE2'");
$numRows = mysql_num_rows($TE2result);
if ($numRows > 0) {
    $TE2row = mysql_fetch_array($TE2result);
    echo '<td>'; if ($TE2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $TE2row['Name'], ' ', $TE2row['Weapon'], '<br> Overall: ', $TE2row['Overall'], ' Age: ', $TE2row['Age'], '<br> [ ', $TE2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No TE2</td>';
}

/* TE1 Cell Block */
$TE1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='TE1'");
$numRows = mysql_num_rows($TE1result);
if ($numRows > 0) {
    $TE1row = mysql_fetch_array($TE1result);
    echo '<td>'; if ($TE1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $TE1row['Name'], ' ', $TE1row['Weapon'], '<br> Overall: ', $TE1row['Overall'], ' Age: ', $TE1row['Age'], '<br> [ ', $TE1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No TE1</td>';
}

echo '<td>Tight End</td>
        <td>Cornerback #3</td>';

/* CB3 Cell Block */
$CB3result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='CB3'");
$numRows = mysql_num_rows($CB3result);
if ($numRows > 0) {
    $CB3row = mysql_fetch_array($CB3result);
    echo '<td>'; if ($CB3row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $CB3row['Name'], ' ', $CB3row['Weapon'], '<br> Overall: ', $CB3row['Overall'], ' Age: ', $CB3row['Age'], '<br> [ ', $CB3row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No CB3</td>';
}

echo '<td></td>
    </tr>
    <tr>
        <td></td>';

/* QB2 Cell Block */
$QB2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='QB2'");
$numRows = mysql_num_rows($QB2result);
if ($numRows > 0) {
    $QB2row = mysql_fetch_array($QB2result);
    echo '<td>'; if ($QB2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $QB2row['Name'], ' ', $QB2row['Weapon'], '<br> Overall: ', $QB2row['Overall'], ' Age: ', $QB2row['Age'], '<br> [ ', $QB2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No QB2</td>';
}

/* QB1 Cell Block */
$QB1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='QB1'");
$numRows = mysql_num_rows($QB1result);
if ($numRows > 0) {
    $QB1row = mysql_fetch_array($QB1result);
    echo '<td>'; if ($QB1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $QB1row['Name'], ' ', $QB1row['Weapon'], '<br> Overall: ', $QB1row['Overall'], ' Age: ', $QB1row['Age'], '<br> [ ', $QB1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No QB1</td>';
}

echo '<td>Quarterback</td>
        <td>Cornerback #2</td>';

/* CB2 Cell Block */
$CB2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='CB2'");
$numRows = mysql_num_rows($CB2result);
if ($numRows > 0) {
    $CB2row = mysql_fetch_array($CB2result);
    echo '<td>'; if ($CB2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $CB2row['Name'], ' ', $CB2row['Weapon'], '<br> Overall: ', $CB2row['Overall'], ' Age: ', $CB2row['Age'], '<br> [ ', $CB2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No CB2</td>';
}

echo '<td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>';

/* FB1 Cell Block */
$FB1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='FB1'");
$numRows = mysql_num_rows($FB1result);
if ($numRows > 0) {
    $FB1row = mysql_fetch_array($FB1result);
    echo '<td>'; if ($FB1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $FB1row['Name'], ' ', $FB1row['Weapon'], '<br> Overall: ', $FB1row['Overall'], ' Age: ', $FB1row['Age'], '<br> [ ', $FB1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No FB1</td>';
}

echo '<td>Fullback</td>
        <td>Free Safety</td>';

/* FS1 Cell Block */
$FS1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='FS1'");
$numRows = mysql_num_rows($FS1result);
if ($numRows > 0) {
    $FS1row = mysql_fetch_array($FS1result);
    echo '<td>'; if ($FS1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $FS1row['Name'], ' ', $FS1row['Weapon'], '<br> Overall: ', $FS1row['Overall'], ' Age: ', $FS1row['Age'], '<br> [ ', $FS1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No FS1</td>';
}

/* FS2 Cell Block */
$FS2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='FS2'");
$numRows = mysql_num_rows($FS2result);
if ($numRows > 0) {
    $FS2row = mysql_fetch_array($FS2result);
    echo '<td>'; if ($FS2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $FS2row['Name'], ' ', $FS2row['Weapon'], '<br> Overall: ', $FS2row['Overall'], ' Age: ', $FS2row['Age'], '<br> [ ', $FS2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No FS2</td>';
}

echo '</tr>
    <tr>';

/* HB3 Cell Block */
$HB3result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='HB3'");
$numRows = mysql_num_rows($HB3result);
if ($numRows > 0) {
    $HB3row = mysql_fetch_array($HB3result);
    echo '<td>'; if ($HB3row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $HB3row['Name'], ' ', $HB3row['Weapon'], '<br> Overall: ', $HB3row['Overall'], ' Age: ', $HB3row['Age'], '<br> [ ', $HB3row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No HB3</td>';
}

/* HB2 Cell Block */
$HB2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='HB2'");
$numRows = mysql_num_rows($HB2result);
if ($numRows > 0) {
    $HB2row = mysql_fetch_array($HB2result);
    echo '<td>'; if ($HB2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $HB2row['Name'], ' ', $HB2row['Weapon'], '<br> Overall: ', $HB2row['Overall'], ' Age: ', $HB2row['Age'], '<br> [ ', $HB2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No HB2</td>';
}

/* HB1 Cell Block */
$HB1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='HB1'");
$numRows = mysql_num_rows($HB1result);
if ($numRows > 0) {
    $HB1row = mysql_fetch_array($HB1result);
    echo '<td>'; if ($HB1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $HB1row['Name'], ' ', $HB1row['Weapon'], '<br> Overall: ', $HB1row['Overall'], ' Age: ', $HB1row['Age'], '<br> [ ', $HB1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No HB1</td>';
}

echo '<td>Halfback</td>
        <td>Strong Safety</td>';

/* SS1 Cell Block */
$SS1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='SS1'");
$numRows = mysql_num_rows($SS1result);
if ($numRows > 0) {
    $SS1row = mysql_fetch_array($SS1result);
    echo '<td>'; if ($SS1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $SS1row['Name'], ' ', $SS1row['Weapon'], '<br> Overall: ', $SS1row['Overall'], ' Age: ', $SS1row['Age'], '<br> [ ', $SS1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No SS1</td>';
}

/* SS2 Cell Block */
$SS2result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='SS2'");
$numRows = mysql_num_rows($SS2result);
if ($numRows > 0) {
    $SS2row = mysql_fetch_array($SS2result);
    echo '<td>'; if ($SS2row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $SS2row['Name'], ' ', $SS2row['Weapon'], '<br> Overall: ', $SS2row['Overall'], ' Age: ', $SS2row['Age'], '<br> [ ', $SS2row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No SS2</td>';
}
echo '</tr></table><br>';


/* * ** Special Teams Table *** */
echo '<a href="#depth"></a>';
echo '<table  class="table table-hover" id="BUF_1_ST" style="text-align: center; font-size: small">';
echo '<tr>';
echo '<td colspan="4">Special Teams</td>';
echo '</tr>';
echo '<tr>';
echo '<td>Kicker</td>', '<td>', 'Punter', '</td>', '<td>', 'Kick Returner', '</td>', '<td>', 'Punt Returner', '</td>';
echo '</tr>';
echo '<tr>';

/* K1 Cell Block */
$K1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='K1'");
$numRows = mysql_num_rows($K1result);
if ($numRows > 0) {
    $K1row = mysql_fetch_array($K1result);
    echo '<td>'; if ($K1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $K1row['Name'], ' ', $K1row['Weapon'], '<br> Overall: ', $K1row['Overall'], ' Age: ', $K1row['Age'], '<br> [ ', $K1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No K1</td>';
}

/* P1 Cell Block */
$P1result = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='P1'");
$numRows = mysql_num_rows($P1result);
if ($numRows > 0) {
    $P1row = mysql_fetch_array($P1result);
    echo '<td>'; if ($P1row['OSU'] == 'Y') { echo '<img src="_Update/OSU.png" height="25px" width="25px"></img> '; } echo $P1row['Name'], ' ', $P1row['Weapon'], '<br> Overall: ', $P1row['Overall'], ' Age: ', $P1row['Age'], '<br> [ ', $P1row['Acquired'], ' ]', '</td>';
} else {
    echo '<td>No P1</td>';
}

/* KR Cell Block */
$KRresult = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='KR'");
$numRows = mysql_num_rows($KRresult);
if ($numRows > 0) {
    $KRrow = mysql_fetch_array($KRresult);
    echo '<td>', $KRrow['Name'], '</td>';
} else {
    echo '<td>No KR</td>';
}

/* PR Cell Block */
$PRresult = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster` where Position='PR'");
$numRows = mysql_num_rows($PRresult);
if ($numRows > 0) {
    $PRrow = mysql_fetch_array($PRresult);
    echo '<td>', $PRrow['Name'], '</td>';
} else {
    echo '<td>No PR</td>';
}

echo '</tr></table><br>';

mysql_close($con);
?>
