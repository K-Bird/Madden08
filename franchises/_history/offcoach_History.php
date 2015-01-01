<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

//Player History Tables
$GetPlayers = mysql_query("Select * From `{$fran}_off_coach-chg` Where `Year`={$franYear}", $con) or die(mysql_error());

while ($playerRow = mysql_fetch_array($GetPlayers)) {

    echo '<div id="', $playerRow['Row'], 'CoachCHGTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    $GetPlayerHistory = mysql_query("Select * From `{$fran}_off_coach-chg` Where `Historical_ID`={$playerRow['Historical_ID']}", $con) or die(mysql_error());

    echo '<tr><td></td>
              <td>Age</td>
              <td>Change</td>
              <td>MOT</td>
              <td>ETH</td>
              <td>CHM</td>
              <td>KNO</td>
              <td>OFF</td>
              <td>DEF</td>
              <td>OL</td>
              <td>QB</td>
              <td>HB</td>
              <td>WR</td>
              <td>DL</td>
              <td>LB</td>
              <td>DB</td>
              <td>S</td>
              <td>K</td>
              <td>P</td>
              </tr>';

    while ($historyRow = mysql_fetch_array($GetPlayerHistory)) {

        echo '<tr>',
        '<td>Year: ', $historyRow['Year'], '</td>',
        '<td>', $historyRow['Age'], '</td>',
        '<td>', $historyRow['Chg'], '</td>',
        '<td>', $historyRow['Moto'], '</td>',
        '<td>', $historyRow['Eth'], '</td>',
        '<td>', $historyRow['Chem'], '</td>',
        '<td>', $historyRow['Kno'], '</td>',
        '<td>', $historyRow['Off'], '</td>',
        '<td>', $historyRow['Def'], '</td>',
        '<td>', $historyRow['OL'], '</td>',
        '<td>', $historyRow['QB'], '</td>',
        '<td>', $historyRow['RB'], '</td>',
        '<td>', $historyRow['WR'], '</td>',
        '<td>', $historyRow['DL'], '</td>',
        '<td>', $historyRow['LB'], '</td>',
        '<td>', $historyRow['DB'], '</td>',
        '<td>', $historyRow['S'], '</td>',
        '<td>', $historyRow['K'], '</td>',
        '<td>', $historyRow['P'], '</td>',
        '</tr>';
    }

    echo '</table>
         </div>';
}




