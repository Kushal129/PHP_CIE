<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exam";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['patient_name']) && isset($_POST['doctor']) && isset($_POST['appointment_date']) && isset($_POST['appointment_time'])) {
    $patientName = $_POST['patient_name'];
    $doctorID = $_POST['doctor'];
    $appointmentDate = $_POST['appointment_date'];
    $appointmentTime = $_POST['appointment_time'];

    $sql = "INSERT INTO appointments (PatientName, DoctorID, AppointmentDate, AppointmentTime) VALUES ('$patientName', $doctorID, '$appointmentDate', '$appointmentTime')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
