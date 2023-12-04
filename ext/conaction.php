<?php 
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'cie';

$con = mysqli_connect($host , $username , $password , $database);
if (mysqli_connect_errno()){
    echo "<script>alert('Cannot Connect Database');</script>";
}

?>