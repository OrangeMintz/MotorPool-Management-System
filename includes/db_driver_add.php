<?php include_once "db_conn.php"; ?>

<?php

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


$add = "INSERT INTO `driver`(`driver_id`, `first_name`, `middle_name`, `last_name`, `suffix`, 
`birthday`, `barangay`, `city`, `province`, `phone_number`, `email_address`) VALUES ('$id',
'$fname','$mname','$lname','$sname','$birthday','$barangay','$city','$province',
'$pnumber','$email');";


mysqli_query($conn, $add);

header("Location: ../driver.php?added=successfully");

?>