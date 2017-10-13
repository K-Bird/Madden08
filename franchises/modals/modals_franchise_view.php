<?php
//**** [ Preseason History ] ****//
//Team Prestige History
$GetPrestigeHistory = db_query("Select * From `franchise_year_info` where Field_ID='prestige' AND Franchise='{$Curr_Team}' ORDER BY Year ASC");
?>
<div id="prestigeHistoryTable" style="display: none">
    <table class="table table-condensed" style="font-size: smaller">
        <?php
        $i = 0;
        $prev_Prestige = 0;
        $Prestige_Row_Count = mysqli_num_rows($GetPrestigeHistory);
        while ($Prestige_Row = $GetPrestigeHistory->fetch_assoc()) {

            echo '<tr>';
            echo '<td>Year ', $Prestige_Row['Year'], ': </td>';
            echo '<td>', $Prestige_Row['Field_Value'], '</td>';
            echo '<td style="text-align: center">';
            if ($i === 0) {
                echo '-';
            } else {
                $Prestige_Change = $Prestige_Row['Field_Value'] - $prev_Prestige;
                if ($Prestige_Change > 0) {
                    echo '<span style="color: green">( +' . $Prestige_Change . ' )</span>';
                } else {
                    echo '<span style="color: red">( ' . $Prestige_Change . ' )</span>';
                }
            }
            echo '</td>';
            echo '</tr>';
            $i++;
            $prev_Prestige = $Prestige_Row['Field_Value'];
        }
        ?>
    </table>
</div>

<?php
//Team Rival History
$GetRivalHistory = db_query("Select * From `franchise_year_info` where Field_ID='rivals' AND Franchise='{$Curr_Team}' ORDER BY Year ASC");
?>
<div id="rivalsHistoryTable" style="display: none">
    <table class="table table-condensed" style="font-size: smaller">
        <?php
        while ($Rival_Row = $GetRivalHistory->fetch_assoc()) {

            echo '<tr>';
            echo '<td>Year ', $Rival_Row['Year'], ': </td>';
            echo '<td>', $Rival_Row['Field_Value'], '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>

<?php
//Team Icons History
$GetIconsHistory = db_query("Select * From `franchise_year_info` where Field_ID='icons' AND Franchise='{$Curr_Team}' ORDER BY Year ASC");
?>
<div id="iconsHistoryTable" style="display: none">
    <table class="table table-condensed" style="font-size: smaller">
        <?php
        while ($Icons_Row = $GetIconsHistory->fetch_assoc()) {

            echo '<tr>';
            echo '<td style="width: 50px">Year ', $Icons_Row['Year'], ': </td>';
            echo '<td>', $Icons_Row['Field_Value'], '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>

<?php
//Team salaryCap History
$GetsalaryCapHistory = db_query("Select * From `franchise_year_info` where Field_ID='cap' AND Franchise='{$Curr_Team}' ORDER BY Year ASC");
?>
<div id="capHistoryTable" style="display: none">
    <table class="table table-condensed" style="font-size: smaller">
        <?php
        $i = 0;
        $prev_salaryCap = 0;
        $salaryCap_Row_Count = mysqli_num_rows($GetsalaryCapHistory);
        while ($salaryCap_Row = $GetsalaryCapHistory->fetch_assoc()) {

            echo '<tr>';
            echo '<td>Year ', $salaryCap_Row['Year'], ': </td>';
            echo '<td>$', $salaryCap_Row['Field_Value'], ' Million</td>';
            echo '<td style="text-align: center">';
            if ($i === 0) {
                echo '-';
            } else {
                $Value_Change = floatval($salaryCap_Row['Field_Value']) - floatval($prev_salaryCap);
                if ($Value_Change > 0) {
                    echo '<span style="color: green">( +' . $Value_Change . ' ) Million</span>';
                } else {
                    echo '<span style="color: red">( ' . $Value_Change . ' ) Million</span>';
                }
            }
            echo '</td>';
            echo '</tr>';
            $i++;
            $prev_salaryCap = $salaryCap_Row['Field_Value'];
        }
        ?>
    </table>
</div>

<?php
//Team teamSalary History
$GetteamSalaryHistory = db_query("Select * From `franchise_year_info` where Field_ID='salary' AND Franchise='{$Curr_Team}' ORDER BY Year ASC");
?>
<div id="salaryHistoryTable" style="display: none">
    <table class="table table-condensed" style="font-size: smaller">
        <?php
        $i = 0;
        $prev_teamSalary = 0;
        $teamSalary_Row_Count = mysqli_num_rows($GetteamSalaryHistory);
        while ($teamSalary_Row = $GetteamSalaryHistory->fetch_assoc()) {

            echo '<tr>';
            echo '<td>Year ', $teamSalary_Row['Year'], ': </td>';
            echo '<td>$', $teamSalary_Row['Field_Value'], ' Million</td>';
            echo '<td style="text-align: center">';
            if ($i === 0) {
                echo '-';
            } else {
                $teamSalary_Change = floatval($teamSalary_Row['Field_Value']) - floatval($prev_teamSalary);
                if ($teamSalary_Change > 0) {
                    echo '<span style="color: green">( +' . $teamSalary_Change . ' ) Million</span>';
                } else {
                    echo '<span style="color: red">( ' . $teamSalary_Change . ' ) Million</span>';
                }
            }
            echo '</td>';
            echo '</tr>';
            $i++;
            $prev_teamSalary = $teamSalary_Row['Field_Value'];
        }
        ?>
    </table>
</div>

<?php
//Team capRoom History
$GetcapRoomHistory = db_query("Select * From `franchise_year_info` where Field_ID='room' AND Franchise='{$Curr_Team}' ORDER BY Year ASC");
?>
<div id="roomHistoryTable" style="display: none">
    <table class="table table-condensed" style="font-size: smaller">
        <?php
        $i = 0;
        $prev_capRoom = 0;
        $capRoom_Row_Count = mysqli_num_rows($GetcapRoomHistory);
        while ($capRoom_Row = $GetcapRoomHistory->fetch_assoc()) {

            echo '<tr>';
            echo '<td>Year ', $capRoom_Row['Year'], ': </td>';
            echo '<td>$', $capRoom_Row['Field_Value'], ' Million</td>';
            echo '<td style="text-align: center">';
            if ($i === 0) {
                echo '-';
            } else {
                $capRoom_Change = floatval($capRoom_Row['Field_Value']) - floatval($prev_capRoom);
                if ($capRoom_Change > 0) {
                    echo '<span style="color: green">( +' . $capRoom_Change . ' ) Million</span>';
                } else {
                    echo '<span style="color: red">( ' . $capRoom_Change . ' ) Million</span>';
                }
            }
            echo '</td>';
            echo '</tr>';
            $i++;
            $prev_capRoom = $capRoom_Row['Field_Value'];
        }
        ?>
    </table>
</div>

<?php
//Team capPenalties History
$GetcapPenaltiesHistory = db_query("Select * From `franchise_year_info` where Field_ID='pen' AND Franchise='{$Curr_Team}' ORDER BY Year ASC");
?>
<div id="penHistoryTable" style="display: none">
    <table class="table table-condensed" style="font-size: smaller">
        <?php
        $i = 0;
        $prev_capPenalties = 0;
        $capPenalties_Row_Count = mysqli_num_rows($GetcapPenaltiesHistory);
        while ($capPenalties_Row = $GetcapPenaltiesHistory->fetch_assoc()) {

            echo '<tr>';
            echo '<td>Year ', $capPenalties_Row['Year'], ': </td>';
            echo '<td>$', $capPenalties_Row['Field_Value'], ' Million</td>';
            echo '<td style="text-align: center">';
            if ($i === 0) {
                echo '-';
            } else {
                $capPenalties_Change = floatval($capPenalties_Row['Field_Value']) - floatval($prev_capPenalties);
                if ($capPenalties_Change > 0) {
                    echo '<span style="color: green">( +' . $capPenalties_Change . ' ) Million</span>';
                } else {
                    echo '<span style="color: red">( ' . $capPenalties_Change . ' ) Million</span>';
                }
            }
            echo '</td>';
            echo '</tr>';
            $i++;
            $prev_capPenalties = $capPenalties_Row['Field_Value'];
        }
        ?>
    </table>
</div>

<!-- Coaching Staff History -->
<?php
//Head Coach History
$GetHCHistory = db_query("Select * From `franchise_year_pre_coaches` where Position='HC' AND Team='{$Curr_Team}' ORDER BY Year ASC");
?>
<div id="HCHistoryTable" style="display: none">
    <table class="table table-condensed" style="font-size: smaller">
        <?php
        while ($HC_Row = $GetHCHistory->fetch_assoc()) {
            echo '<tr>';
            echo '<td>Year ', $HC_Row['Year'], ': </td>';
            echo '<td>', $HC_Row['Name'], '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>

<?php
//Offensive Coordinator History
$GetOCHistory = db_query("Select * From `franchise_year_pre_coaches` where Position='OC' AND Team='{$Curr_Team}' ORDER BY Year ASC");
?>
<div id="OCHistoryTable" style="display: none">
    <table class="table table-condensed" style="font-size: smaller">
        <?php
        while ($OC_Row = $GetOCHistory->fetch_assoc()) {
            echo '<tr>';
            echo '<td>Year ', $OC_Row['Year'], ': </td>';
            echo '<td>', $OC_Row['Name'], '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>

<?php
//Defensive Coordinator History
$GetDCHistory = db_query("Select * From `franchise_year_pre_coaches` where Position='DC' AND Team='{$Curr_Team}' ORDER BY Year ASC");
?>
<div id="DCHistoryTable" style="display: none">
    <table class="table table-condensed" style="font-size: smaller">
        <?php
        while ($DC_Row = $GetDCHistory->fetch_assoc()) {
            echo '<tr>';
            echo '<td>Year ', $DC_Row['Year'], ': </td>';
            echo '<td>', $DC_Row['Name'], '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>

<?php
//Special Teams Coach History
$GetSTHistory = db_query("Select * From `franchise_year_pre_coaches` where Position='ST' AND Team='{$Curr_Team}' ORDER BY Year ASC");
?>
<div id="STHistoryTable" style="display: none">
    <table class="table table-condensed" style="font-size: smaller">
        <?php
        while ($ST_Row = $GetSTHistory->fetch_assoc()) {
            echo '<tr>';
            echo '<td>Year ', $ST_Row['Year'], ': </td>';
            echo '<td>', $ST_Row['Name'], '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>


<!-- Update Coaching Staff HC Modal -->
<div class="modal fade editModal" id="HCModal">
    <div class="modal-dialog" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Head Coach for <?php echo strtoupper($Curr_Team) . " - Year: " . $View_Year; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" class="yearForm" name="HCHistory" action="../libs/ajax/franchise_view/pre_coach/update_franchise_coachingstaff.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New Head Coach:</label> 
                        <input class="form-control" type="text" id="Value" name="NewValue" size="15">
                        <br><br>
                        <input type="hidden" name="fran" value=<?php echo $Curr_Team; ?> />
                        <input type="hidden" name="year" value=<?php echo $View_Year; ?> />
                        <input type="hidden" name="position" value="HC" />
                        <div class="form-group" style="text-align: right">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Update Coaching Staff OC Modal -->
<div class="modal fade editModal" id="OCModal">
    <div class="modal-dialog" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Offensive Coordinator for <?php echo strtoupper($Curr_Team) . " - Year: " . $View_Year; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" class="yearForm" name="OCHistory" action="../libs/ajax/franchise_view/pre_coach/update_franchise_coachingstaff.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New Offensive Coordinator:</label> 
                        <input class="form-control" type="text" id="Value" name="NewValue" size="15">
                        <br><br>
                        <input type="hidden" name="fran" value=<?php echo $Curr_Team; ?> />
                        <input type="hidden" name="year" value=<?php echo $View_Year; ?> />
                        <input type="hidden" name="position" value="OC" />
                        <div class="form-group" style="text-align: right">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Update Coaching Staff DC Modal -->
<div class="modal fade editModal" id="DCModal">
    <div class="modal-dialog" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Defensive Coordinator for <?php echo strtoupper($Curr_Team) . " - Year: " . $View_Year; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" class="yearForm" name="DCHistory" action="../libs/ajax/franchise_view/pre_coach/update_franchise_coachingstaff.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New Defensive Coordinator:</label> 
                        <input class="form-control" type="text" id="Value" name="NewValue" size="15">
                        <br><br>
                        <input type="hidden" name="fran" value=<?php echo $Curr_Team; ?> />
                        <input type="hidden" name="year" value=<?php echo $View_Year; ?> />
                        <input type="hidden" name="position" value="DC" />
                        <div class="form-group" style="text-align: right">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Update Coaching Staff ST Modal -->
<div class="modal fade editModal" id="STModal">
    <div class="modal-dialog" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Special Teams Coordinator for <?php echo strtoupper($Curr_Team) . " - Year: " . $View_Year; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" class="yearForm" name="STHistory" action="../libs/ajax/franchise_view/pre_coach/update_franchise_coachingstaff.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New Special Teams Coordinator:</label> 
                        <input class="form-control" type="text" id="Value" name="NewValue" size="15">
                        <br><br>
                        <input type="hidden" name="fran" value=<?php echo $Curr_Team; ?> />
                        <input type="hidden" name="year" value=<?php echo $View_Year; ?> />
                        <input type="hidden" name="position" value="ST" />
                        <div class="form-group" style="text-align: right">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Update Depth Chart Modal -->
<div class="modal fade rememberModal" id="editDepthModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Depth Chart</h4>
            </div>
            <div class="modal-body">
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#importDraft">Add Drafted Players</button>
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#importFA">Add Signed Free Agents</button>
                <br><br>
                <form role="form" name="EditRoster" id="EditRosterForm" class="editDepthForm">
                    <table class="table" id="editDepth" style="font-size: smaller; text-align: left;">
                        <tr>
                            <td>Edit</td><td>Position</td><td>Name</td><td>Overall</td><td>Age</td><td>Acquired</td><td>Vet/Rookie</td><td>Weapon</td><td>Buckeye</td>
                        </tr>
                        <!-- Roster Block -->
                        <?php
                        foreach ($Positions as $pos) {
                            echo '<tr style="text-align: left">';
                            $edit_depth_Result = db_query("SELECT * FROM `franchise_year_roster` WHERE Year='{$View_Year}' and Position='{$pos}' and Team='{$Curr_Team}'");
                            $update_Depth_Row = $edit_depth_Result->fetch_assoc();
                            $numRows = mysqli_num_rows($edit_depth_Result);
                            if ($numRows > 0) {
                                $RosterRow = $edit_depth_Result->fetch_assoc();
                                echo '<td>
                                        <select name="positionEdit[]" class="btn btn-xs btn-default dropdown-toggle">
                                            <option></option>
                                            <option value=' . $update_Depth_Row['Row_ID'] . '>Edit</option>
                                        </select>
                                    </td>
                                    <td>
                                    <select name="depthPOSedit[]" class="btn btn-xs btn-default dropdown-toggle">';
                                foreach ($Positions as $editPos) {
                                    echo '<option ';
                                    if ($editPos === $update_Depth_Row['Position']) {
                                        echo 'selected="selected"';
                                    }
                                    echo '>', $editPos, '</option>';
                                }
                                echo '</select></td>
                                    <td>
                                        <input type="text" name="changedNames[]" placeholder="', $update_Depth_Row['Name'], '">
                                    </td>
                                    <td>
                                        <input type="text" name="changedOverall[]" placeholder="', $update_Depth_Row['Overall'], '" size="2">
                                    </td>
                                    <td>
                                        <input type="text" name="changedAge[]" placeholder="', $update_Depth_Row['Age'], '" size="2"></td>
                                    <td>
                                        <select name="changedOnTeam[]" class="btn btn-xs btn-default dropdown-toggle">';
                                if ($update_Depth_Row['Acquired'] === 'On Team') {
                                    echo '<option selected>On Team</a></option>';
                                } else {
                                    echo '<option>On Team</option>';
                                }

                                if ($update_Depth_Row['Acquired'] === 'Free Agent') {
                                    echo '<option selected>Free Agent</option>';
                                } else {
                                    echo '<option>Free Agent</option>';
                                }

                                if ($update_Depth_Row['Acquired'] === 'Trade') {
                                    echo '<option selected>Trade</option>';
                                } else {
                                    echo '<option>Trade</option>';
                                }

                                if ($update_Depth_Row['Acquired'] === 'Draft') {
                                    echo '<option selected>Draft</option>';
                                } else {
                                    echo '<option>Draft</option>';
                                }

                                if ($update_Depth_Row['Acquired'] === 'Created') {
                                    echo '<option selected>Created</option>';
                                } else {
                                    echo '<option>Created</option>';
                                }

                                echo '</select>
                                    </td>
                                    <td>
                                        <select name="changedVR[]" class="btn btn-xs btn-default dropdown-toggle">';
                                if ($update_Depth_Row['Rookie'] === 'R') {
                                    echo '<option selected>Rookie</option>
                                                      <option>Veteran</option>';
                                } else {
                                    echo '<option>Rookie</option>
                                          <option selected>Veteran</option>';
                                }
                                echo '</td>
                                        <td>
                                            <select name="changedWeapon[]" class="btn btn-xs btn-default dropdown-toggle">';
                                if ($update_Depth_Row['Weapon'] === 'None') {
                                    echo '<option selected>None</option>';
                                } else {
                                    echo '<option>None</option>';
                                }
                                if ($update_Depth_Row['Weapon'] === 'CannonArm') {
                                    echo '<option selected>CannonArm</option>';
                                } else {
                                    echo '<option value="CannonArm">Cannon Arm</option>';
                                }
                                if ($update_Depth_Row['Weapon'] === 'Coverage') {
                                    echo '<option selected>Coverage Corner</option>';
                                } else {
                                    echo '<option value="Coverage">Coverage Corner</option>';
                                }
                                if ($update_Depth_Row['Weapon'] === 'Crosshair') {
                                    echo '<option selected>Precision QB</option>';
                                } else {
                                    echo '<option value="Crosshair">Precision QB</option>';
                                }
                                if ($update_Depth_Row['Weapon'] === 'Elusive') {
                                    echo '<option selected>Elusive Back</option>';
                                } else {
                                    echo '<option value="Elusive">Elusive Back</option>';
                                }
                                if ($update_Depth_Row['Weapon'] === 'Power') {
                                    echo '<option selected>Power Back</option>';
                                } else {
                                    echo '<option value="Power">Power Back</option>';
                                }
                                if ($update_Depth_Row['Weapon'] === 'Franchise') {
                                    echo '<option selected>Franchise Player</option>';
                                } else {
                                    echo '<option value="Franchise">Franchise Player</option>';
                                }
                                if ($update_Depth_Row['Weapon'] === 'HeavyHitter') {
                                    echo '<option selected>Heavy Hitter</option>';
                                } else {
                                    echo '<option value="HeavyHitter">Heavy Hitter</option>';
                                }
                                if ($update_Depth_Row['Weapon'] === 'PassBlock') {
                                    echo '<option selected>Pocket Protector</option>';
                                } else {
                                    echo '<option value="PassBlock">Pocket Protector</option>';
                                }
                                if ($update_Depth_Row['Weapon'] === 'RunBlock') {
                                    echo '<option selected>Run Blocker</option>';
                                } else {
                                    echo '<option value="RunBlock">Run Blocker</option>';
                                }
                                if ($update_Depth_Row['Weapon'] === 'Possession') {
                                    echo '<option selected>Possession Receiver</option>';
                                } else {
                                    echo '<option value="Possession">Possession Receiver</option>';
                                }
                                if ($update_Depth_Row['Weapon'] === 'RunStopper') {
                                    echo '<option selected>Run Stopper</option>';
                                } else {
                                    echo '<option value="RunStopper">Run Stopper</option>';
                                }
                                if ($update_Depth_Row['Weapon'] === 'Speed') {
                                    echo '<option selected>Speed Player</option>';
                                } else {
                                    echo '<option value="Speed">Speed Player</option>';
                                }
                                echo '</select>
                                        </td>
                                      <td>
                                        <select name="changedOSU[]" class="btn btn-xs btn-default dropdown-toggle">';
                                if ($update_Depth_Row['OSU'] === 'Y') {
                                    echo '<option selected>Buckeye</option>
                                                      <option></option>';
                                } else {
                                    echo '<option selected></option>
                                                      <option>Buckeye</option>';
                                }
                                echo '</select>';
                            } else {
                                echo '<td></td>
                                      <td>' . $pos . '</td><td colspan="6" style="text-align:center">No ' . $pos . ' on Roster</td>
                                      <td><a class="btn btn-xs btn-success addPlayerBtn" data-toggle="modal" data-target="#add' . $pos . 'Modal">Add ' . $pos . '</a></td>';
                            }
                            echo '</tr>';
                        }
                        ?>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input type="hidden" name="franchise" value=<?php echo $Curr_Team ?> />
                <input type="hidden" name="year" value=<?php echo $View_Year ?> />
                <button type="submit" class="btn btn-success">Save changes</button>
            </div>
            </form>                
        </div>
    </div>
</div>

<!-- Remove Depth Chart Modal -->
<div class="modal fade rememberModal" id="removeDepthModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Remove From Depth Chart</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="RemoveRoster" id="RemoveRosterForm" class="removeDepthForm">
                    <table class="table" id="removeDepth" style="font-size: smaller; text-align: left;">
                        <tr>
                            <td>Remove</td><td>Position</td>
                        </tr>
                        <?php
                        foreach ($Positions as $pos) {
                            echo '<tr style="text-align: left">';
                            $remove_depth_Result = db_query("SELECT * FROM `franchise_year_roster` WHERE Year='{$View_Year}' and Position='{$pos}' and Team='{$Curr_Team}'");
                            $remove_Depth_Row = $remove_depth_Result->fetch_assoc();
                            $numRows = mysqli_num_rows($remove_depth_Result);
                            if ($numRows > 0) {
                                $RemoveRow = $remove_depth_Result->fetch_assoc();
                                echo '<td>
                                        <select name="positionRemove[]" class="btn btn-xs btn-default dropdown-toggle">
                                            <option></option>
                                            <option value=' . $remove_Depth_Row['Row_ID'] . '>Remove</option>
                                        </select>
                                    </td>
                                    <td>', $remove_Depth_Row['Position'], ' - ', $remove_Depth_Row['Name'], '</td>';
                            } else {
                                
                            }
                        }
                        ?>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input type="hidden" name="franchise" value=<?php echo $Curr_Team ?> />
                <input type="hidden" name="year" value=<?php echo $View_Year ?> />
                <button type="submit" class="btn btn-success">Remove Players</button>
            </div>
            </form>                
        </div>
    </div>
</div>

<!-- Player Detail Modals -->
<?php
$Attributes_QB = array('Age', 'Position', 'Overall', 'THP', 'THA', 'AWR', 'AGI', 'SPD', 'BTK', 'STR', 'ACC', 'CAR', 'STA', 'INJ', 'TGH', 'IMP');
$Attributes_HB = array('Age', 'Position', 'Overall', 'SPD', 'AGI', 'BTK', 'CAR', 'CTH', 'AWR', 'ACC', 'STR', 'PBK', 'STA', 'INJ', 'TGH', 'IMP');
$Attributes_FB = array('Age', 'Position', 'Overall', 'RBK', 'AWR', 'CAR', 'SPD', 'ACC', 'BTK', 'STR', 'PBK', 'AGI', 'STA', 'INJ', 'TGH', 'IMP');
$Attributes_WR = array('Age', 'Position', 'Overall', 'CTH', 'SPD', 'ACC', 'AGI', 'AWR', 'JMP', 'STR', 'STA', 'INJ', 'TGH', 'IMP');
$Attributes_TE = array('Age', 'Position', 'Overall', 'CTH', 'AWR', 'SPD', 'STR', 'ACC', 'AGI', 'JMP', 'STA', 'INJ', 'TGH', 'IMP');
$Attributes_T = array('Age', 'Position', 'Overall', 'PBK', 'RBK', 'AWR', 'STR', 'SPD', 'ACC', 'AGI', 'STA', 'INJ', 'TGH', 'IMP');
$Attributes_GC = array('Age', 'Position', 'Overall', 'RBK', 'PBK', 'AWR', 'STR', 'SPD', 'ACC', 'AGI', 'STA', 'INJ', 'TGH', 'IMP');
$Attributes_DE = array('Age', 'Position', 'Overall', 'TAK', 'STR', 'SPD', 'ACC', 'AWR', 'AGI', 'STA', 'INJ', 'TGH', 'IMP');
$Attributes_DT = array('Age', 'Position', 'Overall', 'STR', 'TAK', 'AWR', 'ACC', 'SPD', 'AGI', 'STA', 'INJ', 'TGH', 'IMP');
$Attributes_OLB = array('Age', 'Position', 'Overall', 'TAK', 'AWR', 'SPD', 'STR', 'AGI', 'ACC', 'STA', 'INJ', 'TGH', 'IMP');
$Attributes_MLB = array('Age', 'Position', 'Overall', 'TAK', 'AWR', 'STR', 'AGI', 'ACC', 'SPD', 'STA', 'INJ', 'TGH', 'IMP');
$Attributes_CB = array('Age', 'Position', 'Overall', 'AWR', 'SPD', 'CTH', 'ACC', 'AGI', 'TAK', 'JMP', 'STR', 'STA', 'INJ', 'TGH', 'IMP');
$Attributes_FS = array('Age', 'Position', 'Overall', 'AWR', 'CTH', 'SPD', 'ACC', 'TAK', 'AGI', 'JMP', 'STR', 'STA', 'INJ', 'TGH', 'IMP');
$Attributes_SS = array('Age', 'Position', 'Overall', 'AWR', 'CTH', 'SPD', 'TAK', 'ACC', 'AGI', 'STR', 'JMP', 'STA', 'INJ', 'TGH', 'IMP');
$Attributes_K = array('Age', 'Position', 'Overall', 'KAC', 'KPW', 'AWR', 'STA', 'INJ', 'TGH', 'IMP');
$Attributes_P = array('Age', 'Position', 'Overall', 'KPW', 'KAC', 'AWR', 'STA', 'INJ', 'TGH', 'IMP');
$Attributes_KR = array('Age', 'Position', 'Overall', 'KR', 'SPD', 'AGI', 'ACC', 'CAR', 'BTK', 'STA', 'INJ', 'TGH', 'IMP');

foreach ($Positions as $pos) {

    if (in_array($pos, array('QB1', 'QB2'))) {
        $Display_Attributes = $Attributes_QB;
    }
    if (in_array($pos, array('HB1', 'HB2', 'HB3'))) {
        $Display_Attributes = $Attributes_HB;
    }
    if (in_array($pos, array('FB1', 'FB2'))) {
        $Display_Attributes = $Attributes_FB;
    }
    if (in_array($pos, array('WR1', 'WR2', 'WR3', 'WR4'))) {
        $Display_Attributes = $Attributes_WR;
    }
    if (in_array($pos, array('TE1', 'TE2'))) {
        $Display_Attributes = $Attributes_TE;
    }
    if (in_array($pos, array("LT1", "LT2", "RT1", "RT2"))) {
        $Display_Attributes = $Attributes_T;
    }
    if (in_array($pos, array("LG1", "LG2", "C1", "C2", "RG1", "RG2"))) {
        $Display_Attributes = $Attributes_GC;
    }
    if (in_array($pos, array("LE1", "RE1", "LE2", "RE2"))) {
        $Display_Attributes = $Attributes_DE;
    }
    if (in_array($pos, array("DT1", "DT2"))) {
        $Display_Attributes = $Attributes_DT;
    }
    if (in_array($pos, array("LOLB1", "ROLB1", "LOLB2", "ROLB2"))) {
        $Display_Attributes = $Attributes_OLB;
    }
    if (in_array($pos, array("MLB1", "MLB2"))) {
        $Display_Attributes = $Attributes_MLB;
    }
    if (in_array($pos, array("CB1", "CB2", "CB3", "CB4"))) {
        $Display_Attributes = $Attributes_CB;
    }
    if (in_array($pos, array("FS1", "FS2"))) {
        $Display_Attributes = $Attributes_FS;
    }
    if (in_array($pos, array("SS1", "SS2"))) {
        $Display_Attributes = $Attributes_SS;
    }
    if (in_array($pos, array('K1'))) {
        $Display_Attributes = $Attributes_K;
    }
    if (in_array($pos, array('P1'))) {
        $Display_Attributes = $Attributes_P;
    }
    if (in_array($pos, array('KR', 'PR'))) {
        $Display_Attributes = $Attributes_KR;
    }

    $details_result = db_query("SELECT * FROM `franchise_year_roster` WHERE Year='{$View_Year}' and Position='{$pos}' and Team='{$Curr_Team}'");
    $details_Row = $details_result->fetch_assoc();

    $position_Historical_ID = $details_Row['Historical_ID'];

    echo '
    
    <div class="modal fade rememberModal" id="detail' . $pos . 'Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="text-align:center">' . $pos . ' Details | ' . strtoupper($Curr_Team) . ' - Year: ' . $View_Year . ' | ' . $details_Row['Name'] . '</h4>
                </div>
                <div class="modal-body" style="text-align:center">
                <form role="form" name="' . $pos . '_details" class="playerAtrributeForm">
                    <h3>Attributes</h3>
                    <table class="table table-condensed" style="text-align: left; font-size: small">
                        <tr><td></td>';
    foreach ($Display_Attributes as $Attr) {
        echo '<td>' . $Attr . '</td>';
    }
    echo '</tr>';
    $i = 0;
    $previousValues = array();

    $attrDisplay_result = db_query("SELECT * FROM `franchise_info` WHERE Franchise='{$Curr_Team}'");
    $attrDisplay_Row = $attrDisplay_result->fetch_assoc();
    $attrDisplay = $attrDisplay_Row['AttrDisplay'];

    $historical_result = db_query("SELECT * FROM `franchise_year_roster` WHERE (Historical_ID='{$position_Historical_ID}') AND (`Year` >= {$attrDisplay}) ORDER BY Year ASC");

    $lowestYear_result = db_query("SELECT * FROM `franchise_year_roster` WHERE (Historical_ID='{$position_Historical_ID}') AND (`Year` >= {$attrDisplay}) ORDER BY Year ASC LIMIT 1");
    $lowestYear_Row = $lowestYear_result->fetch_assoc();
    $lowestYear = $lowestYear_Row['Year'];

    while ($histAttr_Row = $historical_result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>Year ', $histAttr_Row['Year'], ': </td>';
        foreach ($Display_Attributes as $Attr) {
            if ($Attr === 'Age' || $Attr === 'Position') {
                echo '<td>' . $histAttr_Row[$Attr], '</td>';
            } else {
                echo '<td><input class="form-control attributeInput" type="text" name="player', $Attr, '[]" placeholder="', $histAttr_Row[$Attr], '" style="width: 50px">';
            }
            if ($histAttr_Row['Year'] === $attrDisplay || $histAttr_Row['Year'] === $lowestYear) {
                echo '';
            } else {
                if ($Attr === 'Age' || $Attr === 'Position') {
                    
                } else {
                    $histAttr_Change = $histAttr_Row[$Attr] - $previousValues[$i - count($Display_Attributes)];
                    if ($histAttr_Change > 0) {
                        echo '<span style="color: green"> (+' . $histAttr_Change . ')</span>';
                    } elseif ($histAttr_Change === 0) {
                        echo '<span style="color: gold"> (' . $histAttr_Change . ')</span>';
                    } else {
                        echo '<span style="color: red"> (' . $histAttr_Change . ')</span>';
                    }
                }
            }
            echo '</td>';
            $i++;
            array_push($previousValues, $histAttr_Row[$Attr]);
        }
        echo '</tr>';
        echo '<input type="hidden" name="row[]" value="', $histAttr_Row['Row_ID'], '" />';
    }
    echo '</table>
                <button type="submit" class="btn btn-success">Submit Attribute Changes</button>
                </form>';

    /* Training Camp Details Section */
    echo '<br><br><h3>Training Camp</h3>';
    $Get_TC_History = db_query("SELECT * FROM `franchise_year_trainingcamp` WHERE Player_Row='{$position_Historical_ID}' ORDER BY Year ASC");
    echo '<form role="form" name="' . $pos . '_TC" class="playerTCForm">';

    echo '<table class="table table-condensed">';
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

    echo '<label>Add Training Camp Result: </label><br>';
    echo '<select name="tc_drill" class="form-control" style="width: 200px">';
    foreach ($Drills_TC as $drill) {
        echo '<option value="', $drill, '">', $drill, '</option>';
    }
    echo '</select>&nbsp;&nbsp;&nbsp;';
    echo '<select name="selectedAttr" class="form-control" style="width: 150px">';
    foreach ($Attributes_TC as $Attr) {
        echo '<option value="', $Attr, '">', $Attr, '</option>';
    }
    echo '</select>';
    echo '&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" style="width: 250px" name="old_attr" placeholder="Enter Old Attribute Value" />';
    echo '&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" style="width: 250px" name="new_attr" placeholder="Enter New Attribute Value" />';
    echo '<br><br>';
    echo '<button type="submit" class="btn btn-success">Submit Training Camp Result</button>';

    $TC_minYear_result = db_query("SELECT Min(Year) as MinYear FROM `franchise_year_roster` WHERE Historical_ID='{$position_Historical_ID}'");
    $TC_minYear_Row = $TC_minYear_result->fetch_assoc();
    $TC_minYear = $TC_minYear_Row['MinYear'];

    $historical_result_TC = db_query("SELECT * FROM `franchise_year_roster` WHERE Historical_ID='{$position_Historical_ID}' AND Year='{$TC_minYear}'");
    $player_Row = $historical_result_TC->fetch_assoc();
    echo '<input type="hidden" name="row" value="', $player_Row['Row_ID'], '">
                <input type="hidden" name="franchise" value="', $Curr_Team, '" />
                <input type="hidden" name="year" value="', $View_Year, '" />';
    echo '</form>
                </div>
            </div>
        </div>
    </div>';
}
?>

<?php
foreach ($Positions as $pos) {

    $Rosterresult = db_query("SELECT * FROM `franchise_year_roster` where Position='" . $pos . "' and Year='{$View_Year}'");
    $RosterRow = $Rosterresult->fetch_assoc();

    /* Add Player Modal - KR/PR */
    if ($pos == 'KR' || $pos == 'PR') {

        echo '<form role="form" name="add' . $pos . '" class="addReturnerForm">
                    <div class="modal fade" id="add' . $pos . 'Modal" tabindex="-1" role="dialog" aria-labelledby="Add ' . $pos . '" aria-hidden="true">
                        <div class="modal-dialog" style="width:500px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Add ' . $pos . ' to ' . strtoupper($Curr_Team) . ' - Year: ' . $View_Year . '</h4>
                                </div>
                                <div class="modal-body">  
                                    <table class="table">
                                        <tr>
                                            <td>';
                                                
                                                echo '<select name="existingReturn" class="btn btn-xs btn-default dropdown-toggle">';
                                                $ret_positions = array();
                                                array_push($ret_positions, 'HB1', 'HB2', 'HB3','WR1','WR2','WR3','WR4','CB1','CB2','CB3','CB4','FS1','FS2','SS1','SS2');
                                                foreach ($ret_positions as $ret_pos) {
                                                $Ret_Result = db_query("SELECT * FROM `franchise_year_roster` where Position='{$ret_pos}' and Year='{$View_Year}' and Team='{$Curr_Team}'");
                                                $Ret_Row = $Ret_Result->fetch_assoc();
                                                
                                                echo '<option value=' . $Ret_Row['Row_ID'] . '>' . $ret_pos . ' - ' . $Ret_Row['Name'] . '</option>';
                                                
                                                }
                                                echo '</select>';
                                                
                                            echo '</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Overall as Returner:</label>
                                            </td>
                                            <td style="text-align:left">
                                                <input type="text" name="addOverall" size="2">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>KR Stat:</label>
                                            </td>
                                            <td style="text-align:left">
                                                <input type="text" name="addKR" size="2">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer" style="text-align:left">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Add ' . $pos . '</button>
                                    <input type="hidden" name="fran" value="' . $Curr_Team . '" />
                                    <input type="hidden" name="franYear" value="' . $View_Year . '" />
                                    <input type="hidden" name="pos" value="' . $pos . '" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';
    } else {

        echo '
                    <form role="form" name="add' . $pos . '" class="addPlayerForm">
                    <div class="modal fade" id="add' . $pos . 'Modal" tabindex="-1" role="dialog" aria-labelledby="Add ' . $pos . '" aria-hidden="true">
                        <div class="modal-dialog" style="width:500px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Add ' . $pos . ' to ' . strtoupper($Curr_Team) . ' - Year: ' . $View_Year . '</h4>
                                </div>
                                <div class="modal-body">  
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <label>Name:</label> 
                                            </td>
                                            <td style="text-align:left">
                                                <input type="text" name="addName"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Overall:</label>
                                            </td>
                                            <td style="text-align:left">
                                                <input type="text" name="addOverall" size="2">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Age:</label>
                                            </td>
                                            <td style="text-align:left">
                                                <input type="text" name="addAge"size="2">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Acquired:</label>
                                            </td>
                                            <td style="text-align:left">
                                                <select name="addOnTeam" class="btn btn-xs btn-default dropdown-toggle">
                                                    <option>On Team</option>
                                                    <option>Free Agent</option>
                                                    <option>Trade</option>
                                                    <option>Draft</option>
                                                    <option>Created</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Rookie/Vet:</label>
                                            </td>
                                            <td style="text-align:left">
                                                <select name="addVR" class="btn btn-xs btn-default dropdown-toggle">
                                                    <option value="R">Rookie</option>
                                                    <option value="">Veteran</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Weapon:</label>
                                            </td>
                                            <td style="text-align:left">
                                                <select name="addWeapon" class="btn btn-xs btn-default dropdown-toggle">
                                                    <option value="None">None</option>
                                                    <option value="CannonArm">Cannon Arm</option>
                                                    <option value="Coverage">Coverage Corner</option>
                                                    <option value="Crosshair">Precision QB</option>
                                                    <option value="Elusive">Elusive Back</option>
                                                    <option value="Power">Power Back</option>
                                                    <option value="Franchise">Franchise Player</option>
                                                    <option value="HeavyHitter">Heavy Hitter</option>
                                                    <option value="PassBlock">Pocket Protector</option>
                                                    <option value="RunBlock">Run Blocker</option>
                                                    <option value="Possession">Possession Receiver</option>
                                                    <option value="RunStopper">Run Stopper</option>
                                                    <option value="Speed">Speed Player</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Ohio State:</label>
                                            </td>
                                            <td style="text-align:left">
                                                <select name="addOSU" class="btn btn-xs btn-default dropdown-toggle">
                                                    <option></option>
                                                    <option value="Y">Buckeye</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer" style="text-align:left">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Add ' . $pos . '</button>
                                    <input type="hidden" name="fran" value="' . $Curr_Team . '" />
                                    <input type="hidden" name="franYear" value="' . $View_Year . '" />
                                    <input type="hidden" name="pos" value="' . $pos . '" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';
    }
}

//Team Stat History Tables
$Get_Stat_Identifiers = db_query("SELECT * FROM `identify_teamstat`");

while ($ID_Loop = $Get_Stat_Identifiers->fetch_assoc()) {

    $ID = $ID_Loop['Identifier'];
    $GetTeamStats = db_query("SELECT * FROM `franchise_year_teamstats` Where Team='{$Curr_Team}' and Identifier='{$ID}' ORDER BY Year ASC");

    echo '<div id="', $ID_Loop['Identifier'], 'HistoryTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    echo '<tr><td></td><td>Value</td><td>NFL Rank</td><td></td></tr>';

    $i = 0;
    $prev_value = 0;
    $ID_Row_Count = mysqli_num_rows($GetTeamStats);

    while ($historyRow = $GetTeamStats->fetch_assoc()) {

        if ($historyRow['Value'] === '') {
            
        } else {
            echo '<tr>'
            . '<td>Year: ', $historyRow['Year'], '</td>'
            . '<td>', $historyRow['Value'], '</td>'
            . '<td>', $historyRow['Rank'], '</td>'
            . '<td style="text-align: center">';
            if ($i === 0) {
                echo '-';
            } else {
                $Value_Change = $historyRow['Value'] - $prev_value;
                if ($Value_Change > 0) {
                    echo '<span style="color: green">( +' . $Value_Change . ' )</span>';
                } else {
                    echo '<span style="color: red">( ' . $Value_Change . ' )</span>';
                }
            }
            $i++;
            $prev_value = $historyRow['Value'];
            echo'</td>'
            . '</tr>';
        }
    }

    echo '</table>
         </div>';
}

//Passing History Tables
$GetPassStats = db_query("SELECT * FROM `franchise_year_indv_passing` Where Team='{$Curr_Team}' AND Year='{$View_Year}'");

while ($playerRow = $GetPassStats->fetch_assoc()) {

    echo '<div id="', $playerRow['Row'], 'PassTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    $GetPlayerHistory = db_query("Select * From `franchise_year_indv_passing` Where `Historical_ID`={$playerRow['Historical_ID']} ORDER BY `Year` ASC");

    echo '<tr><td></td><td>Passer Rating</td><td>Passing Yards</td><td>Passing TDs</td><td>Interceptions</td><td>Completion %</td><td>Times Sacked</td></tr>';

    while ($passHistoryRow = $GetPlayerHistory->fetch_assoc()) {

        echo '<tr>'
        . '<td>Year: ', $passHistoryRow['Year'], '</td>'
        . '<td>', $passHistoryRow['Rating'], '</td>'
        . '<td>', $passHistoryRow['Yards'], '</td>'
        . '<td>', $passHistoryRow['TDs'], '</td>'
        . '<td>', $passHistoryRow['INTs'], '</td>'
        . '<td>', $passHistoryRow['Comp'], '</td>'
        . '<td>', $passHistoryRow['Sacked'], '</td>';

        echo '</tr>';
    }

    echo '</table>
         </div>';
}
?>

<?php
$pass_positions = array();
array_push($pass_positions, 'QB1', 'QB2');
?>

<div class="modal fade" id="addPassModal" tabindex="-1" role="dialog" aria-labelledby="Add Passing Stats Row" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Passing Stats Row</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="addPassStat" action="../libs/ajax/franchise_view/indvstats/add_franchise_indv_pass.php" method="POST">
                    <table class="table" id="addPassTable" style="font-size: smaller; text-align: left;">
                        <tr>
                            <td>Player</td><td>Passer Rating</td><td>Passing Yards</td><td>Passing TDs</td><td>Interceptions</td><td>Completion %</td><td>Times Sacked</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="passer" class="btn btn-xs btn-default dropdown-toggle">
                                    <!-- Add Passer Block -->
<?php
foreach ($pass_positions as $pos) {
    $Rosterresult = db_query("SELECT * FROM `franchise_year_roster` where Position='{$pos}' and Year='{$View_Year}' and Team='{$Curr_Team}'");
    $RosterRow = $Rosterresult->fetch_assoc();
    echo '<option value=' . $RosterRow['Row_ID'] . '>' . $pos . ' - ' . $RosterRow['Name'] . '</option>';
}
?>
                                </select>
                            </td>
                            <td>
                                <input name="passRating" type="text" />
                            </td>
                            <td>
                                <input name="passYards" type="text" />
                            </td>
                            <td>
                                <input name="passTDs" type="text" />
                            </td>
                            <td>
                                <input name="passINTs" type="text" />
                            </td>
                            <td>
                                <input name="passComp" type="text" />
                            </td>
                            <td>
                                <input name="passSacked" type="text" />
                            </td>
                        </tr>
                    </table>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Passer</button>
                    <input type="hidden" name="franchise" value=<?php echo $Curr_Team ?> />
                    <input type="hidden" name="franYear" value=<?php echo $View_Year ?> />
                </form> 
            </div>             
        </div>
    </div>
</div>

<?php
$GetRushStats = db_query("SELECT * FROM `franchise_year_indv_rushing` Where Team='{$Curr_Team}' AND Year='{$View_Year}'");

while ($playerRow = $GetRushStats->fetch_assoc()) {

    echo '<div id="', $playerRow['Row'], 'RushTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    $GetPlayerHistory = db_query("Select * From `franchise_year_indv_rushing` Where `Historical_ID`={$playerRow['Historical_ID']} ORDER BY `Year` ASC");

    echo '<tr><td></td><td>Rush Yards</td><td>Rush TDs</td><td>Yards Per Carry</td><td>Fumbles</td><td>Broken Tackles</td><td>Longest Run</td></tr>';

    while ($rushHistoryRow = $GetPlayerHistory->fetch_assoc()) {

        echo '<tr>'
        . '<td>Year: ', $rushHistoryRow['Year'], '</td>'
        . '<td>', $rushHistoryRow['Yards'], '</td>'
        . '<td>', $rushHistoryRow['TDs'], '</td>'
        . '<td>', $rushHistoryRow['YPC'], '</td>'
        . '<td>', $rushHistoryRow['Fumble'], '</td>'
        . '<td>', $rushHistoryRow['Broken'], '</td>'
        . '<td>', $rushHistoryRow['LongRun'], '</td>';

        echo '</tr>';
    }
    echo '</table>
         </div>';
}
?>
<?php
$rush_positions = array();
array_push($rush_positions, 'QB1', 'QB2', 'HB1', 'HB2', 'HB3', 'FB1', 'FB2');
?>

<div class="modal fade" id="addRushModal" tabindex="-1" role="dialog" aria-labelledby="Add Rushing Stats Row" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Rushing Stats Row</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="AddRushStat" action="../libs/ajax/franchise_view/indvstats/add_franchise_indv_rush.php" method="POST">
                    <table class="table" id="addRushTable" style="font-size: smaller; text-align: left;">
                        <tr>
                            <td>Player</td><td>Rush Yards</td><td>Rush TDs</td><td>Yards Per Carry</td><td>Fumbles</td><td>Broken Tackles</td><td>Longest Run</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="rusher" class="btn btn-xs btn-default dropdown-toggle">
                                    <!-- Add Rusher Block -->
<?php
foreach ($rush_positions as $pos) {
    $Rosterresult = db_query("SELECT * FROM `franchise_year_roster` where Position='{$pos}' and Year='{$View_Year}' and Team='{$Curr_Team}'");
    $RosterRow = $Rosterresult->fetch_assoc();
    echo '<option value=' . $RosterRow['Row_ID'] . '>' . $pos . ' - ' . $RosterRow['Name'] . '</option>';
}
?>
                                </select>
                            </td>
                            <td>
                                <input name="rushYards" type="text" />
                            </td>
                            <td>
                                <input name="rushTDs" type="text" />
                            </td>
                            <td>
                                <input name="rushYPC" type="text" />
                            </td>
                            <td>
                                <input name="rushFumbles" type="text" />
                            </td>
                            <td>
                                <input name="rushBroken" type="text" />
                            </td>
                            <td>
                                <input name="rushLong" type="text" />
                            </td>
                        </tr>
                    </table>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Rusher</button>
                    <input type="hidden" name="franchise" value=<?php echo $Curr_Team ?> />
                    <input type="hidden" name="franYear" value=<?php echo $View_Year ?> />
                </form> 
            </div>             
        </div>
    </div>
</div>

<?php
//Receiving History Tables
$getRecStats = db_query("Select * From `franchise_year_indv_rec` Where Team='{$Curr_Team}' AND Year='{$View_Year}'");

while ($playerRow = $getRecStats->fetch_assoc()) {

    echo '<div id="', $playerRow['Row'], 'RecTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    $GetPlayerHistory = db_query("Select * From `franchise_year_indv_rec` Where `Historical_ID`={$playerRow['Historical_ID']} ORDER BY `Year` ASC");

    echo '<tr><td></td><td>Receptions</td><td>Receiving Yards</td><td>Receiving TDs</td><td>Yards Per Catch</td><td>Longest Catch</td><td>Drops</td></tr>';

    while ($recHistoryRow = $GetPlayerHistory->fetch_assoc()) {

        echo '<tr>'
        . '<td>Year: ', $recHistoryRow['Year'], '</td>'
        . '<td>', $recHistoryRow['Rec'], '</td>'
        . '<td>', $recHistoryRow['Yards'], '</td>'
        . '<td>', $recHistoryRow['TDs'], '</td>'
        . '<td>', $recHistoryRow['YPC'], '</td>'
        . '<td>', $recHistoryRow['LongCatch'], '</td>'
        . '<td>', $recHistoryRow['Drops'], '</td>';

        echo '</tr>';
    }
    echo '</table>
         </div>';
}
?>

<?php
$rec_positions = array();
array_push($rec_positions, 'WR1', 'WR2', 'WR3', 'WR4', 'HB1', 'HB2', 'HB3', 'TE1', 'TE2', 'FB1', 'FB2');
?>

<div class="modal fade" id="addRecModal" tabindex="-1" role="dialog" aria-labelledby="Add Receiving Stats Row" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Receiving Stats Row</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="AddRecStat" action="../libs/ajax/franchise_view/indvstats/add_franchise_indv_rec.php" method="POST">
                    <table class="table" id="addRecTable" style="font-size: smaller; text-align: left;">
                        <tr>
                            <td>Player</td><td>Receptions</td><td>Receiving Yards</td><td>Receiving TDs</td><td>Yards Per Catch</td><td>Longest Catch</td><td>Drops</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="receiver" class="btn btn-xs btn-default dropdown-toggle">
                                    <!-- Add Receiving Block -->
<?php
foreach ($rec_positions as $pos) {
    $Rosterresult = db_query("SELECT * FROM `franchise_year_roster` where Position='{$pos}' and Year='{$View_Year}' and Team='{$Curr_Team}'");
    $RosterRow = $Rosterresult->fetch_assoc();
    echo '<option value=' . $RosterRow['Row_ID'] . '>' . $pos . ' - ' . $RosterRow['Name'] . '</option>';
}
?>
                                </select>
                            </td>
                            <td>
                                <input name="recRec" type="text" />
                            </td>
                            <td>
                                <input name="recYards" type="text" />
                            </td>
                            <td>
                                <input name="recTDs" type="text" />
                            </td>
                            <td>
                                <input name="recYPC" type="text" />
                            </td>
                            <td>
                                <input name="recLong" type="text" />
                            </td>
                            <td>
                                <input name="recDrop" type="text" />
                            </td>
                        </tr>
                    </table>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Receiver</button>
                    <input type="hidden" name="franchise" value=<?php echo $Curr_Team ?> />
                    <input type="hidden" name="franYear" value=<?php echo $View_Year ?> />
                </form> 
            </div>             
        </div>
    </div>
</div>

<?php
//Blocking History Tables
$getBlockStats = db_query("Select * From `franchise_year_indv_block` Where Team='{$Curr_Team}' AND Year='{$View_Year}'");

while ($playerRow = $getBlockStats->fetch_assoc()) {

    echo '<div id="', $playerRow['Row'], 'BlockTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    $GetPlayerHistory = db_query("Select * From `franchise_year_indv_block` Where `Historical_ID`={$playerRow['Historical_ID']} ORDER BY `Year` ASC");

    echo '<tr><td></td><td>Pancakes</td><td>Sacks Allowed</td></tr>';

    while ($blockHistoryRow = $GetPlayerHistory->fetch_assoc()) {

        echo '<tr>'
        . '<td>Year: ', $blockHistoryRow['Year'], '</td>'
        . '<td>', $blockHistoryRow['Pancakes'], '</td>'
        . '<td>', $blockHistoryRow['Sacks'], '</td>';
        echo '</tr>';
    }
    echo '</table>
         </div>';
}
?>

<?php
$block_positions = array();
array_push($block_positions, 'LT1', 'LT2', 'LG1', 'LG2', 'C1', 'C2', 'RG1', 'RG2', 'RT1', 'RT2');
?>

<div class="modal fade" id="addBlockModal" tabindex="-1" role="dialog" aria-labelledby="Add Blocking Stats Row" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Blocking Stats Row</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="AddRecStat" action="../libs/ajax/franchise_view/indvstats/add_franchise_indv_block.php" method="POST">
                    <table class="table" id="addRecTable" style="font-size: smaller; text-align: left;">
                        <tr>
                            <td>Player</td><td>Position</td><td>Pancakes</td><td>Sacks Allowed</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="blocker" class="btn btn-xs btn-default dropdown-toggle">
                                    <!-- Add Receiving Block -->
<?php
foreach ($block_positions as $pos) {
    $Rosterresult = db_query("SELECT * FROM `franchise_year_roster` where Position='{$pos}' and Year='{$View_Year}' and Team='{$Curr_Team}'");
    $RosterRow = $Rosterresult->fetch_assoc();
    echo '<option value=' . $RosterRow['Row_ID'] . '>' . $pos . ' - ' . $RosterRow['Name'] . '</option>';
}
?>
                                </select>
                            </td>
                            <td>
                                <select name="blockPosition" class="btn btn-xs btn-default dropdown-toggle">
                                    <option value="Right Tackle">Right Tackle</option>
                                    <option value="Right Gaurd">Right Guard</option>
                                    <option value="Center">Center</option>
                                    <option value="Left Guard">Left Guard</option>
                                    <option value="Left Tackle">Left Tackle</option>
                                </select>
                            </td>
                            <td>
                                <input name="blockPancakes" type="text" />
                            </td>
                            <td>
                                <input name="blockSacks" type="text" />
                            </td>
                        </tr>
                    </table>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Blocker</button>
                    <input type="hidden" name="franchise" value=<?php echo $Curr_Team ?> />
                    <input type="hidden" name="franYear" value=<?php echo $View_Year ?> />
                </form> 
            </div>             
        </div>
    </div>
</div>

<?php
//Receiving History Tables
$getDefStats = db_query("Select * From `franchise_year_indv_def` Where Team='{$Curr_Team}' AND Year='{$View_Year}'");

while ($playerRow = $getDefStats->fetch_assoc()) {

    echo '<div id="', $playerRow['Row'], 'DefTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    $GetPlayerHistory = db_query("Select * From `franchise_year_indv_def` Where `Historical_ID`={$playerRow['Historical_ID']} ORDER BY `Year` ASC");

    echo '<tr><td></td><td>Tackles</td><td>Tackles For Loss</td><td>Sacks</td><td>INTs</td><td>TDs</td><td>Saftey</td></tr>';

    while ($defHistoryRow = $GetPlayerHistory->fetch_assoc()) {

        echo '<tr>'
        . '<td>Year: ', $defHistoryRow['Year'], '</td>'
        . '<td>', $defHistoryRow['Tackles'], '</td>'
        . '<td>', $defHistoryRow['ForLoss'], '</td>'
        . '<td>', $defHistoryRow['Sacks'], '</td>'
        . '<td>', $defHistoryRow['INTs'], '</td>'
        . '<td>', $defHistoryRow['TDs'], '</td>'
        . '<td>', $defHistoryRow['Safety'], '</td>';

        echo '</tr>';
    }
    echo '</table>
         </div>';
}
?>

<?php
$def_positions = array();
array_push($def_positions, 'LE1', 'LE2', 'DT1', 'DT2', 'RE1', 'RE2', 'LOLB1', 'LOLB2', 'MLB1', 'MLB2', 'ROLB1', 'ROLB2', 'CB1', 'CB2', 'CB3', 'CB4', 'FS1', 'FS2', 'SS1', 'SS2');
?>

<div class="modal fade" id="addDefModal" tabindex="-1" role="dialog" aria-labelledby="Add Defensive Stats Row" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Defensive Stats Row</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="AddDefStat" action="../libs/ajax/franchise_view/indvstats/add_franchise_indv_def.php" method="POST">
                    <table class="table" id="addDefTable" style="font-size: smaller; text-align: left;">
                        <tr>
                            <td>Player</td><td>Position</td><td>Tackles</td><td>Tackles for Loss</td><td>Sacks</td><td>INTs</td><td>TDs</td><td>Safety</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="defense" class="btn btn-xs btn-default dropdown-toggle">
                                    <!-- Add Receiving Block -->
<?php
foreach ($def_positions as $pos) {
    $Rosterresult = db_query("SELECT * FROM `franchise_year_roster` where Position='{$pos}' and Year='{$View_Year}' and Team='{$Curr_Team}'");
    $RosterRow = $Rosterresult->fetch_assoc();
    echo '<option value=' . $RosterRow['Row_ID'] . '>' . $pos . ' - ' . $RosterRow['Name'] . '</option>';
}
?>
                                </select>
                            </td>
                            <td>
                                <select name="defPosition" class="btn btn-xs btn-default dropdown-toggle">
                                    <option value="LE">LE</option>
                                    <option value="RE">RE</option>
                                    <option value="DT">DT</option>
                                    <option value="LOLB">LOLB</option>
                                    <option value="MLB">MLB</option>
                                    <option value="ROLB">ROLB</option>
                                    <option value="CB">CB</option>
                                    <option value="FS">FS</option>
                                    <option value="SS">SS</option>
                                </select>
                            </td>
                            <td>
                                <input name="defTackles" type="text" size="5"/>
                            </td>
                            <td>
                                <input name="defForLoss" type="text" size="5" />
                            </td>
                            <td>
                                <input name="defSacks" type="text" size="5" />
                            </td>
                            <td>
                                <input name="defINTs" type="text" size="5" />
                            </td>
                            <td>
                                <input name="defTDs" type="text" size="5" />
                            </td>
                            <td>
                                <input name="defSafety" type="text" size="5" />
                            </td>
                        </tr>
                    </table>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Defensive Player</button>
                    <input type="hidden" name="franchise" value=<?php echo $Curr_Team ?> />
                    <input type="hidden" name="franYear" value=<?php echo $View_Year ?> />
                </form> 
            </div>             
        </div>
    </div>
</div>


<?php
//Special Teams History Tables
$GetPlayers = db_query("Select * From `franchise_year_indv_st` Where Team='{$Curr_Team}' AND Year='{$View_Year}'");

while ($playerRow = $GetPlayers->fetch_assoc()) {

    if ($playerRow['Category'] === 'Kicking') {

        echo '<div id="', $playerRow['Row'], 'ST-Table" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

        $GetPlayerHistory = db_query("Select * From `franchise_year_indv_st` Where `Historical_ID`={$playerRow['Historical_ID']} ORDER BY `Year` ASC");

        echo '<tr><td>Player</td><td>Field Goals Attempted</td><td>Field Goals Made</td><td>Field Goal Percent</td><td>Longest Made</td></tr>';

        while ($STHistoryRow = $GetPlayerHistory->fetch_assoc()) {

            echo '<tr>'
            . '<td>Year: ', $STHistoryRow['Year'], '</td>'
            . '<td>', $STHistoryRow['FGA'], '</td>'
            . '<td>', $STHistoryRow['FGM'], '</td>'
            . '<td>', $STHistoryRow['FG_Percent'], '</td>'
            . '<td>', $STHistoryRow['Longest_Play'], '</td>';

            echo '</tr>';
        }
        echo '</table>
         </div>';
    }

    if ($playerRow['Category'] === 'Punting') {

        echo '<div id="', $playerRow['Row'], 'ST-Table" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

        $GetPlayerHistory = db_query("Select * From `franchise_year_indv_st` Where `Historical_ID`={$playerRow['Historical_ID']}");

        echo '<tr><td>Player</td><td>Punt Average</td><td>Punts Inside the 20</td></tr>';

        while ($STHistoryRow = $GetPlayerHistory->fetch_assoc()) {

            echo '<tr>'
            . '<td>Year: ', $STHistoryRow['Year'], '</td>'
            . '<td>', $STHistoryRow['Punt_AVG'], '</td>'
            . '<td>', $STHistoryRow['I20'], '</td>';

            echo '</tr>';
        }
        echo '</table>
         </div>';
    }

    if ($playerRow['Category'] === 'KR') {

        echo '<div id="', $playerRow['Row'], 'ST-Table" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

        $GetPlayerHistory = db_query("Select * From `franchise_year_indv_st` Where `Historical_ID`={$playerRow['Historical_ID']}");

        echo '<tr><td>Player</td><td>Return Average</td><td>Return TDs</td><td>Longest Return</td></tr>';

        while ($STHistoryRow = $GetPlayerHistory->fetch_assoc()) {

            echo '<tr>'
            . '<td>Year: ', $STHistoryRow['Year'], '</td>'
            . '<td>', $STHistoryRow['Ret_AVG'], '</td>'
            . '<td>', $STHistoryRow['Ret_TDs'], '</td>'
            . '<td>', $STHistoryRow['Longest_Play'], '</td>';

            echo '</tr>';
        }
        echo '</table>
         </div>';
    }

    if ($playerRow['Category'] === 'PR') {

        echo '<div id="', $playerRow['Row'], 'ST-Table" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

        $GetPlayerHistory = db_query("Select * From `franchise_year_indv_st` Where `Historical_ID`={$playerRow['Historical_ID']}");

        echo '<tr><td>Player</td><td>Return Average</td><td>Return TDs</td><td>Longest Return</td></tr>';

        while ($STHistoryRow = $GetPlayerHistory->fetch_assoc()) {

            echo '<tr>'
            . '<td>Year: ', $STHistoryRow['Year'], '</td>'
            . '<td>', $STHistoryRow['Ret_AVG'], '</td>'
            . '<td>', $STHistoryRow['Ret_TDs'], '</td>'
            . '<td>', $STHistoryRow['Longest_Play'], '</td>';

            echo '</tr>';
        }
        echo '</table>
         </div>';
    }
}
?>
<?php
$st_positions = array();
array_push($st_positions, 'K1', 'P1', 'KR', 'PR');
?>

<div class="modal fade" id="addSTModal" tabindex="-1" role="dialog" aria-labelledby="Add Special Teams Stats Row" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Special Teams Stats Row</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="AddSTStat" action="../libs/ajax/franchise_view/indvstats/add_franchise_indv_st.php" method="POST">
                    <table class="table" id="addRecTable" style="font-size: smaller; text-align: left;">
                        <tr>
                            <td>Player</td><td>Category</td><td>FGA</td><td>FGM</td><td>FG Percent</td><td>Longest Play</td><td>Punt Average</td><td>Inside 20</td><td>Return Average</td><td>Return TDs</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="specialTeams" class="btn btn-xs btn-default dropdown-toggle">
                                    <!-- Add Receiving Block -->
<?php
foreach ($st_positions as $pos) {
    $Rosterresult = db_query("SELECT * FROM `franchise_year_roster` where Position='{$pos}' and Year='{$View_Year}' and Team='{$Curr_Team}'");
    $RosterRow = $Rosterresult->fetch_assoc();
    echo '<option value=' . $RosterRow['Row_ID'] . '>' . $pos . ' - ' . $RosterRow['Name'] . '</option>';
}
?>
                                </select>
                            </td>
                            <td>
                                <select id="STType" name="STType" class="btn btn-xs btn-default dropdown-toggle">
                                    <option value="Kicking">Kicking</option>
                                    <option value="Punting">Punting</option>
                                    <option value="KR">Kick Return</option>
                                    <option value="PR">Punt Return</option>
                                </select>
                            </td>
                            <td>
                                <input name="stFGA" class="kickingCategory" type="text" size="5" />
                            </td>
                            <td>
                                <input name="stFGM" class="kickingCategory" type="text" size="5" />
                            </td>
                            <td>
                                <input name="stFGPercent" class="kickingCategory" type="text" size="5" />
                            </td>
                            <td>
                                <input name="stLong" class="longestPlay" type="text" placeholder="Longest Field Goal" size="20" />
                            </td>
                            <td>
                                <input name="stPAVG" class="puntingCategory" type="text" size="5" disabled/>
                            </td>
                            <td>
                                <input name="stI20" class="puntingCategory" type="text" size="5" disabled/>
                            </td>
                            <td>
                                <input name="stRetAVG" class="retCategory" type="text" size="5" disabled/>
                            </td>
                            <td>
                                <input name="stRetTDs" class="retCategory" type="text" size="5" disabled/>
                            </td>
                        </tr>
                    </table>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Special Team's Player</button>
                    <input type="hidden" name="franchise" value=<?php echo $Curr_Team ?> />
                    <input type="hidden" name="franYear" value=<?php echo $View_Year ?> />
                </form> 
            </div>             
        </div>
    </div>
</div>

<?php
//Award History Tables
$getAwards = db_query("Select * From `franchise_year_awards` Where Year='{$View_Year}' and Team='{$Curr_Team}'");

while ($playerRow = $getAwards->fetch_assoc()) {

    echo '<div id="', $playerRow['Row'], 'AwardTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: left">';

    $GetPlayerHistory = db_query("Select * From `franchise_year_awards` Where `Historical_ID`={$playerRow['Historical_ID']} ORDER BY `Year` ASC");





    echo '<tr><td></td><td>Award</td></tr>';

    while ($awardHistoryRow = $GetPlayerHistory->fetch_assoc()) {

        echo '<tr>'
        . '<td>Year: ', $awardHistoryRow['Year'], '</td>'
        . '<td style="text-align: left">', $awardHistoryRow['Award'], '</td>';

        echo '</tr>';
    }

    echo '</table>
         </div>';
}
?>

<!-- Add Award Modal -->
<div class="modal fade editModal" id="addYearAward">
    <div class="modal-dialog" style="width : 600px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Yearly Award for <?php echo strtoupper($Curr_Team) . " - Year: " . $View_Year; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" name="addAward" action="../libs/ajax/franchise_view/awards/add_franchise_award.php" method="post">
                    <div class="form-group">
                        <table class="table" id="addPassTable" style="font-size: smaller; text-align: left;">
                            <tr>
                                <td>Player</td><td>Position</td><td>Award</td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="player" class="btn btn-xs btn-default dropdown-toggle">
<?php
foreach ($Positions as $pos) {
    $Rosterresult = db_query("SELECT * FROM `franchise_year_roster` where Position='" . $pos . "' and Year='{$View_Year}' and Team='{$Curr_Team}'");
    $RosterRow = $Rosterresult->fetch_assoc();
    echo '<option value=' . $RosterRow['Row_ID'] . '>' . $pos . ' - ' . $RosterRow['Name'] . '</option>';
}
?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pos" class="btn btn-xs btn-default dropdown-toggle">
                                        <option value="QB">QB</option>
                                        <option value="HB">HB</option>
                                        <option value="FB">FB</option>
                                        <option value="WR">WR</option>
                                        <option value="TE">TE</option>
                                        <option value="LT">LT</option>
                                        <option value="LG">LG</option>
                                        <option value="C">C</option>
                                        <option value="RG">RG</option>
                                        <option value="RT">RT</option>
                                        <option value="LE">LE</option>
                                        <option value="RE">RE</option>
                                        <option value="DT">DT</option>
                                        <option value="LOLB">LOLB</option>
                                        <option value="MLB">MLB</option>
                                        <option value="ROLB">ROLB</option>
                                        <option value="CB">CB</option>
                                        <option value="FS">FS</option>
                                        <option value="SS">SS</option>
                                        <option value="K">K</option>
                                    </select>
                                </td>
                                <td>
                                    <input name="award" type="text" />
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="fran" value=<?php echo $Curr_Team; ?> />
                        <input type="hidden" name="franYear" value=<?php echo $View_Year; ?> />
                        <div class="form-group" style="text-align: left">
                            <button type="submit" class="btn btn-success">Add Award</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Add Probowl Modal -->
<div class="modal fade editModal" id="addProbowl">
    <div class="modal-dialog" style="width : 600px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Probowl Player for <?php echo strtoupper($Curr_Team) . " - Year: " . $View_Year; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" name="addProbowl" action="../libs/ajax/franchise_view/awards/add_franchise_probowl.php" method="post">
                    <div class="form-group">
                        <table class="table" id="addPassTable" style="font-size: smaller; text-align: left;">
                            <tr>
                                <td>Player</td><td>Position</td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="player" class="btn btn-xs btn-default dropdown-toggle">
<?php
foreach ($Positions as $pos) {
    $Rosterresult = db_query("SELECT * FROM `franchise_year_roster` where Position='" . $pos . "' and Year='{$View_Year}' AND Team='{$Curr_Team}'");
    $RosterRow = $Rosterresult->fetch_assoc();
    echo '<option value=' . $RosterRow['Row_ID'] . '>' . $pos . ' - ' . $RosterRow['Name'] . '</option>';
}
?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pos" class="btn btn-xs btn-default dropdown-toggle">
                                        <option value="QB">QB</option>
                                        <option value="HB">HB</option>
                                        <option value="FB">FB</option>
                                        <option value="WR">WR</option>
                                        <option value="TE">TE</option>
                                        <option value="LT">LT</option>
                                        <option value="LG">LG</option>
                                        <option value="C">C</option>
                                        <option value="RG">RG</option>
                                        <option value="RT">RT</option>
                                        <option value="LE">LE</option>
                                        <option value="RE">RE</option>
                                        <option value="DT">DT</option>
                                        <option value="LOLB">LOLB</option>
                                        <option value="MLB">MLB</option>
                                        <option value="ROLB">ROLB</option>
                                        <option value="CB">CB</option>
                                        <option value="FS">FS</option>
                                        <option value="SS">SS</option>
                                        <option value="K">K</option>
                                        <option value="KR">KR</option>
                                        <option value="PR">PR</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="fran" value=<?php echo $Curr_Team; ?> />
                        <input type="hidden" name="franYear" value=<?php echo $View_Year; ?> />
                        <div class="form-group" style="text-align: left">
                            <button type="submit" class="btn btn-success">Add Probowl Player</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
//Pro Bowl History Tables
$getProbowl = db_query("Select * From `franchise_year_probowl` Where Year='{$View_Year}' AND Team='{$Curr_Team}'");

while ($playerRow = $getProbowl->fetch_assoc()) {

    echo '<div id="', $playerRow['Row'], 'ProBowlTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    $historical_ID = $playerRow['Historical_ID'];
    $GetPlayerHistory = db_query("Select * From `franchise_year_probowl` Where `Historical_ID`='{$historical_ID}' ORDER BY `Year` ASC");
    $GetNumRows = $GetPlayerHistory->num_rows;

    echo '<tr><td>Years Elected to Pro Bowl</td></tr>';

    while ($probowlHistoryRow = $GetPlayerHistory->fetch_assoc()) {

        echo '<tr>'
        . '<td>Year: ', $probowlHistoryRow['Year'], '</td>'
        . '</tr>';
    }
    echo '<tr><td>Number of Pro Bowls: ', $GetNumRows, '</td></tr>';

    echo '</table>
         </div>';
}

//Off Coach History Tables
$GetCoaches = db_query("Select * From `franchise_year_off_coach` Where Year='{$View_Year}' AND Team='{$Curr_Team}' ORDER BY Year DESC");

while ($coachRow = $GetCoaches->fetch_assoc()) {

    echo '<div id="', $coachRow['Row'], 'CoachCHGTable" style="display: none">
            <table class="table text-nowrap" style="font-size: smaller; text-align: center">';

    $GetCoachHistory = db_query("Select * From `franchise_year_off_coach` Where `Historical_ID`={$coachRow['Historical_ID']} AND Team='{$Curr_Team}' ORDER BY `Year` ASC");

    echo '<tr><td></td>
              <td>Age</td>
              <td>Change</td>
              <td>MOT</td>
              <td>ETH</td>
              <td>CHM</td>
              <td>KNO</td>
              <td>OFF</td>
              <td>DEF</td>
              <td>OL</td>
              <td>QB</td>
              <td>HB</td>
              <td>WR</td>
              <td>DL</td>
              <td>LB</td>
              <td>DB</td>
              <td>S</td>
              <td>K</td>
              <td>P</td>
              </tr>';

    while ($historyRow = $GetCoachHistory->fetch_assoc()) {

        if ($historyRow['Year'] === '1') {
            echo '<tr>',
            '<td>Year: ', $historyRow['Year'], '</td>',
            '<td>', $historyRow['Age'], '</td>',
            '<td>', $historyRow['Chg'], '</td>',
            '<td>', $historyRow['Moto'], '</td>',
            '<td>', $historyRow['Eth'], '</td>',
            '<td>', $historyRow['Chem'], '</td>',
            '<td>', $historyRow['Kno'], '</td>',
            '<td>', $historyRow['Off'], '</td>',
            '<td>', $historyRow['Def'], '</td>',
            '<td>', $historyRow['OL'], '</td>',
            '<td>', $historyRow['QB'], '</td>',
            '<td>', $historyRow['RB'], '</td>',
            '<td>', $historyRow['WR'], '</td>',
            '<td>', $historyRow['DL'], '</td>',
            '<td>', $historyRow['LB'], '</td>',
            '<td>', $historyRow['DB'], '</td>',
            '<td>', $historyRow['S'], '</td>',
            '<td>', $historyRow['K'], '</td>',
            '<td>', $historyRow['P'], '</td>',
            '</tr>';
        }

        if ($historyRow['Year'] != '1') {

            $previousYear = $historyRow['Year'] - 1;
            $GetPreviousYear = db_query("Select * From `franchise_year_off_coach` Where Year='{$previousYear}' AND Team='{$Curr_Team}' and `Historical_ID`={$coachRow['Historical_ID']}");
            $previousRow = $GetPreviousYear->fetch_assoc();

            echo '<tr>',
            '<td>Year: ', $historyRow['Year'], '</td>',
            '<td>', $historyRow['Age'], '</td>',
            '<td>', $historyRow['Chg'], '</td>';

            $motoChg = $historyRow['Moto'] - $previousRow['Moto'];
            if ($motoChg < 0) {
                echo '<td>', $historyRow['Moto'], ' <span style="color:red">(', $motoChg, ')</span></td>';
            } else if ($motoChg === 0) {
                echo '<td>', $historyRow['Moto'], ' <span style="color:gold">(', $motoChg, ')</span></td>';
            } else if ($motoChg > 0) {
                echo '<td>', $historyRow['Moto'], ' <span style="color:green">(+', $motoChg, ')</span></td>';
            }

            $ethChg = $historyRow['Eth'] - $previousRow['Eth'];
            if ($ethChg < 0) {
                echo '<td>', $historyRow['Eth'], ' <span style="color:red">(', $ethChg, ')</span></td>';
            } else if ($ethChg === 0) {
                echo '<td>', $historyRow['Eth'], ' <span style="color:gold">(', $ethChg, ')</span></td>';
            } else if ($ethChg > 0) {
                echo '<td>', $historyRow['Eth'], ' <span style="color:green">(+', $ethChg, ')</span></td>';
            }

            $chemChg = $historyRow['Chem'] - $previousRow['Chem'];
            if ($chemChg < 0) {
                echo '<td>', $historyRow['Chem'], ' <span style="color:red">(', $chemChg, ')</span></td>';
            } else if ($chemChg === 0) {
                echo '<td>', $historyRow['Chem'], ' <span style="color:gold">(', $chemChg, ')</span></td>';
            } else if ($chemChg > 0) {
                echo '<td>', $historyRow['Chem'], ' <span style="color:green">(+', $chemChg, ')</span></td>';
            }

            $knoChg = $historyRow['Kno'] - $previousRow['Kno'];
            if ($knoChg < 0) {
                echo '<td>', $historyRow['Kno'], ' <span style="color:red">(', $knoChg, ')</span></td>';
            } else if ($knoChg === 0) {
                echo '<td>', $historyRow['Kno'], ' <span style="color:gold">(', $knoChg, ')</span></td>';
            } else if ($knoChg > 0) {
                echo '<td>', $historyRow['Kno'], ' <span style="color:green">(+', $knoChg, ')</span></td>';
            }

            $offChg = $historyRow['Off'] - $previousRow['Off'];
            if ($offChg < 0) {
                echo '<td>', $historyRow['Off'], ' <span style="color:red">(', $offChg, ')</span></td>';
            } else if ($offChg === 0) {
                echo '<td>', $historyRow['Off'], ' <span style="color:gold">(', $offChg, ')</span></td>';
            } else if ($offChg > 0) {
                echo '<td>', $historyRow['Off'], ' <span style="color:green">(+', $offChg, ')</span></td>';
            }

            $defChg = $historyRow['Def'] - $previousRow['Def'];
            if ($defChg < 0) {
                echo '<td>', $historyRow['Def'], ' <span style="color:red">(', $defChg, ')</span></td>';
            } else if ($defChg === 0) {
                echo '<td>', $historyRow['Def'], ' <span style="color:gold">(', $defChg, ')</span></td>';
            } else if ($defChg > 0) {
                echo '<td>', $historyRow['Def'], ' <span style="color:green">(+', $defChg, ')</span></td>';
            }

            $olChg = $historyRow['OL'] - $previousRow['OL'];
            if ($olChg < 0) {
                echo '<td>', $historyRow['OL'], ' <span style="color:red">(', $olChg, ')</span></td>';
            } else if ($olChg === 0) {
                echo '<td>', $historyRow['OL'], ' <span style="color:gold">(', $olChg, ')</span></td>';
            } else if ($olChg > 0) {
                echo '<td>', $historyRow['OL'], ' <span style="color:green">(+', $olChg, ')</span></td>';
            }

            $qbChg = $historyRow['QB'] - $previousRow['QB'];
            if ($qbChg < 0) {
                echo '<td>', $historyRow['QB'], ' <span style="color:red">(', $qbChg, ')</span></td>';
            } else if ($qbChg === 0) {
                echo '<td>', $historyRow['QB'], ' <span style="color:gold">(', $qbChg, ')</span></td>';
            } else if ($qbChg > 0) {
                echo '<td>', $historyRow['QB'], ' <span style="color:green">(+', $qbChg, ')</span></td>';
            }

            $rbChg = $historyRow['RB'] - $previousRow['RB'];
            if ($rbChg < 0) {
                echo '<td>', $historyRow['RB'], ' <span style="color:red">(', $rbChg, ')</span></td>';
            } else if ($rbChg === 0) {
                echo '<td>', $historyRow['RB'], ' <span style="color:gold">(', $rbChg, ')</span></td>';
            } else if ($rbChg > 0) {
                echo '<td>', $historyRow['RB'], ' <span style="color:green">(+', $rbChg, ')</span></td>';
            }

            $wrChg = $historyRow['WR'] - $previousRow['WR'];
            if ($wrChg < 0) {
                echo '<td>', $historyRow['WR'], ' <span style="color:red">(', $wrChg, ')</span></td>';
            } else if ($wrChg === 0) {
                echo '<td>', $historyRow['WR'], ' <span style="color:gold">(', $wrChg, ')</span></td>';
            } else if ($wrChg > 0) {
                echo '<td>', $historyRow['WR'], ' <span style="color:green">(+', $wrChg, ')</span></td>';
            }

            $dlChg = $historyRow['DL'] - $previousRow['DL'];
            if ($dlChg < 0) {
                echo '<td>', $historyRow['DL'], ' <span style="color:red">(', $dlChg, ')</span></td>';
            } else if ($dlChg === 0) {
                echo '<td>', $historyRow['DL'], ' <span style="color:gold">(', $dlChg, ')</span></td>';
            } else if ($dlChg > 0) {
                echo '<td>', $historyRow['DL'], ' <span style="color:green">(+', $dlChg, ')</span></td>';
            }

            $lbChg = $historyRow['LB'] - $previousRow['LB'];
            if ($lbChg < 0) {
                echo '<td>', $historyRow['LB'], ' <span style="color:red">(', $lbChg, ')</span></td>';
            } else if ($lbChg === 0) {
                echo '<td>', $historyRow['LB'], ' <span style="color:gold">(', $lbChg, ')</span></td>';
            } else if ($lbChg > 0) {
                echo '<td>', $historyRow['LB'], ' <span style="color:green">(+', $lbChg, ')</span></td>';
            }

            $dbChg = $historyRow['DB'] - $previousRow['DB'];
            if ($dbChg < 0) {
                echo '<td>', $historyRow['DB'], ' <span style="color:red">(', $dbChg, ')</span></td>';
            } else if ($dbChg === 0) {
                echo '<td>', $historyRow['DB'], ' <span style="color:gold">(', $dbChg, ')</span></td>';
            } else if ($dbChg > 0) {
                echo '<td>', $historyRow['DB'], ' <span style="color:green">(+', $dbChg, ')</span></td>';
            }

            $sChg = $historyRow['S'] - $previousRow['S'];
            if ($sChg < 0) {
                echo '<td>', $historyRow['S'], ' <span style="color:red">(', $sChg, ')</span></td>';
            } else if ($sChg === 0) {
                echo '<td>', $historyRow['S'], ' <span style="color:gold">(', $sChg, ')</span></td>';
            } else if ($sChg > 0) {
                echo '<td>', $historyRow['S'], ' <span style="color:green">(+', $sChg, ')</span></td>';
            }

            $kChg = $historyRow['K'] - $previousRow['K'];
            if ($kChg < 0) {
                echo '<td>', $historyRow['K'], ' <span style="color:red">(', $kChg, ')</span></td>';
            } else if ($kChg === 0) {
                echo '<td>', $historyRow['K'], ' <span style="color:gold">(', $kChg, ')</span></td>';
            } else if ($kChg > 0) {
                echo '<td>', $historyRow['K'], ' <span style="color:green">(+', $kChg, ')</span></td>';
            }

            $pChg = $historyRow['P'] - $previousRow['P'];
            if ($pChg < 0) {
                echo '<td>', $historyRow['P'], ' <span style="color:red">(', $pChg, ')</span></td>';
            } else if ($pChg === 0) {
                echo '<td>', $historyRow['P'], ' <span style="color:gold">(', $pChg, ')</span></td>';
            } else if ($pChg > 0) {
                echo '<td>', $historyRow['P'], ' <span style="color:green">(+', $pChg, ')</span></td>';
            }

            echo '</tr>';
        }
    }


    echo '</table>
         </div>';
}
?>

<!-- Add Offseason Moves Modal -->
<div class="modal fade editModal" id="addMoves">
    <div class="modal-dialog" style="width : 800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Offseason Move for <?php echo strtoupper($Curr_Team) . " - Year: " . $View_Year; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" name="addMove" action="../libs/ajax/franchise_view/off_move/add_franchise_offseason_move.php" method="post">
                    <div class="form-group">
                        <table class="table" id="addPassTable" style="font-size: smaller; text-align: left;">
                            <tr>
                                <td>Type</td><td>Player</td><td>Position</td><td>Overall</td><td>Age</td><td>Draft Position</td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="moveType" id="moveType" class="btn btn-xs btn-default dropdown-toggle">
                                        <option value="retired">Retired Player</option>
                                        <option value="prefa">Pre-Draft Free Agent</option>
                                        <option value="draft">Drafted Player</option>
                                        <option value="postfa">Post-Draft Free Agent</option>
                                    </select>
                                </td>
                                <td>
                                    <input name="freePlayer" type="text" class="freeName" />
                                    <select name="selectedPlayer" class="btn btn-xs btn-default dropdown-toggle selectName">
<?php
foreach ($Positions as $pos) {
    $grabPlayers = db_query("SELECT * FROM `franchise_year_roster` where Position='" . $pos . "' and Year='{$View_Year}' and Team='{$Curr_Team}'");
    $selPlayerRow = $grabPlayers->fetch_assoc();
    echo '<option value=' . $selPlayerRow['Row_ID'] . '>' . $pos . ' - ' . $selPlayerRow['Name'] . '</option>';
}
?>
                                    </select>
                                </td>
                                <td>
                                    <select name="pos" class="btn btn-xs btn-default dropdown-toggle off-pos">
                                        <option value="QB">QB</option>
                                        <option value="HB">HB</option>
                                        <option value="FB">FB</option>
                                        <option value="WR">WR</option>
                                        <option value="TE">TE</option>
                                        <option value="LT">LT</option>
                                        <option value="LG">LG</option>
                                        <option value="C">C</option>
                                        <option value="RG">RG</option>
                                        <option value="RT">RT</option>
                                        <option value="LE">LE</option>
                                        <option value="RE">RE</option>
                                        <option value="DT">DT</option>
                                        <option value="LOLB">LOLB</option>
                                        <option value="MLB">MLB</option>
                                        <option value="ROLB">ROLB</option>
                                        <option value="CB">CB</option>
                                        <option value="FS">FS</option>
                                        <option value="SS">SS</option>
                                        <option value="K">K</option>
                                    </select>
                                </td>
                                <td>
                                    <input name="Ovr" type="text" size="5" class="off-ovr"/>
                                </td>
                                <td>
                                    <input name="Age" type="text" size="5" class="off-age"/>
                                </td>
                                <td>
                                    <input name="Draft" type="text" size="10" placeholder="Round-Pick" class="draftMove"/>
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="fran" value=<?php echo $Curr_Team; ?> />
                        <input type="hidden" name="franYear" value=<?php echo $View_Year; ?> />
                        <div class="form-group" style="text-align: left">
                            <button type="submit" class="btn btn-success">Add Offseason Move</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="importDraft" tabindex="-1" role="dialog" aria-labelledby="Import Drated Players" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Drafted Players</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="AddDraftedForm" id="AddDraftedForm" Action="../libs/ajax/franchise_view/staging/add_franchise_drafted_player.php" method="post">
                    <select name="AddDrafted" class="btn btn-default dropdown-toggle" <?php
                                        if ($View_Year == 1) {
                                            echo "disabled";
                                        }
?>>
                    <?php
                    $previousYear = $View_Year - 1;
                    $getStagedDraftedPlayers = db_query("SELECT * FROM `franchise_staging_drafted` WHERE Franchise='{$Curr_Team}' AND Year='{$previousYear}'") or die(mysql_error());
                    while ($DraftedPlayersRow = $getStagedDraftedPlayers->fetch_assoc()) {
                        echo '<option value=' . $DraftedPlayersRow['Row_ID'], '>' . $DraftedPlayersRow['Name'] . ' - ' . $DraftedPlayersRow['Position'] . ': ' . $DraftedPlayersRow['Overall'] . '</option>';
                    }
                    ?>
                    </select>
                    <select name="AddDraftedPOS" class="btn btn-default dropdown-toggle" <?php
                                if ($View_Year == 1) {
                                    echo "disabled";
                                }
                                ?>>
                    <?php
                    foreach ($Positions as $pos) {
                        echo '<option>', $pos, '</option>';
                    }
                    ?>
                    </select>
                                <?php
                                if ($View_Year == 1) {
                                    echo "<br><h4>Year 1 - No Drafted Players To Add</h4>";
                                }
                                ?>
                    <br><br>
                    <button type="submit" class="btn btn-success" <?php
                    if ($View_Year == 1) {
                        echo "disabled";
                    }
                    ?>>Add Player to Depth Chart</button>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="hidden" name="franYear" value="<?php echo $View_Year ?>" />
                    <input type="hidden" name="franchise" value="<?php echo $Curr_Team ?>" />
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="importFA" tabindex="-1" role="dialog" aria-labelledby="Import Signed Free Agents" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Signed Free Agents</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="AddSignedFAForm" id="AddSignedFAForm" Action="../libs/ajax/franchise_view/staging/add_franchise_fa_player.php" method="post">
                    <select name="AddFA" class="btn btn-default dropdown-toggle" <?php
                            if ($View_Year == 1) {
                                echo "disabled";
                            }
                    ?>>
                    <?php
                    $previousYear = $View_Year - 1;
                    $getStagedFAPlayers = db_query("SELECT * FROM `franchise_staging_freeagency` WHERE Franchise='{$Curr_Team}' AND Year='{$previousYear}'") or die(mysql_error());
                    while ($FAPlayersRow = $getStagedFAPlayers->fetch_assoc()) {
                        echo '<option value=' . $FAPlayersRow['Row_ID'], '>' . $FAPlayersRow['Name'] . ' - ' . $FAPlayersRow['Position'] . ': ' . $FAPlayersRow['Overall'] . '</option>';
                    }
                    ?>
                    </select>
                    <select name="AddFApos" class="btn btn-default dropdown-toggle" <?php
                                if ($View_Year == 1) {
                                    echo "disabled";
                                }
                                ?>>
                    <?php
                    foreach ($Positions as $pos) {
                        echo '<option>', $pos, '</option>';
                    }
                    ?>
                    </select>
                                <?php
                                if ($View_Year == 1) {
                                    echo "<br><h4>Year 1 - No Free Agent Players To Add</h4>";
                                }
                                ?>
                    <br><br>
                    <button type="submit" class="btn btn-success" <?php
                    if ($View_Year == 1) {
                        echo "disabled";
                    }
                    ?>>Add Player to Depth Chart</button>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="hidden" name="franYear" value="<?php echo $View_Year ?>" />
                    <input type="hidden" name="franchise" value="<?php echo $Curr_Team ?>" />
                </form>
            </div>
        </div>
    </div>
</div>