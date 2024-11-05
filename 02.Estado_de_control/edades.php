<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
</head>
<body>
    <?php

/* CON IF Y CON MATCH:
-SI LA PERSONA TIENE ENTRE 0 Y 4, ES UN BEBE
-SI LA PERSONA TIENE ENTRE 5 Y 17 AÑOS, ES MENOR DE EDAD
-SI LA PERSONA TIENE ENTRE 18 Y 65 AÑOS, ES ADULTO
-SI LA PERSONA TIENE ENTRE 66 Y 120 AÑOS, ES JUBILADO
-SI LA EDAD ESTA FUERA DE RANGO, ES ERROR*/ 
    $edad = rand (0,140);
    if ($edad >= 0 && $edad<=4) {
        $resultado = "es un bebe";
    } elseif($edad >=5 && $edad <= 17){
        $resultado = "es menor de edad";

    } elseif($edad >=18 && $edad<= 65){
        $resultado = "es un adulto";

    }elseif($edad >=66 && $edad<=120){
        $resultado = "es un jubilado";
    }else{
        $resultado = "la edad esta fuera de rango, ERROR";
    }
    echo "<p>$edad es $resultado </p>";


    $edad = rand (0,140);
    $resultado=match(true){
        $edad >= 0 && $edad<=4 =>"es un bebe",
        $edad >=5 && $edad <= 17 => "es menor de edad",
        $edad >=18 && $edad<= 65 => "es un adulto",
        $edad >=66 && $edad<=120 =>"es un jubilado",
        default => "la edad esta fuera de rango, ERROR"
        
        
    };
    echo "<p>$edad es $resultado </p>";


    ?>
</body>
</html>