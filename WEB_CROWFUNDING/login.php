<?php

session_start();


include('config.php');

// Datos de conexión a la base de datos
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "register"; 

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Obtener el nombre de usuario y contraseña del formulario
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Preparar consulta para evitar inyecciones SQL
    $stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    echo $result->num_rows;

    if ($result->num_rows == 1) {
        // Obtener datos del usuario
        $user = $result->fetch_assoc();

        // Verificar la contraseña contra el hash almacenado

        if (password_verify($password, $user['password'])) {
            // Contraseña correcta, establecer variables de sesión y redirigir
            $_SESSION['name'] = $username;
            header("location: nosotros.html");
            exit;
        } else {
            // Contraseña incorrecta
            echo "Nombre de usuario o contraseña incorrectos 1.";
        }
    } else {
        // Usuario no encontrado
        echo "Nombre de usuario o contraseña incorrectos.2";
    }

    // Cerrar conexión
    $stmt->close();
    $conn->close();
    
}
?>
