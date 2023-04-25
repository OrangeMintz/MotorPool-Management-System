<?php include_once "db_conn.php"; ?>

<?php

$vehicle_bm_id = $_POST['vehicle-number'];
$vehicle_brand = $_POST['vehicle_brand'];
$vehicle_model = $_POST['vehicle-model'];

$add = "INSERT INTO `vehicle_bm`(`vehicle_bm_id`, `vehicle_brand_idFK`, `vehicle_model_idFK`) VALUES 
(?,?,?)";
$stmt -> bind_param("iii",NULL, $vehicle_brand, $vehicle_model);


if($vehicle_brand )



// ADD DATABASE INPUTS
$vehicle_number = $_POST['vehicle-number'];
$vehicle_bm_idFK = $_POST['vehicle_bm_idFK'];

$add = "INSERT INTO `vehicle`(`vehicle_number`, `vehicle_bm_idFK`) VALUES 
(?,?);";

$stmt = $conn->prepare($add);
$stmt -> bind_param("ii",$vehicle_number, $vehicle_bm_idFK);

if($stmt->execute()){
    header("Location: ../vehicle.php?added=successfully");

}
else{
    header("Location: ../vehicle.php?added=unsucessfully");

}

$conn->close();


?>