<?php
class PrincipalModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }
    public function getCategorias()
    {
        $sql = "SELECT * FROM producto WHERE stock >= 1 AND estado = 1;";
        return $this->selectAll($sql);
    }
    public function getProductos()
    {
        $sql = "SELECT * FROM producto WHERE stock >= 1 AND estado = 1;";
        return $this->selectAll($sql);
    }
    public function getPaletas()
    {
        $sql = "SELECT * FROM producto WHERE stock >= 1 AND estado = 1 and categoria = 'Paleta' "; 
        return $this->selectAll($sql);
    }

    public function getBotes()
    {
        $sql = "SELECT * FROM producto WHERE stock >= 1 AND estado = 1 and categoria = 'Bote' "; 
        return $this->selectAll($sql);
    }

    public function getListaProducto($cod_producto)
    {
        $sql = "SELECT cod_producto,nombre_producto,precio,imagen FROM producto WHERE cod_producto = $cod_producto";
        return $this->select($sql);
    }


}
 
?>