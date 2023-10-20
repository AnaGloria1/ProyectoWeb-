<?php
session_start();
$mensaje="";
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
                if(in_array($ID,$idProducto)){

                $NumeroProductos=count($_SESSION['carrito']);
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
    }
}
