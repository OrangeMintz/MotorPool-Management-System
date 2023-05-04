<?php 
include "header.php";
include "css/customcss.php";
include "remove.php";
include_once "includes/db_conn.php";


//DISPLAY
$display = "SELECT * FROM vehicle";
$dis = $conn->query($display); 

//EDIT 
include "includes/db_vehicle_edit.php"
?>

<script>
    $(document).ready(function (){
        $("#editVehicle").modal('show');
    })

</script>

<!-- EDIT VEHICLE MODAL START-->
<div class="modal fade " id="editVehicle" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">EDIT VEHICLE</h5>
                            <button type="button" class="close" onclick="redirectback()" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="vehicle-add" action ="includes/db_vehicle_update.php" method="POST">
                            <div class="alert alert-warning error" role="alert">
                            <div id="errormsg"></div></div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label for="vehicle-number" class="col-form-label">Vehicle Number:</label>
                                                <i class="fas fa-exclamation-triangle mandate" aria-hidden="true"></i>
                                                <input type="number" class="form-control" name="vehicle-number" id="vehicle-number" value="<?php echo $row['vehicle_number']?>" 
                                                onKeyDown="if(this.value.length==5 && event.keyCode>47 && event.keyCode < 58) return false;" required readonly>
                                            </div>
                                        </div>

                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label for="vehicle-number" class="col-form-label">Vehicle Plate</label>
                                                <i class="fas fa-exclamation-triangle mandate" aria-hidden="true"></i>
                                                <input type="text" class="form-control" id="vehicle-plate" placeholder ="A4M5D" maxlength="5" name ="vehicle-plate" value="<?php echo $row['vehicle_plate']?>">
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="row">

                                    <div class="col-sm">
                                            <div class="form-group">
                                                <label for="vehicle-brand" class="col-form-label">Vehicle Brand</label>
                                                <select class="form-control" id="vehicle-brand" size="1" name="vehicle-brand" required>
                                                <option value="<?php echo $row['vehicle_brand'];?>" selected readonly><?php echo $row['vehicle_brand']?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="vehicle-model" class="col-form-label">Vehicle Model</label>
                                                <select class="form-control" id="vehicle-model" size="1" name="vehicle-model" required>
                                                <option value="<?php echo $row['vehicle_model']?>" selected readonly><?php echo $row['vehicle_model']?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="modal-footer">
                                    <button type="button" id="cancel-btn" onclick="redirectback()" class="btn btn-danger" data-bs-dismiss="modal" >Close</button>
                                    <button type="submit" id="add-btn" class="btn btn-success">Edit Driver</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- EDIT VEHICLE MODAL END -->
        
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                                aria-expanded="false">
                                <i class="fa fa-car" aria-hidden="true"></i>
                                <span class="hide-menu">Vehicle Management</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="schedule.php"
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
                        <h4 class="page-title">Vehicle Management</h4>
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
                            <h3 class="box-title">Vehicle Table</h3>
                            <div class="table-responsive">
                                <table class="table text-center vehicletable load table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Vehicle Number</th>
                                            <th class="border-top-0">Vehicle Brand</th>
                                            <th class="border-top-0">Vehicle Model</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                            if ($dis->num_rows > 0) {
                                                // output data of each row
                                                while($row = $dis->fetch_assoc()) {
                                                  echo '<tr>
                                                  <td>'. $row['vehicle_number'].'</td>
                                                  <td>'. $row['vehicle_brand'].'</td>
                                                  <td>'. $row['vehicle_model'].'</td>
                                                  </tr>';
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


<script>
function redirectback(){
window.location="vehicle.php";
}
</script>

<script src="js/vehicles.js"></script>
<?php include "footer.php" ?>

