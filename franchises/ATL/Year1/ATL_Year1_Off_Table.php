<?php
$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);
?>

<div class="panel-group" id="OffseasonCollapse" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="offInfoHeader">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#OffseasonCollapse" href="#offInfoCollapse" aria-expanded="true" aria-controls="offInfoCollapse">
                    Offseason Information
                </a>
            </h4>
        </div>
        <div id="offInfoCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="offInfoHeader">
            <div class="panel-body">
                <table class="table table-hover" id="offInfoStatsTable" style="text-align: center; font-size: small">
                    <?php
                    $offInfoResult = mysql_query("SELECT * FROM `{$fran}_info` Where Year='{$franYear}' and Preseason='N'");

                    while ($offInfoRow = mysql_fetch_array($offInfoResult)) {
                        echo '<tr>',
                        '<td>', $offInfoRow['Field'], '</td>',
                        '<td><span id="', $offInfoRow['Identify'], 'History" class="offInfoHistory" style="cursor: pointer" data-toggle="popover" title="History">', $offInfoRow['Value'], '</span></td>',
                        '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="coachCHGHeader">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#OffseasonCollapse" href="#coachCHGCollapse" aria-expanded="true" aria-controls="coachCHGCollapse">
                    Coaching Staff Changes
                </a>
            </h4>
        </div>
        <div id="coachCHGCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="coachCHGHeader">
            <div class="panel-body">
                <table class="table table-hover" id="coachCHGStatsTable" style="text-align: center; font-size: small">
                    <tr>
                        <td>Name</td>
                        <td>Position</td>
                        <td>Age</td>
                        <td>Change</td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Motivation">MOT</span></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Ethics">ETH</span></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Chemistry">CHM</span></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Knowledge">KNO</span></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Offense">OFF</span></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Defense">DEF</span></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Offensive Line">OL</span></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Quarterback">QB</span></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Halfback">HB</span></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Wide Receiver">WR</span></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Defensive Line">DL</span></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Linebacker">LB</span></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Defensive Back">DB</span></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Saftey">S</span></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Kicker">K</span></td>
                        <td><span data-toggle="tooltip" data-placement="top" title="Punter">P</span></td>
                    </tr>
                    <?php
                    $coachCHGResult = mysql_query("SELECT * FROM `{$fran}_off_coach-chg` Where Year='{$franYear}'");

                    while ($coachCHGRow = mysql_fetch_array($coachCHGResult)) {
                        echo '<tr>',
                        '<td><span id="', $coachCHGRow['Row'], 'CoachCHG" class="coachCHGHistory" style="cursor: pointer" data-toggle="popover" title="Coach History">', $coachCHGRow['Name'], '</span></td>',
                        '<td>', $coachCHGRow['Position'], '</td>',
                        '<td>', $coachCHGRow['Age'], '</td>',
                        '<td>', $coachCHGRow['Chg'], '</td>',
                        '<td>', $coachCHGRow['Moto'], '</td>',
                        '<td>', $coachCHGRow['Eth'], '</td>',
                        '<td>', $coachCHGRow['Chem'], '</td>',
                        '<td>', $coachCHGRow['Kno'], '</td>',
                        '<td>', $coachCHGRow['Off'], '</td>',
                        '<td>', $coachCHGRow['Def'], '</td>',
                        '<td>', $coachCHGRow['OL'], '</td>',
                        '<td>', $coachCHGRow['QB'], '</td>',
                        '<td>', $coachCHGRow['RB'], '</td>',
                        '<td>', $coachCHGRow['WR'], '</td>',
                        '<td>', $coachCHGRow['DL'], '</td>',
                        '<td>', $coachCHGRow['LB'], '</td>',
                        '<td>', $coachCHGRow['DB'], '</td>',
                        '<td>', $coachCHGRow['S'], '</td>',
                        '<td>', $coachCHGRow['K'], '</td>',
                        '<td>', $coachCHGRow['P'], '</td>',
                        '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="offAwardHeader">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#OffseasonCollapse" href="#offAwardCollapse" aria-expanded="true" aria-controls="offAwardCollapse">
                    Yearly Awards
                </a>
            </h4>
        </div>
        <div id="offAwardCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="offAwardHeader">
            <div class="panel-body">
                <table class="table table-hover" id="offAwardStatsTable" style="text-align: center; font-size: small">

                    <tr><td></td><td>Position</td><td style="text-align: left">Award</td></tr>

                    <?php
                    $offAwardResult = mysql_query("SELECT * FROM `{$fran}_off_awards` Where Year='{$franYear}'");

                    while ($offAwardRow = mysql_fetch_array($offAwardResult)) {
                        echo '<tr>';

                        if ($offAwardRow['Historical_ID'] === '-') {
                            echo '<td>', $offAwardRow['Player'], '</td>';
                        } else {
                            echo '<td><span id="', $offAwardRow['Row'], 'Award" class="awardHistory" style="cursor: pointer" data-toggle="popover" title="History">', $offAwardRow['Player'], '</span></td>';
                        }
                        echo '<td>', $offAwardRow['Position'], '</td>',
                        '<td style="text-align: left">', $offAwardRow['Award'], '</td>',
                        '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="offProBowlHeader">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#OffseasonCollapse" href="#offProBowlCollapse" aria-expanded="true" aria-controls="offProBowlCollapse">
                    Pro Bowl
                </a>
            </h4>
        </div>
        <div id="offProBowlCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="offProBowlHeader">
            <div class="panel-body">
                <table class="table table-hover" id="offProBowlStatsTable" style="text-align: center; font-size: small">

                    <tr><td>Player</td><td>Position</td></tr>

                    <?php
                    $offProBowlResult = mysql_query("SELECT * FROM `{$fran}_off_probowl` Where Year='{$franYear}'");

                    while ($offProBowlRow = mysql_fetch_array($offProBowlResult)) {
                        echo '<tr>';

                        if ($offProBowlRow['Historical_ID'] === '-') {
                            echo '<td>', $offProBowlRow['Player'], '</td>';
                        } else {
                            echo '<td><span id="', $offProBowlRow['Row'], 'ProBowl" class="probowlHistory" style="cursor: pointer" data-toggle="popover" title="History">', $offProBowlRow['Player'], '</span></td>';
                        }
                        echo '<td>', $offProBowlRow['Position'], '</td>',
                        '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="offRetiredHeader">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#OffseasonCollapse" href="#offRetiredCollapse" aria-expanded="true" aria-controls="offRetiredCollapse">
                    Retired Players
                </a>
            </h4>
        </div>
        <div id="offRetiredCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="offRetiredHeader">
            <div class="panel-body">
                <table class="table table-hover" id="offRetiredStatsTable" style="text-align: center; font-size: small">

                    <tr><td></td><td>Position</td><td>Overall</td><td>Age</td></tr>

                    <?php
                    $offRetiredResult = mysql_query("SELECT * FROM `{$fran}_off_moves` Where Year='{$franYear}' and `Type`='retired'");

                    while ($offRetiredRow = mysql_fetch_array($offRetiredResult)) {
                        echo '<tr>',
                        '<td>', $offRetiredRow['Player'], '</td>',
                        '<td>', $offRetiredRow['Position'], '</td>',
                        '<td>', $offRetiredRow['Overall'], '</td>',
                        '<td>', $offRetiredRow['Age'], '</td>',
                        '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="offprefaHeader">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#OffseasonCollapse" href="#offprefaCollapse" aria-expanded="true" aria-controls="offprefaCollapse">
                    Pre-Draft Free Agency
                </a>
            </h4>
        </div>
        <div id="offprefaCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="offprefaHeader">
            <div class="panel-body">
                <table class="table table-hover" id="offprefaStatsTable" style="text-align: center; font-size: small">

                    <tr><td></td><td>Position</td><td>Overall</td><td>Age</td></tr>

                    <?php
                    $offprefaResult = mysql_query("SELECT * FROM `{$fran}_off_moves` Where Year='{$franYear}' and `Type`='prefa'");

                    while ($offprefaRow = mysql_fetch_array($offprefaResult)) {
                        echo '<tr>',
                        '<td>', $offprefaRow['Player'], '</td>',
                        '<td>', $offprefaRow['Position'], '</td>',
                        '<td>', $offprefaRow['Overall'], '</td>',
                        '<td>', $offprefaRow['Age'], '</td>',
                        '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="offdraftHeader">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#OffseasonCollapse" href="#offdraftCollapse" aria-expanded="true" aria-controls="offdraftCollapse">
                    The Draft
                </a>
            </h4>
        </div>
        <div id="offdraftCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="offdraftHeader">
            <div class="panel-body">
                <table class="table table-hover" id="offdraftStatsTable" style="text-align: center; font-size: small">

                    <tr><td>Round-Pick</td><td>Player</td><td>Position</td><td>Overall</td><td>Age</td></tr>

                    <?php
                    $offdraftResult = mysql_query("SELECT * FROM `{$fran}_off_moves` Where Year='{$franYear}' and `Type`='draft'");

                    while ($offdraftRow = mysql_fetch_array($offdraftResult)) {
                        echo '<tr>',
                        '<td>', $offdraftRow['Draft'], '</td>',
                        '<td>', $offdraftRow['Player'], '</td>',
                        '<td>', $offdraftRow['Position'], '</td>',
                        '<td>', $offdraftRow['Overall'], '</td>',
                        '<td>', $offdraftRow['Age'], '</td>',
                        '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="offpostfaHeader">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#OffseasonCollapse" href="#offpostfaCollapse" aria-expanded="true" aria-controls="offpostfaCollapse">
                    Post-Draft Free Agency
                </a>
            </h4>
        </div>
        <div id="offpostfaCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="offpostfaHeader">
            <div class="panel-body">
                <table class="table table-hover" id="offpostfaStatsTable" style="text-align: center; font-size: small">

                    <tr><td></td><td>Position</td><td>Overall</td><td>Age</td></tr>

                    <?php
                    $offpostfaResult = mysql_query("SELECT * FROM `{$fran}_off_moves` Where Year='{$franYear}' and `Type`='postfa'");

                    while ($offpostfaRow = mysql_fetch_array($offpostfaResult)) {
                        echo '<tr>',
                        '<td>', $offpostfaRow['Player'], '</td>',
                        '<td>', $offpostfaRow['Position'], '</td>',
                        '<td>', $offpostfaRow['Overall'], '</td>',
                        '<td>', $offpostfaRow['Age'], '</td>',
                        '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>


<?php
include ('../../_history/offseason_History.php');
include ('../../_history/offcoach_History.php');
include ('../../_history/award_History.php');
include ('../../_history/probowl_History.php');

