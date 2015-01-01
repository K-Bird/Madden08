<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

//Blocking History Tables
$GetPlayers = mysql_query("Select * From `{$fran}_stats_block` Where `Year`={$franYear}", $con) or die(mysql_error());

while ($playerRow = mysql_fetch_array($GetPlayers)) {

    echo '<div id="', $playerRow['Row'], 'BlockTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    $GetPlayerHistory = mysql_query("Select * From `{$fran}_stats_block` Where `Historical_ID`={$playerRow['Historical_ID']}", $con) or die(mysql_error());

    echo '<tr><td></td><td>Pancakes</td><td>Sacks Allowed</td></tr>';

    while ($blockHistoryRow = mysql_fetch_array($GetPlayerHistory)) {

        echo '<tr>'
        . '<td>Year: ', $blockHistoryRow['Year'], '</td>'
        . '<td>', $blockHistoryRow['Pancakes'], '</td>'
        . '<td>', $blockHistoryRow['Sacks'], '</td>';
        echo '</tr>';
    }
    echo '</table>
         </div>';
}




