<br>
<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Award</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Pro Bowl</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane" id="home">
            <table class="table table-hover" id="offAwardStatsTable" style="text-align: center; font-size: small">

                <tr><td></td><td>Position</td><td style="text-align: left">Award</td><td></td></tr>

                <?php
                $offAwardResult = db_query("SELECT * FROM `franchise_year_awards` Where Year='{$View_Year}' AND Team='{$Curr_Team}' ORDER BY Player ASC");

                while ($offAwardRow = $offAwardResult->fetch_assoc()) {
                    echo '<tr>';
                    if ($offAwardRow['Historical_ID'] === '-') {
                        echo '<td>', $offAwardRow['Player'], '</td>';
                    } else {
                        echo '<td><span id="', $offAwardRow['Row'], 'Award" class="historyModal" style="cursor: pointer" data-toggle="popover" title="History">', $offAwardRow['Player'], '</span></td>';
                    }
                    echo '<td>', $offAwardRow['Position'], '</td>',
                    '<td style="text-align: left">', $offAwardRow['Award'], '</td>',
                    '<td><a class="btn btn-danger franViewEdit" id="', $offAwardRow['Row'], '" onclick="removeAward(this)">Remove Row</a></td>',
                    '</tr>';
                }
                ?>
                <tr>
                    <td colspan="7"><a class="btn btn-success franViewEdit" data-toggle="modal" data-target="#addYearAward" style="display:none">Add New Award</a></td>
                </tr>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="profile">
            <table class="table table-hover" id="offProBowlStatsTable" style="text-align: center; font-size: small">

                <tr><td>Player</td><td>Position</td></tr>

                <?php
                $offProBowlResult = db_query("SELECT * FROM `franchise_year_probowl` Where Year='{$View_Year}' and Team='{$Curr_Team}'");

                while ($offProBowlRow = $offProBowlResult->fetch_assoc()) {
                    echo '<tr>';

                    if ($offProBowlRow['Historical_ID'] === '-') {
                        echo '<td>', $offProBowlRow['Player'], '</td>';
                    } else {
                        echo '<td><span id="', $offProBowlRow['Row'], 'ProBowl" class="historyModal" style="cursor: pointer" data-toggle="popover" title="History">', $offProBowlRow['Player'], '</span></td>';
                    }
                    echo '<td>', $offProBowlRow['Position'], '</td>',
                    '<td><a class="btn btn-danger franViewEdit" id="', $offProBowlRow['Row'], '" onclick="removeProbowl(this)">Remove Row</a></td>',
                    '</tr>';
                }
                ?>
                <tr>
                    <td colspan="7"><a class="btn btn-success franViewEdit" data-toggle="modal" data-target="#addProbowl" style="display:none">Add New Probowl Player</a></td>
                </tr>
            </table>
        </div>
    </div>

</div>