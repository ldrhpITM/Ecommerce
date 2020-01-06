<?php
require_once "../controller/plantilla.controlador.php";
require_once "../model/plantilla.modelo.php";

class AjaxPlantilla{
    public function ajaxEstilosPlantilla()
    {
        $respuesta=ControladorPlantilla::ctrEstiloPlantilla();
        echo json_encode($respuesta);
    }
}

$objeto=new AjaxPlantilla();
$objeto->ajaxEstilosPlantilla();