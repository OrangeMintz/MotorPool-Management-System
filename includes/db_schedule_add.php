<?php 
include_once "db_conn.php"; 

$appointed_vd = $_POST['appointed-vd'];
$departure = $_POST['departure-datetime'];
// $arrival = $_POST['arrival-datetime'];
$arrival = $_POST['arrival-datetime'];

$status = ($arrival) ? 'Arrived' : 'T   raveling '; // set schedule status to 'completed' if arrival datetime is set, otherwise set to 'pending'

$add = "INSERT INTO `scheduling`(`appointed_vd`, `departure_datetime`, `arrival_datetime`, `schedule_status`) 
VALUES (?,?,?,?)";
$stmt = $conn->prepare($add);
$stmt->bind_param("isss", $appointed_vd, $departure, $arrival, $status);


if($stmt->execute()){
    $conn->close();
    header("Location: ../schedule.php?added=successfully");
    
    exit();

}
else{
    $conn->close();
    header("Location: ../schedule.php?added=unsuccessfully");}
    exit();

?>