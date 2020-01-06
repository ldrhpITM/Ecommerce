<?php

class Conexion{
    public function conectar()
    {
        $link = new  PDO("mysql:host=localhost;dbname=Ecommerce",
            "root","isc10931",             
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );

        return $link;
    }
}