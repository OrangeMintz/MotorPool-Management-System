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

$query = mysqli_query($conn, "SELECT * FROM `driver` WHERE first_name = '$fname' AND middle_name = '$mname' AND last_name = '$lname'");


if(mysqli_num_rows($query)>0){
    $error = "Driver with the same first name, middle name and last name already exists";
    header("Location: ../driver.php?error=".urlencode($error));
    exit();
}

else{


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

}
?>
