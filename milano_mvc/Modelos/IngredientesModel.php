<?php
class IngredientesModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }
    public function getIngredientes($estado)
    {
        $sql = "SELECT * FROM ingrediente WHERE estado = $estado";
        return $this->selectAll($sql);
    }

    public function registrar($nombre_ingrediente, $cod_ingrediente, $detalle, $stock, $fecha_vencimiento)
    {
        $sql = "INSERT INTO ingrediente (nombre_ingrediente, cod_ingrediente, detalle, stock, fecha_vencimiento) VALUES (?,?,?,?,?)";
        $array = array($nombre_ingrediente, $cod_ingrediente, $detalle, $stock, $fecha_vencimiento);
        return $this->insertar($sql, $array);
    }

    public function verificarIngrediente($cod_ingrediente)
    {
        $sql="SELECT cod_ingrediente FROM ingrediente WHERE cod_ingrediente = '$cod_ingrediente'";
        return $this->select($sql);
    }

    public function eliminar($idIngre)
    {
        $sql="UPDATE ingrediente SET estado = ? WHERE cod_ingrediente = ?";
        $array = array(0, $idIngre);
        return $this->save($sql, $array);
    }

    public function getIngrediente($idIngre)
    {
        $sql = "SELECT * FROM ingrediente WHERE cod_ingrediente = '$idIngre'";
        return $this->select($sql);
    }

    public function modificar($nombre_ingrediente, $cod_ingrediente, $detalle, $stock, $fecha_vencimiento )
    {
        $sql = "UPDATE ingrediente SET nombre_ingrediente=?, detalle=?, stock=?, fecha_vencimiento=? WHERE cod_ingrediente = '$cod_ingrediente'";
        $array = array($nombre_ingrediente, $detalle, $stock, $fecha_vencimiento );
        return $this->insertar($sql, $array);
    }
}
