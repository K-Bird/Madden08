<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

//Pro Bowl History Tables
$GetPlayers = mysql_query("Select * From `{$fran}_off_probowl` Where `Year`={$franYear}", $con) or die(mysql_error());

while ($playerRow = mysql_fetch_array($GetPlayers)) {

    echo '<div id="', $playerRow['Row'], 'ProBowlTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    $GetPlayerHistory = mysql_query("Select * From `{$fran}_off_probowl` Where `Historical_ID`={$playerRow['Historical_ID']}", $con) or die(mysql_error());
    $GetNumRows = mysql_num_rows($GetPlayerHistory);
    
    echo '<tr><td>Years Elected to Pro Bowl</td></tr>';

    while ($probowlHistoryRow = mysql_fetch_array($GetPlayerHistory)) {

        echo '<tr>'
        . '<td>Year: ', $probowlHistoryRow['Year'], '</td>'
        . '</tr>';
    }
    echo '<tr><td>Number of Pro Bowls: ',$GetNumRows,'</td></tr>';
    
    echo '</table>
         </div>';
}




