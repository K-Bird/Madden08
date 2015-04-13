<html>
    <head>
        <title>Madden '08</title>
        <link href="../libs/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../libs/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <link href="../libs/css/simple-sidebar.css" rel="stylesheet" type="text/css">
        <link href="../libs/css/colorPicker.css" rel="stylesheet" type="text/css">
        <script src="../libs/js/jquery.js"></script>
        <script src="../libs/js/bootstrap.js"></script>
        <script src="../libs/js/commonFunctions.js"></script>
        <script src="../libs/js/colorPicker.js"></script>
        <script>
            $(document).ready(function () {

                $('.PColor').colpick({
                    layout: 'hex',
                    colorScheme: 'dark',
                    onSubmit: function (hsb, hex, rgb, el) {
                        var fran = $(el).attr('id');
                        var hex = '#' + hex;

                        $.get('_fran_mgt/changePrimaryColor.php', {fran: fran, hex: hex});
                        $(el).colpickHide();
                        location.reload();
                    }
                });

                $('.SColor').colpick({
                    layout: 'hex',
                    colorScheme: 'dark',
                    onSubmit: function (hsb, hex, rgb, el) {
                        var fran = $(el).attr('id');
                        var hex = '#' + hex;

                        $.get('_fran_mgt/changeSecondaryColor.php', {fran: fran, hex: hex});
                        $(el).colpickHide();
                        location.reload();
                    }
                });

                $("#menu-toggle").click(function (e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });

            });
        </script>
    </head>
    <body>
        <div id="wrapper">
            <?php include ('../nav/franchiseTopSidebar.php'); ?>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row" style="text-align: center">
                        <div class="col-lg-12">
                            <h1>Franchise Management</h1>
                        </div>
                    </div>
                    <div class="row" style="text-align: center">
                        <div class="col-lg-12">
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Navigation</a>
                        </div>
                    </div>
                    <br>
                    <?php
                    $FranchiseList = array();
                    array_push($FranchiseList, 'ARI', 'ATL', 'BAL', 'BUF', 'CAR', 'CHI', 'CIN', 'CLE', 'DAL', 'DEN', 'DET', 'GB', 'HOU', 'IND', 'JAC', 'KC', 'MIA', 'MIN', 'NO', 'NYG', 'NYJ', 'OAK', 'PHI', 'PIT', 'SD', 'SEA', 'SF', 'STL', 'TB', 'TEN', 'WAS');

                    $con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
                    if (!$con) {
                        die('Could not connect!' . mysql_error());
                    }

                    mysql_select_db("madden08_db", $con);

                    $ActiveFranchises = array();

                    $FranResult = mysql_query("SELECT * FROM `franchise_info` where Active = 'Y'");

                    while (($row = mysql_fetch_assoc($FranResult))) {
                        $ActiveFranchises[] = $row['Franchise'];
                    }

                    $InactiveFranchises = array_diff($FranchiseList, $ActiveFranchises);

                    asort($ActiveFranchises);
                    asort($InactiveFranchises);
                    ?> 
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Activate a Franchise</h3>
                                </div>
                                <div class="panel-body">
                                    <form role="form"  name="AddFranchise" action="_fran_mgt/activateFran.php" method="post">
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
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Add Year to Franchise</h3>
                                </div>
                                <div class="panel-body">
                                    <form role="form"  name="AddFranchise" action="_fran_mgt/addYear.php" method="post">
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
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Deactivate a Franchise</h3>
                                </div>
                                <div class="panel-body">
                                    <form role="form"  name="AddFranchise" action="_fran_mgt/deactivateFran.php" method="post">
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
                    $AllFran = mysql_query("SELECT * FROM `franchise_info`");
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover" style="text-align: center">
                                <?php
                                echo '<td colspan="2" style="text-align: left">Franchise</td><td>Active</td><td>Current Year</td><td>Primary Color</td><td>Secondary Color</td>';

                                while ($row = mysql_fetch_array($AllFran)) {
                                    if ($row['Active'] === 'Y') {
                                        echo '<tr  class="success">';
                                    }
                                    if ($row['Active'] === 'N') {
                                        echo '<tr  class="active">';
                                    }
                                    echo '<td>', $row['Franchise'], ':</td><td style="text-align: left">', $row['FullName'], '</td><td>', $row['Active'], '</td><td>', $row['CurrentYear'], '</td>
                                        
                                        <td><div style="background-color: ' . $row['PrimaryColor'] . '" class="color-box"></div><button id="' . $row['Franchise'] . '" class="btn btn-default PColor">Change Primary Color</button></td>

                                        <td><div style="background-color: ' . $row['SecondaryColor'] . '" class="color-box"></div><button id="' . $row['Franchise'] . '" class="btn btn-default SColor">Change Secondary Color</button></td>';

                                    echo '<tr>';
                                }
                                ?>
                            </table>                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>