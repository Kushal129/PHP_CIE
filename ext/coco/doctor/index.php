<?php
include_once 'conaction.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
</head>

<body>
    <h1>User Page</h1>

    <form action="user_action.php" method="post">
        <label for="name">Name : </label>
        <input type="text" name="name" id="name" required>
        <br><br>
        <label for="doctor">Select Doctor:</label>
        <select name="doctor" id="doctor">
            <?php
            $result = $con->query("SELECT * FROM doctors");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['doctor_id'] . "'>" . $row['doctor_name'] . "</option>";
            }
            ?>
        </select>
        <br><br>

        <button type="submit">Book Appointment</button>

        <a href="result_page.php">View Results</a>
    </form>
</body>

</html>