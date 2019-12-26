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
		echo '<link rel="icon" href="http://localhost/Ecommerce/Frontend/'.$icono["icono"].'">'
	?>
    
    <link rel="stylesheet" href="view/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="view/css/plugins/font-awesome.min.css">
    <link rel="stylesheet" href="view/css/plantilla.css">
    <link rel="stylesheet" href="view/css/cabezote.css">
    <!--<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->
    <script src="view/js/plugins/jquery-3.4.1.min.js"></script>
    <script src="view/js/plugins/bootstrap.min.js"></script>
</head>
<body>
    <?php
        include "modules/cabezote.php";
    ?>
    <script src="view/js/cabezote.js"></script>
    <script src="view/js/plantilla.js"></script>
</body>
</html>