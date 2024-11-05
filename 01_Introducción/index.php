<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
<?php
 
    define("EDAD",25);
    $var = "hola mundo";
    //echo $var;
    var_dump($var);

    $var = 3;
    var_dump($var);

    echo EDAD;
    echo "<br>";//para dejar una linea entre cada print.
    echo " <h2 style ='color: pink'> La variable es $var </h2> ";//darle color y agrandar el print.

    //para crear una frase con dos variables.
    $frase1 = "Hola";
    $frase2 = "mundo";
    echo $frase1," ", $frase2; //Primera forma de hacerlo.
    echo "<p>$frase1" ." $frase2 </p>";//Segunda forma de hacerlo.
    echo $frase1 . $frase2;//tercera forma,l pero sin separ la frase.
    
    
    ?>
    
</body>
</html>