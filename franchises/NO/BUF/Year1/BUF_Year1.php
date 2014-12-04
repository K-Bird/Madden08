<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>NewFran - YR1</title>
        <link href="../../../_CSS/Main.css" rel="stylesheet" type="text/css" />
        <script src="_Update/Franchise_JS_Functions.js"></script>
    </head>
    <body style="background-color:MidnightBlue">
        <?php include ('../../../_NavBars/navbarYear.php'); ?>
        <header><h1>NewFran - Year #</h1></header>
        <?php include ('buf_Year1_PreSeason_Table.php'); ?>
        <br>
        <!-- Roster Table -->
        <?php include ('buf_Year1_Roster_Table.php'); ?>
        <br>
        <!-- Season Tables -->
        <?php include ('buf_Year1_Reg_Table.php'); ?>
        <br>
        <?php include ('buf_Year1_Team_Table.php'); ?>
        <br>
        <?php include ('buf_Year1_Stats_Table.php'); ?>
        <br>
        <!-- Offseason Tables -->
        <?php include ('buf_Year1_Coach_Table.php'); ?>
        <br>
        <?php include ('buf_Year1_Offseason_Table.php'); ?>
        <br>
        <a href="../Year2/NewFran_Year2.php">Year 2</a><br>
    </body>
</html>