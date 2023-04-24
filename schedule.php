<?php include "header.php";
include "css/customcss.php";
include "remove.php";
?>


        <!-- ADD SCHEDULE MODAL START-->
        <div class="modal fade " id="addSchedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ADD SCHEDULE</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="schedule-add" action ="#" method="POST">
                            <div class="alert alert-warning error" role="alert">
                            <div id="errormsg"></div></div>
                                <div class="container">
                                <div class="row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="driver-id" class="col-form-label">Driver ID:</label>
                                                <input type="number" class="form-control" id="driver-id" required  
                                                onKeyDown="if(this.value.length==4 && event.keyCode>47 && event.keyCode < 58) return false;">
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="vehicle-number" class="col-form-label">Vehicle Number</label>
                                                <input type="text" class="form-control" id="vehicle-number" requried  
                                                onKeyDown="if(this.value.length==5 && event.keyCode>47 && event.keyCode < 58) return false;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="schedule-departure" class="col-form-label">Departure Datetime</label>
                                                <input type="datetime-local" class="form-control" id="schedule-departure" required>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="schedule-arrival" class="col-form-label">Arrival Datetime</label>
                                                <input type="datetime-local" class="form-control" id="schedule-arrival">
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
        <!-- ADD SCHEDULE MODAL END-->


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


<!-- Left Sidebar  -->
<aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php"
                                aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="driver.php"
                                aria-expanded="false">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="hide-menu">Driver Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="vehicle.php"
                                aria-expanded="false">
                                <i class="fa fa-car" aria-hidden="true"></i>
                                <span class="hide-menu">Vehicle Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                                aria-expanded="false">
                                <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                <span class="hide-menu">Schedule</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="trips.php"
                                aria-expanded="false">
                                <i class="fa fa-map" aria-hidden="true"></i>
                                <span class="hide-menu">Trips</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>


        <!-- Page wrapper  -->
        <div class="page-wrapper" style="min-height: 250px;">

        <!-- Bread crumb and right sidebar toggle -->
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Schedule Management</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <div class="d-md-flex">
                        <ol class="breadcrumb ms-auto">
                            <li>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                            data-bs-target="#addSchedule">ADD SCHEDULE</button> 
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>



        <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Schedules</h3>
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Driver</th>
                                            <th class="border-top-0">Vehicle Number</th>
                                            <th class="border-top-0">Departure Datetime</th>
                                            <th class="border-top-0">Arrival Datetime</th>
                                            <th class="border-top-0">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Oshino Shinobu</td>
                                            <td>10253</td>
                                            <td>04/23/2023, 11:37 AM</td>
                                            <td>04/23/2023, 01:15 PM</td>
                                            <td>
                                            <button type="button" id="edit-btn" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editSchedule">EDIT</button>
                                            <button type="button" id="delete-btn" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">DELETE</button>
                                            </td> 
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<script src="js/schedule.js"></script>
<?php include "footer.php" ?>