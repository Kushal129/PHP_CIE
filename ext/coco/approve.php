<?php
$server = "localhost";
$username = "root";
$pass = "";
$db = "exam";

$conn = mysqli_connect($server, $username, $pass, $db);
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
} else {
    echo "Connection successful";
}

// Check if 'id' parameter is set
if (isset($_GET['id'])) {
    // Retrieve appointment ID from the URL
    $appointment_id = $_GET['id'];

    // Update the appointment status to approved
    $sql = "UPDATE appointments SET approved = 1 WHERE id = $appointment_id";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment approved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: 'id' parameter is not set.";
}

// Close the database connection
$conn->close();
?>
