<?php
$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$Positions = array();
array_push($Positions, 'QB1', 'QB2');
?>

<div class="modal fade" id="addPassModal" tabindex="-1" role="dialog" aria-labelledby="Add Passing Stats Row" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Passing Stats Row</h4>
            </div>
            <div class="modal-body">
                <form role="form" name="AddPassStat" id="AddPassForm" class="addPassForm">
                    <table class="table" id="addPassTable" style="font-size: smaller; text-align: left;">
                        <tr>
                            <td>Player</td><td>Passer Rating</td><td>Passing Yards</td><td>Passing TDs</td><td>Interceptions</td><td>Completion %</td><td>Times Sacked</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="passer" class="btn btn-xs btn-default dropdown-toggle">
                                    <!-- Add Passer Block -->
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
                    <input type="hidden" name="franchise" value=<?php echo $fran ?> />
                    <input type="hidden" name="franYear" value=<?php echo $franYear ?> />
                </form> 
            </div>             
        </div>
    </div>
</div>