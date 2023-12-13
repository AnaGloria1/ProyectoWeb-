<?php 
if (session_status() === PHP_SESSION_NONE) {
    // Solo llama a session_start() si no hay una sesión activa
    session_start();
}

require_once('../modelos/conexion.php');
$mensaje = "";
function obtenerUnidadesEnStock($productoID, $pdo) {
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

            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje.="OK ID correcto".$ID."<br/>";
            } else {
                $mensaje.="upps ID incorrecto".$ID."<br/>";
            }
            if(is_string(openssl_decrypt($_POST['Nombre'],COD,KEY))){
                $NOMBRE=openssl_decrypt($_POST['Nombre'],COD,KEY);
                $mensaje.="OK Nombre".$NOMBRE."<br/>";
            } else {
                $mensaje.="upps nombre incorrecto"."<br/>" ; break;
            }
            if(is_numeric(openssl_decrypt($_POST['Cantidad'],COD,KEY))){
                $CANTIDAD=openssl_decrypt($_POST['Cantidad'],COD,KEY);
                $mensaje.="OK Cantidad".$CANTIDAD."<br/>";
            } else {
                $mensaje.="upps cantidad incorrecto"."<br/>" ; break;
            }
            if(is_numeric(openssl_decrypt($_POST['Precio'],COD,KEY))){
                $PRECIO=openssl_decrypt($_POST['Precio'],COD,KEY);
                $mensaje.="OK precio".$PRECIO."<br/>";
            } else {
                $mensaje.="upps Precio incorrecto"."<br/>" ; break;
            }
            if(!isset($_SESSION['carrito'])){
                $producto=array(
                    'ID'=>$ID,
                    'nombre'=>$NOMBRE,
                    'cantidad'=>$CANTIDAD,
                    'precio'=>$PRECIO,
                   
                );
                $_SESSION['carrito'][0]=$producto;
                $mensaje="Producto agregado al carrito";
            }else{
                $idProductos=array_column($_SESSION['carrito'],'ID');
                if(in_array($ID,$idProductos)){
                    echo "<script>alert('El producto ya ha sido seleccionado');</script>";
                    $mensaje=" ";

                } else{

                $NumeroProductos=count($_SESSION['carrito']);
                $producto=array(
                    'ID'=>$ID,
                    'nombre'=>$NOMBRE,
                    'cantidad'=>$CANTIDAD,
                    'precio'=>$PRECIO,
                   
                );
                $_SESSION['carrito'][$NumeroProductos]=$producto;
                    $mensaje="Producto agregado al carrito";
                }
            }
            //$mensaje.=print_r($_SESSION,true);
         
        break;
        case "Eliminar":
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                foreach($_SESSION['carrito']as $indice=>$producto){
                    if($producto['ID']==$ID){
                        unset($_SESSION['carrito'][$indice]);
                        echo "<script>alert('Elemento borrado');</script>";
                    }
                }
            } else{
                $mensaje.="ups ID incorrecto".$ID."<br/>";
            }
            break;
            case "Editar":
    if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
        $ID = openssl_decrypt($_POST['id'], COD, KEY);

        // Llama a la función y pasa la conexión PDO como argumento.
        $unidadesEnStock = obtenerUnidadesEnStock($ID, $pdo);

        if (is_numeric($_POST['Cantidad']) && $_POST['Cantidad'] > 0 && $_POST['Cantidad'] <= $unidadesEnStock) {
            $NUEVA_CANTIDAD = $_POST['Cantidad'];
            foreach ($_SESSION['carrito'] as $indice => $producto) {
                if ($producto['ID'] == $ID) {
                    $_SESSION['carrito'][$indice]['cantidad'] = $NUEVA_CANTIDAD;
                    $mensaje = "Cantidad actualizada";
                }
            }
        } else {
            
           echo "<script>alert('La cantidad debe ser un número positivo y no exceder las unidades en st($unidadesEnStock unidades disponibles)');</script>";

            $mensaje=" ";
        }
    } else {
        $mensaje = "ID incorrecto";
    }
    break;
    }
}
?>