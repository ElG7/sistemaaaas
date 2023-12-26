<?php
class ProductosModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }
    public function getProductos($estado)
    {
        $sql = "SELECT * FROM producto WHERE estado = $estado";
        return $this->selectAll($sql);
    }

    public function registrar($nombre_producto, $cod_producto, $precio, $stock, $sabor, $fecha_vencimiento, $categoria, $imagen)
    {
        $sql = "INSERT INTO producto (nombre_producto, cod_producto, precio, stock, sabor, fecha_vencimiento, categoria, imagen) VALUES (?,?,?,?,?,?,?,?)";
        $array = array($nombre_producto, $cod_producto, $precio, $stock, $sabor, $fecha_vencimiento, $categoria, $imagen);
        return $this->insertar($sql, $array);
    }

    public function eliminar($idPro)
    {
        $sql="UPDATE producto SET estado = ? WHERE cod_producto = ?";
        $array = array(0, $idPro);
        return $this->save($sql, $array);
    }

    public function getProducto($idPro)
    {
        $sql = "SELECT * FROM producto WHERE cod_producto = '$idPro'";
        return $this->select($sql);
    }

    public function modificar($nombre_producto, $cod_producto, $precio, $stock, $sabor, $fecha_vencimiento, $categoria, $imagen)
    {
        $sql = "UPDATE producto SET nombre_producto=?, precio=?, stock=?, sabor=?, fecha_vencimiento=?, categoria=?, imagen=? WHERE cod_producto = '$cod_producto'";
        $array = array($nombre_producto, $precio, $stock, $sabor, $fecha_vencimiento, $categoria, $imagen);
        return $this->insertar($sql, $array);
    }
}
