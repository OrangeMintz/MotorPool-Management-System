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


// Validate driver inputs input
if (strlen(trim($fname)) === 0) {
    $error = "First name cannot be empty or contain only whitespace characters";
    header("Location: ../driver.php?error=".urlencode($error));
    exit();
}

if (preg_match('/^\s+|\s+$/', $fname)) {
    $error = "First name cannot start or end with whitespace characters";
    header("Location: ../driver.php?error=".urlencode($error));
    exit();
}

if (preg_match('/^\s+|\s+$/', $mname)) {
    $error = "Middle name cannot start or end with whitespace characters";
    header("Location: ../driver.php?error=".urlencode($error));
    exit();
}

if (strlen(trim($lname)) === 0) {
    $error = "Last name cannot be empty or contain only whitespace characters";
    header("Location: ../driver.php?error=".urlencode($error));
    exit();
}

if (preg_match('/^\s+|\s+$/', $lname)) {
    $error = "Last name cannot start or end with whitespace characters";
    header("Location: ../driver.php?error=".urlencode($error));
    exit();
}


$query = mysqli_query($conn, "SELECT * FROM `driver` WHERE driver_id = '$id'");
$query2 = mysqli_query($conn, "SELECT * FROM `driver` WHERE email_address = '$email'");
$query3 = mysqli_query($conn, "SELECT * FROM `driver` WHERE phone_number = '$pnumber'");
$query4 = mysqli_query($conn, "SELECT * FROM `driver` WHERE first_name = '$fname' AND middle_name = '$mname' AND last_name = '$lname'");


if(mysqli_num_rows($query)>0){
    $error = "Driver ID already exists";
    header("Location: ../driver.php?error=".urlencode($error));
    exit();
}

else if(mysqli_num_rows($query2)>0){
    $error = "Driver Email already exists";
    header("Location: ../driver.php?error=".urlencode($error));
    exit();
}

else if(mysqli_num_rows($query3)>0){
    $error = "Driver Phone Number already exists";
    header("Location: ../driver.php?error=".urlencode($error));
    exit();
}

else if(mysqli_num_rows($query4)>0){
    $error = "Driver with the same first name, middle name and last name already exists";
    header("Location: ../driver.php?error=".urlencode($error));
    exit();
}

else{


$add = "INSERT INTO `driver`(`driver_id`, `first_name`, `middle_name`, `last_name`, `suffix`, `birthday`, `province`, `city`, `barangay`, `phone_number`, `email_address`, `created_at`) 
VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW())";

$stmt = $conn->prepare($add);
$stmt -> bind_param("sssssssssss",$id, $fname, $mname, $lname, $sname, $birthday, $province, $city, $barangay, $pnumber, $email);

if($stmt->execute()){
    $msg = "Driver Added Successfully";
    $conn->close();
    header("Location: ../driver.php?success=".urlencode($msg));

    exit();

}
else{
    $conn->close();
    header("Location: ../driver.php?added=unsuccessfully");}
    exit();
}
?>