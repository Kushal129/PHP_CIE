<?php
// Assume you have a database connection $db

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $doctorId = $_POST["doctor"];

    // Insert appointment into the 'appointments' table
    $insertQuery = "INSERT INTO appointments (user_name, doctor_id, status) VALUES ('User Name', $doctorId, 'Pending')";
    $db->query($insertQuery);

    header("Location: user_page.php"); // Redirect after submission
    exit();
}
?>
