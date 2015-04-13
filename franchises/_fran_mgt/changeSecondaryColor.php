<?php

$fran = $_GET["fran"];
$hex = $_GET["hex"];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$updatePColor = mysql_query("Update `franchise_info` set SecondaryColor = '$hex' Where Franchise = '$fran'", $con) or die(mysql_error());
mysql_close($con);

echo $hex;

