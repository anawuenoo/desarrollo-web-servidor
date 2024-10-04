<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
</head>
<body>
    <?php 
    //echo date("j");//para decir el numero en el que estamos
    //echo date("l");//para decir el dia de la semana q estamos
    $dia = date("j");
    // $numero % 4

    if ($dia % 2==0){
        echo "El $dia es numero par";
    } else{
        echo "El $dia es numero impar";
    }
        
 

    ?>
</body>
</html>