<?php

$moveType = $_POST['moveType'];
$position = $_POST['pos'];
$playerName = mysql_real_escape_string($_POST['player']);
$ovr = $_POST['Ovr'];
$age = $_POST['Age'];
$draft = $_POST['Draft'];
$franchise = $_POST['fran'];
$franYear = $_POST['franYear'];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');

if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$addNewMove = mysql_query("Insert into `{$franchise}_off_moves` (Player, Position, Overall, Age, Draft, Year, Type) Values ('{$playerName}','{$position}','{$ovr}','{$age}','{$draft}','{$franYear}','{$moveType}')", $con) or die(mysql_error());

header('Location: ' . $_SERVER['HTTP_REFERER']);