<?php 
include_once "db_conn.php"; 

// ADD DATABASE INPUTS
$vehicle_number = $_POST['vehicle-number'];
$vehicle_brand = $_POST['vehicle-brand'];
$vehicle_model = $_POST['vehicle-model'];
$vehicle_plate = $_POST['vehicle-plate'];


$add = "INSERT INTO `vehicle`(`vehicle_number`, `vehicle_brand`, `vehicle_model`, `vehicle_plate`, `created_at`) VALUES (?, ?, ?, ?, NOW())";
$stmt = $conn->prepare($add);
$stmt -> bind_param("ssss",$vehicle_number, $vehicle_brand, $vehicle_model, $vehicle_plate);

if($stmt->execute()){
    header("Location: ../vehicle.php?added=successfully");

}
else{
    header("Location: ../vehicle.php?added=unsucessfully");

}

$conn->close();


?>