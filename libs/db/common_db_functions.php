<?php

function db_connect() {

    // Define connection as a static variable, to avoid connecting more than once 
    static $connection;

    // Try and connect to the database, if a connection has not been established yet
    if (!isset($connection)) {
        // Load configuration as an array. Use the actual location of your configuration file
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '../../db_configs/db_madden08.ini');
        $connection = mysqli_connect('localhost', $config['username'], $config['password'], $config['dbname']);
    }

    // If connection was not successful, handle the error
    if ($connection === false) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        return mysqli_connect_error();
    }
    return $connection;
}

function db_query($query) {
    // Connect to the database
    $connection = db_connect();

    // Query the database
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    return $result;
}

function db_quote($value) {
    $connection = db_connect();
    return "'" . mysqli_real_escape_string($connection, $value) . "'";
}

function getTeamFullName($franAbbrev) {

    $getFullTeamName = db_query("SELECT * FROM `franchise_info` WHERE Franchise='{$franAbbrev}'");
    $fetchFullName = $getFullTeamName->fetch_assoc();
    $fullName = $fetchFullName['FullName'];
    return $fullName;
}

function checkFranPositionExists($fran, $year, $pos) {

    $num_rows = mysqli_num_rows(db_query("SELECT * FROM `franchise_year_roster` WHERE Position='{$pos}' AND Team='{$fran}' AND Year='{$year}'"));

    if ($num_rows === 0) {
        return '<td class="danger">' . $pos . '</td>';
    }
    if ($num_rows === 1) {
        return '<td class="success">' . $pos . '</td>';
    }
    if ($num_rows > 1) {
        return '<td class="warning">' . $pos . '</td>';
    }
}

function checkInfoExists($fran, $year, $type, $field, $fieldValue, $testValue, $franField) {

    $getInfo = db_query("SELECT * FROM `franchise_year_{$type}` WHERE {$field}='{$fieldValue}' AND {$franField}='{$fran}' AND Year='{$year}'");
    $fetchInfo = $getInfo->fetch_assoc();
    $value = $fetchInfo[$testValue];

    if ($value === '' || $value === null) {
        return '<td class="danger">' . $value . '</td>';
    } else {
        return '<td class="success">' . $value . '</td>';
    }

}

function franchiseActiveYears($fran) {

    $getActiveYears = db_query("SELECT * FROM `franchise_info` WHERE Franchise='{$fran}'");
    $fetchActiveYears = $getActiveYears->fetch_assoc();
    $activeYears = $fetchActiveYears['CurrentYear'];
    return $activeYears;
}
