<?php
class ControladorSlide 
{
    public function ctrMostrarSlide()
    {
        $tabla="Slide";
        $respuesta=ModeloSlide::mdlMostrarSlide($tabla);
        return $respuesta;
    }
    
}
