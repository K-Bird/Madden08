<br>
<?php
if (in_array($pos, array('QB1', 'QB2'))) {

    echo '<div class="row">';
    echo '<div class="col-lg-6">';

    $getPassStats = db_query("SELECT * FROM `franchise_year_indv_passing` WHERE Historical_ID='{$position_Historical_ID}' ORDER BY Year ASC");

    if (mysqli_num_rows($getPassStats) === 0) {
        echo '<span class="badge badge-dark">No Passing Stats</span>';
    } else {
        echo '<table class="table table-sm">';
        echo '<tr><th colspan="7">Passing</th></tr>';
        echo '<tr><th>Year</th><th>Yards</th><th>TDs</th><th>YPC</th><th>Fumbles</th><th>Broken Tackles</th><th>Longest Run</th></tr>';

        while ($fetchPassStats = $getPassStats->fetch_assoc()) {

            echo '<tr>';
            echo '<td>' . $fetchPassStats['Year'] . '</td>';
            echo '<td>' . $fetchPassStats['Rating'] . '</td>';
            echo '<td>' . $fetchPassStats['Yards'] . '</td>';
            echo '<td>' . $fetchPassStats['TDs'] . '</td>';
            echo '<td>' . $fetchPassStats['INTs'] . '</td>';
            echo '<td>' . $fetchPassStats['Comp'] . '</td>';
            echo '<td>' . $fetchPassStats['Sacked'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
    echo '</div>';

    echo '<div class="col-lg-6">';

    $getRushStats = db_query("SELECT * FROM `franchise_year_indv_rushing` WHERE Historical_ID='{$position_Historical_ID}' ORDER BY Year ASC");

    if (mysqli_num_rows($getRushStats) === 0) {
        echo '</div>';
    } else {

        echo '<table class="table table-sm">';
        echo '<tr><th colspan="7">Rushing</th></tr>';
        echo '<tr><th>Year</th><th>Rating</th><th>Yards</th><th>TDs</th><th>INTs</th><th>Comp</th><th>Sacked</th></tr>';

        while ($fetchRushStats = $getRushStats->fetch_assoc()) {

            echo '<tr>';
            echo '<td>' . $fetchRushStats['Year'] . '</td>';
            echo '<td>' . $fetchRushStats['Yards'] . '</td>';
            echo '<td>' . $fetchRushStats['TDs'] . '</td>';
            echo '<td>' . $fetchRushStats['YPC'] . '</td>';
            echo '<td>' . $fetchRushStats['Fumble'] . '</td>';
            echo '<td>' . $fetchRushStats['Broken'] . '</td>';
            echo '<td>' . $fetchRushStats['LongRun'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        echo '</div>';
    }
    echo '</div>';
}



if (in_array($pos, array('HB1', 'HB2', 'HB3', 'FB1', 'FB2'))) {

    echo '<div class="row">';
    echo '<div class="col-lg-6">';

    $getRushStats = db_query("SELECT * FROM `franchise_year_indv_rushing` WHERE Historical_ID='{$position_Historical_ID}' ORDER BY Year ASC");

    if (mysqli_num_rows($getRushStats) === 0) {
        echo '<span class="badge badge-dark">No Rushing Stats</span>';
    } else {

        echo '<table class="table table-sm">';
        echo '<tr><th colspan="7">Rushing</th></tr>';
        echo '<tr><th>Year</th><th>Yards</th><th>TDs</th><th>YPC</th><th>Fumble</th><th>Broken Tackles</th><th>Longest Run</th></tr>';

        while ($fetchRushStats = $getRushStats->fetch_assoc()) {

            echo '<tr>';
            echo '<td>' . $fetchRushStats['Year'] . '</td>';
            echo '<td>' . $fetchRushStats['Yards'] . '</td>';
            echo '<td>' . $fetchRushStats['TDs'] . '</td>';
            echo '<td>' . $fetchRushStats['YPC'] . '</td>';
            echo '<td>' . $fetchRushStats['Fumble'] . '</td>';
            echo '<td>' . $fetchRushStats['Broken'] . '</td>';
            echo '<td>' . $fetchRushStats['LongRun'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
    echo '</div>';
    echo '<div class="col-lg-6">';

    $getRecStats = db_query("SELECT * FROM `franchise_year_indv_rec` WHERE Historical_ID='{$position_Historical_ID}' ORDER BY Year ASC");

    if (mysqli_num_rows($getRecStats) === 0) {
        echo '</div>';
    } else {

        echo '<table class="table table-sm">';
        echo '<tr><th colspan="7">Receving</th></tr>';
        echo '<tr><th>Year</th><th>Rec</th><th>Yards</th><th>TDs</th><th>YPC</th><th>Drops</th><th>Longest Catch</th></tr>';

        while ($fetchRecStats = $getRecStats->fetch_assoc()) {

            echo '<tr>';
            echo '<td>' . $fetchRecStats['Year'] . '</td>';
            echo '<td>' . $fetchRecStats['Rec'] . '</td>';
            echo '<td>' . $fetchRecStats['Yards'] . '</td>';
            echo '<td>' . $fetchRecStats['TDs'] . '</td>';
            echo '<td>' . $fetchRecStats['YPC'] . '</td>';
            echo '<td>' . $fetchRecStats['Drops'] . '</td>';
            echo '<td>' . $fetchRecStats['LongCatch'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        echo '</div>';
    }
    echo '</div>';
}
if (in_array($pos, array('WR1', 'WR2', 'WR3', 'WR4', 'TE1', 'TE2'))) {

    echo '<div class="row">';
    echo '<div class="col-lg-6">';

    $getRecStats = db_query("SELECT * FROM `franchise_year_indv_rec` WHERE Historical_ID='{$position_Historical_ID}' ORDER BY Year ASC");

    if (mysqli_num_rows($getRecStats) === 0) {
        echo '<span class="badge badge-dark">No Receiving Stats</span>';
    } else {

        echo '<table class="table table-sm">';
        echo '<tr><th colspan="7">Receving</th></tr>';
        echo '<tr><th>Year</th><th>Rec</th><th>Yards</th><th>TDs</th><th>YPC</th><th>Drops</th><th>Longest Catch</th></tr>';

        while ($fetchRecStats = $getRecStats->fetch_assoc()) {

            echo '<tr>';
            echo '<td>' . $fetchRecStats['Year'] . '</td>';
            echo '<td>' . $fetchRecStats['Rec'] . '</td>';
            echo '<td>' . $fetchRecStats['Yards'] . '</td>';
            echo '<td>' . $fetchRecStats['TDs'] . '</td>';
            echo '<td>' . $fetchRecStats['YPC'] . '</td>';
            echo '<td>' . $fetchRecStats['Drops'] . '</td>';
            echo '<td>' . $fetchRecStats['LongCatch'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    echo '</div>';
    echo '</div>';
}
if (in_array($pos, array("LT1", "LT2", "RT1", "RT2", "LG1", "LG2", "C1", "C2", "RG1", "RG2"))) {
    echo '<div class="row">';
    echo '<div class="col-lg-6">';

    $getBlockStats = db_query("SELECT * FROM `franchise_year_indv_block` WHERE Historical_ID='{$position_Historical_ID}' ORDER BY Year ASC");

    if (mysqli_num_rows($getBlockStats) === 0) {
        echo '<span class="badge badge-dark">No Blocking Stats</span>';
    } else {

        echo '<table class="table table-sm">';
        echo '<tr><th colspan="7">Blocking</th></tr>';
        echo '<tr><th>Year</th><th>Pancakes</th><th>Sacks</th></tr>';

        while ($fetchBlockStats = $getBlockStats->fetch_assoc()) {

            echo '<tr>';
            echo '<td>' . $fetchBlockStats['Year'] . '</td>';
            echo '<td>' . $fetchBlockStats['Pancakes'] . '</td>';
            echo '<td>' . $fetchBlockStats['Sacks'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    echo '</div>';
    echo '</div>';
}
if (in_array($pos, array("LE1", "RE1", "LE2", "RE2", "DT1", "DT2", "LOLB1", "ROLB1", "LOLB2", "ROLB2", "MLB1", "MLB2", "CB1", "CB2", "CB3", "CB4", "FS1", "FS2", "SS1", "SS2"))) {
    echo '<div class="row">';
    echo '<div class="col-lg-6">';

    $getDefStats = db_query("SELECT * FROM `franchise_year_indv_def` WHERE Historical_ID='{$position_Historical_ID}' ORDER BY Year ASC");

    if (mysqli_num_rows($getDefStats) === 0) {
        echo '<span class="badge badge-dark">No Defensive Stats</span>';
    } else {


        echo '<table class="table table-sm">';
        echo '<tr><th colspan="7">Defense</th></tr>';
        echo '<tr><th>Year</th><th>Tackles</th><th>For Loss</th><th>Sacks</th><th>INTs</th><th>TDs</th><th>Safety</th></tr>';

        while ($fetchDefStats = $getDefStats->fetch_assoc()) {

            echo '<tr>';
            echo '<td>' . $fetchDefStats['Year'] . '</td>';
            echo '<td>' . $fetchDefStats['Tackles'] . '</td>';
            echo '<td>' . $fetchDefStats['ForLoss'] . '</td>';
            echo '<td>' . $fetchDefStats['Sacks'] . '</td>';
            echo '<td>' . $fetchDefStats['INTs'] . '</td>';
            echo '<td>' . $fetchDefStats['TDs'] . '</td>';
            echo '<td>' . $fetchDefStats['Safety'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    echo '</div>';
    echo '</div>';
}
if (in_array($pos, array('K1'))) {
    echo '<div class="row">';
    echo '<div class="col-lg-6">';

    $getKickStats = db_query("SELECT * FROM `franchise_year_indv_st` WHERE Historical_ID='{$position_Historical_ID}' ORDER BY Year ASC");

    echo '<table class="table table-sm">';
    echo '<tr><th colspan="7">Kicking</th></tr>';
    echo '<tr><th>Year</th><th>FGA</th><th>FGM</th><th>FG %</th><th>Long FG</th></tr>';

    while ($fetchKickStats = $getKickStats->fetch_assoc()) {

        echo '<tr>';
        echo '<td>' . $fetchKickStats['Year'] . '</td>';
        echo '<td>' . $fetchKickStats['FGA'] . '</td>';
        echo '<td>' . $fetchKickStats['FGM'] . '</td>';
        echo '<td>' . $fetchKickStats['FG_Percent'] . '</td>';
        echo '<td>' . $fetchKickStats['Longest_Play'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
    echo '</div>';
}
if (in_array($pos, array('P1'))) {
    echo '<div class="row">';
    echo '<div class="col-lg-6">';

    $getPuntStats = db_query("SELECT * FROM `franchise_year_indv_st` WHERE Historical_ID='{$position_Historical_ID}' ORDER BY Year ASC");

    echo '<table class="table table-sm">';
    echo '<tr><th colspan="7">Punting</th></tr>';
    echo '<tr><th>Year</th><th>Punt AVG</th><th>Inside 20</th></tr>';

    while ($fetchPuntStats = $getPuntStats->fetch_assoc()) {

        echo '<tr>';
        echo '<td>' . $fetchPuntStats['Year'] . '</td>';
        echo '<td>' . $fetchPuntStats['Punt_AVG'] . '</td>';
        echo '<td>' . $fetchPuntStats['I20'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
    echo '</div>';
}
if (in_array($pos, array('KR', 'PR'))) {
    echo '<div class="row">';
    echo '<div class="col-lg-6">';

    $getReturnStats = db_query("SELECT * FROM `franchise_year_indv_st` WHERE Historical_ID='{$position_Historical_ID}' ORDER BY Year ASC");

    echo '<table class="table table-sm">';
    echo '<tr><th colspan="4">';
    if ($pos === 'KR') {
        echo 'Kick Returns';
    } else {
        echo 'Punt Returns';
    }
    echo '</th></tr>';
    echo '<tr><th>Year</th><th>Return AVG</th><th>Return TDs</th><th>Longest Return</th></tr>';

    while ($fetchReturnStats = $getReturnStats->fetch_assoc()) {

        echo '<tr>';
        echo '<td>' . $fetchReturnStats['Year'] . '</td>';
        echo '<td>' . $fetchReturnStats['Ret_AVG'] . '</td>';
        echo '<td>' . $fetchReturnStats['Ret_TDs'] . '</td>';
        echo '<td>' . $fetchReturnStats['Longest_Play'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
    echo '</div>';
}



    