<?php

/* Training Camp Details Section */
    echo '<br><br><h3>Training Camp</h3>';
    $Get_TC_History = db_query("SELECT * FROM `franchise_year_trainingcamp` WHERE Player_Row='{$position_Historical_ID}' ORDER BY Year ASC");
    echo '<form role="form" name="' . $pos . '_TC" class="playerTCForm">';

    echo '<table class="table table-sm">';
    while ($TC_Row = $Get_TC_History->fetch_assoc()) {

        echo '<tr>';
        echo '<td>';
        echo "Year: " . $TC_Row['Year'] . " ";
        echo $TC_Row['Drill'];
        echo " - " . $TC_Row['Attr_Name'];
        echo " " . $TC_Row['Old_Attr'] . " to " . $TC_Row['New_Attr'];
        echo '</td>';
        echo '<td class="franViewEdit">';
        echo '<button class="btn btn-danger btn-sm removeDrill" id="', $TC_Row['Row_ID'], '">Remove Drill</button>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';


    $Attributes_TC = array('Overall', 'SPD', 'STR', 'AWR', 'AGI', 'ACC', 'CTH', 'CAR', 'JMP', 'BTK', 'TAK', 'THP', 'THA', 'PBK', 'RBK', 'KPW', 'KAC');
    $Drills_TC = array('Pocket Presence', 'Chase and Tackle', 'Swat Ball', 'Trench Fight', 'Clutch Kicking', 'Corner Punt', 'Precision Passing', 'Ground Attack', 'Catch Ball');

    echo '<span class="franViewEdit">Add Training Camp Result:</span><br>';
    echo '<select name="tc_drill" class="form-control franViewEdit" style="width: 200px">';
    foreach ($Drills_TC as $drill) {
        echo '<option value="', $drill, '">', $drill, '</option>';
    }
    echo '</select>&nbsp;&nbsp;&nbsp;';
    echo '<select name="selectedAttr" class="form-control franViewEdit" style="width: 150px">';
    foreach ($Attributes_TC as $Attr) {
        echo '<option value="', $Attr, '">', $Attr, '</option>';
    }
    echo '</select>';
    echo '&nbsp;&nbsp;&nbsp;<input type="text" class="form-control franViewEdit" style="width: 250px" name="old_attr" placeholder="Enter Old Attribute Value" />';
    echo '&nbsp;&nbsp;&nbsp;<input type="text" class="form-control franViewEdit" style="width: 250px" name="new_attr" placeholder="Enter New Attribute Value" />';
    echo '<br><br>';
    echo '<button type="submit" class="btn btn-success franViewEdit">Submit Training Camp Result</button>';

    $TC_minYear_result = db_query("SELECT Min(Year) as MinYear FROM `franchise_year_roster` WHERE Historical_ID='{$position_Historical_ID}'");
    $TC_minYear_Row = $TC_minYear_result->fetch_assoc();
    $TC_minYear = $TC_minYear_Row['MinYear'];

    $historical_result_TC = db_query("SELECT * FROM `franchise_year_roster` WHERE Historical_ID='{$position_Historical_ID}' AND Year='{$TC_minYear}'");
    $player_Row = $historical_result_TC->fetch_assoc();
    echo '<input type="hidden" name="row" value="', $player_Row['Row_ID'], '">
                <input type="hidden" name="franchise" value="', $Curr_Team, '" />
                <input type="hidden" name="year" value="', $View_Year, '" />';
    echo '</form>';