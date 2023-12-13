<?php 
require_once('../controladores/conexion.php');
include '../controladores/carritocom.php';
$mensaje = "";
function actualizarUnidadesEnStock($productoID, $cantidad1, $pdo) {
    try {
        $pdo->beginTransaction();
        $stmt = $pdo->prepare("UPDATE tblproductos SET Unidades_en_Stock = Unidades_en _Stock - :cantidad WHERE ID = :productoID");
        $stmt->bindParam(':cantidad', $cantidad1, PDO::PARAM_INT);
        $stmt->bindParam(':productoID', $productoID, PDO::PARAM_INT);
        $stmt->execute();
        $pdo->commit();
        return true;
    } catch (PDOException $e) {
        $pdo->rollBack();
        return false;
    }
}
if (isset($_POST['btnAccion']) && $_POST['btnAccion'] == 'Pagar' && !empty($_SESSION['carrito'])) {
    try {
        $pdo = new PDO("mysql:dbname=" . BD . ";host=" . SERVIDOR, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $total = 0;
        $claveTransaccion = md5(uniqid());
        foreach ($_SESSION['carrito'] as $producto) {
            $total = $total + ($producto['precio'] * $producto['cantidad']);
        }
        $direccion = $_POST['direccion'];
        // Inserta los datos de la venta en la tabla de ventas
        $fecha = date("Y-m-d H:i:s");
        $status = "procesando"; // Puedes definir el estado de la venta
        $sentencia = $pdo->prepare("INSERT INTO tblvantas (ClaveTransaccion, Fecha, Direccion, Total, Status, Datos) VALUES (?, ?, ?, ?, ?, ?)");
        $sentencia->execute([$claveTransaccion, $fecha, $total, $status, $correo]);
        $idVenta = $pdo->lastInsertId(); // Obtén el ID de la venta insertada
        // Inserta los detalles de la venta en la tabla de ventas_detalle
        foreach ($_SESSION['carrito'] as $producto) {
            $idProducto = $producto['id'];
            $precioUnitario = $producto['precio'];
            $cantidad1 = $producto['cantidad'];
            $sentencia = $pdo->prepare("INSERT INTO ventas_detalle (id_ventas, id_productos, precio_Unitario, cantidad) VALUES (?, ?, ?, ?)");
            $sentencia->execute([$idVenta, $idProducto, $precioUnitario, $cantidad1]);
        }
        $actualizacionesExitosas = true;
        foreach ($_SESSION['carrito'] as $producto) {
            $productoID = $producto['id'];
            $cantidad1 = $producto['cantidad'];
            $actualizacionesExitosas = $actualizacionesExitosas && actualizarUnidadesEnStock($productoID, $cantidad1, $pdo);
        }
        if ($actualizacionesExitosas) {
            $correoDestino = $_SESSION['usuario'];
            $cuerpo = 'Gracias por tu compra. Aquí están los detalles:';
            $cuerpo .= '<ul>';
            foreach ($_SESSION['carrito'] as $producto) {
                $cuerpo .= '<li>Producto: ' . $producto['nombre'] . ' - Cantidad: ' . $producto['cantidad'] . ' - Precio Unitario: ' . $producto['precio'] . '</li>';
            }
            $cuerpo .= '</ul>';
    
            unset($_SESSION['carrito']);
            $mensaje = "Productos comprados con éxito.";

            $header = "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html; charset=UTF-8\r\n";
            $header .= "From: Camisetas AutoGol <peyeale7@gmail.com>\r\n"; 

            if (mail($correoDestino, 'Detalles de tu compra', $cuerpo, $header)) {
                header("Location: carrito.php?mensaje=" . urlencode("Productos comprados con éxito. Se ha enviado un correo con los detalles de la compra."));
                exit;
            } else {
                header("Location:carrito.php?mensaje=" . urlencode("Error al enviar el correo."));
                exit;
            }
        } else {
            $mensaje = "Error al actualizar las unidades en stock.";
            header("Location: carrito.php?mensaje=" . urlencode($mensaje));
            exit;
        }
    } catch (PDOException $e) {
        echo "Error en la transacción: " . $e->getMessage();
    }
} else {
    header("Location: carrito.php");
    exit;
}
?>