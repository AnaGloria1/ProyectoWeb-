<?php
require_once('../controladores/conexion.php');

$response = array();

if (isset($_POST['agregar'])) {
    $nombre = $_POST['Nombre'];
    $precio = $_POST['Precio'];
    $descripcion = $_POST['Descripcion'];
    $unidadesEnStock = $_POST['Unidades_en_Stock'];
    $puntoDeReorden = $_POST['Punto_de_Reorden'];
    $unidadesComprometidas = $_POST['Unidades_Comprometidas'];
    $costo = $_POST['costo'];
    $imagen = $_FILES['Imagenes']['name'];
    $directorio_destino = __DIR__ . '/imagenes/';
    $imagent= $_FILES['Imagenes']['tmp_name'];
    $imagend = $directorio_destino . $imagen;
   
    if (move_uploaded_file($imagent, $imagend)) {
        $imagenr = '../imagenes/' . $imagen;

        $consulta = $pdo->prepare("INSERT INTO tblproductos (Nombre, Precio, Descripcion, Imagenes,Unidades_en_Stock,Punto_de_reorden,Unidades_comprometidas,costo) VALUES (:nombre, :precio, :imagen, :descripcion, :unidadesEnStock, :puntoDeReorden, :unidadesComprometidas, :costo)");
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':precio', $precio);
        $consulta->bindParam(':descripcion', $descripcion);
        $consulta->bindParam(':imagen', $imagenr);
        $consulta->bindParam(':unidadesEnStock', $unidadesEnStock);
        $consulta->bindParam(':puntoDeReorden', $puntoDeReorden);
        $consulta->bindParam(':unidadesComprometidas', $unidadesComprometidas);
        $consulta->bindParam(':costo', $costo);

        if ($consulta->execute()) {
            header('Location: productos.php');
            exit();
        } else {
            $response['success'] = false;
            $response['message'] = "Error al agregar el producto.";
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Error al subir las imágenes.";
    }
} else {
    $response['success'] = false;
    $response['message'] = "No se recibieron datos para agregar el producto.";
}

echo json_encode($response);
?>
