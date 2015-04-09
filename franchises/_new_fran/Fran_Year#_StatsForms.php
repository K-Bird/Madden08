<div class="row">   
    <div class="col-lg-12" style="text-align: right; color: black">
        <button class="btn btn-default" data-toggle="modal" data-target=".newStatModal">Add New Stat Row</button>
        <div id="updateDash" class="modal fade newStatModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="text-align: left; width: 25%">
                <div class="modal-content">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            <h3 class="panel-title">Add Stat Row</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="_Update/Add_Stats_Row.php" method="post">
                                <div class="form-group">
                                    <label for="type">Stat Type:</label>
                                    <select class="form-control" name="type">
                                        <option>passing</option>
                                        <option>rushing</option>
                                        <option>rec</option>
                                        <option>def</option>
                                        <option>blocking</option>
                                        <option>kicking</option>
                                        <option>punting</option>
                                        <option>return</option>
                                    </select>
                                    <br>
                                    <input type="hidden" name="fran" value="NewFran" />
                                    <input type="hidden" name="year" value="#" />
                                    <input class="btn btn-default" type="submit" name="AddPlayer" value="Add Row to Stats" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>