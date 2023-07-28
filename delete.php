<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'myshop';

$id = $_GET['id'];

$connection = new mysqli($hostname, $username, $password, $database);

if ($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
}

$sql = "DELETE FROM clients WHERE id = $id";

if ($connection->query($sql) === TRUE) {
    // echo 'Data inserted successfully.';
    header("Location: index.php"); // Redirect to index.php
    exit;
} else {
    echo 'Error: ' . $connection->error;
}

?>