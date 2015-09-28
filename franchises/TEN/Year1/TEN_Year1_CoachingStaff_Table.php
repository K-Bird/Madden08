<?php

$con = mysql_connect("localhost", 'root', 'Fly0Bird797979');
if (!$con) {
    die('Could not connect!' . mysql_error());
}

mysql_select_db("madden08_db", $con);

$HCresult = mysql_query("SELECT * FROM `{$fran}_coaches` Where `Title` = 'HC' and `Year` = '{$franYear}'");

echo "<br />";
echo '<table class="table" id="', $fran, '_', $franYear, '_coachingStaff" style="text-align: center; font-size: small">';

echo '<tr><td>Head Coach</td><td>Offensive Coordinator</td><td>Defensive Coordinator</td><td>Special Teams Coordinator</td>';
echo '<tr>';
while ($HCrow = mysql_fetch_array($HCresult)) {

    echo '<td><span id="HCHistory" class="coachHistory" style="cursor: pointer" data-toggle="popover" data-placement="bottom" title="Head Coach History">', $HCrow['Name'], '</span>',
          '<br><br><a class="btn btn-default yearEdit yearEditbtn" style="display: none" data-toggle="modal" data-table="coaches" data-col="Name" data-row=',$HCrow['Row'],' data-target="#',$HCrow['Title'],'Modal">Edit</a></td>';
}

$OCresult = mysql_query("SELECT * FROM `{$fran}_coaches` Where `Title` = 'OC' and `Year` = '{$franYear}'");

while ($OCrow = mysql_fetch_array($OCresult)) {
    echo '<td><span  id="OCHistory" class="coachHistory" style="cursor: pointer" data-toggle="popover" data-placement="bottom" title="Offensive Coordinator History">', $OCrow['Name'], '</span>',
         '<br><br><a class="btn btn-default yearEdit yearEditbtn" style="display: none" data-toggle="modal" data-table="coaches" data-col="Name" data-row=',$OCrow['Row'],' data-target="#',$OCrow['Title'],'Modal">Edit</a></td>';
}

$DCresult = mysql_query("SELECT * FROM `{$fran}_coaches` Where `Title` = 'DC' and `Year` = '{$franYear}'");

while ($DCrow = mysql_fetch_array($DCresult)) {
    echo '<td><span  id="DCHistory" class="coachHistory" style="cursor: pointer" data-toggle="popover" data-placement="bottom" title="Defensive Coordinator History">', $DCrow['Name'], '</span>',
         '<br><br><a class="btn btn-default yearEdit yearEditbtn" style="display: none" data-toggle="modal" data-table="coaches" data-col="Name" data-row=',$DCrow['Row'],' data-target="#',$DCrow['Title'],'Modal">Edit</a></td>';
}

$STresult = mysql_query("SELECT * FROM `{$fran}_coaches` Where `Title` = 'ST' and `Year` = '{$franYear}'");

while ($STrow = mysql_fetch_array($STresult)) {
    echo '<td><span  id="STHistory" class="coachHistory" style="cursor: pointer" data-toggle="popover" data-placement="bottom" title="Special Teams Coordinator History">', $STrow['Name'], '</span>',
         '<br><br><a class="btn btn-default yearEdit yearEditbtn" style="display: none" data-toggle="modal" data-table="coaches" data-col="Name" data-row=',$STrow['Row'],' data-target="#',$STrow['Title'],'Modal">Edit</a></td>';
}

echo '</tr>';
echo '</table>';

include ('../../_history/coachingstaff_History.php');
include ('../../_modals/coachingstaff_Modals.php');

mysql_close($con);