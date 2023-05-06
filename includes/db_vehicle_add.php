<?php 
include_once "db_conn.php"; 

// ADD DATABASE INPUTS
$vehicle_number = $_POST['vehicle-number'];
$vehicle_brand = $_POST['vehicle-brand'];
$vehicle_model = $_POST['vehicle-model'];
$vehicle_plate = $_POST['vehicle-plate'];


// Validate vehicle plate input
if (preg_match('/\s/', $vehicle_plate)) {
    $error = "Vehicle Plate cannot contain whitespace characters";
    header("Location: ../vehicle.php?error=".urlencode($error));
    exit();
}


$query = mysqli_query($conn, "SELECT * FROM `vehicle` WHERE vehicle_number = '$vehicle_number'");
$query2 = mysqli_query($conn, "SELECT * FROM `vehicle` WHERE vehicle_plate = '$vehicle_plate'");


if(mysqli_num_rows($query)>0){
    $error = "Vehicle Number already exists ";
    header("Location: ../vehicle.php?error=".urlencode($error));
    exit();
}

else if(mysqli_num_rows($query2)>0){
    $error = "Vehicle Plate already exists ";
    header("Location: ../vehicle.php?error=".urlencode($error));
    exit();
}

else{
$add = "INSERT INTO `vehicle`(`vehicle_number`, `vehicle_brand`, `vehicle_model`, `vehicle_plate`, `created_at`) VALUES (?, ?, ?, ?, NOW())";

$stmt = $conn->prepare($add);
$stmt -> bind_param("ssss",$vehicle_number, $vehicle_brand, $vehicle_model, $vehicle_plate);

if($stmt->execute()){
    $conn->close();
    header("Location: ../vehicle.php?added=successfully");
    exit();

}
else{
    $conn->close();
    header("Location: ../vehicle.php?added=unsuccessfully");}
    exit();
}

?>