<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases Semanas</title>
</head>
<body>
    <?php 
    $dia = date("l");
    echo "<h1>Hoy es $dia </h1>";

    /*
    HACER UN SWITCH QUE MUESTRE POR PANTALLA SI HOY HAY CLASES DE WEB SERVIDOR
    */
/*
    switch ($dia) {
        case 'Tuesday':
        case 'Wednesday':
        case 'Friday':
        echo "<p> Hoy $dia tenemos clases de web servidor </p>";
            break;
        default :
        echo "<p> Hoy $dia no tenemos clases de web servidor </p>";
            break;

    }*/
    /*
    1-CREAR UN SWITCH QUE SEGÚN EL DIA EN QUE ESTEMOS,ALAMACENE EN UNA VARIABLE EL DIA EN ESPAÑOL.

    2-REESCRIBIR EL SWITCH DE LA ASIGANTURA CON LOS DIAS EN ESPAÑOL.

    */
    $dia_espanol = null ;
    switch($dia){
        case'Monday':
            $dia_espanol='Lunes';
        case'Tuesday':
            $dia_espanol='Martes';
        case'Wednesday':
            $dia_espanol='Miercoles';
        case'Thursday':
            $dia_espanol='Jueves';
        case'Friday':
            $dia_espanol='Viernes';
       
            break;
       

    }
    switch($dia_espanol){
        case'Martes':
        case'Miercoles':
        case'Viernes':
            echo "<p> Hoy $dia_espanol tenemos clases de web servidor </p>";
            break;
        default :
            echo "<p> Hoy $dia_espanol no tenemos clases de web servidor </p>";
                

    }

    //ESTRUCTURA MATCH PHP --> 8.0
    $resultado = match($dia_espanol){
        "Martes" => "<p>Hoy $dia_espanol tenemos clases de web servidor </p>",
        "Miercoles" => "<p>Hoy $dia_espanol tenemos clases de web servidor </p>",
        "Viernes" => "<p>Hoy $dia_espanol tenemos clases de web servidor </p>",
        default => "<p>Hoy $dia_espanol no tenemos clases de web servidor </p>"
        
    };
    echo $resultado;

    
    ?>
</body>
</html>