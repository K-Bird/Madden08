<?php
$getFilter = mysql_query("SELECT Value FROM `stat_controls` WHERE Control='IndvStatsFilter'", $con);
$getFilterObj = mysql_fetch_object($getFilter);
$indvStatsFilter = $getFilterObj->Value;
?>
<table id="teamStats_StatsTable" class="table table-condensed" style="text-align: center">
    <tr>
        <td colspan="6"><b>Team Stats for Franchise:<?php echo " " . $indvStatsFilter ?></b></td>
    </tr>
    <tr>
        <td>Stat</td><td>Players</td><td>Total</td><td>Average</td><td>Max</td><td>Min</td>
    </tr>
    <?php
    $PassingStatList = array();
    array_push($PassingStatList, 'Rating', 'Yards', 'TDs', 'INTs', 'Comp', 'Sacked');

    foreach ($PassingStatList as $PassingStat) {
        echo '<tr>
                <td>';
        echo $PassingStat;
        echo '</td>
        <td>';
        $getActiveFranchisesStat = mysql_query("SELECT * FROM `franchise_info` Where Active='Y'", $con) or die(mysql_error());
        $valuesArray = array();
        $seasonCount = 0;
        if ($indvStatsFilter === 'All') {
            while ($getFranRow = mysql_fetch_array($getActiveFranchisesStat)) {
                $valueQuery = mysql_query("SELECT {$PassingStat} FROM `{$getFranRow['Franchise']}_stats_passing`", $con) or die(mysql_error());
                $getSimulated = mysql_query("SELECT Value FROM `{$getFranRow['Franchise']}_info` WHERE Identify='regsim'", $con) or die(mysql_error());
                $getSimulatedObj = mysql_fetch_object($getSimulated);
                $simulated = $getSimulatedObj->Value;
                while ($valueRow = mysql_fetch_array($valueQuery)) {
                    $value = intval(str_replace(',', '', $valueRow[$PassingStat]));
                    if ($value === 0 or $simulated != '') {
                        
                    } else {
                        array_push($valuesArray, $value);
                        $seasonCount++;
                    }
                }
            }
        } else {
            $valueQuery = mysql_query("SELECT * FROM `{$indvStatsFilter}_stats_passing`", $con) or die(mysql_error());
            $getSimulated = mysql_query("SELECT Value FROM `{$indvStatsFilter}_info` WHERE Identify='regsim'", $con) or die(mysql_error());
            $getSimulatedObj = mysql_fetch_object($getSimulated);
            $simulated = $getSimulatedObj->Value;

            while ($valueRow = mysql_fetch_array($valueQuery)) {
                $value = intval(str_replace(',', '', $valueRow[$PassingStat]));
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
    <tr>
        <td colspan="6" style="background-color : black"></td>
    </tr>
    <?php
    $RushingStatList = array();
    array_push($RushingStatList, 'Yards', 'TDs', 'YPC', 'Fumble', 'Broken', 'LongRun');

    foreach ($RushingStatList as $RushingStat) {
        echo '<tr>
                <td>';
        echo $RushingStat;
        echo '</td>
        <td>';
        $getActiveFranchisesStat = mysql_query("SELECT * FROM `franchise_info` Where Active='Y'", $con) or die(mysql_error());
        $valuesArray = array();
        $seasonCount = 0;
        if ($indvStatsFilter === 'All') {
            while ($getFranRow = mysql_fetch_array($getActiveFranchisesStat)) {
                $valueQuery = mysql_query("SELECT {$RushingStat} FROM `{$getFranRow['Franchise']}_stats_rushing`", $con) or die(mysql_error());
                $getSimulated = mysql_query("SELECT Value FROM `{$getFranRow['Franchise']}_info` WHERE Identify='regsim'", $con) or die(mysql_error());
                $getSimulatedObj = mysql_fetch_object($getSimulated);
                $simulated = $getSimulatedObj->Value;
                while ($valueRow = mysql_fetch_array($valueQuery)) {
                    $value = intval(str_replace(',', '', $valueRow[$RushingStat]));
                    if ($value === 0 or $simulated != '') {
                        
                    } else {
                        array_push($valuesArray, $value);
                        $seasonCount++;
                    }
                }
            }
        } else {
            $valueQuery = mysql_query("SELECT * FROM `{$indvStatsFilter}_stats_rushing`", $con) or die(mysql_error());
            $getSimulated = mysql_query("SELECT Value FROM `{$indvStatsFilter}_info` WHERE Identify='regsim'", $con) or die(mysql_error());
            $getSimulatedObj = mysql_fetch_object($getSimulated);
            $simulated = $getSimulatedObj->Value;

            while ($valueRow = mysql_fetch_array($valueQuery)) {
                $value = intval(str_replace(',', '', $valueRow[$RushingStat]));
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
    <tr>
        <td colspan="6" style="background-color : black"></td>
    </tr>
    <?php
    $RecStatList = array();
    array_push($RecStatList, 'Rec', 'Yards', 'TDs', 'YPC', 'LongCatch', 'Drops');

    foreach ($RecStatList as $RecStat) {
        echo '<tr>
                <td>';
        echo $RecStat;
        echo '</td>
        <td>';
        $getActiveFranchisesStat = mysql_query("SELECT * FROM `franchise_info` Where Active='Y'", $con) or die(mysql_error());
        $valuesArray = array();
        $seasonCount = 0;
        if ($indvStatsFilter === 'All') {
            while ($getFranRow = mysql_fetch_array($getActiveFranchisesStat)) {
                $valueQuery = mysql_query("SELECT {$RecStat} FROM `{$getFranRow['Franchise']}_stats_rec`", $con) or die(mysql_error());
                $getSimulated = mysql_query("SELECT Value FROM `{$getFranRow['Franchise']}_info` WHERE Identify='regsim'", $con) or die(mysql_error());
                $getSimulatedObj = mysql_fetch_object($getSimulated);
                $simulated = $getSimulatedObj->Value;
                while ($valueRow = mysql_fetch_array($valueQuery)) {
                    $value = intval(str_replace(',', '', $valueRow[$RecStat]));
                    if ($value === 0 or $simulated != '') {
                        
                    } else {
                        array_push($valuesArray, $value);
                        $seasonCount++;
                    }
                }
            }
        } else {
            $valueQuery = mysql_query("SELECT * FROM `{$indvStatsFilter}_stats_rec`", $con) or die(mysql_error());
            $getSimulated = mysql_query("SELECT Value FROM `{$indvStatsFilter}_info` WHERE Identify='regsim'", $con) or die(mysql_error());
            $getSimulatedObj = mysql_fetch_object($getSimulated);
            $simulated = $getSimulatedObj->Value;

            while ($valueRow = mysql_fetch_array($valueQuery)) {
                $value = intval(str_replace(',', '', $valueRow[$RecStat]));
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
    <tr>
        <td colspan="6" style="background-color : black"></td>
    </tr>
    <?php
    $BlockStatList = array();
    array_push($BlockStatList, 'Pancakes', 'Sacks');

    foreach ($BlockStatList as $BlockStat) {
        echo '<tr>
                <td>';
        echo $BlockStat;
        echo '</td>
        <td>';
        $getActiveFranchisesStat = mysql_query("SELECT * FROM `franchise_info` Where Active='Y'", $con) or die(mysql_error());
        $valuesArray = array();
        $seasonCount = 0;
        if ($indvStatsFilter === 'All') {
            while ($getFranRow = mysql_fetch_array($getActiveFranchisesStat)) {
                $valueQuery = mysql_query("SELECT {$BlockStat} FROM `{$getFranRow['Franchise']}_stats_block`", $con) or die(mysql_error());
                $getSimulated = mysql_query("SELECT Value FROM `{$getFranRow['Franchise']}_info` WHERE Identify='regsim'", $con) or die(mysql_error());
                $getSimulatedObj = mysql_fetch_object($getSimulated);
                $simulated = $getSimulatedObj->Value;
                while ($valueRow = mysql_fetch_array($valueQuery)) {
                    $value = intval(str_replace(',', '', $valueRow[$BlockStat]));
                    if ($value === 0 or $simulated != '') {
                        
                    } else {
                        array_push($valuesArray, $value);
                        $seasonCount++;
                    }
                }
            }
        } else {
            $valueQuery = mysql_query("SELECT * FROM `{$indvStatsFilter}_stats_block`", $con) or die(mysql_error());
            $getSimulated = mysql_query("SELECT Value FROM `{$indvStatsFilter}_info` WHERE Identify='regsim'", $con) or die(mysql_error());
            $getSimulatedObj = mysql_fetch_object($getSimulated);
            $simulated = $getSimulatedObj->Value;

            while ($valueRow = mysql_fetch_array($valueQuery)) {
                $value = intval(str_replace(',', '', $valueRow[$BlockStat]));
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
    <tr>
        <td colspan="6" style="background-color : black"></td>
    </tr>
    <?php
    $DefStatList = array();
    array_push($DefStatList, 'Tackles', 'ForLoss', 'Sacks', 'INTs', 'TDs', 'Saftey');

    foreach ($DefStatList as $DefStat) {
        echo '<tr>
                <td>';
        echo $DefStat;
        echo '</td>
        <td>';
        $getActiveFranchisesStat = mysql_query("SELECT * FROM `franchise_info` Where Active='Y'", $con) or die(mysql_error());
        $valuesArray = array();
        $seasonCount = 0;
        if ($indvStatsFilter === 'All') {
            while ($getFranRow = mysql_fetch_array($getActiveFranchisesStat)) {
                $valueQuery = mysql_query("SELECT {$DefStat} FROM `{$getFranRow['Franchise']}_stats_def`", $con) or die(mysql_error());
                $getSimulated = mysql_query("SELECT Value FROM `{$getFranRow['Franchise']}_info` WHERE Identify='regsim'", $con) or die(mysql_error());
                $getSimulatedObj = mysql_fetch_object($getSimulated);
                $simulated = $getSimulatedObj->Value;
                while ($valueRow = mysql_fetch_array($valueQuery)) {
                    $value = intval(str_replace(',', '', $valueRow[$DefStat]));
                    if ($value === 0 or $simulated != '') {
                        
                    } else {
                        array_push($valuesArray, $value);
                        $seasonCount++;
                    }
                }
            }
        } else {
            $valueQuery = mysql_query("SELECT * FROM `{$indvStatsFilter}_stats_def`", $con) or die(mysql_error());
            $getSimulated = mysql_query("SELECT Value FROM `{$indvStatsFilter}_info` WHERE Identify='regsim'", $con) or die(mysql_error());
            $getSimulatedObj = mysql_fetch_object($getSimulated);
            $simulated = $getSimulatedObj->Value;

            while ($valueRow = mysql_fetch_array($valueQuery)) {
                $value = intval(str_replace(',', '', $valueRow[$DefStat]));
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
    <tr>
        <td colspan="6" style="background-color : black"></td>
    </tr>
    <?php
    $STStatList = array();
    array_push($STStatList, 'FGA', 'FGM', 'FG_Percent', 'Longest_Play', 'Punt_AVG', 'I20','Ret_AVG','Ret_TDs');

    foreach ($STStatList as $STStat) {
        echo '<tr>
                <td>';
        echo $STStat;
        echo '</td>
        <td>';
        $getActiveFranchisesStat = mysql_query("SELECT * FROM `franchise_info` Where Active='Y'", $con) or die(mysql_error());
        $valuesArray = array();
        $seasonCount = 0;
        if ($indvStatsFilter === 'All') {
            while ($getFranRow = mysql_fetch_array($getActiveFranchisesStat)) {
                $valueQuery = mysql_query("SELECT {$STStat} FROM `{$getFranRow['Franchise']}_stats_special`", $con) or die(mysql_error());
                $getSimulated = mysql_query("SELECT Value FROM `{$getFranRow['Franchise']}_info` WHERE Identify='regsim'", $con) or die(mysql_error());
                $getSimulatedObj = mysql_fetch_object($getSimulated);
                $simulated = $getSimulatedObj->Value;
                while ($valueRow = mysql_fetch_array($valueQuery)) {
                    $value = intval(str_replace(',', '', $valueRow[$STStat]));
                    if ($value === 0 or $simulated != '') {
                        
                    } else {
                        array_push($valuesArray, $value);
                        $seasonCount++;
                    }
                }
            }
        } else {
            $valueQuery = mysql_query("SELECT * FROM `{$indvStatsFilter}_stats_special`", $con) or die(mysql_error());
            $getSimulated = mysql_query("SELECT Value FROM `{$indvStatsFilter}_info` WHERE Identify='regsim'", $con) or die(mysql_error());
            $getSimulatedObj = mysql_fetch_object($getSimulated);
            $simulated = $getSimulatedObj->Value;

            while ($valueRow = mysql_fetch_array($valueQuery)) {
                $value = intval(str_replace(',', '', $valueRow[$STStat]));
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