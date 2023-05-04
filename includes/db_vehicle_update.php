<?php 
include_once "db_conn.php";

// ADD DATABASE INPUTS
$vehicle_number = $_POST['vehicle-number'];
$vehicle_plate = $_POST['vehicle-plate'];
$vehicle_brand = $_POST['vehicle-brand'];
$vehicle_model = $_POST['vehicle-model'];


// Validate vehicle plate input
if (strlen(trim($fname)) === 0) {
    $error = "Vehicle Plate cannot be empty or contain only whitespace characters";
    header("Location: ../vehicle.php?error=".urlencode($error));
    exit();
}

if (preg_match('/\s/', $vehicle_plate)) {
    $error = "Vehicle Plate cannot contain whitespace characters";
    header("Location: ../vehicle.php?error=".urlencode($error));
    exit();
}

$update = "UPDATE `vehicle` SET `vehicle_brand` = ?, `vehicle_model` = ?, `vehicle_plate` = ?, `updated_at` = CURRENT_TIMESTAMP WHERE `vehicle`.`vehicle_number` = ?;";

$stmt = $conn->prepare($update);
$stmt -> bind_param("sssi", $vehicle_brand, $vehicle_model, $vehicle_plate, $vehicle_number);



if($stmt->execute()){
    header("Location: ../vehicle.php?edited=successfully");

}
else{
    header("Location: ../vehicle.php?edited=unsucessfully");

}

$conn->close();


?>
