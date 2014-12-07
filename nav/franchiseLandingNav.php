<nav class="navbar navbar-default" role="navigation">
  
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                $con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
                if (!$con) {
                    die('Could not connect!' . mysql_error());
                }

                mysql_select_db("madden08_db", $con);

                $GetCurrentYear = mysql_query("Select * From `franchise_info` where `Franchise`='ATL'", $con) or die(mysql_error());
                $row = mysql_fetch_array($GetCurrentYear);
                $YearNo = $row['CurrentYear'];

                for ($i = 1; $i <= $YearNo; $i++) {
                    echo '<li><a href=Year' . $i . '/ATL_Year' . $i . '.php>Year ' . $i . '</a></li>';
                }
                ?>
                <li><a href="#menu-toggle" id="menu-toggle">Toggle Navigation</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->

</nav>