<!-- Salary Cap Modal -->
<div class="modal fade editModal" id="capModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Salary Cap for <?php echo strtoupper($fran) . " - Year: " . $franYear; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" name="editSalaryCap" action="../../_update/Edit_Year_Fields.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New Salary Cap:</label> 
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

<!-- Cap Room Modal -->
<div class="modal fade editModal" id="roomModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Cap Room for <?php echo strtoupper($fran) . " - Year: " . $franYear; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" name="editSalaryCap" action="../../_update/Edit_Year_Fields.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New Cap Room:</label> 
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

<!-- Cap Penalties Modal -->
<div class="modal fade editModal" id="penModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Cap Penalties for <?php echo strtoupper($fran) . " - Year: " . $franYear; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" name="editSalaryCap" action="../../_update/Edit_Year_Fields.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New Cap Penalties:</label> 
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

<!-- Team Salary Modal -->
<div class="modal fade editModal" id="salaryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Team Salary for <?php echo strtoupper($fran) . " - Year: " . $franYear; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" name="editSalaryCap" action="../../_update/Edit_Year_Fields.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New Team Salary:</label> 
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

<!-- NFL Icons Modal -->
<div class="modal fade editModal" id="iconsModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit NFL Icons for <?php echo strtoupper($fran) . " - Year: " . $franYear; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" name="editSalaryCap" action="../../_update/Edit_Year_Fields.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New NFL Icons:</label> 
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

<!-- Rivals Modal -->
<div class="modal fade editModal" id="rivalsModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Rivals for <?php echo strtoupper($fran) . " - Year: " . $franYear; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" name="editSalaryCap" action="../../_update/Edit_Year_Fields.php" method="post">
                    <div class="form-group">
                        <label for="NewVal">New Rivals:</label> 
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

