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

$add = "INSERT INTO `users`(`username`, `user_password`, `full_name`, `birthday`, `location`, `phone_number`, `email_address`) 
VALUES (?,?,?,?,?,?,?)";


$stmt = $conn->prepare($add);
$stmt -> bind_param("sssssis",$username, $password, $fullname, $birthday, $address, $phonenumber, $email);

if($stmt->execute()){
    header("Location: ../login.php?created=successfully");

}
else{
    header("Location: ../vehicle.php?created=unsuccessfully");
}

$conn->close();


?>