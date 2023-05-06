<?php 
include_once "db_conn.php"; 

$driver_id = $_POST['driver-id'];
$vehicle_number = $_POST['vehicle-number'];

$add = "INSERT INTO `appointed` (`driver_id`, `vehicle_number`, `created_at`) VALUES (?, ?, NOW())";
$stmt = $conn->prepare($add);
$stmt->bind_param("ii", $driver_id, $vehicle_number);


if($stmt->execute()){
    $conn->close();
    header("Location: ../appoint.php?added=successfully");
    
    exit();

}
else{
    $conn->close();
    header("Location: ../appoint.php?added=unsuccessfully");}
    exit();

?>