<?php
require_once "controller/plantilla.controlador.php";
require_once "controller/productos.controlador.php";
require_once "model/plantilla.modelo.php";
require_once "model/productos.modelo.php";
require_once "model/ruta.php";
$plantilla = new ControladorPlantilla();
$plantilla->plantilla();