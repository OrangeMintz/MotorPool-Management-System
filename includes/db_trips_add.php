<?php 
include_once "db_conn.php"; 

$origin = $_POST['trips-origin'];
$destination = $_POST['trips-destination'];
$schedule = $_POST['schedule'];


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
    $add = "INSERT INTO `trips`(`schedule_id`, `origin`, `destination`) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($add);
    $stmt->bind_param("iss", $schedule, $origin, $destination);

    if($stmt->execute()){
        $msg = "Trip Booked Successfully";
        $conn->close();
        header("Location: ../trips.php?success=".urlencode($msg));
        exit();
    }
    else{
        $conn->close();
        header("Location: ../trips.php?added=unsuccessfully");
        exit();
    }
}

?>