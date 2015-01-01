<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

//Receiving History Tables
$GetPlayers = mysql_query("Select * From `{$fran}_stats_def` Where `Year`={$franYear}", $con) or die(mysql_error());

while ($playerRow = mysql_fetch_array($GetPlayers)) {

    echo '<div id="', $playerRow['Row'], 'DefTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    $GetPlayerHistory = mysql_query("Select * From `{$fran}_stats_def` Where `Historical_ID`={$playerRow['Historical_ID']}", $con) or die(mysql_error());

    echo '<tr><td></td><td>Tackles</td><td>Tackles For Loss</td><td>Sacks</td><td>INTs</td><td>TDs</td><td>Saftey</td></tr>';

    while ($defHistoryRow = mysql_fetch_array($GetPlayerHistory)) {

        echo '<tr>'
        . '<td>Year: ', $defHistoryRow['Year'], '</td>'
        . '<td>', $defHistoryRow['Tackles'], '</td>'
        . '<td>', $defHistoryRow['ForLoss'], '</td>'
        . '<td>', $defHistoryRow['Sacks'], '</td>'
        . '<td>', $defHistoryRow['INTs'], '</td>'
        . '<td>', $defHistoryRow['TDs'], '</td>'
        . '<td>', $defHistoryRow['Saftey'], '</td>';

        echo '</tr>';
    }
    echo '</table>
         </div>';
}




