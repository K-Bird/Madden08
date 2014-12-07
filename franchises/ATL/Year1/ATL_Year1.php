<html>
    <head>
        <meta charset="utf-8">
        <title>ATL - YR1</title>
        <link href="../../../libs/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../../libs/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="../../../libs/css/simple-sidebar.css" rel="stylesheet" type="text/css">
        <script src="../../../libs/js/jquery.js"></script>
        <script src="../../../libs/js/bootstrap.js"></script>
        <script src="../../../libs/js/commonFunctions.js"></script>
    </head>
    <body style="background-color: #890101">
        <?php  $franYear='1'; $fran='atl';  ?>
        <div id="wrapper">
            <?php include ('../../../nav/franchiseYearSidebar.php'); ?>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <?php include ('../../../nav/franchiseYearNav.php'); ?>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="Preseason Information">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#preseasonPanel" aria-expanded="true" aria-controls="preseasonPanel">
                                        Preseason Information
                                    </a>
                                </h4>
                            </div>
                            <div id="preseasonPanel" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Preseason Information">
                                <div class="panel-body">
                                    <?php include 'ATL_Year1_PreSeason_Table.php'; ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="Coaching Staff">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#coachingPanel" aria-expanded="false" aria-controls="coachingPanel">
                                        Coaching Staff
                                    </a>
                                </h4>
                            </div>
                            <div id="coachingPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Coaching Staff">
                                <div class="panel-body">
                                    [Coaching Table]
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="Depth Chart">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#depthPanel" aria-expanded="false" aria-controls="depthPanel">
                                        Depth Chart
                                    </a>
                                </h4>
                            </div>
                            <div id="depthPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Depth Chart">
                                <div class="panel-body">
                                    [Depth Chart]
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="Season Results">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#resultsPanel" aria-expanded="false" aria-controls="resultsPanel">
                                        Season Results
                                    </a>
                                </h4>
                            </div>
                            <div id="resultsPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Season Results">
                                <div class="panel-body">
                                    [Schedule Table]
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="Team Stats">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#teamStatsPanel" aria-expanded="false" aria-controls="teamStatsPanel">
                                        Team Stats
                                    </a>
                                </h4>
                            </div>
                            <div id="teamStatsPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Team Stats">
                                <div class="panel-body">
                                    [Team Stats Table]
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="Individual Stats">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#indvStatsPanel" aria-expanded="false" aria-controls="indvStatsPanel">
                                        Individual Stats
                                    </a>
                                </h4>
                            </div>
                            <div id="indvStatsPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Individual Stats">
                                <div class="panel-body">
                                    [Individual Stats Table]
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="Offseason Activities">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#offseasonPanel" aria-expanded="false" aria-controls="offseasonPanel">
                                        Offseason Activities
                                    </a>
                                </h4>
                            </div>
                            <div id="offseasonPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Offseason Activities">
                                <div class="panel-body">
                                    [Offseason Activities Table]
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>