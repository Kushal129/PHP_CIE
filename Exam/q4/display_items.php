<?php
if (isset($_POST['minWeight'], $_POST['maxWeight'], $_POST['type'])) {
    $minWeight = $_POST['minWeight'];
    $maxWeight = $_POST['maxWeight'];
    $typeID = $_POST['type'];

    // Establish a database connection
    $conn = mysqli_connect("localhost", "root", "", "exam");

    // Query to fetch items within the weight range and of the selected type in ascending order of weight
    $query = "SELECT ItemName, Color, Weight
              FROM item
              WHERE Weight BETWEEN $minWeight AND $maxWeight
              AND typeID = $typeID
              ORDER BY Weight ASC";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Display the filtered items in a table
        echo "<h2>Filtered Items:</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Item Name</th>
                    <th>Color</th>
                    <th>Weight</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['ItemName'] . "</td>";
            echo "<td>" . $row['Color'] . "</td>";
            echo "<td>" . $row['Weight'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No items found within the specified weight range and type.";
    }

    mysqli_close($conn);
}
?>
