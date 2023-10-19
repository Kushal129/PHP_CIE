<?php
session_start();
include '../cie2/connection.php';

if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $qry = "SELECT * from tbl_login WHERE email =  '$email'";
    $run = mysqli_query($conn, $qry);

    if (mysqli_num_rows($run) == 1) {
        $row = mysqli_fetch_array($run);
        $id = $row['id'];
        $stored_password = $row['password'];
        $role = $row['role'];

        if ($password === $stored_password) {
            $_SESSION['user_id'] = $id;
            if ($role == 0) {
                header("Location: ../cie2/user.php");
                exit();
            } elseif ($role == 1) {
                header("Location: ../cie2/admin.php");
                exit();
            }
        } else {
            echo 'Password Incorrect';
        }
    } else {
        echo 'Email not found';
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login Page</title>
</head>

<body>
    <div class="w-50 m-auto">
        <form action="login.php" method="POST" class="mt-5">
            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>