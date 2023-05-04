<?php 
include_once "db_conn.php"; 

// ADD DATABASE INPUTS
$id = $_POST['id'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$sname = $_POST['sname'];
$birthday = $_POST['birthday'];
$province = $_POST['province'];
$city = $_POST['city'];
$barangay = $_POST['barangay'];
$pnumber = $_POST['pnumber'];
$email = $_POST['email'];


// Validate vehicle plate input

if (strlen(trim($fname)) === 0) {
    $error = "First name cannot be empty or contain only whitespace characters";
    header("Location: ../driver.php?error=".urlencode($error));
    exit();
}

$query = mysqli_query($conn, "SELECT * FROM `driver` WHERE driver_id = '$id'");


if(mysqli_num_rows($query)>0){
    $error = "Driver ID already existed";
    header("Location: ../driver.php?error=".urlencode($error));
    exit();
}

else{


$add = "INSERT INTO `driver`(`driver_id`, `first_name`, `middle_name`, `last_name`, `suffix`, `birthday`, `barangay`, `city`, `province`, `phone_number`, `email_address`, `created_at`) 
VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW())";

$stmt = $conn->prepare($add);
$stmt -> bind_param("sssssssssss",$id, $fname, $mname, $lname, $sname, $birthday, $province, $city, $barangay, $pnumber, $email);

if($stmt->execute()){
    $conn->close();
    header("Location: ../driver.php?added=successfully");
    exit();

}
else{
    $conn->close();
    header("Location: ../driver.php?added=unsucessfully");}
    exit();
}
?>