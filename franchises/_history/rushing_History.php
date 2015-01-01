<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

//Rushing History Tables
$GetPlayers = mysql_query("Select * From `{$fran}_stats_rushing` Where `Year`={$franYear}", $con) or die(mysql_error());

while ($playerRow = mysql_fetch_array($GetPlayers)) {

    echo '<div id="', $playerRow['Row'], 'RushTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    $GetPlayerHistory = mysql_query("Select * From `{$fran}_stats_rushing` Where `Historical_ID`={$playerRow['Historical_ID']}", $con) or die(mysql_error());

    echo '<tr><td></td><td>Rush Yards</td><td>Rush TDs</td><td>Yards Per Carry</td><td>Fumbles</td><td>Broken Tackles</td><td>Longest Run</td></tr>';

    while ($rushHistoryRow = mysql_fetch_array($GetPlayerHistory)) {

        echo '<tr>'
        . '<td>Year: ', $rushHistoryRow['Year'], '</td>'
        . '<td>', $rushHistoryRow['Yards'], '</td>'
        . '<td>', $rushHistoryRow['TDs'], '</td>'
        . '<td>', $rushHistoryRow['YPC'], '</td>'
        . '<td>', $rushHistoryRow['Fumble'], '</td>'
        . '<td>', $rushHistoryRow['Broken'], '</td>'
        . '<td>', $rushHistoryRow['LongRun'], '</td>';

        echo '</tr>';
    }
    echo '</table>
         </div>';
}




