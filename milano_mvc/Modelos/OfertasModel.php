<?php
class OfertasModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }
    public function getOfertas($estado)
    {
        $sql = "SELECT * FROM oferta WHERE estado = '$estado'";
        return $this->selectAll($sql);
    }

    public function registrar($cod_oferta, $descripcion, $tiempo_inicio, $tiempo_fin, $producto_cod_producto)
    {
        $sql = "INSERT INTO oferta (cod_oferta, descripcion, tiempo_inicio, tiempo_fin, producto_cod_producto) VALUES (?,?,?,?,?)";
        $array = array($cod_oferta, $descripcion, $tiempo_inicio, $tiempo_fin, $producto_cod_producto);
        return $this->insertar($sql, $array);
    }
    public function verificarOferta($cod_oferta)
    {
        $sql="SELECT cod_oferta FROM oferta WHERE cod_oferta = '$cod_oferta'";
        return $this->select($sql);
    }

    public function eliminar($idOfert)
    {
        $sql="UPDATE oferta SET estado = ? WHERE cod_oferta = ?";
        $array = array(0, $idOfert);
        return $this->save($sql, $array);
    }

    public function getOferta($idOfert)
    {
        $sql = "SELECT * FROM oferta WHERE cod_oferta = '$idOfert'";
        return $this->select($sql);
    }

    public function modificar($cod_oferta, $descripcion, $tiempo_inicio, $tiempo_fin, $producto_cod_producto)
    {
        $sql = "UPDATE oferta SET cod_oferta=?, descripcion=?, tiempo_inicio=?, tiempo_fin=?, producto_cod_producto=? WHERE cod_oferta = '$cod_oferta'";
        $array = array($cod_oferta, $descripcion, $tiempo_inicio, $tiempo_fin, $producto_cod_producto);
        return $this->insertar($sql, $array);
    }
}
