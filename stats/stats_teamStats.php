<?php
$getFilter = mysql_query("SELECT Value FROM `stat_controls` WHERE Control='TeamStatsFilter'", $con);
$getFilterObj = mysql_fetch_object($getFilter);
$teamStatsFilter = $getFilterObj->Value;

$StatList = array();
array_push($StatList, 'Total Offense', 'Rush Offence', 'Pass Offense', 'Rushing TDs', 'Passing TDs', 'Offensive Red Zone Scoring Percent', 'Total Defense', 'Rush Defense', 'Pass Defense', 'Sacks', 'Interceptions', 'Fumbles Recovered', 'Defensive Red Zone Scoring Percent', 'Turnover Margin (+/-)', '3rd Down Conversion Percent', '4th Down Conversion Percent', '2 Point Conversion Attempts', '2 Point Conversion Percentage', 'Penalties Commited', 'Penalty Yards');
?>
<table id="teamStats_StatsTable" class="table table-condensed" style="text-align: center">
    <tr>
        <td colspan="6"><b>Team Stats for Franchise:<?php echo " " . $teamStatsFilter ?></b></td>
    </tr>
    <tr>
        <td>Stat</td><td>Seasons</td><td>Total</td><td>Average</td><td>Max</td><td>Min</td>
    </tr>
<?php
foreach ($StatList as $Stat) {
    echo '<tr>
                <td>';
    echo $Stat;
    echo '</td>
        <td>';
    $getActiveFranchisesStat = mysql_query("SELECT * FROM `franchise_info` Where Active='Y'", $con) or die(mysql_error());
    $valuesArray = array();
    $seasonCount = 0;
    if ($teamStatsFilter === 'All') {
        while ($getFranRow = mysql_fetch_array($getActiveFranchisesStat)) {
            $valueQuery = mysql_query("SELECT * FROM `{$getFranRow['Franchise']}_teamstats` WHERE Stat='{$Stat}'", $con) or die(mysql_error());
            $getSimulated = mysql_query("SELECT Value FROM `{$getFranRow['Franchise']}_info` WHERE Identify='regsim'", $con) or die(mysql_error());
            $getSimulatedObj = mysql_fetch_object($getSimulated);
            $simulated = $getSimulatedObj->Value;
            while ($valueRow = mysql_fetch_array($valueQuery)) {
                $value = intval(str_replace(',', '', $valueRow['Value']));
                if ($value === 0 or $simulated != '') {
                    
                } else {
                    array_push($valuesArray, $value);
                    $seasonCount++;
                }
            }
        }
    } else {
        $valueQuery = mysql_query("SELECT * FROM `{$teamStatsFilter}_teamstats` WHERE Stat='{$Stat}'", $con) or die(mysql_error());
        $getSimulated = mysql_query("SELECT Value FROM `{$teamStatsFilter}_info` WHERE Identify='regsim'", $con) or die(mysql_error());
        $getSimulatedObj = mysql_fetch_object($getSimulated);
        $simulated = $getSimulatedObj->Value;

        while ($valueRow = mysql_fetch_array($valueQuery)) {
            $value = intval(str_replace(',', '', $valueRow['Value']));
            if ($value === 0 or $simulated != '') {
                
            } else {
                array_push($valuesArray, $value);
                $seasonCount++;
            }
        }
    }
    echo $seasonCount;
    echo '</td>';
    if (empty($valuesArray)) {
        echo '<td colspan="5">First Season In Progress</td>';
    } else {
        echo '<td>';
        $sum = array_sum($valuesArray);
        if (strpos($Stat, 'Percent')) {
            echo '-';
        } else {
            echo number_format($sum, 0, '.', ',');
        }
        echo '</td>
              <td>';
        $arrayAVG = array_sum($valuesArray) / count($valuesArray);
        if (strpos($Stat, 'Percent')) {
            echo number_format($arrayAVG, 0, '.', ',') . "%";
        } else {
            echo number_format($arrayAVG, 0, '.', ',');
        }
        echo '</td>
              <td>';
        $max = max($valuesArray);
        if (strpos($Stat, 'Percent')) {
            echo number_format($max, 0, '.', ',') . "%";
        } else {
            echo number_format($max, 0, '.', ',');
        }
        echo '</td>
              <td>';
        $min = min($valuesArray);
        if (strpos($Stat, 'Percent')) {
            echo number_format($min, 0, '.', ',') . "%";
        } else {
            echo number_format($min, 0, '.', ',');
        }
        echo '</td>';
    }
    echo '</tr>';
}
?>
</table>