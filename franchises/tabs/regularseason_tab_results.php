<?php

$RegSimResult = db_query("SELECT * FROM `franchise_year_results` WHERE Week='Simulated' and Year='{$View_Year}' and Team='{$Curr_Team}'");
$RegSimRow = $RegSimResult->fetch_assoc();

if ($RegSimRow['Vs'] === 'Y') {
    echo '<div style="text-align:center"><h1>', $RegSimRow['Score'], '</h1></div>';
} else {

    $Results = db_query("SELECT * FROM `franchise_year_results` WHERE Week!='Simulated' and Year='{$View_Year}' and Team='{$Curr_Team}'");

    echo '<br><br>';
    echo '<table class="table table-hover" id="', $Curr_Team, '_', $View_Year, '_regSeason" style="text-align: center; font-size: small">';
    echo '<tr>';
    echo '<td style="text-align: left">Week</td>', '<td colspan="2">', 'Matchup', '</td>', '<td>', 'Score', '</td>', '<td>', 'Result', '</td>', '<td>', 'Overall Record', '</td>', '<td>', 'Divisional Record', '</td>';
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
            echo '<div class="btn-group franViewEdit" role="group">';
            if ($ResultsRow['HorA'] === 'Vs') {
                echo '<button type="button" class="btn btn-default vsatBtn active" data-row="',$ResultsRow['Row'],'" data-value="Vs">Vs</button>';
                echo '<button type="button" class="btn btn-default vsatBtn" data-row="',$ResultsRow['Row'],'" data-value="At">At</button>';
            } else {
                echo '<button type="button" class="btn btn-default vsatBtn" data-row="',$ResultsRow['Row'],'" data-value="Vs">Vs</button>';
                echo '<button type="button" class="btn btn-default vsatBtn active" data-row="',$ResultsRow['Row'],'" data-value="At">At</button>';
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
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">',
                     $ResultsRow['Vs'],' <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">';
            
                    while ($franchiseRow = $getFranchiseList->fetch_assoc()) {
                        echo '<li class="vsTeamLi" data-row="',$ResultsRow['Row'],'" data-fran="',$franchiseRow['Franchise'],'"><a href="#">',$franchiseRow['Franchise'],'</a></li>';
                    }
                        echo '<li class="vsTeamLi" data-row="',$ResultsRow['Row'],'" data-fran="BYE"><a href="#">BYE</a></li>';
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
                        <input type="text" class="form-control scoreInput" name="newScore" placeholder="',$ResultsRow['Score'],'">
                        <input type="hidden" name="row" value="',$ResultsRow['Row'],'">
                        <span class="input-group-btn">
                          <button class="btn btn-default scoreBtn" type="submit">Update</button>
                        </span>
                    </div>
                 </form>';
            echo '<span class="franViewDisplay">', $ResultsRow['Score'], '</span>';
        }

        echo '</td>',
        '<td>              
                <div class="btn-group franViewEdit" role="group">';
        if ($ResultsRow['Vs'] === 'BYE') {
            echo '-';
        } else {
            if ($ResultsRow['Result'] === 'W') {
                echo '<button type="button" class="btn btn-default active">W</button>';
                echo '<button type="button" class="btn btn-default">L</button>';
            } else {
                echo '<button type="button" class="btn btn-default">W</button>';
                echo '<button type="button" class="btn btn-default active">L</button>';
            }
        }
        echo '</div>  
               <span class="franViewDisplay">', $ResultsRow['Result'], '</span>
             </td>',
        '<td>(', $totalWins, '- ', $totalLosses, ')</td>',
        '<td>(', $divWins, '- ', $divLosses, ')</td>';
        echo '</tr>';
    }

    echo '</table>';
}