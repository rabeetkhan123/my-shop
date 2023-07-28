<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'myshop';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id = $_GET['id'];
    $connection = new mysqli($hostname, $username, $password, $database);

    if ($connection->connect_error) {
        die('Connection failed: ' . $connection->connect_error);
    }

    $sql = "SELECT * FROM clients WHERE id=$id";
    $result = $connection->query($sql);

    $row = $result->fetch_assoc();

    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];

} else {

    // second section

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $id = $_GET['id'];
    $connection = new mysqli($hostname, $username, $password, $database);

    if ($connection->connect_error) {
        die('Connection failed: ' . $connection->connect_error);
    }

    $query = "UPDATE clients SET name = '$name', email='$email', phone='$phone', address='$address' WHERE id=$id";

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>My Shop</title>
</head>

<body>

    <div class="container my-5">
        <h2 class="my-5">Edit Client</h2>
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1" value='<?php echo $name ?>'>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputPassword1"
                    value='<?php echo $email ?>'>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone</label>
                <input name="phone" type="text" class="form-control" id="exampleInputPassword1"
                    value='<?php echo $phone ?>'>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Address</label>
                <input name="address" type="text" class="form-control" id="exampleInputPassword1"
                    value='<?php echo $address ?>'>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/myshop//index.php" class="btn btn-primary">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>