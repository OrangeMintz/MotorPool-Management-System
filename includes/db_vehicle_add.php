<?php 
include_once "db_conn.php"; 

// ADD DATABASE INPUTS
$vehicle_number = $_POST['vehicle-number'];
$vehicle_brand = $_POST['vehicle-brand'];
$vehicle_model = $_POST['vehicle-model'];
$vehicle_plate = $_POST['vehicle-plate'];


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


$query = mysqli_query($conn, "SELECT * FROM `vehicle` WHERE vehicle_number = '$vehicle_number'");

if(mysqli_num_rows($query)>0){
    $error = "Vehicle Number already existed";
    header("Location: ../vehicle.php?error=".urlencode($error));
    exit();
    // echo "<script>document.getElementById('error-message').innerHTML = '$error';</script>";
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
    header("Location: ../vehicle.php?added=unsucessfully");}
    exit();
}

?>