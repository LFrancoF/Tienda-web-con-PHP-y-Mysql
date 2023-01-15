<?php

require_once "models/Usuario.php";
require_once "models/Pedido.php";

class PedidoController{

    public function hacer(){
        require_once "views/pedido/hacer.php";
    }

    public function add(){
        if(isset($_SESSION['identity'])){
            //Guardar datos en la bd
            $usuario_id = $_SESSION['identity']->id;
            $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : false;
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];

            if($departamento && $ciudad && $direccion){
                $pedido = new Pedido();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setDepartamento($departamento);
                $pedido->setCiudad($ciudad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                //Guardar linea pedido
                $save_linea = $pedido->saveLinea();

                if($save && $save_linea){
                    $_SESSION['pedido'] = "completed";
                }else
                    $_SESSION['pedido'] = "failed";

            }else
                $_SESSION['pedido'] = "failed";

            header("Location:".base_url."pedido/confirmado");
            
        }else{
            //redirigir al index
            header("Location:".base_url);
        }
    }

    public function confirmado(){
        if(isset($_SESSION['identity'])){
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($identity->id);

            $pedido = $pedido->getOnebyUser();
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductsbyPedido($pedido->id);
        }

        require_once "views/pedido/confirmado.php";
    }

    public function mis_pedidos(){
        Utils::isIdentity();

        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido();

        //Sacar todos los pedidos del usuario actual
        $pedido->setUsuario_id($usuario_id);
        $pedidos = $pedido->getAllbyUser();
        require_once "views/pedido/mis_pedidos.php";
    }

    public function detalle(){
        Utils::isIdentity();

        if(isset($_GET['id'])){

            $id = $_GET['id'];
            
            //Sacar el pedido 
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            //sacar los productos
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductsbyPedido($id);

            //En caso de que seamos admin obtener los datos del usuario para mostrarlos en los detalles del pedido
            $pedido_user = new Usuario();
            $usuario = $pedido_user->getUserbyPedido($id);

            require_once "views/pedido/detalle.php";
        }else{
            header("Location:".base_url."pedido/mis_pedidos");   
        }
    }

    public function gestion(){
        Utils::isAdmin();

        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();


        require_once "views/pedido/mis_pedidos.php";

    }

    public function estado(){
        Utils::isAdmin();

        if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
            
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];

            //Update del estado del pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->updateStatus();

            header("Location:".base_url."pedido/detalle&id=".$id);

        }else
            header("Location:".base_url."pedido/mis_pedidos");
    }

}