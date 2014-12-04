<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("gamessitedatabase", $con);

$RegSimResult = mysql_query("SELECT * FROM `gm_madden08-atl_1_info` where Field='SimReg'");
$RegSimrow = mysql_fetch_array($RegSimResult);

if ($RegSimrow['Value'] != '') {
    echo '<h1>', $RegSimrow['Value'], '</h1>';
} else {

    $result = mysql_query("SELECT * FROM `gm_madden08-atl_1_reg`");

    echo '<table class="table table-hover" id="fran-reg" style="text-align: center; font-size: small">';
    echo '<tr>';
    echo '<td>Week</td>', '<td>', 'Vs.', '</td>', '<td>', 'Home/Away', '</td>', '<td>', 'Score', '</td>', '<td>', 'Result', '</td>', '<td>', 'Overall Record', '</td>', '<td>', 'Divisional Record', '</td>';
    echo '</tr>';

    if (!isset($_SESSION['Admin'])) {
        $_SESSION['Admin'] = False;
    } if ($_SESSION['Admin'] == true) {

        while ($row = mysql_fetch_array($result)) {
            echo '<tr>';
            echo '<td>', $row['Week'], '</td>', '<td id="', $row['Row'], '/atl/1/Vs" onclick="updateReg(this)">', $row['Vs'], '</td>', '<td id="', $row['Row'], '/atl/1/HorA" onclick="updateReg(this)">', $row['HorA'], '</td>', '<td id="', $row['Row'], '/atl/1/Score" onclick="updateReg(this)">', $row['Score'], '</td>', '<td id="', $row['Row'], '/atl/1/Result" onclick="updateReg(this)">', $row['Result'], '</td>', '<td id="', $row['Row'], '/atl/1/OvrRecord" onclick="updateReg(this)">', $row['OvrRecord'], '</td>', '<td id="', $row['Row'], '/atl/1/DivRecord" onclick="updateReg(this)">', $row['DivRecord'], '</td>';
            echo '</tr>';
        }
    }

    if ($_SESSION['Admin'] == false) {

        while ($row = mysql_fetch_array($result)) {
            echo '<tr>';
            echo '<td>', $row['Week'], '</td>', '<td id="', $row['Row'], 'Vs" onclick="">', $row['Vs'], '</td>', '<td id="', $row['Row'], 'HorA" onclick="">', $row['HorA'], '</td>', '<td id="', $row['Row'], 'Score" onclick="">', $row['Score'], '</td>', '<td id="', $row['Row'], 'Result" onclick="">', $row['Result'], '</td>', '<td id="', $row['Row'], 'OvrRecord" onclick="">', $row['OvrRecord'], '</td>', '<td id="', $row['Row'], 'DivRecord" onclick="">', $row['DivRecord'], '</td>';
            echo '</tr>';
        }
    }

    echo '</table>';
}
mysql_close($con);
?>