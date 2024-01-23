<?php
session_start();

// Configuración de conexión a la base de datos
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "register";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}
echo "Verificnado";
if(isset($_SESSION['name']) ) {
    echo "Verificnado";
    $usernameFromForm = $_POST['username'];
    $amount = $_POST['amount'];
    $paymentMethod = $_POST['payment-method'];

    

    if($usernameFromForm == $_SESSION['name']){
        // Preparar la sentencia SQL para insertar los datos
        $stmt = $conn->prepare("INSERT INTO donacion (usuario, Cantidad, MetodoPago) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $usernameFromForm, $amount, $paymentMethod);

        // Ejecutar la sentencia
        if($stmt->execute()) {
            echo "Donación procesada para el usuario: " . $_SESSION['name'];
           
        } else {
            echo "Error al procesar la donación: " . $stmt->error;
        }

        // Cerrar la sentencia y la conexión
        $stmt->close();
        $conn->close();
    } else {
        echo "El usuario no coincide o no está logueado.";
    }
} else {
    echo "Usuario no establecido o sesión no iniciada.";
}
?>
