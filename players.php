<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");

$getTeamFilter = db_query("SELECT Value FROM `master_roster_controls` Where Control='TeamFilter'");
$TeamFilterObj = $getTeamFilter->fetch_assoc();
$TeamFilter = $TeamFilterObj['Value'];

$getPosFilter = db_query("SELECT Value FROM `master_roster_controls` Where Control='PosFilter'");
$PosFilterObj = $getPosFilter->fetch_assoc();
$PosFilter = $PosFilterObj['Value'];

$FranchiseList = array();
array_push($FranchiseList, 'FA', 'ARI', 'ATL', 'BAL', 'BUF', 'CAR', 'CHI', 'CIN', 'CLE', 'DAL', 'DEN', 'DET', 'GB', 'HOU', 'IND', 'JAC', 'KC', 'MIA', 'MIN', 'NO', 'NYG', 'NYJ', 'OAK', 'PHI', 'PIT', 'SD', 'SEA', 'SF', 'STL', 'TB', 'TEN', 'WAS');

$Positions = array();
array_push($Positions, 'QB', 'HB', 'FB', 'WR', 'TE', 'LT', 'LG', 'C', 'RG', 'RT', 'LE', 'RE', 'DT', 'LOLB', 'MLB', 'ROLB', 'CB', 'FS', 'SS', 'K', 'P');
?>
<html>
    <head>
        <title>Madden '08</title>
        <link rel="shortcut icon" href="libs/images/nfl.png">
        <link href="libs/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="libs/css/simple-sidebar.css" rel="stylesheet" type="text/css">
        <link href="libs/css/bootstrap-select.css" rel="stylesheet" type="text/css">
        <link href="libs/css/open-iconic-bootstrap.css" rel="stylesheet" type="text/css">
        <link href="libs/css/tablesorter-default.css" rel="stylesheet" type="text/css">
        <script src="libs/js/jquery.js"></script>
        <script src="libs/js/bootstrap.js"></script>
        <script src="libs/js/bootstrap-select.js"></script>
        <script src="libs/js/tablesorter.js"></script>
        <script src="libs/js/tablesorter-widgets.js"></script>
        <script src="libs/js/common.js"></script>
        <script>
            $(document).ready(function () {
            
                $("#masterRosterTable").tablesorter({
                    theme: "default"
                });

                $("#playerTableFilterPOS").change(function (e) {
                    $pos = $(this).val();
                    $.post("libs/ajax/players/filterRosterPOS.php", {pos: $pos}, function () {
                        location.reload();
                    });
                });

                $("#playerTableFilterTeam").change(function (e) {
                    $team = $(this).val();
                    $.post("libs/ajax/players/filterRosterTeam.php", {team: $team}, function () {
                        location.reload();
                    });
                });

                //Filter Draft Board when text is entered to filter field
                $('#search_rosters').on('input', function () {
                    var searchText = $(this).val();
                    $('#masterRosterTable tbody tr').each(function () {
                        if (searchText === '') {
                            $(this).show();
                        } else {
                            if ($(this).is(':contains(' + searchText + ')')) {
                                $(this).show();
                            } else {
                                $(this).hide();
                            }
                        }
                    });
                });
            });
        </script>
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
                                    <span id="menu-toggle" class="oi oi-chevron-left" style="float: left" aria-hidden="true"></span>
                                    Base Rosters
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <span class="badge badge-secondary"><font size="3">Filter Rosters:</font></span><br>
                                    <input id="search_rosters" class="form-control">
                                    <br>
                                    <span class="badge badge-secondary"><font size="3">Filter Team:</font></span>
                                    <select id="playerTableFilterTeam" class="selectpicker" data-live-search="true">
                                        <option value="ALL">ALL</option>
                                        <?php
                                        foreach ($FranchiseList as $fran) {
                                            echo '<option value=' . $fran;
                                            if ($TeamFilter === $fran) {
                                                echo ' selected';
                                            }
                                            echo '>' . $fran . '</option>';
                                        }
                                        ?>
                                    </select>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="badge badge-secondary"><font size="3">Filter Position:</font></span>
                                    <select id="playerTableFilterPOS" class="selectpicker" data-live-search="true">
                                        <option value="ALL">ALL</option>
                                        <?php
                                        echo '>All</option>';
                                        foreach ($Positions as $pos) {
                                            echo '<option value=' . $pos;
                                            if ($PosFilter === $pos) {
                                                echo ' selected';
                                            }
                                            echo '>' . $pos . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="masterRosterTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Team</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Position</th>
                                        <th>Age</th>
                                        <th>OVR</th>
                                        <th>SPD</th>
                                        <th>STR</th>
                                        <th>AWR</th> 
                                        <th>AGI</th> 
                                        <th>ACC</th> 
                                        <th>CAT</th> 
                                        <th>CAR</th> 
                                        <th>JMP</th> 
                                        <th>BTK</th> 
                                        <th>TKL</th> 
                                        <th>THP</th> 
                                        <th>THA</th> 
                                        <th>RBK</th> 
                                        <th>PBK</th> 
                                        <th>KPR</th> 
                                        <th>KAC</th> 
                                        <th>KRT</th> 
                                        <th>STA</th> 
                                        <th>INJ</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($TeamFilter === '' and $PosFilter === '') {
                                        $getMasterRosters = db_query("SELECT * FROM `master_rosters`");
                                    } else {
                                        if ($TeamFilter === '') {
                                            $getMasterRosters = db_query("SELECT * FROM `master_rosters` WHERE `position`='{$PosFilter}'");
                                        } else if ($PosFilter === '') {
                                            $getMasterRosters = db_query("SELECT * FROM `master_rosters` WHERE `team`='{$TeamFilter}'");
                                        } else {
                                            $getMasterRosters = db_query("SELECT * FROM `master_rosters` WHERE `team`='{$TeamFilter}' and `position`='{$PosFilter}'");
                                        }
                                    }


                                    while ($RosterRow = $getMasterRosters->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td>' . $RosterRow['team'] . '</td>';
                                        echo '<td>' . $RosterRow['firstname'] . '</td>';
                                        echo '<td>' . $RosterRow['lastname'] . '</td>';
                                        echo '<td>' . $RosterRow['position'] . '</td>';
                                        echo '<td>' . $RosterRow['age'] . '</td>';
                                        echo '<td>' . $RosterRow['ovr'] . '</td>';
                                        echo '<td>' . $RosterRow['spd'] . '</td>';
                                        echo '<td>' . $RosterRow['str'] . '</td>';
                                        echo '<td>' . $RosterRow['awr'] . '</td>';
                                        echo '<td>' . $RosterRow['agi'] . '</td>';
                                        echo '<td>' . $RosterRow['acc'] . '</td>';
                                        echo '<td>' . $RosterRow['cat'] . '</td>';
                                        echo '<td>' . $RosterRow['car'] . '</td>';
                                        echo '<td>' . $RosterRow['jmp'] . '</td>';
                                        echo '<td>' . $RosterRow['btk'] . '</td>';
                                        echo '<td>' . $RosterRow['tkl'] . '</td>';
                                        echo '<td>' . $RosterRow['thp'] . '</td>';
                                        echo '<td>' . $RosterRow['tha'] . '</td>';
                                        echo '<td>' . $RosterRow['bp'] . '</td>';
                                        echo '<td>' . $RosterRow['rb'] . '</td>';
                                        echo '<td>' . $RosterRow['kp'] . '</td>';
                                        echo '<td>' . $RosterRow['ka'] . '</td>';
                                        echo '<td>' . $RosterRow['kr'] . '</td>';
                                        echo '<td>' . $RosterRow['sta'] . '</td>';
                                        echo '<td>' . $RosterRow['inj'] . '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>