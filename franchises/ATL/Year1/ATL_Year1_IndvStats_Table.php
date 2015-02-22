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
                        <td>Player</td><td>Passer Rating</td><td>Passing Yards</td><td>Passing TDs</td><td>Interceptions</td><td>Completion %</td><td>Times Sacked</td><td></td>
                    </tr>
                        <?php
                        $passingResult = mysql_query("SELECT * FROM `{$fran}_stats_passing` Where Year='{$franYear}'");

                        while ($PassingRow = mysql_fetch_array($passingResult)) {
                            echo '<tr>',
                            '<td><span id="', $PassingRow['Row'], 'Pass" class="passingHistory" style="cursor: pointer" data-toggle="popover" title="Passing History">', $PassingRow['Player'], '</span>&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/', $fran, '/', $franYear, '/Player/passing" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                            '<td>', $PassingRow['Rating'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/', $fran, '/', $franYear, '/Rating/passing" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                            '<td>', $PassingRow['Yards'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/', $fran, '/', $franYear, '/Yards/passing" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                            '<td>', $PassingRow['TDs'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/', $fran, '/', $franYear, '/TDs/passing" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                            '<td>', $PassingRow['INTs'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/', $fran, '/', $franYear, '/INTs/passing" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                            '<td>', $PassingRow['Comp'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/', $fran, '/', $franYear, '/Comp/passing" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                            '<td>', $PassingRow['Sacked'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/', $fran, '/', $franYear, '/Sacked/passing" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                            '<td><a class="btn btn-danger indvStatRemove removeStatRow" style="display: none" id="',$PassingRow['Row'],'/passing/',$fran,'" onclick="removeIndvStat(this)">Remove Row</a></td>',
                            '</tr>';
                        }
                        ?>
                    <tr>
                        <td colspan="7"><a class="btn btn-success indvStatAdd" data-toggle="modal" data-target="#addPassModal" style="display:none">Add Passing Stat Row</a></td>
                    </tr>
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
                        '<td><span id="', $RushingRow['Row'], 'Rush" class="rushingHistory" style="cursor: pointer" data-toggle="popover" title="Rushing History">', $RushingRow['Player'], '</span>&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/', $fran, '/', $franYear, '/Player/rushing" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $RushingRow['Yards'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/', $fran, '/', $franYear, '/Yards/rushing" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $RushingRow['TDs'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/', $fran, '/', $franYear, '/TDs/rushing" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $RushingRow['YPC'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/', $fran, '/', $franYear, '/YPC/rushing" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $RushingRow['Fumble'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/', $fran, '/', $franYear, '/Fumble/rushing" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $RushingRow['Broken'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/', $fran, '/', $franYear, '/Broken/rushing" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $RushingRow['LongRun'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/', $fran, '/', $franYear, '/LongRun/rushing" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td><a class="btn btn-danger indvStatRemove removeStatRow" style="display: none" id="',$RushingRow['Row'],'/rushing/',$fran,'" onclick="removeIndvStat(this)">Remove Row</a></td>',
                        '</tr>';
                    }
                    ?>
                    <tr>
                        <td colspan="7"><a class="btn btn-success indvStatAdd" data-toggle="modal" data-target="#addRushModal" style="display:none">Add Rushing Stat Row</a></td>
                    </tr>
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
                        '<td><span id="', $RecRow['Row'], 'Rec" class="recHistory" style="cursor: pointer" data-toggle="popover" title="Receiving History">', $RecRow['Player'], '</span>&nbsp;&nbsp;<span id="', $RecRow['Row'], '/', $fran, '/', $franYear, '/Player/rec" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $RecRow['Rec'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/', $fran, '/', $franYear, '/Rec/rec" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $RecRow['Yards'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/', $fran, '/', $franYear, '/Yards/rec" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $RecRow['TDs'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/', $fran, '/', $franYear, '/TDs/rec" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $RecRow['YPC'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/', $fran, '/', $franYear, '/YPC/rec" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $RecRow['LongCatch'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/', $fran, '/', $franYear, '/LongCatch/rec" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $RecRow['Drops'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/', $fran, '/', $franYear, '/Drops/rec" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td><a class="btn btn-danger indvStatRemove removeStatRow" style="display: none" id="',$RecRow['Row'],'/rec/',$fran,'" onclick="removeIndvStat(this)">Remove Row</a></td>',
                        '</tr>';
                    }
                    ?>
                    <tr>
                        <td colspan="7"><a class="btn btn-success indvStatAdd" data-toggle="modal" data-target="#addRecModal" style="display:none">Add Receiving Stat Row</a></td>
                    </tr>
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
                        '<td><span id="', $BlockRow['Row'], 'Block" class="blockingHistory" style="cursor: pointer" data-toggle="popover" title="Blocking History">', $BlockRow['Player'], '</span>&nbsp;&nbsp;<span id="', $BlockRow['Row'], '/', $fran, '/', $franYear, '/Player/block" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $BlockRow['Position'], '&nbsp;&nbsp;<span id="', $BlockRow['Row'], '/', $fran, '/', $franYear, '/Position/block" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $BlockRow['Pancakes'], '&nbsp;&nbsp;<span id="', $BlockRow['Row'], '/', $fran, '/', $franYear, '/Pancakes/block" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $BlockRow['Sacks'], '&nbsp;&nbsp;<span id="', $BlockRow['Row'], '/', $fran, '/', $franYear, '/Sacks/block" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '</tr>';
                    }
                    ?>
                    <tr>
                        <td colspan="7"><a class="btn btn-success indvStatAdd" data-toggle="modal" data-target="#addPassModal" style="display:none">Add Blocking Stat Row</a></td>
                    </tr>
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
                        '<td><span id="', $defRow['Row'], 'Def" class="defHistory" style="cursor: pointer" data-toggle="popover" title="Defensive History">', $defRow['Player'], '</span>&nbsp;&nbsp;<span id="', $defRow['Row'], '/', $fran, '/', $franYear, '/Player/def" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $defRow['Tackles'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/', $fran, '/', $franYear, '/Tackles/def" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $defRow['ForLoss'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/', $fran, '/', $franYear, '/ForLoss/def" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $defRow['Sacks'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/', $fran, '/', $franYear, '/Sacks/def" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $defRow['INTs'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/', $fran, '/', $franYear, '/INTs/def" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $defRow['TDs'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/', $fran, '/', $franYear, '/TDs/def" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $defRow['Saftey'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/', $fran, '/', $franYear, '/Saftey/def" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '</tr>';
                    }
                    ?>
                    <tr>
                        <td colspan="7"><a class="btn btn-success indvStatAdd" data-toggle="modal" data-target="#addPassModal" style="display:none">Add Defensive Stat Row</a></td>
                    </tr>
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
                        '<td><span id="', $STKRow['Row'], 'ST-" class="STHistory" style="cursor: pointer" data-toggle="popover" title="Special Teams History">', $STKRow['Player'], '</span>&nbsp;&nbsp;<span id="', $STKRow['Row'], '/', $fran, '/', $franYear, '/Player/special" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $STKRow['FGA'], '&nbsp;&nbsp;<span id="', $STKRow['Row'], '/', $fran, '/', $franYear, '/FGA/special" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $STKRow['FGM'], '&nbsp;&nbsp;<span id="', $STKRow['Row'], '/', $fran, '/', $franYear, '/FGM/special" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $STKRow['FG_Percent'], '&nbsp;&nbsp;<span id="', $STKRow['Row'], '/', $fran, '/', $franYear, '/FG_Percent/special" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $STKRow['Longest_Play'], '&nbsp;&nbsp;<span id="', $STKRow['Row'], '/', $fran, '/', $franYear, '/Longest_Play/special" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>';
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
                        '<td><span id="', $STPRow['Row'], 'ST-" class="STHistory" style="cursor: pointer" data-toggle="popover" title="Special Teams History">', $STPRow['Player'], '</span>&nbsp;&nbsp;<span id="', $STPRow['Row'], '/', $fran, '/', $franYear, '/Player/special" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $STPRow['Punt_AVG'], '&nbsp;&nbsp;<span id="', $STPRow['Row'], '/', $fran, '/', $franYear, '/Punt_AVG/special" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $STPRow['I20'], '&nbsp;&nbsp;<span id="', $STPRow['Row'], '/', $fran, '/', $franYear, '/I20/special" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>';
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
                        '<td><span id="', $STKRRow['Row'], 'ST-" class="STHistory" style="cursor: pointer" data-toggle="popover" title="Special Teams History">', $STKRRow['Player'], '</span>&nbsp;&nbsp;<span id="', $STKRRow['Row'], '/', $fran, '/', $franYear, '/Player/special" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $STKRRow['Ret_AVG'], '&nbsp;&nbsp;<span id="', $STKRRow['Row'], '/', $fran, '/', $franYear, '/Ret_AVG/special" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $STKRRow['Ret_TDs'], '&nbsp;&nbsp;<span id="', $STKRRow['Row'], '/', $fran, '/', $franYear, '/Ret_TDs/special" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $STKRRow['Longest_Play'], '&nbsp;&nbsp;<span id="', $STKRRow['Row'], '/', $fran, '/', $franYear, '/Longest_Play/special" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
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
                        '<td><span id="', $STPRRow['Row'], 'ST-" class="STHistory" style="cursor: pointer" data-toggle="popover" title="Special Teams History">', $STPRRow['Player'], '</span>&nbsp;&nbsp;<span id="', $STPRRow['Row'], '/', $fran, '/', $franYear, '/Player/special" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $STPRRow['Ret_AVG'], '&nbsp;&nbsp;<span id="', $STPRRow['Row'], '/', $fran, '/', $franYear, '/Ret_AVG/special" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $STPRRow['Ret_TDs'], '&nbsp;&nbsp;<span id="', $STPRRow['Row'], '/', $fran, '/', $franYear, '/Ret_TDs/special" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '<td>', $STPRRow['Longest_Play'], '&nbsp;&nbsp;<span id="', $STPRRow['Row'], '/', $fran, '/', $franYear, '/Longest_Play/special" class="glyphicon glyphicon-edit indvStatEdit" onclick="" aria-hidden="true" style="display: none"></td>',
                        '</tr>';
                    }
                    ?>
                    <tr>
                        <td colspan="7"><a class="btn btn-success indvStatAdd" data-toggle="modal" data-target="#addPassModal" style="display:none">Add Special Teams Stat Row</a></td>
                    </tr>
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
include ('../../_modals/addPassStat_Modal.php');
include ('../../_modals/addRushStat_Modal.php');
include ('../../_modals/addRecStat_Modal.php');
?>

<div class="row" style='text-align: center'>
    <a class="btn btn-default yearEdit indvStatsEditbtn" style="display: none">Edit Team Stats</a>
</div>