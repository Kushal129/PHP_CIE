<?php
session_start();
include '../cie2/connection.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] === "update_user") {
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $mnumber = $_POST['mnumber'];
        $email = $_POST['email'];

        $updateQuery = "UPDATE tbl_login SET fname='$fname', mnumber='$mnumber', email='$email' WHERE id='$id'";
        if (mysqli_query($conn, $updateQuery)) {
            echo '<script>alert("User updated successfully!");</script>';
        } else {
            echo '<script>alert("User update failed!");</script>';
        }
    } elseif ($_POST['action'] === "delete_user") {
        $id = $_POST['id'];

        $deleteQuery = "DELETE FROM tbl_login WHERE id='$id'";
        if (mysqli_query($conn, $deleteQuery)) {
            echo '<script>alert("User deleted successfully!");</script>';
        } else {
            echo '<script>alert("User deletion failed!");</script>';
        }
    }

    if ($_POST['action'] === "logout") {
        session_destroy();
        header("location: ../cie2/login.php"); 
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="../cie2/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="sidenav">

        <a href="?page=view_users">View Users</a>
        <input type="submit" style="width: 100%; background-color: red; text-align: center; border: none; padding: 0.7em; margin-top: 40rem;" value="Logout" onclick="logout()">
    </div>
    <div class="content">
        <h1>Welcome to the Admin Panel</h1>

        <?php
        if (isset($_GET['page']) && $_GET['page'] == 'view_users') {
            echo '<h2>User Management</h2>';
            $result = mysqli_query($conn, "SELECT * FROM tbl_login");
            echo '<table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Mobile Number</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td>' . $row['id'] . '</td>
                        <td>' . $row['fname'] . '</td>
                        <td>' . $row['mnumber'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="id" value="' . $row['id'] . '">
                                <input type="text" name="fname" value="' . $row['fname'] . '">
                                <input type="text" name="mnumber" value="' . $row['mnumber'] . '">
                                <input type="text" name="email" value="' . $row['email'] . '">
                                <button type="submit" name="action" value="update_user">Update</button>
                                <button type="submit" name="action" value="delete_user">Delete</button>
                            </form>
                        </td>
                    </tr>';
            }
            echo '</tbody>
                </table>';
        }
        ?>
    </div>
    <script>
        function logout() {
            if (confirm("Are you sure you want to log out?")) {
                $.post('', { action: 'logout' }, function() {
                    window.location.href = '../cie2/login.php';
                });
            }
        }
    </script>
</body>
</html>
