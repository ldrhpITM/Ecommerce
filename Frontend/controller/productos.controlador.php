<?php
class ControladorProductos{
    //mostrar categorias
    static public function ctrMostrarCategorias($item, $valor)
    {
        $tabla="Categorias";
        $respuesta=ModeloProductos::mdlMostrarCategorias($tabla, $item, $valor);
        return $respuesta;
    }

    //mostrar subcategorias
    static public function ctrMostrarSubCategorias($item, $valor)
    {
        $tabla="Subcategorias";
        $respuesta=ModeloProductos::mdlMostrarSubCategorias($tabla, $item, $valor);
        return $respuesta;
    }

    //mostrar Productos
    static public function ctrMostrarProductos($ordenar, $item, $valor,$base, $tope)
    {
        $tabla="Productos";
        $respuesta=ModeloProductos::mdlMostrarProductos($tabla, $ordenar, $item, $valor,$base, $tope);
        return  $respuesta;
    }
    //mostrar info producto
    static  public function ctrMostrarInfoProducto($item, $valor)
    {
        $tabla="Productos";
        $respuesta=ModeloProductos::mdlMostrarInfProducto($tabla, $item, $valor);
        return  $respuesta;
    }
}