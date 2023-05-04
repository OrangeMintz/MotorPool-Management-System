<?php
include_once "db_conn.php"; 

$driver_id = $_POST['num'];

$delete = "DELETE FROM driver WHERE `driver`.`driver_id` = ?";
$stmt = $conn->prepare($delete);
$stmt -> bind_param("s",$driver_id);

if($stmt->execute()){
    $conn->close();
}
else{
    $conn->close();

}
?>

