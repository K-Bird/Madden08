<form class="scoreForm" action="../libs/ajax/franchise_view/results/update_franchise_sim_rec.php" method="POST" style="width:500px">
    <div class="input-group franViewEdit">
        <input type="text" class="form-control" name="newRec" placeholder="<?php echo $RegSimRow['Score']; ?>">
        <input type="hidden" name="row" value="<?php echo $RegSimRow['Row']; ?>">
        <span class="input-group-btn">
            <button class="btn btn-secondary scoreBtn" type="submit">Update</button>
        </span>
    </div>
</form>
<div class="franViewDisplay" style="text-align:center"><h1><?php echo $RegSimRow['Score']; ?></h1></div>