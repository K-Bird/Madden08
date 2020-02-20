<br>
<div class="row">
    <div class="col-lg-4">
        <table id="teamStatsOTable" class="table table-sm" style="font-size: small">
            <tr>
                <td colspan="3">Offense</td>
            </tr>
            <tr>
                <td>Stat</td><td>Value</td><td>NFL Rank</td>
            </tr>
            <?php
            $TS_O_Results = db_query("SELECT * FROM `franchise_year_teamstats` Where Category='O' AND Year='{$View_Year}' AND Team='{$Curr_Team}' ORDER BY `Year`");

            while ($TS_O_Row = $TS_O_Results->fetch_assoc()) {

                $Base_ID = $TS_O_Row['Identifier'];
                $TS_O_ID = db_query("SELECT * FROM `identify_teamstat` WHERE Identifier='{$Base_ID}'");
                $TS_O_ID_Row = $TS_O_ID->fetch_assoc();
                $ID = $TS_O_ID_Row['Value'];

                echo '<tr>';
                echo '<td><span id="', $TS_O_Row['Identifier'], 'History" class="historyModal" style="cursor: pointer" data-toggle="popover" title="History">', $ID, '</span></td>',
                '<td> 
                    
                <form class="scoreForm" action="../libs/ajax/franchise_view/teamstats/update_franchise_teamstats_value.php" method="POST" style="width:200px">
                    <div class="input-group franViewEdit">
                            <input type="text" class="form-control" name="newValue" placeholder="', $TS_O_Row['Value'], '">
                            <input type="hidden" name="row" value="', $TS_O_Row['Row'], '">
                            <span class="input-group-btn">
                              <button class="btn btn-secondary scoreBtn" type="submit">Update</button>
                            </span>
                        </div>
                 </form>                     
                        
                <span class="franViewDisplay">', $TS_O_Row['Value'], '</span></td>',
                '<td>
                    
                    <form class="scoreForm" action="../libs/ajax/franchise_view/teamstats/update_franchise_teamstats_rank.php" method="POST" style="width:200px">
                        <div class="input-group franViewEdit">
                                <input type="text" class="form-control" name="newRank" placeholder="', $TS_O_Row['Rank'], '">
                                <input type="hidden" name="row" value="', $TS_O_Row['Row'], '">
                                <span class="input-group-btn">
                                  <button class="btn btn-secondary scoreBtn" type="submit">Update</button>
                                </span>
                            </div>
                    </form>
                    
                    <span class="franViewDisplay">', $TS_O_Row['Rank'], ' / 32</td>';
                echo '</tr>';
            }
            ?>

        </table>
    </div>
    <div class="col-lg-4">
        <table id="teamStatsDTable" class="table table-sm" style="font-size: small">
            <tr>
                <td colspan="3">Defense</td>
            </tr>
            <tr>
                <td>Stat</td><td>Value</td><td>NFL Rank</td>
            </tr>
            <?php
            $TS_D_Results = db_query("SELECT * FROM `franchise_year_teamstats` Where Category='D' AND Year='{$View_Year}' AND Team='{$Curr_Team}'");

            while ($TS_D_Row = $TS_D_Results->fetch_assoc()) {

                $Base_ID = $TS_D_Row['Identifier'];
                $TS_D_ID = db_query("SELECT * FROM `identify_teamstat` WHERE Identifier='{$Base_ID}'");
                $TS_D_ID_Row = $TS_D_ID->fetch_assoc();
                $ID = $TS_D_ID_Row['Value'];

                echo '<tr>';
                echo '<td><span id="', $TS_D_Row['Identifier'], 'History" class="historyModal" style="cursor: pointer" data-toggle="popover" title="History">', $ID, '</span></td>',
                '<td> 
                    
                <form class="scoreForm" action="../libs/ajax/franchise_view/teamstats/update_franchise_teamstats_value.php" method="POST" style="width:200px">
                    <div class="input-group franViewEdit">
                            <input type="text" class="form-control" name="newValue" placeholder="', $TS_D_Row['Value'], '">
                            <input type="hidden" name="row" value="', $TS_D_Row['Row'], '">
                            <span class="input-group-btn">
                              <button class="btn btn-secondary scoreBtn" type="submit">Update</button>
                            </span>
                        </div>
                 </form>                     
                        
                <span class="franViewDisplay">', $TS_D_Row['Value'], '</span></td>',
                '<td>
                    
                    <form class="scoreForm" action="../libs/ajax/franchise_view/teamstats/update_franchise_teamstats_rank.php" method="POST" style="width:200px">
                        <div class="input-group franViewEdit">
                                <input type="text" class="form-control" name="newRank" placeholder="', $TS_D_Row['Rank'], '">
                                <input type="hidden" name="row" value="', $TS_D_Row['Row'], '">
                                <span class="input-group-btn">
                                  <button class="btn btn-secondary scoreBtn" type="submit">Update</button>
                                </span>
                            </div>
                    </form>
                    
                    <span class="franViewDisplay">', $TS_D_Row['Rank'], ' / 32</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
    <div class="col-lg-4">
        <table id="teamStatsETable" class="table table-sm" style="font-size: small">
            <tr>
                <td colspan="3">Efficiency</td>
            </tr>
            <tr>
                <td>Stat</td><td>Value</td><td>NFL Rank</td>
            </tr>
            <?php
            $TS_E_Results = db_query("SELECT * FROM `franchise_year_teamstats` Where Category='E' AND Year='{$View_Year}' AND Team='{$Curr_Team}'");

            while ($TS_E_Row = $TS_E_Results->fetch_assoc()) {

                $Base_ID = $TS_E_Row['Identifier'];
                $TS_E_ID = db_query("SELECT * FROM `identify_teamstat` WHERE Identifier='{$Base_ID}'");
                $TS_E_ID_Row = $TS_E_ID->fetch_assoc();
                $ID = $TS_E_ID_Row['Value'];

                echo '<tr>';
                echo '<td><span id="', $TS_E_Row['Identifier'], 'History" class="historyModal" style="cursor: pointer" data-toggle="popover" title="History">', $ID, '</span></td>',
                '<td> 
                    
                <form class="scoreForm" action="../libs/ajax/franchise_view/teamstats/update_franchise_teamstats_value.php" method="POST" style="width:200px">
                    <div class="input-group franViewEdit">
                            <input type="text" class="form-control" name="newValue" placeholder="', $TS_E_Row['Value'], '">
                            <input type="hidden" name="row" value="', $TS_E_Row['Row'], '">
                            <span class="input-group-btn">
                              <button class="btn btn-secondary scoreBtn" type="submit">Update</button>
                            </span>
                        </div>
                 </form>                     
                        
                <span class="franViewDisplay">', $TS_E_Row['Value'], '</span></td>',
                '<td>
                    
                    <form class="scoreForm" action="../libs/ajax/franchise_view/teamstats/update_franchise_teamstats_rank.php" method="POST" style="width:200px">
                        <div class="input-group franViewEdit">
                                <input type="text" class="form-control" name="newRank" placeholder="', $TS_E_Row['Rank'], '">
                                <input type="hidden" name="row" value="', $TS_E_Row['Row'], '">
                                <span class="input-group-btn">
                                  <button class="btn btn-secondary scoreBtn" type="submit">Update</button>
                                </span>
                            </div>
                    </form>
                    
                    <span class="franViewDisplay">', $TS_E_Row['Rank'], ' / 32</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</div>