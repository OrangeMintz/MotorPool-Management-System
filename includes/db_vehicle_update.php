<?php 
include_once "db_conn.php";

// ADD DATABASE INPUTS
$vehicle_number = $_POST['vehicle-number'];
$vehicle_plate = $_POST['vehicle-plate'];
$vehicle_brand = $_POST['vehicle-brand'];
$vehicle_model = $_POST['vehicle-model'];


// Validate vehicle inputs
if (strlen(trim($vehicle_plate)) == 0) {
    $error = "Vehicle Plate cannot be empty or contain only whitespace characters";
    header("Location: ../vehicle.php?error=".urlencode($error));
    exit();
}

if (preg_match('/\s/', $vehicle_plate)) {
    $error = "Vehicle Plate cannot contain whitespace characters";
    header("Location: ../vehicle.php?error=".urlencode($error));
    exit();
}

$check_query = mysqli_query($conn, "SELECT * FROM `vehicle` WHERE vehicle_plate = '$vehicle_plate' AND vehicle_number != '$vehicle_number'");

if(mysqli_num_rows($check_query) > 0){
    $error = "Vehicle with the same vehicle plate number already exists";
    header("Location: ../vehicle.php?error=".urlencode($error));
    exit();
}

else{

$update = "UPDATE `vehicle` SET `vehicle_brand` = ?, `vehicle_model` = ?, `vehicle_plate` = ?, `updated_at` = CURRENT_TIMESTAMP WHERE `vehicle`.`vehicle_number` = ?;";

$stmt = $conn->prepare($update);
$stmt -> bind_param("sssi", $vehicle_brand, $vehicle_model, $vehicle_plate, $vehicle_number);


if($stmt->execute()){
    $msg = "Vehicle Edited Successfully";
    $conn->close();
    header("Location: ../vehicle.php?success-edit=".urlencode($msg));

}
else{
    header("Location: ../vehicle.php?edited=unsuccessfully");

}

$conn->close();
}

?>
