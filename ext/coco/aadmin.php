<?php
// Database connection
$server = "localhost";
$username = "root";
$pass = "";
$db = "exam";

$conn = mysqli_connect($server,$username,$pass,$db);
if(!$conn)
{
    die("connection failed".$mysqli_connect_error());

}
else{
    echo"connection successfull";
}

// Retrieve unapproved appointments
$sql = "SELECT * FROM appointments WHERE approved = 0";
$result = $conn->query($sql);

echo "<h2>Unapproved Appointments</h2>";

if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['patient_name']} - {$row['doctor']} - {$row['appointment_date']} <a href='approve.php?id={$row['id']}'>Approve</a></li>";
    }
    echo "</ul>";
} else {
    echo "No unapproved appointments.";
}

// Close the database connection
$conn->close();
