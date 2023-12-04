<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Book Appointment</h2>
        <form action="#" method="post">
            <label for="patientName">Patient Name:</label>
            <input type="text" name="patientName" required>

            <label for="doctor">Select Doctor:</label>
            <select name="doctor" required>
                <option value="Dr. Smith">Dr. Smith</option>
                <option value="Dr. Johnson">Dr. Johnson</option>
            </select>

            <label for="appointmentDate">Appointment Date:</label>
            <input type="date" name="appointmentDate" required>

            <button type="submit">Book Appointment</button>
        </form>
    </div>
</body>
</html>


<?php
// Assuming you have a database connection
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientName = $_POST["patientName"];
    $doctor = $_POST["doctor"];
    $appointmentDate = $_POST["appointmentDate"];

    // Insert data into the database
    $sql = "INSERT INTO appointments (patientName, doctor, appointmentDate) VALUES ('$patientName', '$doctor', '$appointmentDate')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>