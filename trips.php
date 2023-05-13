<?php include "header.php";
include "css/customcss.php";
include "remove.php";
include_once "includes/db_conn.php";



$display = "SELECT trips.trips_id, trips.schedule_id, trips.origin, trips.destination, driver.driver_id, driver.first_name, driver.middle_name, driver.last_name, 
                driver.suffix, vehicle.vehicle_number, vehicle.vehicle_plate, vehicle.vehicle_brand, vehicle.vehicle_model, scheduling.departure_datetime, scheduling.arrival_datetime, 
                scheduling.schedule_status
            FROM trips 
                JOIN scheduling ON trips.schedule_id = scheduling.schedule_id 
                JOIN appointed ON scheduling.appointed_vd = appointed.appointed_vd 
                JOIN driver ON appointed.driver_id = driver.driver_id 
                JOIN vehicle ON appointed.vehicle_number = vehicle.vehicle_number";
$dis = $conn->query($display);
$dis2 = $conn->query($display);

//SCHEDULE SELECTION
$query = "SELECT schedule_id, departure_datetime, schedule_status FROM scheduling WHERE schedule_id NOT IN (SELECT schedule_id FROM trips)";
$result = $conn->query($query);

//message
$message = "";
if(isset($_GET['error'])){
    $message = "<div class='alert alert-danger'>".$_GET['error']."</div>";
}

else if(isset($_GET['success'])){
    $message = "<div class='alert alert-success'>".$_GET['success']."</div>";
}

else if(isset($_GET['success-edit'])){
    $message = "<div class='alert alert-info'>".$_GET['success-edit']."</div>";
}

else if(isset($_GET['warning'])){
    $message = "<div class='alert alert-warning'>".$_GET['warning']."</div>";
}

?>


<script>
$(document).ready(function (){
    $('.tripTable').DataTable();
});

</script>

    <!-- ADD TRIP MODAL START-->
        <div class="modal fade " id="addTrip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ADD A TRIP</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="trip-add" action ="includes/db_trips_add.php" method="POST">
                            <div class="alert alert-warning error" role="alert">
                            <div id="errormsg"></div></div>
                                <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label for="schedule-departure" class="col-form-label">Origin</label>
                                            <input type="text" class="form-control"  id="trips-origin" name="trips-origin" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                            <label for="schedule-arrival" class="col-form-label">Destination</label>
                                            <input type="text" class="form-control" id="trips-destination" name="trips-destination" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm">
                                        <div class="form-group">
                                            <label for="schedule-departure" class="col-form-label">Schedule</label>
                                            <select class="form-control" id="schedule" size="1" name ="schedule" required>
                                            <option value="" selected="selected" selected disabled value> -- Select Schedule  -- </option>
                                            <?php
                                                if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo '<option value="'. $row['schedule_id'] .'">'. $row['departure_datetime'].' - '. $row['schedule_status'].'</option>';
                                                }
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        </div>
                                </div>
                                </div>
                                    <div class="modal-footer">
                                    <button type="button" id="cancel-btn" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" id="add-btn" class="btn btn-success">Add Trip</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- ADD TRIP MODAL END-->



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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="appoint.php"
                                aria-expanded="false">
                                <i class="fas fa-clipboard" aria-hidden="true"></i>
                                <span class="hide-menu">Appoint Vehicle Driver</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="schedule.php"
                                aria-expanded="false">
                                <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                <span class="hide-menu">Schedule Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                                aria-expanded="false">
                                <i class="fa fa-map" aria-hidden="true"></i>
                                <span class="hide-menu">Trips Management</span>
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
                    <h4 class="page-title">Trips Management</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <div class="d-md-flex">
                        <ol class="breadcrumb ms-auto">
                            <li>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                            data-bs-target="#addTrip">BOOK A TRIP</button> 
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div id="error-message"><?php echo $message; ?></div>

            <div class="container-fluid">
             <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Trips</h3>
                        <div class="table-responsive">
                            <table class="table text-center tripTable load table-bordered table-hover">

                                <thead>
                                    <tr>
                                        <th class="border-top-0">ID</th>
                                        <th class="border-top-0">Driver</th>
                                        <th class="border-top-0">Vehicle Plate</th>
                                        <th class="border-top-0">Vehicle</th>
                                        <th class="border-top-0">Origin</th>
                                        <th class="border-top-0">Destination</th>
                                        <th class="border-top-0">Departure</th>
                                        <th class="border-top-0">Arrival</th>
                                        <th class="border-top-0">Status</th>
                                        <th class="border-top-0">Actions</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if ($dis->num_rows > 0) {
                                while($row = $dis->fetch_assoc()) {
                                    echo '<tr>
                                        <td>'. $row['driver_id'].'</td>
                                        <td>'. $row['last_name'].', '. $row['first_name'] .' '. $row['middle_name'] .' '. $row['suffix'] .'</td>
                                        <td>'. $row['vehicle_plate'].'</td>
                                        <td>'. $row['vehicle_brand'].' '. $row['vehicle_model'].'</td>
                                        <td>'. $row['origin'].'</td>
                                        <td>'. $row['destination'].'</td>
                                        <td>'. $row['departure_datetime'].'</td>
                                        <td>'. $row['arrival_datetime'].'</td>
                                        <td>'. $row['schedule_status'].'</td>
                                        <td>
                                            <button type="button" id="edit-btn" class="btn btn-success"onclick="editTrips('. $row['trips_id'].')">EDIT</button>
                                            <button type="button" id="delete-btn" class="btn btn-danger" onclick="deleteTrip('. $row['trips_id'].')">DELETE</button>
                                        </td>
                                    </tr>';
                                }
                            } ?>

                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script src="js/tripss.js"></script>
<?php include "footer.php" ?>