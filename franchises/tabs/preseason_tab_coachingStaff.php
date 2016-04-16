<br>
<table class="table" style="text-align: center; font-size: small">
    <tr><td>Head Coach</td><td>Offensive Coordinator</td><td>Defensive Coordinator</td><td>Special Teams Coordinator</td></tr>
    <tr>
        <td>
            <?php
            $HCresult = db_query("SELECT * FROM `franchise_year_pre_coaches` Where Position='HC' and Year='{$View_Year}' and Team='{$Curr_Team}'");

            while ($HCrow = $HCresult->fetch_assoc()) {
                echo '<span id="HCHistory" class="historyModal" style="cursor: pointer" data-toggle="popover" data-placement="bottom" title="Head Coach History">', $HCrow['Name'], '</span>',
                '<br><br><a class="btn btn-default franViewEdit" style="display: none" data-toggle="modal" data-table="coaches" data-col="Name" data-row=', $HCrow['Row'], ' data-target="#', $HCrow['Position'], 'Modal">Edit HC</a>';
            }
            ?>
        </td>
        <td>
            <?php
            $OCresult = db_query("SELECT * FROM `franchise_year_pre_coaches` Where Position = 'OC' and `Year` = '{$View_Year}' and `Team`='{$Curr_Team}'");
            while ($OCrow = $OCresult->fetch_assoc()) {
                echo '<span  id="OCHistory" class="historyModal" style="cursor: pointer" data-toggle="popover" data-placement="bottom" title="Offensive Coordinator History">', $OCrow['Name'], '</span>',
                '<br><br><a class="btn btn-default franViewEdit" style="display: none" data-toggle="modal" data-table="coaches" data-col="Name" data-row=', $OCrow['Row'], ' data-target="#', $OCrow['Position'], 'Modal">Edit OC</a></td>';
            }
            ?>
        </td>
        <td>
            <?php
            $DCresult = db_query("SELECT * FROM `franchise_year_pre_coaches` Where Position = 'DC' and `Year` = '{$View_Year}' and `Team`='{$Curr_Team}'");
            while ($DCrow = $DCresult->fetch_assoc()) {
                echo '<span  id="DCHistory" class="historyModal" style="cursor: pointer" data-toggle="popover" data-placement="bottom" title="Defensive Coordinator History">', $DCrow['Name'], '</span>',
                '<br><br><a class="btn btn-default franViewEdit" style="display: none" data-toggle="modal" data-table="coaches" data-col="Name" data-row=', $DCrow['Row'], ' data-target="#', $DCrow['Position'], 'Modal">Edit DC</a></td>';
            }
            ?>
        </td>
        <td>
            <?php
            $STresult = db_query("SELECT * FROM `franchise_year_pre_coaches` Where Position = 'ST' and `Year` = '{$View_Year}' and `Team`='{$Curr_Team}'");
            while ($STrow = $STresult->fetch_assoc()) {
                echo '<span  id="STHistory" class="historyModal" style="cursor: pointer" data-toggle="popover" data-placement="bottom" title="Special Teams Coordinator History">', $STrow['Name'], '</span>',
                '<br><br><a class="btn btn-default franViewEdit" style="display: none" data-toggle="modal" data-table="coaches" data-col="Name" data-row=', $STrow['Row'], ' data-target="#', $STrow['Position'], 'Modal">Edit ST</a></td>';
            }
            ?>
        </td>
    </tr>
</table>

