<div class="row">   
    <div class="col-lg-12" style="text-align: right; color: black">
        <button class="btn btn-default" data-toggle="modal" data-target=".newOffseasonModal">Add New Offseason Row</button>
        <div id="updateDash" class="modal fade newOffseasonModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="text-align: left; width: 25%">
                <div class="modal-content">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            <h3 class="panel-title">Add Offseason</h3>
                        </div>
                        <div class="panel-body">
                            <form class="MaddenForm" action="_Update/Add_Offseason_Row.php" method = "post">
                                <label for="type">Offseason Activity Type:</label>
                                <select class="form-control" name="type">
                                    <option>probowl</option>
                                    <option>award</option>
                                    <option>retired</option>
                                    <option>draft</option>
                                    <option>fapre</option>
                                    <option>fapost</option>
                                </select>
                                <br>
                                <input type="hidden" name="fran" value="atl" />
                                <input type="hidden" name="year" value="1" />
                                <input class="btn btn-default" type="submit" name="AddPlayer" value="Add to Offseason Table" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


