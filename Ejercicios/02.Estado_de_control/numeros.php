<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
//TRES FORMAS DE HACER UN IF Y UN ELSE.
    $numero = 0;
/*
    if($numero > 0){
        echo "<p>1 El número es positivo</p>";
    }

    if($numero > 0) echo "<p>2 El número es positivo</p>";

    if($numero > 0):
        echo "<p>3 El número es positivo</p>";
    endif;


if($numero > 0){
    echo "<p>1 El número es positivo</p>";
}elseif ($numero==0){
    echo"<p>1 El número es cero</p>";
} else{
    echo"<p>1 El número NO es positivo</p>";
}

if($numero > 0) echo "<p>2 El número es positivo</p>";
elseif ($numero==0) echo"<p>2 El número es cero</p>";
else echo "<p>2 El número NO es positivo</p>";

if($numero > 0):
    echo "<p>3 El número es positivo</p>";
elseif ($numero==0):
     echo"<p>3 El número es cero</p>";
else:
    echo "<p>3 El número NO es positivo</p>";
endif;
*/


$numero = 3;

# Rangos: [-10,0),[0,10],(10,20]
/*
if ($numero >= -10 && $numero < 0) {
    echo " El número $numero esta en el rango [-10,0)";
} elseif ($numero >= 0 and $numero <=10) {
    echo "El numero $numero esta en el rango [0,10]";
} elseif ($numero > 10 and $numero <= 20){
    echo "El numero $numero esta en el rango (10,20]";
} else {
    echo "El numero $numero no entra en el rango";
}


if ($numero >= -10 && $numero < 0) :
    echo " El número $numero esta en el rango [-10,0)";
 elseif ($numero >= 0 and $numero <=10) :
    echo "El numero $numero esta en el rango [0,10]";
 elseif ($numero > 10 and $numero <= 20):
    echo "El numero $numero esta en el rango (10,20]";
 else :
    echo "El numero $numero no entra en el rango";
 endif;
*/

/*
$numero1 = 3
$numero2 = 4
ESCRIBIR UN IF QUE DECIDA CUAL DE LOS NUMEROS ES MAYOR O SI SON IGUAL
HACERLOS DE DOS FORMAS DIFERENTES
*/
/*
$numero1 = 8;
$numero2 = 8;

if ($numero1 > $numero2){
    echo "<p>El numero $numero1 es más mayor que el numero $numero2</p>";
}elseif($numero2 > $numero1){
    echo "<p>El numero $numero2 es más mayor que el numero $numero1</p>";
}else{
    echo "<p>$numero1 y $numero2 son iguales</p>";
}

if ($numero1 > $numero2):
    echo "<p>El numero $numero1 es más mayor que el numero $numero2</p>";
elseif($numero2 > $numero1):
    echo "<p>El numero $numero2 es más mayor que el numero $numero1</p>";
else:
    echo "<p>$numero1 y $numero2 son iguales</p>";
endif;
*/
$n = rand(-10,20);
$resultado = match(true){
    $n >= -10 && $n < 0 => "El numero $n esta en el rango [-10,0)",
    $n >= 0 && $n <= 10 => "El numero $n esta en el rango [0,10]",
    $n > 10 && $n <= 20 => "El numero $n esta en el rango (-10,20]"

};
echo $resultado;



    ?>
</body>
</html>