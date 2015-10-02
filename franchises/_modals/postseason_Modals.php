<!-- Team Assets Modal -->
<div class="modal fade editModal" id="assetModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Team Assets for <?php echo strtoupper($fran) . " - Year: " . $franYear; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" class="yearForm" name="assetHistory" action="../../_update/Edit_Year_Fields.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New Team Assets:</label> 
                        <input class="form-control" type="text" id="Value" name="NewVal" size="15">
                        <br>
                        <input type="hidden" name="fran" value=<?php echo $fran; ?> />
                        <input type="hidden" id="table" name="table" />
                        <input type="hidden" id="col" name="col" />
                        <input type="hidden" id="row" name="row" />
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

<!-- Regular Season Simulated Modal -->
<div class="modal fade editModal" id="regsimModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Regular Season Simulation for <?php echo strtoupper($fran) . " - Year: " . $franYear; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" class="yearForm" name="regsimHistory" action="../../_update/Edit_Year_Fields.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New Regular Season Simulated (No or Record):</label> 
                        <input class="form-control" type="text" id="Value" name="NewVal" size="15">
                        <br>
                        <input type="hidden" name="fran" value=<?php echo $fran; ?> />
                        <input type="hidden" id="table" name="table" />
                        <input type="hidden" id="col" name="col" />
                        <input type="hidden" id="row" name="row" />
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

<!-- Training Staff Modal -->
<div class="modal fade editModal" id="trainModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Training Staff for <?php echo strtoupper($fran) . " - Year: " . $franYear; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" class="yearForm" name="trainHistory" action="../../_update/Edit_Year_Fields.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New Training Staff:</label> 
                        <input class="form-control" type="text" id="Value" name="NewVal" size="15">
                        <br>
                        <input type="hidden" name="fran" value=<?php echo $fran; ?> />
                        <input type="hidden" id="table" name="table" />
                        <input type="hidden" id="col" name="col" />
                        <input type="hidden" id="row" name="row" />
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

<!-- Relocation Modal -->
<div class="modal fade editModal" id="reloModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Relocation for <?php echo strtoupper($fran) . " - Year: " . $franYear; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" class="yearForm" name="reloHistory" action="../../_update/Edit_Year_Fields.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New Relocation:</label> 
                        <input class="form-control" type="text" id="Value" name="NewVal" size="15">
                        <br>
                        <input type="hidden" name="fran" value=<?php echo $fran; ?> />
                        <input type="hidden" id="table" name="table" />
                        <input type="hidden" id="col" name="col" />
                        <input type="hidden" id="row" name="row" />
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

<?php
$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$Positions = array();
array_push($Positions, 'QB1', 'QB2', 'HB1', 'HB2', 'HB3', 'FB1', 'FB2', 'WR1', 'WR2', 'WR3', 'WR4', 'TE1', 'TE2', 'LT1', 'LT2', 'LG1', 'LG2', 'C1', 'C2', 'RG1', 'RG2', 'RT1', 'RT2', 'LE1', 'LE2', 'RE1', 'RE2', 'DT1', 'DT2', 'LOLB1', 'LOLB2', 'MLB1', 'MLB2', 'ROLB1', 'ROLB2', 'CB1', 'CB2', 'CB3', 'CB4', 'FS1', 'FS2', 'SS1', 'SS2', 'K1', 'P1', 'KR', 'PR');
?>

<!-- Add Award Modal -->
<div class="modal fade editModal" id="addYearAward">
    <div class="modal-dialog" style="width : 600px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Yearly Award for <?php echo strtoupper($fran) . " - Year: " . $franYear; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" name="addAward" action="../../_update/Add_Off_Award.php" method="post">
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
                                            $Rosterresult = mysql_query("SELECT * FROM `{$fran}_players` where Position='" . $pos . "' and Year='{$franYear}'");
                                            $RosterRow = mysql_fetch_array($Rosterresult);
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
                        <input type="hidden" name="fran" value=<?php echo $fran; ?> />
                        <input type="hidden" name="franYear" value=<?php echo $franYear; ?> />
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
                <h4 class="modal-title">Add Probowl Player for <?php echo strtoupper($fran) . " - Year: " . $franYear; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" name="addProbowl" action="../../_update/Add_Off_Probowl.php" method="post">
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
                                            $Rosterresult = mysql_query("SELECT * FROM `{$fran}_players` where Position='" . $pos . "' and Year='{$franYear}'");
                                            $RosterRow = mysql_fetch_array($Rosterresult);
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
                        <input type="hidden" name="fran" value=<?php echo $fran; ?> />
                        <input type="hidden" name="franYear" value=<?php echo $franYear; ?> />
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

<!-- Add Offseason Moves Modal -->
<div class="modal fade editModal" id="addMoves">
    <div class="modal-dialog" style="width : 800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Offseason Move for <?php echo strtoupper($fran) . " - Year: " . $franYear; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" name="addMove" action="../../_update/Add_Off_Move.php" method="post">
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
                                            $Rosterresult2 = mysql_query("SELECT * FROM `{$fran}_players` where Position='" . $pos . "' and Year='{$franYear}'");
                                            $RosterRow2 = mysql_fetch_array($Rosterresult2);
                                            echo '<option value=' . $RosterRow2['Row_ID'] . '>' . $pos . ' - ' . $RosterRow2['Name'] . '</option>';
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
                        <input type="hidden" name="fran" value=<?php echo $fran; ?> />
                        <input type="hidden" name="franYear" value=<?php echo $franYear; ?> />
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