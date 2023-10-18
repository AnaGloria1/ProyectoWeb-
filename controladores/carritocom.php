<?php
session_start();
$mensaje="";
if(isset($_POST['btnAccion'])){
  
    switch($_POST['btnAccion']){

        case 'Agregar':

            if(is_numeric( openssl_decrypt($_POST['ID'],COD,KEY))){
                $ID=openssl_decrypt($_POST['ID'],COD,KEY);
                $mensaje.="OK ID CORRECTO ".$ID."<br/>";

            }else{
                $mensaje.="ID Incorrecto".$ID."<br/>";
            }
            if(is_string(openssl_decrypt($_POST['Nombre'],COD,KEY))){
                $NOMBRE=openssl_decrypt($_POST['Nombre'],COD,KEY);
                $mensaje.= "OK NOMBRE".$NOMBRE."<br/>";
                }else{ $mensaje.="Upps. Algo pasa con el nombre"."<br/>"; break;}

                if(is_numeric(openssl_decrypt($_POST['Cantidad'],COD,KEY))){
                    $CANTIDAD=openssl_decrypt($_POST['Cantidad'],COD,KEY);
                    $mensaje.= "OK CANTIDAD".$CANTIDAD. "<br/>";
                }else{ $mensaje.="Upps. Algo pasa con la cantidad"."<br/>"; break;}

                if(is_numeric(openssl_decrypt($_POST['Precio'],COD,KEY))){
                    $PRECIO=openssl_decrypt($_POST['Precio'],COD,KEY);
                    $mensaje.= "OK PRECIO".$PRECIO. "<br/>";
                }else{ $mensaje.="Upps. Algo pasa con el precio"."<br/>"; break;}
                
            if(!isset($_SESSION['CARRITO'])){

                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
                $_SESSION['carrito'][0]=$producto;

            }else{
                $NumeroProductos=count($_SESSION['CARRITO']);
                $Producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
                $_SESSION['CARRITO'][$Numeroproductos]=$producto;

            }
            $mensaje= print_r( $_SESSION,true);

        break;
    }
}