<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/Madden08/libs/db/common_db_functions.php");
?>
<html>
    <head>
        <title>Madden Franchise Management</title>
        <link rel="shortcut icon" href="../libs/images/nfl.png">
        <link href="../libs/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../libs/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <link href="../libs/css/open-iconic-bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../libs/css/simple-sidebar.css" rel="stylesheet" type="text/css">       
        <link href="../libs/css/jstree.css" rel="stylesheet" type="text/css">  
        <script src="../libs/js/jquery.js"></script>
        <script src="../libs/js/bootstrap.js"></script>
        <script src="../libs/js/jstree.js"></script>
        <script src="../libs/js/common.js"></script>
        <script>
            $(document).ready(function () {

                //On Input Change for Franchise Attribute Display Year Updated the DB
                $('.attrDisplayInput').bind('input', function () {
                    var timer;
                    var input = $(this);
                    window.clearTimeout(timer);
                    timer = window.setTimeout(function (e) {

                        $franchise = input.data('franchise');
                        $new_attrDisplay_value = input.val();
                        $.ajax(
                                {
                                    url: "../libs/ajax/franchise_mgt/update_franchise_attrDisplay.php",
                                    type: "POST",
                                    data: {franchise: $franchise, new_attrDisplay_value: $new_attrDisplay_value},
                                    success: function (data, textStatus, jqXHR)
                                    {
                                        location.reload();
                                    },
                                    error: function (jqXHR, textStatus, errorThrown)
                                    {
                                        alert("Form Did Not Process");
                                    }
                                });
                        e.preventDefault();
                    }, 1000);
                });

                $('.franMgtToolsBtn').click(function (e) {
                    var franchise = $(e.target).data("franchise");
                    var form = document.createElement('form');
                    document.body.appendChild(form);
                    form.method = 'post';
                    form.action = 'madden_franchise_mgt_tools.php';
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = "fran";
                    input.value = franchise;
                    form.appendChild(input);
                    form.submit();
                });
            });
        </script>
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
                                    Franchise Management
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php
                    $FranchiseList = array();
                    array_push($FranchiseList, 'ARI', 'ATL', 'BAL', 'BUF', 'CAR', 'CHI', 'CIN', 'CLE', 'DAL', 'DEN', 'DET', 'GB', 'HOU', 'IND', 'JAC', 'KC', 'MIA', 'MIN', 'NO', 'NYG', 'NYJ', 'OAK', 'PHI', 'PIT', 'SD', 'SEA', 'SF', 'STL', 'TB', 'TEN', 'WAS');

                    $ActiveFranchises = array();

                    $FranResult = db_query("SELECT * FROM `franchise_info` where Active = 'Y'");

                    while (($row = $FranResult->fetch_assoc())) {
                        $ActiveFranchises[] = $row['Franchise'];
                    }

                    $InactiveFranchises = array_diff($FranchiseList, $ActiveFranchises);

                    asort($ActiveFranchises);
                    asort($InactiveFranchises);
                    ?> 
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Activate a Franchise</h3>
                                </div>
                                <div class="card-body">
                                    <form role="form"  name="AddFranchise" action="../libs/ajax/franchise_mgt/franchise_activate.php" method="post">
                                        <div class="form-group">
                                            <label for="fran">Inactive Franchises:</label>
                                            <select class="form-control" name="fran">
                                                <?php
                                                foreach ($InactiveFranchises as $Fran) {
                                                    echo '<option value="' . $Fran . '">' . $Fran . '</option>';
                                                }
                                                ?>                  
                                            </select>
                                            <br>
                                            <button type="submit" class="btn btn-success">Activate Franchise</button>
                                        </div>
                                    </form>   
                                </div>
                            </div>  
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Add Year to Franchise</h3>
                                </div>
                                <div class="card-body">
                                    <form role="form"  name="AddFranchise" action="../libs/ajax/franchise_mgt/franchise_addyear.php" method="post">
                                        <div class="form-group">
                                            <label>Active Franchises:</label> 
                                            <select class="form-control" name="fran">
                                                <?php
                                                foreach ($ActiveFranchises as $Fran) {
                                                    echo '<option value="' . $Fran . '">' . $Fran . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <br>
                                            <button type="submit" class="btn btn-primary">Add Year</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Deactivate a Franchise</h3>
                                </div>
                                <div class="card-body">
                                    <form role="form"  name="AddFranchise" action="../libs/ajax/franchise_mgt/franchise_deactivate.php" method="post">
                                        <label>Active Franchises:</label> 
                                        <div class="form-group">
                                            <select class="form-control" name="fran">
                                                <?php
                                                foreach ($ActiveFranchises as $Fran) {
                                                    echo '<option value="' . $Fran . '">' . $Fran . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <br>
                                            <button type="submit" class="btn btn-danger">Deactivate Franchise</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $AllFran = db_query("SELECT * FROM `franchise_info` WHERE `Franchise`!='NE'");
                    ?>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" style="text-align: center">
                                <?php
                                echo '<td colspan="3" style="text-align: center">Franchise</td><td>Active</td><td>Current Year</td><td style="text-align: Left">Attributes Display Year</td><td></td>';

                                while ($row = $AllFran->fetch_assoc()) {
                                    if ($row['Active'] === 'Y') {
                                        echo '<tr  class="success">';
                                    }
                                    if ($row['Active'] === 'N') {
                                        echo '<tr  class="active">';
                                    }
                                    echo '<td><img src=../libs/images/franchises/', $row['Franchise'], '_Logo.png height=25 width=40></td>'
                                    . '<td>', $row['Franchise'], ':</td>'
                                    . '<td style="text-align: left">', $row['FullName'], '</td>'
                                    . '<td>', $row['Active'], '</td>'
                                    . '<td>', $row['CurrentYear'], '</td>'
                                    . '<td><input class="form-control attrDisplayInput" type="text" data-franchise=', $row['Franchise'], ' name="', $row['Franchise'], '"[]" placeholder="', $row['AttrDisplay'], '" style="width: 50px"></td>'
                                    . '<td style="text-align: left"><button class="btn btn-primary btn-sm franMgtToolsBtn" data-franchise=', $row['Franchise'];

                                    if ($row['Active'] === 'N') {
                                        echo ' disabled ';
                                    }

                                    echo ' >Management Tools</button>';

                                    echo '<tr>';
                                }
                                ?>
                            </table>                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>