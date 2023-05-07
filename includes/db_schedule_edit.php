<?php 
include_once "db_conn.php";

$schedule = $_GET['schedule'];
$sql = "SELECT * FROM `schedule` WHERE schedule_id = " . $schedule;
$result = $conn->query($sql);

if($result ->num_rows <= 0){
    echo "<script>window.location='400.php'</script>";
}
else{
    $row = $result->fetch_assoc();
}?>


