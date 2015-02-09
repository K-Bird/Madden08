<?php
$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);
?>

<div class="panel-group" id="DepthCollpase" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#DepthCollpase" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Offense
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <table class="table" id="offensiveODepth" style="font-size: smaller; text-align:center;">
                    <tr>
                        <td>Position</td><td>Name</td><td>Overall</td><td>Age</td><td>Acquired</td><td>Vet/Rookie</td><td>Special Status</td>
                    </tr>
                    <tr>
                        <?php
                        /* QB1 Block */
                        $QB1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='QB1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($QB1result);
                        if ($numRows > 0) {
                            $QB1row = mysql_fetch_array($QB1result);
                            echo '<td>', $QB1row['Position'], '</td>',
                            '<td><span id="', $QB1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $QB1row['Name'], '</span></td>',
                            '<td>', $QB1row['Overall'], '</td>',
                            '<td>', $QB1row['Age'], '</td>',
                            '<td>', $QB1row['OnTeam'], '</td>',
                            '<td>';
                            if ($QB1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($QB1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $QB1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($QB1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>QB1</td><td colspan=6>No QB1 on Roster</td>';
                        }
                        ?>
                    </tr>                 
                    <tr>
                        <?php
                        /* HB1 Block */
                        $HB1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='HB1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($HB1result);
                        if ($numRows > 0) {
                            $HB1row = mysql_fetch_array($HB1result);
                            echo '<td>', $HB1row['Position'], '</td>',
                            '<td><span id="', $HB1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $HB1row['Name'], '</span></td>',
                            '<td>', $HB1row['Overall'], '</td>',
                            '<td>', $HB1row['Age'], '</td>',
                            '<td>', $HB1row['OnTeam'], '</td>',
                            '<td>';
                            if ($HB1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($HB1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $HB1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($HB1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>HB1</td><td colspan=6>No HB1 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* FB1 Block */
                        $FB1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='FB1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($FB1result);
                        if ($numRows > 0) {
                            $FB1row = mysql_fetch_array($FB1result);
                            echo '<td>', $FB1row['Position'], '</td>',
                            '<td><span id="', $FB1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $FB1row['Name'], '</span></td>',
                            '<td>', $FB1row['Overall'], '</td>',
                            '<td>', $FB1row['Age'], '</td>',
                            '<td>', $FB1row['OnTeam'], '</td>',
                            '<td>';
                            if ($FB1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($FB1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $FB1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($FB1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>FB1</td><td colspan=6>No FB1 on Roster</td>';
                        }
                        ?>
                    </tr>                   
                    <tr>
                        <?php
                        /* WR1 Block */
                        $WR1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='WR1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($WR1result);
                        if ($numRows > 0) {
                            $WR1row = mysql_fetch_array($WR1result);
                            echo '<td>', $WR1row['Position'], '</td>',
                            '<td><span id="', $WR1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $WR1row['Name'], '</span></td>',
                            '<td>', $WR1row['Overall'], '</td>',
                            '<td>', $WR1row['Age'], '</td>',
                            '<td>', $WR1row['OnTeam'], '</td>',
                            '<td>';
                            if ($WR1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($WR1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $WR1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($WR1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>WR1</td><td colspan=6>No WR1 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* WR2 Block */
                        $WR2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='WR2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($WR2result);
                        if ($numRows > 0) {
                            $WR2row = mysql_fetch_array($WR2result);
                            echo '<td>', $WR2row['Position'], '</td>',
                            '<td><span id="', $WR2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $WR2row['Name'], '</span></td>',
                            '<td>', $WR2row['Overall'], '</td>',
                            '<td>', $WR2row['Age'], '</td>',
                            '<td>', $WR2row['OnTeam'], '</td>',
                            '<td>';
                            if ($WR2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($WR2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $WR2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($WR2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>WR2</td><td colspan=6>No WR2 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* TE1 Block */
                        $TE1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='TE1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($TE1result);
                        if ($numRows > 0) {
                            $TE1row = mysql_fetch_array($TE1result);
                            echo '<td>', $TE1row['Position'], '</td>',
                            '<td><span id="', $TE1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $TE1row['Name'], '</span></td>',
                            '<td>', $TE1row['Overall'], '</td>',
                            '<td>', $TE1row['Age'], '</td>',
                            '<td>', $TE1row['OnTeam'], '</td>',
                            '<td>';
                            if ($TE1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($TE1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $TE1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($TE1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>TE1</td><td colspan=6>No TE1 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* LT1 Block */
                        $LT1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='LT1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($LT1result);
                        if ($numRows > 0) {
                            $LT1row = mysql_fetch_array($LT1result);
                            echo '<td>', $LT1row['Position'], '</td>',
                            '<td><span id="', $LT1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $LT1row['Name'], '</span></td>',
                            '<td>', $LT1row['Overall'], '</td>',
                            '<td>', $LT1row['Age'], '</td>',
                            '<td>', $LT1row['OnTeam'], '</td>',
                            '<td>';
                            if ($LT1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($LT1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $LT1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($LT1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>LT1</td><td colspan=6>No LT1 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* LG1 Block */
                        $LG1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='LG1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($LG1result);
                        if ($numRows > 0) {
                            $LG1row = mysql_fetch_array($LG1result);
                            echo '<td>', $LG1row['Position'], '</td>',
                            '<td><span id="', $LG1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $LG1row['Name'], '</span></td>',
                            '<td>', $LG1row['Overall'], '</td>',
                            '<td>', $LG1row['Age'], '</td>',
                            '<td>', $LG1row['OnTeam'], '</td>',
                            '<td>';
                            if ($LG1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($LG1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $LG1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($LG1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>LG1</td><td colspan=6>No LG1 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* C1 Block */
                        $C1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='C1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($C1result);
                        if ($numRows > 0) {
                            $C1row = mysql_fetch_array($C1result);
                            echo '<td>', $C1row['Position'], '</td>',
                            '<td><span id="', $C1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $C1row['Name'], '</span></td>',
                            '<td>', $C1row['Overall'], '</td>',
                            '<td>', $C1row['Age'], '</td>',
                            '<td>', $C1row['OnTeam'], '</td>',
                            '<td>';
                            if ($C1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($C1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $C1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($C1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>C1</td><td colspan=6>No C1 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* RG1 Block */
                        $RG1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='RG1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($RG1result);
                        if ($numRows > 0) {
                            $RG1row = mysql_fetch_array($RG1result);
                            echo '<td>', $RG1row['Position'], '</td>',
                            '<td><span id="', $RG1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $RG1row['Name'], '</span></td>',
                            '<td>', $RG1row['Overall'], '</td>',
                            '<td>', $RG1row['Age'], '</td>',
                            '<td>', $RG1row['OnTeam'], '</td>',
                            '<td>';
                            if ($RG1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($RG1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $RG1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($RG1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>RG1</td><td colspan=6>No RG1 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* RT1 Block */
                        $RT1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='RT1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($RT1result);
                        if ($numRows > 0) {
                            $RT1row = mysql_fetch_array($RT1result);
                            echo '<td>', $RT1row['Position'], '</td>',
                            '<td><span id="', $RT1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $RT1row['Name'], '</span></td>',
                            '<td>', $RT1row['Overall'], '</td>',
                            '<td>', $RT1row['Age'], '</td>',
                            '<td>', $RT1row['OnTeam'], '</td>',
                            '<td>';
                            if ($RT1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($RT1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $RT1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($RT1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>RT1</td><td colspan=6>No RT1 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <!-- Second Team ---------------------------------->
                    <tr>
                        <?php
                        /* QB2 Block */
                        $QB2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='QB2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($QB2result);
                        if ($numRows > 0) {
                            $QB2row = mysql_fetch_array($QB2result);
                            echo '<td>', $QB2row['Position'], '</td>',
                            '<td><span id="', $QB2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $QB2row['Name'], '</span></td>',
                            '<td>', $QB2row['Overall'], '</td>',
                            '<td>', $QB2row['Age'], '</td>',
                            '<td>', $QB2row['OnTeam'], '</td>',
                            '<td>';
                            if ($QB2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($QB2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $QB2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($QB2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>QB2</td><td colspan=6>No QB2 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* HB2 Block */
                        $HB2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='HB2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($HB2result);
                        if ($numRows > 0) {
                            $HB2row = mysql_fetch_array($HB2result);
                            echo '<td>', $HB2row['Position'], '</td>',
                            '<td><span id="', $HB2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $HB2row['Name'], '</span></td>',
                            '<td>', $HB2row['Overall'], '</td>',
                            '<td>', $HB2row['Age'], '</td>',
                            '<td>', $HB2row['OnTeam'], '</td>',
                            '<td>';
                            if ($HB2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($HB2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $HB2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($HB2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>HB2</td><td colspan=6>No HB2 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* HB3 Block */
                        $HB3result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='HB3' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($HB3result);
                        if ($numRows > 0) {
                            $HB3row = mysql_fetch_array($HB3result);
                            echo '<td>', $HB3row['Position'], '</td>',
                            '<td><span id="', $HB3row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $HB3row['Name'], '</span></td>',
                            '<td>', $HB3row['Overall'], '</td>',
                            '<td>', $HB3row['Age'], '</td>',
                            '<td>', $HB3row['OnTeam'], '</td>',
                            '<td>';
                            if ($HB3row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($HB3row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $HB3row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($HB3row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>HB3</td><td colspan=6>No HB3 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* FB2 Block */
                        $FB2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='FB2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($FB2result);
                        if ($numRows > 0) {
                            $FB2row = mysql_fetch_array($FB2result);
                            echo '<td>', $FB2row['Position'], '</td>',
                            '<td><span id="', $FB2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $FB2row['Name'], '</span></td>',
                            '<td>', $FB2row['Overall'], '</td>',
                            '<td>', $FB2row['Age'], '</td>',
                            '<td>', $FB2row['OnTeam'], '</td>',
                            '<td>';
                            if ($FB2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($FB2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $FB2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($FB2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>FB2</td><td colspan=6>No FB2 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* WR3 Block */
                        $WR3result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='WR3' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($WR3result);
                        if ($numRows > 0) {
                            $WR3row = mysql_fetch_array($WR3result);
                            echo '<td>', $WR3row['Position'], '</td>',
                            '<td><span id="', $WR3row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $WR3row['Name'], '</span></td>',
                            '<td>', $WR3row['Overall'], '</td>',
                            '<td>', $WR3row['Age'], '</td>',
                            '<td>', $WR3row['OnTeam'], '</td>',
                            '<td>';
                            if ($WR3row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($WR3row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $WR3row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($WR3row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>WR3</td><td colspan=6>No WR3 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* WR4 Block */
                        $WR4result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='WR4' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($WR4result);
                        if ($numRows > 0) {
                            $WR4row = mysql_fetch_array($WR4result);
                            echo '<td>', $WR4row['Position'], '</td>',
                            '<td><span id="', $WR4row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $WR4row['Name'], '</span></td>',
                            '<td>', $WR4row['Overall'], '</td>',
                            '<td>', $WR4row['Age'], '</td>',
                            '<td>', $WR4row['OnTeam'], '</td>',
                            '<td>';
                            if ($WR4row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($WR4row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $WR4row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($WR4row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>WR4</td><td colspan=6>No WR4 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* TE2 Block */
                        $TE2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='TE2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($TE2result);
                        if ($numRows > 0) {
                            $TE2row = mysql_fetch_array($TE2result);
                            echo '<td>', $TE2row['Position'], '</td>',
                            '<td><span id="', $TE2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $TE2row['Name'], '</span></td>',
                            '<td>', $TE2row['Overall'], '</td>',
                            '<td>', $TE2row['Age'], '</td>',
                            '<td>', $TE2row['OnTeam'], '</td>',
                            '<td>';
                            if ($TE2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($TE2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $TE2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($TE2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>TE2</td><td colspan=6>No TE2 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* LT2 Block */
                        $LT2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='LT2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($LT2result);
                        if ($numRows > 0) {
                            $LT2row = mysql_fetch_array($LT2result);
                            echo '<td>', $LT2row['Position'], '</td>',
                            '<td><span id="', $LT2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $LT2row['Name'], '</span></td>',
                            '<td>', $LT2row['Overall'], '</td>',
                            '<td>', $LT2row['Age'], '</td>',
                            '<td>', $LT2row['OnTeam'], '</td>',
                            '<td>';
                            if ($LT2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($LT2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $LT2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($LT2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>LT2</td><td colspan=6>No LT2 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* LG2 Block */
                        $LG2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='LG2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($LG2result);
                        if ($numRows > 0) {
                            $LG2row = mysql_fetch_array($LG2result);
                            echo '<td>', $LG2row['Position'], '</td>',
                            '<td><span id="', $LG2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $LG2row['Name'], '</span></td>',
                            '<td>', $LG2row['Overall'], '</td>',
                            '<td>', $LG2row['Age'], '</td>',
                            '<td>', $LG2row['OnTeam'], '</td>',
                            '<td>';
                            if ($LG2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($LG2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $LG2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($LG2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>LG2</td><td colspan=6>No LG2 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* C2 Block */
                        $C2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='C2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($C2result);
                        if ($numRows > 0) {
                            $C2row = mysql_fetch_array($C2result);
                            echo '<td>', $C2row['Position'], '</td>',
                            '<td><span id="', $C2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $C2row['Name'], '</span></td>',
                            '<td>', $C2row['Overall'], '</td>',
                            '<td>', $C2row['Age'], '</td>',
                            '<td>', $C2row['OnTeam'], '</td>',
                            '<td>';
                            if ($C2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($C2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $C2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($C2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>C2</td><td colspan=6>No C2 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* RG2 Block */
                        $RG2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='RG2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($RG2result);
                        if ($numRows > 0) {
                            $RG2row = mysql_fetch_array($RG2result);
                            echo '<td>', $RG2row['Position'], '</td>',
                            '<td><span id="', $RG2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $RG2row['Name'], '</span></td>',
                            '<td>', $RG2row['Overall'], '</td>',
                            '<td>', $RG2row['Age'], '</td>',
                            '<td>', $RG2row['OnTeam'], '</td>',
                            '<td>';
                            if ($RG2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($RG2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $RG2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($RG2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>RG2</td><td colspan=6>No RG2 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* RT2 Block */
                        $RT2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='RT2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($RT2result);
                        if ($numRows > 0) {
                            $RT2row = mysql_fetch_array($RT2result);
                            echo '<td>', $RT2row['Position'], '</td>',
                            '<td><span id="', $RT2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $RT2row['Name'], '</span></td>',
                            '<td>', $RT2row['Overall'], '</td>',
                            '<td>', $RT2row['Age'], '</td>',
                            '<td>', $RT2row['OnTeam'], '</td>',
                            '<td>';
                            if ($RT2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($RT2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $RT2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($RT2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>RT2</td><td colspan=6>No RT2 on Roster</td>';
                        }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#DepthCollpase" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Defense
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <table class="table" id="offensiveDDepth" style="font-size: smaller; text-align:center;">
                    <tr>
                        <td>Position</td><td>Name</td><td>Overall</td><td>Age</td><td>Acquired</td><td>Vet/Rookie</td><td>Special Status</td>
                    </tr>
                    <tr>
                        <?php
                        /* LE1 Block */
                        $LE1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='LE1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($LE1result);
                        if ($numRows > 0) {
                            $LE1row = mysql_fetch_array($LE1result);
                            echo '<td>', $LE1row['Position'], '</td>',
                            '<td><span id="', $LE1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $LE1row['Name'], '</span></td>',
                            '<td>', $LE1row['Overall'], '</td>',
                            '<td>', $LE1row['Age'], '</td>',
                            '<td>', $LE1row['OnTeam'], '</td>',
                            '<td>';
                            if ($LE1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($LE1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $LE1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($LE1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>LE1</td><td colspan=6>No LE1 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* DT1 Block */
                        $DT1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='DT1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($DT1result);
                        if ($numRows > 0) {
                            $DT1row = mysql_fetch_array($DT1result);
                            echo '<td>', $DT1row['Position'], '</td>',
                            '<td><span id="', $DT1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $DT1row['Name'], '</span></td>',
                            '<td>', $DT1row['Overall'], '</td>',
                            '<td>', $DT1row['Age'], '</td>',
                            '<td>', $DT1row['OnTeam'], '</td>',
                            '<td>';
                            if ($DT1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($DT1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $DT1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($DT1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>DT1</td><td colspan=6>No DT1 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* RE1 Block */
                        $RE1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='RE1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($RE1result);
                        if ($numRows > 0) {
                            $RE1row = mysql_fetch_array($RE1result);
                            echo '<td>', $RE1row['Position'], '</td>',
                            '<td><span id="', $RE1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $RE1row['Name'], '</span></td>',
                            '<td>', $RE1row['Overall'], '</td>',
                            '<td>', $RE1row['Age'], '</td>',
                            '<td>', $RE1row['OnTeam'], '</td>',
                            '<td>';
                            if ($RE1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($RE1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $RE1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($RE1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>RE1</td><td colspan=6>No RE1 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* LOLB1 Block */
                        $LOLB1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='LOLB1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($LOLB1result);
                        if ($numRows > 0) {
                            $LOLB1row = mysql_fetch_array($LOLB1result);
                            echo '<td>', $LOLB1row['Position'], '</td>',
                            '<td><span id="', $LOLB1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $LOLB1row['Name'], '</span></td>',
                            '<td>', $LOLB1row['Overall'], '</td>',
                            '<td>', $LOLB1row['Age'], '</td>',
                            '<td>', $LOLB1row['OnTeam'], '</td>',
                            '<td>';
                            if ($LOLB1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($LOLB1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $LOLB1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($LOLB1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>LOLB1</td><td colspan=6>No LOLB1 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* MLB1 Block */
                        $MLB1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='MLB1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($MLB1result);
                        if ($numRows > 0) {
                            $MLB1row = mysql_fetch_array($MLB1result);
                            echo '<td>', $MLB1row['Position'], '</td>',
                            '<td><span id="', $MLB1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $MLB1row['Name'], '</span></td>',
                            '<td>', $MLB1row['Overall'], '</td>',
                            '<td>', $MLB1row['Age'], '</td>',
                            '<td>', $MLB1row['OnTeam'], '</td>',
                            '<td>';
                            if ($MLB1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($MLB1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $MLB1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($MLB1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>MLB1</td><td colspan=6>No MLB1 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* ROLB1 Block */
                        $ROLB1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='ROLB1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($ROLB1result);
                        if ($numRows > 0) {
                            $ROLB1row = mysql_fetch_array($ROLB1result);
                            echo '<td>', $ROLB1row['Position'], '</td>',
                            '<td><span id="', $ROLB1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $ROLB1row['Name'], '</span></td>',
                            '<td>', $ROLB1row['Overall'], '</td>',
                            '<td>', $ROLB1row['Age'], '</td>',
                            '<td>', $ROLB1row['OnTeam'], '</td>',
                            '<td>';
                            if ($ROLB1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($ROLB1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $ROLB1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($ROLB1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>ROLB1</td><td colspan=6>No ROLB1 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* CB1 Block */
                        $CB1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='CB1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($CB1result);
                        if ($numRows > 0) {
                            $CB1row = mysql_fetch_array($CB1result);
                            echo '<td>', $CB1row['Position'], '</td>',
                            '<td><span id="', $CB1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $CB1row['Name'], '</span></td>',
                            '<td>', $CB1row['Overall'], '</td>',
                            '<td>', $CB1row['Age'], '</td>',
                            '<td>', $CB1row['OnTeam'], '</td>',
                            '<td>';
                            if ($CB1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($CB1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $CB1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($CB1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>CB1</td><td colspan=6>No CB1 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* CB2 Block */
                        $CB2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='CB2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($CB2result);
                        if ($numRows > 0) {
                            $CB2row = mysql_fetch_array($CB2result);
                            echo '<td>', $CB2row['Position'], '</td>',
                            '<td><span id="', $CB2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $CB2row['Name'], '</span></td>',
                            '<td>', $CB2row['Overall'], '</td>',
                            '<td>', $CB2row['Age'], '</td>',
                            '<td>', $CB2row['OnTeam'], '</td>',
                            '<td>';
                            if ($CB2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($CB2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $CB2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($CB2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>CB2</td><td colspan=6>No CB2 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* FS1 Block */
                        $FS1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='FS1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($FS1result);
                        if ($numRows > 0) {
                            $FS1row = mysql_fetch_array($FS1result);
                            echo '<td>', $FS1row['Position'], '</td>',
                            '<td><span id="', $FS1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $FS1row['Name'], '</span></td>',
                            '<td>', $FS1row['Overall'], '</td>',
                            '<td>', $FS1row['Age'], '</td>',
                            '<td>', $FS1row['OnTeam'], '</td>',
                            '<td>';
                            if ($FS1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($FS1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $FS1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($FS1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>FS1</td><td colspan=6>No FS1 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* SS1 Block */
                        $SS1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='SS1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($SS1result);
                        if ($numRows > 0) {
                            $SS1row = mysql_fetch_array($SS1result);
                            echo '<td>', $SS1row['Position'], '</td>',
                            '<td><span id="', $SS1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $SS1row['Name'], '</span></td>',
                            '<td>', $SS1row['Overall'], '</td>',
                            '<td>', $SS1row['Age'], '</td>',
                            '<td>', $SS1row['OnTeam'], '</td>',
                            '<td>';
                            if ($SS1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($SS1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $SS1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($SS1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>SS1</td><td colspan=6>No SS1 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* LE2 Block */
                        $LE2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='LE2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($LE2result);
                        if ($numRows > 0) {
                            $LE2row = mysql_fetch_array($LE2result);
                            echo '<td>', $LE2row['Position'], '</td>',
                            '<td><span id="', $LE2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $LE2row['Name'], '</span></td>',
                            '<td>', $LE2row['Overall'], '</td>',
                            '<td>', $LE2row['Age'], '</td>',
                            '<td>', $LE2row['OnTeam'], '</td>',
                            '<td>';
                            if ($LE2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($LE2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $LE2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($LE2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>LE2</td><td colspan=6>No LE2 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* DT2 Block */
                        $DT2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='DT2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($DT2result);
                        if ($numRows > 0) {
                            $DT2row = mysql_fetch_array($DT2result);
                            echo '<td>', $DT2row['Position'], '</td>',
                            '<td><span id="', $DT2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $DT2row['Name'], '</span></td>',
                            '<td>', $DT2row['Overall'], '</td>',
                            '<td>', $DT2row['Age'], '</td>',
                            '<td>', $DT2row['OnTeam'], '</td>',
                            '<td>';
                            if ($DT2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($DT2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $DT2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($DT2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>DT2</td><td colspan=6>No DT2 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* RE2 Block */
                        $RE2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='RE2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($RE2result);
                        if ($numRows > 0) {
                            $RE2row = mysql_fetch_array($RE2result);
                            echo '<td>', $RE2row['Position'], '</td>',
                            '<td><span id="', $RE2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $RE2row['Name'], '</span></td>',
                            '<td>', $RE2row['Overall'], '</td>',
                            '<td>', $RE2row['Age'], '</td>',
                            '<td>', $RE2row['OnTeam'], '</td>',
                            '<td>';
                            if ($RE2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($RE2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $RE2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($RE2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>RE2</td><td colspan=6>No RE2 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* LOLB2 Block */
                        $LOLB2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='LOLB2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($LOLB2result);
                        if ($numRows > 0) {
                            $LOLB2row = mysql_fetch_array($LOLB2result);
                            echo '<td>', $LOLB2row['Position'], '</td>',
                            '<td><span id="', $LOLB2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $LOLB2row['Name'], '</span></td>',
                            '<td>', $LOLB2row['Overall'], '</td>',
                            '<td>', $LOLB2row['Age'], '</td>',
                            '<td>', $LOLB2row['OnTeam'], '</td>',
                            '<td>';
                            if ($LOLB2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($LOLB2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $LOLB2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($LOLB2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>LOLB2</td><td colspan=6>No LOLB2 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* MLB2 Block */
                        $MLB2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='MLB2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($MLB2result);
                        if ($numRows > 0) {
                            $MLB2row = mysql_fetch_array($MLB2result);
                            echo '<td>', $MLB2row['Position'], '</td>',
                            '<td><span id="', $MLB2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $MLB2row['Name'], '</span></td>',
                            '<td>', $MLB2row['Overall'], '</td>',
                            '<td>', $MLB2row['Age'], '</td>',
                            '<td>', $MLB2row['OnTeam'], '</td>',
                            '<td>';
                            if ($MLB2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($MLB2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $MLB2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($MLB2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>MLB2</td><td colspan=6>No MLB2 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* ROLB2 Block */
                        $ROLB2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='ROLB2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($ROLB2result);
                        if ($numRows > 0) {
                            $ROLB2row = mysql_fetch_array($ROLB2result);
                            echo '<td>', $ROLB2row['Position'], '</td>',
                            '<td><span id="', $ROLB2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $ROLB2row['Name'], '</span></td>',
                            '<td>', $ROLB2row['Overall'], '</td>',
                            '<td>', $ROLB2row['Age'], '</td>',
                            '<td>', $ROLB2row['OnTeam'], '</td>',
                            '<td>';
                            if ($ROLB2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($ROLB2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $ROLB2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($ROLB2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>ROLB2</td><td colspan=6>No ROLB2 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* CB3 Block */
                        $CB3result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='CB3' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($CB3result);
                        if ($numRows > 0) {
                            $CB3row = mysql_fetch_array($CB3result);
                            echo '<td>', $CB3row['Position'], '</td>',
                            '<td><span id="', $CB3row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $CB3row['Name'], '</span></td>',
                            '<td>', $CB3row['Overall'], '</td>',
                            '<td>', $CB3row['Age'], '</td>',
                            '<td>', $CB3row['OnTeam'], '</td>',
                            '<td>';
                            if ($CB3row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($CB3row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $CB3row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($CB3row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>CB3</td><td colspan=6>No CB3 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* CB4 Block */
                        $CB4result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='CB4' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($CB4result);
                        if ($numRows > 0) {
                            $CB4row = mysql_fetch_array($CB4result);
                            echo '<td>', $CB4row['Position'], '</td>',
                            '<td><span id="', $CB4row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $CB4row['Name'], '</span></td>',
                            '<td>', $CB4row['Overall'], '</td>',
                            '<td>', $CB4row['Age'], '</td>',
                            '<td>', $CB4row['OnTeam'], '</td>',
                            '<td>';
                            if ($CB4row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($CB4row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $CB4row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($CB4row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>CB4</td><td colspan=6>No CB4 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* FS2 Block */
                        $FS2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='FS2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($FS2result);
                        if ($numRows > 0) {
                            $FS2row = mysql_fetch_array($FS2result);
                            echo '<td>', $FS2row['Position'], '</td>',
                            '<td><span id="', $FS2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $FS2row['Name'], '</span></td>',
                            '<td>', $FS2row['Overall'], '</td>',
                            '<td>', $FS2row['Age'], '</td>',
                            '<td>', $FS2row['OnTeam'], '</td>',
                            '<td>';
                            if ($FS2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($FS2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $FS2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($FS2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>FS2</td><td colspan=6>No FS2 on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* SS2 Block */
                        $SS2result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='SS2' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($SS2result);
                        if ($numRows > 0) {
                            $SS2row = mysql_fetch_array($SS2result);
                            echo '<td>', $SS2row['Position'], '</td>',
                            '<td><span id="', $SS2row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $SS2row['Name'], '</span></td>',
                            '<td>', $SS2row['Overall'], '</td>',
                            '<td>', $SS2row['Age'], '</td>',
                            '<td>', $SS2row['OnTeam'], '</td>',
                            '<td>';
                            if ($SS2row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($SS2row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $SS2row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($SS2row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>SS2</td><td colspan=6>No SS2 on Roster</td>';
                        }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#DepthCollpase" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Special Teams
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
                <table class="table" id="offensiveSTDepth" style="font-size: smaller; text-align:center;">
                    <tr>
                        <td>Position</td><td>Name</td><td>Overall</td><td>Age</td><td>Acquired</td><td>Vet/Rookie</td><td>Special Status</td>
                    </tr>
                    <tr>
                        <?php
                        /* K1 Block */
                        $K1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='K1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($K1result);
                        if ($numRows > 0) {
                            $K1row = mysql_fetch_array($K1result);
                            echo '<td>', $K1row['Position'], '</td>',
                            '<td><span id="', $K1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $K1row['Name'], '</span></td>',
                            '<td>', $K1row['Overall'], '</td>',
                            '<td>', $K1row['Age'], '</td>',
                            '<td>', $K1row['OnTeam'], '</td>',
                            '<td>';
                            if ($K1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($K1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $K1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($K1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>Kicker</td><td colspan=6>No Kicker on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* P1 Block */
                        $P1result = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='P1' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($P1result);
                        if ($numRows > 0) {
                            $P1row = mysql_fetch_array($P1result);
                            echo '<td>', $P1row['Position'], '</td>',
                            '<td><span id="', $P1row['Row_ID'], '" class="playerHistory" style="cursor: pointer" data-toggle="popover" title="Player History">', $P1row['Name'], '</span></td>',
                            '<td>', $P1row['Overall'], '</td>',
                            '<td>', $P1row['Age'], '</td>',
                            '<td>', $P1row['OnTeam'], '</td>',
                            '<td>';
                            if ($P1row['Rookie'] === 'R') {
                                echo 'Rookie';
                            } else {
                                echo 'Veteran';
                            }
                            echo '</td>';
                            echo '<td>';
                            if ($P1row['Weapon'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/', $P1row['Weapon'], '.gif" height=25 width=25>';
                            }
                            if ($P1row['OSU'] === "") {
                                
                            } else {
                                echo '<img src="../../_weapons/OSU.png" height=25 width=25>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td>Punter</td><td colspan=6>No Punter on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* KR Block */
                        $KRresult = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='KR' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($KRresult);
                        if ($numRows > 0) {
                            $KRrow = mysql_fetch_array($KRresult);
                            echo '<td>Kick Returner</td>',
                            '<td><span id="', $KRrow['Row_ID'], '" data-toggle="popover" title="Player History">', $KRrow['Name'], '</span></td>',
                            '<td>', $KRrow['Overall'], '</td>',
                            '<td>', $KRrow['Age'], '</td>',
                            '<td colspan=3></td>';
                        } else {
                            echo '<td>Kick Returner</td><td colspan=6>No Kick Returner on Roster</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <?php
                        /* PR Block */
                        $PRresult = mysql_query("SELECT * FROM `{$fran}_players_test` where Position='PR' and Year='{$franYear}'");
                        $numRows = mysql_num_rows($PRresult);
                        if ($numRows > 0) {
                            $PRrow = mysql_fetch_array($PRresult);
                            echo '<td>Punt Returner</td>',
                            '<td><span id="', $PRrow['Row_ID'], '" data-toggle="popover" title="Player History">', $PRrow['Name'], '</span></td>',
                            '<td>', $PRrow['Overall'], '</td>',
                            '<td>', $PRrow['Age'], '</td>',
                            '<td colspan=3></td>';
                        } else {
                            echo '<td>Punt Returner</td><td colspan=6>No Punt Returner on Roster</td>';
                        }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <br>
    <div class="row" style='text-align: center'>
        <a class="btn btn-default yearEdit depthEditbtn" style="display: none" data-toggle="modal" data-target="#depthModal">Edit</a>
    </div>
</div>

<?php
include ('../../_history/player_History.php');
include ('../../_modals/depthchart_Modal.php');
