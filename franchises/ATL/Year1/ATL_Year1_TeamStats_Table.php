<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$result = mysql_query("SELECT * FROM `{$fran}_teamstats` Where `Year`='{$franYear}'");

echo "<br />";
echo '<table class="table table-hover" id="atl_teamstats" style="text-align: center; font-size: small">';
echo '<tr>';
echo '<td>', 'Stat', '</td>','<td>', 'Value', '</td>','<td>', 'NFL Rank', '</td>';
echo '</tr>';

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td style="text-align: left"><span id="', $row['Row'], 'History" class="teamStatHistory" style="cursor: pointer" data-toggle="popover" title="History">', $row['Stat'], '</span></td>',
             '<td id="', $row['Row'], '/atl/1" onclick="updateTeamStat(this)">', $row['Value'], '</td>',
             '<td>', $row['Rank'],'</td>';
        echo '</tr>';
    }

echo '</table>';

include ('../../_history/teamstats_History.php');

mysql_close($con);