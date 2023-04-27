<?php
include_once "db_conn.php"; 

$vehicle_number = $_POST['num'];

$delete = "DELETE FROM vehicle WHERE `vehicle`.`vehicle_number` = ?";
$stmt = $conn->prepare($delete);
$stmt -> bind_param("s",$vehicle_number);

if($stmt->execute()){
    
}
else{



}



?>