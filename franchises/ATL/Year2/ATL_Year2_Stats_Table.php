<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("gamessitedatabase", $con);

echo '<a href="#stats"></a>';
echo '<table class="table table-hover" id="stats" style="text-align: center; font-size: small">';

if (!isset($_SESSION['Admin'])) {
    $_SESSION['Admin'] = False;
} if ($_SESSION['Admin'] == true) {

    echo '<tr>';
    echo '<td colspan="7">Regular Season Stats</td>';
    echo '</tr>';

    /* Passing Stats Section */
    $result = mysql_query("SELECT * FROM `gm_madden08-atl_2_stats` Where Category='passing'");

    echo '<tr>';
    echo '<td colspan="7" style="text-align:left">-- Passing Stats --</td>';
    echo '</tr>';
    echo '<tr>';

    echo '<td>Player</td>', '<td>', 'Passer Rating', '</td>', '<td>', 'Passing Yards', '</td>', '<td>', 'TDs', '</td>', '<td>', 'INTs', '</td>', '<td>', 'Completion %', '</td>', '<td>', 'Times Sacked', '</td>';
    echo '</tr>';

    while ($row = mysql_fetch_array($result)) {
        if ($row['Player'] == '') {
            echo '<tr><td id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">', $row['Player'], '</td>',
            '<td colspan="6"><form action="_Update/Remove_Stats_Row.php" method = "post">
	<input style="width:300px;" type="submit" name="Remove" value="Remove Row" />
	<input type="hidden" name="fran" value="atl"></input>
	<input type="hidden" name="year" value="2"></input>
	<input type="hidden" name="row" value="', $row['Row'], '"></input>
	</form></td></tr>';
        } else { {
                echo '<tr>';
                echo '<td id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], '/atl/2/Rating" onclick="updateStat(this)">', $row['Rating'], '</td>', '<td id="', $row['Row'], '/atl/2/Yds" onclick="updateStat(this)">', $row['Yds'], '</td>', '<td id="', $row['Row'], '/atl/2/TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], '/atl/2/INTs" onclick="updateStat(this)">', $row['INTs'], '</td>', '<td id="', $row['Row'], '/atl/2/Percent" onclick="updateStat(this)">', $row['Percent'], '</td>', '<td id="', $row['Row'], '/atl/2/Sacks" onclick="updateStat(this)">', $row['Sacks'], '</td>';
                echo '</tr>';
            }
        }
    }

    /* Rushing Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left">-- Rushing Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-atl_2_stats` Where Category='rushing'");

    echo '<tr>';

    echo '<td>Player</td>', '<td>', 'Rush Yards', '</td>', '<td>', 'TDs', '</td>', '<td>', 'Yards Per Carry', '</td>', '<td>', 'Fumbles', '</td>', '<td>', 'Broken Tackles', '</td>', '<td>', 'Longest Run', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {

        if ($row['Player'] == '') {
            echo '<tr><td id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">', $row['Player'], '</td>',
            '<td colspan="6"><form action="_Update/Remove_Stats_Row.php" method = "post">
	<input style="width:300px;" type="submit" name="Remove" value="Remove Row" />
	<input type="hidden" name="fran" value="atl"></input>
	<input type="hidden" name="year" value="2"></input>
	<input type="hidden" name="row" value="', $row['Row'], '"></input>
	</form></td></tr>';
        } else {
            echo '<tr>';
            echo '<td id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], '/atl/2/Yds" onclick="updateStat(this)">', $row['Yds'], '</td>', '<td id="', $row['Row'], '/atl/2/TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], '/atl/2/AVG" onclick="updateStat(this)">', $row['AVG'], '</td>', '<td id="', $row['Row'], '/atl/2/Fumbles" onclick="updateStat(this)">', $row['Fumbles'], '</td>', '<td id="', $row['Row'], '/atl/2/BrokenTackles" onclick="updateStat(this)">', $row['BrokenTackles'], '</td>', '<td id="', $row['Row'], '/atl/2/Longest" onclick="updateStat(this)">', $row['Longest'], '</td>';
            echo '</tr>';
        }
    }

    /* Receiving Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left">-- Receiving Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-atl_2_stats` Where Category='rec'");

    echo '<tr>';

    echo '<td>Player</td>', '<td>', 'Receptions', '</td>', '<td>', 'Receiving Yards', '</td>', '<td>', 'TDs', '</td>', '<td>', 'Yards Per Catch', '</td>', '<td>', 'Longest Catch', '</td>', '<td>', 'Dropped Passes', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {

        if ($row['Player'] == '') {
            echo '<tr><td id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">', $row['Player'], '</td>',
            '<td colspan="6"><form action="_Update/Remove_Stats_Row.php" method = "post">
	<input style="width:300px;" type="submit" name="Remove" value="Remove Row" />
	<input type="hidden" name="fran" value="atl"></input>
	<input type="hidden" name="year" value="2"></input>
	<input type="hidden" name="row" value="', $row['Row'], '"></input>
	</form></td></tr>';
        } else {
            echo '<tr>';
            echo '<td id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], '/atl/2/Rec" onclick="updateStat(this)">', $row['Rec'], '</td>', '<td id="', $row['Row'], '/atl/2/Yds" onclick="updateStat(this)">', $row['Yds'], '</td>', '<td id="', $row['Row'], '/atl/2/TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], '/atl/2/AVG" onclick="updateStat(this)">', $row['AVG'], '</td>', '<td id="', $row['Row'], '/atl/2/Longest" onclick="updateStat(this)">', $row['Longest'], '</td>', '<td id="', $row['Row'], '/atl/2/Dropped" onclick="updateStat(this)">', $row['Dropped'], '</td>';
            echo '</tr>';
        }
    }

    /* Defensive Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left">-- Defensive Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-atl_2_stats` Where Category='def'");

    echo '<tr>';

    echo '<td>Player</td>', '<td>', 'Tackles', '</td>', '<td>', 'Tackles for Loss', '</td>', '<td>', 'Sacks', '</td>', '<td>', 'Interceptions', '</td>', '<td>', 'TDs', '</td>', '<td>', 'Safety', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {

        if ($row['Player'] == '') {
            echo '<tr><td id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">', $row['Player'], '</td>',
            '<td colspan="6"><form action="_Update/Remove_Stats_Row.php" method = "post">
	<input style="width:300px;" type="submit" name="Remove" value="Remove Row" />
	<input type="hidden" name="fran" value="atl"></input>
	<input type="hidden" name="year" value="2"></input>
	<input type="hidden" name="row" value="', $row['Row'], '"></input>
	</form></td></tr>';
        } else {
            echo '<tr>';
            echo '<td id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], '/atl/2/Tackles" onclick="updateStat(this)">', $row['Tackles'], '</td>', '<td id="', $row['Row'], '/atl/2/ForLoss" onclick="updateStat(this)">', $row['ForLoss'], '</td>', '<td id="', $row['Row'], '/atl/2/Sacks" onclick="updateStat(this)">', $row['Sacks'], '</td>', '<td id="', $row['Row'], '/atl/2/INTs" onclick="updateStat(this)">', $row['INTs'], '</td>', '<td id="', $row['Row'], '/atl/2/TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], '/atl/2/Safety" onclick="updateStat(this)">', $row['Safety'], '</td>';
            echo '</tr>';
        }
    }

    /* Blocking Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left" >-- Blocking Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-atl_2_stats` Where Category='blocking'");

    echo '<tr>';

    echo '<td colspan="5">Player</td>', '<td>', 'Pancakes', '</td>', '<td>', 'SacksAllowed', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {

        if ($row['Player'] == '') {
            echo '<tr><td id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">', $row['Player'], '</td>',
            '<td colspan="6"><form action="_Update/Remove_Stats_Row.php" method = "post">
	<input style="width:300px;" type="submit" name="Remove" value="Remove Row" />
	<input type="hidden" name="fran" value="atl"></input>
	<input type="hidden" name="year" value="2"></input>
	<input type="hidden" name="row" value="', $row['Row'], '"></input>
	</form></td></tr>';
        } else {
            echo '<tr>';
            echo '<td colspan="5" id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], '/atl/2/Pancakes" onclick="updateStat(this)">', $row['Pancakes'], '</td>', '<td id="', $row['Row'], '/atl/2/Sacks" onclick="updateStat(this)">', $row['Sacks'], '</td>';
            echo '</tr>';
        }
    }

    /* Kicking Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left" >-- Kicking Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-atl_2_stats` Where Category='kicking'");

    echo '<tr>';

    echo '<td colspan="3">Player</td>', '<td>', 'FGs Made', '</td>', '<td>', 'FGs Attempted', '</td>', '<td>', 'Kick %', '</td>', '<td>', 'Longest Made', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {

        if ($row['Player'] == '') {
            echo '<tr><td id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">', $row['Player'], '</td>',
            '<td colspan="6"><form action="_Update/Remove_Stats_Row.php" method = "post">
	<input style="width:300px;" type="submit" name="Remove" value="Remove Row" />
	<input type="hidden" name="fran" value="atl"></input>
	<input type="hidden" name="year" value="2"></input>
	<input type="hidden" name="row" value="', $row['Row'], '"></input>
	</form></td></tr>';
        } else {
            echo '<tr>';
            echo '<td colspan="3" id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], '/atl/2/Made" onclick="updateStat(this)">', $row['Made'], '</td>', '<td id="', $row['Row'], '/atl/2/Attempted" onclick="updateStat(this)">', $row['Attempted'], '</td>', '<td id="', $row['Row'], '/atl/2/KickPercent" onclick="updateStat(this)">', $row['KickPercent'], '</td>', '<td id="', $row['Row'], '/atl/2/Longest" onclick="updateStat(this)">', $row['Longest'], '</td>';
            echo '</tr>';
        }
    }


    /* Punting Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left" >-- Punting Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-atl_2_stats` Where Category='punting'");

    echo '<tr>';

    echo '<td colspan="5" id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">Player</td>', '<td>', 'Punt Average', '</td>', '<td>', '# Inside the 20', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {

        if ($row['Player'] == '') {
            echo '<tr><td id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">', $row['Player'], '</td>',
            '<td colspan="6"><form action="_Update/Remove_Stats_Row.php" method = "post">
	<input style="width:300px;" type="submit" name="Remove" value="Remove Row" />
	<input type="hidden" name="fran" value="atl"></input>
	<input type="hidden" name="year" value="2"></input>
	<input type="hidden" name="row" value="', $row['Row'], '"></input>
	</form></td></tr>';
        } else {
            echo '<tr>';
            echo '<td colspan="5" id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], '/atl/2/AVG" onclick="updateStat(this)">', $row['AVG'], '</td>', '<td id="', $row['Row'], '/atl/2/KPS" onclick="updateStat(this)">', $row['KPS'], '</td>';
            echo '</tr>';
        }
    }


    /* Return Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left" >-- Return Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-atl_2_stats` Where Category='return'");

    echo '<tr>';

    echo '<td colspan="4" id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">Player</td>', '<td>', 'Return Average', '</td>', '<td>', 'Return TDs', '</td>', '<td>', 'Longest Return', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {

        if ($row['Player'] == '') {
            echo '<tr><td id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">', $row['Player'], '</td>',
            '<td colspan="6"><form action="_Update/Remove_Stats_Row.php" method = "post">
	<input class="btn btn-danger" type="submit" name="Remove" value="Remove Row" />
	<input type="hidden" name="fran" value="atl"></input>
	<input type="hidden" name="year" value="2"></input>
	<input type="hidden" name="row" value="', $row['Row'], '"></input>
	</form></td></tr>';
        } else {
            echo '<tr>';
            echo '<td colspan="4" id="', $row['Row'], '/atl/2/Player" onclick="updateStat(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], '/atl/2/AVG" onclick="updateStat(this)">', $row['AVG'], '</td>', '<td id="', $row['Row'], '/atl/2/TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], '/atl/2/Longest" onclick="updateStat(this)">', $row['Longest'], '</td>';
            echo '</tr>';
        }
    }
}

/* * **************************************** If Admin = False ************************************************************** */

if ($_SESSION['Admin'] == false) {

    echo '<tr>';
    echo '<td colspan="7">Regular Season Stats</td>';
    echo '</tr>';

    /* Passing Stats Section */
    $result = mysql_query("SELECT * FROM `gm_madden08-atl_2_stats` Where Category='passing'");

    echo '<tr>';
    echo '<td colspan="7" style="text-align:left">-- Passing Stats --</td>';
    echo '</tr>';
    echo '<tr>';

    echo '<td>Player</td>', '<td>', 'Passer Rating', '</td>', '<td>', 'Passing Yards', '</td>', '<td>', 'TDs', '</td>', '<td>', 'INTs', '</td>', '<td>', 'Completion %', '</td>', '<td>', 'Times Sacked', '</td>';
    echo '</tr>';

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Player'], '</td>', '<td id="', $row['Row'], 'atl2Rating" onclick="">', $row['Rating'], '</td>', '<td id="', $row['Row'], 'atl2Yds" onclick="updateStat(this)">', $row['Yds'], '</td>', '<td id="', $row['Row'], 'atl2TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], 'atl2INTs" onclick="updateStat(this)">', $row['INTs'], '</td>', '<td id="', $row['Row'], 'atl2Percent" onclick="updateStat(this)">', $row['Percent'], '</td>', '<td id="', $row['Row'], 'atl2Sacks" onclick="updateStat(this)">', $row['Sacks'], '</td>';
        echo '</tr>';
    }

    /* Rushing Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left">-- Rushing Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-atl_2_stats` Where Category='rushing'");

    echo '<tr>';

    echo '<td>Player</td>', '<td>', 'Rush Yards', '</td>', '<td>', 'TDs', '</td>', '<td>', 'Yards Per Carry', '</td>', '<td>', 'Fumbles', '</td>', '<td>', 'Broken Tackles', '</td>', '<td>', 'Longest Run', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Player'], '</td>', '<td id="', $row['Row'], 'atl2Yds" onclick="">', $row['Yds'], '</td>', '<td id="', $row['Row'], 'atl2TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], 'atl2AVG" onclick="updateStat(this)">', $row['AVG'], '</td>', '<td id="', $row['Row'], 'atl2Fumbles" onclick="updateStat(this)">', $row['Fumbles'], '</td>', '<td id="', $row['Row'], 'atl2BrokenTackles" onclick="updateStat(this)">', $row['BrokenTackles'], '</td>', '<td id="', $row['Row'], 'atl2Longest" onclick="updateStat(this)">', $row['Longest'], '</td>';
        echo '</tr>';
    }

    /* Receiving Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left">-- Receiving Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-atl_2_stats` Where Category='rec'");

    echo '<tr>';

    echo '<td>Player</td>', '<td>', 'Receptions', '</td>', '<td>', 'Receiving Yards', '</td>', '<td>', 'TDs', '</td>', '<td>', 'Yards Per Catch', '</td>', '<td>', 'Longest Catch', '</td>', '<td>', 'Dropped Passes', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Player'], '</td>', '<td id="', $row['Row'], 'atl2Rec" onclick="">', $row['Rec'], '</td>', '<td id="', $row['Row'], 'atl2Yds" onclick="updateStat(this)">', $row['Yds'], '</td>', '<td id="', $row['Row'], 'atl2TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], 'atl2AVG" onclick="updateStat(this)">', $row['AVG'], '</td>', '<td id="', $row['Row'], 'atl2Longest" onclick="updateStat(this)">', $row['Longest'], '</td>', '<td id="', $row['Row'], 'atl2Dropped" onclick="updateStat(this)">', $row['Dropped'], '</td>';
        echo '</tr>';
    }

    /* Defensive Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left">-- Defensive Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-atl_2_stats` Where Category='def'");

    echo '<tr>';

    echo '<td>Player</td>', '<td>', 'Tackles', '</td>', '<td>', 'Tackles for Loss', '</td>', '<td>', 'Sacks', '</td>', '<td>', 'Interceptions', '</td>', '<td>', 'TDs', '</td>', '<td>', 'Safety', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Player'], '</td>', '<td id="', $row['Row'], 'atl2Tackles" onclick="">', $row['Tackles'], '</td>', '<td id="', $row['Row'], 'atl2ForLoss" onclick="updateStat(this)">', $row['ForLoss'], '</td>', '<td id="', $row['Row'], 'atl2Sacks" onclick="updateStat(this)">', $row['Sacks'], '</td>', '<td id="', $row['Row'], 'atl2INTs" onclick="updateStat(this)">', $row['INTs'], '</td>', '<td id="', $row['Row'], 'atl2TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], 'atl2Safety" onclick="updateStat(this)">', $row['Safety'], '</td>';
        echo '</tr>';
    }

    /* Blocking Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left" >-- Blocking Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-atl_2_stats` Where Category='blocking'");

    echo '<tr>';

    echo '<td colspan="5">Player</td>', '<td>', 'Pancakes', '</td>', '<td>', 'SacksAllowed', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="5">', $row['Player'], '</td>', '<td id="', $row['Row'], 'atl2Pancakes" onclick="">', $row['Pancakes'], '</td>', '<td id="', $row['Row'], 'atl2Sacks" onclick="updateStat(this)">', $row['Sacks'], '</td>';
        echo '</tr>';
    }

    /* Kicking Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left" >-- Kicking Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-atl_2_stats` Where Category='kicking'");

    echo '<tr>';

    echo '<td colspan="3">Player</td>', '<td>', 'FGs Made', '</td>', '<td>', 'FGs Attempted', '</td>', '<td>', 'Kick %', '</td>', '<td>', 'Longest Made', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="3">', $row['Player'], '</td>', '<td id="', $row['Row'], 'atl2Made" onclick="">', $row['Made'], '</td>', '<td id="', $row['Row'], 'atl2Attempted" onclick="updateStat(this)">', $row['Attempted'], '</td>', '<td id="', $row['Row'], 'atl2KickPercent" onclick="updateStat(this)">', $row['KickPercent'], '</td>', '<td id="', $row['Row'], 'atl2Longest" onclick="updateStat(this)">', $row['Longest'], '</td>';
        echo '</tr>';
    }


    /* Punting Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left" >-- Punting Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-atl_2_stats` Where Category='punting'");

    echo '<tr>';

    echo '<td colspan="5">Player</td>', '<td>', 'Punt Average', '</td>', '<td>', '# Inside the 20', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="5">', $row['Player'], '</td>', '<td id="', $row['Row'], 'atl2AVG" onclick="">', $row['AVG'], '</td>', '<td id="', $row['Row'], 'atl2KPS" onclick="updateStat(this)">', $row['KPS'], '</td>';
        echo '</tr>';
    }


    /* Return Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left" >-- Return Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-atl_2_stats` Where Category='return'");

    echo '<tr>';

    echo '<td colspan="4">Player</td>', '<td>', 'Return Average', '</td>', '<td>', 'Return TDs', '</td>', '<td>', 'Longest Return', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="4">', $row['Player'], '</td>', '<td id="', $row['Row'], 'atl2AVG" onclick="">', $row['AVG'], '</td>', '<td id="', $row['Row'], 'atl2TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], 'atl2Longest" onclick="updateStat(this)">', $row['Longest'], '</td>';
        echo '</tr>';
    }
}

echo '</table>';

mysql_close($con);
?>