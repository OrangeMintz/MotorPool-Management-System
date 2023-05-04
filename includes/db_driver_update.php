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

// Validate driver inputs
if (strlen(trim($fname)) === 0) {
    $error = "First name cannot be empty or contain only whitespace characters";
    header("Location: ../driver.php?error=".urlencode($error));
    exit();
}

if (preg_match('/\s/', $fname)) {
    $error = "First name cannot contain whitespace characters";
    header("Location: ../driver.php?error=".urlencode($error));
    exit();
}


$update = "UPDATE `driver` SET `first_name`= ?,`middle_name`= ?,`last_name`= ?,`suffix`= ?,`birthday`= ?,`barangay`= ?, 
`city`= ?,`province`= ?,`phone_number`= ?,`email_address`= ?,`updated_at`=  CURRENT_TIMESTAMP WHERE `driver`.`driver_id` = ?;";

$stmt = $conn->prepare($update);
$stmt -> bind_param("ssssssssssi", $fname, $mname, $lname, $suffix, $birthday, $barangay, $city, $province, $pnumber, $email, $id);



if($stmt->execute()){
    header("Location: ../driver.php?edited=successfully");
}
else{
    header("Location: ../driver.php?edited=unsucessfully");
}
$conn->close();

?>
