<?php
// Assuming you have a database connection
$server = "localhost";
$username = "root";
$pass = "";
$db = "cie";

$conn = mysqli_connect($server,$username,$pass,$db);
if(!$conn)
{
    die("connection failed".$mysqli_connect_error());

}
else{
    echo"connection successfull";
}

// Retrieve appointments from the database
$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Appointments</h2>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='appointment'>";
                echo "<p><strong>Patient Name:</strong> " . $row["patientName"] . "</p>";
                echo "<p><strong>Doctor:</strong> " . $row["doctor"] . "</p>";
                echo "<p><strong>Appointment Date:</strong> " . $row["appointmentDate"] . "</p>";
                echo "<p><strong>Status:</strong> " . $row["status"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "No appointments found.";
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>