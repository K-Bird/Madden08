<?php

$Get_Team_View_Info = db_query("Select * From `franchise_view_controls` WHERE Control='franchise_current_team'");
$View_Team_Row = $Get_Team_View_Info->fetch_assoc();
$Curr_Team = $View_Team_Row['Value'];

$Get_Year_View_Info = db_query("Select * From `franchise_view_controls` WHERE Control='franchise_current_year'");
$View_Year_Row = $Get_Year_View_Info->fetch_assoc();
$View_Year = $View_Year_Row['Value'];

$Get_Year_Depth_View = db_query("Select * From `franchise_view_controls` WHERE Control='franchise_depth_view'");
$Depth_View_Row = $Get_Year_Depth_View->fetch_assoc();
$Depth_View = $Depth_View_Row['Value'];

$Get_Year_Depth_Formation = db_query("Select * From `franchise_view_controls` WHERE Control='franchise_depth_formation'");
$Depth_Formation_Row = $Get_Year_Depth_Formation->fetch_assoc();
$Depth_Formation = $Depth_Formation_Row['Value'];

$Check_Backups_Display_Result = db_query("SELECT `Value` FROM `franchise_view_controls` WHERE Control='franchise_depth_backups'");
$Check_Backups_Display_Value = $Check_Backups_Display_Result->fetch_assoc();

function return_depth_result_position($Position, $View_Year, $Curr_Team) {

    $Position_Result = db_query("SELECT * FROM `franchise_year_roster` WHERE Year='{$View_Year}' and Team='{$Curr_Team}' and Position='{$Position}'");
    $Position_Row = $Position_Result->fetch_assoc();
    $weapon = '';
    if ($Position_Row['Weapon'] != "None") {
        $weapon = '&nbsp;<img src=../libs/images/weapons/'.$Position_Row['Weapon'].'.gif height=20 width=20>';
    }
    return '<span data-toggle="tooltip" data-placement="top" title="'. $Position_Row['Name'] . '">'
    . '<button type="button" class="btn btn-default" data-toggle="modal" data-target="#detail' . $Position_Row['Position'] . 'Modal" title="' . $Position_Row['Name'] . '">'. $Position . ': ' . $Position_Row['Overall'].$weapon.'</button></span>';
}

function return_depth_result_tree($Positions, $View_Year, $Curr_Team) {

    foreach ($Positions as $Pos) {

        $Pos_Result = db_query("SELECT * FROM `franchise_year_roster` WHERE Year='{$View_Year}' and Team='{$Curr_Team}' and Position='{$Pos}' ORDER BY Position ASC");

        if (mysqli_num_rows($Pos_Result) == 0) {
            
        } else {
            $Pos_Row = $Pos_Result->fetch_assoc();
            echo '<li data-toggle="modal" data-target="#detail' . $Pos_Row['Position'] . 'Modal">'
                    
            . '<div class="treeDepthCell" style="width: 65px"><span class="label label-default">' . $Pos_Row['Position'] . '</span></div>'
            . '<div class="treeDepthCell" style="width: 100px;"><span class="label label-default">Overall: ' . $Pos_Row['Overall'] . '</span></div>'
            . '<div class="treeDepthCell" style="width: 150px"><span class="label label-default">' . $Pos_Row['Name'] . '</span></div>'
            . '<div class="treeDepthCell" style="width: 65px"><span class="label label-default">Age: ' . $Pos_Row['Age']. '</span></div>';

            if ($Pos === 'KR' || $Pos === 'PR') {
                
            } else {

                echo '<div class="treeDepthCell" style="width: 80px"><span class="label label-default">' . $Pos_Row['Acquired'] . '</span></div>';
                echo '<div class="treeDepthCell" style="width: 55px"><span class="label label-default">';
                if ($Pos_Row['Rookie'] === 'R') {
                    echo 'Rookie';
                } else {
                    echo 'Veteran';
                }
                echo '</span></div>';
                echo '<div class="treeDepthCell" style="width: 45px">';
                if ($Pos_Row['Weapon'] != "None") {
                    echo '<img src=../libs/images/weapons/', $Pos_Row['Weapon'], '.gif height=20 width=20>';
                }
                echo'</div>';
                echo '<div class="treeDepthCell" style="width: 45px">';
                if ($Pos_Row['OSU'] === "Y") {
                    echo '&nbsp;<img src=../libs/images/OSU.png height=20 width=20>';
                }
                echo '</div>';
            }
            echo '</li>';
        }
    }
}
