<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="title" content="Tienda Virtual">
    <meta name="description" content="Esto es  una  prueba">
    <meta name="keyword" content="preuba tienda virtual">
    <title>Tienda Virtual</title>
    <?php
		$icono = ControladorPlantilla::ctrEstiloPlantilla();
		echo '<link rel="icon" href="http://localhost/Ecommerce/Frontend/'.$icono["icono"].'">';
        //mantener  fija del proyecto
        $url=Ruta::ctrRuta();
    ?>
    
    <link rel="stylesheet" href="<?php echo $url ?>view/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url ?>view/css/plugins/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $url ?>view/css/plantilla.css">
    <link rel="stylesheet" href="<?php echo $url ?>view/css/cabezote.css">
    <link rel="stylesheet" href="<?php echo $url ?>view/css/slide.css">
    <!--<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->
    <script src="<?php echo $url ?>view/js/plugins/jquery-3.4.1.min.js"></script>
    <script src="<?php echo $url ?>view/js/plugins/bootstrap.min.js"></script>
</head>
<body>
    <?php
        include "modules/cabezote.php";

        /*--------Contenido Dinamico-----------*/
        $rutas=array();
        $ruta=null;
        if (isset($_GET['ruta'])) {
            $rutas=explode("/", $_GET['ruta']);
            $item="ruta";
            $valor=$rutas[0];
            /*----------------URLs Amigables Categorias---------------------*/
            $rutaCategorias=ControladorProductos::ctrMostrarCategorias($item,$valor);
            
            if ($valor==$rutaCategorias['ruta']) {
               $ruta=$valor;
            }
            /*----------------URLs Amigables SubCategorias---------------------*/
            $rutaSubCategorias=ControladorProductos::ctrMostrarSubCategorias($item,$valor);
            foreach ($rutaSubCategorias as $key => $rutaSubCategoria) {
                if ($valor==$rutaSubCategoria['ruta']) {
                    $ruta=$valor;
                 }
            }
            /*----------------Lista Blanca de URLs Amigables---------------------*/
            if($ruta!=null){
                include "modules/productos.php";
            }else{
                include "modules/error404.php";  
            }
        }else{
            include "modules/slide.php";  
        }
    ?>

    <script src="<?php echo $url ?>view/js/cabezote.js"></script>
    <script src="<?php echo $url ?>view/js/plantilla.js"></script>
</body>
</html>