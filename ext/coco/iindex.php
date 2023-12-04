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
        <h1>Hospital Management System</h1>
        <form action="#" method="post">
            <label for="patient_name">Patient Name:</label>
            <input type="text" id="patient_name" name="patient_name" required>
            
            <label for="doctor">Select Doctor:</label>
            <select id="doctor" name="doctor" required>
                <option value="Dr. Smith">Dr. Smith</option>
                <option value="Dr. Johnson">Dr. Johnson</option>
                <!-- Add more doctors as needed -->
            </select>
            
            <label for="appointment_date">Appointment Date:</label>
            <input type="date" id="appointment_date" name="appointment_date" required>
            
            <input type="submit" value="Book Appointment">
        </form>
    </div>
</body>
</html>

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $patient_name = $_POST['patient_name'];
    $doctor = $_POST['doctor'];
    $appointment_date = $_POST['appointment_date'];

    // Insert data into the database
    $sql = "INSERT INTO appointments (patient_name, doctor, appointment_date) VALUES ('$patient_name', '$doctor', '$appointment_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle invalid requests
    echo "Invalid request";
}
