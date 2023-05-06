<?php
include_once "db_conn.php"; 

$appointed = $_POST['num'];

$delete = "DELETE FROM appointed WHERE `appointed`.`appointed_vd` = ?";
$stmt = $conn->prepare($delete);
$stmt -> bind_param("s",$appointed);

if($stmt->execute()){
}
else{
}
?>