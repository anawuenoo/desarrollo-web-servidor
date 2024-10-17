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

    echo "<br>";

    echo "<h2 style='color: orange'>La variable es $var</h2>";

    $frase1 = "hola";
    $frase2 = "mundo";

    echo "<p>$frase1 " . "$frase2</p>";

    echo $frase1 . $frase2;
    ?>

<?php 
// Código PHP para obtener el factorial de un número
// función para obtener factorial de forma iterativa
/*function obtieneFactorial($numero){ 
    $factorial = 1; 
    for ($i = 1; $i <= $numero; $i++){ 
      $factorial = $factorial * $i; 
    } 
    return $factorial; 
} 

//Ejemplo
$numero = 5; 
$resultado = obtieneFactorial($numero); 
echo "Factorial de $numero  = $resultado"; */
?>
</body>
</html>