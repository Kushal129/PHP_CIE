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

if (isset($_POST['view_students'])) {
    // Get the selected counsellor's ID from the form
    $counsellorId = $_POST['counsellor'];

    // Query to retrieve students for the selected counsellor
    $sql = "SELECT * FROM Student WHERE Cid = $counsellorId";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Students for the selected counsellor:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Student ID</th><th>Student Name</th><th>Semester</th><th>Class</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Sid'] . "</td>";
            echo "<td>" . $row['Sname'] . "</td>";
            echo "<td>" . $row['sem'] . "</td>";
            echo "<td>" . $row['class'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No students found for the selected counsellor.";
    }

    $conn->close();
}
?>
