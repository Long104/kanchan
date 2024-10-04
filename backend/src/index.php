<?php
$server = "db";  
$user = "myuser";
$password = "mypassword";
$database = "mydatabase";


$connection = new mysqli($server, $user, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "select * from users";
$result = $connection->query($sql);

if (!$result) {
    die("error: " . $connection->error);
}

while ($row = $result->fetch_assoc()) {
    echo "username: " . $row["username"] . " - email: " . $row["email"] . "<br>";
}

