<?php
$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$Positions = array();
array_push($Positions, 'QB1', 'QB2','HB1','HB2','HB3');
?>

<div class="modal fade" id="addRushModal" tabindex="-1" role="dialog" aria-labelledby="Add Rushing Stats Row" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Rushing Stats Row</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="AddRushStat" id="addRushForm" class="addRushForm">
                    <table class="table" id="addRushTable" style="font-size: smaller; text-align: left;">
                        <tr>
                            <td>Player</td><td>Rush Yards</td><td>Rush TDs</td><td>Yards Per Carry</td><td>Fumbles</td><td>Broken Tackles</td><td>Longest Run</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="rusher" class="btn btn-xs btn-default dropdown-toggle">
                                    <!-- Add Rusher Block -->
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
                    <input type="hidden" name="franchise" value=<?php echo $fran ?> />
                    <input type="hidden" name="franYear" value=<?php echo $franYear ?> />
                </form> 
            </div>             
        </div>
    </div>
</div>