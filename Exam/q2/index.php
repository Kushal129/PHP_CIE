<!-- 
Appolo Hospital Management system helps to manage patient appointments online. The patient can get
an online appointment with a specific doctor. Write code to implement the above functionality.
Note:
1.            Enlist required tables for creating the above functionality.
2.            Take appropriate form validation.
 -->

<!DOCTYPE html>
<html>
<head>
    <title>Apollo Hospital - Online Appointment</title>
</head>
<body>
    <h1>Apollo Hospital - Online Appointment</h1>
    <form action="book_appointment.php" method="post">
        <label for="patient_name">Your Name:</label>
        <input type="text" id="patient_name" name="patient_name" required><br>

        <label for="doctor">Select Doctor:</label>
        <select name="doctor" required>
            <!-- Populate this dropdown with doctors from the database -->
            <option value="1">Dr. John Doe (Cardiologist)</option>
            <option value="2">Dr. Jane Smith (Dermatologist)</option>
            <!-- Add more doctors as needed -->
        </select><br>

        <label for="date">Appointment Date:</label>
        <input type="date" id="date" name="appointment_date" required><br>

        <label for="time">Appointment Time:</label>
        <input type="time" id="time" name="appointment_time" required><br>

        <input type="submit" value="Book Appointment">
    </form>
</body>
</html>
