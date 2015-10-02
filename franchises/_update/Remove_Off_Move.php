<?php

$table = $_POST["table"];
$row = $_POST["row"];
$fran = $_POST["fran"];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);


$getMoveInfo = mysql_query("SELECT * FROM `{$fran}_off_{$table}` where `Row`='{$row}'", $con);
$getMoveInfoRow = mysql_fetch_array($getMoveInfo);

if ($getMoveInfoRow['Type'] === 'retired') {
    $getMoveRow = mysql_query("DELETE FROM `franchise_staging_retired` WHERE MoveRow={$row}", $con);
}
if ($getMoveInfoRow['Type'] === 'draft') {
    $getMoveRow = mysql_query("DELETE FROM `franchise_staging_drafted` WHERE MoveRow={$row}", $con);
}


$deleteMove = mysql_query("DELETE from `{$fran}_off_{$table}` where `Row`='{$row}'", $con) or die(mysql_error());


