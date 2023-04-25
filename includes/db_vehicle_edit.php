<?php 
include_once "db_conn.php";

$vehiclenum = $_GET['vehiclenumber'];
$sql = "SELECT * FROM `vehicle` WHERE vehicle_number = " . $vehiclenum;
$result = $conn->query($sql);

if($result ->num_rows <= 0){
    echo "<script>window.location='400.php'</script>";
}
else{
    $row = $result->fetch_assoc();
}?>


