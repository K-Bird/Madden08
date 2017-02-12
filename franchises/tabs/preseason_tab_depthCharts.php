<br>
<div class="col-lg-4">
    <label>Depth Chart View: </label>
    <select id="preseason_depthView_input" class="form-control" data-franchise=<?php echo $Curr_Team; ?> data-year=<?php echo $View_Year; ?> name="depthchart_view_list" style="width: 150px">
        <option <?php
        if ($Depth_View === 'Position') {
            echo 'selected ';
        }
        ?> value="Position">Position</option>
        <option <?php
        if ($Depth_View === 'Tree') {
            echo 'selected ';
        }
        ?> value="Tree">Tree</option>
    </select>
</div>
<div class="col-lg-4">
    <div class="checkbox" style="<?php
    if ($Depth_View === 'Tree') {
        echo 'display: none';
    } else {
        echo 'text-align: center';
    }
    ?>">
        <input id="Preseason_Backups_Input" type="checkbox" <?php
        if ($Check_Backups_Display_Value['Value'] === 'Y') {
            echo 'checked';
        }
        ?> value=""><label>Display Backups</label>
    </div>
</div>
<div class="col-lg-4" style="<?php
if ($Depth_View === 'Tree') {
    echo 'display: none';
} else {
    
}
?>">
    <label>Defensive Formation: </label>
    <select id="preseason_depthFormation_input" class="form-control" data-franchise=<?php echo $Curr_Team; ?> data-year=<?php echo $View_Year; ?> name="depthchart_formation_list" style="width: 75px">
        <option <?php
        if ($Depth_Formation === '3-4') {
            echo 'selected ';
        }
        ?> value="3-4">3-4</option>
        <option <?php
        if ($Depth_Formation === '4-3') {
            echo 'selected ';
        }
        ?> value="4-3">4-3</option>
    </select>
</div>
<br><br><br>
<!-- [ Depth Chart: Tree View ] -->
<div id="jstree" style="<?php
if ($Depth_View === 'Position') {
    echo 'display: none';
}
?>">
    <ul>
        <li> Offense
            <ul>
                <li>Quarterbacks
                    <ul>
                        <?php
                        echo return_depth_result_tree(array("QB1", "QB2"), $View_Year, $Curr_Team);
                        ?>
                    </ul>
                </li>
                <li>Running Backs
                    <ul>
                        <?php
                        echo return_depth_result_tree(array("HB1", "HB2", "HB3", "FB1", "FB2"), $View_Year, $Curr_Team);
                        ?>
                    </ul>
                </li>
                <li>Wide Receivers
                    <ul>
                        <?php
                        echo return_depth_result_tree(array("WR1", "WR2", "WR3", "WR4"), $View_Year, $Curr_Team);
                        ?>
                    </ul>
                </li>
                <li>Tight Ends
                    <ul>
                        <?php
                        echo return_depth_result_tree(array("TE1", "TE2"), $View_Year, $Curr_Team);
                        ?>                    
                    </ul>
                </li>
                <li>Offensive Line
                    <ul>
                        <?php
                        echo return_depth_result_tree(array("LT1", "LT2", "LG1", "LG2", "C1", "C2", "RG1", "RG2", "RT1", "RT2"), $View_Year, $Curr_Team);
                        ?>                       
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            Defense
            <ul>
                <li>Defensive Line
                    <ul>
                        <?php
                        echo return_depth_result_tree(array("LE1", "DT1", "RE1", "LE2", "DT2", "RE2"), $View_Year, $Curr_Team);
                        ?>
                    </ul>
                </li>
                <li>Linebackers
                    <ul>
                        <?php
                        echo return_depth_result_tree(array("LOLB1", "MLB1", "ROLB1", "LOLB2", "MLB2", "ROLB2"), $View_Year, $Curr_Team);
                        ?>
                    </ul>
                </li>
                <li>Defensive Backs
                    <ul>
                        <?php
                        echo return_depth_result_tree(array("CB1", "CB2", "FS1", "SS1", "CB3", "CB4", "FS2", "SS2"), $View_Year, $Curr_Team);
                        ?>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            Special Teams
            <ul>
                <li>Kicker
                    <ul>
                        <?php
                        echo return_depth_result_tree(array("K1"), $View_Year, $Curr_Team);
                        ?>  
                    </ul>
                </li>
                <li>Punter
                    <ul>
                        <?php
                        echo return_depth_result_tree(array("P1"), $View_Year, $Curr_Team);
                        ?> 
                    </ul>
                </li>
                <li>Returners
                    <ul>
                        <?php
                        echo return_depth_result_tree(array("KR", "PR"), $View_Year, $Curr_Team);
                        ?>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- [ Depth Chart: Position View ] -->
<table class="table table-condensed borderless" style="<?php
if ($Depth_View === 'Tree') {
    echo 'display: none';
} else {
    echo 'text-align: center';
}
?>">
    <tr>
        <td><br></td>
        <td><br></td>
        <td><br></td>
        <td><br></td>
        <td>
            <?php
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo return_depth_result_position("FS2", $View_Year, $Curr_Team);
                echo '<br><br>';
            }
            echo return_depth_result_position("FS1", $View_Year, $Curr_Team);
            ?>
        </td>
        <td><br></td>
        <td>
            <?php
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo return_depth_result_position("SS2", $View_Year, $Curr_Team);
                echo '<br><br>';
            }
            echo return_depth_result_position("SS1", $View_Year, $Curr_Team);
            ?>
        </td>
        <td><br></td>
        <td><br></td>
        <td><br></td>
        <td><br></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>
            <?php
            if ($Depth_Formation === '3-4') {
                if ($Check_Backups_Display_Value['Value'] === 'Y') {
                    echo return_depth_result_position("LOLB2", $View_Year, $Curr_Team);
                    echo '<br><br>';
                }
                echo return_depth_result_position("LOLB1", $View_Year, $Curr_Team);
            }
            ?>
        </td>
        <td>
            <?php
            if ($Depth_Formation === '4-3') {
                if ($Check_Backups_Display_Value['Value'] === 'Y') {
                    echo return_depth_result_position("LOLB2", $View_Year, $Curr_Team);
                    echo '<br><br>';
                }
                echo return_depth_result_position("LOLB1", $View_Year, $Curr_Team);
            }
            ?>
        </td>
        <td>
            <?php
            if ($Depth_Formation === '3-4') {
                echo return_depth_result_position("MLB1", $View_Year, $Curr_Team);
            }
            ?>
        </td>
        <td>
            <?php
            if ($Depth_Formation === '4-3') {
                if ($Check_Backups_Display_Value['Value'] === 'Y') {
                    echo return_depth_result_position("MLB2", $View_Year, $Curr_Team);
                    echo '<br><br>';
                }
                echo return_depth_result_position("MLB1", $View_Year, $Curr_Team);
            }
            ?>
        </td>
        <td>
            <?php
            if ($Depth_Formation === '3-4') {
                echo return_depth_result_position("MLB2", $View_Year, $Curr_Team);
            }
            ?>
        </td>
        <td>
            <?php
            if ($Depth_Formation === '4-3') {
                if ($Check_Backups_Display_Value['Value'] === 'Y') {
                    echo return_depth_result_position("ROLB2", $View_Year, $Curr_Team);
                    echo '<br><br>';
                }
                echo return_depth_result_position("ROLB1", $View_Year, $Curr_Team);
            }
            ?>
        </td>
        <td>
            <?php
            if ($Depth_Formation === '3-4') {
                if ($Check_Backups_Display_Value['Value'] === 'Y') {
                    echo return_depth_result_position("ROLB2", $View_Year, $Curr_Team);
                    echo '<br><br>';
                }
                echo return_depth_result_position("ROLB1", $View_Year, $Curr_Team);
            }
            ?>
        </td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr style=" border-bottom:2pt solid black">
        <td>
            <?php
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo return_depth_result_position("CB4", $View_Year, $Curr_Team);
                echo '<br><br>';
            }
            echo return_depth_result_position("CB1", $View_Year, $Curr_Team);
            ?>
        </td>
        <td></td>
        <td></td>
        <td>
            <?php
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo return_depth_result_position("LE2", $View_Year, $Curr_Team);
                echo '<br><br>';
            }
            echo return_depth_result_position("LE1", $View_Year, $Curr_Team);
            ?>
        </td>
        <!-- [COMM1] Check the Defensive Formation: Display Appropriate Merged Cell Combination -->
        <?php
        if ($Depth_Formation === '4-3') {
            echo '<td colspan="3">';
            echo return_depth_result_position("DT1", $View_Year, $Curr_Team);
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            echo return_depth_result_position("DT2", $View_Year, $Curr_Team);
        }
        echo '</td>';

        if ($Depth_Formation === '3-4') {
            echo '<td colspan="3">';
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo return_depth_result_position("DT2", $View_Year, $Curr_Team);
                echo '<br><br>';
            }
            echo return_depth_result_position("DT1", $View_Year, $Curr_Team);
        }
        echo '</td>';
        ?>
        <!-- / [COMM1] -->
        <td>
            <?php
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo return_depth_result_position("RE2", $View_Year, $Curr_Team);
                echo '<br><br>';
            }
            echo return_depth_result_position("RE1", $View_Year, $Curr_Team);
            ?>
        </td>
        <td></td>
        <td></td>
        <td>
            <?php
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo return_depth_result_position("CB3", $View_Year, $Curr_Team);
                echo '<br><br>';
            }
            echo return_depth_result_position("CB2", $View_Year, $Curr_Team);
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            echo return_depth_result_position("WR1", $View_Year, $Curr_Team);
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo '<br><br>';
                echo return_depth_result_position("WR2", $View_Year, $Curr_Team);
            }
            ?>
        </td>
        <td></td>
        <td></td>
        <td>
            <?php
            echo return_depth_result_position("LT1", $View_Year, $Curr_Team);
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo '<br><br>';
                echo return_depth_result_position("LT2", $View_Year, $Curr_Team);
            }
            ?>
        </td>
        <td>
            <?php
            echo return_depth_result_position("LG1", $View_Year, $Curr_Team);
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo '<br><br>';
                echo return_depth_result_position("LG2", $View_Year, $Curr_Team);
            }
            ?>
        </td>
        <td>
            <?php
            echo return_depth_result_position("C1", $View_Year, $Curr_Team);
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo '<br><br>';
                echo return_depth_result_position("C2", $View_Year, $Curr_Team);
            }
            ?>
        </td>
        <td>
            <?php
            echo return_depth_result_position("RG1", $View_Year, $Curr_Team);
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo '<br><br>';
                echo return_depth_result_position("RG2", $View_Year, $Curr_Team);
            }
            ?>
        </td>
        <td>
            <?php
            echo return_depth_result_position("RT1", $View_Year, $Curr_Team);
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo '<br><br>';
                echo return_depth_result_position("RT2", $View_Year, $Curr_Team);
            }
            ?>
        </td>
        <td></td>
        <td></td>
        <td>
            <?php
            echo return_depth_result_position("WR2", $View_Year, $Curr_Team);
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo '<br><br>';
                echo return_depth_result_position("WR3", $View_Year, $Curr_Team);
            }
            ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <?php
            echo return_depth_result_position("QB1", $View_Year, $Curr_Team);
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo '<br><br>';
                echo return_depth_result_position("QB2", $View_Year, $Curr_Team);
            }
            ?>
        </td>
        <td></td>
        <td></td>
        <td>
            <?php
            echo return_depth_result_position("TE1", $View_Year, $Curr_Team);
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo '<br><br>';
                echo return_depth_result_position("TE2", $View_Year, $Curr_Team);
            }
            ?>
        </td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <?php
            echo return_depth_result_position("FB1", $View_Year, $Curr_Team);
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo '<br><br>';
                echo return_depth_result_position("FB2", $View_Year, $Curr_Team);
            }
            ?>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <?php
            echo return_depth_result_position("HB1", $View_Year, $Curr_Team);
            if ($Check_Backups_Display_Value['Value'] === 'Y') {
                echo '<br><br>';
                echo return_depth_result_position("HB2", $View_Year, $Curr_Team);
                echo '<br><br>';
                echo return_depth_result_position("HB3", $View_Year, $Curr_Team);
            }
            ?>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
<br>
<a class="btn btn-default franViewEdit" style="display: none" data-toggle="modal" data-target="#editDepthModal">Edit Depth Chart</a>
<a class="btn btn-default franViewEdit" style="display: none" data-toggle="modal" data-target="#removeDepthModal">Remove From Depth Chart</a>