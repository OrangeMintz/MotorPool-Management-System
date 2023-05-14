<?php 
include_once "db_conn.php"; 

// ADD DATABASE INPUTS
$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$address = $_POST['address'];
$birthday = $_POST['birthday'];
$phonenumber = $_POST['pnumber'];
$email = $_POST['email'];

$vehicle_model = $_POST['vehicle-model'];

// Validate vehicle plate input
if (preg_match('/\s/', $username)) {
    $error = "Username cannot contain whitespace characters";
    header("Location: ../signup.php?error=".urlencode($error));
    exit();
}

if (preg_match('/\s/', $password)) {
    $error = "Password cannot contain whitespace characters";
    header("Location: ../signup.php?error=".urlencode($error));
    exit();
}

if (preg_match('/^\s+|\s+$/', $fullname)) {
    $error = "Name cannot start or end with whitespace characters";
    header("Location: ../signup.php?error=".urlencode($error));
    exit();
}

if (preg_match('/^\s+|\s+$/', $address)) {
    $error = "Address cannot start or end with whitespace characters";
    header("Location: ../signup.php?error=".urlencode($error));
    exit();
}

$query = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username'");
$query2 = mysqli_query($conn, "SELECT * FROM `users` WHERE email_address = '$email'");
$query3 = mysqli_query($conn, "SELECT * FROM `users` WHERE full_name = '$fullname'");



if(mysqli_num_rows($query)>0){
    $error = "Username already exists";
    header("Location: ../signup.php?error=".urlencode($error));
    exit();
}

else if(mysqli_num_rows($query2)>0){
    $error = "Email already exists";
    header("Location: ../signup.php?error=".urlencode($error));
    exit();
}

else if(mysqli_num_rows($query3)>0){
    $error = "User already exists";
    header("Location: ../signup.php?error=".urlencode($error));
    exit();
}

else{
    $add = "INSERT INTO `users`(`username`, `user_password`, `full_name`, `birthday`, `address`, `phone_number`, `email_address`) 
    VALUES (?,?,?,?,?,?,?)";


    $stmt = $conn->prepare($add);
    $stmt -> bind_param("sssssis",$username, $password, $fullname, $birthday, $address, $phonenumber, $email);

    if($stmt->execute()){
    $error = "Account Successfully Added";
    header("Location: ../signup.php?success=".urlencode($error));


    }
    else{
        header("Location: ../signup.php?error");
    }
}

$conn->close();

?>