<?php
$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$Positions = array();
array_push($Positions, 'WR1', 'WR2','WR3','WR4','HB1','HB2','HB3','TE1','TE2','FB1','FB2');
?>

<div class="modal fade" id="addRecModal" tabindex="-1" role="dialog" aria-labelledby="Add Receiving Stats Row" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Receiving Stats Row</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="AddRecStat" id="addRecForm" class="addRecForm">
                    <table class="table" id="addRecTable" style="font-size: smaller; text-align: left;">
                        <tr>
                            <td>Player</td><td>Receptions</td><td>Receiving Yards</td><td>Receiving TDs</td><td>Yards Per Catch</td><td>Longest Catch</td><td>Drops</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="receiver" class="btn btn-xs btn-default dropdown-toggle">
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
                    <input type="hidden" name="franchise" value=<?php echo $fran ?> />
                    <input type="hidden" name="franYear" value=<?php echo $franYear ?> />
                </form> 
            </div>             
        </div>
    </div>
</div>