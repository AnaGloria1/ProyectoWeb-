<?php
session_start();
require_once ( '../controladores/conexion.php');
include '../admin/carritoA.php';


// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vistas/login.php");
    exit;
}

// Obtiene el correo electrónico del usuario de la sesión
$correo = $_SESSION['usuario'];

try {
    // Realiza una consulta para obtener los datos del usuario a partir del correo electrónico
    $query = $pdo->prepare("SELECT * FROM usuario WHERE correo = :correo");
    $query->bindParam(':correo', $correo);
    $query->execute();

    // Verifica si se encontraron resultados
    if ($query->rowCount() > 0) {
        // Obtiene los datos del usuario
        $usuario = $query->fetch(PDO::FETCH_ASSOC);

        // Verifica si se ha enviado el formulario de actualización del código postal
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            // Obtiene el nuevo código postal del formulario
            $nuevo_codigo_postal = $_POST['codigo_postal'];

            // Actualiza el código postal en la base de datos
            $update_query = $pdo->prepare("UPDATE usuarios SET codigo_postal = :nuevo_codigo_postal WHERE correo = :correo");
            $update_query->bindParam(':nuevo_codigo_postal', $nuevo_codigo_postal);
            $update_query->bindParam(':correo', $correo);
            $update_query->execute();

            if ($update_query->rowCount() > 0) {
                echo "Código postal actualizado correctamente.";
                // Actualiza el valor en la sesión actual
                $usuario['codigo_postal'] = $nuevo_codigo_postal;
            } else {
                echo "No se pudo actualizar el código postal.";
            }
        }
} else {
        echo "Usuario no encontrado.";
    }
} catch (PDOException $e) {
    echo "Error al obtener información del usuario: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="./assets/css/estilos.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/cuidadopersonal.css">
    <link rel="stylesheet" href="./assets/css/contacto.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">
    <link href="./assets/css/carousel.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!--carrito-->


    <title>Mi perfil</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img height="120" src="/Proyecto Web/imagenes/descargar-removebg-preview.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Inicio<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            Categorias
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/Proyecto Web/vista/medicamentos.php">Medicamentos</a>
                            <a class="dropdown-item" href="/Proyecto Web/vista/EquipoMedico.php">Equipo Medico</a>
                            <a class="dropdown-item" href="/Proyecto Web/vista/vitaminas.php">Vitaminas</a>
                            <a class="dropdown-item" href="/Proyecto Web/vista/CuidadoPesonal.php">cuidado Personal</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            Sobre Nosotros
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/Proyecto Web/vista/sobre_nosotros.php">Mission,Vision,Valores</a>
                            <a class="dropdown-item" href="/Proyecto Web/vista/location.php">Ubicacion</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            Actualizar
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/Proyecto Web/vista/sobre_nosotros.php">Agregar</a>
                            <a class="dropdown-item" href="/Proyecto Web/vista/location.php">Editar</a>
                            <a class="dropdown-item" href="/Proyecto Web/vista/location.php">Eliminar</a>
                            <a class="dropdown-item" href="/Proyecto Web/vista/location.php">Graficas</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                        <a class="btn btn-primary btn-sm me-2" href="./vista/carrito.php">Carrito(<?php
                        echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);
                        ?>)</a>
                            </li>
                            <li class="nav-item">
              <a class="nav-link" href="../vistas/miperfil.php">Mi perfil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../vistas/cerrarsesion.php">cerrar sesion</a>
            </li>
                </ul>
            </nav>
        </nav>
    </header>
    <section class="container">
    <div class="perfil-container">
        <h1>Mi Perfil</h1>
        <div class="info">
            <label>Nombre:</label>
            <span><?php echo $usuario['nombre']; ?></span>
        </div>
        <div class="info">
            <label>Apellidos:</label>
            <span><?php echo $usuario['apellidos']; ?></span>
        </div>
        <div class="info">
            <label>Correo Electrónico:</label>
            <span><?php echo $usuario['correo']; ?></span>
        </div>
        <div class="info">
            <label>Usuario:</label>
            <span><?php echo $usuario['usuario']; ?></span>
        </div>
        <form method="POST" action="">
                <div class="info">
                    <label>Código Postal:</label>
                    <span>
                        <input type="text" name="codigo_postal" value="<?php echo $usuario['codigo_postal']; ?>">
                    </span>
                </div>
                <div class="info">
                    <input type="submit" name="submit" value="Actualizar Código Postal">
                </div>
                <div class="info">
         <a href="generar_pdf.php" target="_blank" class="btn btn-primary">Descargar Historial de Compras en PDF</a>
</div>
        </form>
</div>  
        <!-- Puedes mostrar más información aquí según tu base de datos -->
        <!-- Agrega más campos HTML según sea necesario -->
    </div>
</body>
</html>
