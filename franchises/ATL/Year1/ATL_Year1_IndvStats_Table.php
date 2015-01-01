<?php
$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);
?>

<div class="panel-group" id="IndvCollapse" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="passingHeader">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#IndvCollapse" href="#passingCollapse" aria-expanded="true" aria-controls="passingCollapse">
                    Passing Stats
                </a>
            </h4>
        </div>
        <div id="passingCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="passingHeader">
            <div class="panel-body">
                <table class="table table-hover" id="passingStatsTable" style="text-align: center; font-size: small">
                    <tr>
                        <td>Player</td><td>Passer Rating</td><td>Passing Yards</td><td>Passing TDs</td><td>Interceptions</td><td>Completion %</td><td>Times Sacked</td>
                    </tr>
                    <?php
                    $passingResult = mysql_query("SELECT * FROM `{$fran}_stats_passing` Where Year='{$franYear}'");

                    while ($PassingRow = mysql_fetch_array($passingResult)) {
                        echo '<tr>',
                        '<td><span id="', $PassingRow['Row'], 'Pass" class="passingHistory" style="cursor: pointer" data-toggle="popover" title="Passing History">', $PassingRow['Player'], '</span></td>',
                        '<td>', $PassingRow['Rating'], '</td>',
                        '<td>', $PassingRow['Yards'], '</td>',
                        '<td>', $PassingRow['TDs'], '</td>',
                        '<td>', $PassingRow['INTs'], '</td>',
                        '<td>', $PassingRow['Comp'], '</td>',
                        '<td>', $PassingRow['Sacked'], '</td>',
                        '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="rushingHeader">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#IndvCollapse" href="#rushingCollapse" aria-expanded="true" aria-controls="rushingCollapse">
                    Rushing Stats
                </a>
            </h4>
        </div>
        <div id="rushingCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="rushingHeader">
            <div class="panel-body">
                <table class="table table-hover" id="rushingStatsTable" style="text-align: center; font-size: small">
                    <tr>
                        <td>Player</td><td>Rush Yards</td><td>Rush TDs</td><td>Yards Per Carry</td><td>Fumbles</td><td>Broken Tackles</td><td>Longest Run</td>
                    </tr>
                    <?php
                    $rushingResult = mysql_query("SELECT * FROM `{$fran}_stats_rushing` Where Year='{$franYear}'");

                    while ($RushingRow = mysql_fetch_array($rushingResult)) {
                        echo '<tr>',
                        '<td><span id="', $RushingRow['Row'], 'Rush" class="rushingHistory" style="cursor: pointer" data-toggle="popover" title="Rushing History">', $RushingRow['Player'], '</span></td>',
                        '<td>', $RushingRow['Yards'], '</td>',
                        '<td>', $RushingRow['TDs'], '</td>',
                        '<td>', $RushingRow['YPC'], '</td>',
                        '<td>', $RushingRow['Fumble'], '</td>',
                        '<td>', $RushingRow['Broken'], '</td>',
                        '<td>', $RushingRow['LongRun'], '</td>',
                        '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="recHeader">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#IndvCollapse" href="#recCollapse" aria-expanded="true" aria-controls="recCollapse">
                    Receiving Stats
                </a>
            </h4>
        </div>
        <div id="recCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="recHeader">
            <div class="panel-body">
                <table class="table table-hover" id="recStatsTable" style="text-align: center; font-size: small">
                    <tr>
                        <td>Player</td><td>Receptions</td><td>Receiving Yards</td><td>Receiving TDs</td><td>Yards Per Catch</td><td>Longest Catch</td><td>Drops</td>
                    </tr>
                    <?php
                    $recResult = mysql_query("SELECT * FROM `{$fran}_stats_rec` Where Year='{$franYear}'");

                    while ($RecRow = mysql_fetch_array($recResult)) {
                        echo '<tr>',
                        '<td><span id="', $RecRow['Row'], 'Rec" class="recHistory" style="cursor: pointer" data-toggle="popover" title="Receiving History">', $RecRow['Player'], '</span></td>',
                        '<td>', $RecRow['Rec'], '</td>',
                        '<td>', $RecRow['Yards'], '</td>',
                        '<td>', $RecRow['TDs'], '</td>',
                        '<td>', $RecRow['YPC'], '</td>',
                        '<td>', $RecRow['LongCatch'], '</td>',
                        '<td>', $RecRow['Drops'], '</td>',
                        '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="blockingHeader">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#IndvCollapse" href="#blockingCollapse" aria-expanded="true" aria-controls="blockingCollapse">
                    Blocking Stats
                </a>
            </h4>
        </div>
        <div id="blockingCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="blockingHeader">
            <div class="panel-body">
                <table class="table table-hover" id="blockingStatsTable" style="text-align: center; font-size: small">
                    <tr>
                        <td>Player</td><td>Position</td><td>Pancakes</td><td>Sacks Allowed</td>
                    </tr>
                    <?php
                    $blockingResult = mysql_query("SELECT * FROM `{$fran}_stats_block` Where Year='{$franYear}'");

                    while ($BlockRow = mysql_fetch_array($blockingResult)) {
                        echo '<tr>',
                        '<td><span id="', $BlockRow['Row'], 'Block" class="blockingHistory" style="cursor: pointer" data-toggle="popover" title="Blocking History">', $BlockRow['Player'], '</span></td>',
                        '<td>', $BlockRow['Position'], '</td>',
                        '<td>', $BlockRow['Pancakes'], '</td>',
                        '<td>', $BlockRow['Sacks'], '</td>',
                        '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="defHeader">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#IndvCollapse" href="#defCollapse" aria-expanded="true" aria-controls="defCollapse">
                    Defensive Stats
                </a>
            </h4>
        </div>
        <div id="defCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="defHeader">
            <div class="panel-body">
                <table class="table table-hover" id="defStatsTable" style="text-align: center; font-size: small">
                    <tr>
                        <td>Player</td><td>Tackles</td><td>Tackles for Loss</td><td>Sacks</td><td>INTs</td><td>TDs</td><td>Saftey</td>
                    </tr>
                    <?php
                    $defResult = mysql_query("SELECT * FROM `{$fran}_stats_def` Where Year='{$franYear}'");

                    while ($defRow = mysql_fetch_array($defResult)) {
                        echo '<tr>',
                        '<td><span id="', $defRow['Row'], 'Def" class="defHistory" style="cursor: pointer" data-toggle="popover" title="Defensive History">', $defRow['Player'], '</span></td>',
                        '<td>', $defRow['Tackles'], '</td>',
                        '<td>', $defRow['ForLoss'], '</td>',
                        '<td>', $defRow['Sacks'], '</td>',
                        '<td>', $defRow['INTs'], '</td>',
                        '<td>', $defRow['TDs'], '</td>',
                        '<td>', $defRow['Saftey'], '</td>',
                        '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="STHeader">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#IndvCollapse" href="#STCollapse" aria-expanded="true" aria-controls="STCollapse">
                    Special Teams Stats
                </a>
            </h4>
        </div>
        <div id="STCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="STHeader">
            <div class="panel-body">
                <table class="table table-hover" id="STKickingStatsTable" style="text-align: center; font-size: small">
                    <tr>
                        <td colspan="5" style="text-align: left">Kicking</td>
                    </tr>
                    <tr>
                        <td>Player</td><td>Field Goals Attempted</td><td>Field Goals Made</td><td>Field Goal Percent</td><td>Longest Made</td>
                    </tr>
                    <?php
                    $STKResult = mysql_query("SELECT * FROM `{$fran}_stats_special` Where Year='{$franYear}' and Category='Kicking' ");

                    while ($STKRow = mysql_fetch_array($STKResult)) {
                        echo '<tr>',
                        '<td><span id="', $STKRow['Row'], 'ST-" class="STHistory" style="cursor: pointer" data-toggle="popover" title="Special Teams History">', $STKRow['Player'], '</span></td>',
                        '<td>', $STKRow['FGA'], '</td>',
                        '<td>', $STKRow['FGM'], '</td>',
                        '<td>', $STKRow['FG_Percent'], '</td>',
                        '<td>', $STKRow['Longest_Play'], '</td>';
                        '</tr>';
                    }
                    ?>
                </table>
                <table class="table table-hover" id="STPuntStatsTable" style="text-align: center; font-size: small">
                    <tr>
                        <td colspan="3" style="text-align: left">Punting</td>
                    </tr>
                    <tr>
                        <td>Player</td><td>Punt Average</td><td>Punts Inside the 20</td>
                    </tr>
                    <?php
                    $STPResult = mysql_query("SELECT * FROM `{$fran}_stats_special` Where Year='{$franYear}' and Category='Punting' ");

                    while ($STPRow = mysql_fetch_array($STPResult)) {
                        echo '<tr>',
                        '<td><span id="', $STPRow['Row'], 'ST-" class="STHistory" style="cursor: pointer" data-toggle="popover" title="Special Teams History">', $STPRow['Player'], '</span></td>',
                        '<td>', $STPRow['Punt_AVG'], '</td>',
                        '<td>', $STPRow['I20'], '</td>';
                        '</tr>';
                    }
                    ?>
                </table>
                <table class="table table-hover" id="ST-KR-StatsTable" style="text-align: center; font-size: small">
                    <tr>
                        <td colspan="4" style="text-align: left">Kick Return</td>
                    </tr>
                    <tr>
                        <td>Player</td><td>Return Average</td><td>Return TDs</td><td>Longest Return</td>
                    </tr>
                    <?php
                    $STKRResult = mysql_query("SELECT * FROM `{$fran}_stats_special` Where Year='{$franYear}' and Category='KR' ");

                    while ($STKRRow = mysql_fetch_array($STKRResult)) {
                        echo '<tr>',
                        '<td><span id="', $STKRRow['Row'], 'ST-" class="STHistory" style="cursor: pointer" data-toggle="popover" title="Special Teams History">', $STKRRow['Player'], '</span></td>',
                        '<td>', $STKRRow['Ret_AVG'], '</td>',
                        '<td>', $STKRRow['Ret_TDs'], '</td>',
                        '<td>', $STKRRow['Longest_Play'], '</td>',
                        '</tr>';
                    }
                    ?>
                </table>
                <table class="table table-hover" id="ST-KR-StatsTable" style="text-align: center; font-size: small">
                    <tr>
                        <td colspan="4" style="text-align: left">Punt Return</td>
                    </tr>
                    <tr>
                        <td>Player</td><td>Return Average</td><td>Return TDs</td><td>Longest Return</td>
                    </tr>
                    <?php
                    $STPRResult = mysql_query("SELECT * FROM `{$fran}_stats_special` Where Year='{$franYear}' and Category='PR' ");

                    while ($STPRRow = mysql_fetch_array($STPRResult)) {
                        echo '<tr>',
                        '<td><span id="', $STPRRow['Row'], 'ST-" class="STHistory" style="cursor: pointer" data-toggle="popover" title="Special Teams History">', $STPRRow['Player'], '</span></td>',
                        '<td>', $STPRRow['Ret_AVG'], '</td>',
                        '<td>', $STPRRow['Ret_TDs'], '</td>',
                        '<td>', $STPRRow['Longest_Play'], '</td>',
                        '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>


<?php
include ('../../_history/passing_History.php');
include ('../../_history/rushing_History.php');
include ('../../_history/rec_History.php');
include ('../../_history/block_History.php');
include ('../../_history/def_History.php');
include ('../../_history/st_History.php');
