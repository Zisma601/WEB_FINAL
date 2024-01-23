<?php
// Conexión a la base de datos 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$affair = isset($_POST['affair']) ? $_POST['affair'] : ''; // Permitir campo de empresa vacío
$message = $_POST['message'];

// Validar que los campos requeridos no estén vacíos
if (empty($fullname) || empty($email) || empty($phone) || empty($message)) {
    die("Error: Todos los campos son obligatorios, excepto el de la empresa.");
}

// Insertar datos en la base de datos
$sql = "INSERT INTO contacto (nombre_completo, email, telefono, nombre_empresa, mensaje)
        VALUES ('$fullname', '$email', '$phone', '$affair', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Datos insertados correctamente";
} else {
    echo "Error al insertar datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
