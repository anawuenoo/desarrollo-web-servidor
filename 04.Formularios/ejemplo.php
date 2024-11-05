<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
</head>
<body>
    <?php
    /**
     * SINGLE PAGE FORM -> TODDA  LA INFORMACION SE PROCESA EN LA MISMA PAGINA
     * 
     * MULTI PAGE FORM  -> REENVÍAN A OTRA PAGINA
     */
    
    ?>

    <form action="" method="post">
        <input type="text" name="mensaje">
        <input type="submit" value="Enviar">
        <input type="text" name="veces">
        


    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        /**
         * El servidor ejecutara este bloque de codigo cuando reciba 
         * una peticion  a través del método POST
         */
        $mensaje = $_POST ["mensaje"];
        $veces = $_POST ["veces"];
        for($i=0;$i<$veces;$i++){
            echo "<h1>$mensaje</h1>";
        }
        

        /**
         * Modificar el formulario anterior para que se pueda introducir un número.
         * 
         * El mensaje se mostrará tantas veces como indique el número.
         */

        

         

    }
    
    ?>
</body>
</html>