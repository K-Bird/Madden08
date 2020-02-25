<table class="table table-hover" id="offpostfaStatsTable" style="text-align: center; font-size: small">

    <tr><td></td><td>Position</td><td>Overall</td><td>Age</td></tr>

    <?php
    $offpostfaResult = db_query("SELECT * FROM `franchise_year_off_moves` Where Year='{$View_Year}' and Team='{$Curr_Team}' and Type='postfa'");

    while ($offpostfaRow = $offpostfaResult->fetch_assoc()) {
        echo '<tr>',
        '<td>', $offpostfaRow['Player'], '</td>',
        '<td>', $offpostfaRow['Position'], '</td>',
        '<td>', $offpostfaRow['Overall'], '</td>',
        '<td>', $offpostfaRow['Age'], '</td>',
        '<td><a class="btn btn-outline-danger franViewEdit removeOffMove" style="display: none" id="', $offpostfaRow['Row'],'" data-moveType="fa">Remove Row</a></td>',
        '</tr>';
    }
    ?>
    <tr>
        <td colspan="7"><a class="btn btn-outline-success franViewEdit offMove" data-movetype="postfa" data-toggle="modal" data-target="#addMoves" style="display:none">Add Post-Draft Free Agent</a></td>
    </tr>
</table>

