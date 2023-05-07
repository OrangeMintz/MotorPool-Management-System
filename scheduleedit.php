<!-- EDIT SCHEDULE MODAL START-->
<div class="modal fade " id="editSchedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">EDIT SCHEDULE</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="schedule-edit" action ="#" method="POST">
                            <div class="alert alert-warning error2" role="alert">
                            <div id="errormsg2"></div></div>
                                <div class="container">
                                <div class="row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="driver-id" class="col-form-label">Driver ID:</label>
                                                <input type="number" class="form-control" id="driver-id2" required  
                                                onKeyDown="if(this.value.length==4 && event.keyCode>47 && event.keyCode < 58) return false;">
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="vehicle-number" class="col-form-label">Vehicle Number</label>
                                                <input type="text" class="form-control" id="vehicle-number2" requried  
                                                onKeyDown="if(this.value.length==5 && event.keyCode>47 && event.keyCode < 58) return false;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="schedule-departure" class="col-form-label">Departure Datetime</label>
                                                <input type="datetime-local" class="form-control" id="schedule-departure2" required>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="schedule-arrival" class="col-form-label">Arrival Datetime</label>
                                                <input type="datetime-local" class="form-control" id="schedule-arrival2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="modal-footer">
                                    <button type="button" id="cancel-btn" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" id="add-btn" class="btn btn-success">Add Schedule</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- EDIT SCHEDULE MODAL END-->