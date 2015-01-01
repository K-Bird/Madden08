<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

//Receiving History Tables
$GetPlayers = mysql_query("Select * From `{$fran}_stats_special` Where `Year`={$franYear}", $con) or die(mysql_error());

while ($playerRow = mysql_fetch_array($GetPlayers)) {

    if ($playerRow['Category'] === 'Kicking') {

        echo '<div id="', $playerRow['Row'], 'ST-Table" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

        $GetPlayerHistory = mysql_query("Select * From `{$fran}_stats_special` Where `Historical_ID`={$playerRow['Historical_ID']}", $con) or die(mysql_error());

        echo '<tr><td>Player</td><td>Field Goals Attempted</td><td>Field Goals Made</td><td>Field Goal Percent</td><td>Longest Made</td></tr>';

        while ($STHistoryRow = mysql_fetch_array($GetPlayerHistory)) {

            echo '<tr>'
            . '<td>Year: ', $STHistoryRow['Year'], '</td>'
            . '<td>', $STHistoryRow['FGA'], '</td>'
            . '<td>', $STHistoryRow['FGM'], '</td>'
            . '<td>', $STHistoryRow['FG_Percent'], '</td>'
            . '<td>', $STHistoryRow['Longest_Play'], '</td>';

            echo '</tr>';
        }
        echo '</table>
         </div>';
    }

    if ($playerRow['Category'] === 'Punting') {

        echo '<div id="', $playerRow['Row'], 'ST-Table" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

        $GetPlayerHistory = mysql_query("Select * From `{$fran}_stats_special` Where `Historical_ID`={$playerRow['Historical_ID']}", $con) or die(mysql_error());

        echo '<tr><td>Player</td><td>Punt Average</td><td>Punts Inside the 20</td></tr>';

        while ($STHistoryRow = mysql_fetch_array($GetPlayerHistory)) {

            echo '<tr>'
            . '<td>Year: ', $STHistoryRow['Year'], '</td>'
            . '<td>', $STHistoryRow['Punt_AVG'], '</td>'
            . '<td>', $STHistoryRow['I20'], '</td>';

            echo '</tr>';
        }
        echo '</table>
         </div>';
    }

    if ($playerRow['Category'] === 'KR') {

        echo '<div id="', $playerRow['Row'], 'ST-Table" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

        $GetPlayerHistory = mysql_query("Select * From `{$fran}_stats_special` Where `Historical_ID`={$playerRow['Historical_ID']}", $con) or die(mysql_error());

        echo '<tr><td>Player</td><td>Return Average</td><td>Return TDs</td><td>Longest Return</td></tr>';

        while ($STHistoryRow = mysql_fetch_array($GetPlayerHistory)) {

            echo '<tr>'
            . '<td>Year: ', $STHistoryRow['Year'], '</td>'
            . '<td>', $STHistoryRow['Ret_AVG'], '</td>'
            . '<td>', $STHistoryRow['Ret_TDs'], '</td>'
            . '<td>', $STHistoryRow['Longest_Play'], '</td>';

            echo '</tr>';
        }
        echo '</table>
         </div>';
    }
    
    if ($playerRow['Category'] === 'PR') {

        echo '<div id="', $playerRow['Row'], 'ST-Table" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

        $GetPlayerHistory = mysql_query("Select * From `{$fran}_stats_special` Where `Historical_ID`={$playerRow['Historical_ID']}", $con) or die(mysql_error());

        echo '<tr><td>Player</td><td>Return Average</td><td>Return TDs</td><td>Longest Return</td></tr>';

        while ($STHistoryRow = mysql_fetch_array($GetPlayerHistory)) {

            echo '<tr>'
            . '<td>Year: ', $STHistoryRow['Year'], '</td>'
            . '<td>', $STHistoryRow['Ret_AVG'], '</td>'
            . '<td>', $STHistoryRow['Ret_TDs'], '</td>'
            . '<td>', $STHistoryRow['Longest_Play'], '</td>';

            echo '</tr>';
        }
        echo '</table>
         </div>';
    }
}




