<br>
<table class="table" style="text-align: center">
    <?php
    $Get_Preseason_Info = db_query("Select * From `franchise_year_info` WHERE Section='preseason' and Year='{$View_Year}' and Franchise='{$Curr_Team}' ORDER BY `Row`");
    while ($Preseason_Info_Row = $Get_Preseason_Info->fetch_assoc()) {
        echo '<tr>';
        echo '<td>', $Preseason_Info_Row['Field_Display'], '</td>';
        /* Display Cell for Each Field */
        echo '<td style="width: 200px">';
        /* Display Team Prestige */
        if ($Preseason_Info_Row['Field_ID'] === 'prestige') {
            echo '<div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="10" style="width: ', ($Preseason_Info_Row['Field_Value']) * 10, '%;">
                            <span>', $Preseason_Info_Row['Field_Value'], '/10</span>
                    </div>
                  </div>';
        }
        /* Display Team Rivals */
        if ($Preseason_Info_Row['Field_ID'] === 'rivals') {
            echo $Preseason_Info_Row['Field_Value'];
        }
        /* Display Team Icons */
        if ($Preseason_Info_Row['Field_ID'] === 'icons') {
            echo $Preseason_Info_Row['Field_Value'];
        }
        /* Display Salary Cap */
        if ($Preseason_Info_Row['Field_ID'] === 'cap') {
            echo '$', $Preseason_Info_Row['Field_Value'], ' Million';
        }
        /* Display Team Salary */
        if ($Preseason_Info_Row['Field_ID'] === 'salary') {
            echo '$', $Preseason_Info_Row['Field_Value'], ' Million';
        }
        /* Display Cap Room */
        if ($Preseason_Info_Row['Field_ID'] === 'room') {
            echo '$', $Preseason_Info_Row['Field_Value'], ' Million';
        }
        /* Display Cap Penalties */
        if ($Preseason_Info_Row['Field_ID'] === 'pen') {
            echo '$', $Preseason_Info_Row['Field_Value'], ' Million';
        }
        echo '</td>';
        /* History Cell for Each Field */
        echo '<td><span class="btn btn-default historyModal" id="', $Preseason_Info_Row['Field_ID'], 'History" style="cursor: pointer" data-toggle="popover" data-placement="top" title="', $Preseason_Info_Row['Field_Display'], ' History">', $Preseason_Info_Row['Field_Display'], ' History</span>';
        /* Update Cell for Each Field */
        echo '<td class="franViewEdit" style="text-align: right; width: 300px">';
        /* Update Team Prestige */
        if ($Preseason_Info_Row['Field_ID'] === 'prestige') {
            echo '<span class="label label-default">Update Prestige:</span>&nbsp';
            echo '<input id="preseason_prestige_input" class="form-control" data-franchise="', $Curr_Team, '" data-year="', $View_Year, '" type="number" value="', $Preseason_Info_Row['Field_Value'], '" min="1" max="10" style="width: 75px">';
        }
        /* Update Team Rival */
        if ($Preseason_Info_Row['Field_ID'] === 'rivals') {
            echo '<div class="input-group">
                                                                            <input id="preseason_rival_input" type="text" data-franchise="', $Curr_Team, '" data-year="', $View_Year, '" class="form-control" placeholder="Enter New Rivals">
                                                                            <span class="input-group-btn">
                                                                              <button id="preseason_rival_btn" class="btn btn-default" type="button">Update</button>
                                                                            </span>
                                                                          </div>';
        }
        /* Update Team Icons */
        if ($Preseason_Info_Row['Field_ID'] === 'icons') {
            echo '<div class="input-group">
                                                                            <input id="preseason_icons_input" type="text" data-franchise="', $Curr_Team, '" data-year="', $View_Year, '" class="form-control" placeholder="Enter New NFL Icon(s)">
                                                                            <span class="input-group-btn">
                                                                              <button id="preseason_icons_btn" class="btn btn-default" type="button">Update</button>
                                                                            </span>
                                                                          </div>';
        }
        /* Update Salary Cap */
        if ($Preseason_Info_Row['Field_ID'] === 'cap') {
            echo '<div class="input-group">
                                                                                <span class="input-group-addon">$</span>                                                                                            
                                                                              <input type="text" id="preseason_salaryCap_input" class="form-control" data-franchise="', $Curr_Team, '" data-year="', $View_Year, '" placeholder="Enter New Salary Cap"> 
                                                                            <span class="input-group-addon">Million</span>
                                                                          </div>';
        }
        /* Update Team Salary */
        if ($Preseason_Info_Row['Field_ID'] === 'salary') {
            echo '<div class="input-group">
                                                                                <span class="input-group-addon">$</span>                                                                                            
                                                                              <input type="text" id="preseason_teamSalary_input" class="form-control" data-franchise="', $Curr_Team, '" data-year="', $View_Year, '" placeholder="Enter New Team Salary"> 
                                                                            <span class="input-group-addon">Million</span>
                                                                          </div>';
        }
        /* Update Cap Room */
        if ($Preseason_Info_Row['Field_ID'] === 'room') {
            echo '<div class="input-group">
                                                                                <span class="input-group-addon">$</span>                                                                                            
                                                                              <input type="text" id="preseason_capRoom_input" class="form-control" data-franchise="', $Curr_Team, '" data-year="', $View_Year, '" placeholder="Enter New Cap Room"> 
                                                                            <span class="input-group-addon">Million</span>
                                                                          </div>';
        }
        /* Update Cap Penalties */
        if ($Preseason_Info_Row['Field_ID'] === 'pen') {
            echo '<div class="input-group">
                                                                                <span class="input-group-addon">$</span>                                                                                            
                                                                              <input type="text" id="preseason_capPenalties_input" class="form-control" data-franchise="', $Curr_Team, '" data-year="', $View_Year, '" placeholder="Enter New Cap Penalties"> 
                                                                            <span class="input-group-addon">Million</span>
                                                                          </div>';
        }
        echo '</td>';
    }
    echo '</tr>';
    ?>
</table>