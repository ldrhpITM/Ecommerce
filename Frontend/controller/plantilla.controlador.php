<?php

class ControladorPlantilla 
{
    public function plantilla()
    {
        include "view/plantilla.php";
    }

    /*************Estilos*******************/
    public function ctrEstiloPlantilla()
    {
        $tabla = "Plantilla";
        $respuesta = ModeloPlantilla::mdlEstiloPlantilla($tabla);
        return $respuesta;
    }
}
