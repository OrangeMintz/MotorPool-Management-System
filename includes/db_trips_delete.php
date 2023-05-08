<?php
include_once "db_conn.php"; 

$trips = $_POST['num'];

$delete = "DELETE FROM trips WHERE `trips`.`trips_id` = ?";
$stmt = $conn->prepare($delete);
$stmt -> bind_param("s",$trips);

if($stmt->execute()){
    $conn->close();
}
else{
    $conn->close();
}
?>