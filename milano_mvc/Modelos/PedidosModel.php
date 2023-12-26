<?php
class PedidosModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }
    public function getPedidos($estado)
    {
        $sql = "SELECT * FROM pedido WHERE estado = '$estado'";
        return $this->selectAll($sql);
    }

    public function actualizarEstado($estado,$idPedido)
    {
        $sql = "UPDATE pedido SET estado=? WHERE cod_pedido = ?";
        $array = array($estado,$idPedido);
        return $this->insertar($sql, $array);
    }
}

?>