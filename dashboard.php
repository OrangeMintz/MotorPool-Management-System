<?php include "header.php" ;
include_once "includes/db_conn.php";

//DISPLAY
$display = "SELECT * FROM driver";
$display = "SELECT appointed.appointed_vd,driver.driver_id, driver.first_name,driver.middle_name, driver.last_name, driver.suffix, 
            vehicle.vehicle_number, vehicle.vehicle_plate, vehicle.vehicle_brand, vehicle.vehicle_model FROM appointed
            JOIN driver ON appointed.driver_id = driver.driver_id
            JOIN vehicle ON appointed.vehicle_number = vehicle.vehicle_number";
$dis = $conn->query($display); 


$schedquery = "SELECT schedule_id FROM scheduling ORDER BY schedule_id"; 
$sched_run = mysqli_query($conn,$schedquery);
$schedule = mysqli_num_rows($sched_run);

$tripsquery = "SELECT trips_id FROM trips ORDER BY trips_id"; 
$trips_run = mysqli_query($conn,$tripsquery);
$trips = mysqli_num_rows($trips_run);

$driverquery = "SELECT driver_id FROM driver ORDER BY driver_id"; 
$driver_run = mysqli_query($conn,$driverquery);
$driver = mysqli_num_rows($driver_run);

$vehicle_query = "SELECT vehicle_number FROM vehicle ORDER BY vehicle_number"; 
$vehicle_run = mysqli_query($conn,$vehicle_query);
$vehicle = mysqli_num_rows($vehicle_run);
?>


<!-- Left Sidebar  -->
<aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
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
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            
        <div class="container-fluid">
            <div class="row justify-content-center">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                <?php Echo '<h3>' .$schedule. '<h3>';?>
                                <p>Current Schedule</p>
                                </div>
                                <div class="icon">
                                 <i class="fas fa-calendar"></i> 
                                </div>
                            <a href="schedule.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                            <div class="inner">
                                <?php Echo '<h3>' .$trips. '<h3>';?>
                                <p>Current Trips</p>
                            </div>
                            <div class="icon">
                                    <i class="fa fa-map"></i>
                                </div>
                            <a href="trips.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                            <div class="inner">
                                <?php Echo '<h3>' .$driver. '<h3>';?>

                                <p>Total Drivers</p>
                            </div>
                            <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            <a href="driver.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                            <div class="inner">
                                <?php Echo '<h3>' .$vehicle. '<h3>';?>

                                <p>Total Vehicles</p>
                            </div>
                            <div class="icon">
                                    <i class="fas fa-car"></i>
                                </div>
                            <a href="vehicle.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                    </div>
                    <!-- ./col -->
                    </div>
                </div>
                <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Appointed Drivers</h3>
                            <div class="table-responsive">
                                <table class="table text-center load table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="border-top-0">Driver ID</th>
                                            <th class="border-top-0">Driver Name</th>
                                            <th class="border-top-0">Vehicle Number</th>
                                            <th class="border-top-0">Vehicle Plate</th>
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
                                                  <td>'. $row['driver_id'].'</td>
                                                  <td>'. $row['last_name'].', '. $row['first_name'] .' '. $row['middle_name'] .' '. $row['suffix'] .'</td>
                                                  <td>'. $row['vehicle_number'].'</td>
                                                  <td>'. $row['vehicle_plate'].'</td>
                                                  <td>'. $row['vehicle_brand'].'</td>
                                                  <td>'. $row['vehicle_model'].'</td>
                                                  <td>
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

            

                
<?php include "footer.php" ?>