<?php 
//session_start();
require_once('../modelos/conexion.php');
include '../admin/<carritoA.php';
$mensaje = "";
function actualizarUnidadesEnStock($productoID, $cantidad, $pdo) {
    try {
        // Comienza una transacción
        $pdo->beginTransaction();
        // Actualiza las unidades en stock restando la cantidad comprada
        $stmt = $pdo->prepare("UPDATE tblproductos SET Unidades_en_Stock = Unidades_en_Stock - :cantidad WHERE ID = :productoID");
        $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(':productoID', $productoID, PDO::PARAM_INT);
        $stmt->execute();
        // Realiza el commit para confirmar los cambios en la base de datos
        $pdo->commit();
        return true;
    } catch (PDOException $e) {
        // En caso de error, realiza un rollback para deshacer los cambios y muestra un mensaje de error
        $pdo->rollBack();
        return false;
    }
}
if (isset($_POST['btnAccion']) && $_POST['btnAccion'] == 'Pagar' && !empty($_SESSION['carrito'])) {
    try {
        $pdo = new PDO("mysql:dbname=" . BD . ";host=" . SERVIDOR, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $total = 0;
        // Genera una clave de transacción única
        $claveTransaccion = md5(uniqid());
        foreach ($_SESSION['carrito'] as $producto) {
            $total = $total + ($producto['precio'] * $producto['cantidad']);
        }
        $direccion = $_POST['direccion'];
        // Inserta los datos de la venta en la tabla de ventas
        $fecha = date("Y-m-d H:i:s");
        $status = "procesando"; // Puedes definir el estado de la venta
        $sentencia = $pdo->prepare("INSERT INTO tblvantas (ClaveTransaccion, Fecha, direccion, Total, Status) VALUES (?, ?, ?, ?, ?)");
        $sentencia->execute([$claveTransaccion, $fecha, $total,$direccion, $status]);
        $idVenta = $pdo->lastInsertId(); // Obtén el ID de la venta insertada
        // Inserta los detalles de la venta en la tabla de ventas_detalle
        foreach ($_SESSION['carrito'] as $producto) {
            $idProducto = $producto['ID'];
            $precioUnitario = $producto['precio'];
            $cantidad = $producto['cantidad'];
            $sentencia = $pdo->prepare("INSERT INTO ventas_detalle (id_ventas, id_productos, precioUnitario, cantidad) VALUES (?, ?, ?, ?)");
            $sentencia->execute([$idVenta, $idProducto, $precioUnitario, $cantidad]);
        }
        $actualizacionesExitosas = true;
        foreach ($_SESSION['carrito'] as $producto) {
            $productoID = $producto['ID'];
            $cantidad = $producto['cantidad'];
            // Actualiza las unidades en stock para cada producto
            $actualizacionesExitosas = $actualizacionesExitosas && actualizarUnidadesEnStock($productoID, $cantidad, $pdo);
        }
        if ($actualizacionesExitosas) {
            // Limpia el carrito
            unset($_SESSION['carrito']);
            $mensaje = "Productos comprados con éxito.";
        } else {
            $mensaje = "Error al actualizar las unidades en stock.";
        }
        // Redirige de nuevo a la página del carrito con un mensaje.
        header("Location: ./mostrarcarritoA.php?mensaje=" . urlencode($mensaje));
        exit;
    } catch (PDOException $e) {
        // En caso de error en la conexión a la base de datos
        echo "Error en la transacción: " . $e->getMessage();
    }
} else {
   header("Location: ./mostrarcarritoA.php");
   exit;
}
?>