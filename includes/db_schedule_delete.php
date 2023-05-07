<?php
include_once "db_conn.php"; 

$schedule = $_POST['num'];

$delete = "DELETE FROM scheduling WHERE `scheduling`.`schedule_id` = ?";
$stmt = $conn->prepare($delete);
$stmt -> bind_param("s",$schedule);

if($stmt->execute()){
    
}
else{
}
?>