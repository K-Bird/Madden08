<html>
    <head>
        <title>Madden '08</title>
        <link href="libs/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="libs/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <link href="libs/css/simple-sidebar.css" rel="stylesheet" type="text/css">
        <script src="libs/js/jquery.js"></script>
        <script src="libs/js/bootstrap.js"></script>
        <script src="libs/js/stupidtable.js"></script>
        <script>
            $(document).ready(function () {
                $("#menu-toggle").click(function (e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });

                $("#masterRosterTable").stupidtable();

                $(".filterPOS").click(function (e) {
                    $pos = $(this).data("pos");
                    $.post("_update/filterRosterPOS.php", {pos: $pos}, function () {
                        location.reload();
                    });
                });

                $(".filterTeam").click(function (e) {
                    $team = $(this).data("team");
                    $.post("_update/filterRosterTeam.php", {team: $team}, function () {
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
            <?php include ('nav/topLevelNav.php'); ?>
            <div id="page-content-wrapper" style="text-align : center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Collapse Navigation</a>                         
                            <br>
                            <h1>Rosters</h1>
                            <br>
                            <br>
                            <label>Filter Rosters:</label><br>
                            <input id="search_rosters" class="form-control">
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="masterRosterTable" class="table table-condensed table-hover" style="text-align: center; font-size: x-small">
                                <thead>
                                    <tr>
                                        <th>
                                            <?php
                                            $FranchiseList = array();
                                            array_push($FranchiseList, 'ALL', 'ARI', 'ATL', 'BAL', 'BUF', 'CAR', 'CHI', 'CIN', 'CLE', 'DAL', 'DEN', 'DET', 'GB', 'HOU', 'IND', 'JAC', 'KC', 'MIA', 'MIN', 'NO', 'NYG', 'NYJ', 'OAK', 'PHI', 'PIT', 'SD', 'SEA', 'SF', 'STL', 'TB', 'TEN', 'WAS');

                                            $Positions = array();
                                            array_push($Positions, 'ALL', 'QB', 'HB', 'FB', 'WR', 'TE', 'LT', 'LG', 'C', 'RG', 'RT', 'LE', 'RE', 'DT', 'LOLB', 'MLB', 'ROLB', 'CB', 'FS', 'SS', 'K', 'P');

                                            $con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
                                            if (!$con) {
                                                die('Could not connect!' . mysql_error());
                                            }

                                            mysql_select_db("madden08_db", $con);
                                            ?>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Team <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <?php
                                        foreach ($FranchiseList as $fran) {
                                            echo '<li><a href="#" data-team=' . $fran . ' class="filterTeam">' . $fran . '</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                                </th>
                                <th data-sort="string"><button class=" btn btn-default btn-xs">First Name</button></th>
                                <th data-sort="string"><button class=" btn btn-default btn-xs">Last Name</button></th>
                                <th>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Position <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <?php
                                        foreach ($Positions as $pos) {
                                            echo '<li><a href="#" data-pos=' . $pos . ' class="filterPOS">' . $pos . '</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                                </th>
                                <th data-sort="int" data-sort-default="asc"><button class=" btn btn-default btn-xs">Age</button></th>
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">OVR</button></th>
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">SPD</button></th>
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">STR</button></th>
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">AWR</button></th> 
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">AGI</button></th> 
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">ACC</button></th> 
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">CAT</button></th> 
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">CAR</button></th> 
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">JMP</button></th> 
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">BTK</button></th> 
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">TKL</button></th> 
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">THP</button></th> 
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">THA</button></th> 
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">RBK</button></th> 
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">PBK</button></th> 
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">KPR</button></th> 
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">KAC</button></th> 
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">KRT</button></th> 
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">STA</button></th> 
                                <th data-sort="int" data-sort-default="desc"><button class=" btn btn-default btn-xs">INJ</button></th> 
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
                                    if (!$con) {
                                        die('Could not connect!' . mysql_error());
                                    }

                                    mysql_select_db("madden08_db", $con);

                                    $getTeamFilter = mysql_query("SELECT Value FROM `roster_controls` Where Control='TeamFilter'");
                                    $TeamFilterObj = mysql_fetch_object($getTeamFilter);
                                    $TeamFilter = $TeamFilterObj->Value;

                                    $getPosFilter = mysql_query("SELECT Value FROM `roster_controls` Where Control='PosFilter'");
                                    $PosFilterObj = mysql_fetch_object($getPosFilter);
                                    $PosFilter = $PosFilterObj->Value;

                                    if ($TeamFilter === '' and $PosFilter === '') {
                                        $getMasterRosters = mysql_query("SELECT * FROM `master_rosters`", $con) or die(mysql_error());
                                    } else {
                                        if ($TeamFilter === '') {
                                            $getMasterRosters = mysql_query("SELECT * FROM `master_rosters` WHERE `position`='{$PosFilter}'", $con) or die(mysql_error());
                                        } else if ($PosFilter === '') {
                                            $getMasterRosters = mysql_query("SELECT * FROM `master_rosters` WHERE `team`='{$TeamFilter}'", $con) or die(mysql_error());
                                        } else {
                                            $getMasterRosters = mysql_query("SELECT * FROM `master_rosters` WHERE `team`='{$TeamFilter}' and `position`='{$PosFilter}'", $con) or die(mysql_error());
                                        }
                                    }


                                    while ($RosterRow = mysql_fetch_array($getMasterRosters)) {
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
        </div>
    </body>
</html>