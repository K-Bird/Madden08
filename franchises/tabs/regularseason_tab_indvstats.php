<br>
<div>

    <?php
    $passCount = db_query("SELECT * FROM `franchise_year_indv_passing` Where Team='{$Curr_Team}' AND Year='{$View_Year}' ORDER By `Year`");
    $pass = $passCount->num_rows;

    $rushCount = db_query("SELECT * FROM `franchise_year_indv_rushing` Where Team='{$Curr_Team}' AND Year='{$View_Year}' ORDER By `Year`");
    $rush = $rushCount->num_rows;

    $recCount = db_query("SELECT * FROM `franchise_year_indv_rec` Where Team='{$Curr_Team}' AND Year='{$View_Year}' ORDER By `Year`");
    $rec = $recCount->num_rows;

    $blockCount = db_query("SELECT * FROM `franchise_year_indv_block` Where Team='{$Curr_Team}' AND Year='{$View_Year}' ORDER By `Year`");
    $block = $blockCount->num_rows;

    $defCount = db_query("SELECT * FROM `franchise_year_indv_def` Where Team='{$Curr_Team}' AND Year='{$View_Year}' ORDER By `Year`");
    $def = $defCount->num_rows;

    $stCount = db_query("SELECT * FROM `franchise_year_indv_st` Where Team='{$Curr_Team}' AND Year='{$View_Year}' ORDER By `Year`");
    $st = $stCount->num_rows;
    ?>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><a href="#indv_Pass" class="nav-link" role="tab" data-toggle="tab">Passing <?php echo '<span class="badge badge-dark">' . $pass . '</span>' ?></a></li>
        <li class="nav-item"><a href="#indv_Rush" class="nav-link" role="tab" data-toggle="tab">Rushing <?php echo '<span class="badge badge-dark">' . $rush . '</span>' ?></a></li>
        <li class="nav-item"><a href="#indv_Rec" class="nav-link" role="tab" data-toggle="tab">Receiving <?php echo '<span class="badge badge-dark">' . $rec . '</span>' ?></a></li>
        <li class="nav-item"><a href="#indv_Block" class="nav-link" role="tab" data-toggle="tab">Blocking <?php echo '<span class="badge badge-dark">' . $block . '</span>' ?></a></li>
        <li class="nav-item"><a href="#indv_Def" class="nav-link" role="tab" data-toggle="tab">Defense <?php echo '<span class="badge badge-dark">' . $def . '</span>' ?></a></li>
        <li class="nav-item"><a href="#indv_SP" class="nav-link" role="tab" data-toggle="tab">Special Teams <?php echo '<span class="badge badge-dark">' . $st . '</span>' ?></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane" id="indv_Pass">
            <table class="table sortTable" id="passingStatsTable" style="text-align: center; font-size: small">
                <thead>
                    <tr>
                        <th>Player</th><th>Passer Rating</th><th>Passing Yards</th><th>Passing TDs</th><th>Interceptions</th><th>Completion %</th><th>Times Sacked</th><th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $passingResult = db_query("SELECT * FROM `franchise_year_indv_passing` Where Team='{$Curr_Team}' AND Year='{$View_Year}' ORDER By `Year`");

                    while ($PassingRow = $passingResult->fetch_assoc()) {
                        echo '<tr>',
                        '<td><span id="', $PassingRow['Row'], 'Pass" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Passing History">', $PassingRow['Name'], '</span>&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/Name/passing" class="oi oi-pencil updateIndvStat franViewEdit" onclick="updateIndvStat(this)"></td>',
                        '<td>', $PassingRow['Rating'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/Rating/passing" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $PassingRow['Yards'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/Yards/passing" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $PassingRow['TDs'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/TDs/passing" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $PassingRow['INTs'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/INTs/passing" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $PassingRow['Comp'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/Comp/passing" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $PassingRow['Sacked'], '&nbsp;&nbsp;<span id="', $PassingRow['Row'], '/Sacked/passing" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td><a class="btn btn-outline-danger removeIndvStat franViewEdit" id="', $PassingRow['Row'], '/passing">Remove Row</a></td>',
                        '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <div style="text-align : center"><a class="btn btn-outline-success franViewEdit" data-toggle="modal" data-target="#addPassModal" style="display:none">Add Passing Stat Row</a></div>
        </div>
        <div role="tabpanel" class="tab-pane" id="indv_Rush">
            <table class="table table-hover sortTable" id="rushingStatsTable" style="text-align: center; font-size: small">
                <thead>
                    <tr>
                        <th>Player</th><th>Rush Yards</th><th>Rush TDs</th><th>Yards Per Carry</th><th>Fumbles</th><th>Broken Tackles</th><th>Longest Run</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rushingResult = db_query("SELECT * FROM `franchise_year_indv_rushing` Where Year='{$View_Year}' AND Team='{$Curr_Team}'");

                    while ($RushingRow = $rushingResult->fetch_assoc()) {
                        echo '<tr>',
                        '<td><span id="', $RushingRow['Row'], 'Rush" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Rushing History">', $RushingRow['Name'], '</span>&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/Name/rushing" class="oi oi-pencil updateIndvStat franViewEdit" onclick="updateIndvStat(this)"></td>',
                        '<td>', $RushingRow['Yards'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/Yards/rushing" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $RushingRow['TDs'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/TDs/rushing" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $RushingRow['YPC'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/YPC/rushing" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $RushingRow['Fumble'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/Fumble/rushing" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $RushingRow['Broken'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/Broken/rushing" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $RushingRow['LongRun'], '&nbsp;&nbsp;<span id="', $RushingRow['Row'], '/LongRun/rushing" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td><a class="btn btn-outline-danger removeIndvStat franViewEdit" id="', $RushingRow['Row'], '/rushing">Remove Row</a></td>',
                        '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <div style="text-align : center"><a class="btn btn-outline-success franViewEdit" data-toggle="modal" data-target="#addRushModal" style="display:none">Add Rushing Stat Row</a></div>
        </div>
        <div role="tabpanel" class="tab-pane" id="indv_Rec">
            <table class="table table-hover sortTable" id="recStatsTable" style="text-align: center; font-size: small">
                <thead>
                    <tr>
                        <th>Player</th><th>Receptions</th><th>Receiving Yards</th><th>Receiving TDs</th><th>Yards Per Catch</th><th>Longest Catch</th><th>Drops</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $recResult = db_query("SELECT * FROM `franchise_year_indv_rec` Where Year='{$View_Year}' AND Team='{$Curr_Team}'");

                    while ($RecRow = $recResult->fetch_assoc()) {
                        echo '<tr>',
                        '<td><span id="', $RecRow['Row'], 'Rec" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Receiving History">', $RecRow['Name'], '</span>&nbsp;&nbsp;<span id="', $RecRow['Row'], '/Player/rec" class="oi oi-pencil updateIndvStat franViewEdit" onclick="updateIndvStat(this)"></td>',
                        '<td>', $RecRow['Rec'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/Rec/rec" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $RecRow['Yards'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/Yards/rec" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $RecRow['TDs'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/TDs/rec" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $RecRow['YPC'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/YPC/rec" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $RecRow['LongCatch'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/LongCatch/rec" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $RecRow['Drops'], '&nbsp;&nbsp;<span id="', $RecRow['Row'], '/Drops/rec" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td><a class="btn btn-outline-danger removeIndvStat franViewEdit" id="', $RecRow['Row'], '/rec">Remove Row</a></td>',
                        '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <div style="text-align : center"><a class="btn btn-outline-success franViewEdit" data-toggle="modal" data-target="#addRecModal" style="display:none">Add Receiving Stat Row</a></div>
        </div>
        <div role="tabpanel" class="tab-pane" id="indv_Block">
            <table class="table table-hover sortTable" id="blockingStatsTable" style="text-align: center; font-size: small">
                <thead>
                    <tr>
                        <th>Player</th><th>Position</th><th>Pancakes</th><th>Sacks Allowed</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $blockingResult = db_query("SELECT * FROM `franchise_year_indv_block` Where Year='{$View_Year}' AND Team='{$Curr_Team}'");

                    while ($BlockRow = $blockingResult->fetch_assoc()) {
                        echo '<tr>',
                        '<td><span id="', $BlockRow['Row'], 'Block" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Blocking History">', $BlockRow['Name'], '</span>&nbsp;&nbsp;<span id="', $BlockRow['Row'], '/Player/block" class="oi oi-pencil updateIndvStat franViewEdit" onclick="updateIndvStat(this)"></td>',
                        '<td>', $BlockRow['Position'], '&nbsp;&nbsp;<span id="', $BlockRow['Row'], '/Position/block" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $BlockRow['Pancakes'], '&nbsp;&nbsp;<span id="', $BlockRow['Row'], '/Pancakes/block" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $BlockRow['Sacks'], '&nbsp;&nbsp;<span id="', $BlockRow['Row'], '/Sacks/block" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td><a class="btn btn-outline-danger removeIndvStat franViewEdit" id="', $BlockRow['Row'], '/block">Remove Row</a></td>',
                        '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <div style="text-align : center"><a class="btn btn-outline-success franViewEdit" data-toggle="modal" data-target="#addBlockModal" style="display:none">Add Blocking Stat Row</a></div>
        </div>
        <div role="tabpanel" class="tab-pane" id="indv_Def">
            <table class="table table-hover sortTable" id="defStatsTable" style="text-align: center; font-size: small">
                <thead>
                    <tr>
                        <th>Player</th><th>Tackles</th><th>Tackles for Loss</th><th>Sacks</th><th>INTs</th><th>TDs</th><th>Saftey</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $defResult = db_query("SELECT * FROM `franchise_year_indv_def` Where Year='{$View_Year}' AND Team='{$Curr_Team}'");

                    while ($defRow = $defResult->fetch_assoc()) {
                        echo '<tr>',
                        '<td><span id="', $defRow['Row'], 'Def" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Defensive History">', $defRow['Name'], ' - ', $defRow['Position'], '</span>&nbsp;&nbsp;<span id="', $defRow['Row'], '/Player/def" class="oi oi-pencil updateIndvStat franViewEdit" onclick="updateIndvStat(this)"></td>',
                        '<td>', $defRow['Tackles'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/Tackles/def" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $defRow['ForLoss'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/ForLoss/def" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $defRow['Sacks'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/Sacks/def" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $defRow['INTs'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/INTs/def" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $defRow['TDs'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/TDs/def" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td>', $defRow['Safety'], '&nbsp;&nbsp;<span id="', $defRow['Row'], '/Safety/def" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                        '<td><a class="btn btn-outline-danger removeIndvStat franViewEdit" id="', $defRow['Row'], '/def">Remove Row</a></td>',
                        '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <div style="text-align : center"><a class="btn btn-outline-success franViewEdit" data-toggle="modal" data-target="#addDefModal" style="display:none">Add Defensive Stat Row</a></div>
        </div>
        <div role="tabpanel" class="tab-pane" id="indv_SP">
            <table class="table table-hover sortTable" id="STKickingStatsTable" style="text-align: center; font-size: small">
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
                    '<td><span id="', $STKRow['Row'], 'ST-" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Special Teams History">', $STKRow['Name'], '</span>&nbsp;&nbsp;<span id="', $STKRow['Row'], '/Player/st" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                    '<td>', $STKRow['FGA'], '&nbsp;&nbsp;<span id="', $STKRow['Row'], '/FGA/st" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                    '<td>', $STKRow['FGM'], '&nbsp;&nbsp;<span id="', $STKRow['Row'], '/FGM/st" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                    '<td>', $STKRow['FG_Percent'], '&nbsp;&nbsp;<span id="', $STKRow['Row'], '/FG_Percent/st" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                    '<td>', $STKRow['Longest_Play'], '&nbsp;&nbsp;<span id="', $STKRow['Row'], '/Longest_Play/st" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                    '<td><a class="btn btn-outline-danger removeIndvStat franViewEdit"  id="', $STKRow['Row'], '/st">Remove Row</a></td>',
                    '</tr>';
                }
                ?>
            </table>
            <table class="table table-hover sortTable" id="STPuntStatsTable" style="text-align: center; font-size: small">
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
                    '<td><span id="', $STPRow['Row'], 'ST-" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Special Teams History">', $STPRow['Name'], '</span>&nbsp;&nbsp;<span id="', $STPRow['Row'], '/Player/st" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                    '<td>', $STPRow['Punt_AVG'], '&nbsp;&nbsp;<span id="', $STPRow['Row'], '/Punt_AVG/st" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                    '<td>', $STPRow['I20'], '&nbsp;&nbsp;<span id="', $STPRow['Row'], '/I20/st" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                    '<td><a class="btn btn-outline-danger removeIndvStat franViewEdit"  id="', $STPRow['Row'], '/st">Remove Row</a></td>',
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
                    '<td><span id="', $STKRRow['Row'], 'ST-" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Special Teams History">', $STKRRow['Name'], '</span>&nbsp;&nbsp;<span id="', $STKRRow['Row'], '/Player/st" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                    '<td>', $STKRRow['Ret_AVG'], '&nbsp;&nbsp;<span id="', $STKRRow['Row'], '/Ret_AVG/st" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                    '<td>', $STKRRow['Ret_TDs'], '&nbsp;&nbsp;<span id="', $STKRRow['Row'], '/Ret_TDs/st" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                    '<td>', $STKRRow['Longest_Play'], '&nbsp;&nbsp;<span id="', $STKRRow['Row'], '/Longest_Play/st" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                    '<td><a class="btn btn-outline-danger removeIndvStat franViewEdit"  id="', $STKRRow['Row'], '/st">Remove Row</a></td>',
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
                    '<td><span id="', $STPRRow['Row'], 'ST-" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Special Teams History">', $STPRRow['Name'], '</span>&nbsp;&nbsp;<span id="', $STPRRow['Row'], '/Player/st" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                    '<td>', $STPRRow['Ret_AVG'], '&nbsp;&nbsp;<span id="', $STPRRow['Row'], '/Ret_AVG/st" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                    '<td>', $STPRRow['Ret_TDs'], '&nbsp;&nbsp;<span id="', $STPRRow['Row'], '/Ret_TDs/st" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                    '<td>', $STPRRow['Longest_Play'], '&nbsp;&nbsp;<span id="', $STPRRow['Row'], '/Longest_Play/st" class="oi oi-pencil updateIndvStat franViewEdit"></td>',
                    '<td><a class="btn btn-outline-danger removeIndvStat franViewEdit"  id="', $STPRRow['Row'], '/st">Remove Row</a></td>',
                    '</tr>';
                }
                ?>
            </table>
            <div style="text-align : center"><a class="btn btn-outline-success franViewEdit" data-toggle="modal" data-target="#addSTModal" style="display:none">Add Special Teams Stat Row</a></div>
        </div>
    </div>

</div>

