<?php 
include_once "db_conn.php";

$driver_id = $_GET['driver_id'];
$sql = "SELECT * FROM `driver` WHERE driver_id = " . $driver_id;
$result = $conn->query($sql);

if($result ->num_rows <= 0){
    echo "<script>window.location='400.php'</script>";
}
else{
    $row = $result->fetch_assoc();
}?>


