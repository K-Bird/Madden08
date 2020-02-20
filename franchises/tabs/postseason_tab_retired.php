<br>

<table class="table table-hover" id="offRetiredStatsTable" style="text-align: center; font-size: small">

                    <tr><td></td><td>Position</td><td>Overall</td><td>Age</td></tr>

                    <?php
                    $offRetiredResult = db_query("SELECT * FROM `franchise_year_off_moves` Where Year='{$View_Year}' and Team='{$Curr_Team}' and `Type`='retired'");

                    while ($offRetiredRow = $offRetiredResult->fetch_assoc()) {
                        echo '<tr>',
                        '<td>', $offRetiredRow['Player'], '</td>',
                        '<td>', $offRetiredRow['Position'], '</td>',
                        '<td>', $offRetiredRow['Overall'], '</td>',
                        '<td>', $offRetiredRow['Age'], '</td>',
                        '<td><a class="btn btn-outline-danger franViewEdit" id="',$offRetiredRow['Row'],'" onclick="removeMovesRow(this)">Remove Row</a></td>',
                        '</tr>';
                    }
                    ?>
                    <tr>
                        <td colspan="7"><a class="btn btn-outline-success franViewEdit offMove" data-movetype="retired" data-toggle="modal" data-target="#addMoves" style="display:none">Add Retired Player</a></td>
                    </tr>
                </table>

