<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'myshop';

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$address = $_POST['address'] ?? '';

if (empty($name) || empty($email) || empty($phone) || empty($address)) {
    echo "Error: All the fields are required";
} else {

    $connection = new mysqli($hostname, $username, $password, $database);

    if ($connection->connect_error) {
        die('Connection failed: ' . $connection->connect_error);
    }

    $query = "INSERT INTO clients (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";

    if ($connection->query($query) === TRUE) {
        // echo 'Data inserted successfully.';
        header("Location: index.php"); // Redirect to index.php
        exit;
    } else {
        echo 'Error: ' . $connection->error;
    }

    $connection->close();

}
?>