<?php
$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$getCardsQuery = mysql_query("SELECT * FROM `tracking_cards` where `Info` = 'OwnedCards'");
$cardsRow = mysql_fetch_array($getCardsQuery);
$ownedCards = $cardsRow['Value'];
?>
<html>
    <head>
        <title>Madden '08</title>
        <link href="libs/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="libs/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <link href="libs/css/simple-sidebar.css" rel="stylesheet" type="text/css">
        <link href="libs/css/nouislider.css" rel="stylesheet" type="text/css"> 
        <style>
            span.glyphicon {
                font-size: 1em;
            }
        </style>
        <script src="libs/js/jquery.js"></script>
        <script src="libs/js/bootstrap.js"></script>
        <script src="libs/js/nouislider.js"></script>
        <script>
            $(document).ready(function () {
                $("#menu-toggle").click(function (e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });
                $('#cardSlider').noUiSlider({
                    start: [<?php echo $ownedCards ?>],
                    step: 1,
                    range: {
                        'min': [0],
                        'max': [282]
                    },
                    format: wNumb({
                        decimals: 0
                    })
                });
                $('#cardSlider').Link('lower').to($('#cardSliderValue'));
                $("#updateCardsBtn").click(function (e) {
                    $.ajax(
                            {
                                url: "_update/updateOwnedCards.php",
                                type: "POST",
                                data: {newValue: $("#cardSliderValue").val()},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Unable to Update Cards Owned");
                                }
                            });
                    e.preventDefault();
                });

                $(".dropdown-menu li a").click(function (e) {
                    $id = $(this).attr('id');
                    var split = $id.split("/");
                    var row = split[0];
                    var diff = split[1];

                    $.ajax(
                            {
                                url: "_update/updateTrophy.php",
                                type: "POST",
                                data: {newValue: $(this).text(),
                                    row: row,
                                    diff: diff},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Unable to Update Trophy");
                                }
                            });
                });

                $(".GScomp").click(function (e) {
                    $id = $(this).attr('id');
                    var split = $id.split("/");
                    var row = split[0];
                    var diff = split[1];

                    $.ajax(
                            {
                                url: "_update/updateGameSituation.php",
                                type: "POST",
                                data: {comp: 'Y',
                                    row: row,
                                    diff: diff},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Unable to Update Game Situation");
                                }
                            });
                });

                $(".GSincomp").click(function (e) {
                    $id = $(this).attr('id');
                    var split = $id.split("/");
                    var row = split[0];
                    var diff = split[1];

                    $.ajax(
                            {
                                url: "_update/updateGameSituation.php",
                                type: "POST",
                                data: {comp: 'N',
                                    row: row,
                                    diff: diff},
                                success: function (data, textStatus, jqXHR)
                                {
                                    location.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert("Unable to Update Game Situation");
                                }
                            });
                });

                $("#toggleTrackingEdit").click(function (e) {
                    $(".trackingEdit").toggle();
                });
                
            });
        </script>
    </head>
    <body>
        <div id="wrapper">
            <?php include ('nav/topLevelNav.php'); ?>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12" style="text-align: center">
                            <h1>Profile: K-Bird</h1>
                            <br>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12" style="text-align: center">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="MaddenCards">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#cardsPanel" aria-expanded="true" aria-controls="cardsPanel">
                                                Madden Cards
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="cardsPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Madden Cards">
                                        <div class="panel-body">
                                            <div class="well well-lg" style="width: 50%; margin: 0 auto">
                                                <h2>Cards Obtained: <?php echo $ownedCards ?> of 282</h2>
                                                <br>
                                                <div id="cardSlider" class="trackingEdit" style="display: none"></div>
                                                <br>
                                                <div class="input-group trackingEdit" style="display: none">
                                                    <input type="text" class="form-control" id="cardSliderValue">
                                                    <span class="input-group-btn">
                                                        <button id="updateCardsBtn" class="btn btn-primary" type="button">Update Cards Owned</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="Mini Camp">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#miniPanel" aria-expanded="false" aria-controls="miniPanel">
                                                Mini Camp
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="miniPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Mini Camp">
                                        <div class="panel-body">
                                            <?php
                                            $con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
                                            if (!$con) {
                                                die('Could not connect!' . mysql_error());
                                            }

                                            mysql_select_db("madden08_db", $con);

                                            $result = mysql_query("SELECT * FROM `tracking_minicamp`");

                                            echo '<table class="table table-condensed" style="text-align: center">';
                                            echo '<tr>';
                                            echo '<td></td><td colspan=4>Trophy</td><td colspan=4>Game Situation</td>';
                                            echo '<tr>';
                                            echo '<td style="text-align: left">Drill</td>', '<td>', 'Rookie', '</td>', '<td>', 'Pro', '</td>', '<td>', 'All-Pro', '</td>', '<td>', 'All-Madden', '</td>', '<td>', 'Rookie', '</td>', '<td>', 'Pro', '</td>', '<td>', 'All-Pro', '</td>', '<td>', 'All-Madden', '</td>';
                                            echo '</tr>';

                                            while ($row = mysql_fetch_array($result)) {
                                                echo '<tr>';
                                                echo '<td style="text-align: left">', $row['Drill'], '</td>',
                                                '<td>',
                                                '<div class="dropdown trackingEdit" style="display: none">
                                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                                          Select Medal
                                                          <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="', $row['Row'], '/Rookie" >None</a></li>
                                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="', $row['Row'], '/Rookie" >Gold</a></li>
                                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="', $row['Row'], '/Rookie" >Silver</a></li>
                                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="', $row['Row'], '/Rookie" >Bronze</a></li>
                                                        </ul>
                                                      </div>',
                                                $row['Rookie'],
                                                '</td>',
                                                '<td>',
                                                '<div class="dropdown trackingEdit" style="display: none">
                                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                                          Select Medal
                                                          <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="', $row['Row'], '/Pro">None</a></li>
                                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="', $row['Row'], '/Pro">Gold</a></li>
                                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="', $row['Row'], '/Pro">Silver</a></li>
                                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="', $row['Row'], '/Pro">Bronze</a></li>
                                                        </ul>
                                                      </div>',
                                                $row['Pro'],
                                                '</td>',
                                                '<td>',
                                                '<div class="dropdown trackingEdit" style="display: none">
                                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                                          Select Medal
                                                          <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="', $row['Row'], '/AllPro" >None</a></li>
                                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="', $row['Row'], '/AllPro" >Gold</a></li>
                                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="', $row['Row'], '/AllPro" >Silver</a></li>
                                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="', $row['Row'], '/AllPro" >Bronze</a></li>
                                                        </ul>
                                                      </div>',
                                                $row['AllPro'],
                                                '</td>',
                                                '<td>',
                                                '<div class="dropdown trackingEdit" style="display: none">
                                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                                          Select Medal
                                                          <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="', $row['Row'], '/AllMadden">None</a></li>
                                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="', $row['Row'], '/AllMadden">Gold</a></li>
                                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="', $row['Row'], '/AllMadden">Silver</a></li>
                                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="', $row['Row'], '/AllMadden">Bronze</a></li>
                                                        </ul>
                                                      </div>',
                                                $row['AllMadden'],
                                                '</td>',
                                                '<td>  <span id="', $row['Row'], '/gmr" class="glyphicon glyphicon-ok-circle GScomp trackingEdit" style="display: none" aria-hidden="true"></span><span id="', $row['Row'], '/gmr" class="glyphicon glyphicon-remove-circle GSincomp trackingEdit" style="display: none" aria-hidden="true"></span><br>', $row['gmr'], '</td>',
                                                '<td>  <span id="', $row['Row'], '/gmp" class="glyphicon glyphicon-ok-circle GScomp trackingEdit" style="display: none" aria-hidden="true"></span><span id="', $row['Row'], '/gmp" class="glyphicon glyphicon-remove-circle GSincomp trackingEdit" style="display: none" aria-hidden="true"></span><br>', $row['gmp'], '</td>',
                                                '<td>  <span id="', $row['Row'], '/gmap" class="glyphicon glyphicon-ok-circle GScomp trackingEdit" style="display: none" aria-hidden="true"></span><span id="', $row['Row'], '/gmap" class="glyphicon glyphicon-remove-circle GSincomp trackingEdit" style="display: none" aria-hidden="true"></span><br>', $row['gmap'], '</td>',
                                                '<td>  <span id="', $row['Row'], '/gmm" class="glyphicon glyphicon-ok-circle GScomp trackingEdit" style="display: none" aria-hidden="true"></span><span id="', $row['Row'], '/gmm" class="glyphicon glyphicon-remove-circle GSincomp trackingEdit" style="display: none" aria-hidden="true"></span><br>', $row['gmm'], '</td>';
                                                echo '</tr>';
                                            }
                                            echo '</table>';
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                            &nbsp;
                            <a href="#" id="toggleTrackingEdit" class="btn btn-default" id="menu-toggle">Edit Tracking Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>