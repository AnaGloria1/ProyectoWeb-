<?php
session_start();
$mensaje = "";

function obtenerUnidadesEnStock($productoID, $pdo)
{
    try {
        // Preparar una consulta SQL para obtener las Unidades en Stock del producto con ID $productoID.
        $consulta = $pdo->prepare("SELECT Unidades_en_Stock FROM tblproductos WHERE ID = :productoID");

        // Vincular el parámetro del ID del producto
        $consulta->bindParam(':productoID', $productoID, PDO::PARAM_INT);

        // Ejecutar la consulta
        $consulta->execute();

        // Obtener el resultado
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró un resultado
        if ($resultado) {
            return $resultado['Unidades_en_Stock'];
        } else {
            return 0; // En caso de que no se encuentre el producto, se devuelve 0 unidades en stock.
        }
    } catch (PDOException $e) {
        return 0; // Manejar el error de manera apropiada para tu aplicación
    }
}

try {
    // Conecta a la base de datos
    $pdo = new PDO("mysql:dbname=" . BD . ";host=" . SERVIDOR, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Realiza una consulta SQL para obtener todos los productos
    $consulta = $pdo->query("SELECT ID FROM tblproductos");
    $productos = $consulta->fetchAll(PDO::FETCH_ASSOC);

    // Itera sobre la lista de productos y obtén las unidades en stock para cada uno
    foreach ($productos as $producto) {
        $productoID = $producto['ID'];
        $unidadesEnStock = obtenerUnidadesEnStock($productoID, $pdo);
        //echo "Unidades en stock para el producto con ID $productoID: $unidadesEnStock<br>";
    }
} catch (PDOException $e) {
    echo "Error en la conexión a la base de datos: " . $e->getMessage();
}


if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){

        case 'Agregar':
            if(is_numeric( openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje.="OK ID CORRECTO ".$ID."<br/>";

            }else{
                $mensaje.="ID Incorrecto".$ID."<br/>";
            }
            if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
                $mensaje.= "OK NOMBRE".$NOMBRE."<br/>";
                }else{ $mensaje.="Upps. Algo pasa con el nombre"."<br/>"; break;}

                if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                    $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
                    $mensaje.= "OK CANTIDAD".$CANTIDAD. "<br/>";
                }else{ $mensaje.="Upps. Algo pasa con la cantidad"."<br/>"; break;}

                if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                    $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
                    $mensaje.= "OK PRECIO".$PRECIO. "<br/>";
                }else{ $mensaje.="Upps. Algo pasa con el precio"."<br/>"; break;}
                
        if(!isset($_SESSION['carrito'])){

                $producto=array(
                    'id'=>$ID,
                    'nombre'=>$NOMBRE,
                    'cantidad'=>$CANTIDAD,
                    'precio'=>$PRECIO
                );
                $_SESSION['carrito'][0]=$producto;
                $mensaje = "Producto Agregado al Carrito"; 

            }else{

                $idProducto=array_column($_SESSION['carrito'],"id");
                $NumeroProductos=count($_SESSION['carrito']);
                if(in_array($ID,$idProducto)){

                
                echo "<script>alert('El producto ya ha sido seleccionado');</script>";
                $mensaje= "";
                }else{
                $producto=array(
                    'id'=>$ID,
                    'nombre'=>$NOMBRE,
                    'cantidad'=>$CANTIDAD,
                    'precio'=>$PRECIO
                    );
                $_SESSION['carrito'][$NumeroProductos]=$producto;
                $mensaje = "Producto Agregado al Carrito";
            }
        }

            //$mensaje= print_r( $_SESSION,true);
            

        break;

        case "Eliminar" :
            if(is_numeric( openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                foreach($_SESSION['carrito'] as $indice=>$producto){
                    if($producto['id']==$ID){
                        unset($_SESSION['carrito'][$indice]);

                    }
                }

            }else{
                $mensaje.="ID Incorrecto".$ID."<br/>";
            }
            break;

            case 'actualizarCantidad':
                if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                    $ID = openssl_decrypt($_POST['id'], COD, KEY);
    
                    // Llama a la función y pasa la conexión PDO como argumento.
                    $unidadesEnStock = obtenerUnidadesEnStock($ID, $pdo);
    
                    if (is_numeric($_POST['cantidad']) && $_POST['cantidad'] > 0 && $_POST['cantidad'] <= $unidadesEnStock) {
                        $NUEVA_CANTIDAD = $_POST['cantidad'];
                        foreach ($_SESSION['carrito'] as $indice => $producto) {
                            if ($producto['id'] == $ID) {
                                $_SESSION['carrito'][$indice]['cantidad'] = $NUEVA_CANTIDAD;
                                $mensaje = "Cantidad actualizada";
                            }
                        }
                    } else {
                        $mensaje = "La cantidad debe ser un número positivo y no exceder las unidades en stock ($unidadesEnStock unidades disponibles)";
                    }
                } else {
                    $mensaje = "ID incorrecto";
                }
            break;
        }
    }
    ?>
