<?php 
include_once "db_conn.php";

$appointed_vd = $_GET['appointed'];
$sql = "SELECT * FROM `appointed` WHERE appointed_vd = " . $appointed_vd;
$result = $conn->query($sql);

if($result ->num_rows <= 0){
    echo "<script>window.location='400.php'</script>";
}
else{
    $row = $result->fetch_assoc();
}?>


