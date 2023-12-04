<?php

include_once 'conaction.php';

session_abort();
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['l_password'];

    if (empty($password)) {
        echo "<script>alert('Please Enter Password');</script>";
    } else {
        $checkEmailQuery = "SELECT * FROM users WHERE email=?";
        $stmt = $con->prepare($checkEmailQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($password === $row['password']) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $email;

                if ($row['role'] == 1) {
                    header("Location: user.php");
                    exit();
                } else {
                    header("Location: admin.php");
                    exit();
                }
            } else {
                echo "<script>alert('Password Incorrect');</script>";
            }
        } else {
            echo "<script>alert('Email Not Found');</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
</head>

<body>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="l_password" name="l_password" required>
        <br>
        <button type="submit" id="login" name="login">Login</button>
    </form>


</body>

</html>