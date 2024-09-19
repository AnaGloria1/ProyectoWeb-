<?php
include '../controladores/conexion.php';

function limpiarInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["register_submit"])) {
    // Eliminamos la verificación de reCAPTCHA

    // Lógica de registro
    $usuario = limpiarInput($_POST['username']);
    $correo = limpiarInput($_POST['email']);
    $contrasena = password_hash(limpiarInput($_POST['contrasena']), PASSWORD_DEFAULT);
    $nombre = limpiarInput($_POST['nombre']);
    $apellidos = limpiarInput($_POST['apellidos']);  // Corregí el nombre de la variable aquí

    // Validar el formato del correo electrónico usando filter_var
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "El formato del correo electrónico es inválido.";
    } else {
        try {
            // Verificar si el correo ya existe
            $verificar_correo = $pdo->prepare("SELECT * FROM usuario WHERE email = :correo");
            $verificar_correo->bindParam(':correo', $correo);
            $verificar_correo->execute();

            // Verificar si el nombre de usuario ya existe
            $verificar_usuario = $pdo->prepare("SELECT * FROM usuario WHERE username = :usuario");
            $verificar_usuario->bindParam(':usuario', $usuario);
            $verificar_usuario->execute();

            if ($verificar_correo->rowCount() > 0) {
                echo "El correo ya está registrado. Por favor, elija otro correo.";
            } elseif ($verificar_usuario->rowCount() > 0) {
                echo "El nombre de usuario ya está en uso. Por favor, elija otro nombre de usuario.";
            } else {
                // El correo y el nombre de usuario no existen, proceder a registrar el usuario
                $query = $pdo->prepare("INSERT INTO usuario (username, email, contrasena, nombre, apellidos) 
                VALUES (:usuario, :correo,:contrasena, :nombre ,:apellidos)");
                
                $query->bindParam(':usuario', $usuario);
                $query->bindParam(':correo', $correo);
                $query->bindParam(':contrasena', $contrasena);
                $query->bindParam(':nombre', $nombre);
                $query->bindParam(':apellidos', $apellidos);

                if ($query->execute()) {
                    echo '<script> window.location = "index_usuario.php"; </script>';
                } else {
                    echo "Error al registrar el usuario.";
                }
            }
        } catch (PDOException $e) {
            echo "Error al registrar el usuario: " . $e->getMessage();
        }
    }
}
?>
