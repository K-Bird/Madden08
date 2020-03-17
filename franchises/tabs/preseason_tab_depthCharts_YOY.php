<br>
<table class="tab table-sm">
    <thead>
        <tr>
            <th></th>
            <?php
            $getMaxFranYear = db_query("SELECT Max(Year) as Max FROM `franchise_year_roster` WHERE Team='{$Curr_Team}'");
            $fetchMaxYear = $getMaxFranYear->fetch_assoc();
            $maxYear = $fetchMaxYear['Max'];
            $i = 1;

            while ($i <= $maxYear) {
                echo '<th colspan="2" style="text-align: center"> Year ' . $i . '</th>';
                $i++;
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <tr><th>QB1</th><?php echo positionYOY('QB1', $Curr_Team); ?></tr>
        <tr><th>QB2</th><?php echo positionYOY('QB2', $Curr_Team); ?></tr>
        <tr><th>HB1</th><?php echo positionYOY('HB1', $Curr_Team); ?></tr>
        <tr><th>HB2</th><?php echo positionYOY('HB2', $Curr_Team); ?></tr>
        <tr><th>HB3</th><?php echo positionYOY('HB3', $Curr_Team); ?></tr>
        <tr><th>FB1</th><?php echo positionYOY('FB1', $Curr_Team); ?></tr>
        <tr><th>WR1</th><?php echo positionYOY('WR1', $Curr_Team); ?></tr>
        <tr><th>WR2</th><?php echo positionYOY('WR2', $Curr_Team); ?></tr>
        <tr><th>WR3</th><?php echo positionYOY('WR3', $Curr_Team); ?></tr>
        <tr><th>WR4</th><?php echo positionYOY('WR4', $Curr_Team); ?></tr>
        <tr><th>TE1</th><?php echo positionYOY('TE1', $Curr_Team); ?></tr>
        <tr><th>TE2</th><?php echo positionYOY('TE2', $Curr_Team); ?></tr>
        <tr><th>LT1</th><?php echo positionYOY('LT1', $Curr_Team); ?></tr>
        <tr><th>LT2</th><?php echo positionYOY('LT2', $Curr_Team); ?></tr>
        <tr><th>LG1</th><?php echo positionYOY('LG1', $Curr_Team); ?></tr>
        <tr><th>LG2</th><?php echo positionYOY('LG2', $Curr_Team); ?></tr>
        <tr><th>C1</th><?php echo positionYOY('C1', $Curr_Team); ?></tr>
        <tr><th>C2</th><?php echo positionYOY('C2', $Curr_Team); ?></tr>
        <tr><th>RG1</th><?php echo positionYOY('RG1', $Curr_Team); ?></tr>
        <tr><th>RG2</th><?php echo positionYOY('RG2', $Curr_Team); ?></tr>
        <tr><th>RT1</th><?php echo positionYOY('RT1', $Curr_Team); ?></tr>
        <tr><th>RT2</th><?php echo positionYOY('RT2', $Curr_Team); ?></tr>
        <tr><th>LE1</th><?php echo positionYOY('LE1', $Curr_Team); ?></tr>
        <tr><th>LE2</th><?php echo positionYOY('LE2', $Curr_Team); ?></tr>
        <tr><th>DT1</th><?php echo positionYOY('DT1', $Curr_Team); ?></tr>
        <tr><th>DT2</th><?php echo positionYOY('DT2', $Curr_Team); ?></tr>
        <tr><th>RE1</th><?php echo positionYOY('RE1', $Curr_Team); ?></tr>
        <tr><th>RE2</th><?php echo positionYOY('RE2', $Curr_Team); ?></tr>
        <tr><th>LOLB1</th><?php echo positionYOY('LOLB1', $Curr_Team); ?></tr>
        <tr><th>LOLB2</th><?php echo positionYOY('LOLB2', $Curr_Team); ?></tr>
        <tr><th>MLB1</th><?php echo positionYOY('MLB1', $Curr_Team); ?></tr>
        <tr><th>MLB2</th><?php echo positionYOY('MLB2', $Curr_Team); ?></tr>
        <tr><th>ROLB1</th><?php echo positionYOY('ROLB1', $Curr_Team); ?></tr>
        <tr><th>ROLB2</th><?php echo positionYOY('ROLB2', $Curr_Team); ?></tr>
        <tr><th>CB1</th><?php echo positionYOY('CB1', $Curr_Team); ?></tr>
        <tr><th>CB2</th><?php echo positionYOY('CB2', $Curr_Team); ?></tr>
        <tr><th>CB3</th><?php echo positionYOY('CB3', $Curr_Team); ?></tr>
        <tr><th>CB4</th><?php echo positionYOY('CB4', $Curr_Team); ?></tr>
        <tr><th>FS1</th><?php echo positionYOY('FS1', $Curr_Team); ?></tr>
        <tr><th>FS2</th><?php echo positionYOY('FS2', $Curr_Team); ?></tr>
        <tr><th>SS1</th><?php echo positionYOY('SS1', $Curr_Team); ?></tr>
        <tr><th>SS2</th><?php echo positionYOY('SS2', $Curr_Team); ?></tr>
        <tr><th>K1</th><?php echo positionYOY('K1', $Curr_Team); ?></tr>
        <tr><th>P1</th><?php echo positionYOY('P1', $Curr_Team); ?></tr>        
    </tbody>
</table>

<?php

function positionYOY($position, $fran) {

    $getYOY = db_query("SELECT * FROM `franchise_year_roster` WHERE Position='{$position}' AND Team='{$fran}' ORDER BY Year ASC");
    while ($fetchYOY = $getYOY->fetch_assoc()) {

        if ($fetchYOY['Year'] > 1) {
            echo '<td>' . prevOvrDiff($fran, $fetchYOY['Position'], $fetchYOY['Year'], $fetchYOY['Overall']) . '</td>';
        } else {
            echo '<td></td>';
        }
        echo '<td>' . tradeTeamIcon($fetchYOY['Acquired'], $fetchYOY['Master_Roster_ID']) . returnAcquiredIcon($fetchYOY['Acquired']) . ' <span class="badge badge-dark">' . $fetchYOY['Name'] . positionChanged($fetchYOY['Row_ID'], $fetchYOY['Master_Roster_ID'], $fetchYOY['Year']) . '</span>&nbsp;<span class="badge badge-dark">' . $fetchYOY['Overall'] . '</span>&nbsp;' . onTeamNextYear($fetchYOY['Team'], $fetchYOY['Year'], $fetchYOY['Historical_ID']) . '</td>';
    }
}

function prevOvrDiff($fran, $Position, $currentYear, $currentOVR) {
    $prevYear = $currentYear - 1;
    $getPrevOvr = db_query("SELECT * FROM `franchise_year_roster` WHERE Position='{$Position}' AND Year='{$prevYear}' AND Team='{$fran}'");
    $fetchPrevOvr = $getPrevOvr->fetch_assoc();
    $prevOvr = $fetchPrevOvr['Overall'];

    $ovrChange = $currentOVR - $prevOvr;
    if ($ovrChange > 0) {
        return '<span style="color: green" class="franViewDisplay"> (+' . $ovrChange . ')</span>';
    } elseif ($ovrChange === 0) {
        return '<span style="color: gold" class="franViewDisplay"> (' . $ovrChange . ')</span>';
    } else {
        return '<span style="color: red" class="franViewDisplay"> (' . $ovrChange . ')</span>';
    }
}

function returnAcquiredIcon($type) {

    if ($type === 'On Team') {
        return '<span class="oi oi-circle-check"></span>';
    }
    if ($type === 'Trade') {
        return '<span class="oi oi-transfer"></span>';
    }
    if ($type === 'Free Agent') {
        return '<span class="oi oi-plus"></span>';
    }
    if ($type === 'Drafted') {
        return '<span class="oi oi-target"></span>';
    }
    if ($type === 'Created') {
        return '<span class="oi oi-brush"></span>';
    }
}

function onTeamNextYear($fran, $currentYear, $Master_ID) {

    $nextYear = $currentYear + 1;

    $maxYear = returnCurrenFranYear($fran);

    if ($nextYear > $maxYear) {
        
    } else {

        $checkPlayerNextYear = db_query("SELECT * FROM `franchise_year_roster` WHERE Historical_ID='{$Master_ID}' AND Year='{$nextYear}'");
        if (mysqli_num_rows($checkPlayerNextYear) > 0) {
            return '<span class="oi oi-arrow-circle-right"></span>';
        } else {
            return '<span class="oi oi-x"></span>';
        }
    }
}

function tradeTeamIcon($Acquired, $masterRowID) {

    if ($Acquired === 'Trade') {
        $orginalTeam = returnMasterRosterTeam($masterRowID);
        if ($orginalTeam === 'None') {
            return '';
        } else {
            return '<img src="../libs/images/franchises/' . $orginalTeam . '_Logo.png" height=20 width=35>&nbsp;';
        }
    } else {
        
    }
}

function positionChanged($rosterRow, $masterRow, $year) {

    $getMasterRosterPos = db_query("SELECT * FROM `master_rosters` WHERE Row_ID='{$masterRow}'");
    $fetchMasterRosterPos = $getMasterRosterPos->fetch_assoc();
    $masterPos = $fetchMasterRosterPos['position'];

    $getRosterPos = db_query("SELECT * FROM `franchise_year_roster` WHERE Row_ID='{$rosterRow}'");
    $fetchRosterPos = $getRosterPos->fetch_assoc();
    $rosterPos = substr($fetchRosterPos['Position'], 0, -1);
    $Historical_ID = $fetchRosterPos['Historical_ID'];

    $curr_year = $fetchRosterPos['Year'];

    if ($curr_year === '1') {

        if ($rosterPos != $masterPos) {
            return " (" . $masterPos . '<span class="oi oi-arrow-right"></span>' . $rosterPos . ")";
        } else {
            
        }
    } else {
        //for years greater than 1, look at pevious year's roster position and see if it's changed
        $prevYear = $curr_year - 1;
        $getRosterPrevPos = db_query("SELECT * FROM `franchise_year_roster` WHERE Historical_ID='{$Historical_ID}' AND Year='{$prevYear}'");

        if (mysqli_num_rows($getRosterPrevPos) < 1) {
            
        } else {

            $fetchRosterPrevPos = $getRosterPrevPos->fetch_assoc();
            $prevPos = substr($fetchRosterPrevPos['Position'], 0, -1);

            if ($prevPos != $rosterPos) {
                return " (" . $prevPos . '<span class="oi oi-arrow-right"></span>' . $rosterPos . ")";
            } else {
                
            }
        }
    }
}
