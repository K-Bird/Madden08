<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/madden08/libs/db/common_db_functions.php");
?>
<html>
    <head>
        <title>Madden '08</title>
        <link href="libs/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="libs/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <link href="libs/css/simple-sidebar.css" rel="stylesheet" type="text/css">
        <script src="libs/js/jquery.js"></script>
        <script src="libs/js/bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $("#menu-toggle").click(function (e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });
            });
        </script>
    </head>
    <body>
        <div id="wrapper">
            <?php $NavLevel = 'top';
            include ('nav/master_nav.php');
            ?>
            <div id="page-content-wrapper" style="text-align : center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <span id="menu-toggle" class="glyphicon glyphicon glyphicon-tasks" style="float: left" aria-hidden="true"></span>
                                    Home
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>