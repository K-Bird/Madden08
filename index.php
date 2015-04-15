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
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Home</h1>
                            <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Collapse Navigation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>