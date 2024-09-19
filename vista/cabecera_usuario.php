<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
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


    <title>HAC</title>
</head>


<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img height="120" src="/Proyecto Web/imagenes/logo.jpeg" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index_usuario.php">Inicio<span class="sr-only">(current)</span></a>
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
              <a class="nav-link" href="../usuario/miperfil.php">Mi perfil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../vista/cerrarseccion.php">cerrar sesion</a>
            </li>
                </ul>
            </nav>
        </nav>
    </header>
    <section id="home" class="p-0">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100"
                        src="./imagenes/banner-venta-establecimiento-atencion-medica-degradado_23-2149670312.jpg"
                        alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./imagenes/ntro-medico-diseno-plano_23-2150122482 (1).jpg"
                        alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./imagenes/diseno-plantillas-sanitarias_23-2150742457 (1).jpg"
                        alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <!--banner -->

    <section class="our-webcoderskull padding-lg">
        <div class="container">
            <ul class="row">
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="/Proyecto Web/imagenes/747305.png" class="img-responsive" alt=""></figure>
                        <h3><a href="#">Compra segura </a></h3>
                        <p>Haz tus compras con absoluta confianza</p>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="/Proyecto Web/imagenes/245a4fdd2abb88b2fce9015d4aa1bc11-removebg-preview.png"
                                class="img-responsive" alt=""></figure>
                        <h3><a href="#">Envíos seguros</a></h3>
                        <p>Con un monto minimo adicional</p>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="/Proyecto Web/imagenes/2649359.png" class="img-responsive" alt=""></figure>
                        <h3><a href="#"> Monitorea tu pedido </a></h3>
                        <p>Gratis directamente en nuestra tienda</p>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="/Proyecto Web/imagenes/descargar.png" class="img-responsive" alt=""></figure>
                        <h3><a href="#">Calidad </a></h3>
                        <p>Productos de buena calidad</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>

   
