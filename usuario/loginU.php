<?php
session_start();
include '../controladores/conexion.php';

if (isset($_POST["submit"])) {
    // Lógica de inicio de sesión
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    try {
        $query = $pdo->prepare("SELECT * FROM usuario WHERE email = :correo");
        $query->bindParam(':correo', $correo);
        $query->execute();

        if ($query->rowCount() > 0) {
            $usuario = $query->fetch(PDO::FETCH_ASSOC);

            // Verifica la contraseña usando password_verify
            if (password_verify($contrasena, $usuario['contrasena'])) {
                $_SESSION['usuario'] = $correo;

                // Validar el rol y redirigir
                if ($usuario['id_cargo'] == 1) {
                    header("location: ../admin/index_admin.php"); // Ruta para administradores
                    exit;
                } elseif ($usuario['id_cargo'] == 2) {
                    header("location: ../usuario/index_usuario.php"); // Ruta para clientes
                    exit;
                } else {
                    // En caso de que haya más roles, agrega condiciones adicionales aquí
                    // header("location: otra_ruta.php");
                    // exit;
                }
            } else {
                echo '<script>alert("Contraseña incorrecta. Por favor, verifique los datos."); 
                window.location = "../vista/login.php";</script>';
               
                exit;
            }
        } else {
            echo '<script>alert("Usuario no existe. Por favor, verifique los datos.");
                window.location = "../vista/login.php";
            </script>';
            exit;
        }
    } catch (PDOException $e) {
        echo "Error al validar el login: " . $e->getMessage();
    }
}
?>