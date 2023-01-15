<?php

require_once "models/Producto.php";

class CarritoController{

    public function index(){
        
        if(isset($_SESSION['carrito']))
            $carrito = $_SESSION['carrito'];
        require_once "views/carrito/index.php";
    }

    public function add(){
        if(isset($_GET['id']))
            $producto_id = $_GET['id'];
        else
            header("Location:".base_url);

        if(isset($_SESSION['carrito'])){    //Si ya se ha agregado algo al carrito

            $cont = 0;                      //contador para aumentar la cantidad de producto que ya estan en el carrito
            foreach($_SESSION['carrito'] as $indice => $elemento){
                if($elemento['id_producto'] == $producto_id){

                    $_SESSION['carrito'][$indice]['unidades']++;  //aumentamos el campo unidades en la variable sesion para que sea global, si aumentamos usando elementos[unidades], solo aumentara en esa variable, no en la sesion
                    $cont++;
                }
            }

        }
        //Agregar producto si no existe carrito por lo cual no existe la var. cont... o si ya se agrego algo, pero no el producto actual, por lo tanto  la var. cont nunca aumento de valor pero si entro a la condicion anterior
        if(!isset($cont) || $cont == 0){
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            if(is_object($producto)){
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        header("Location:".base_url."carrito/index");
    }

    public function remove(){
        
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            unset($_SESSION['carrito'][$index]);
        }
        header("Location:".base_url."carrito/index");

    }

    public function up(){
        
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']++;
        }
        header("Location:".base_url."carrito/index");

    }

    public function down(){
        
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']--;
            //Si llega a 0 unidades quitamos este producto del carrito, de la sesion carrito
            if($_SESSION['carrito'][$index]['unidades'] == 0)
                unset($_SESSION['carrito'][$index]);
        }
        header("Location:".base_url."carrito/index");

    }

    public function deleteAll(){

        unset($_SESSION['carrito']);
        header("Location:".base_url."carrito/index");
    
    }

}