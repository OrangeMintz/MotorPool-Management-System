<?php 
include "header.php";
include "css/customcss.php";
include "remove.php";
include_once "includes/db_conn.php";


//DISPLAY
$display = "SELECT * FROM driver";
$dis = $conn->query($display); 

//EDIT 
include "includes/db_driver_edit.php"
?>

<script>
    $(document).ready(function (){
        $("#editDriver").modal('show');
    })

</script>

<!-- EDIT DRIVER MODAL START -->
        <div class="modal fade " id="editDriver" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-keyboard="false">

            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">EDIT DRIVER</h5>
                            <button type="button" class="close" onclick="redirectback()" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="driver-add" action ="includes/db_driver_update.php" method="POST">
                            <div class="alert alert-warning error" role="alert">
                            <div id="errormsg"></div></div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="first-name" class="col-form-label">First Name:</label>
                                                <input type="text" class="form-control" id="driver-first-name" value="<?php echo $row['first_name']?>" name ="fname" required>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="middle-name" class="col-form-label">Middle Name:</label>
                                                <input type="text" class="form-control" id="driver-middle-name" maxlength = "15" value="<?php echo $row['middle_name']?>" name ="mname">
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="last-name" class="col-form-label">Last Name:</label>
                                                <input type="text" class="form-control" id="driver-last-name" maxlength = "15" value="<?php echo $row['last_name']?>" name ="lname" required>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="suffix-name" class="col-form-label">Suffix:</label>
                                                <select class="form-control" id="driver-suffix-name" size="1" name ="sname" value="" >
                                                <option></option>
                                                <option selected value="<?php echo $row['suffix']?>"> <?php echo $row['suffix']?>  </option> 
                                                <option>Jr.</option><option>Sr.</option></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="birthday" class="col-form-label">Birthday</label>
                                                <input type="date" class="form-control" id="driver-birthday" value="<?php echo $row['birthday']?>" name ="birthday" required>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="id" class="col-form-label">Driver ID</label>
                                                <i class="fas fa-exclamation-triangle mandate" aria-hidden="true"></i>
                                                <input type="text" class="form-control" id="driver-id" placeholder="1000" 
                                                onKeyDown="if(this.value.length==4 && event.keyCode>47 && event.keyCode < 58) return false;" value="<?php echo $row['driver_id']?>" name ="id" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="province" class="col-form-label">Province:</label>
                                                <select class="form-control" id="driver-province" size="1" name="province" required>
                                                <option value="<?php echo $row['province']?>" selected readonly><?php echo $row['province']?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="city" class="col-form-label">City:</label>
                                                <select class="form-control" id="driver-city" size="1" name="city" required>
                                                <option value="<?php echo $row['city']?>" selected readonly><?php echo $row['city']?></option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="barangay" class="col-form-label">Barangay:</label>
                                                <select class="form-control" id="driver-barangay" size="1" name="barangay" required>
                                                <option value="<?php echo $row['barangay']?>" selected readonly><?php echo $row['barangay']?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label class="col-form-label" for="phone">Phone #:</label>
                                                <i class="fas fa-exclamation-triangle mandate" aria-hidden="true"></i>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    <div class="input-group-text">+63</div>
                                                    </div>
                                                    <input type="number" class="form-control" id="driver-phone" value="<?php echo $row['phone_number']?>" required placeholder="9*********" onKeyDown="if(this.value.length==10 && event.keyCode>47 && event.keyCode < 58) return false;" name ="pnumber">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="email" class="col-form-label">Email Address:</label>
                                                <i class="fas fa-exclamation-triangle mandate" aria-hidden="true"></i>
                                                <input type="email" class="form-control" id="driver-email" name ="email" value="<?php echo $row['email_address']?>" placeholder="example@gmail.com" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cancel-btn" class="btn btn-danger"  onclick="redirectback()" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" id="add-btn" class="btn btn-success" name ="submit">Edit Driver</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <!-- EDIT DRIVER MODAL END -->
        
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
                        <h4 class="page-title">Driver Management</h4>
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
                            <h3 class="box-title">Driver</h3>
                            <div class="table-responsive">
                                <table class="table text-center load table-bordered table-hover  driverTable">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Address</th>
                                            <th class="border-top-0">Birthday</th>
                                            <th class="border-top-0">Phone #</th>
                                            <th class="border-top-0">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                            if ($dis->num_rows > 0) {
                                                // output data of each row
                                                while($row = $dis->fetch_assoc()) {
                                                  echo '<tr>
                                                  <td>'. $row['driver_id'].'</td>
                                                  <td>'. $row['last_name'].', '. $row['first_name'] .' '. $row['middle_name'] .' '. $row['suffix'] .'</td>
                                                  <td>'. $row['barangay'].', '. $row['city'].', '. $row['province'].'</td>
                                                  <td>'. $row['birthday'].'</td>
                                                  <td>'. $row['phone_number'].'</td>
                                                  <td>'. $row['email_address'].'</td>
                                                  
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
window.location="driver.php";
}
</script>
<script src="js/drivers.js"></script>
<?php include "footer.php" ?>

