<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$editPosition = $_POST['positionEdit'];
$changedNames = $_POST['changedNames'];
$changedOverall = $_POST['changedOverall'];
$changedAge = $_POST['changedAge'];
$changedOnTeam = $_POST['changedOnTeam'];
$changedVetRookie = $_POST['changedVR'];
$changedWeapon = $_POST['changedWeapon'];
$changedOSU = $_POST['changedOSU'];
$franchise = $_POST['franchise'];

foreach ($editPosition as $index => $editPos) {
    if ($editPos != '') {
        if ($changedNames[$index] === '') {
            
        } else {
            $updateName = mysql_query("Update `{$franchise}_players_test` SET Name='{$changedNames[$index]}' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        if ($changedOverall[$index] === '') {
            
        } else {
            $updateOVR = mysql_query("Update `{$franchise}_players_test` SET Overall='{$changedOverall[$index]}' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        if ($changedAge[$index] === '') {
            
        } else {
            $updateAge = mysql_query("Update `{$franchise}_players_test` SET Age='{$changedAge[$index]}' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        if ($changedOnTeam[$index] === '') {
            
        } else {
            $updateOnTeam = mysql_query("Update `{$franchise}_players_test` SET OnTeam='{$changedOnTeam[$index]}' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        if ($changedVetRookie[$index] === 'Rookie') {
            $updateVetRookie = mysql_query("Update `{$franchise}_players_test` SET Rookie='R' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        } else {
            $updateVetRookie = mysql_query("Update `{$franchise}_players_test` SET Rookie='' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        /* Update Weapons Block */
        if ($changedWeapon[$index] === '') {
            $updateWeapon = mysql_query("Update `{$franchise}_players_test` SET Weapon='' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        if ($changedWeapon[$index] === 'Cannon Arm') {
            $updateWeapon = mysql_query("Update `{$franchise}_players_test` SET Weapon='CannonArm' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        if ($changedWeapon[$index] === 'Coverage Corner') {
            $updateWeapon = mysql_query("Update `{$franchise}_players_test` SET Weapon='Coverage' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        if ($changedWeapon[$index] === 'Precision QB') {
            $updateWeapon = mysql_query("Update `{$franchise}_players_test` SET Weapon='Crosshair' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        if ($changedWeapon[$index] === 'Elusive Back') {
            $updateWeapon = mysql_query("Update `{$franchise}_players_test` SET Weapon='Elusive' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        if ($changedWeapon[$index] === 'Power Back') {
            $updateWeapon = mysql_query("Update `{$franchise}_players_test` SET Weapon='Power' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        if ($changedWeapon[$index] === 'Franchise Player') {
            $updateWeapon = mysql_query("Update `{$franchise}_players_test` SET Weapon='Franchise' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        if ($changedWeapon[$index] === 'Heavy Hitter') {
            $updateWeapon = mysql_query("Update `{$franchise}_players_test` SET Weapon='HeavyHitter' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        if ($changedWeapon[$index] === 'Pocket Protector') {
            $updateWeapon = mysql_query("Update `{$franchise}_players_test` SET Weapon='PassBlock' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        if ($changedWeapon[$index] === 'Run Blocker') {
            $updateWeapon = mysql_query("Update `{$franchise}_players_test` SET Weapon='RunBlock' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        if ($changedWeapon[$index] === 'Possession Receiver') {
            $updateWeapon = mysql_query("Update `{$franchise}_players_test` SET Weapon='Possesion' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        if ($changedWeapon[$index] === 'Run Stopper') {
            $updateWeapon = mysql_query("Update `{$franchise}_players_test` SET Weapon='RunStopper' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        if ($changedWeapon[$index] === 'Speed Player') {
            $updateWeapon = mysql_query("Update `{$franchise}_players_test` SET Weapon='Speed' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
        if ($changedOSU[$index] === 'Buckeye') {
            $updateOSU = mysql_query("Update `{$franchise}_players_test` SET OSU='Y' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        } else {
            $updateOSU = mysql_query("Update `{$franchise}_players_test` SET OSU='' WHERE ROW_ID='{$editPos}'", $con) or die(mysql_error());
        }
    }
}


 