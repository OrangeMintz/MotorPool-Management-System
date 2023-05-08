<?php 
include "header.php";
include "css/customcss.php";
include "remove.php";
include_once "includes/db_conn.php";

//DISPLAY

$display = "SELECT appointed.appointed_vd,driver.driver_id, driver.first_name,driver.middle_name, driver.last_name, driver.suffix, 
            vehicle.vehicle_number, vehicle.vehicle_plate, vehicle.vehicle_brand, vehicle.vehicle_model FROM appointed
            JOIN driver ON appointed.driver_id = driver.driver_id
            JOIN vehicle ON appointed.vehicle_number = vehicle.vehicle_number";
$dis = $conn->query($display); 


$display2 = "SELECT * FROM driver";
$dis2 = $conn->query($display); 


$displaydriver = "SELECT * FROM driver
WHERE driver_id NOT IN (SELECT driver_id FROM appointed)";
$disdriver = $conn->query($displaydriver); 


$displayvehicle = "SELECT * FROM vehicle
WHERE vehicle_number NOT IN (SELECT vehicle_number FROM appointed)";
$disvehicle = $conn->query($displayvehicle); 

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

?>

        <!-- APPOINT VEHICLE DRIVER MODAL START-->
        <div class="modal fade " id="addAppoint" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">APPOINT</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="vehicle-add" action ="includes/db_appoint_add.php" method="POST">
                            <div class="alert alert-warning error" role="alert">
                            <div id="errormsg"></div></div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg">
                                        <div class="form-group">
                                                <label for="driver-id" class="col-form-label">Driver</label>
                                                <select class="form-control" id="driver-id" size="1" name ="driver-id" required>
                                                <option value="" selected="selected" selected disabled value> -- Select Driver  -- </option>
                                                <?php
                                                    if ($disdriver->num_rows > 0) {
                                                        $disdriver->data_seek(0);
                                                    while($row2 = $disdriver->fetch_assoc()) {
                                                        echo '<option value="'. $row2['driver_id'] .'">'. $row2['last_name'].', '. $row2['first_name'] .' '. $row2['middle_name'] .' '. $row2['suffix'] .'</option>';
                                                    }
                                                }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm">
                                            <div class="form-group">
                                                <label for="vehicle-number" class="col-form-label">Vehicle</label>
                                                <select class="form-control" id="vehicle-number" size="1" name ="vehicle-number" required>
                                                <option value="" selected="selected" selected disabled value> -- Select Driver  -- </option>
                                                <?php
                                                    if ($disvehicle->num_rows > 0) {
                                                        $disvehicle->data_seek(0);
                                                    while($row3 = $disvehicle->fetch_assoc()) {
                                                        echo '<option value="'. $row3['vehicle_number'] .'">'. $row3['vehicle_brand'] . ' ' . $row3['vehicle_model'] .'</option>';
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
                                    <button type="submit" id="add-btn" class="btn btn-success">Appoint Driver</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- APPOINT VEHICLE DRIVER MODAL END-->



        

     
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="trips.php"
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
                        <h4 class="page-title">Appoint Vehicle Driver</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                            <li><button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                                data-bs-target="#addAppoint" >Appoint Driver</button></li>
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
                            <h3 class="box-title">Appointed Vehicle Drivers Table</h3>
                            <div class="table-responsive">
                                <table class="table text-center appointTable load table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Driver ID</th>
                                            <th class="border-top-0">Driver Name</th>
                                            <th class="border-top-0">Vehicle Number</th>
                                            <th class="border-top-0">Vehicle Plate</th>
                                            <th class="border-top-0">Vehicle Brand</th>
                                            <th class="border-top-0">Vehicle Model</th>
                                            <th class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                            
                                            if ($dis->num_rows > 0) {
                                            // output data of each row
                                                while($row = $dis->fetch_assoc()) {
                                                  echo '<tr>
                                                  <td>'. $row['appointed_vd'].'</td>
                                                  <td>'. $row['driver_id'].'</td>
                                                  <td>'. $row['last_name'].', '. $row['first_name'] .' '. $row['middle_name'] .' '. $row['suffix'] .'</td>
                                                  <td>'. $row['vehicle_number'].'</td>
                                                  <td>'. $row['vehicle_plate'].'</td>
                                                  <td>'. $row['vehicle_brand'].'</td>
                                                  <td>'. $row['vehicle_model'].'</td>
                                                  <td>
                                                      <button type="button" id="edit-btn" class="btn btn-success" data-bs-toggle="modal" 
                                                      data-bs-target="#editAppoint" onclick="editAppointment('. $row['appointed_vd'].')">EDIT</button>
                                                      <button type="button" id="delete-btn" class="btn btn-danger" 
                                                      onclick="deleteAppointment('. $row['appointed_vd'].')">DELETE</button>
                                                  </td></tr>';
                                                }
                                            }
                                            $conn->close();
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script src="js/appoints.js"></script>
<?php include "footer.php" ?>