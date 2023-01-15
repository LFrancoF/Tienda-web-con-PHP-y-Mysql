<?php

class Pedido{
    private $id;
    private $usuario_id;
    private $departamento;
    private $ciudad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId(){
		return $this->id;
    }
    
    public function getUsuario_id(){
		return $this->usuario_id;
    }
    
    public function getDepartamento(){
		return $this->departamento;
    }
    
    public function getCiudad(){
		return $this->ciudad;
    }
    
    public function getDireccion(){
		return $this->direccion;
    }
    
    public function getCoste(){
		return $this->coste;
    }
    
    public function getEstado(){
		return $this->estado;
    }
    
    public function getFecha(){
		return $this->fecha;
    }
    
    public function getHora(){
		return $this->hora;
	}

	public function setId($id){
		$this->id = $id;
    }

	public function setUsuario_id($usuario_id){
		$this->usuario_id = $usuario_id;
	}

	public function setDepartamento($departamento){
		$this->departamento = $this->db->real_escape_string($departamento);
	}

	public function setCiudad($ciudad){
		$this->ciudad = $this->db->real_escape_string($ciudad);
	}

	public function setDireccion($direccion){
		$this->direccion = $this->db->real_escape_string($direccion);
	}

	public function setCoste($coste){
		$this->coste = $coste;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function setHora($hora){
		$this->hora = $hora;
    }
    
    public function getAll(){
        $pedidos = $this->db->query("SELECT * FROM pedidos ORDER By id DESC");
        return $pedidos;
    }

    public function getOne(){
        $pedido = $this->db->query("SELECT * FROM pedidos WHERE id={$this->getId()}");
        return $pedido->fetch_object();
    }

    public function getOnebyUser(){
        $sql = "SELECT DISTINCT p.id, p.coste FROM pedidos p "
                //."INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id "
                ."WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY p.id DESC LIMIT 1";
        $pedido = $this->db->query($sql);

        return $pedido->fetch_object();
    }

    public function getAllbyUser(){
        $sql = "SELECT p.* FROM pedidos p "
                ."WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY p.id DESC";
        $pedidos = $this->db->query($sql);

        return $pedidos;
    }

    public function getProductsbyPedido($id){
        $sql = "SELECT pr.*, lp.unidades FROM productos pr "
                ."INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id "
                ."WHERE lp.pedido_id = {$id}";
        $productos = $this->db->query($sql);

        return $productos;
    }

    public function save(){
        $sql = "INSERT INTO pedidos VALUES(null,{$this->getUsuario_id()},'{$this->getDepartamento()}', '{$this->getCiudad()}', '{$this->getDireccion()}', {$this->getCoste()}, 'confirm', CURDATE(), CURTIME());";
        $save = $this->db->query($sql);
        
        $result = false;
        if($save)
            $result=true;
        return $result;
    }

    public function saveLinea(){
        $sql = "SELECT LAST_INSERT_ID() as 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        foreach($_SESSION['carrito'] as $indice => $elemento){
            $producto = $elemento['producto'];

            $insert = "INSERT INTO lineas_pedidos VALUES(NULL , {$pedido_id}, {$producto->id}, {$elemento['unidades']})";
            $save = $this->db->query($insert);

        }

        $result = false;
        if($save)
            $result=true;
        return $result;
        
    }

    public function updateStatus(){
        $sql = "UPDATE pedidos SET estado='{$this->getEstado()}' "
              ."WHERE id={$this->getId()}";
        $save = $this->db->query($sql);

        $result = false;
        if($save)
            $result=true;
        return $result;
    }

}