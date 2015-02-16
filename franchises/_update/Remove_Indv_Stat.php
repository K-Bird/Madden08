<?php

$table = $_POST["table"];
$row = $_POST["row"];
$fran = $_POST["fran"];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$insert = mysql_query("DELETE from `{$fran}_stats_{$table}` where `Row`='{$row}'", $con) or die(mysql_error());


