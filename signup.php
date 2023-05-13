<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link rel="icon" type="image/png" sizes="16x16" href="icon/light(1).png">
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/signup.css" rel="stylesheet">
    <script src="js/jquery/jquery.js"></script>
    <?php include "css/customcss.php"?>
</head>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <?php //message
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

<div id="mainBgn">
    <div class="d-flex vh-100 justify-content-center align-items-center" >
        <div class="p-2 flex-grow ">
            <div class="smallContainer border shadow rounded" > 
                <div class="row g-0 form">
                    <div class="col-sm-6 col-xs-12 d-none d-sm-block position-relative " id='leftCol'>
                    <img src="images/login/wall.jpg" />
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="d-flex flex-column" style="height:100%;">
                            <div class="my-auto p-5">
                            <div class="text-center">
                            <div id="error-message"><?php echo $message; ?></div>
                                <div class="alert alert-warning error" role="alert">
                                    <div id="errormsg"></div></div>
                            </div>
                            <form action ="includes/db_user_handler.php" method="POST" id="createacc">
                                <div class="row">

                                    <div class="col-sm">
                                        <div class="form-group">
                                            
                                            <div class="position-relative my-3 inputGroup ">
                                                <span class="position-absolute span-margin"><i class="fas fa-user"></i></span>
                                                <input type="text" class="border-0 border-bottom w-100" placeholder="Username" id="username" name="username" required  maxlength="20"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <div class="position-relative my-3 inputGroup ">
                                                <span class="position-absolute span-margin"><i class="fas fa-key"></i></span>
                                                <input type="password" class="border-0 border-bottom w-100" placeholder="Password" id="password" name="password" required maxlength="20"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <div class="position-relative my-3 inputGroup ">
                                                <span class="position-absolute span-margin"><i class="fas fa-user-plus"></i></span>
                                                <input type="text" class="border-0 border-bottom w-100" placeholder="Full Name" id="fullname" name="fullname" required maxlength="255"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <div class="position-relative my-3 inputGroup ">
                                                <span class="position-absolute span-margin"><i class="fas fa-map-marker"></i></span>
                                                <input type="text" class="border-0 border-bottom w-100" placeholder="Address" id="location" name="address" required maxlength="255"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <div class="position-relative my-3 inputGroup ">
                                                <span class="position-absolute span-margin"><i class="fas fa-calendar-alt"></i></span>
                                                <input type="date" class="border-0 border-bottom w-100" placeholder="Birthday" name="birthday" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <div class="position-relative my-3 inputGroup ">
                                                <span class="position-absolute span-margin"><i class="fas fa-phone"></i></span>
                                                <input type="number" class="border-0 border-bottom w-100" placeholder="9***********" name="pnumber" id="pnumber"  required onKeyDown="if(this.value.length==10 && event.keyCode>47 && event.keyCode < 58) return false;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <div class="position-relative my-3 inputGroup ">
                                                <span class="position-absolute span-margin"><i class="fas fa-address-book"></i></span>
                                                <input type="email" class="border-0 border-bottom w-100" placeholder="Email Address" name="email" required maxlength="70"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between pt-2">
                                <a class="linkFlare" href="index.php"><small>Login Account</small></a>
                                    <button class="btn btn-accent px-4 rounded-pill">SIGN UP</button>
                                </div>
                            </form>
                            </div>
                            <div class="p-2 text-center" id="lsHeading">CREATE ADMIN ACCOUNT</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="js/jsall/custom.js"></script>
<script src="js/signup.js"></script> 

</body>

</html>

