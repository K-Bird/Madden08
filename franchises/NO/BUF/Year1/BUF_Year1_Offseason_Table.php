<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("gamessitedatabase", $con);

echo '<a href="#offseason"></a>';
echo '<table class="CSSTableGenerator" id="offseason">';

if (!isset($_SESSION['Admin'])) {
    $_SESSION['Admin'] = False;
} if ($_SESSION['Admin'] == true) {

    echo '<tr>';
    echo '<td colspan="5">Offseason Information and Activities</td>';
    echo '</tr>';


    /* Information Section */
    $AssetResult = mysql_query("SELECT * FROM `gm_madden08-buf_1_info` Where Field='Asset'");
    $Arow = mysql_fetch_array($AssetResult);
    $TrainResult = mysql_query("SELECT * FROM `gm_madden08-buf_1_info` Where Field='TrainStaff'");
    $Trow = mysql_fetch_array($TrainResult);

    echo '<td colspan="2">Assets: </td><td id="', $Arow['Row'], 'buf1Asset" onclick="updateInfo(this)">', $Arow['Value'], '</td><td>Training Staff: </td><td id="', $Trow['Row'], 'buf1TrainStaff" onclick="updateInfo(this)">', $Trow['Value'], '</td>';

    /* Pro Bowl Section */
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_offseason` Where Type='probowl'");

    echo '<tr>';
    echo '<td colspan="5" style="text-align:left; background:crimson">-- Players Elected to Pro Bowl --</td>';
    echo '</tr>';

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="5" id="', $row['Row'], 'buf1Player" onclick="updateOff(this)">', $row['Player'], '</td>
					<td><form action="_Update/Remove_Offseason_Row.php" method = "post">
					<input type="submit" name="Remove" value="Remove Row" />
					<input type="hidden" name="fran" value="NewFran"></input>
					<input type="hidden" name="year" value="1"></input>
					<input type="hidden" name="row" value="', $row['Row'], '"></input>
					</form></td>';
        echo '</tr>';
    }

    /* Awards Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left; background:crimson">-- Yearly Awards --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_offseason` Where Type='award'");

    echo '<tr>';

    echo '<td colspan="2" id="', $row['Row'], 'buf1Player" onclick="updateOff(this)">Player</td>', '<td colspan="3">', 'Award', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="2" id="', $row['Row'], 'buf1Player" onclick="updateOff(this)">', $row['Player'], '</td>', '<td colspan="3" id="', $row['Row'], 'buf1Award" onclick="updateOff(this)">', $row['Award'], '</td>
					<td><form action="_Update/Remove_Offseason_Row.php" method = "post">
					<input type="submit" name="Remove" value="Remove Row" />
					<input type="hidden" name="fran" value="NewFran"></input>
					<input type="hidden" name="year" value="1"></input>
					<input type="hidden" name="row" value="', $row['Row'], '"></input>
					</form></td>';
        echo '</tr>';
    }

    /* Retired Players Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left; background:crimson">-- Retired Players --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_offseason` Where Type='retired'");

    echo '<tr>';

    echo '<td colspan="2" id="', $row['Row'], 'buf1Player" onclick="updateOff(this)">Player</td>', '<td>', 'Position', '</td>', '<td>', 'Overall', '</td>', '<td>', 'Age', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="2" id="', $row['Row'], 'buf1Player" onclick="updateOff(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Position" onclick="updateOff(this)">', $row['Position'], '</td>', '<td id="', $row['Row'], 'buf1Overall" onclick="updateOff(this)">', $row['Overall'], '</td>', '<td id="', $row['Row'], 'buf1Age" onclick="updateOff(this)">', $row['Age'], '</td>
					<td><form action="_Update/Remove_Offseason_Row.php" method = "post">
					<input type="submit" name="Remove" value="Remove Row" />
					<input type="hidden" name="fran" value="NewFran"></input>
					<input type="hidden" name="year" value="1"></input>
					<input type="hidden" name="row" value="', $row['Row'], '"></input>
					</form></td>';
        echo '</tr>';
    }

    /* Free Agency - Pre Draft Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left; background:crimson">-- Pre-Draft Free Agency --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_offseason` Where Type='fapre'");

    echo '<tr>';
    echo '<td colspan="2" id="', $row['Row'], 'buf1Player" onclick="updateOff(this)">Player</td>', '<td>', 'Position', '</td>', '<td>', 'Overall', '</td>', '<td>', 'Age', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="2" id="', $row['Row'], 'buf1Player" onclick="updateOff(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Position" onclick="updateOff(this)">', $row['Position'], '</td>', '<td id="', $row['Row'], 'buf1Overall" onclick="updateOff(this)">', $row['Overall'], '</td>', '<td id="', $row['Row'], 'buf1Age" onclick="updateOff(this)">', $row['Age'], '</td>
					<td><form action="_Update/Remove_Offseason_Row.php" method = "post">
					<input type="submit" name="Remove" value="Remove Row" />
					<input type="hidden" name="fran" value="NewFran"></input>
					<input type="hidden" name="year" value="1"></input>
					<input type="hidden" name="row" value="', $row['Row'], '"></input>
					</form></td>';
        echo '</tr>';
    }

    /* Draft Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left; background:crimson" >-- The Draft --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_offseason` Where Type='draft'");

    echo '<tr>';
    echo '<td>Round - Pick</td>', '<td>Player</td>', '<td>', 'Position', '</td>', '<td>', 'Overall', '</td>', '<td>', 'Age', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td id="', $row['Row'], 'buf1Pick" onclick="updateOff(this)">', $row['Pick'], '</td>', '<td id="', $row['Row'], 'buf1Player" onclick="updateOff(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Position" onclick="updateOff(this)">', $row['Position'], '</td>', '<td id="', $row['Row'], 'buf1Overall" onclick="updateOff(this)">', $row['Overall'], '</td>', '<td id="', $row['Row'], 'buf1Age" onclick="updateOff(this)">', $row['Age'], '</td>
					<td><form action="_Update/Remove_Offseason_Row.php" method = "post">
					<input type="submit" name="Remove" value="Remove Row" />
					<input type="hidden" name="fran" value="NewFran"></input>
					<input type="hidden" name="year" value="1"></input>
					<input type="hidden" name="row" value="', $row['Row'], '"></input>
					</form></td>';
        echo '</tr>';
    }

    /* Post-Draft Free Agency Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left; background:crimson" >-- Post-Draft Free Agency --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_offseason` Where Type='fapost'");

    echo '<tr>';
    echo '<td colspan="2" id="', $row['Row'], 'buf1Player" onclick="updateOff(this)">Player</td>', '<td>', 'Position', '</td>', '<td>', 'Overall', '</td>', '<td>', 'Age', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="2" id="', $row['Row'], 'buf1Player" onclick="updateOff(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Position" onclick="updateOff(this)">', $row['Position'], '</td>', '<td id="', $row['Row'], 'buf1Overall" onclick="updateOff(this)">', $row['Overall'], '</td>', '<td id="', $row['Row'], 'buf1Age" onclick="updateOff(this)">', $row['Age'], '</td>
					<td><form action="_Update/Remove_Offseason_Row.php" method = "post">
					<input type="submit" name="Remove" value="Remove Row" />
					<input type="hidden" name="fran" value="NewFran"></input>
					<input type="hidden" name="year" value="1"></input>
					<input type="hidden" name="row" value="', $row['Row'], '"></input>
					</form></td>';
        echo '</tr>';
    }

    $RelResult = mysql_query("SELECT * FROM `gm_madden08-buf_1_info` where Field='Rel'");
    $RelRow = mysql_fetch_array($RelResult);

    if ($RelRow['Value'] == '') {
        
    } else {
        echo '<tr>';
        echo '<td colspan="5" style="text-align:left; background:crimson" >-- Relocation --</td>';
        echo '</tr>';
        $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_info` Where Field='Rel'");
        $row = mysql_fetch_array($result);
        echo '<td colspan="5" id="', $row['Row'], 'buf1Field" onclick="updateInfo(this)">', $row['Value'], '</td>';
    }
}

/* * **************************************** If Admin = False ************************************************************** */

if ($_SESSION['Admin'] == false) {

    echo '<tr>';
    echo '<td colspan="5">Offseason Activities</td>';
    echo '</tr>';

    /* Information Section */
    $AssetResult = mysql_query("SELECT * FROM `gm_madden08-buf_1_info` Where Field='Asset'");
    $Arow = mysql_fetch_array($AssetResult);
    $TrainResult = mysql_query("SELECT * FROM `gm_madden08-buf_1_info` Where Field='TrainStaff'");
    $Trow = mysql_fetch_array($TrainResult);

    echo '<td>Assets: </td><td id="', $Arow['Row'], 'buf1Field">', $Arow['Value'], '</td><td></td><td>Training Staff: </td><td id="', $Trow['Row'], 'buf1Field">', $Trow['Value'], '</td>';

    /* Pro Bowl Section */
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_offseason` Where Type='probowl'");

    echo '<tr>';
    echo '<td colspan="5" style="text-align:left">-- Players Elected to Pro Bowl --</td>';
    echo '</tr>';

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="5">', $row['Player'], '</td>';
        echo '</tr>';
    }

    /* Awards Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left; background:crimson">-- Yearly Awards --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_offseason` Where Type='award'");

    echo '<tr>';

    echo '<td colspan="2">Player</td>', '<td colspan="3">', 'Award', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="2">', $row['Player'], '</td>', '<td colspan="3" id="', $row['Row'], 'buf1Award" onclick="">', $row['Award'], '</td>';
        echo '</tr>';
    }

    /* Retired Players Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left; background:crimson">-- Retired Players --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_offseason` Where Type='retired'");

    echo '<tr>';

    echo '<td colspan="2">Player</td>', '<td>', 'Position', '</td>', '<td>', 'Overall', '</td>', '<td>', 'Age', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="2">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Position" onclick="">', $row['Position'], '</td>', '<td id="', $row['Row'], 'buf1Overall" onclick="">', $row['Overall'], '</td>', '<td id="', $row['Row'], 'buf1Age" onclick="">', $row['Age'], '</td>';
        echo '</tr>';
    }

    /* Free Agency - Pre Draft Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left; background:crimson">-- Pre-Draft Free Agency --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_offseason` Where Type='fapre'");

    echo '<tr>';
    echo '<td colspan="2">Player</td>', '<td>', 'Position', '</td>', '<td>', 'Overall', '</td>', '<td>', 'Age', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="2">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Position" onclick="">', $row['Position'], '</td>', '<td id="', $row['Row'], 'buf1Overall" onclick="">', $row['Overall'], '</td>', '<td id="', $row['Row'], 'buf1Age" onclick="">', $row['Age'], '</td>';
        echo '</tr>';
    }

    /* Draft Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left; background:crimson" >-- The Draft --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_offseason` Where Type='draft'");

    echo '<tr>';
    echo '<td>Round - Pick</td>', '<td>Player</td>', '<td>', 'Position', '</td>', '<td>', 'Overall', '</td>', '<td>', 'Age', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td id="', $row['Row'], 'buf1Pick" onclick="">', $row['Pick'], '</td>', '<td id="', $row['Row'], 'buf1Player" onclick="">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Position" onclick="">', $row['Position'], '</td>', '<td id="', $row['Row'], 'buf1Overall" onclick="">', $row['Overall'], '</td>', '<td id="', $row['Row'], 'buf1Age" onclick="">', $row['Age'], '</td>';
        echo '</tr>';
    }

    /* Post-Draft Free Agency Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left; background:crimson" >-- Post-Draft Free Agency --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_offseason` Where Type='fapost'");

    echo '<tr>';
    echo '<td colspan="2">Player</td>', '<td>', 'Position', '</td>', '<td>', 'Overall', '</td>', '<td>', 'Age', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="2">', $row['Player'], '</td>', '<td id="', $row['Row'], 'buf1Position" onclick="">', $row['Position'], '</td>', '<td id="', $row['Row'], 'buf1Overall" onclick="">', $row['Overall'], '</td>', '<td id="', $row['Row'], 'buf1Age" onclick="">', $row['Age'], '</td>';
        echo '</tr>';
    }

    $RelResult = mysql_query("SELECT * FROM `gm_madden08-buf_1_info` where Field='Rel'");
    $RelRow = mysql_fetch_array($RelResult);

    if ($RelRow['Value'] == '') {
        
    } else {
        echo '<tr>';
        echo '<td colspan="5" style="text-align:left; background:crimson" >-- Relocation --</td>';
        echo '</tr>';
        $result = mysql_query("SELECT * FROM `gm_madden08-buf_1_info` Where Field='Rel'");
        $row = mysql_fetch_array($result);
        echo '<td colspan="5" id="', $row['Row'], 'buf1Relocation">', $row['Value'], '</td>';
    }
}

echo '</table>';

if ($_SESSION['Admin'] == true) {

    echo '<br><form class="MaddenForm" action="_Update/Add_Offseason_Row.php" method = "post">
	Offseason Activity Type: 
	<select name="type">
		<option>probowl</option>
		<option>award</option>
		<option>retired</option>
		<option>draft</option>
		<option>fapre</option>
		<option>fapost</option>
	</select>
	<input type="hidden" name="fran" value="NewFran"></input>
	<input type="hidden" name="year" value="1"></input>
	<input style="width:300px;" type="submit" name="AddPlayer" value="Add to Offseason Table" />
	</form>';
}
mysql_close($con);
?>