<?php
session_start();
if (!isset($_SESSION["usuario"])){
    echo '<script>
        alert("Acceso de Negado");
        window.location = "../vistas/login.php";
    </script>';
    session_destroy();
    die();
}
?>
<?php 
include '../controladores/conexion.php';

$usuario = $_SESSION["usuario"];

try {
    $pdo = new PDO("mysql:dbname=" . BD . ";host=" . SERVIDOR, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consultar el ID del rol de administrador desde tblcargo
    $queryRolAdmin = $pdo->prepare("SELECT id_cargo FROM cargo WHERE rol = 'Administrador'");
    $queryRolAdmin->execute();
    $idRolAdmin = $queryRolAdmin->fetchColumn();

    // Consultar el ID del rol del usuario desde tblusuarios
    $queryRolUsuario = $pdo->prepare("SELECT id_cargo FROM usuario WHERE id_cargo = :usuario");
    $queryRolUsuario->bindParam(':usuario', $usuario);
    $queryRolUsuario->execute();
    $idRolUsuario = $queryRolUsuario->fetchColumn();

    // Verificar si el usuario tiene el rol de administrador (id_cargoo = 1)
    if ($idRolUsuario != $idRolAdmin) {
        echo '<script>
            alert("No tienes permisos para acceder a esta página");
            window.location = "../usuario/index_usuario.php"; // Ruta a la página a la que quieres redirigir si no es administrador
        </script>';
        die();
    }

?>
<?php
include './carritoA.php';
// una consulta SQL para obtener la lista de productos desde la base de datos
$sql = "SELECT * FROM tblproductos";
$result = $pdo->query($sql);
$products = $result->fetchAll(PDO::FETCH_ASSOC);
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


    <title>Farmacia La Divina Providencia</title>
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

    <h1>Lista de Productos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) { ?>
                <tr>
                    <td><?php echo $product['ID']; ?></td>
                    <td><?php echo $product['Nombre']; ?></td>
                    <td>
                        <a href="delete.php?id=<?php echo $product['ID']; ?>" class="btn-eliminar">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <footer id="dk-footer" class="dk-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="dk-footer-box-info">
                        <p class="footer-info-text">
                            Reference site about Lorem Ipsum, giving information on its origins, as well as a random
                            Lipsum generator.
                        </p>
                        <div class="footer-social-link">
                            <h3>Follow us</h3>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Social link -->
                    </div>
                    <!-- End Footer info -->
                    <div class="footer-awarad">
                        <img src="images/icon/best.png" alt="">
                        <p>Best Design Company 2023</p>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-12 col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-us">
                                <div class="contact-icon">
                                    <i class="fa fa-map-o" aria-hidden="true"></i>
                                </div>
                                <!-- End contact Icon -->
                                <div class="contact-info">
                                    <h3>Celaya Gto</h3>
                                    <p>445 campanario</p>
                                </div>
                                <!-- End Contact Info -->
                            </div>
                            <!-- End Contact Us -->
                        </div>
                        <!-- End Col -->
                        <div class="col-md-6">
                            <div class="contact-us contact-us-last">
                                <div class="contact-icon">
                                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                </div>
                                <!-- End contact Icon -->
                                <div class="contact-info">
                                    <h3>461 225 44 60</h3>
                                    <p>Give us a call</p>
                                </div>
                                <!-- End Contact Info -->
                            </div>
                            <!-- End Contact Us -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Contact Row -->
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="footer-widget footer-left-widget">
                                <div class="section-heading">
                                    <h3>Nosotros</h3>
                                    <span class="animate-border border-black"></span>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#">¿quienes somos?</a>
                                    </li>
                                    <li>
                                        <a href="#">Services</a>
                                    </li>
                                    <li>
                                        <a href="./vista/contacto.php">Contact us</a>
                                    </li>

                                </ul>
                            </div>
                            <!-- End Footer Widget -->
                        </div>
                        <!-- End col -->
                        <div class="col-md-12 col-lg-6">
                            <div class="footer-widget">
                                <div class="section-heading">
                                    <h3>Subscribe</h3>
                                    <span class="animate-border border-black"></span>
                                </div>
                                <p><!-- Don’t miss to subscribe to our new feeds, kindly fill the form below. -->
                                    Reference site about Lorem Ipsum, giving information on its origins, as well.</p>
                                <form action="#">
                                    <div class="form-row">
                                        <div class="col dk-footer-form">
                                            <input type="email" class="form-control" placeholder="Email Address">
                                            <button type="submit">
                                                <i class="fa fa-send"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- End form -->
                            </div>
                            <!-- End footer widget -->
                   c     </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Widget Row -->
        </div>
        <!-- End Contact Container -->


        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span>Copyright © 2023,Farmacia la Divina Providencia</span>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6">
                        <div class="copyright-menu">
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>
                                    <a href="#">Terms</a>
                                </li>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="./vista/contacto.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Copyright Container -->
        </div>
        <!-- End Copyright -->
        <!-- Back to top -->
        <div id="back-to-top" class="back-to-top">
            <button class="btn btn-dark" title="Back to Top" style="display: block;">
                <i class="fa fa-angle-up"></i>
            </button>
        </div>
        <!-- End Back to top -->
    </footer>
</body>
</html>
<?php
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>