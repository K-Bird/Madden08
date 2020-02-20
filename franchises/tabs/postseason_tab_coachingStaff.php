<br>
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
                    $coachCHGResult = db_query("SELECT * FROM `franchise_year_off_coach` Where Year='{$View_Year}' AND Team='{$Curr_Team}' ORDER BY Historical_ID ASC");

                    while ($coachCHGRow = $coachCHGResult->fetch_assoc()) {
                        echo '<tr>',
                        '<td><span id="', $coachCHGRow['Row'], 'CoachCHG" class="historyModal" style="cursor: pointer" data-toggle="popover" title="Coach History">', $coachCHGRow['Name'], '</span><br><span id="', $coachCHGRow['Row'], '/Name" class="io io-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['Position'],'</td>',
                        '<td>', $coachCHGRow['Age'], '<br><span id="', $coachCHGRow['Row'], '/Age" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['Chg'], '<br><span id="', $coachCHGRow['Row'], '/Chg" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['Moto'], '<br><span id="', $coachCHGRow['Row'], '/Moto" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['Eth'], '<br><span id="', $coachCHGRow['Row'], '/Eth" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['Chem'], '<br><span id="', $coachCHGRow['Row'], '/Chem" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['Kno'], '<br><span id="', $coachCHGRow['Row'], '/Kno" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['Off'], '<br><span id="', $coachCHGRow['Row'], '/Off" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['Def'], '<br><span id="', $coachCHGRow['Row'], '/Def" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['OL'], '<br><span id="', $coachCHGRow['Row'], '/OL" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['QB'], '<br><span id="', $coachCHGRow['Row'], '/QB" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['RB'], '<br><span id="', $coachCHGRow['Row'], '/RB" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['WR'], '<br><span id="', $coachCHGRow['Row'], '/WR" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['DL'], '<br><span id="', $coachCHGRow['Row'], '/DL" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['LB'], '<br><span id="', $coachCHGRow['Row'], '/LB" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['DB'], '<br><span id="', $coachCHGRow['Row'], '/DB" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['S'], '<br><span id="', $coachCHGRow['Row'], '/S" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['K'], '<br><span id="', $coachCHGRow['Row'], '/K" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '<td>', $coachCHGRow['P'], '<br><span id="', $coachCHGRow['Row'], '/P" class="oi oi-pencil franViewEdit" onclick="updateCoachChg(this)" aria-hidden="true" style="display: none"></td>',
                        '</tr>';
                    }
                    ?>
                </table>