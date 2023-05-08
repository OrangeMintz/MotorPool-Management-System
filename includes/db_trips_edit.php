<?php 
include_once "db_conn.php";

$trips = $_GET['trip'];


$sql = "SELECT trips.trips_id, trips.schedule_id, trips.origin, trips.destination, driver.driver_id, driver.first_name, driver.middle_name, driver.last_name, 
                driver.suffix, vehicle.vehicle_number, vehicle.vehicle_plate, vehicle.vehicle_brand, vehicle.vehicle_model, scheduling.departure_datetime, scheduling.arrival_datetime, 
                scheduling.schedule_status
            FROM trips 
                JOIN scheduling ON trips.schedule_id = scheduling.schedule_id 
                JOIN appointed ON scheduling.appointed_vd = appointed.appointed_vd 
                JOIN driver ON appointed.driver_id = driver.driver_id 
                JOIN vehicle ON appointed.vehicle_number = vehicle.vehicle_number
                WHERE trips.trips_id = " . $trips;
$result = $conn->query($sql);

if($result ->num_rows <= 0){
    echo "<script>window.location='400.php'</script>";
}
else{
    $row = $result->fetch_assoc();
}?>


