<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$RegSimResult = mysql_query("SELECT * FROM `atl_info` where Field='SimReg'");
$RegSimrow = mysql_fetch_array($RegSimResult);

if ($RegSimrow['Value'] != '') {
    echo '<h1>', $RegSimrow['Value'], '</h1>';
} else {

    $result = mysql_query("SELECT * FROM `atl_results` Where `Year`='{$franYear}'");

    echo '<table class="table table-hover" id="', $fran, '_', $franYear, '_regSeason" style="text-align: center; font-size: small">';
    echo '<tr>';
    echo '<td style="text-align: left">Week</td>', '<td>', 'Vs.', '</td>', '<td>', 'Home/Away', '</td>', '<td>', 'Score', '</td>', '<td>', 'Result', '</td>', '<td>', 'Overall Record', '</td>', '<td>', 'Divisional Record', '</td>';
    echo '</tr>';

        while ($row = mysql_fetch_array($result)) {
            echo '<tr>';
            echo '<td style="text-align: left">', $row['Week'], '</td>', '<td id="', $row['Row'], '/atl/1/Vs" onclick="updateReg(this)">', $row['Vs'], '</td>', '<td id="', $row['Row'], '/atl/1/HorA" onclick="updateReg(this)">', $row['HorA'], '</td>', '<td id="', $row['Row'], '/atl/1/Score" onclick="updateReg(this)">', $row['Score'], '</td>', '<td id="', $row['Row'], '/atl/1/Result" onclick="updateReg(this)">', $row['Result'], '</td>', '<td id="', $row['Row'], '/atl/1/OvrRecord" onclick="updateReg(this)">', $row['OvrRecord'], '</td>', '<td id="', $row['Row'], '/atl/1/DivRecord" onclick="updateReg(this)">', $row['DivRecord'], '</td>';
            echo '</tr>';
        }
    
    echo '</table>';
}
mysql_close($con);
