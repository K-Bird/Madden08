<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>ATL - YR1</title>
        <link href="../../../libs/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../../libs/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <script src="../../../libs/js/jquery.js"></script>
        <script src="../../../libs/js/bootstrap.js"></script>
        <style>
            .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
                background-color: black;
            }
            .pagination li a {                
                color: black;
            }
        </style>
    </head>
    <body style="background-color: #890101; color: #FFFFFF;">

        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="text-align: center">
                    <header><h1>ATL - Year 1</h1></header>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php include ('ATL_Year1_PreSeason_Table.php'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php include ('ATL_Year1_Roster_Table.php'); ?>
                </div>
            </div>
            <?php
            /* | IF USER IS LOGGED IN - Display Depth Chart Forms | */
            if ($_SESSION['Admin'] == true) {
                echo '<div class="row">';
                include ('_Forms/ATL_Year1_RosterForms.php');
                echo '</div>';
            }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <br><br>
                    <?php include ('ATL_Year1_Reg_Table.php'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php include ('ATL_Year1_Team_Table.php'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <br><br>
                    <?php include ('ATL_Year1_Stats_Table.php'); ?>
                </div>
            </div>
            <?php
            /* | IF USER IS LOGGED IN - Display Stat Forms | */
            if ($_SESSION['Admin'] == true) {
                echo '<div class="row">';
                include ('_Forms/ATL_Year1_StatsForms.php');
                echo '</div>';
            }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <br><br>
                    <?php include ('ATL_Year1_Coach_Table.php'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <br><br>
                    <?php include ('ATL_Year1_Offseason_Table.php'); ?>
                </div>
            </div>
            <?php
            /* | IF USER IS LOGGED IN - Display Stat Forms | */
            if ($_SESSION['Admin'] == true) {
                echo '<div class="row">';
                include ('_Forms/ATL_Year1_OffseasonForms.php');
                echo '</div>';
            }
            ?>
            <div class="row" style="text-align: center">
                <div class="col-lg-12">
                    <ul class="pagination">
                        <?php
                        $con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
                        if (!$con) {
                            die('Could not connect!' . mysql_error());
                        }

                        mysql_select_db("gamessitedatabase", $con);

                        $GetCurrentYear = mysql_query("Select * From `gm_madden08--franchises` where `Franchise`='ATL'", $con) or die(mysql_error());
                        $row = mysql_fetch_array($GetCurrentYear);
                        $YearNo = $row['CurrentYear'];

                        for ($i = 1; $i <= $YearNo; $i++) {
                            echo '<li><a href=../Year' . $i . '/ATL_Year' . $i . '.php>Year ' . $i . '</a></li>';
                        }
                        ?>
                    </ul>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </body>
</html>