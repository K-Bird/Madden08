<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("gamessitedatabase", $con);

echo '<a href="1offseason"></a>';
echo '<table class="table table-hover" id="offseason" style="text-align: center; font-size: small">';

if (!isset($_SESSION['Admin'])) {
    $_SESSION['Admin'] = False;
} if ($_SESSION['Admin'] == true) {

    echo '<tr>';
    echo '<td colspan="5">Offseason Information and Activities</td>';
    echo '</tr>';


    /* Information Section */
    $AssetResult = mysql_query("SELECT * FROM `gm_madden08-OAK_1_info` Where Field='Asset'");
    $Arow = mysql_fetch_array($AssetResult);
    $TrainResult = mysql_query("SELECT * FROM `gm_madden08-OAK_1_info` Where Field='TrainStaff'");
    $Trow = mysql_fetch_array($TrainResult);

    echo '<td colspan="2">Assets: </td><td id="', $Arow['Row'], '/OAK/1/Asset" onclick="updateInfo(this)">', $Arow['Value'], '</td><td>Training Staff: </td><td id="', $Trow['Row'], '/OAK/1/TrainStaff" onclick="updateInfo(this)">', $Trow['Value'], '</td>';

    /* Pro Bowl Section */
    $result = mysql_query("SELECT * FROM `gm_madden08-OAK_1_offseason` Where Type='probowl'");

    echo '<tr>';
    echo '<td colspan="5" style="text-align:left">-- Players Elected to Pro Bowl --</td>';
    echo '</tr>';

    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="5" id="', $row['Row'], '/OAK/1/Player" onclick="updateOff(this)">', $row['Player'], '</td>
					<td><form action="_Update/Remove_Offseason_Row.php" method = "post">
					<input class="btn btn-danger" type="submit" name="Remove" value="Remove Row" />
					<input type="hidden" name="fran" value="OAK"></input>
					<input type="hidden" name="year" value="1"></input>
					<input type="hidden" name="row" value="', $row['Row'], '"></input>
					</form></td>';
        echo '</tr>';
    }

    /* Awards Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left">-- Yearly Awards --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-OAK_1_offseason` Where Type='award'");

    echo '<tr>';

    echo '<td colspan="2" id="', $row['Row'], '/OAK/1/Player" onclick="updateOff(this)">Player</td>', '<td colspan="3">', 'Award', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="2" id="', $row['Row'], '/OAK/1/Player" onclick="updateOff(this)">', $row['Player'], '</td>', '<td colspan="3" id="', $row['Row'], '/OAK/1/Award" onclick="updateOff(this)">', $row['Award'], '</td>
					<td><form action="_Update/Remove_Offseason_Row.php" method = "post">
					<input class="btn btn-danger" type="submit" name="Remove" value="Remove Row" />
					<input type="hidden" name="fran" value="OAK"></input>
					<input type="hidden" name="year" value="1"></input>
					<input type="hidden" name="row" value="', $row['Row'], '"></input>
					</form></td>';
        echo '</tr>';
    }

    /* Retired Players Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left">-- Retired Players --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-OAK_1_offseason` Where Type='retired'");

    echo '<tr>';

    echo '<td colspan="2" id="', $row['Row'], '/OAK/1/Player" onclick="updateOff(this)">Player</td>', '<td>', 'Position', '</td>', '<td>', 'Overall', '</td>', '<td>', 'Age', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="2" id="', $row['Row'], '/OAK/1/Player" onclick="updateOff(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], '/OAK/1/Position" onclick="updateOff(this)">', $row['Position'], '</td>', '<td id="', $row['Row'], '/OAK/1/Overall" onclick="updateOff(this)">', $row['Overall'], '</td>', '<td id="', $row['Row'], '/OAK/1/Age" onclick="updateOff(this)">', $row['Age'], '</td>
					<td><form action="_Update/Remove_Offseason_Row.php" method = "post">
					<input class="btn btn-danger" type="submit" name="Remove" value="Remove Row" />
					<input type="hidden" name="fran" value="OAK"></input>
					<input type="hidden" name="year" value="1"></input>
					<input type="hidden" name="row" value="', $row['Row'], '"></input>
					</form></td>';
        echo '</tr>';
    }

    /* Free Agency - Pre Draft Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left">-- Pre-Draft Free Agency --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-OAK_1_offseason` Where Type='fapre'");

    echo '<tr>';
    echo '<td colspan="2" id="', $row['Row'], '/OAK/1/Player" onclick="updateOff(this)">Player</td>', '<td>', 'Position', '</td>', '<td>', 'Overall', '</td>', '<td>', 'Age', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="2" id="', $row['Row'], '/OAK/1/Player" onclick="updateOff(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], '/OAK/1/Position" onclick="updateOff(this)">', $row['Position'], '</td>', '<td id="', $row['Row'], '/OAK/1/Overall" onclick="updateOff(this)">', $row['Overall'], '</td>', '<td id="', $row['Row'], '/OAK/1/Age" onclick="updateOff(this)">', $row['Age'], '</td>
					<td><form action="_Update/Remove_Offseason_Row.php" method = "post">
					<input class="btn btn-danger" type="submit" name="Remove" value="Remove Row" />
					<input type="hidden" name="fran" value="OAK"></input>
					<input type="hidden" name="year" value="1"></input>
					<input type="hidden" name="row" value="', $row['Row'], '"></input>
					</form></td>';
        echo '</tr>';
    }

    /* Draft Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left" >-- The Draft --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-OAK_1_offseason` Where Type='draft'");

    echo '<tr>';
    echo '<td>Round - Pick</td>', '<td>Player</td>', '<td>', 'Position', '</td>', '<td>', 'Overall', '</td>', '<td>', 'Age', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td id="', $row['Row'], '/OAK/1/Pick" onclick="updateOff(this)">', $row['Pick'], '</td>', '<td id="', $row['Row'], '/OAK/1/Player" onclick="updateOff(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], '/OAK/1/Position" onclick="updateOff(this)">', $row['Position'], '</td>', '<td id="', $row['Row'], '/OAK/1/Overall" onclick="updateOff(this)">', $row['Overall'], '</td>', '<td id="', $row['Row'], '/OAK/1/Age" onclick="updateOff(this)">', $row['Age'], '</td>
					<td><form action="_Update/Remove_Offseason_Row.php" method = "post">
					<input class="btn btn-danger" type="submit" name="Remove" value="Remove Row" />
					<input type="hidden" name="fran" value="OAK"></input>
					<input type="hidden" name="year" value="1"></input>
					<input type="hidden" name="row" value="', $row['Row'], '"></input>
					</form></td>';
        echo '</tr>';
    }

    /* Post-Draft Free Agency Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left" >-- Post-Draft Free Agency --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-OAK_1_offseason` Where Type='fapost'");

    echo '<tr>';
    echo '<td colspan="2" id="', $row['Row'], '/OAK/1/Player" onclick="updateOff(this)">Player</td>', '<td>', 'Position', '</td>', '<td>', 'Overall', '</td>', '<td>', 'Age', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="2" id="', $row['Row'], '/OAK/1/Player" onclick="updateOff(this)">', $row['Player'], '</td>', '<td id="', $row['Row'], '/OAK/1/Position" onclick="updateOff(this)">', $row['Position'], '</td>', '<td id="', $row['Row'], '/OAK/1/Overall" onclick="updateOff(this)">', $row['Overall'], '</td>', '<td id="', $row['Row'], '/OAK/1/Age" onclick="updateOff(this)">', $row['Age'], '</td>
					<td><form action="_Update/Remove_Offseason_Row.php" method = "post">
					<input class="btn btn-danger" type="submit" name="Remove" value="Remove Row" />
					<input type="hidden" name="fran" value="OAK"></input>
					<input type="hidden" name="year" value="1"></input>
					<input type="hidden" name="row" value="', $row['Row'], '"></input>
					</form></td>';
        echo '</tr>';
    }

    $RelResult = mysql_query("SELECT * FROM `gm_madden08-OAK_1_info` where Field='Rel'");
    $RelRow = mysql_fetch_array($RelResult);

    if ($RelRow['Value'] == '') {
        
    } else {
        echo '<tr>';
        echo '<td colspan="5" style="text-align:left" >-- Relocation --</td>';
        echo '</tr>';
        $result = mysql_query("SELECT * FROM `gm_madden08-OAK_1_info` Where Field='Rel'");
        $row = mysql_fetch_array($result);
        echo '<td colspan="5" id="', $row['Row'], '/OAK/1/Field" onclick="updateInfo(this)">', $row['Value'], '</td>';
    }
}

/* * **************************************** If Admin = False ************************************************************** */

if ($_SESSION['Admin'] == false) {

    echo '<tr>';
    echo '<td colspan="5">Offseason Activities</td>';
    echo '</tr>';

    /* Information Section */
    $AssetResult = mysql_query("SELECT * FROM `gm_madden08-OAK_1_info` Where Field='Asset'");
    $Arow = mysql_fetch_array($AssetResult);
    $TrainResult = mysql_query("SELECT * FROM `gm_madden08-OAK_1_info` Where Field='TrainStaff'");
    $Trow = mysql_fetch_array($TrainResult);

    echo '<td>Assets: </td><td id="', $Arow['Row'], '/OAK/1/Field">', $Arow['Value'], '</td><td></td><td>Training Staff: </td><td id="', $Trow['Row'], '/OAK/1/Field">', $Trow['Value'], '</td>';

    /* Pro Bowl Section */
    $result = mysql_query("SELECT * FROM `gm_madden08-OAK_1_offseason` Where Type='probowl'");

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
    echo '<td colspan="5" style="text-align:left">-- Yearly Awards --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-OAK_1_offseason` Where Type='award'");

    echo '<tr>';

    echo '<td colspan="2">Player</td>', '<td colspan="3">', 'Award', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="2">', $row['Player'], '</td>', '<td colspan="3" id="', $row['Row'], '/OAK/1/Award" onclick="">', $row['Award'], '</td>';
        echo '</tr>';
    }

    /* Retired Players Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left">-- Retired Players --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-OAK_1_offseason` Where Type='retired'");

    echo '<tr>';

    echo '<td colspan="2">Player</td>', '<td>', 'Position', '</td>', '<td>', 'Overall', '</td>', '<td>', 'Age', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="2">', $row['Player'], '</td>', '<td id="', $row['Row'], '/OAK/1/Position" onclick="">', $row['Position'], '</td>', '<td id="', $row['Row'], '/OAK/1/Overall" onclick="">', $row['Overall'], '</td>', '<td id="', $row['Row'], '/OAK/1/Age" onclick="">', $row['Age'], '</td>';
        echo '</tr>';
    }

    /* Free Agency - Pre Draft Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left">-- Pre-Draft Free Agency --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-OAK_1_offseason` Where Type='fapre'");

    echo '<tr>';
    echo '<td colspan="2">Player</td>', '<td>', 'Position', '</td>', '<td>', 'Overall', '</td>', '<td>', 'Age', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="2">', $row['Player'], '</td>', '<td id="', $row['Row'], '/OAK/1/Position" onclick="">', $row['Position'], '</td>', '<td id="', $row['Row'], '/OAK/1/Overall" onclick="">', $row['Overall'], '</td>', '<td id="', $row['Row'], '/OAK/1/Age" onclick="">', $row['Age'], '</td>';
        echo '</tr>';
    }

    /* Draft Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left" >-- The Draft --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-OAK_1_offseason` Where Type='draft'");

    echo '<tr>';
    echo '<td>Round - Pick</td>', '<td>Player</td>', '<td>', 'Position', '</td>', '<td>', 'Overall', '</td>', '<td>', 'Age', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td id="', $row['Row'], '/OAK/1/Pick" onclick="">', $row['Pick'], '</td>', '<td id="', $row['Row'], '/OAK/1/Player" onclick="">', $row['Player'], '</td>', '<td id="', $row['Row'], '/OAK/1/Position" onclick="">', $row['Position'], '</td>', '<td id="', $row['Row'], '/OAK/1/Overall" onclick="">', $row['Overall'], '</td>', '<td id="', $row['Row'], '/OAK/1/Age" onclick="">', $row['Age'], '</td>';
        echo '</tr>';
    }

    /* Post-Draft Free Agency Section */
    echo '<tr>';
    echo '<td colspan="5" style="text-align:left" >-- Post-Draft Free Agency --</td>';
    echo '</tr>';
    $result = mysql_query("SELECT * FROM `gm_madden08-OAK_1_offseason` Where Type='fapost'");

    echo '<tr>';
    echo '<td colspan="2">Player</td>', '<td>', 'Position', '</td>', '<td>', 'Overall', '</td>', '<td>', 'Age', '</td>';
    echo '</tr>';


    while ($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td colspan="2">', $row['Player'], '</td>', '<td id="', $row['Row'], '/OAK/1/Position" onclick="">', $row['Position'], '</td>', '<td id="', $row['Row'], '/OAK/1/Overall" onclick="">', $row['Overall'], '</td>', '<td id="', $row['Row'], '/OAK/1/Age" onclick="">', $row['Age'], '</td>';
        echo '</tr>';
    }

    $RelResult = mysql_query("SELECT * FROM `gm_madden08-OAK_1_info` where Field='Rel'");
    $RelRow = mysql_fetch_array($RelResult);

    if ($RelRow['Value'] == '') {
        
    } else {
        echo '<tr>';
        echo '<td colspan="5" style="text-align:left" >-- Relocation --</td>';
        echo '</tr>';
        $result = mysql_query("SELECT * FROM `gm_madden08-OAK_1_info` Where Field='Rel'");
        $row = mysql_fetch_array($result);
        echo '<td colspan="5" id="', $row['Row'], '/OAK/1/Relocation">', $row['Value'], '</td>';
    }
}

echo '</table>';

mysql_close($con);
?>