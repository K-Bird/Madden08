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
    if ($Position_Row['Weapon'] != "") {
        $weapon = '&nbsp;<img src=../libs/images/weapons/'.$Position_Row['Weapon'].'.gif height=20 width=20>';
    }
    return '<button type="button" class="btn btn-default" data-toggle="modal" data-target="#detail' . $Position_Row['Position'] . 'Modal" title="' . $Position_Row['Name'] . '">'. $Position . ': ' . $Position_Row['Overall'].$weapon.'</button>';
}

function return_depth_result_tree($Positions, $View_Year, $Curr_Team) {

    foreach ($Positions as $Pos) {

        $Pos_Result = db_query("SELECT * FROM `franchise_year_roster` WHERE Year='{$View_Year}' and Team='{$Curr_Team}' and Position='{$Pos}' ORDER BY Position ASC");

        if (mysqli_num_rows($Pos_Result) == 0) {
            
        } else {
            $Pos_Row = $Pos_Result->fetch_assoc();
            echo '<li data-toggle="modal" data-target="#detail' . $Pos_Row['Position'] . 'Modal">' . $Pos_Row['Position'] .
            ' - Overall: ' . $Pos_Row['Overall'] . ' : ' .
            $Pos_Row['Name'] . ' - Age: ' .
            $Pos_Row['Age'];

            if ($Pos === 'KR' || $Pos === 'PR') {
                
            } else {

                echo ' - [ ' .
                $Pos_Row['Acquired'] . ' ] ';
                if ($Pos_Row['Rookie'] === 'R') {
                    echo ' - Rookie';
                } else {
                    echo ' - Veteran';
                }
                if ($Pos_Row['OSU'] === "Y") {
                    echo '&nbsp;<img src=../libs/images/OSU.png height=20 width=20>';
                }
                if ($Pos_Row['Weapon'] != "") {
                    echo '&nbsp;<img src=../libs/images/weapons/', $Pos_Row['Weapon'], '.gif height=20 width=20>';
                }
            }
            echo '</li>';
        }
    }
}
