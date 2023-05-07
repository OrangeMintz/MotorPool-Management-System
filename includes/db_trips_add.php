<?php 
include_once "db_conn.php"; 

$appointed_vd = $_POST['appointed-vd'];
$departure = $_POST['departure-datetime'];
$arrival = $_POST['arrival-datetime'];
$status = ($arrival) ? 'Arrived' : 'Traveling '; 

// Check if a schedule with the same appointed_vd already exists
$check = "SELECT * FROM scheduling WHERE appointed_vd = ?";
$stmtcheck = $conn->prepare($check);
$stmtcheck->bind_param("i", $appointed_vd);
$stmtcheck->execute();
$result = $stmtcheck->get_result();

if ($result->num_rows > 0) {
    $msg = "Remove first the existing schedule data";
    header("Location: ../schedule.php?warning=".urlencode($msg));
    exit();
}

// Check if arrival date time is before departure date time
if ($arrival && strtotime($arrival) < strtotime($departure)) {
    $msg = "Arrival date time cannot be before departure date time";
    header("Location: ../schedule.php?error=".urlencode($msg));
    exit();
}

// Insert the new schedule
$add = "INSERT INTO `scheduling`(`appointed_vd`, `departure_datetime`, `arrival_datetime`, `schedule_status`, `created_at`) 
VALUES (?,?,?,?, NOW())";
$stmt = $conn->prepare($add);
$stmt->bind_param("isss", $appointed_vd, $departure, $arrival, $status);

if($stmt->execute()){
    $msg = "Schedule Added Successfully";
    $conn->close();
    header("Location: ../schedule.php?success=".urlencode($msg));
    exit();
}
else{
    $conn->close();
    header("Location: ../schedule.php?added=unsuccessfully");
    exit();
}
?>