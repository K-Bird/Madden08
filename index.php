<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/madden08/libs/db/common_db_functions.php");
?>
<html>
    <head>
        <title>Madden '08</title>
        <link rel="shortcut icon" href="libs/images/nfl.png">
        <link href="libs/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="libs/css/simple-sidebar.css" rel="stylesheet" type="text/css">
        <link href="libs/css/open-iconic-bootstrap.css" rel="stylesheet" type="text/css">
        <script src="libs/js/jquery.js"></script>
        <script src="libs/js/bootstrap.js"></script>
        <script src="libs/js/common.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <?php
            $NavLevel = 'top';
            include ('nav/master_nav.php');
            ?>
            <div id="page-content-wrapper" style="text-align : center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <span id="menu-toggle" style="float: left" class="oi oi-chevron-left"></span>
                                    Home - Test
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>