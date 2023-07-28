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
        <h2>List of Clients</h2>
        <a class="btn btn-primary my-4" role="button" href="/myshop/create.php">New Client</a>
        <br>
        <table class="table my-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $server = "localhost";
                $username = "root";
                $password = "";
                $database = "myshop";

                $connection = new mysqli($server, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection Failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid Query: " . $connection->error);
                }

                $rows = array(); // Array to store table rows
                
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row; // Add each row to the array
                }

                // Output the array in reverse order
                for ($i = count($rows) - 1; $i >= 0; $i--) {
                    echo "
        <tr>
            <td>{$rows[$i]['id']}</td>
            <td>{$rows[$i]['name']}</td>
            <td>{$rows[$i]['email']}</td>
            <td>{$rows[$i]['phone']}</td>
            <td>{$rows[$i]['address']}</td>
            <td>{$rows[$i]['created_at']}</td>
            <td>
                <a class='btn btn-primary btn-sm' href='/myshop/edit.php?id={$rows[$i]['id']}'>Edit</a>
                <a class='btn btn-danger btn-sm' href='/myshop/delete.php?id={$rows[$i]['id']}'>Delete</a>
            </td>
        </tr>
    ";
                }
                ?>


            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>