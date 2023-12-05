<?php 
include_once 'conaction.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Page</title>
</head>
<body>
    <h1>Result Page</h1>

    <!-- Fetch and display appointment results in a table -->
    <table border="1">
        <tr>
            <th>User Name</th>
            <th>Doctor Name</th>
            <th>Status</th>
        </tr>

        <?php
        // Assuming $con is your database connection
        $result = $con->query("SELECT * FROM appointments JOIN doctors ON appointments.doctor_id = doctors.doctor_id");
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['user_name'] . "</td>";
            echo "<td>" . $row['doctor_name'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
