<?php

$username = $_POST['username'];
$email_address = $_POST['email_address'];
$password = $_POST['password'];
$verify_password = $_POST['verify_password'];

$conn = new mysqli('localhost','root','','sbusers');

if ($conn->connect_error) {
    die('Connection Failed: '.$conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into registration(username, email_address, password, verify_password) values(?,?,?,?)");
    $stmt->bind_param("ssss", $username, $email_address, $password, $verify_password);
    $stmt->execute();
    echo "Registration Complete";
    $stmt->close();
    $conn->close();
}
?>
