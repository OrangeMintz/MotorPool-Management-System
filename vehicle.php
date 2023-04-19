<?php include "header.php" ?>
<link href="css/vehicle.css" rel="Stylesheet">

<script> 

$(document).ready(function (){

    $('#add-btn').click(function (){

        alert('Vehicle Added Successfully');

    })


})

</script>



<style>

#add-btn, #edit-btn{
    color: green;
    background-color: #fff;
    border-radius: 5px;
    
    
}
#add-btn:hover, #edit-btn:hover{
    color: #fff;
    background-color: #00B261;
    transition: 0.5s;
    
}

#cancel-btn, #delete-btn{
    color: #fff;
    background-color: #CD0000;
    border-radius: 5px;

}

#cancel-btn:hover, #delete-btn:hover{
    color: #fff;
    background-color: red;
    transition: 0.5s;
}


</style>
        <!-- Add Student MODAL START-->
        <div class="modal fade " id="addDriver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ADD VEHICLE</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="vehicle-number" class="col-form-label">Vehicle Number:</label>
                                                <input type="number" class="form-control" id="vehicle-number">
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="vehicle-brand" class="col-form-label">Vehicle Brand</label>
                                                <input type="text" class="form-control" id="vehicle-brand">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="vehicle-model" class="col-form-label">Vehicle Model</label>
                                                <input type="text" class="form-control" id="vehicle-model">
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="vehicle-seat" class="col-form-label">Passenger Seat</label>
                                                <input type="number" class="form-control" id="vehicle-seat">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="cancel-btn" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="add-btn" class="btn btn-success">Add Driver</button>
                        </div>
                </div>
            </div>
        </div>
        <!-- Add Student MODAL END -->

     
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
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="blank.php"
                                aria-expanded="false">
                                <i class="fa fa-columns" aria-hidden="true"></i>
                                <span class="hide-menu">Blank Page</span>
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
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                            <li><button type="button" class="btn btn-primary" data-bs-toggle="modal" 
                                data-bs-target="#addDriver" >ADD VEHICLE</button></li>
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
                            <h3 class="box-title">Vehicle Table</h3>
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No.</th>
                                            <th class="border-top-0">Vehicle Number</th>
                                            <th class="border-top-0">Vehicle Brand</th>
                                            <th class="border-top-0">Vehicle Model</th>
                                            <th class="border-top-0">Passenger Seat</th>
                                            <th class="border-top-0">Options</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>10253</td>
                                            <td>Honda</td>
                                            <td>2010 Honda Pilot</td>
                                            <td>7</td>
                                            <td><button type="button" id="edit-btn" class="btn btn-success" data-bs-dismiss="modal">EDIT</button>
                                                <button type="button" id="delete-btn" class="btn btn-danger">DELETE</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include "footer.php" ?>