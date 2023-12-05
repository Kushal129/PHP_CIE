<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
</head>
<body>
    <h1>User Page</h1>

    <!-- Form to book an appointment -->
    <form action="user_action.php" method="post">
        <label for="doctor">Select Doctor:</label>
        <select name="doctor" id="doctor">
            <!-- Fetch doctor names from the database -->
            <?php
                // Fetch doctors from the 'doctors' table and populate the dropdown
                // Assume $db is your database connection
                $result = $db->query("SELECT * FROM doctors");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['doctor_id'] . "'>" . $row['doctor_name'] . "</option>";
                }
            ?>
        </select>

        <button type="submit">Book Appointment</button>
    </form>
</body>
</html>
