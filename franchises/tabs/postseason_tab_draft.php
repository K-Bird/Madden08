<table class="table table-hover" id="offdraftStatsTable" style="text-align: center; font-size: small">

    <tr><td>Round-Pick</td><td>Player</td><td>Position</td><td>Overall</td><td>Age</td></tr>

    <?php
    $offdraftResult = db_query("SELECT * FROM `franchise_year_off_moves` Where Year='{$View_Year}' and Team='{$Curr_Team}' and Type='draft' ORDER BY `Row` ASC");

    while ($offdraftRow = $offdraftResult->fetch_assoc()) {
        echo '<tr>',
        '<td>', $offdraftRow['Draft'], '&nbsp;<span class="oi oi-pencil updateOffMoveField franViewEdit" data-row="', $offdraftRow['Row'],'" data-field="Draft"></span></td>',
        '<td>', $offdraftRow['Player'], '&nbsp;<span class="oi oi-pencil updateOffMoveField franViewEdit" data-row="', $offdraftRow['Row'],'" data-field="Player"></span></td>',
        '<td>', $offdraftRow['Position'], '&nbsp;<span class="oi oi-pencil updateOffMoveField franViewEdit" data-row="', $offdraftRow['Row'],'" data-field="Position"></span></td>',
        '<td>', $offdraftRow['Overall'], '&nbsp;<span class="oi oi-pencil updateOffMoveField franViewEdit" data-row="', $offdraftRow['Row'],'" data-field="Overall"></span></td>',
        '<td>', $offdraftRow['Age'], '&nbsp;<span class="oi oi-pencil updateOffMoveField franViewEdit" data-row="', $offdraftRow['Row'],'" data-field="Age"></span></td>',
        '<td><a class="btn btn-outline-danger franViewEdit removeOffMove" style="display: none" id="', $offdraftRow['Row'], '" data-moveType="draft">Remove Row</a></td>',
        '</tr>';
    }
    ?>
    <tr>
        <td colspan="7"><a class="btn btn-outline-success franViewEdit offMove" data-movetype="draft" data-toggle="modal" data-target="#addMoves" style="display:none">Add Drafted Player</a></td>
    </tr>

</table>