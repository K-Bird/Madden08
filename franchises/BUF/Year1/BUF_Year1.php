<html>
    <head>
        <meta charset="utf-8">
        <title>BUF - YR1</title>
        <link href="../../../libs/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../../libs/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="../../../libs/css/simple-sidebar.css" rel="stylesheet" type="text/css">
        <script src="../../../libs/js/jquery.js"></script>
        <script src="../../../libs/js/bootstrap.js"></script>
        <script src="../../../libs/js/commonFunctions.js"></script>
        <style>
            .popover {
                max-width: 1000px;
                width: auto;
            }
            .modal-dialog {
                max-width: 1200px;
                width: auto;
            }
            .modal {
                overflow-y: scroll !important;
            }
        </style>
    </head>
    <body style="background-color: #143D75">
        <?php
        $franYear = '1';
        $fran = 'buf';
        ?>
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
                                        <?php echo strtoupper($fran) . " - Year: " . $franYear . " - "; ?>Preseason Information
                                    </a>
                                </h4>
                            </div>
                            <div id="preseasonPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Preseason Information">
                                <div class="panel-body">
                                    <?php include $fran.'_Year'.$franYear.'_PreSeason_Table.php'; ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="Coaching Staff">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#coachingPanel" aria-expanded="false" aria-controls="coachingPanel">
                                        <?php echo strtoupper($fran) . " - Year: " . $franYear . " - "; ?>Coaching Staff
                                    </a>
                                </h4>
                            </div>
                            <div id="coachingPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Coaching Staff">
                                <div class="panel-body">
                                    <?php include $fran.'_Year'.$franYear.'_CoachingStaff_Table.php'; ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="Depth Chart">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#depthPanel" aria-expanded="false" aria-controls="depthPanel">
                                        <?php echo strtoupper($fran) . " - Year: " . $franYear . " - "; ?>Depth Chart
                                    </a>
                                </h4>
                            </div>
                            <div id="depthPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Depth Chart">
                                <div class="panel-body">
                                    <?php include $fran.'_Year'.$franYear.'_DepthChart_Table.php'; ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="Season Results">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#resultsPanel" aria-expanded="false" aria-controls="resultsPanel">
                                        <?php echo strtoupper($fran) . " - Year: " . $franYear . " - "; ?>Season Results
                                    </a>
                                </h4>
                            </div>
                            <div id="resultsPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Season Results">
                                <div class="panel-body">
                                    <?php include $fran.'_Year'.$franYear.'_Results_Table.php'; ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="Team Stats">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#teamStatsPanel" aria-expanded="false" aria-controls="teamStatsPanel">
                                        <?php echo strtoupper($fran) . " - Year: " . $franYear . " - "; ?>Team Stats
                                    </a>
                                </h4>
                            </div>
                            <div id="teamStatsPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Team Stats">
                                <div class="panel-body">
                                    <?php include $fran.'_Year'.$franYear.'_TeamStats_Table.php'; ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="Individual Stats">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#indvStatsPanel" aria-expanded="false" aria-controls="indvStatsPanel">
                                        <?php echo strtoupper($fran) . " - Year: " . $franYear . " - "; ?>Individual Stats
                                    </a>
                                </h4>
                            </div>
                            <div id="indvStatsPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Individual Stats">
                                <div class="panel-body">
                                    <?php include $fran.'_Year'.$franYear.'_IndvStats_Table.php'; ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="Offseason Activities">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#offseasonPanel" aria-expanded="false" aria-controls="offseasonPanel">
                                        <?php echo strtoupper($fran) . " - Year: " . $franYear . " - "; ?>Offseason Activities
                                    </a>
                                </h4>
                            </div>
                            <div id="offseasonPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Offseason Activities">
                                <div class="panel-body">
                                    <?php include $fran.'_Year'.$franYear.'_Off_Table.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="text-align: center">
                        <div class="col-lg-12">
                            <a class="btn btn-default" id="toggleEdit">Edit: <?php echo ' ' . strtoupper($fran) . " - Year: " . $franYear; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>