<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$result = mysql_query("SELECT * FROM `{$fran}_teamstats` Where `Year`='{$franYear}' ORDER BY `Row`");

echo "<br />";
echo '<table class="table table-hover" id="', $fran, '_', $franYear, '_teamstats" style="text-align: center; font-size: small">';
echo '<tr>';
echo '<td>', 'Stat', '</td>','<td>', 'Value', '</td>','<td>', 'NFL Rank', '</td>';
echo '</tr>';

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td style="text-align: left"><span id="', $row['Row'], 'History" class="teamStatHistory" style="cursor: pointer" data-toggle="popover" title="History">', $row['Stat'], '</span></td>',
             '<td>', $row['Value'], '&nbsp;&nbsp;<span id="', $row['Row'], '/', $fran, '/', $franYear, '/Value" class="glyphicon glyphicon-edit teamStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
             '<td>', $row['Rank'],'&nbsp;&nbsp;<span id="', $row['Row'], '/', $fran, '/', $franYear, '/Rank" class="glyphicon glyphicon-edit teamStatEdit" onclick="" aria-hidden="true" style="display: none"></td>';
        echo '</tr>';
    }

echo '</table>';

include ('../../_history/teamstats_History.php');

mysql_close($con);