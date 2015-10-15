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

                $(".filterResults").click(function (e) {
                    $team = $(this).data("team");
                    $.post("_update/filterResults.php", {team: $team}, function () {
                        location.reload();
                    });
                });
                
                $(".filterStats").click(function (e) {
                    $team = $(this).data("team");
                    $.post("_update/filterStats.php", {team: $team}, function () {
                        location.reload();
                    });
                });
                
                $(".filterIndv").click(function (e) {
                    $team = $(this).data("team");
                    $.post("_update/filterIndv.php", {team: $team}, function () {
                        location.reload();
                    });
                });

            });
        </script>
    </head>
    <?php
    $con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
    if (!$con) {
        die('Could not connect!' . mysql_error());
    }

    mysql_select_db("madden08_db", $con);

    $getActiveFranchises = mysql_query("SELECT * FROM `franchise_info` Where Active='Y'", $con) or die(mysql_error());
    $FranchiseList = array();
    array_push($FranchiseList, 'All');
    while ($getActiveFranRow = mysql_fetch_array($getActiveFranchises)) {
        array_push($FranchiseList, $getActiveFranRow['Franchise']);
    }

    $Positions = array();
    array_push($Positions, 'All', 'QB', 'HB', 'FB', 'WR', 'TE', 'LT', 'LG', 'C', 'RG', 'RT', 'LE', 'RE', 'DT', 'LOLB', 'MLB', 'ROLB', 'CB', 'FS', 'SS', 'K', 'P');
    ?>
    <body>
        <div id="wrapper">
            <?php include ('nav/topLevelNav.php'); ?>
            <div id="page-content-wrapper" style="text-align : center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Collapse Navigation</a>
                            <br>
                            <h1>Statistics</h1>                          
                            <br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Team Results
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="col-lg-2">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Active Teams <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                        foreach ($FranchiseList as $fran) {
                                                            echo '<li><a href="#" data-team=' . $fran . ' class="filterResults">' . $fran . '</a></li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-10">                                           
                                                <?php include ('stats/stats_teamResults.php'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Team Stats
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <div class="col-lg-2">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Active Teams <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                        foreach ($FranchiseList as $fran) {
                                                            echo '<li><a href="#" data-team=' . $fran . ' class="filterStats">' . $fran . '</a></li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-10">                                           
                                                <?php include ('stats/stats_teamStats.php'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Individual Stats
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            <div class="col-lg-2">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Active Teams <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                        foreach ($FranchiseList as $fran) {
                                                            echo '<li><a href="#" data-team=' . $fran . ' class="filterIndv">' . $fran . '</a></li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-10">                                           
                                                <?php include ('stats/stats_indvStats.php'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>