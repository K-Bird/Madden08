<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("gamessitedatabase", $con);

echo '<a href="#stats"></a>';
echo '<table class="CSSTableGenerator" id="stats">';

if (!isset($_SESSION['Admin'])) {
    $_SESSION['Admin'] = False;
} if ($_SESSION['Admin'] == true) {

    echo '<tr>';
    echo '<td colspan="7">Regular Season Stats</td>';
    echo '</tr>';

    /* Passing Stats Section */
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_stats` Where Category='passing'");

    echo '<tr>';
    echo '<td colspan="7" style="text-align:left; background:crimson">-- Passing Stats --</td>';
    echo '</tr>';
    echo '<tr>';

    echo '<td>Player</td>', '<td>', 'Passer Rating', '</td>', '<td>', 'Passing Yards', '</td>', '<td>', 'TDs', '</td>', '<td>', 'INTs', '</td>', '<td>', 'Completion %', '</td>', '<td>', 'Times Sacked', '</td>';
    echo '</tr>';

    while ($row = mysql_fetch_array($result)) {
        if ($row['Player'] == '') {
            echo '<tr><td id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">', $row['Player'], '</td>',
            '<td colspan="6"><form action="_Update/Remove_Stats_Row.php" method = "post">
	<input style="width:300px;" type="submit" name="Remove" value="Remove Row" />
	<input type="hidden" name="fran" value="NewFran"></input>
	<input type="hidden" name="year" value="1"></input>
	<input type="hidden" name="row" value="', $row['Row'], '"></input>
	</form></td></tr>';
        } else { {
                echo '<tr>';
                echo '<td id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Rating" onclick="updateStat(this)">', $row['Rating'], '</td>', '<td id="', $row['Row'], 'buf1Yds" onclick="updateStat(this)">', $row['Yds'], '</td>', '<td id="', $row['Row'], 'buf1TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], 'buf1INTs" onclick="updateStat(this)">', $row['INTs'], '</td>', '<td id="', $row['Row'], 'buf1Percent" onclick="updateStat(this)">', $row['Percent'], '</td>', '<td id="', $row['Row'], 'buf1Sacks" onclick="updateStat(this)">', $row['Sacks'], '</td>';
                echo '</tr>';
            }
        }
    }

    /* Rushing Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left; background:crimson">-- Rushing Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_stats` Where Category='rushing'");

    echo '<tr>';

    echo '<td>Player</td>', '<td>', 'Rush Yards', '</td>', '<td>', 'TDs', '</td>', '<td>', 'Yards Per Carry', '</td>', '<td>', 'Fumbles', '</td>', '<td>', 'Broken Tackles', '</td>', '<td>', 'Longest Run', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {

        if ($row['Player'] == '') {
            echo '<tr><td id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">', $row['Player'], '</td>',
            '<td colspan="6"><form action="_Update/Remove_Stats_Row.php" method = "post">
	<input style="width:300px;" type="submit" name="Remove" value="Remove Row" />
	<input type="hidden" name="fran" value="NewFran"></input>
	<input type="hidden" name="year" value="1"></input>
	<input type="hidden" name="row" value="', $row['Row'], '"></input>
	</form></td></tr>';
        } else {
            echo '<tr>';
            echo '<td id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Yds" onclick="updateStat(this)">', $row['Yds'], '</td>', '<td id="', $row['Row'], 'buf1TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], 'buf1AVG" onclick="updateStat(this)">', $row['AVG'], '</td>', '<td id="', $row['Row'], 'buf1Fumbles" onclick="updateStat(this)">', $row['Fumbles'], '</td>', '<td id="', $row['Row'], 'buf1BrokenTackles" onclick="updateStat(this)">', $row['BrokenTackles'], '</td>', '<td id="', $row['Row'], 'buf1Longest" onclick="updateStat(this)">', $row['Longest'], '</td>';
            echo '</tr>';
        }
    }

    /* Receiving Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left; background:crimson">-- Receiving Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_stats` Where Category='rec'");

    echo '<tr>';

    echo '<td>Player</td>', '<td>', 'Receptions', '</td>', '<td>', 'Receiving Yards', '</td>', '<td>', 'TDs', '</td>', '<td>', 'Yards Per Catch', '</td>', '<td>', 'Longest Catch', '</td>', '<td>', 'Dropped Passes', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {

        if ($row['Player'] == '') {
            echo '<tr><td id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">', $row['Player'], '</td>',
            '<td colspan="6"><form action="_Update/Remove_Stats_Row.php" method = "post">
	<input style="width:300px;" type="submit" name="Remove" value="Remove Row" />
	<input type="hidden" name="fran" value="NewFran"></input>
	<input type="hidden" name="year" value="1"></input>
	<input type="hidden" name="row" value="', $row['Row'], '"></input>
	</form></td></tr>';
        } else {
            echo '<tr>';
            echo '<td id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Rec" onclick="updateStat(this)">', $row['Rec'], '</td>', '<td id="', $row['Row'], 'buf1Yds" onclick="updateStat(this)">', $row['Yds'], '</td>', '<td id="', $row['Row'], 'buf1TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], 'buf1AVG" onclick="updateStat(this)">', $row['AVG'], '</td>', '<td id="', $row['Row'], 'buf1Longest" onclick="updateStat(this)">', $row['Longest'], '</td>', '<td id="', $row['Row'], 'buf1Dropped" onclick="updateStat(this)">', $row['Dropped'], '</td>';
            echo '</tr>';
        }
    }

    /* Defensive Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left; background:crimson">-- Defensive Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_stats` Where Category='def'");

    echo '<tr>';

    echo '<td>Player</td>', '<td>', 'Tackles', '</td>', '<td>', 'Tackles for Loss', '</td>', '<td>', 'Sacks', '</td>', '<td>', 'Interceptions', '</td>', '<td>', 'TDs', '</td>', '<td>', 'Safety', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {

        if ($row['Player'] == '') {
            echo '<tr><td id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">', $row['Player'], '</td>',
            '<td colspan="6"><form action="_Update/Remove_Stats_Row.php" method = "post">
	<input style="width:300px;" type="submit" name="Remove" value="Remove Row" />
	<input type="hidden" name="fran" value="NewFran"></input>
	<input type="hidden" name="year" value="1"></input>
	<input type="hidden" name="row" value="', $row['Row'], '"></input>
	</form></td></tr>';
        } else {
            echo '<tr>';
            echo '<td id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Tackles" onclick="updateStat(this)">', $row['Tackles'], '</td>', '<td id="', $row['Row'], 'buf1ForLoss" onclick="updateStat(this)">', $row['ForLoss'], '</td>', '<td id="', $row['Row'], 'buf1Sacks" onclick="updateStat(this)">', $row['Sacks'], '</td>', '<td id="', $row['Row'], 'buf1INTs" onclick="updateStat(this)">', $row['INTs'], '</td>', '<td id="', $row['Row'], 'buf1TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], 'buf1Safety" onclick="updateStat(this)">', $row['Safety'], '</td>';
            echo '</tr>';
        }
    }

    /* Blocking Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left; background:crimson" >-- Blocking Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_stats` Where Category='blocking'");

    echo '<tr>';

    echo '<td colspan="5">Player</td>', '<td>', 'Pancakes', '</td>', '<td>', 'SacksAllowed', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {

        if ($row['Player'] == '') {
            echo '<tr><td id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">', $row['Player'], '</td>',
            '<td colspan="6"><form action="_Update/Remove_Stats_Row.php" method = "post">
	<input style="width:300px;" type="submit" name="Remove" value="Remove Row" />
	<input type="hidden" name="fran" value="NewFran"></input>
	<input type="hidden" name="year" value="1"></input>
	<input type="hidden" name="row" value="', $row['Row'], '"></input>
	</form></td></tr>';
        } else {
            echo '<tr>';
            echo '<td colspan="5" id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Pancakes" onclick="updateStat(this)">', $row['Pancakes'], '</td>', '<td id="', $row['Row'], 'buf1Sacks" onclick="updateStat(this)">', $row['Sacks'], '</td>';
            echo '</tr>';
        }
    }

    /* Kicking Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left; background:crimson" >-- Kicking Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_stats` Where Category='kicking'");

    echo '<tr>';

    echo '<td colspan="3">Player</td>', '<td>', 'FGs Made', '</td>', '<td>', 'FGs Attempted', '</td>', '<td>', 'Kick %', '</td>', '<td>', 'Longest Made', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {

        if ($row['Player'] == '') {
            echo '<tr><td id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">', $row['Player'], '</td>',
            '<td colspan="6"><form action="_Update/Remove_Stats_Row.php" method = "post">
	<input style="width:300px;" type="submit" name="Remove" value="Remove Row" />
	<input type="hidden" name="fran" value="NewFran"></input>
	<input type="hidden" name="year" value="1"></input>
	<input type="hidden" name="row" value="', $row['Row'], '"></input>
	</form></td></tr>';
        } else {
            echo '<tr>';
            echo '<td colspan="3" id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Made" onclick="updateStat(this)">', $row['Made'], '</td>', '<td id="', $row['Row'], 'buf1Attempted" onclick="updateStat(this)">', $row['Attempted'], '</td>', '<td id="', $row['Row'], 'buf1KickPercent" onclick="updateStat(this)">', $row['KickPercent'], '</td>', '<td id="', $row['Row'], 'buf1Longest" onclick="updateStat(this)">', $row['Longest'], '</td>';
            echo '</tr>';
        }
    }


    /* Punting Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left; background:crimson" >-- Punting Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_stats` Where Category='punting'");

    echo '<tr>';

    echo '<td colspan="5" id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">Player</td>', '<td>', 'Punt Average', '</td>', '<td>', '# Inside the 20', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {

        if ($row['Player'] == '') {
            echo '<tr><td id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">', $row['Player'], '</td>',
            '<td colspan="6"><form action="_Update/Remove_Stats_Row.php" method = "post">
	<input style="width:300px;" type="submit" name="Remove" value="Remove Row" />
	<input type="hidden" name="fran" value="NewFran"></input>
	<input type="hidden" name="year" value="1"></input>
	<input type="hidden" name="row" value="', $row['Row'], '"></input>
	</form></td></tr>';
        } else {
            echo '<tr>';
            echo '<td colspan="5" id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1AVG" onclick="updateStat(this)">', $row['AVG'], '</td>', '<td id="', $row['Row'], 'buf1KPS" onclick="updateStat(this)">', $row['KPS'], '</td>';
            echo '</tr>';
        }
    }


    /* Return Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left; background:crimson" >-- Return Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_stats` Where Category='return'");

    echo '<tr>';

    echo '<td colspan="4" id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">Player</td>', '<td>', 'Return Average', '</td>', '<td>', 'Return TDs', '</td>', '<td>', 'Longest Return', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {

        if ($row['Player'] == '') {
            echo '<tr><td id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">', $row['Player'], '</td>',
            '<td colspan="6"><form action="_Update/Remove_Stats_Row.php" method = "post">
	<input style="width:300px;" type="submit" name="Remove" value="Remove Row" />
	<input type="hidden" name="fran" value="NewFran"></input>
	<input type="hidden" name="year" value="1"></input>
	<input type="hidden" name="row" value="', $row['Row'], '"></input>
	</form></td></tr>';
        } else {
            echo '<tr>';
            echo '<td colspan="4" id="', $row['Row'], 'buf1Player" onclick="updateStat(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1AVG" onclick="updateStat(this)">', $row['AVG'], '</td>', '<td id="', $row['Row'], 'buf1TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], 'buf1Longest" onclick="updateStat(this)">', $row['Longest'], '</td>';
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
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_stats` Where Category='passing'");

    echo '<tr>';
    echo '<td colspan="7" style="text-align:left; background:crimson">-- Passing Stats --</td>';
    echo '</tr>';
    echo '<tr>';

    echo '<td>Player</td>', '<td>', 'Passer Rating', '</td>', '<td>', 'Passing Yards', '</td>', '<td>', 'TDs', '</td>', '<td>', 'INTs', '</td>', '<td>', 'Completion %', '</td>', '<td>', 'Times Sacked', '</td>';
    echo '</tr>';

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Rating" onclick="">', $row['Rating'], '</td>', '<td id="', $row['Row'], 'buf1Yds" onclick="updateStat(this)">', $row['Yds'], '</td>', '<td id="', $row['Row'], 'buf1TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], 'buf1INTs" onclick="updateStat(this)">', $row['INTs'], '</td>', '<td id="', $row['Row'], 'buf1Percent" onclick="updateStat(this)">', $row['Percent'], '</td>', '<td id="', $row['Row'], 'buf1Sacks" onclick="updateStat(this)">', $row['Sacks'], '</td>';
        echo '</tr>';
    }

    /* Rushing Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left; background:crimson">-- Rushing Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_stats` Where Category='rushing'");

    echo '<tr>';

    echo '<td>Player</td>', '<td>', 'Rush Yards', '</td>', '<td>', 'TDs', '</td>', '<td>', 'Yards Per Carry', '</td>', '<td>', 'Fumbles', '</td>', '<td>', 'Broken Tackles', '</td>', '<td>', 'Longest Run', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Yds" onclick="">', $row['Yds'], '</td>', '<td id="', $row['Row'], 'buf1TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], 'buf1AVG" onclick="updateStat(this)">', $row['AVG'], '</td>', '<td id="', $row['Row'], 'buf1Fumbles" onclick="updateStat(this)">', $row['Fumbles'], '</td>', '<td id="', $row['Row'], 'buf1BrokenTackles" onclick="updateStat(this)">', $row['BrokenTackles'], '</td>', '<td id="', $row['Row'], 'buf1Longest" onclick="updateStat(this)">', $row['Longest'], '</td>';
        echo '</tr>';
    }

    /* Receiving Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left; background:crimson">-- Receiving Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_stats` Where Category='rec'");

    echo '<tr>';

    echo '<td>Player</td>', '<td>', 'Receptions', '</td>', '<td>', 'Receiving Yards', '</td>', '<td>', 'TDs', '</td>', '<td>', 'Yards Per Catch', '</td>', '<td>', 'Longest Catch', '</td>', '<td>', 'Dropped Passes', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Rec" onclick="">', $row['Rec'], '</td>', '<td id="', $row['Row'], 'buf1Yds" onclick="updateStat(this)">', $row['Yds'], '</td>', '<td id="', $row['Row'], 'buf1TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], 'buf1AVG" onclick="updateStat(this)">', $row['AVG'], '</td>', '<td id="', $row['Row'], 'buf1Longest" onclick="updateStat(this)">', $row['Longest'], '</td>', '<td id="', $row['Row'], 'buf1Dropped" onclick="updateStat(this)">', $row['Dropped'], '</td>';
        echo '</tr>';
    }

    /* Defensive Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left; background:crimson">-- Defensive Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_stats` Where Category='def'");

    echo '<tr>';

    echo '<td>Player</td>', '<td>', 'Tackles', '</td>', '<td>', 'Tackles for Loss', '</td>', '<td>', 'Sacks', '</td>', '<td>', 'Interceptions', '</td>', '<td>', 'TDs', '</td>', '<td>', 'Safety', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td>', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Tackles" onclick="">', $row['Tackles'], '</td>', '<td id="', $row['Row'], 'buf1ForLoss" onclick="updateStat(this)">', $row['ForLoss'], '</td>', '<td id="', $row['Row'], 'buf1Sacks" onclick="updateStat(this)">', $row['Sacks'], '</td>', '<td id="', $row['Row'], 'buf1INTs" onclick="updateStat(this)">', $row['INTs'], '</td>', '<td id="', $row['Row'], 'buf1TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], 'buf1Safety" onclick="updateStat(this)">', $row['Safety'], '</td>';
        echo '</tr>';
    }

    /* Blocking Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left; background:crimson" >-- Blocking Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_stats` Where Category='blocking'");

    echo '<tr>';

    echo '<td colspan="5">Player</td>', '<td>', 'Pancakes', '</td>', '<td>', 'SacksAllowed', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="5">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Pancakes" onclick="">', $row['Pancakes'], '</td>', '<td id="', $row['Row'], 'buf1Sacks" onclick="updateStat(this)">', $row['Sacks'], '</td>';
        echo '</tr>';
    }

    /* Kicking Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left; background:crimson" >-- Kicking Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_stats` Where Category='kicking'");

    echo '<tr>';

    echo '<td colspan="3">Player</td>', '<td>', 'FGs Made', '</td>', '<td>', 'FGs Attempted', '</td>', '<td>', 'Kick %', '</td>', '<td>', 'Longest Made', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="3">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Made" onclick="">', $row['Made'], '</td>', '<td id="', $row['Row'], 'buf1Attempted" onclick="updateStat(this)">', $row['Attempted'], '</td>', '<td id="', $row['Row'], 'buf1KickPercent" onclick="updateStat(this)">', $row['KickPercent'], '</td>', '<td id="', $row['Row'], 'buf1Longest" onclick="updateStat(this)">', $row['Longest'], '</td>';
        echo '</tr>';
    }


    /* Punting Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left; background:crimson" >-- Punting Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_stats` Where Category='punting'");

    echo '<tr>';

    echo '<td colspan="5">Player</td>', '<td>', 'Punt Average', '</td>', '<td>', '# Inside the 20', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="5">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1AVG" onclick="">', $row['AVG'], '</td>', '<td id="', $row['Row'], 'buf1KPS" onclick="updateStat(this)">', $row['KPS'], '</td>';
        echo '</tr>';
    }


    /* Return Stats Section */
    echo '<tr>';
    echo '<td colspan="7" style="text-align:left; background:crimson" >-- Return Stats --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_stats` Where Category='return'");

    echo '<tr>';

    echo '<td colspan="4">Player</td>', '<td>', 'Return Average', '</td>', '<td>', 'Return TDs', '</td>', '<td>', 'Longest Return', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="4">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1AVG" onclick="">', $row['AVG'], '</td>', '<td id="', $row['Row'], 'buf1TDs" onclick="updateStat(this)">', $row['TDs'], '</td>', '<td id="', $row['Row'], 'buf1Longest" onclick="updateStat(this)">', $row['Longest'], '</td>';
        echo '</tr>';
    }
}

echo '</table>';

if ($_SESSION['Admin'] == true) {

    echo '<br><form class="MaddenForm" action="_Update/Add_Stats_Row.php" method = "post">
	Stat Type: <select name="type">
		<option>passing</option>
		<option>rushing</option>
		<option>rec</option>
		<option>def</option>
		<option>blocking</option>
		<option>kicking</option>
		<option>punting</option>
		<option>return</option>
	</select>
	<input type="hidden" name="fran" value="NewFran"></input>
	<input type="hidden" name="year" value="1"></input>
	<input style="width:300px;" type="submit" name="AddPlayer" value="Add Row to Stats" />
	</form>';
}
mysql_close($con);
?>