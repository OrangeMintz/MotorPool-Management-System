<?php include_once "db_conn.php"; ?>

<?php

// ADD DATABASE INPUTS
$vehicle_number = $_POST['vehicle-number'];
$vehicle_brand = $_POST['vehicle-brand'];
$vehicle_model = $_POST['vehicle-model'];

$add = "INSERT INTO `vehicle`(`vehicle_number`, `vehicle_brand`, `vehicle_model`) VALUES 
(?,?,?);";

$stmt = $conn->prepare($add);
$stmt -> bind_param("iss",$vehicle_number, $vehicle_brand, $vehicle_model);

if($stmt->execute()){
    echo("Vehicle was inserted successfully.");
}
else{
    echo("Vehicle insert failed");
}

$conn->close();
header("Location: ../vehicle.php?added=successfully");


?>