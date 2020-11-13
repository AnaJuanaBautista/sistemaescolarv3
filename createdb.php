<?php


$host='localhost';
$user = 'root';
$pass = 'camilaculofeo';
// Crear conexión
$conn = new mysqli($host, $user, $pass);
// VVerifica la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Crear base de datos
$sql = "CREATE DATABASE sistemaescolarv3";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully
            <br><br>";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>