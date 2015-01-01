<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

//Team Stat History Tables
$GetTeamStats = mysql_query("Select * From `{$fran}_teamstats` Where `Year`={$franYear}", $con) or die(mysql_error());

while ($statRow = mysql_fetch_array($GetTeamStats)) {

    echo '<div id="', $statRow['Row'], 'HistoryTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    $GetStatHistory = mysql_query("Select * From `{$fran}_teamstats` Where `Stat`='{$statRow['Stat']}'", $con) or die(mysql_error());

    echo '<tr><td></td><td>Value</td><td>NFL Rank</td></tr>';

    while ($historyRow = mysql_fetch_array($GetStatHistory)) {

        echo '<tr>'
        . '<td>Year: ', $historyRow['Year'], '</td>'
        . '<td>', $historyRow['Value'], '</td>'
        . '<td>', $historyRow['Rank'], '</td>'
        . '</tr>';
    }

    echo '</table>
         </div>';
}




