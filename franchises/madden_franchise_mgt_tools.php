<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$fran = $_POST['fran'];

$num_years = franchiseActiveYears($fran);
?>
<html>
    <head>
        <title>Franchise Mgt Tools - <?php echo $fran; ?></title>
        <link href="../libs/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../libs/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <link href="../libs/css/simple-sidebar.css" rel="stylesheet" type="text/css">       
        <script src="../libs/js/jquery.js"></script>
        <script src="../libs/js/bootstrap.js"></script>
        <script src="../libs/js/common_functions.js"></script>
        <script src="../libs/js/fran_mgt_functions.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <?php
            $NavLevel = '2nd';
            include ('../nav/master_nav.php');
            ?>
            <div id="page-content-wrapper" style="text-align : center">
                <div class="container-fluid">
                    <div class="row" style="text-align: center">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <span id="menu-toggle" class="glyphicon glyphicon glyphicon-tasks" style="float: left" aria-hidden="true"></span>
                                    Franchise Management Tools - <?php echo getTeamFullName($fran); ?>
                                    <span style="float: right"><img src="../libs/images/franchises/<?= $fran ?>_Logo.png" height=25 width=40></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-1">

                        </div>
                        <div class="col-lg-10">
                            <ul class="nav nav-pills" role="tablist">
                                <li id="pill_FranMgtTools_Depth" role="presentation"><a data-nav="pill_FranMgtTools_Depth" class="viewToolsPill" href="#FranMgtTools_Depth" role="tab" data-toggle="tab">Check Depth Charts</a></li>
                                <li id="pill_FranMgtTools_Info" role="presentation"><a data-nav="pill_FranMgtTools_Info" class="viewToolsPill" href="#FranMgtTools_Info" role="tab" data-toggle="tab">Check Info</a></li>
                                <li id="pill_FranMgtTools_Season" role="presentation"><a data-nav="pill_FranMgtTools_Season" class="viewToolsPill" href="#FranMgtTools_Season" role="tab" data-toggle="tab">Check Season</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane" id="FranMgtTools_Depth">
                                    <?php include ('tabs/franMgtTools_tab_depth.php'); ?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="FranMgtTools_Info">
                                    <?php include ('tabs/franMgtTools_tab_info.php'); ?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="FranMgtTools_Season">
                                    <?php include ('tabs/franMgtTools_tab_season.php'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1">

                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
<script>
    $(document).ready(function () {

        if (localStorage.getItem('08_lastToolPill_nav') === null || localStorage.getItem('08_lastToolPill_div') === null) {
            localStorage.setItem('08_lastToolPill_nav', 'pill_FranMgtTools_Depth');
            localStorage.setItem('08_lastToolPill_div', '#FranMgtTools_Depth');
        }

        var lastPill_nav = localStorage.getItem('08_lastToolPill_nav');
        var lastPill_div = localStorage.getItem('08_lastToolPill_div');
        $("#" + lastPill_nav).addClass("active");
        $(lastPill_div).addClass("active");

        $('.viewToolsPill').click(function (e) {
            localStorage.setItem('08_lastToolPill_nav', $(e.target).data('nav'));
            localStorage.setItem('08_lastToolPill_div', $(e.target).attr('href'));
        });

    });
</script>