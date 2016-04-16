<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$row = $_POST["row"];
$field= $_POST["field"];
$NewValue = $_POST["newVal"];

$result = db_query("Update `franchise_year_off_coach` set {$field} = '{$NewValue}' Where Row='{$row}'");
$check = db_query("Select * from `franchise_year_off_coach` Where Row='{$row}'");
$checkRow = $check->fetch_assoc();
echo $checkRow[$field];
return;