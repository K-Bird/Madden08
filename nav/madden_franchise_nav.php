<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
    <span id="menu-toggle" style="float: left" class="oi oi-chevron-left"></span>
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php
        $Get_Franchise_Info = db_query("Select * From `franchise_info` where `Franchise`='{$Curr_Team}'");
        $Year_Row = $Get_Franchise_Info->fetch_assoc();
        $Curr_Year = $Year_Row['CurrentYear'];

        echo '<span class="badge badge-light">Viewing ', $Year_Row['FullName'], ' Year ', $View_Year, '</span>';
        ?> 
        <ul class="navbar-nav mr-auto">
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    View an Active Franchise
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                    $Get_Active_Franchise_Info = db_query("Select * From `franchise_info`");
                    while ($Fran_Row = $Get_Active_Franchise_Info->fetch_assoc()) {
                        if ($Fran_Row['Active'] === 'Y') {
                            echo '<a id=', $Fran_Row['Franchise'], ' class="nav_view_franchise dropdown-item" href="#">', $Fran_Row['FullName'], ' - Year: ', $Fran_Row['CurrentYear'], '</a>';
                        }
                    }
                    ?>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    View Franchise Year
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                    for ($i = 1; $i <= $Curr_Year; $i++) {
                        echo '<a id="', $i, '" class="nav_view_franchise_year dropdown-item" href="#">Year ' . $i . '</a>';
                    }
                    ?>
                </div>
            </li>
        </ul>
        <span class="navbar-text">
            <span class="badge badge-light" id="franToggleEdit" href="#"></span>
        </span>
    </div>
</nav>