<?php
include_once 'conaction.php';

print_r($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $doctorId = $_POST["doctor"];

    $fileName = $_FILES["file"]["name"];
    $fileContent = file_get_contents($_FILES["file"]["tmp_name"]);

    $insertQuery = "INSERT INTO appointments (user_name, doctor_id, status) VALUES ('$name', $doctorId, 'Pending' , '$fileName' , $fileContent)";
    $con->query($insertQuery);
    header("Location: index.php"); 
    exit();
}
?>
