<?php
class Vistas {
 
    public function getView($ruta, $vista, $data="")
    {
        if ($ruta == "Home") {
            $vistaotra = "Views/".$vista.".php";
        }else{
            $vistaotra = "Views/".$ruta."/".$vista.".php";
        }
        require $vistaotra;
    }
}
?>