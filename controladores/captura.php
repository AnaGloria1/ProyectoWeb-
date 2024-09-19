<?php
require_once('../controladores/conexion.php');
include './carritou.php';

$json = file_get_contents('php://input');
$datos = json_decode($json, true);

if (is_array($datos)) {
    try {
        $pdo = new PDO("mysql:dbname=" . BD . ";host=" . SERVIDOR, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id_transaccion = $datos['id_transaccion']; 
        $status = $datos['detalles']['status'];
        $query = $pdo->prepare("UPDATE tblvantas SET datos = :id_transaccion, status = :status WHERE id_ventas = (SELECT MAX(id_ventas) FROM tblvantas)");

        $query->bindParam(':id_transaccion', $id_transaccion);
        $query->bindParam(':status', $status);
        $query->execute();

        if ($query->rowCount() > 0) {
            echo "Registro actualizado correctamente en la tabla tblventas.";
        } else {
            echo "No se pudo actualizar el registro en la tabla tblventas.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
