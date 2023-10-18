<?php
$host = 'localhost';
$username = 'root';
$password = ''; 
$database = 'cie';


$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $comment = $_POST['comment'];

    $qry = "INSERT INTO tbl_user (user, email, mobile, comment) VALUES ('$user', '$email', '$mobile', '$comment')";

    if (mysqli_query($conn, $qry)) {
        header('location:index.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
