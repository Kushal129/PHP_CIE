<?php

include '../cie2/connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['fname'];
    $number = $_POST['mnumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $qry = "INSERT into tbl_login (fname ,mnumber,email,password) values ('$name','$number','$email','$password')";
    if (mysqli_query($conn, $qry)) {
        echo "Record Insert succesfulll";
        header('location:../cie2/login.php');
    } else {
        echo "Error: " . mysqli_error($conn);
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
    <title>Registration</title>
</head>

<body>
    <div class="w-50 m-auto">
        <form action="index.php" method="POST" class="mt-5">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="fname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="number">Mobile Number</label>
                <input type="number" name="mnumber" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="button" id="button" class="btn btn-primary form-control">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>