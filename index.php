<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="icon" type="image/png" sizes="16x16" href="icon/light(1).png">
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <script src="js/jquery/jquery.js"></script>
</head>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

<?php include_once "includes/db_conn.php"; 
    echo '<script>$(document).ready(function (){$(".error").hide();})</script>';

$error_message = '';
    if(isset($_POST['username'])){
        $uname = $_POST['username'];
        $password = $_POST['password'];

        $sql="SELECT * FROM users WHERE username='".$uname."' AND user_password = '".$password."' limit 1";

        // $result = mysqli_query($sql);
        $result = $conn->query($sql);

        
        if($result->num_rows == 1){
            header("Location: dashboard.php?successfully_logged_in");

        }
        else{
            $error_message = "Incorrect username or password";
            echo '<script>$(document).ready(function (){$(".error").show();})</script>';
        }
    }

?>

<div id="mainBgn">
    <div class="d-flex vh-100 justify-content-center align-items-center" >
    <div class="p-2 flex-grow ">
        <div class="smallContainer border shadow rounded ">
        <div class="row g-0 form">
            <div class="col-sm-6 col-xs-12 d-none d-sm-block position-relative " id='leftCol'>
            <img src="images/login/wallpaper.png" />
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="d-flex flex-column" style="height:100%">
                    <div class="my-auto p-5">
                        <div class="text-center">
                            <div class="logo">
                            <img src="icon/loginlogo1.png" height="100"/>
                            </div>
                        </div>
                    
                    <form action ="#" method="POST" id="submitForm">
                        <div class="row" style="margin-top: 60px;">
                            <div class="col-sm">
                                <div class="form-group">
                                <div class="alert alert-warning error" role="alert">
                                <div ><?php echo $error_message; ?> </div></div>
                                    <div class="position-relative my-3 inputGroup">
                                        <span class="position-absolute span-margin"><i class="fas fa-user"></i></span>
                                        <input type="text" class="border-0 border-bottom w-100" placeholder="Username" name="username" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <div class="position-relative my-3 inputGroup ">
                                        <span class="position-absolute span-margin"><i class="fas fa-key"></i></span>
                                        <input type="password" class="border-0 border-bottom w-100" placeholder="Password" name="password" required/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between pt-2">
                        <a class="linkFlare" href="signup.php"><small>Create Account</small></a>
                        <button class="btn btn-accent px-4 rounded-pill">LOGIN</button>
                        </div>
                    </form>
                    </div>
                    <div class="p-2 text-center" id="lsHeading">ADMIN LOGIN</div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

<script src="js/jsall/custom.js"></script> 

</body>
</html>
