<?php
class AdminModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }
    public function getUsuario($email)
    {
        $sql = "SELECT * FROM empleado WHERE email = '$email'";
        return $this->select($sql);
    }
}
 
?>