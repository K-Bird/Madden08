<?php

$editRow = $_POST["row"];
$col = $_POST["col"];
$fran = $_POST['fran'];
$table = $_POST['table'];
$newVal = $_POST['NewVal'];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$result = mysql_query("Update `{$fran}_{$table}` set {$col} = '$newVal' Where Row={$editRow}", $con) or die(mysql_error());
$check = mysql_query("Select * from `{$fran}_{$table}` Where Row={$editRow}", $con) or die(mysql_error());
$checkRow = mysql_fetch_array($check) or die(mysql_error());
echo $checkRow[$col];
mysql_close($con);
header('Location: ' . $_SERVER['HTTP_REFERER']);