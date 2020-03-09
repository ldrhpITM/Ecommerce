<?php
    $item="ruta";
    $valor=$rutas[0];
    $categoria=ControladorProductos::ctrMostrarCategorias($item,$valor);

    if (!$categoria) {
        $subCategoria=ControladorProductos::ctrMostrarSubCategorias($item,$valor);
        $item2="id_subcategoria";
        $valor2=$subCategoria['id'];
    }else{
        $item2="id_categoria";
        $valor2=$categoria['id'];
    }
    $base=0; 
    $tope=12;
    $ordenar="id";
    $productos=ControladorProductos::ctrMostrarProductos($ordenar,$item2,$valor2,$base,$tope);
    if (!$productos) {
        echo "Aun no hay Productos en esta seccion";
    }
?>