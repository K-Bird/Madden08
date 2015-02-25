<?php
$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$Positions = array();
array_push($Positions, 'LT1', 'LT2','LG1','LG2','C1','C2','RG1','RG2','RT1','RT2');
?>

<div class="modal fade" id="addBlockModal" tabindex="-1" role="dialog" aria-labelledby="Add Blocking Stats Row" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Blocking Stats Row</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="AddRecStat" id="addRecForm" class="addBlockForm">
                    <table class="table" id="addRecTable" style="font-size: smaller; text-align: left;">
                        <tr>
                            <td>Player</td><td>Position</td><td>Pancakes</td><td>Sacks Allowed</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="blocker" class="btn btn-xs btn-default dropdown-toggle">
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
                    <input type="hidden" name="franchise" value=<?php echo $fran ?> />
                    <input type="hidden" name="franYear" value=<?php echo $franYear ?> />
                </form> 
            </div>             
        </div>
    </div>
</div>