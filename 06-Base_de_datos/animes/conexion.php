<?php
    $_servidor = "localhost"; // ó "127.0.0.1" (loopback)
    $_usuario = "estudiante";
    $_contrasena = "estudiante";
    $_base_de_datos = "animes_bd";

    //Tenemos dos opciones para crear una conexion BBDD
    //Mysqli(más simple) ó PDO(más completa) (librerias)
    $_conexion = new Mysqli($_servidor,$_usuario,$_contrasena,$_base_de_datos)
        or die("Error de conexión");
    
?>