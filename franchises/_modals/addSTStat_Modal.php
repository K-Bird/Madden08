<?php
$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$Positions = array();
array_push($Positions, 'K1', 'P1','KR','PR');
?>

<div class="modal fade" id="addSTModal" tabindex="-1" role="dialog" aria-labelledby="Add Special Teams Stats Row" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Special Teams Stats Row</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="AddSTStat" id="addSTForm" class="addSTForm">
                    <table class="table" id="addRecTable" style="font-size: smaller; text-align: left;">
                        <tr>
                            <td>Player</td><td>Category</td><td>FGA</td><td>FGM</td><td>FG Percent</td><td>Longest Play</td><td>Punt Average</td><td>Inside 20</td><td>Return Average</td><td>Return TDs</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="specialTeams" class="btn btn-xs btn-default dropdown-toggle">
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
                    <input type="hidden" name="franchise" value=<?php echo $fran ?> />
                    <input type="hidden" name="franYear" value=<?php echo $franYear ?> />
                </form> 
            </div>             
        </div>
    </div>
</div>