<?php

$comp = $_POST['comp'];
$row = $_POST['row'];
$diff = $_POST['diff'];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
    if (!$con) {
        die('Could not connect!' . mysql_error());
    }

    mysql_select_db("madden08_db", $con);
    
    if($comp === 'N') {
        $newVal = '';
    } else {
        $newVal = '<img src=_images/Checkmark.png height=48 width =48>';
}

    $result = mysql_query("Update `tracking_minicamp` set `{$diff}`='$newVal' Where Row='$row'", $con) or die(mysql_error());