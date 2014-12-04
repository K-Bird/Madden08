<?php
$Positions = array();
array_push($Positions, 'HC', 'OC', 'DC', 'ST', 'QB1', 'QB2', 'HB1', 'HB2', 'HB3', 'FB1', 'FB2', 'WR1', 'WR2', 'WR3', 'WR4', 'TE1', 'TE2', 'LT1', 'LT2', 'LG1', 'LG2', 'C1', 'C2', 'RG1', 'RG2', 'RT1', 'RT2', 'LE1', 'LE2', 'RE1', 'RE2', 'DT1', 'DT2', 'LOLB1', 'LOLB2', 'MLB1', 'MLB2', 'ROLB1', 'ROLB2', 'CB1', 'CB2', 'CB3', 'CB4', 'FS1', 'FS2', 'SS1', 'SS2', 'K1', 'P1', 'KR', 'PR');

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("gamessitedatabase", $con);

$PositionsInTable = array();

$addResult = mysql_query("SELECT * FROM `gm_madden08-ATL_3_roster`");

while (($row = mysql_fetch_assoc($addResult))) {
    $PositionsInTable[] = $row['Position'];
}

$openPositions = array_diff($Positions, $PositionsInTable);

asort($PositionsInTable);
asort($openPositions);
?>
<div class="row">
    <div class="col-lg-4" style="text-align: center; color: black">
        <button class="btn btn-default" data-toggle="modal" data-target=".addPlayerModal">Add Player</button>
        <div id="addPlayer" class="modal fade addPlayerModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="text-align: left; width: 25%">
                <div class="modal-content">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            <h3 class="panel-title">Add Player</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" name="addPlayer" action="_Update/Add_Player_Row.php" method="post">
                                <div class="form-group">
                                    <label for="position">Position:</label> 
                                    <select class="form-control" name="position">
                                        <?php
                                        foreach ($openPositions as $pos) {
                                            echo '<option value="' . $pos . '">' . $pos . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <label for="PlayerName">Name:</label>
                                    <input class="form-control" type="text" name="PlayerName" size="15">
                                    <label for="Acquired">How Acquired:</label>
                                    <select class="form-control" name="Acquired">
                                        <option>On Team</option>
                                        <option>Free Agent</option>
                                        <option>Trade</option>
                                        <option>Created</option>
                                        <option>Drafted</option>
                                    </select>
                                    <label for="ovr">Overall:</label>
                                    <input class="form-control" type="text" name="ovr" size="2" maxlength="2">
                                    <label for="age">Age:</label>
                                    <input class="form-control" type="text" name="age" size="2" maxlength="2">
                                    <label for="Weapon">Weapon:</label>
                                    <select class="form-control" name="Weapon">
                                        <option>None</option>
                                        <option>Cannon Arm</option>
                                        <option>Coverage Corner</option>
                                        <option>Precision QB</option>
                                        <option>Elusive Back</option>
                                        <option>Franchise Player</option>
                                        <option>Heavy Hitter</option>
                                        <option>Pocket Protector</option>
                                        <option>Possession Receiver</option>
                                        <option>Power Back</option>
                                        <option>Run Blocker</option>
                                        <option>Run Stopper</option>
                                        <option>Speed Player</option>
                                    </select>
                                    <label for="OSU">From Ohio State:</label>
                                    <select class="form-control" name="OSU">
                                        <option></option>
                                        <option>No</option>
                                        <option>Yes</option>
                                    </select>
                                    <br>
                                    <input class="btn btn-default" type="submit" value="Add Player">
                                    <input type="hidden" name="fran" value="ATL" />
                                    <input type="hidden" name="year" value="3" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4" style="text-align: center; color: black">
        <button class="btn btn-default" data-toggle="modal" data-target=".updatePlayerModal">Update Player</button>
        <div id="updatePlayer" class="modal fade updatePlayerModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="text-align: left; width: 25%">
                <div class="modal-content">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            <h3 class="panel-title">Update Player</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" name="addPlayer" action="_Update/Update_Player_Row.php" method="post">
                                <div class="form-group">
                                    <label for="position">Position:</label>
                                    <select class="form-control" name="position">
                                        <?php
                                        foreach ($PositionsInTable as $pos) {
                                            echo '<option value="' . $pos . '">' . $pos . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <label for="field">Field:</label>
                                    <select class="form-control" name="field">
                                        <option>Name</option>
                                        <option>Overall</option>
                                        <option>Age</option>
                                        <option>Acquired</option>
                                    </select>
                                    <label for="value">New Value:</label>
                                    <input class="form-control" type="text" name="value" size="15">
                                    <label for="Weapon">Weapon:</label>
                                    <select class="form-control" name="Weapon">
                                        <option> </option>
                                        <option>None</option>
                                        <option>Cannon Arm</option>
                                        <option>Coverage Corner</option>
                                        <option>Precision QB</option>
                                        <option>Elusive Back</option>
                                        <option>Franchise Player</option>
                                        <option>Heavy Hitter</option>
                                        <option>Pocket Protector</option>
                                        <option>Possession Receiver</option>
                                        <option>Power Back</option>
                                        <option>Run Blocker</option>
                                        <option>Run Stopper</option>
                                        <option>Speed Player</option>
                                    </select>
                                    <label for="OSU">From Ohio State:</label>
                                    <select class="form-control" name="OSU">
                                        <option></option>
                                        <option>No</option>
                                        <option>Yes</option>
                                    </select>
                                    <br>
                                    <input class="btn btn-default" type="submit" value="Update Player">
                                    <input type="hidden" name="fran" value="ATL" />
                                    <input type="hidden" name="year" value="3" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4" style="text-align: center; color: black">
        <button class="btn btn-default" data-toggle="modal" data-target=".removePlayerModal">Remove Player</button>
        <div id="removePlayer" class="modal fade removePlayerModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="text-align: left; width: 25%">
                <div class="modal-content">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            <h3 class="panel-title">Remove Player</h3>
                        </div>
                        <div class="panel-body">
                            <form name="addPlayer" action="_Update/Remove_Player_Row.php" method="post">
                                <div class="form-group">
                                    <label for="position">Position:</label>
                                    <select class="form-control" name="position">
                                        <?php
                                        foreach ($PositionsInTable as $pos) {
                                            echo '<option value="' . $pos . '">' . $pos . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <br>
                                    <input class="btn btn-default" type="submit" value="Remove Player">
                                    <input type="hidden" name="fran" value="ATL" />
                                    <input type="hidden" name="year" value="3" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
