<div class="row">
    <div class="col-lg-6">
        <form class="scoreForm" action="../libs/ajax/franchise_view/results/update_franchise_sim_rec.php" method="POST" style="width:500px">
            <div class="input-group franViewEdit">
                <input type="text" class="form-control" name="newRec" placeholder="<?php echo $RegSimRow['Score']; ?>">
                <input type="hidden" name="row" value="<?php echo $RegSimRow['Row']; ?>">
                <span class="input-group-btn">
                    <button class="btn btn-secondary scoreBtn" type="submit">Update</button>
                </span>
            </div>
        </form>
    </div>
    <div class="col-lg-6">
        <span class="badge badge-dark franViewEdit">Made Playoffs: </span>
        <?php
        echo '<input id="simPost" type="checkbox" data-fran=' . $Curr_Team . ' data-year=' . $View_Year . ' class="form-control franViewEdit"';

        if ($Check_Sim_Result_Value['Result'] === 'Y') {
            echo 'checked="checked"';
        }

        echo 'style="width: 50px">';
        ?>
    </div>
</div>
<div class="row" style="text-align: center">
    <div class="col-lg-12">
        <div class="franViewDisplay" style="text-align:center"><h1><span class="badge badge-dark">Simulated Record: <?php
                    echo $RegSimRow['Score'];
                    if ($Check_Sim_Result_Value['Result'] === 'Y') {
                        echo ' - Made Playoffs';
                    } else {
                        echo ' - Did Not Make Playoffs';
                    }
                    ?></span></h1></div>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-lg-2">

    </div>
    <div class="col-lg-8">
        <?php
        if ($Check_Sim_Result_Value['Result'] === 'Y') {
            $Results = db_query("SELECT * FROM `franchise_year_results` WHERE Week!='Simulated' AND Year='{$View_Year}' and Team='{$Curr_Team}' AND (Week='Wildcard' OR Week='Divisional' OR Week='Conference' OR Week='Super Bowl') ORDER BY Row ASC");

            echo '<br>';
            echo '<table class="table table-sm table-hover" id="', $Curr_Team, '_', $View_Year, '_regSeason" style="text-align: center">';
            echo '<tr>';
            echo '<td style="text-align: left">Week</td>', '<td colspan="2">', 'Matchup', '</td>', '<td>', 'Score', '</td>', '<td>', 'Result', '</td>';
            echo '</tr>';

            $totalWins = 0;
            $totalLosses = 0;
            $divWins = 0;
            $divLosses = 0;

            while ($ResultsRow = $Results->fetch_assoc()) {

                if ($ResultsRow['Result'] === 'W') {
                    $totalWins++;
                    if ($ResultsRow['Divisional'] === 'Y') {
                        $divWins++;
                    }
                }
                if ($ResultsRow['Result'] === 'L') {
                    $totalLosses++;
                    if ($ResultsRow['Divisional'] === 'N') {
                        $divLosses++;
                    }
                }

                echo '<tr>';
                echo '<td style="text-align: left">', $ResultsRow['Week'], '</td>',
                '<td>';

                if ($ResultsRow['Vs'] === 'BYE' || $ResultsRow['Week'] === 'Super Bowl') {
                    echo '-';
                } else {
                    echo '<div class="btn-group franViewEdit">';
                    if ($ResultsRow['HorA'] === 'Vs') {
                        echo '<button type="button" class="btn btn-outline-secondary vsatBtn active" data-row="', $ResultsRow['Row'], '" data-value="Vs">Vs</button>';
                        echo '<button type="button" class="btn btn-outline-secondary vsatBtn" data-row="', $ResultsRow['Row'], '" data-value="At">At</button>';
                    } else {
                        echo '<button type="button" class="btn btn-outline-secondary vsatBtn" data-row="', $ResultsRow['Row'], '" data-value="Vs">Vs</button>';
                        echo '<button type="button" class="btn btn-outline-secondary vsatBtn active" data-row="', $ResultsRow['Row'], '" data-value="At">At</button>';
                    }
                    echo
                    '</div>
                <span class="franViewDisplay">', $ResultsRow['HorA'], '</span>';
                }
                echo '</td>
              <td>';
                if ($ResultsRow['Vs'] === 'BYE') {
                    echo $ResultsRow['Vs'];
                } else {

                    $getFranchiseList = db_query("SELECT * From `franchise_info`");


                    echo '<div class="btn-group franViewEdit">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">',
                    $ResultsRow['Vs'], ' <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">';

                    while ($franchiseRow = $getFranchiseList->fetch_assoc()) {
                        echo '<li class="vsTeamLi" data-row="', $ResultsRow['Row'], '" data-fran="', $franchiseRow['Franchise'], '"><a href="#">', $franchiseRow['Franchise'], '</a></li>';
                    }
                    echo '<li class="vsTeamLi" data-row="', $ResultsRow['Row'], '" data-fran="BYE"><a href="#">BYE</a></li>';
                    echo '</ul>
                  </div>';
                    echo '<span class="franViewDisplay">', $ResultsRow['Vs'], '</span>';
                }

                echo '</td>',
                '<td>';
                if ($ResultsRow['Vs'] === 'BYE') {
                    echo '-';
                } else {
                    echo '<form class="scoreForm" action="../libs/ajax/franchise_view/results/update_franchise_results_score.php" method="POST" style="width:200px">
                <div class="input-group franViewEdit">
                        <input type="text" class="form-control scoreInput" name="newScore" placeholder="', $ResultsRow['Score'], '">
                        <input type="hidden" name="row" value="', $ResultsRow['Row'], '">
                        <span class="input-group-btn">
                          <button class="btn btn-outline-secondary scoreBtn" type="submit">Update</button>
                        </span>
                    </div>
                 </form>';
                    echo '<span class="franViewDisplay">', $ResultsRow['Score'], '</span>';
                }

                echo '</td>',
                '<td>              
                <div class="btn-group franViewEdit">';
                if ($ResultsRow['Vs'] === 'BYE') {
                    echo '-';
                } else {
                    if ($ResultsRow['Result'] === 'W') {
                        echo '<button type="button" class="btn btn-outline-secondary wlBtn active" data-row="', $ResultsRow['Row'], '" data-value="W">W</button>';
                        echo '<button type="button" class="btn btn-outline-secondary wlBtn" data-row="', $ResultsRow['Row'], '" data-value="L">L</button>';
                    } else {
                        echo '<button type="button" class="btn btn-outline-secondary wlBtn" data-row="', $ResultsRow['Row'], '" data-value="W">W</button>';
                        echo '<button type="button" class="btn btn-outline-secondary wlBtn active" data-row="', $ResultsRow['Row'], '" data-value="L">L</button>';
                    }
                }
                echo '</div>  
               <span class="franViewDisplay">', $ResultsRow['Result'], '</span>
             </td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            
        }
        ?>
    </div>
    <div class="col-lg-2">

    </div>
</div>