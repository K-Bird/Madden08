<nav class="navbar navbar-default" role="navigation">

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <?php
            $Get_Franchise_Info = db_query("Select * From `franchise_info` where `Franchise`='{$Curr_Team}'");
            $Year_Row = $Get_Franchise_Info->fetch_assoc();
            $Curr_Year = $Year_Row['CurrentYear'];
            
            echo '<li><a class="navbar-brand" href="#"><img src=../libs/images/franchises/',$Curr_Team,'_Logo.png height=25 width=40></a></li>';
            echo '<li><a href="#">', $Year_Row['FullName'], ': </a></li>';
            ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">View Franchise Year<span class="caret"></span></a>
                <ul class="dropdown-menu inverse-dropdown">
                    <?php
                    for ($i = 1; $i <= $Curr_Year; $i++) {
                        echo '<li><a id="',$i,'" class="nav_view_franchise_year" href="#">Year ' . $i . '</a></li>';
                    }
                    ?>

                </ul>
            </li>
            <li><a id="franToggleEdit" href="#"> </a></li>
        </ul>
        <ul class="nav navbar-nav pull-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">View an Active Franchise<span class="caret"></span></a>
                <ul class="dropdown-menu inverse-dropdown" style="text-align: right">
                    <?php
                    $Get_Active_Franchise_Info = db_query("Select * From `franchise_info`");
                    while ($Fran_Row = $Get_Active_Franchise_Info->fetch_assoc()) {
                        if ($Fran_Row['Active'] === 'Y') {
                            echo '<li><a id=',$Fran_Row['Franchise'],' class="nav_view_franchise" href="#">', $Fran_Row['FullName'], ' - Year: ', $Fran_Row['CurrentYear'], '</a></li>';
                        }
                    }
                    ?>
                </ul>
            </li>
            <li><a href="#menu-toggle" id="menu-toggle">Toggle Navigation</a></li>
        </ul>
    </div>
</nav>