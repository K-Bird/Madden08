<!-- Coaching Staff HC Modal -->
<div class="modal fade editModal" id="HCModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Head Coach for <?php echo strtoupper($fran) . " - Year: " . $franYear; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" class="yearForm" name="HCHistory" action="../../_update/Edit_Year_Fields.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New Head Coach:</label> 
                        <input class="form-control" type="text" id="Value" name="NewVal" size="15">
                        <br>
                        <input type="hidden" name="fran" value=<?php echo $fran; ?> />
                        <input type="hidden" id="table" name="table" />
                        <input type="hidden" id="col" name="col" />
                        <input type="hidden" id="row" name="row" />
                        <div class="form-group" style="text-align: right">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Coaching Staff OC Modal -->
<div class="modal fade editModal" id="OCModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Offensive Coordinator for <?php echo strtoupper($fran) . " - Year: " . $franYear; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" class="yearForm" name="OCHistory" action="../../_update/Edit_Year_Fields.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New Offensive Coordinator:</label> 
                        <input class="form-control" type="text" id="Value" name="NewVal" size="15">
                        <br>
                        <input type="hidden" name="fran" value=<?php echo $fran; ?> />
                        <input type="hidden" id="table" name="table" />
                        <input type="hidden" id="col" name="col" />
                        <input type="hidden" id="row" name="row" />
                        <div class="form-group" style="text-align: right">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Coaching Staff DC Modal -->
<div class="modal fade editModal" id="DCModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Defensive Coordinator for <?php echo strtoupper($fran) . " - Year: " . $franYear; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" class="yearForm" name="DCHistory" action="../../_update/Edit_Year_Fields.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New Defensive Coordinator:</label> 
                        <input class="form-control" type="text" id="Value" name="NewVal" size="15">
                        <br>
                        <input type="hidden" name="fran" value=<?php echo $fran; ?> />
                        <input type="hidden" id="table" name="table" />
                        <input type="hidden" id="col" name="col" />
                        <input type="hidden" id="row" name="row" />
                        <div class="form-group" style="text-align: right">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Coaching Staff ST Modal -->
<div class="modal fade editModal" id="STModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Special Teams Coordinator for <?php echo strtoupper($fran) . " - Year: " . $franYear; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" class="yearForm" name="STHistory" action="../../_update/Edit_Year_Fields.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New Special Teams Coordinator:</label> 
                        <input class="form-control" type="text" id="Value" name="NewVal" size="15">
                        <br>
                        <input type="hidden" name="fran" value=<?php echo $fran; ?> />
                        <input type="hidden" id="table" name="table" />
                        <input type="hidden" id="col" name="col" />
                        <input type="hidden" id="row" name="row" />
                        <div class="form-group" style="text-align: right">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
