<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

//Player History Tables
$GetCoaches = mysql_query("Select * From `{$fran}_off_coach-chg` Where `Year`={$franYear}", $con) or die(mysql_error());

while ($coachRow = mysql_fetch_array($GetCoaches)) {

    echo '<div id="', $coachRow['Row'], 'CoachCHGTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    $GetCoachHistory = mysql_query("Select * From `{$fran}_off_coach-chg` Where `Historical_ID`={$coachRow['Historical_ID']}", $con) or die(mysql_error());

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

    while ($historyRow = mysql_fetch_array($GetCoachHistory)) {

        if ($historyRow['Year'] === '1') {
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

        if ($historyRow['Year'] != '1') {

            $previousYear = $historyRow['Year'] - 1;
            $GetPreviousYear = mysql_query("Select * From `{$fran}_off_coach-chg` Where `Year`={$previousYear} and `Historical_ID`={$coachRow['Historical_ID']}", $con) or die(mysql_error());
            $previousRow = mysql_fetch_array($GetPreviousYear);

            echo '<tr>',
            '<td>Year: ', $historyRow['Year'], '</td>',
            '<td>', $historyRow['Age'], '</td>',
            '<td>', $historyRow['Chg'], '</td>';

            $motoChg = $historyRow['Moto'] - $previousRow['Moto'];
            if ($motoChg < 0) {
                echo '<td>', $historyRow['Moto'], ' <span style="color:red">(', $motoChg, ')</span></td>';
            } else if ($motoChg === 0) {
                echo '<td>', $historyRow['Moto'], ' (', $motoChg, ')</td>';
            } else if ($motoChg > 0) {
                echo '<td>', $historyRow['Moto'], ' <span style="color:green">(+', $motoChg, ')</span></td>';
            }

            $ethChg = $historyRow['Eth'] - $previousRow['Eth'];
            if ($ethChg < 0) {
                echo '<td>', $historyRow['Eth'], ' <span style="color:red">(', $ethChg, ')</span></td>';
            } else if ($ethChg === 0) {
                echo '<td>', $historyRow['Eth'], ' (', $ethChg, ')</td>';
            } else if ($ethChg > 0) {
                echo '<td>', $historyRow['Eth'], ' <span style="color:green">(+', $ethChg, ')</span></td>';
            }

            $chemChg = $historyRow['Chem'] - $previousRow['Chem'];
            if ($chemChg < 0) {
                echo '<td>', $historyRow['Chem'], ' <span style="color:red">(', $chemChg, ')</span></td>';
            } else if ($chemChg === 0) {
                echo '<td>', $historyRow['Chem'], ' (', $chemChg, ')</td>';
            } else if ($chemChg > 0) {
                echo '<td>', $historyRow['Chem'], ' <span style="color:green">(+', $chemChg, ')</span></td>';
            }

            $knoChg = $historyRow['Kno'] - $previousRow['Kno'];
            if ($knoChg < 0) {
                echo '<td>', $historyRow['Kno'], ' <span style="color:red">(', $knoChg, ')</span></td>';
            } else if ($knoChg === 0) {
                echo '<td>', $historyRow['Kno'], ' (', $knoChg, ')</td>';
            } else if ($knoChg > 0) {
                echo '<td>', $historyRow['Kno'], ' <span style="color:green">(+', $knoChg, ')</span></td>';
            }

            $offChg = $historyRow['Off'] - $previousRow['Off'];
            if ($offChg < 0) {
                echo '<td>', $historyRow['Off'], ' <span style="color:red">(', $offChg, ')</span></td>';
            } else if ($offChg === 0) {
                echo '<td>', $historyRow['Off'], ' (', $offChg, ')</td>';
            } else if ($offChg > 0) {
                echo '<td>', $historyRow['Off'], ' <span style="color:green">(+', $offChg, ')</span></td>';
            }

            $defChg = $historyRow['Def'] - $previousRow['Def'];
            if ($defChg < 0) {
                echo '<td>', $historyRow['Def'], ' <span style="color:red">(', $defChg, ')</span></td>';
            } else if ($defChg === 0) {
                echo '<td>', $historyRow['Def'], ' (', $defChg, ')</td>';
            } else if ($defChg > 0) {
                echo '<td>', $historyRow['Def'], ' <span style="color:green">(+', $defChg, ')</span></td>';
            }

            $olChg = $historyRow['OL'] - $previousRow['OL'];
            if ($olChg < 0) {
                echo '<td>', $historyRow['OL'], ' <span style="color:red">(', $olChg, ')</span></td>';
            } else if ($olChg === 0) {
                echo '<td>', $historyRow['OL'], ' (', $olChg, ')</td>';
            } else if ($olChg > 0) {
                echo '<td>', $historyRow['OL'], ' <span style="color:green">(+', $olChg, ')</span></td>';
            }

            $qbChg = $historyRow['QB'] - $previousRow['QB'];
            if ($qbChg < 0) {
                echo '<td>', $historyRow['QB'], ' <span style="color:red">(', $qbChg, ')</span></td>';
            } else if ($qbChg === 0) {
                echo '<td>', $historyRow['QB'], ' (', $qbChg, ')</td>';
            } else if ($qbChg > 0) {
                echo '<td>', $historyRow['QB'], ' <span style="color:green">(+', $qbChg, ')</span></td>';
            }

            $rbChg = $historyRow['RB'] - $previousRow['RB'];
            if ($rbChg < 0) {
                echo '<td>', $historyRow['RB'], ' <span style="color:red">(', $rbChg, ')</span></td>';
            } else if ($rbChg === 0) {
                echo '<td>', $historyRow['RB'], ' (', $rbChg, ')</td>';
            } else if ($rbChg > 0) {
                echo '<td>', $historyRow['RB'], ' <span style="color:green">(+', $rbChg, ')</span></td>';
            }

            $wrChg = $historyRow['WR'] - $previousRow['WR'];
            if ($wrChg < 0) {
                echo '<td>', $historyRow['WR'], ' <span style="color:red">(', $wrChg, ')</span></td>';
            } else if ($wrChg === 0) {
                echo '<td>', $historyRow['WR'], ' (', $wrChg, ')</td>';
            } else if ($wrChg > 0) {
                echo '<td>', $historyRow['WR'], ' <span style="color:green">(+', $wrChg, ')</span></td>';
            }

            $dlChg = $historyRow['DL'] - $previousRow['DL'];
            if ($dlChg < 0) {
                echo '<td>', $historyRow['DL'], ' <span style="color:red">(', $dlChg, ')</span></td>';
            } else if ($dlChg === 0) {
                echo '<td>', $historyRow['DL'], ' (', $dlChg, ')</td>';
            } else if ($dlChg > 0) {
                echo '<td>', $historyRow['DL'], ' <span style="color:green">(+', $dlChg, ')</span></td>';
            }

            $lbChg = $historyRow['LB'] - $previousRow['LB'];
            if ($lbChg < 0) {
                echo '<td>', $historyRow['LB'], ' <span style="color:red">(', $lbChg, ')</span></td>';
            } else if ($lbChg === 0) {
                echo '<td>', $historyRow['LB'], ' (', $lbChg, ')</td>';
            } else if ($lbChg > 0) {
                echo '<td>', $historyRow['LB'], ' <span style="color:green">(+', $lbChg, ')</span></td>';
            }

            $dbChg = $historyRow['DB'] - $previousRow['DB'];
            if ($dbChg < 0) {
                echo '<td>', $historyRow['DB'], ' <span style="color:red">(', $dbChg, ')</span></td>';
            } else if ($dbChg === 0) {
                echo '<td>', $historyRow['DB'], ' (', $dbChg, ')</td>';
            } else if ($dbChg > 0) {
                echo '<td>', $historyRow['DB'], ' <span style="color:green">(+', $dbChg, ')</span></td>';
            }

            $sChg = $historyRow['S'] - $previousRow['S'];
            if ($sChg < 0) {
                echo '<td>', $historyRow['S'], ' <span style="color:red">(', $sChg, ')</span></td>';
            } else if ($sChg === 0) {
                echo '<td>', $historyRow['S'], ' (', $sChg, ')</td>';
            } else if ($sChg > 0) {
                echo '<td>', $historyRow['S'], ' <span style="color:green">(+', $sChg, ')</span></td>';
            }

            $kChg = $historyRow['K'] - $previousRow['K'];
            if ($kChg < 0) {
                echo '<td>', $historyRow['K'], ' <span style="color:red">(', $kChg, ')</span></td>';
            } else if ($kChg === 0) {
                echo '<td>', $historyRow['K'], ' (', $kChg, ')</td>';
            } else if ($kChg > 0) {
                echo '<td>', $historyRow['K'], ' <span style="color:green">(+', $kChg, ')</span></td>';
            }

            $pChg = $historyRow['P'] - $previousRow['P'];
            if ($pChg < 0) {
                echo '<td>', $historyRow['P'], ' <span style="color:red">(', $pChg, ')</span></td>';
            } else if ($pChg === 0) {
                echo '<td>', $historyRow['P'], ' (', $pChg, ')</td>';
            } else if ($pChg > 0) {
                echo '<td>', $historyRow['P'], ' <span style="color:green">(+', $pChg, ')</span></td>';
            }

            echo '</tr>';
        }
    }


    echo '</table>
         </div>';
}




