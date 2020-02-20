<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$fran = $_POST['fran'];

$num_years = franchiseActiveYears($fran);
?>
<html>
    <head>
        <title>Franchise Mgt Tools - <?php echo $fran; ?></title>
        <link rel="shortcut icon" href="../libs/images/nfl.png">
        <link href="../libs/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../libs/css/simple-sidebar.css" rel="stylesheet" type="text/css">
        <link href="../libs/css/open-iconic-bootstrap.css" rel="stylesheet" type="text/css">
        <script src="../libs/js/jquery.js"></script>
        <script src="../libs/js/bootstrap.js"></script>
        <script src="../libs/js/common.js"></script>
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
                            <div class="card">
                                <div class="card-body">
                                    <span id="menu-toggle" style="float: left" class="oi oi-chevron-left"></span>
                                    Franchise Management Tools - <?php echo getTeamFullName($fran); ?>
                                    <span style="float: right"><img src="../libs/images/franchises/<?= $fran ?>_Logo.png" height=25 width=40></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-1">

                        </div>
                        <div class="col-lg-10">
                            <ul class="nav nav-pills" role="tablist">
                                <li id="pill_FranMgtTools_Depth" class="nav-item" role="presentation"><a data-nav="pill_FranMgtTools_Depth" class="viewToolsPill nav-link" href="#FranMgtTools_Depth" role="tab" data-toggle="tab">Check Depth Charts</a></li>
                                <li id="pill_FranMgtTools_Info" class="nav-item" role="presentation"><a data-nav="pill_FranMgtTools_Info" class="viewToolsPill nav-link" href="#FranMgtTools_Info" role="tab" data-toggle="tab">Check Info</a></li>
                                <li id="pill_FranMgtTools_Season" class="nav-item" role="presentation"><a data-nav="pill_FranMgtTools_Season" class="viewToolsPill nav-link" href="#FranMgtTools_Season" role="tab" data-toggle="tab">Check Season</a></li>
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

        if (localStorage.getItem('Madden08_lastFranMgtToolsPill_nav') === null || localStorage.getItem('Madden08_lastFranMgtToolsPill_div') === null) {
            localStorage.setItem('Madden08_lastFranMgtToolsPill_nav', 'pill_FranMgtTools_Depth');
            localStorage.setItem('Madden08_lastFranMgtToolsPill_div', '#FranMgtTools_Depth');
        }

        var lastPill_nav = localStorage.getItem('Madden08_lastFranMgtToolsPill_nav');
        var lastPill_div = localStorage.getItem('Madden08_lastFranMgtToolsPill_div');
        $("#" + lastPill_nav).addClass("active");
        $(lastPill_div).addClass("active");

        $('.viewToolsPill').click(function (e) {
            localStorage.setItem('Madden08_lastFranMgtToolsPill_nav', $(e.target).data('nav'));
            localStorage.setItem('Madden08_lastFranMgtToolsPill_div', $(e.target).attr('href'));
        });

    });
</script>