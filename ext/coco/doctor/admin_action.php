<?php
// Assume you have a database connection $db

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get data from the URL
    $appointmentId = $_GET["appointment_id"];
    $action = $_GET["action"];

    // Update appointment status based on the action
    $updateQuery = "UPDATE appointments SET status = '$action' WHERE appointment_id = $appointmentId";
    $db->query($updateQuery);

    header("Location: admin_page.php"); // Redirect after action
    exit();
}
?>
