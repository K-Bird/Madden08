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
                            <h1>Home</h1>
                            <br>
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Collapse Navigation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>