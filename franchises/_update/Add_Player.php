<?php

$addName = $_POST['addName'];
$addOverall = $_POST['addOverall'];
$addAge = $_POST['addAge'];
$addOnTeam = $_POST['addOnTeam'];
$addVetRookie = $_POST['addVR'];
$addWeapon = $_POST['addWeapon'];
$addOSU = $_POST['addOSU'];
$franchise = $_POST['fran'];
$franchiseYear = $_POST['franYear'];
$position = $_POST['pos'];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$addNewPlayer = mysql_query("Insert into `{$franchise}_players` (Name, Position, Overall, Age, Weapon, OnTeam, Rookie, OSU, Year) Values ('{$addName}','{$position}','{$addOverall}','{$addAge}','{$addWeapon}','{$addOnTeam}','{$addVetRookie}','{$addOSU}','{$franchiseYear}')", $con);
$updateHistoricalID = mysql_query("Update `{$franchise}_players` set `Historical_ID` = `Row_ID` where `Year`={$franchiseYear} and `Position`='$position'", $con);