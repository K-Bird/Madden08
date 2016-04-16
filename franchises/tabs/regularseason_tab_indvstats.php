<br>
<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a href="#indv_Pass" role="tab" data-toggle="tab">Passing</a></li>
        <li role="presentation"><a href="#indv_Rush" role="tab" data-toggle="tab">Rushing</a></li>
        <li role="presentation"><a href="#indv_Rec" role="tab" data-toggle="tab">Receiving</a></li>
        <li role="presentation"><a href="#indv_Block" role="tab" data-toggle="tab">Blocking</a></li>
        <li role="presentation"><a href="#indv_Def" role="tab" data-toggle="tab">Defense</a></li>
        <li role="presentation"><a href="#indv_SP" role="tab" data-toggle="tab">Special Teams</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane" id="indv_Pass">
            <table class="table table-hover" id="passingStatsTable" style="text-align: center; font-size: small">
                <thead>
                    <tr>
                        <th data-sort="string">Player</th><th data-sort="float">Passer Rating</th><th data-sort="int">Passing Yards</th><th data-sort="int">Passing TDs</th><th data-sort="int">Interceptions</th><th data-sort="int">Completion %</th><th data-sort="int">Times Sacked</th><th></th>
                    </tr>
                </thead>
                <?php
                $passingResult = db_query("SELECT * FROM `franchise_year_indv_passing` Where Team='{$Curr_Team}' AND Year='{$View_Year}'");

                while ($PassingRow = $passingResult->fetch_assoc()) {
                    echo '<tr>',
                    '<td><span id="', $PassingRow['Row'], 'Pass" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Passing History">', $PassingRow['Name'], '</span>&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/Name/passing" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"></td>',
                    '<td>', $PassingRow['Rating'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/Rating/passing" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $PassingRow['Yards'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/Yards/passing" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $PassingRow['TDs'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/TDs/passing" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $PassingRow['INTs'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/INTs/passing" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $PassingRow['Comp'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/Comp/passing" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $PassingRow['Sacked'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/Sacked/passing" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td><a class="btn btn-danger franViewEdit" id="', $PassingRow['Row'], '/passing" onclick="removeIndvStat(this)">Remove Row</a></td>',
                    '</tr>';
                }
                ?>
            </table>
            <div style="text-align : center"><a class="btn btn-success franViewEdit" data-toggle="modal" data-target="#addPassModal" style="display:none">Add Passing Stat Row</a></div>
        </div>
        <div role="tabpanel" class="tab-pane" id="indv_Rush">
            <table class="table table-hover" id="rushingStatsTable" style="text-align: center; font-size: small">
                <thead>
                    <tr>
                        <th data-sort="string">Player</th><th data-sort="int">Rush Yards</th><th data-sort="int">Rush TDs</th><th data-sort="float">Yards Per Carry</th><th data-sort="int">Fumbles</th><th data-sort="int">Broken Tackles</th><th data-sort="int">Longest Run</th>
                    </tr>
                </thead>
                <?php
                $rushingResult = db_query("SELECT * FROM `franchise_year_indv_rushing` Where Year='{$View_Year}' AND Team='{$Curr_Team}'");

                while ($RushingRow = $rushingResult->fetch_assoc()) {
                    echo '<tr>',
                    '<td><span id="', $RushingRow['Row'], 'Rush" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Rushing History">', $RushingRow['Name'], '</span>&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/Name/rushing" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"></td>',
                    '<td>', $RushingRow['Yards'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/Yards/rushing" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $RushingRow['TDs'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/TDs/rushing" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $RushingRow['YPC'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/YPC/rushing" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $RushingRow['Fumble'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/Fumble/rushing" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $RushingRow['Broken'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/Broken/rushing" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $RushingRow['LongRun'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/LongRun/rushing" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td><a class="btn btn-danger franViewEdit" id="', $RushingRow['Row'], '/rushing" onclick="removeIndvStat(this)">Remove Row</a></td>',
                    '</tr>';
                }
                ?>
            </table>
            <div style="text-align : center"><a class="btn btn-success franViewEdit" data-toggle="modal" data-target="#addRushModal" style="display:none">Add Rushing Stat Row</a></div>
        </div>
        <div role="tabpanel" class="tab-pane" id="indv_Rec">
            <table class="table table-hover" id="recStatsTable" style="text-align: center; font-size: small">
                <thead>
                    <tr>
                        <th data-sort="string">Player</th><th data-sort="int">Receptions</th><th data-sort="int">Receiving Yards</th><th data-sort="int">Receiving TDs</th><th data-sort="float">Yards Per Catch</th><th data-sort="int">Longest Catch</th><th data-sort="int">Drops</th>
                    </tr>
                </thead>
                <?php
                $recResult = db_query("SELECT * FROM `franchise_year_indv_rec` Where Year='{$View_Year}' AND Team='{$Curr_Team}'");

                while ($RecRow = $recResult->fetch_assoc()) {
                    echo '<tr>',
                    '<td><span id="', $RecRow['Row'], 'Rec" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Receiving History">', $RecRow['Name'], '</span>&nbsp;&nbsp;<span id="', $RecRow['Row'], '/Player/rec" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"></td>',
                    '<td>', $RecRow['Rec'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/Rec/rec" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $RecRow['Yards'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/Yards/rec" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $RecRow['TDs'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/TDs/rec" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $RecRow['YPC'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/YPC/rec" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $RecRow['LongCatch'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/LongCatch/rec" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $RecRow['Drops'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/Drops/rec" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td><a class="btn btn-danger franViewEdit" id="', $RecRow['Row'], '/rec" onclick="removeIndvStat(this)">Remove Row</a></td>',
                    '</tr>';
                }
                ?>
            </table>
            <div style="text-align : center"><a class="btn btn-success franViewEdit" data-toggle="modal" data-target="#addRecModal" style="display:none">Add Receiving Stat Row</a></div>
        </div>
        <div role="tabpanel" class="tab-pane" id="indv_Block">
            <table class="table table-hover" id="blockingStatsTable" style="text-align: center; font-size: small">
                <thead>
                    <tr>
                        <th data-sort="string">Player</th><th data-sort="string">Position</th><th data-sort="int">Pancakes</th><th data-sort="int">Sacks Allowed</th>
                    </tr>
                </thead>
                <?php
                $blockingResult = db_query("SELECT * FROM `franchise_year_indv_block` Where Year='{$View_Year}' AND Team='{$Curr_Team}'");

                while ($BlockRow = $blockingResult->fetch_assoc()) {
                    echo '<tr>',
                    '<td><span id="', $BlockRow['Row'], 'Block" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Blocking History">', $BlockRow['Name'], '</span>&nbsp;&nbsp;<span id="', $BlockRow['Row'], '/Player/block" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"></td>',
                    '<td>', $BlockRow['Position'], '&nbsp;&nbsp;<span id="', $BlockRow['Row'], '/Position/block" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $BlockRow['Pancakes'], '&nbsp;&nbsp;<span id="', $BlockRow['Row'], '/Pancakes/block" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $BlockRow['Sacks'], '&nbsp;&nbsp;<span id="', $BlockRow['Row'], '/Sacks/block" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td><a class="btn btn-danger franViewEdit" id="', $BlockRow['Row'], '/block" onclick="removeIndvStat(this)">Remove Row</a></td>',
                    '</tr>';
                }
                ?>
            </table>
            <div style="text-align : center"><a class="btn btn-success franViewEdit" data-toggle="modal" data-target="#addBlockModal" style="display:none">Add Blocking Stat Row</a></div>
        </div>
        <div role="tabpanel" class="tab-pane" id="indv_Def">
            <table class="table table-hover" id="defStatsTable" style="text-align: center; font-size: small">
                <thead>
                    <tr>
                        <th data-sort="string">Player</th><th data-sort="int">Tackles</th><th data-sort="int">Tackles for Loss</th><th data-sort="int">Sacks</th><th data-sort="int">INTs</th><th data-sort="int">TDs</th><th data-sort="int">Saftey</th>
                    </tr>
                </thead>
                <?php
                $defResult = db_query("SELECT * FROM `franchise_year_indv_def` Where Year='{$View_Year}' AND Team='{$Curr_Team}'");

                while ($defRow = $defResult->fetch_assoc()) {
                    echo '<tr>',
                    '<td><span id="', $defRow['Row'], 'Def" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Defensive History">', $defRow['Name'], ' - ', $defRow['Position'], '</span>&nbsp;&nbsp;<span id="', $defRow['Row'], '/Player/def" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"></td>',
                    '<td>', $defRow['Tackles'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/Tackles/def" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $defRow['ForLoss'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/ForLoss/def" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $defRow['Sacks'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/Sacks/def" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $defRow['INTs'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/INTs/def" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $defRow['TDs'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/TDs/def" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $defRow['Safety'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/Safety/def" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td><a class="btn btn-danger franViewEdit" id="', $defRow['Row'], '/def" onclick="removeIndvStat(this)">Remove Row</a></td>',
                    '</tr>';
                }
                ?>
            </table>
            <div style="text-align : center"><a class="btn btn-success franViewEdit" data-toggle="modal" data-target="#addDefModal" style="display:none">Add Defensive Stat Row</a></div>
        </div>
        <div role="tabpanel" class="tab-pane" id="indv_SP">
            <table class="table table-hover" id="STKickingStatsTable" style="text-align: center; font-size: small">
                <tr>
                    <td colspan="5" style="text-align: left">Kicking</td>
                </tr>
                <tr>
                    <td>Player</td><td>Field Goals Attempted</td><td>Field Goals Made</td><td>Field Goal Percent</td><td>Longest Made</td>
                </tr>
                <?php
                $STKResult = db_query("SELECT * FROM `franchise_year_indv_st` Where Year='{$View_Year}' AND Team='{$Curr_Team}' AND Category='Kicking'");

                while ($STKRow = $STKResult->fetch_assoc()) {
                    echo '<tr>',
                    '<td><span id="', $STKRow['Row'], 'ST-" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Special Teams History">', $STKRow['Name'], '</span>&nbsp;&nbsp;<span id="', $STKRow['Row'], '/Player/st" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $STKRow['FGA'], '&nbsp;&nbsp;<span id="', $STKRow['Row'], '/FGA/st" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $STKRow['FGM'], '&nbsp;&nbsp;<span id="', $STKRow['Row'], '/FGM/st" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $STKRow['FG_Percent'], '&nbsp;&nbsp;<span id="', $STKRow['Row'], '/FG_Percent/st" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $STKRow['Longest_Play'], '&nbsp;&nbsp;<span id="', $STKRow['Row'], '/Longest_Play/st" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td><a class="btn btn-danger indvStatRemove removeStatRow"  id="', $STKRow['Row'], '/st" onclick="removeIndvStat(this)">Remove Row</a></td>',
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
                $STPResult = db_query("SELECT * FROM `franchise_year_indv_st` Where Year='{$View_Year}' AND Team='{$Curr_Team}' AND Category='Punting'");

                while ($STPRow = $STPResult->fetch_assoc()) {
                    echo '<tr>',
                    '<td><span id="', $STPRow['Row'], 'ST-" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Special Teams History">', $STPRow['Name'], '</span>&nbsp;&nbsp;<span id="', $STPRow['Row'], '/Player/st" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $STPRow['Punt_AVG'], '&nbsp;&nbsp;<span id="', $STPRow['Row'], '/Punt_AVG/st" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $STPRow['I20'], '&nbsp;&nbsp;<span id="', $STPRow['Row'], '/I20/st" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td><a class="btn btn-danger indvStatRemove removeStatRow"  id="', $STPRow['Row'], '/st" onclick="removeIndvStat(this)">Remove Row</a></td>',
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
                $STKRResult = db_query("SELECT * FROM `franchise_year_indv_st` Where Year='{$View_Year}' AND Team='{$Curr_Team}' AND Category='KR'");

                while ($STKRRow = $STKRResult->fetch_assoc()) {
                    echo '<tr>',
                    '<td><span id="', $STKRRow['Row'], 'ST-" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Special Teams History">', $STKRRow['Name'], '</span>&nbsp;&nbsp;<span id="', $STKRRow['Row'], '/Player/st" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $STKRRow['Ret_AVG'], '&nbsp;&nbsp;<span id="', $STKRRow['Row'], '/Ret_AVG/st" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $STKRRow['Ret_TDs'], '&nbsp;&nbsp;<span id="', $STKRRow['Row'], '/Ret_TDs/st" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $STKRRow['Longest_Play'], '&nbsp;&nbsp;<span id="', $STKRRow['Row'], '/Longest_Play/st" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td><a class="btn btn-danger indvStatRemove removeStatRow"  id="', $STKRRow['Row'], '/st" onclick="removeIndvStat(this)">Remove Row</a></td>',
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
                $STPRResult = db_query("SELECT * FROM `franchise_year_indv_st` Where Year='{$View_Year}' AND Team='{$Curr_Team}' AND Category='PR'");

                while ($STPRRow = $STPRResult->fetch_assoc()) {
                    echo '<tr>',
                    '<td><span id="', $STPRRow['Row'], 'ST-" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Special Teams History">', $STPRRow['Name'], '</span>&nbsp;&nbsp;<span id="', $STPRRow['Row'], '/Player/st" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $STPRRow['Ret_AVG'], '&nbsp;&nbsp;<span id="', $STPRRow['Row'], '/Ret_AVG/st" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $STPRRow['Ret_TDs'], '&nbsp;&nbsp;<span id="', $STPRRow['Row'], '/Ret_TDs/st" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td>', $STPRRow['Longest_Play'], '&nbsp;&nbsp;<span id="', $STPRRow['Row'], '/Longest_Play/st" class="glyphicon glyphicon-edit franViewEdit" onclick="updateIndvStat(this)"  ></td>',
                    '<td><a class="btn btn-danger franViewEdit"  id="', $STPRRow['Row'], '/st" onclick="removeIndvStat(this)">Remove Row</a></td>',
                    '</tr>';
                }
                ?>
            </table>
            <div style="text-align : center"><a class="btn btn-success franViewEdit" data-toggle="modal" data-target="#addSTModal" style="display:none">Add Special Teams Stat Row</a></div>
        </div>
    </div>

</div>

