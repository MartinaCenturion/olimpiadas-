<?php
$servername = "localhost"; // O el nombre del servidor
$username = "root"; // O el nombre de usuario de tu base de datos
$password = ""; // O la contraseña de tu base de datos
$database = "tienda_deporte";

$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
