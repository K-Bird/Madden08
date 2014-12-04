<?php

$Positions = array();
array_push($Positions, 'HC', 'OC', 'DC', 'ST', 'QB1', 'QB2', 'HB1', 'HB2', 'HB3', 'FB1', 'FB2', 'WR1', 'WR2', 'WR3', 'WR4', 'TE1', 'TE2', 'LT1', 'LT2', 'LG1', 'LG2', 'C1', 'C2', 'RG1', 'RG2', 'RT1', 'RT2', 'LE1', 'LE2', 'RE1', 'RE2', 'DT1', 'DT2', 'LOLB1', 'LOLB2', 'MLB1', 'MLB2', 'ROLB1', 'ROLB2', 'CB1', 'CB2', 'CB3', 'CB4', 'FS1', 'FS2', 'SS1', 'SS2', 'K1', 'P1', 'KR', 'PR');

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("gamessitedatabase", $con);

$PositionsInTable = array();

$addResult = mysql_query("SELECT * FROM `gm_madden08-buf_1_roster`");

while (($row = mysql_fetch_assoc($addResult))) {
    $PositionsInTable[] = $row['Position'];
}

$openPositions = array_diff($Positions, $PositionsInTable);

asort($PositionsInTable);
asort($openPositions);

/* Add Player Form */
echo '
<br>
<form style="background-color:black; text-align:left" name="addPlayer" action="_Update/Add_Player_Row.php" method="post" class="MaddenForm" >
&nbsp;&nbsp;| Add Player Form | &nbsp;&nbsp; Position: 
<select name="position">';
foreach ($openPositions as $pos) {
    echo '<option value="' . $pos . '">' . $pos . '</option>';
}
echo '</select>
&nbsp;
Name:&nbsp;<input type="text" name="PlayerName" size="15">
&nbsp;
How Acquired:
<select name="Acquired">
	<option>On Team</option>
	<option>Free Agent</option>
	<option>Trade</option>
	<option>Created</option>
	<option>Drafted</option>
</select>
&nbsp;
Overall:&nbsp;<input type="text" name="ovr" size="2" maxlength="2">
&nbsp;
Age:&nbsp;<input type="text" name="age" size="2" maxlength="2">
&nbsp;
Weapon:&nbsp;
<select name="Weapon">
	<option>None</option>
	<option>Cannon Arm</option>
	<option>Coverage Corner</option>
	<option>Precision QB</option>
	<option>Elusive Back</option>
	<option>Franchise Player</option>
	<option>Heavy Hitter</option>
	<option>Pocket Protector</option>
	<option>Possession Receiver</option>
	<option>Power Back</option>
	<option>Run Blocker</option>
	<option>Run Stopper</option>
	<option>Speed Player</option>
</select>
&nbsp;
<input type="submit" value="Add Player">
<input type="hidden" name="fran" value="buf">
<input type="hidden" name="year" value="1">
</form>';

/* Update Player Form */
echo '
<form style="background-color:black; text-align:left" name="addPlayer" action="_Update/Update_Player_Row.php" method="post" class="MaddenForm" >
&nbsp;&nbsp;| Update Player Form | &nbsp;&nbsp; Position: 
<select name="position">';
foreach ($PositionsInTable as $pos) {
    echo '<option value="' . $pos . '">' . $pos . '</option>';
}
echo '</select>
&nbsp;
Field:
<select name="field">
	<option>Name</option>
	<option>Overall</option>
	<option>Age</option>
	<option>Acquired</option>
</select>
&nbsp;
New Value:<input type="text" name="value" size="15">
&nbsp;
Weapon:
<select name="Weapon">
	<option> </option>
	<option>None</option>
	<option>Cannon Arm</option>
	<option>Coverage Corner</option>
	<option>Precision QB</option>
	<option>Elusive Back</option>
	<option>Franchise Player</option>
	<option>Heavy Hitter</option>
	<option>Pocket Protector</option>
	<option>Possession Receiver</option>
	<option>Power Back</option>
	<option>Run Blocker</option>
	<option>Run Stopper</option>
	<option>Speed Player</option>
</select>
&nbsp;
<input type="submit" value="Update Player">
<input type="hidden" name="fran" value="buf">
<input type="hidden" name="year" value="1">
</form>';

/* Remove Player Form */
echo '
<form style="background-color:black; text-align:left" name="addPlayer" action="_Update/Remove_Player_Row.php" method="post" class="MaddenForm" >
&nbsp;&nbsp;| Remove Player Form | &nbsp;&nbsp; Position: 
<select name="position">';
foreach ($PositionsInTable as $pos) {
    echo '<option value="' . $pos . '">' . $pos . '</option>';
}
echo '</select>
&nbsp;
<input type="submit" value="Remove Player">
<input type="hidden" name="fran" value="buf">
<input type="hidden" name="year" value="1">
</form>';
?>

