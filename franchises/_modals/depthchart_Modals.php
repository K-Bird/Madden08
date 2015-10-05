<?php
$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$Positions = array();
array_push($Positions, 'QB1', 'QB2', 'HB1', 'HB2', 'HB3', 'FB1', 'FB2', 'WR1', 'WR2', 'WR3', 'WR4', 'TE1', 'TE2', 'LT1', 'LT2', 'LG1', 'LG2', 'C1', 'C2', 'RG1', 'RG2', 'RT1', 'RT2', 'LE1', 'LE2', 'RE1', 'RE2', 'DT1', 'DT2', 'LOLB1', 'LOLB2', 'MLB1', 'MLB2', 'ROLB1', 'ROLB2', 'CB1', 'CB2', 'CB3', 'CB4', 'FS1', 'FS2', 'SS1', 'SS2', 'K1', 'P1', 'KR', 'PR');
?>

<div class="modal fade" id="depthModal" tabindex="-1" role="dialog" aria-labelledby="Edit Depth Chart" aria-hidden="true">
    <div class="modal-dialog">
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
                            <td>Edit</td><td>Position</td><td>Name</td><td>Overall</td><td>Age</td><td>Acquired</td><td>Vet/Rookie</td><td>Special Status</td><td>OSU</td><td>Remove</td>
                        </tr>
                        <!-- Roster Block -->
                        <?php
                        foreach ($Positions as $pos) {
                            echo '<tr style="text-align: left">';
                            $Rosterresult = mysql_query("SELECT * FROM `{$fran}_players` where Position='" . $pos . "' and Year='{$franYear}'");
                            $numRows = mysql_num_rows($Rosterresult);
                            if ($numRows > 0) {
                                $RosterRow = mysql_fetch_array($Rosterresult);
                                echo '<td>
                                        <select name="positionEdit[]" class="btn btn-xs btn-default dropdown-toggle">
                                            <option></option>
                                            <option value=' . $RosterRow['Row_ID'] . '>Edit</option>
                                        </select>
                                    </td>
                                    <td>
                                    <select name="depthPOSedit[]" class="btn btn-xs btn-default dropdown-toggle">';
                                foreach ($Positions as $pos) {
                                    echo '<option ';
                                    if ($pos === $RosterRow['Position']) {
                                        echo 'selected="selected"';
                                    }
                                    echo '>', $pos, '</option>';
                                }
                                echo '</select></td>
                                    <td>
                                        <input type="text" name="changedNames[]" placeholder="', $RosterRow['Name'], '">
                                    </td>
                                    <td>
                                        <input type="text" name="changedOverall[]" placeholder="', $RosterRow['Overall'], '" size="2">
                                    </td>
                                    <td>
                                        <input type="text" name="changedAge[]" placeholder="', $RosterRow['Age'], '" size="2"></td>
                                    <td>
                                        <select name="changedOnTeam[]" class="btn btn-xs btn-default dropdown-toggle">';
                                if ($RosterRow['OnTeam'] === 'On Team') {
                                    echo '<option selected>On Team</a></option>';
                                } else {
                                    echo '<option>On Team</option>';
                                }

                                if ($RosterRow['OnTeam'] === 'Free Agent') {
                                    echo '<option selected>Free Agent</option>';
                                } else {
                                    echo '<option>Free Agent</option>';
                                }

                                if ($RosterRow['OnTeam'] === 'Trade') {
                                    echo '<option selected>Trade</option>';
                                } else {
                                    echo '<option>Trade</option>';
                                }

                                if ($RosterRow['OnTeam'] === 'Draft') {
                                    echo '<option selected>Draft</option>';
                                } else {
                                    echo '<option>Draft</option>';
                                }

                                if ($RosterRow['OnTeam'] === 'Created') {
                                    echo '<option selected>Created</option>';
                                } else {
                                    echo '<option>Created</option>';
                                }

                                echo '</select>
                                    </td>
                                    <td>
                                        <select name="changedVR[]" class="btn btn-xs btn-default dropdown-toggle">';
                                if ($RosterRow['Rookie'] === 'R') {
                                    echo '<option selected>Rookie</option>
                                                      <option>Veteran</option>';
                                } else {
                                    echo '<option>Rookie</option>
                                                      <option selected>Veteran</option>';
                                }
                                echo '</td>
                                    <td>
                                        <select name="changedWeapon[]" class="btn btn-xs btn-default dropdown-toggle">';
                                if ($RosterRow['Weapon'] === '') {
                                    echo '<option selected></option>';
                                } else {
                                    echo '<option></option>';
                                }
                                if ($RosterRow['Weapon'] === 'CannonArm') {
                                    echo '<option selected>Cannon Arm</option>';
                                } else {
                                    echo '<option>Cannon Arm</option>';
                                }
                                if ($RosterRow['Weapon'] === 'Coverage') {
                                    echo '<option selected>Coverage Corner</option>';
                                } else {
                                    echo '<option>Coverage Corner</option>';
                                }
                                if ($RosterRow['Weapon'] === 'Crosshair') {
                                    echo '<option selected>Precision QB</option>';
                                } else {
                                    echo '<option>Precision QB</option>';
                                }
                                if ($RosterRow['Weapon'] === 'Elusive') {
                                    echo '<option selected>Elusive Back</option>';
                                } else {
                                    echo '<option>Elusive Back</option>';
                                }
                                if ($RosterRow['Weapon'] === 'Power') {
                                    echo '<option selected>Power Back</option>';
                                } else {
                                    echo '<option>Power Back</option>';
                                }
                                if ($RosterRow['Weapon'] === 'Franchise') {
                                    echo '<option selected>Franchise Player</option>';
                                } else {
                                    echo '<option>Franchise Player</option>';
                                }
                                if ($RosterRow['Weapon'] === 'HeavyHitter') {
                                    echo '<option selected>Heavy Hitter</option>';
                                } else {
                                    echo '<option>Heavy Hitter</option>';
                                }
                                if ($RosterRow['Weapon'] === 'PassBlock') {
                                    echo '<option selected>Pocket Protector</option>';
                                } else {
                                    echo '<option>Pocket Protector</option>';
                                }
                                if ($RosterRow['Weapon'] === 'RunBlock') {
                                    echo '<option selected>Run Blocker</option>';
                                } else {
                                    echo '<option>Run Blocker</option>';
                                }
                                if ($RosterRow['Weapon'] === 'Possession') {
                                    echo '<option selected>Possession Receiver</option>';
                                } else {
                                    echo '<option>Possession Receiver</option>';
                                }
                                if ($RosterRow['Weapon'] === 'RunStopper') {
                                    echo '<option selected>Run Stopper</option>';
                                } else {
                                    echo '<option>Run Stopper</option>';
                                }
                                if ($RosterRow['Weapon'] === 'Speed') {
                                    echo '<option selected>Speed Player</option>';
                                } else {
                                    echo '<option>Speed Player</option>';
                                }
                                echo '</select>
                                    </td>
                                    <td>
                                        <select name="changedOSU[]" class="btn btn-xs btn-default dropdown-toggle">';
                                if ($RosterRow['OSU'] === 'Y') {
                                    echo '<option selected>Buckeye</option>
                                                      <option></option>';
                                } else {
                                    echo '<option selected></option>
                                                      <option>Buckeye</option>';
                                }
                                echo '</select>
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#remove' . $pos . 'Modal">Remove Player</a>
                                    </td>';
                            } else {
                                echo '<td></td>
                                      <td>' . $pos . '</td><td colspan="7" style="text-align:center">No ' . $pos . ' on Roster</td>
                                      <td><a class="btn btn-xs btn-success addPlayerBtn" data-toggle="modal" data-target="#add' . $pos . 'Modal">Add ' . $pos . '</a></td>';
                            }
                            echo '</tr>';
                        }
                        ?>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input type="hidden" name="franchise" value=<?php echo $fran ?> />
                <input type="hidden" name="year" value=<?php echo $franYear ?> />
                <button type="submit" class="btn btn-success">Save changes</button>
            </div>
            </form>                
        </div>
    </div>
</div>


<?php
foreach ($Positions as $pos) {

    $Rosterresult = mysql_query("SELECT * FROM `{$fran}_players` where Position='" . $pos . "' and Year='{$franYear}'");
    $RosterRow = mysql_fetch_array($Rosterresult);

    /* Remove Player Modal */
    echo '
    <form role="form" name="add' . $pos . '" class="removePlayerForm">
    <div class="modal fade" id="remove' . $pos . 'Modal" tabindex="-1" role="dialog" aria-labelledby="Add ' . $pos . '" aria-hidden="true">
        <div class="modal-dialog" style="width:400px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="text-align:center">Remove Player</h4>
                </div>
                <div class="modal-body" style="text-align:center">
                    <p>Remove ' . $pos . ' from ' . strtoupper($fran) . ' - Year: ' . $franYear . '?</p>
                </div>
                <div class="modal-footer" style="text-align:center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-success">Yes</button>
                    <input type="hidden" name="row" value=' . $RosterRow['Row_ID'] . ' />
                    <input type="hidden" name="fran" value="' . $fran . '" />
                </div>
            </div>
        </div>
    </div>
    </form>';
}

foreach ($Positions as $pos) {

    $Rosterresult = mysql_query("SELECT * FROM `{$fran}_players` where Position='" . $pos . "' and Year='{$franYear}'");
    $RosterRow = mysql_fetch_array($Rosterresult);

    /* Add Player Modal */
    echo '
                    <form role="form" name="add' . $pos . '" class="addPlayerForm">
                    <div class="modal fade" id="add' . $pos . 'Modal" tabindex="-1" role="dialog" aria-labelledby="Add ' . $pos . '" aria-hidden="true">
                        <div class="modal-dialog" style="width:500px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Add ' . $pos . ' to ' . strtoupper($fran) . ' - Year: ' . $franYear . '</h4>
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
                                                    <option></option>
                                                    <option value="CannonArm">Cannon Arm</option>
                                                    <option value="Coverage">Coverage Corner</option>
                                                    <option value="Crosshair">Precision QB</option>
                                                    <option value="Elusive">Elusive Back</option>
                                                    <option value="Power">Power Back</option>
                                                    <option value="Franchise">Franchise Player</option>
                                                    <option value="HeavyHitter">Heavy Hitter</option>
                                                    <option value="PassBlock">Pocket Protector</option>
                                                    <option value="RunBlock">Run Blocker</option>
                                                    <option value="Possesion">Possession Receiver</option>
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
                                    <input type="hidden" name="fran" value="' . $fran . '" />
                                    <input type="hidden" name="franYear" value="' . $franYear . '" />
                                    <input type="hidden" name="pos" value="' . $pos . '" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';
}
?>

<div class="modal fade" id="importDraft" tabindex="-1" role="dialog" aria-labelledby="Import Drated Players" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Drafted Players</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="AddDraftedForm" id="AddDraftedForm" Action="../../_update/Add_Drafted_Player.php" method="post">
                    <select name="AddDrafted" class="btn btn-default dropdown-toggle" <?php if ($franYear == 1) { echo "disabled"; } ?>>
                        <?php
                        $previousYear = $franYear - 1;
                        $getStagedDraftedPlayers = mysql_query("SELECT * FROM `franchise_staging_drafted` WHERE Franchise='{$fran}' AND Year='{$previousYear}'") or die(mysql_error());
                        while ($DraftedPlayersRow = mysql_fetch_array($getStagedDraftedPlayers)) {
                            echo '<option value=' . $DraftedPlayersRow['Row_ID'], '>' . $DraftedPlayersRow['Name'] . ' - '. $DraftedPlayersRow['Position'] . ': '. $DraftedPlayersRow['Overall'] .'</option>';
                        }
                        ?>
                    </select>
                    <select name="AddDraftedPOS" class="btn btn-default dropdown-toggle" <?php if ($franYear == 1) { echo "disabled"; } ?>>
                        <?php
                        foreach ($Positions as $pos) {
                            echo '<option>', $pos, '</option>';
                        }
                        ?>
                    </select>
                    <?php if ($franYear == 1) { echo "<br><h4>Year 1 - No Drafted Players To Add</h4>"; } ?>
                    <br><br>
                    <button type="submit" class="btn btn-success" <?php if ($franYear == 1) { echo "disabled"; } ?>>Add Player to Depth Chart</button>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="hidden" name="franYear" value="<?php echo $franYear ?>" />
                    <input type="hidden" name="franchise" value="<?php echo $fran ?>" />
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
                <form role="form" name="AddSignedFAForm" id="AddSignedFAForm" Action="../../_update/Add_FA_Player.php" method="post">
                    <select name="AddFA" class="btn btn-default dropdown-toggle" <?php if ($franYear == 1) { echo "disabled"; } ?>>
                        <?php
                        $previousYear = $franYear - 1;
                        $getStagedFAPlayers = mysql_query("SELECT * FROM `franchise_staging_freeagency` WHERE Franchise='{$fran}' AND Year='{$previousYear}'") or die(mysql_error());
                        while ($FAPlayersRow = mysql_fetch_array($getStagedFAPlayers)) {
                            echo '<option value=' . $FAPlayersRow['Row_ID'], '>' . $FAPlayersRow['Name'] . ' - '. $FAPlayersRow['Position'] . ': '. $FAPlayersRow['Overall'] .'</option>';
                        }
                        ?>
                    </select>
                    <select name="AddFApos" class="btn btn-default dropdown-toggle" <?php if ($franYear == 1) { echo "disabled"; } ?>>
                        <?php
                        foreach ($Positions as $pos) {
                            echo '<option>', $pos, '</option>';
                        }
                        ?>
                    </select>
                    <?php if ($franYear == 1) { echo "<br><h4>Year 1 - No Free Agent Players To Add</h4>"; } ?>
                    <br><br>
                    <button type="submit" class="btn btn-success" <?php if ($franYear == 1) { echo "disabled"; } ?>>Add Player to Depth Chart</button>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="hidden" name="franYear" value="<?php echo $franYear ?>" />
                    <input type="hidden" name="franchise" value="<?php echo $fran ?>" />
                </form>
            </div>
        </div>
    </div>
</div>