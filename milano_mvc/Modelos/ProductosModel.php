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

    public function registrar($nombre, $rut, $email, $telefono, $nom_usuario, $contrasena, $fecha_nacimiento)
    {
        $sql = "INSERT INTO cliente (rut, nombre, email, telefono, nom_usuario, contrasena, fecha_nacimiento) VALUES (?,?,?,?,?,?,?)";
        $array = array($rut, $nombre, $email, $telefono, $nom_usuario, $contrasena, $fecha_nacimiento);
        return $this->insertar($sql, $array);
    }

    public function verificarCorreo($email)
    {
        $sql="SELECT email FROM cliente WHERE email = '$email'";
        return $this->select($sql);
    }

    public function eliminar($idUser)
    {
        $sql="UPDATE cliente SET estado = ? WHERE rut = ?";
        $array = array(0, $idUser);
        return $this->save($sql, $array);
    }

    public function getUsuario($idUser)
    {
        $sql = "SELECT rut, nombre, email, telefono, nom_usuario FROM cliente WHERE rut = '$idUser'";
        return $this->select($sql);
    }

    public function modificar($nombre, $rut, $email, $telefono, $nom_usuario, $fecha_nacimiento)
    {
        $sql = "UPDATE cliente SET nombre=?, email=?, telefono=?, nom_usuario=?, fecha_nacimiento=? WHERE rut = '$rut'";
        $array = array($nombre, $email, $telefono, $nom_usuario, $fecha_nacimiento);
        return $this->insertar($sql, $array);
    }
}
