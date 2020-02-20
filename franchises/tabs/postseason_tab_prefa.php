<table class="table table-hover" id="offprefaStatsTable" style="text-align: center; font-size: small">

                    <tr><td></td><td>Position</td><td>Overall</td><td>Age</td></tr>

                    <?php
                    $offprefaResult = db_query("SELECT * FROM `franchise_year_off_moves` Where Year='{$View_Year}' and Team='{$Curr_Team}' and Type='prefa'");

                    while ($offprefaRow = $offprefaResult->fetch_assoc()) {
                        echo '<tr>',
                        '<td>', $offprefaRow['Player'], '</td>',
                        '<td>', $offprefaRow['Position'], '</td>',
                        '<td>', $offprefaRow['Overall'], '</td>',
                        '<td>', $offprefaRow['Age'], '</td>',
                        '<td><a class="btn btn-outline-danger franViewEdit" style="display: none" id="',$offprefaRow['Row'],'" onclick="removeMovesRow(this)">Remove Row</a></td>',
                        '</tr>';
                    }
                    ?>
                    <tr>
                        <td colspan="7"><a class="btn btn-outline-success franViewEdit offMove" data-movetype="prefa" data-toggle="modal" data-target="#addMoves" style="display:none">Add Pre-Draft Free Agent</a></td>
                    </tr>
                </table>