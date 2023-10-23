<?php
// Establish a database connection (replace with your credentials)
$conn = mysqli_connect("localhost", "root", "", "exam");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['enrollmentNumber'])) {
    $enrollmentNumber = $_POST['enrollmentNumber'];

    // Query to fetch student result from ResultMaster and StudentMaster tables
    $query = "SELECT S.Name, S.Sem, S.Course, R.CGPA, R.SGPA, R.Status
              FROM studentMaster S
              INNER JOIN resultMaster R ON S.EnNo = R.EnNo
              WHERE S.EnNo = '$enrollmentNumber'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Display the result in a tabular format
        echo "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Semester</th>
                    <th>Course</th>
                    <th>CGPA</th>
                    <th>SGPA</th>
                    <th>Status</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Sem'] . "</td>";
            echo "<td>" . $row['Course'] . "</td>";
            echo "<td>" . $row['CGPA'] . "</td>";
            echo "<td>" . $row['SGPA'] . "</td>";
            echo "<td>" . $row['Status'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No results found for the given Enrollment Number.";
    }
} else {
    echo "Enrollment Number is required.";
}

mysqli_close($conn);
?>
