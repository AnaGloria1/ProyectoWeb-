Se usó un 79% del almacenamiento … Si te quedas sin almacenamiento, no podrás crear, editar ni subir archivos. Obtén 100 GB de almacenamiento por $34.00 MXN 0 durante 1 mes.
<?php
include '../controladores/conexion.php';
include '../controladores/carritocom.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Pago</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="../assets/css/sobre nosotros.css">
    <link rel="stylesheet" href="../assets/css/card.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!--shop-->
    <link href="../assets/css/cuidadopersonal.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="../assets/css/cuidadopersonal.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="../assets/css/cuidadopersonal.css" /></head>

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
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="navbar-link" href="../vista/carrito.php">Carrito(<?php
                        echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);
                        ?>)</a>

                            </li>
                </ul>
            </nav>
        </nav>
    </header>
    
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<!-- Bloque para el proceso de pago -->
<style>
    
    /* Media query for mobile viewport */
    @media screen and (max-width: 400px) {
        #paypal-button-container {
            width: 100%;
        }
    }
    
    /* Media query for desktop viewport */
    @media screen and (min-width: 400px) {
        #paypal-button-container {
            width: 250px;
            display: inline-block;
        }
    }
    
</style>  
<div class="jumbotron text-center">
 
    <h1 class="display-4">¡Paso Final!</h1>
    <hr class="my-4">
    <p class="lead">Estás a punto de pagar con Paypal la cantidad:

    <h4>$ <?php
    if($_POST){
        $total=0;
        $ID=session_id();
        $Direccion=$_POST['direccion'];
    foreach($_SESSION['carrito'] as $indice=>$producto){
        $total=$total+($producto['precio']*$producto['cantidad']);
    }
    $sentencia = $pdo->prepare ("INSERT INTO `tblvantas` (`ID`, `ClaveTransaccion`, `Datos`, `Fecha`, `Direccion`, `Total`, `Status`)
     VALUES (NULL, :ClaveTransaccion, '',NOW(), :Direccion, :Total, 'pendiente');");
    
    $sentencia ->bindParam(":ClaveTransaccion",$ID);
    $sentencia ->bindParam(":Direccion",$Direccion);
    $sentencia ->bindParam(":Total",$total);
    $sentencia->execute();
    $idVenta=$pdo->lastInsertId();
 echo "<h3>".$total."</h3>";
}

    ?></h4>
    <div id="paypal-button-container"></div>
    <div id="smart-button-container">
           <div style="text-align: center;">
        <div id="paypal-button-container">
        <!--<button class="btn btn-lg btn-block" type="submit" name="btnAccion" value="Pagar" style="background-color: #FFD700; color: white;">Pagar</button> -->
        </div>
      </div>
    </div>
    </p>
    <p>Los productos serán procesados cuando el pago se valide <br/>
    <strong>(Para aclaraciones: delaros.anagloria@gmail.com)</strong>
    </p>
  </div>
  <script>
    paypal.Button.render({
        env: 'sandbox', // sandbox | production
        style: {
            label: 'checkout',  // checkout | credit | pay | buynow | generic
            size:  'responsive', // small | medium | large | responsive
            shape: 'pill',   // pill | rect
            color: 'gold'   // gold | blue | silver | black
        },
 
        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create
 
        client: {
            sandbox:    '',
            production: ''
        },
 
        // Wait for the PayPal button to be clicked
 
        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '0.01', currency: 'MXN' }, 
                            description:"Compra de productos a Develoteca:$0.01",
                            custom:"Codigo"
                        }
                    ]
                }
            });
        },
 
        // Wait for the payment to be authorized by the customer
 
        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                console.log(data);
                window.location="verificador.php?paymentToken="+data.paymentToken+"&paymentID="+data.paymentID;
            });
        }
    
    }, '#paypal-button-container');
 
</script>

      
  
   /* function initPayPalButton() {
    paypal. Buttons({
    style: {
    size: 'resnponsive',
    shape: 'pill',
    color: 'gold',
    layout: 'vertical',
    label: 'checkout',
    },

   payment: function(data, actions) {
    return actions.payment.create({
        payment: {
    transactions: [{description: "Productos el autogol:$<?php echo number_format($total,2);?>",
            amount: {total: '<?php echo $total;?>',
            custom: "<?php echo $claveTransaccion;?>#<?php echo openssl_encrypt($idVenta,COD,KEY);?>",
            currency:"MXN",}
                
            }
        ] 
        }
        });
    },
    
    createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            description: "Productos el autogol: $<?php echo number_format($total, 2); ?>",
            amount: {
              value: '<?php echo $total; ?>',
              currency_code: 'MXN'
            },
          }]
        });
      },
      onAuthorize: function(data, actions) {
        return actions.order.capture().then(function(details) {
          console.log(details); // Detalles de la transacción
          // Redirigir a la página de agradecimiento o realizar otras acciones después del pago
          window.location.href = 'equipos.php';
        });
      },
      onError: function(err) {
  console.error('Error en el pago:', err);
  alert('Ocurrió un error durante el proceso de pago. Por favor, inténtalo de nuevo.');
}

    }).render('#paypal-button-container');
    }
    initPayPalButton();*/
    </script>
    <script>
    // Lógica PHP para definir valores y variables necesarias
    const total = <?php echo json_encode($total); ?>;
    const claveTransaccion = "<?php echo $claveTransaccion; ?>";
    const idVenta = "<?php echo openssl_encrypt($idVenta, COD, KEY); ?>";

    // Llamada a la función initPayPalButton después de cargar paypal.js
    initPayPalButton(total, claveTransaccion, idVenta);
  </script>
</body>
</html>


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
