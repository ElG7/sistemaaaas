<?php
class HomeModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }
    public function getTopProductos()
    {
        $sql = "SELECT * FROM producto ORDER BY stock DESC LIMIT 4";
        return $this->selectAll($sql);
    }
    
}
 
?>