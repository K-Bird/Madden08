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
            <a href="franchise_mgt.php">Franchise Management</a> <!-- Locked Icon When Logged Out On Hover Explain Need to Be Logged in -->
        </li>
        <li>
            <a href="#" class="collpaseList">Franchises:</a>
        </li>
        <?php
        $con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
        if (!$con) {
            die('Could not connect!' . mysql_error());
        }

        mysql_select_db("madden08_db", $con);

        $FranResult = mysql_query("SELECT * FROM `franchise_info`");

        while ($row = mysql_fetch_array($FranResult)) {
            if ($row['Active'] === 'Y') {
                echo '<li><a href="Franchises/', $row['Franchise'], '/Fran_', $row['Franchise'], '.php"><img src=',$row['Franchise'],'/',$row['Franchise'],'_Logo.png height=18 width=25><b> - ', $row['Franchise'], ' - Year: ',$row['CurrentYear'],'</b></a></li>';
            } else {
                echo '<li style="opacity:0.5"><a href="Franchises/', $row['Franchise'], '/Fran_', $row['Franchise'], '.php"><img src=',$row['Franchise'],'/',$row['Franchise'],'_Logo.png height=18 width=25> - ', $row['Franchise'], ' - Inactive</a></li>';
            }
        }
        ?>
    </ul>
</div>
