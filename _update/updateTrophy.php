<?php

$newVal = $_POST['newValue'];
$row = $_POST['row'];
$diff = $_POST['diff'];

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
    if (!$con) {
        die('Could not connect!' . mysql_error());
    }

    mysql_select_db("madden08_db", $con);
    
    if($newVal === 'None') {
        $trophy = '';
    } else {
        $trophy = '<img src=_images/'.$newVal.'.png height=48 width =48>';
}

    $result = mysql_query("Update `tracking_minicamp` set `{$diff}`='$trophy' Where Row='$row'", $con) or die(mysql_error());