<?php 
include_once "db_conn.php"; 

$appointed_vd = $_POST['appointed-vd'];
$departure = $_POST['departure-datetime'];
$arrival = $_POST['arrival-datetime'];
$status = ($arrival) ? 'Arrived' : 'Traveling ';

// check if arrival datetime is before departure datetime
if ($arrival && strtotime($arrival) < strtotime($departure)) {
    $msg = "Arrival date time cannot be before departure date time";
    header("Location: ../schedule.php?error=".urlencode($msg));
    exit();
}
else{
    $update = "UPDATE `scheduling` SET `appointed_vd`= ?, `departure_datetime`= ?,`arrival_datetime`= ?,`schedule_status`= ?, `updated_at` = CURRENT_TIMESTAMP WHERE `appointed_vd` = ?";
    $stmt = $conn->prepare($update);
    $stmt->bind_param("isssi", $appointed_vd, $departure, $arrival, $status, $appointed_vd);
    
    if($stmt->execute()){
        $msg = "Schedule Edited Successfully";
        $conn->close();
        header("Location: ../schedule.php?success-edit=".urlencode($msg));
        exit();
    }
    else{
        $conn->close();
        header("Location: ../schedule.php?edited=unsuccessfully");
        exit();
    } 
}




?>