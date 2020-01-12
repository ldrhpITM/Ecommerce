<?php
require_once "conexion.php";
class ModeloSlide
{
    public function mdlMostrarSlide($tabla)
    {
        $stmt=Conexion::conectar()->prepare("select * from $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }    
}
