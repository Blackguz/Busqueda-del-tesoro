<?php
$servername = "db";
$username = "admin";
$password = "admin_password";
$dbname = "desafio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: index.php");
} else {
    echo "Usuario o contraseña incorrectos";
}

$conn->close();
?>
