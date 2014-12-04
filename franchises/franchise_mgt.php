<html>
    <head>
        <title>Madden '08</title>
        <link href="../libs/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../libs/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <link href="../libs/css/simple-sidebar.css" rel="stylesheet" type="text/css">
        <script src="../libs/js/jquery.js"></script>
        <script src="../libs/js/bootstrap.js"></script>
    </head>
    <body>
        <div id="wrapper">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="#">
                            Madden '08
                        </a>
                    </li>
                    <li>
                        <a href="../index.php">Home</a>
                    </li>
                    <li>
                        <a href="franchise_landing.php">Franchises</a> <!-- Unlocked Icon When Logged In, Locked When Logged Out -->
                    </li>
                    <li>
                        <a href="#">ATL</a>
                    </li>
                    <li>
                        <a href="#">BAL</a>
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Franchise Management</h1>
                            <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
    </body>
</html>