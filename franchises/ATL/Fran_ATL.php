<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>ATL - GC</title>
        <link href="../../libs/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../libs/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <script src="../../libs/js/jquery.js"></script>
        <script src="../../libs/js/bootstrap.js"></script>
    </head>
    <body>
        <div class="container" style="text-align: center">
            <div class="row">
                <div class="col-lg-12">
                    <img src="ATL_Logo.png"></img>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <header><h1>Atlanta Falcons</h1></header>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="btn-group">
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
                            echo '<a class="btn btn-default" href=Year'.$i.'/ATL_Year'.$i.'.php>Year '.$i.'</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>