<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

//Award History Tables
$GetPlayers = mysql_query("Select * From `{$fran}_off_awards` Where `Year`={$franYear}", $con) or die(mysql_error());

while ($playerRow = mysql_fetch_array($GetPlayers)) {

    if ($playerRow['Historical_ID'] === '-') {
        
    } else {

        echo '<div id="', $playerRow['Row'], 'AwardTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

        $GetPlayerHistory = mysql_query("Select * From `{$fran}_off_awards` Where `Historical_ID`={$playerRow['Historical_ID']}", $con) or die(mysql_error());





        echo '<tr><td></td><td>Award</td></tr>';

        while ($awardHistoryRow = mysql_fetch_array($GetPlayerHistory)) {

            echo '<tr>'
            . '<td>Year: ', $awardHistoryRow['Year'], '</td>'
            . '<td style="text-align: left">', $awardHistoryRow['Award'], '</td>';

            echo '</tr>';
        }

        echo '</table>
         </div>';
    }
}




