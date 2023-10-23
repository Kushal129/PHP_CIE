<!-- Create a PHP script with controls for minimum weight, Maximum weight, Type and display
button—clicking on the display button will list all items whose weight falls between a given range for a
particular type in ascending order of weight.
Consider Table: ITEM(ItemNo, ItemName, Color, Weight,typeID)
ItemType(TypeId, TypeName) -->


<!DOCTYPE html>
<html>
<head>
    <title>Filter Items</title>
</head>
<body>
    <h2>Filter Items by Weight Range and Type</h2>
    <form action="display_items.php" method="post">
        <label for="minWeight">Minimum Weight:</label>
        <input type="number" name="minWeight" required>
        <br>

        <label for="maxWeight">Maximum Weight:</label>
        <input type="number" name="maxWeight" required>
        <br>

        <label for="type">Select Type:</label>
        <select name="type" required>
            <?php
            // Populate the dropdown with item types from the ItemType table
            $conn = mysqli_connect("localhost", "root", "", "exam");

            $typeQuery = "SELECT TypeID, TypeName FROM itemType";
            $typeResult = mysqli_query($conn, $typeQuery);

            while ($row = mysqli_fetch_assoc($typeResult)) {
                echo '<option value="' . $row['TypeID'] . '">' . $row['TypeName'] . '</option>';
            }

            mysqli_close($conn);
            ?>
        </select>
        <br>

        <input type="submit" value="Display Items">
    </form>
</body>
</html>
