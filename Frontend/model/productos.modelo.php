<?php
require_once "conexion.php";

class ModeloProductos{
  static public function mdlMostrarCategorias($tabla, $item, $valor)
  {
    if ($item!=null) {
      $stmt=Conexion::conectar()->prepare("select * from $tabla WHERE $item=:$item");
      $stmt->bindParam(':'.$item,$valor,PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    }else{
      $stmt=Conexion::conectar()->prepare("select * from $tabla");
      $stmt->execute();
      return $stmt->fetchAll();
    }
    $stmt->close();
   // $stmt=null;
  }

  static public function mdlMostrarSubCategorias($tabla,$item, $valor)
  {
    $stmt=Conexion::conectar()->prepare("select * from $tabla where $item=:$item");
    $stmt->bindParam(':'.$item,$valor,PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
   // $stmt=null;
  }

  //mostrar Productos
  static public function mdlMostrarProductos($tabla, $ordenar, $item, $valor)
  {
    if ($item!=null) {
      $stmt=Conexion::conectar()->prepare("select * from $tabla where $item=:$item ORDER BY $ordenar  DESC LIMIT 4");
      $stmt->bindParam(':'.$item,$valor,PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetchAll();
    }else{
      $stmt=Conexion::conectar()->prepare("select * from $tabla ORDER BY $ordenar  DESC LIMIT 4");
      $stmt->execute();
      return $stmt->fetchAll();
    }
    $stmt->close();
  }
}