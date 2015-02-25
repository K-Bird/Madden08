<?php
$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$Positions = array();
array_push($Positions, 'LE1', 'LE2','DT1','DT2','RE1','RE2','LOLB1','LOLB2','MLB1','MLB2','ROLB1','ROLB2','CB1','CB2','CB3','CB4','FS1','FS2','SS1','SS2');
?>

<div class="modal fade" id="addDefModal" tabindex="-1" role="dialog" aria-labelledby="Add Defensive Stats Row" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Defensive Stats Row</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="AddDefStat" id="addDefForm" class="addDefForm">
                    <table class="table" id="addRecTable" style="font-size: smaller; text-align: left;">
                        <tr>
                            <td>Player</td><td>Position</td><td>Tackles</td><td>Tackles for Loss</td><td>Sacks</td><td>INTs</td><td>TDs</td><td>Safety</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="defense" class="btn btn-xs btn-default dropdown-toggle">
                                    <!-- Add Receiving Block -->
                                    <?php
                                    foreach ($Positions as $pos) {
                                        $Rosterresult = mysql_query("SELECT * FROM `{$fran}_players` where Position='" . $pos . "' and Year='{$franYear}'");
                                        $RosterRow = mysql_fetch_array($Rosterresult);
                                        echo '<option value=' . $RosterRow['Row_ID'] . '>'.$pos.' - ' . $RosterRow['Name'] . '</option>';
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
                    <input type="hidden" name="franchise" value=<?php echo $fran ?> />
                    <input type="hidden" name="franYear" value=<?php echo $franYear ?> />
                </form> 
            </div>             
        </div>
    </div>
</div>