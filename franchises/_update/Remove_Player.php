<?php

$fran = $_POST["fran"];
$row = $_POST["row"];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$insert = mysql_query("DELETE from `{$fran}_players` where `Row_ID`='{$row}'", $con) or die(mysql_error());


