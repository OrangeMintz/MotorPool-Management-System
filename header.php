<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DrivePool Solutions</title>
    <link rel="icon" type="image/png" sizes="16x16" href="icon/light(1).png">
    <link href="css/style.min.css" rel="stylesheet">
    <script src="js/jquery/jquery.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <link href="DataTables/datatables.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

<style>

.drop{
    font-family: "Nunito Sans";
    font-weight: 700;
}
.drop:hover{
    
    transition: .2s;
    color: #ccc;
    
}
    
</style>
<body>
  
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
  
    <!-- Main Wrapper -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
       
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
        <!-- Logo -->
                    <a class="navbar-brand" href="dashboard.php">
                        <span class="logo-text">
                            <img src="icon/light_smol.png" alt="homepage" height ="55px" style="margin-left: 50px;">
                        </span>
                    </a>
                    
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white"
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>

        <!-- Right side toggle and nav items -->
        <ul class="navbar-nav ms-auto d-flex align-items-center">
            <!-- User profile -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="icon/users/d1.jpg" alt="user-img" width="36" class="img-circle">
                    <span class="text-white font-medium">ADMIN</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item drop"  href="index.php">Logout</a></li>
                </ul>
            </li>
        </ul>
                </div>
            </nav>

        </header>
