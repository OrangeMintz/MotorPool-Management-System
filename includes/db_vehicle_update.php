<?php 
include_once "db_conn.php";

// ADD DATABASE INPUTS
$vehicle_number = $_POST['vehicle-number'];
$vehicle_brand = $_POST['vehicle-brand'];
$vehicle_model = $_POST['vehicle-model'];

$update = "UPDATE `vehicle` SET `vehicle_brand` = ?, `vehicle_model` = ? WHERE `vehicle`.`vehicle_number` = ?;";
$stmt = $conn->prepare($update);
$stmt -> bind_param("ssi", $vehicle_brand, $vehicle_model, $vehicle_number);



if($stmt->execute()){
    header("Location: ../vehicle.php?edited=successfully");

}
else{
    header("Location: ../vehicle.php?added=unsucessfully");

}

$conn->close();


?>
