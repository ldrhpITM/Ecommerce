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
}