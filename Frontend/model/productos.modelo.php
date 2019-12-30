<?php
require_once "conexion.php";

class ModeloProductos{
  static public function mdlMostrarCategorias($tabla)
  {
    $stmt=Conexion::conectar()->prepare("select * from $tabla");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
   // $stmt=null;
  }

  static public function mdlMostrarSubCategorias($tabla,$id)
  {
    $stmt=Conexion::conectar()->prepare("select * from $tabla where categoria_id=:categoria_id");
    $stmt->bindParam(':categoria_id',$id,PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
   // $stmt=null;
  }
}