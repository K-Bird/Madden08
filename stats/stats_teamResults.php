<?php
$getFilter = mysql_query("SELECT Value FROM `stat_controls` WHERE Control='TeamResultsFilter'", $con);
$getFilterObj = mysql_fetch_object($getFilter);
$teamResultsFilter = $getFilterObj->Value;
?>
<table id="teamStats_ResultsTable" class="table table-condensed">
    <tr>
        <td colspan="3" style="text-align: center"><b>Result Stats for Franchise:<?php echo " " . $teamResultsFilter ?></b></td>
    </tr>
    <tr>
        <td>Record</td><td>Average Score For</td><td>Average Score Against</td>
    </tr>
    <tr>
        <!-- Record Cell -->
        <td>
            <?php
            $totalWins = 0;
            $totalLosses = 0;
            $getActiveFranchisesRec = mysql_query("SELECT * FROM `franchise_info` Where Active='Y'", $con) or die(mysql_error());
            if ($teamResultsFilter === 'All') {
                //For each active franchise: loop through and add wins and losses
                while ($getFranRow = mysql_fetch_array($getActiveFranchisesRec)) {
                    $completedYears = $getFranRow['CurrentYear'] - 1;

                    $getLossesForFran = mysql_query("SELECT count(*) as Losses FROM `{$getFranRow['Franchise']}_results` WHERE `Result` = 'L'", $con) or die(mysql_error());
                    $totalLossesObj = mysql_fetch_object($getLossesForFran);
                    $totalFranLosses = $totalLossesObj->Losses;
                    $totalLosses = $totalLosses + $totalFranLosses;

                    $getWinsForFran = mysql_query("SELECT count(*) as Wins FROM `{$getFranRow['Franchise']}_results` WHERE `Result` = 'W'", $con) or die(mysql_error());
                    $totalWinsObj = mysql_fetch_object($getWinsForFran);
                    $totalFranWins = $totalWinsObj->Wins;
                    $totalWins = $totalWins + $totalFranWins;
                }
                $totalGames = $totalWins + $totalLosses;

                echo "Games Played: " . $totalGames . "<br> (" . $totalWins . "-" . $totalLosses . ")";
            } else {
                $getLossesForFran = mysql_query("SELECT count(*) as Losses FROM `{$teamResultsFilter}_results` WHERE `Result` = 'L'", $con) or die(mysql_error());
                $totalLossesObj = mysql_fetch_object($getLossesForFran);
                $totalFranLosses = $totalLossesObj->Losses;
                $totalLosses = $totalLosses + $totalFranLosses;

                $getWinsForFran = mysql_query("SELECT count(*) as Wins FROM `{$teamResultsFilter}_results` WHERE `Result` = 'W'", $con) or die(mysql_error());
                $totalWinsObj = mysql_fetch_object($getWinsForFran);
                $totalFranWins = $totalWinsObj->Wins;
                $totalWins = $totalWins + $totalFranWins;

                $totalGames = $totalFranWins + $totalFranLosses;

                echo "Games Played: " . $totalGames . "<br> (" . $totalWins . "-" . $totalLosses . ")";
            }
            ?>
        </td>
        <!-- Score For Cell -->
        <td>
            <?php
            $getActiveFranchisesFor = mysql_query("SELECT * FROM `franchise_info` Where Active='Y'", $con) or die(mysql_error());
            if ($teamResultsFilter === 'All') {
                $totalFor = 0;
                $gameCount = 0;
                while ($getFranRow = mysql_fetch_array($getActiveFranchisesFor)) {
                    $getFranResults = mysql_query("SELECT * FROM `{$getFranRow['Franchise']}_results`", $con) or die(mysql_error());
                    while ($getResultRow = mysql_fetch_array($getFranResults)) {
                        if ($getResultRow['Score'] === "-" or $getResultRow['Score'] === '') {
                            
                        } else {
                            $splitScore = explode("-", $getResultRow['Score']);
                            $totalFor = $totalFor + $splitScore[0];
                            $gameCount++;
                        }
                    }
                }
                $avgPerGm = $totalFor / $gameCount;
                echo "Total Points For: " . $totalFor . "<br> Avg Points Per Game: " . number_format($avgPerGm, 2, '.', '');
            } else {
                $totalFor = 0;
                $gameCount = 0;
                $getFranResults = mysql_query("SELECT * FROM `{$teamResultsFilter}_results`", $con) or die(mysql_error());
                while ($getResultRow = mysql_fetch_array($getFranResults)) {
                    if ($getResultRow['Score'] === "-" or $getResultRow['Score'] === '') {
                        
                    } else {
                        $splitScore = explode("-", $getResultRow['Score']);
                        $totalFor = $totalFor + $splitScore[0];
                        $gameCount++;
                    }
                }
                if ($gameCount === 0) {
                    echo "No Games Played";
                } else {
                    $avgPerGm = $totalFor / $gameCount;
                    echo "Total Points For: " . $totalFor . "<br> Avg Points Per Game: " . number_format($avgPerGm, 2, '.', '');
                }
            }
            ?>
        </td>
        <!-- Score Against Cell -->
        <td>
            <?php
            $getActiveFranchisesAgainst = mysql_query("SELECT * FROM `franchise_info` Where Active='Y'", $con) or die(mysql_error());
            if ($teamResultsFilter === 'All') {
                $totalFor = 0;
                $gameCount = 0;
                while ($getFranRow = mysql_fetch_array($getActiveFranchisesAgainst)) {
                    $getFranResults = mysql_query("SELECT * FROM `{$getFranRow['Franchise']}_results`", $con) or die(mysql_error());
                    while ($getResultRow = mysql_fetch_array($getFranResults)) {
                        if ($getResultRow['Score'] === "-" or $getResultRow['Score'] === '') {
                            
                        } else {
                            $splitScore = explode("-", $getResultRow['Score']);
                            $totalFor = $totalFor + $splitScore[1];
                            $gameCount++;
                        }
                    }
                }
                $avgPerGm = $totalFor / $gameCount;
                echo "Total Points Against: " . $totalFor . "<br> Avg Points Against Per Game: " . number_format($avgPerGm, 2, '.', '');
            } else {
                $totalFor = 0;
                $gameCount = 0;
                $getFranResults = mysql_query("SELECT * FROM `{$teamResultsFilter}_results`", $con) or die(mysql_error());
                while ($getResultRow = mysql_fetch_array($getFranResults)) {
                    if ($getResultRow['Score'] === "-" or $getResultRow['Score'] === '') {
                        
                    } else {
                        $splitScore = explode("-", $getResultRow['Score']);
                        $totalFor = $totalFor + $splitScore[1];
                        $gameCount++;
                    }
                }
                if ($gameCount === 0) {
                    echo "No Games Played";
                } else {
                    $avgPerGm = $totalFor / $gameCount;
                    echo "Total Points Against: " . $totalFor . "<br> Avg Points Against Per Game: " . number_format($avgPerGm, 2, '.', '');
                }
            }
            ?>
        </td>
    </tr>
</table>