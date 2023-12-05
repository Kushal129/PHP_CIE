<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <h1>Admin Page</h1>

    <!-- Display appointments with actions -->
    <table border="1">
        <tr>
            <th>User Name</th>
            <th>Doctor Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <!-- Fetch appointments from the 'appointments' table -->
        <?php
            // Assume $db is your database connection
            $appointmentsResult = $db->query("SELECT * FROM appointments JOIN doctors ON appointments.doctor_id = doctors.doctor_id");

            while ($appointment = $appointmentsResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $appointment['user_name'] . "</td>";
                echo "<td>" . $appointment['doctor_name'] . "</td>";
                echo "<td>" . $appointment['status'] . "</td>";
                echo "<td><a href='admin_action.php?appointment_id=" . $appointment['appointment_id'] . "&action=accept'>Accept</a> | <a href='admin_action.php?appointment_id=" . $appointment['appointment_id'] . "&action=reject'>Reject</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
