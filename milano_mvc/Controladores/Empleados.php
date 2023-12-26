<?php
class Empleados extends Controlador {
    
    public function index()
    {   
        $modelo = new EmpleadosModel(); // Crear una instancia del modelo
        print_r($modelo->getEmpleado()); 

    }
}
?>