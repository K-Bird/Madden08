<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>ATL - YR2</title>
        <link href="../../../_CSS/Bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../../_CSS/Bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <script src="../../../_Scripts/JQuery/JQuery.js"></script>
        <script src="../../../_Scripts/Bootstrap/bootstrap.min.js"></script>
        <script src="_Update/Franchise_JS_Functions.js"></script>
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
                <div class="col-lg-12">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container">
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <?php
                                    $con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
                                    if (!$con) {
                                        die('Could not connect!' . mysql_error());
                                    }

                                    mysql_select_db("madden08_db", $con);

                                    $GetCurrentYear = mysql_query("Select * From `franchise_info` where `Franchise`='ATL'", $con) or die(mysql_error());
                                    $row = mysql_fetch_array($GetCurrentYear);
                                    $YearNo = $row['CurrentYear'];
                                    
                                    echo '<li><a href="#">',$row['FullName'],': </a></li>';
                                    
                                    for ($i = 1; $i <= $YearNo; $i++) {
                                        echo '<li><a href=../Year' . $i . '/ATL_Year' . $i . '.php>Year ' . $i . '</a></li>';
                                    }
                                    ?>
                                    <li><a href="#menu-toggle" id="menu-toggle">Toggle Navigation</a></li>

                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" style="text-align: center">
                    <header><h1>ATL - Year 2</h1></header>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php include ('ATL_Year2_PreSeason_Table.php'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php include ('ATL_Year2_Roster_Table.php'); ?>
                </div>
            </div>
            <?php
            /* | IF USER IS LOGGED IN - Display Depth Chart Forms | */
            if ($_SESSION['Admin'] == true) {
                echo '<div class="row">';
                include ('_Forms/ATL_Year2_RosterForms.php');
                echo '</div>';
            }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <br><br>
                    <?php include ('ATL_Year2_Reg_Table.php'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php include ('ATL_Year2_Team_Table.php'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <br><br>
                    <?php include ('ATL_Year2_Stats_Table.php'); ?>
                </div>
            </div>
            <?php
            /* | IF USER IS LOGGED IN - Display Stat Forms | */
            if ($_SESSION['Admin'] == true) {
                echo '<div class="row">';
                include ('_Forms/ATL_Year2_StatsForms.php');
                echo '</div>';
            }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <br><br>
                    <?php include ('ATL_Year2_Coach_Table.php'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <br><br>
                    <?php include ('ATL_Year2_Offseason_Table.php'); ?>
                </div>
            </div>
            <?php
            /* | IF USER IS LOGGED IN - Display Stat Forms | */
            if ($_SESSION['Admin'] == true) {
                echo '<div class="row">';
                include ('_Forms/ATL_Year2_OffseasonForms.php');
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