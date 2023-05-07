<?php 
include_once "db_conn.php"; 

$driver_id = $_POST['driver-id'];
$vehicle_number = $_POST['vehicle-number'];
$appointed_vd = $_POST['appointed-vd'];

$update = "UPDATE `appointed` SET `driver_id`= ?, `vehicle_number`= ?, `updated_at` = CURRENT_TIMESTAMP WHERE `appointed`.`appointed_vd` = ?";
$stmt = $conn->prepare($update);
$stmt->bind_param("iii", $driver_id, $vehicle_number, $appointed_vd);

if($stmt->execute()){
    $msg = "Driver Edited Successfully";
    $conn->close();
    header("Location: ../driver.php?success=".urlencode($msg));
    exit();
}
else{
    $conn->close();
    header("Location: ../appoint.php?edited=unsuccessfully");
    exit();
}


?>