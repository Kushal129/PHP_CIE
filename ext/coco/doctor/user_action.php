<?php
include_once 'conaction.php';

print_r($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $doctorId = $_POST["doctor"];

  
    $insertQuery = "INSERT INTO appointments (user_name, doctor_id, status) VALUES ('$name', $doctorId, 'Pending')";
    $con->query($insertQuery);
    header("Location: index.php"); 
    exit();
}
?>
