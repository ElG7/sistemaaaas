<?php
class ClientesModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function registroDirecto($nombre, $nom_usuario, $rut, $telefono, $fdn, $email, $contrasena)
    {
        $sql = "INSERT INTO cliente (nombre, nom_usuario, rut, telefono, fecha_nacimiento, email, contrasena) VALUES (?,?,?,?,?,?,?)";
        $datos = array($nombre, $nom_usuario, $rut, $telefono, $fdn, $email, $contrasena);
        $data = $this->insertar($sql, $datos);
        if ($data > 0) {
            $res = $data;
        } else {
            $res = 0;
        }
        return $res;
    }

    public function getVerificar($email)
    {
        $sql = "SELECT * FROM cliente WHERE email = '$email'";
        return $this->select($sql);
    }

    public function registrarPedido($cod_pedido, $monto, $estado, $fecha_pedido, $cliente_rut)
    {
        $sql = "INSERT INTO pedido (cod_pedido, monto, estado, fecha_pedido, cliente_rut) VALUES (?,?,?,?,?)";
        $datos = array($cod_pedido, $monto, $estado, $fecha_pedido, $cliente_rut);
        $data = $this->insertar($sql, $datos);
        if ($data > 0) {
            $res = $data;
        } else {
            $res = 0;
        }
        return $res;
    }
    public function getProducto($cod_producto)
    {
        $sql = "SELECT cod_producto,nombre_producto,precio FROM producto WHERE cod_producto = '$cod_producto'";
        return $this->select($sql);
    }
    public function registrarDetalle($producto, $precio, $cantidad, $pedido_cod_pedido, $producto_cod_producto)
    {
        $sql = "INSERT INTO detalle_pedido (producto, precio, cantidad, pedido_cod_pedido, producto_cod_producto) VALUES (?,?,?,?,?)";
        $datos = array($producto, $precio, $cantidad, $pedido_cod_pedido, $producto_cod_producto);
        $data = $this->insertar($sql, $datos);
        if ($data > 0) {
            $res = $data;
        } else {
            $res = 0;
        }
        return $res;
    }

    public function actualizarStock($cod_producto, $cantidadVendida)
{
    // Realiza la lógica para actualizar el stock en la base de datos
    $sql = "UPDATE producto SET stock = stock - '$cantidadVendida' WHERE cod_producto = '$cod_producto'";
    
    $datos = array($cod_producto,$cantidadVendida);
    return $this->save($sql, $datos);
}


    public function getPedidos($cliente_rut)
    {
        $sql = "SELECT * FROM pedido WHERE cliente_rut = '$cliente_rut'";
        return $this->selectAll($sql);
    }

     public function verPedidos($cod_pedido)
     {
         $sql = "SELECT * FROM pedido p INNER JOIN detalle_pedido d ON p.cod_pedido = d.pedido_cod_pedido WHERE p.cod_pedido = $cod_pedido";
         return $this->selectAll($sql);
     }
}
 
?>