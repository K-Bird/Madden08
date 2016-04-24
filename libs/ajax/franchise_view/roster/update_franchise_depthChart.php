<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$editPosition = $_POST['positionEdit'];
$editDepthPOS = $_POST['depthPOSedit'];
$changedNames = $_POST['changedNames'];
$changedOverall = $_POST['changedOverall'];
$changedAge = $_POST['changedAge'];
$changedOnTeam = $_POST['changedOnTeam'];
$changedVetRookie = $_POST['changedVR'];
$changedWeapon = $_POST['changedWeapon'];
$changedOSU = $_POST['changedOSU'];


foreach ($editPosition as $index => $editPos) {
    if ($editPos != '') {
        if ($editDepthPOS[$index] === '') {
            
        } else {
            $found = false;
            $pullCurrentDepthPOS = db_query("SELECT * FROM `franchise_year_roster` WHERE Row_ID='{$editPos}'");
            while ($currentPOSRow = $pullCurrentDepthPOS->fetch_assoc()) {
                if ($currentPOSRow['Position'] === $editDepthPOS[$index]) {
                    $found = true;
                }
            }
            if ($found === false) {
                $updateDepthPOS = db_query("Update `franchise_year_roster` SET Position='{$editDepthPOS[$index]}' WHERE ROW_ID='{$editPos}'");
            }
        }
        if ($changedNames[$index] === '') {
            
        } else {
            $changedNameEscaped = mysql_real_escape_string($changedNames[$index]);
            $updateName = db_query("Update `franchise_year_roster` SET Name='{$changedNameEscaped}' WHERE ROW_ID='{$editPos}'");
        }
        if ($changedOverall[$index] === '') {
            
        } else {
            $updateOVR = db_query("Update `franchise_year_roster` SET Overall='{$changedOverall[$index]}' WHERE ROW_ID='{$editPos}'");
        }
        if ($changedAge[$index] === '') {
            
        } else {
            $updateAge = db_query("Update `franchise_year_roster` SET Age='{$changedAge[$index]}' WHERE ROW_ID='{$editPos}'");
        }
        if ($changedOnTeam[$index] === '') {
            
        } else {
            $updateOnTeam = db_query("Update `franchise_year_roster` SET Acquired='{$changedOnTeam[$index]}' WHERE ROW_ID='{$editPos}'");
        }
        if ($changedVetRookie[$index] === 'Rookie') {
            $updateVetRookie = db_query("Update `franchise_year_roster` SET Rookie='R' WHERE ROW_ID='{$editPos}'");
        } else {
            $updateVetRookie = db_query("Update `franchise_year_roster` SET Rookie='' WHERE ROW_ID='{$editPos}'");
        }
        if ($changedWeapon[$index] === '') {
            $updateWeapon = db_query("Update `franchise_year_roster` SET Weapon='' WHERE ROW_ID='{$editPos}'");
        } else {
            $updateWeapon = db_query("Update `franchise_year_roster` SET Weapon='{$changedWeapon[$index]}' WHERE ROW_ID='{$editPos}'");
        }
        if ($changedOSU[$index] === 'Buckeye') {
            $updateOSU = db_query("Update `franchise_year_roster` SET OSU='Y' WHERE ROW_ID='{$editPos}'");
        } else {
            $updateOSU = db_query("Update `franchise_year_roster` SET OSU='' WHERE ROW_ID='{$editPos}'");
        }
    }
}


 