<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/franchise_view_db_functions.php");

$Positions = array();
array_push($Positions, 'QB1', 'QB2', 'HB1', 'HB2', 'HB3', 'FB1', 'FB2', 'WR1', 'WR2', 'WR3', 'WR4', 'TE1', 'TE2', 'LT1', 'LT2', 'LG1', 'LG2', 'C1', 'C2', 'RG1', 'RG2', 'RT1', 'RT2', 'LE1', 'LE2', 'RE1', 'RE2', 'DT1', 'DT2', 'LOLB1', 'LOLB2', 'MLB1', 'MLB2', 'ROLB1', 'ROLB2', 'CB1', 'CB2', 'CB3', 'CB4', 'FS1', 'FS2', 'SS1', 'SS2', 'K1', 'P1', 'KR', 'PR');

$FranchiseList = array();
array_push($FranchiseList, 'ARI', 'ATL', 'BAL', 'BUF', 'CAR', 'CHI', 'CIN', 'CLE', 'DAL', 'DEN', 'DET', 'GB', 'HOU', 'IND', 'JAC', 'KC', 'MIA', 'MIN', 'NO', 'NYG', 'NYJ', 'OAK', 'PHI', 'PIT', 'SD', 'SEA', 'SF', 'STL', 'TB', 'TEN', 'WAS');
?>
<html>
    <head>
        <title><?php echo $Curr_Team . " - Year: " . $View_Year ?></title>
        <link href="../libs/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../libs/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <link href="../libs/css/simple-sidebar.css" rel="stylesheet" type="text/css">       
        <link href="../libs/css/jstree.css" rel="stylesheet" type="text/css"> 
        <link href="../libs/css/viewFranchise.css" rel="stylesheet" type="text/css"> 
        <script src="../libs/js/jquery.js"></script>
        <script src="../libs/js/bootstrap.js"></script>
        <script src="../libs/js/jstree.js"></script>
        <script src="../libs/js/inputSpinner.js"></script>
        <script src="../libs/js/common_functions.js"></script>
        <script src="../libs/js/franchise_view_functions.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <?php
            $NavLevel = '2nd';
            include ('../nav/master_nav.php');
            ?>
            <div id="page-content-wrapper" style="text-align : center">
                <div class="container-fluid">
                    <?php include ('../nav/madden_franchise_nav.php'); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group" id="Fran_Year_Accordion" role="tablist" style="text-align: left">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#Fran_Year_Accordion" href="#Fran_Year_Preseason" aria-expanded="true" aria-controls="preseasonPanel">
                                                <img src="../libs/images/franchises/<?= $Curr_Team ?>_Logo.png" height=25 width=40><?php echo " - " . strtoupper($Curr_Team) . " - Year: " . $View_Year . " - Preseason"; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <!-- [ Preseason Panel ] -->
                                    <div id="Fran_Year_Preseason" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Preseason Information">
                                        <div class="panel-body">
                                            <div>
                                                <ul class="nav nav-pills" role="tablist">
                                                    <li id="pill_Preseason_Info" role="presentation"><a data-nav="pill_Preseason_Info" class="viewPill" href="#Preseason_Info" role="tab" data-toggle="tab">Franchise Info</a></li>
                                                    <li id="pill_Preseason_CoachingStaff" role="presentation"><a data-nav="pill_Preseason_CoachingStaff" class="viewPill" href="#Preseason_CoachingStaff" role="tab" data-toggle="tab">Coaching Staff</a></li>
                                                    <li id="pill_Preseason_DepthChart" role="presentation"><a data-nav="pill_Preseason_DepthChart" class="viewPill" href="#Preseason_DepthChart" role="tab" data-toggle="tab">Depth Chart</a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <!-- Franchise Info Tab -->
                                                    <div role="tabpanel" class="tab-pane" id="Preseason_Info">
                                                        <?php include ('tabs/preseason_tab_info.php'); ?>
                                                    </div>
                                                    <!-- Coaching Staff Tab -->
                                                    <div role="tabpanel" class="tab-pane" id="Preseason_CoachingStaff">
                                                        <?php include ('tabs/preseason_tab_coachingStaff.php'); ?>
                                                    </div>
                                                    <!-- Depth Chart Tab -->
                                                    <div role="tabpanel" class="tab-pane" id="Preseason_DepthChart">
                                                        <?php include ('tabs/preseason_tab_depthCharts.php'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ Regular Season Panel ] -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#Fran_Year_Accordion" href="#Fran_Year_RegularSeason" aria-expanded="false" aria-controls="coachingPanel">
                                                <img src="../libs/images/franchises/<?= $Curr_Team ?>_Logo.png" height=25 width=40><?php echo " - " . strtoupper($Curr_Team) . " - Year: " . $View_Year . " - Regular Season"; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="Fran_Year_RegularSeason" class="panel-collapse collapse" role="tabpanel">
                                        <div class="panel-body">
                                            <div>
                                                <ul class="nav nav-pills" role="tablist">
                                                    <li id="pill_RegularSeason_Results" role="presentation"><a data-nav="pill_RegularSeason_Results" class="viewPill" href="#RegularSeason_Results" role="tab" data-toggle="tab">Regular Season Results</a></li>
                                                    <li id="pill_RegularSeason_TeamStats" role="presentation"><a data-nav="pill_RegularSeason_TeamStats" class="viewPill" href="#RegularSeason_TeamStats" role="tab" data-toggle="tab">Team Stats</a></li>
                                                    <li id="pill_RegularSeason_IndvStats" role="presentation"><a data-nav="pill_RegularSeason_IndvStats" class="viewPill" href="#RegularSeason_IndvStats"role="tab" data-toggle="tab">Indvidual Stats</a></li>
                                                    <li id="pill_RegularSeason_Awards" role="presentation"><a data-nav="pill_RegularSeason_Awards" class="viewPill" href="#RegularSeason_Awards" role="tab" data-toggle="tab">Awards</a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane" id="RegularSeason_Results">
                                                        <?php include ('tabs/regularseason_tab_results.php'); ?>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="RegularSeason_TeamStats">
                                                        <?php include ('tabs/regularseason_tab_teamstats.php'); ?>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="RegularSeason_IndvStats">
                                                        <?php include ('tabs/regularseason_tab_indvstats.php'); ?>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="RegularSeason_Awards">
                                                        <?php include ('tabs/regularseason_tab_awards.php'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ Postseason Panel ] -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#Fran_Year_Accordion" href="#Fran_Year_Postseason" aria-expanded="false" aria-controls="depthPanel">
                                                <img src="../libs/images/franchises/<?= $Curr_Team ?>_Logo.png" height=25 width=40><?php echo " - " . strtoupper($Curr_Team) . " - Year: " . $View_Year . " - Postseason"; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="Fran_Year_Postseason" class="panel-collapse collapse" role="tabpanel">
                                        <div class="panel-body">
                                            <div>
                                                <?php 
                                                $offRetiredCount = db_query("SELECT * FROM `franchise_year_off_moves` Where Year='{$View_Year}' and Team='{$Curr_Team}' and `Type`='retired'");    
                                                $retired = $offRetiredCount->num_rows;
                                                
                                                $offprefaCount = db_query("SELECT * FROM `franchise_year_off_moves` Where Year='{$View_Year}' and Team='{$Curr_Team}' and Type='prefa'");
                                                $preFA = $offprefaCount->num_rows;
                                                
                                                $offdraftCount = db_query("SELECT * FROM `franchise_year_off_moves` Where Year='{$View_Year}' and Team='{$Curr_Team}' and Type='draft' ORDER BY `Row` ASC");
                                                $draft = $offdraftCount->num_rows;
                                                
                                                $offpostfaCount = db_query("SELECT * FROM `franchise_year_off_moves` Where Year='{$View_Year}' and Team='{$Curr_Team}' and Type='postfa'");
                                                $postFA = $offpostfaCount->num_rows;
                                                ?>
                                                <ul class="nav nav-pills" role="tablist">
                                                    <li id="pill_Offseason_Staffing" role="presentation"><a data-nav="Offseason_Staffing" class="viewPill" href="#Offseason_Staffing" role="tab" data-toggle="tab">Staffing</a></li>
                                                    <li id="pill_Offseason_Retired" role="presentation"><a data-nav="Offseason_Retired" class="viewPill" href="#Offseason_Retired" role="tab" data-toggle="tab">Retired Players <?php echo '<span class="badge">' . $retired . '</span>' ?></a></li>
                                                    <li id="pill_Offseason_RestrictedFA" role="presentation"><a data-nav="Offseason_RestrictedFA" class="viewPill" href="#Offseason_PreFA" role="tab" data-toggle="tab">Pre Draft Free Agents <?php echo '<span class="badge">' . $preFA . '</span>' ?></a></li>
                                                    <li id="pill_Offseason_Draft" role="presentation"><a data-nav="Offseason_Draft" class="viewPill" href="#Offseason_Draft" role="tab" data-toggle="tab">The Draft <?php echo '<span class="badge">' . $draft . '</span>' ?></a></li>
                                                    <li id="pill_Offseason_FA" role="presentation"><a data-nav="Offseason_FA" class="viewPill" href="#Offseason_PostFA" role="tab" data-toggle="tab">Post Draft Free Agency <?php echo '<span class="badge">' . $postFA . '</span>' ?></a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane" id="Offseason_Staffing">
                                                        <?php include ('tabs/postseason_tab_coachingStaff.php'); ?>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="Offseason_Retired">
                                                        <?php include ('tabs/postseason_tab_retired.php'); ?>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="Offseason_PreFA">
                                                        <?php include ('tabs/postseason_tab_prefa.php'); ?>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="Offseason_Draft">
                                                        <?php include ('tabs/postseason_tab_draft.php'); ?>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="Offseason_PostFA">
                                                        <?php include ('tabs/postseason_tab_postfa.php'); ?>
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
            </div>
        </div>
        <?php include ('modals/modals_franchise_view.php'); ?>
    </body>
</html>