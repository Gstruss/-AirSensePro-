<?php
$servername = "db4free.net";
$username = "gstruss";
$password = "a97c20ca";
$dbname = "airsenseprodddg";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Ingresar correo y clave
$correo = $_POST['correo'];
$clave = $_POST['contrasena'];

// Preparar sentencia SQL con parámetros
$stmt = $conn->prepare("INSERT INTO usuarios (correo, contrasena) VALUES (?, ?)");
$stmt->bind_param("ss", $correo, $clave);

// Ejecutar sentencia SQL
if ($stmt->execute()) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
