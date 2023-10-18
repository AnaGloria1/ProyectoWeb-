<?php
include '../controladores/conexion.php';
include '../controladores/carritocom.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/cuidadopersonal.css">
    <link rel="stylesheet" href="../assets/css/card.css">
    <!--card-->
    <!--shop-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
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
                        <a class="nav-link" href="../index.php">Inicio <span class="sr-only">(current)</span></a>
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
        </nav>
    </header>

    <!--carrito--->
    
    <div class="cart-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main-heading">Carrito de Compras</div>
                    <div class="table-cart">

                        <table>
                            <thead>
                                <tr>
                                    <th>Productos</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="display-flex align-center">
                                            <div class="img-product">
                                                <img src="https://www.91-img.com/pictures/laptops/asus/asus-x552cl-sx019d-core-i3-3rd-gen-4-gb-500-gb-dos-1-gb-61721-large-1.jpg"
                                                    alt="" class="mCS_img_loaded">
                                            </div>
                                            <div class="name-product">
                                                Apple iPad Mini
                                                <br>G2356
                                            </div>
                                            <div class="price">
                                                $1,250.00
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-count">
                                        <form action="#" class="count-inlineflex">
                                            <div class="qtyminus">-</div>
                                            <input type="text" name="quantity" value="1" class="qty">
                                            <div class="qtyplus">+</div>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="total">
                                            $6,250.00
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" title="">
                                            <img src="images/icons/delete.png" alt="" class="mCS_img_loaded">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="display-flex align-center">
                                            <div class="img-product">
                                                <img src="https://www.91-img.com/pictures/laptops/asus/asus-x552cl-sx019d-core-i3-3rd-gen-4-gb-500-gb-dos-1-gb-61721-large-1.jpg"
                                                    alt="" class="mCS_img_loaded">
                                            </div>
                                            <div class="name-product">
                                                Apple iPad Mini
                                                <br>G2356
                                            </div>
                                            <div class="price">
                                                $1,250.00
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-count">
                                        <form action="#" class="count-inlineflex">
                                            <div class="qtyminus">-</div>
                                            <input type="text" name="quantity" value="1" class="qty">
                                            <div class="qtyplus">+</div>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="total">
                                            $6,250.00
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" title="">
                                            <img src="images/icons/delete.png" alt="" class="mCS_img_loaded">
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="coupon-box">
                            <form action="#" method="get" accept-charset="utf-8">
                                <div class="coupon-input">
                                    <input type="text" name="coupon code" placeholder="Coupon Code">
                                    <button type="submit" class="round-black-btn">Apply Coupon</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.table-cart -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="cart-totals">
                        <h3>Total en el Carrito</h3>
                        <form action="#" method="get" accept-charset="utf-8">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="subtotal">$2,589.00</td>
                                    </tr>
                                    <tr>
                                        <td>Envio</td>
                                        <td class="free-shipping">Envio Gratis</td>
                                    </tr>
                                    <tr class="total-row">
                                        <td>Total</td>
                                        <td class="price-total">$1,591.00</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="btn-cart-totals">
                                <a href="#" class="update round-black-btn" title="">Actualizar Carrito</a>
                                <a href="#" class="checkout round-black-btn" title="">Proceed to Checkout</a>
                            </div>
                            <!-- /.btn-cart-totals -->
                        </form>
                        <!-- /form -->
                    </div>
                    <!-- /.cart-totals -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


    <!------ Footer ---------->
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
                                        <a href="#">Servicios</a>
                                    </li>
                                    <li>
                                        <a href="#">Contactanos</a>
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
                        </div>
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