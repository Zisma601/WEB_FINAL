<?php
$servername = "localhost";
$username = "root"; 
$dbname = "register";
$password = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $conn = new mysqli($servername, $username, $password, $dbname);

  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

  
    $sql_check_email = "SELECT id FROM usuarios WHERE email = ?";
    if ($stmt_check_email = $conn->prepare($sql_check_email)) {
        $stmt_check_email->bind_param("s", $param_email_check);
        $param_email_check = $email;
        $stmt_check_email->execute();
        $stmt_check_email->store_result();

        if ($stmt_check_email->num_rows == 0) {
        

            
            $sql_check_name = "SELECT id FROM usuarios WHERE name = ?";
            if ($stmt_check_name = $conn->prepare($sql_check_name)) {
                $stmt_check_name->bind_param("s", $param_name_check);
                $param_name_check = $name;
                $stmt_check_name->execute();
                $stmt_check_name->store_result();

                if ($stmt_check_name->num_rows == 0) {
                
                    $stmt_check_name->close();

              
                    $sql_insert = "INSERT INTO usuarios (name, email, password) VALUES (?, ?, ?)";
                    if ($stmt = $conn->prepare($sql_insert)) {
                        
                        $stmt->bind_param("sss", $param_name, $param_email, $param_password);

                 
                        $param_name = $name;
                        $param_email = $email;
                        $param_password = password_hash($password, PASSWORD_DEFAULT);

                        if ($stmt->execute()) {
                            header("Location: login.html");
                            exit();
                        } else {
                            echo "ERROR: Could not execute query: $sql_insert. " . $conn->error;
                        }
                    } else {
                        echo "ERROR: Could not prepare query: $sql_insert. " . $conn->error;
                    }

                  
                    $stmt->close();
                } else {
                    
                    echo "ERROR: Name is already registered.";
                }
            } else {
                echo "ERROR: Could not prepare query: $sql_check_name. " . $conn->error;
            }
        } else {
          
            echo "ERROR: Email is already registered.";
        }
    } else {
        echo "ERROR: Could not prepare query: $sql_check_email. " . $conn->error;
    }

    
    $conn->close();
} else {
    
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>
