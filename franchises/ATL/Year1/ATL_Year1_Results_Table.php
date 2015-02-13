<?php
$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$RegSimResult = mysql_query("SELECT * FROM `{$fran}_info` where Field='SimReg'");
$RegSimrow = mysql_fetch_array($RegSimResult);

if ($RegSimrow['Value'] != '') {
    echo '<h1>', $RegSimrow['Value'], '</h1>';
} else {

    $result = mysql_query("SELECT * FROM `{$fran}_results` Where `Year`='{$franYear}'");

    echo '<table class="table table-hover" id="', $fran, '_', $franYear, '_regSeason" style="text-align: center; font-size: small">';
    echo '<tr>';
    echo '<td style="text-align: left">Week</td>', '<td>', 'Vs.', '</td>', '<td>', 'Home/Away', '</td>', '<td>', 'Score', '</td>', '<td>', 'Result', '</td>', '<td>', 'Overall Record', '</td>', '<td>', 'Divisional Record', '</td>';
    echo '</tr>';

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td style="text-align: left">', $row['Week'], '</td>',
             '<td>', $row['Vs'], '&nbsp;&nbsp;<span id="', $row['Row'], '/', $fran, '/', $franYear, '/Vs" class="glyphicon glyphicon-edit resultEdit" onclick="" aria-hidden="true" style="display: none"></td>',
             '<td>', $row['HorA'], '&nbsp;&nbsp;<span id="', $row['Row'], '/', $fran, '/', $franYear, '/HorA" class="glyphicon glyphicon-edit resultEdit" onclick="" aria-hidden="true" style="display: none"></td>',
             '<td>', $row['Score'], '&nbsp;&nbsp;<span id="', $row['Row'], '/', $fran, '/', $franYear, '/Score" class="glyphicon glyphicon-edit resultEdit" onclick="" aria-hidden="true" style="display: none"></td>',
             '<td>', $row['Result'], '&nbsp;&nbsp;<span id="', $row['Row'], '/', $fran, '/', $franYear, '/Result" class="glyphicon glyphicon-edit resultEdit" onclick="" aria-hidden="true" style="display: none"></td>',
             '<td>', $row['OvrRecord'], '&nbsp;&nbsp;<span id="', $row['Row'], '/', $fran, '/', $franYear, '/OvrRecord" class="glyphicon glyphicon-edit resultEdit" onclick="" aria-hidden="true" style="display: none"></td>',
             '<td>', $row['DivRecord'], '&nbsp;&nbsp;<span id="', $row['Row'], '/', $fran, '/', $franYear, '/DivRecord" class="glyphicon glyphicon-edit resultEdit" onclick="" aria-hidden="true" style="display: none"></td>';
        echo '</tr>';
    }

    echo '</table>';
}
mysql_close($con);
?>

<div class="row" style='text-align: center'>
    <a class="btn btn-default yearEdit resultsEditbtn" style="display: none">Edit Results</a>
</div>
