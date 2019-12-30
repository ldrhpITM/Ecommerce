<?php
class ControladorProductos{
    //mostrar categorias
    public function ctrMostrarCategorias()
    {
        $tabla="Categorias";
        $respuesta=ModeloProductos::mdlMostrarCategorias($tabla);
        return $respuesta;
    }

    //mostrar subcategorias
    static public function ctrMostrarSubCategorias($id)
    {
        $tabla="Subcategorias";
        $respuesta=ModeloProductos::mdlMostrarSubCategorias($tabla, $id);
        return $respuesta;
    }
}