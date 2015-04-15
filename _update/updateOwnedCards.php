<?php

$newVal = $_POST['newValue'];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');

if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$updateCardsOwned = mysql_query("Update `tracking_cards` set `Value`={$newVal} where `Info` = 'OwnedCards'", $con);

header('Location: ' . $_SERVER['HTTP_REFERER']);