<?php

$row = $_POST["row"];
$col = $_POST["col"];
$NewValue = mysql_real_escape_string($_POST["newVal"]);
$fran = $_POST['fran'];
$year = $_POST ['year'];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$result = mysql_query("Update `{$fran}_off_coach-chg` set {$col} = '$NewValue' Where Row={$row} and Year={$year}", $con) or die(mysql_error());
$check = mysql_query("Select * from `{$fran}_off_coach-chg` Where Row={$row} and Year={$year}", $con) or die(mysql_error());
$checkRow = mysql_fetch_array($check) or die(mysql_error());
echo $checkRow[$col];
mysql_close($con);
return;