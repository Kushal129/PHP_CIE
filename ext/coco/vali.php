<?php

// Email validation
$email = "user@example.com";
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Valid email address<br>";
} else {
    echo "Invalid email address<br>";
}

// Password validation
$password = "Password123";
if (preg_match("/^(?=.*[a-zA-Z])(?=.*\d).{8,}$/", $password)) {
    echo "Valid password<br>";
} else {
    echo "Invalid password<br>";
}

// Phone number validation
$phone = "1234567890";
if (ctype_digit($phone)) {
    echo "Valid phone number<br>";
} else {
    echo "Invalid phone number<br>";
}

// Name validation
$name = "John Doe";
if (ctype_alpha(str_replace(' ', '', $name))) {
    echo "Valid name<br>";
} else {
    echo "Invalid name<br>";
}

?>



