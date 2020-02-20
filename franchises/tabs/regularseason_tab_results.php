<?php
$Get_Simulated = db_query("Select * From `franchise_year_results` WHERE Week='Simulated' and Team='{$Curr_Team}' and Year='{$View_Year}'");
$Simulated_Row = $Get_Simulated->fetch_assoc();
$Simulated = $Simulated_Row['Vs'];
?>
<br>
<label class="franViewEdit">Regular Season Simulated: </label>
<select id="regularseason_simulated_input" class="form-control franViewEdit" data-franchise="<?php echo $Curr_Team; ?>" data-year="<?php echo $View_Year; ?>" style="width: 150px">
    <option <?php
    if ($Simulated === 'N') {
        echo 'selected ';
    }
    ?> value="N">Not Simulated</option>
    <option <?php
    if ($Simulated === 'Y') {
        echo 'selected ';
    }
    ?> value="Y">Simulated</option>
</select>
<br><br>
<?php
$RegSimResult = db_query("SELECT * FROM `franchise_year_results` WHERE Week='Simulated' and Year='{$View_Year}' and Team='{$Curr_Team}'");
$RegSimRow = $RegSimResult->fetch_assoc();

if ($RegSimRow['Vs'] === 'Y') {
    include ('sub_content/regularseason_results_simulated.php');
}
if ($RegSimRow['Vs'] === 'N') {
    include ('sub_content/regularseason_results_table.php');
}
?>