<?php 
include_once "db_conn.php"; 

$schedule = $_POST['schedule-id'];
$origin = $_POST['trips-origin'];
$destination = $_POST['trips-destination'];
$status = ($arrival) ? 'Arrived' : 'Traveling ';

// Validate driver inputs input
if (strlen(trim($origin)) === 0) {
    $error = "Origin cannot be empty or contain only whitespace characters";
    header("Location: ../trips.php?error=".urlencode($error));
    exit();
}

if (strlen(trim($destination)) === 0) {
    $error = "Destination cannot be empty or contain only whitespace characters";
    header("Location: ../trips.php?error=".urlencode($error));
    exit();
}

if (preg_match('/^\s+|\s+$/', $origin)) {
    $error = "Origin cannot start or end with whitespace characters";
    header("Location: ../trips.php?error=".urlencode($error));
    exit();
}

if (preg_match('/^\s+|\s+$/', $destination)) {
    $error = "Destination cannot start or end with whitespace characters";
    header("Location: ../trips.php?error=".urlencode($error));
    exit();
}

else{
    // Insert the new schedule
    $update = "UPDATE `trips` SET `schedule_id`= ?, `origin`= ?,`destination`= ?, `updated_at` = CURRENT_TIMESTAMP WHERE `schedule_id` = ?";
    $stmt = $conn->prepare($update);
    $stmt->bind_param("issi", $schedule, $origin, $destination, $schedule);

    if($stmt->execute()){
        $msg = "Trip Rebooked Successfully";
        $conn->close();
        header("Location: ../trips.php?success-edit=".urlencode($msg));
        exit();
    }
    else{
        $conn->close();
        header("Location: ../trips.php?added=unsuccessfully");
        exit();
    }
}




?>