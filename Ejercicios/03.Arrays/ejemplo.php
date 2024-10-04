<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <?php
      /*  error_reporting( E_ALL );
        ini_set( "display_errors", 1 );*/
    ?>
</head>
<body>
    <?php
    $frutas = array(
        "clave 1" => "Manzana",
        'clave 2' => 'Naranja',
        'clave 3' => "Cereza"
    );

    //echo $frutas["clave 4"];
    //echo "<br>";

    $frutas = [
        "Manzana",
        "Naranja",
        "Cereza",
    ];
    $frutas2 = [
      0 => "Melocotón",
      1 => "Fresa",
      2 =>  "Albaricoque"
    ];
    $frutas = [
        1 => "Melocotón",
        0 => "Fresa",
        2 =>  "Albaricoque"
    ];


    if($frutas == $frutas2){
        echo "<h3> Los arrays son iguales</h3>";
    }else{
        echo "<h3> Los arrays no son iguales</h3>";
    }


   /* echo"<ol>";
    echo "<h3>MIs frutas con WHILE</h3>";
    $i = 0;
    while($i<count($frutas)){
        echo"<li>" .$frutas[$i]."</li>";
    }
    echo"</ol>";*/

    echo"<ol>";
    echo "<h3>MIs frutas con FOR</h3>";
    for ($i=0; $i < count($frutas) ; $i++) { 
            echo "<li>" .$frutas[$i]."</li>";
    }
    echo"</ol>";

 
    echo "<h3>Mis frutas con FOREACH</h3>";
    echo"<ol>";
    foreach($frutas as $fruta){
        echo "<li>$fruta</li>";
    }
    echo"</ol>";

    echo"<ol>";
    echo "<h3>Mis frutas con FOREACH con claves</h3>";
    foreach($frutas as $clave => $fruta){
        echo "<li>$clave,$fruta</li>";
    }
    echo"</ol>";

    array_push($frutas, "Mango", "Melocotón");
    $frutas[] = "Sandía";
    $frutas[7] = "Uva";
    $frutas[] = "Melón";

    //echo $frutas[1];
    $frutas = array_values($frutas);

    unset($frutas[1]);

    print_r($frutas);

    /*
        CREAR UN ARRAY CON UNA LISTA DE PERSONAS DONDE LA CLAVE SEA
        EL DNI Y EL VALOR EL NOMBRE

        QUE HAYA MINIMO 3 PERSONAS

        MOSTRAR EL ARRAY COMPLETO CON PRINT_R Y A ALGUNA PERSONA INDIVIDUAL

        AÑADIR ELEMENTOS CON Y SIN CLAVE

        BORRAR ALGUN ELEMENTO

        PROBAR A RESETAR LAS CLAVES
    */

    $personas = [
        "11223344F" => "José Alonso",
        "22331133G" => "Enya García",
        "44332211R" => "Fulgencio Hermenegildo"
    ];
    foreach($personas as $clave => $persona){
        echo "<li>$clave,$persona</li>";
    }
    

    $personas["99112233G"] = "Cristiano 'El bicho' Ronaldo";
    array_push($personas, "Messi 'La pulga'");

    unset($personas[0]);

    print_r($personas);

    /*echo "<p>" . $personas["22331133G"] . "</p>";
    $tamaño = count($persona);
    echo "<h3>$tamaño</h3>";*/

    $profesores = [
        "Desarrollo web servidor" => "Alejandra",
        "Derarrollo web cliente" => "Jaime",
        "Diseño de interfaces" => "José",
        "Despliegue de aplicaciones web" => "Alejandro",
        "Empresas e iniciativa emprendedora" => "Gloria",
        "Ingles" => "Virginia"
    ];
    $asignaturas = [
        "Desarrollo web servidor" => "Alejandra",
        "Derarrollo web cliente" => "Jaime",
        "Diseño de interfaces" => "José",
        "Despliegue de aplicaciones web" => "Alejandro",
        "Empresas e iniciativa emprendedora" => "Gloria",
        "Ingles" => "Virginia"
    ];

    $alumnos = [
        "Guillermo" => "3",  
        "Daiana" => "5",      
        "Angel" => "8",       
        "Ayoub" => "7",       
        "Mateo" => "9",       
        "Joaquín" => "4"
    ]

    ?>
    <table>
    <thead>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
        </tr>
    <thead>
    <tbody>
    <?php
        foreach ($personas as $dni => $nombre) { ?>
            <tr>
                <td><?php echo $dni ?></td>
                <td><?php echo $nombre ?></td>
          </tr>
        <?php } 
        ?>
    </tbody>
    </table>

    <table>
    <thead>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
        </tr>
    <thead>
        <br><br>
        <h1>Tabla Buena</h1>
        <?php
        $personas["00112211"] = "Paquito de la Torre";
        $personas["22110044B"] = "Paco Fiesta";
        //asort($personas);
        //rsort($personas);
        //arsort($personas);
        ksort($personas);

        ?>
        <?php
         foreach($personas as $dni => $nombre){
            echo "<tr>";
            echo "<td>$dni</td>";
            echo "<td>$nombre</td>";
            echo "</tr>";
            
        }
        ?>
    </tbody>
    </table>
<!--

Desarrollo web servidor => Alejandra
Derarrollo web cliente => Jaime
Diseño de interfaces => José
Despliegue de aplicaciones web => Alejandro
Empresas e iniciativa emprendedora => GLoria
Ingles => Virginia

MOSTRAR EN UNA TABLA LAS ASIGNATURAS Y SUS RESPECTIVOS PROFEDORES
LUEGO:

MOSTRAR UNA TABLA ADICIONAL ORDENADA POR LA ASIGNATURA EN ORDEN ALFABETICO

MOSTRAS UNA TABLA ADICIONAL ORDENADA POR LOS PROFESORES EN ORDEN ALFABETICO INVERSO
-->
<table>
    <thead>
        <tr>
            <th>Asignaturas</th>
            <th>Nombre</th>
        </tr>
    <thead>
        <br><br>
        <h1>Tabla Profes y Asignaturas</h1>
        <?php
        //ksort($asignaturas)
        arsort($asignaturas);
     
        ?>
        <?php
         foreach($profesores as $asignaturas => $nombre){
            echo "<tr>";
            echo "<td>$asignaturas</td>";
            echo "<td>$nombre</td>";
            echo "</tr>";
            
        }
        ?>
    </tbody>
    </table>
<!--
Guillermo => 3   (suspenso)
Daiana => 5      (aprobado)
Angel => 8       (aprobado)
Ayoub => 7       (aprobado)
Mateo => 9       (aprobado)
Joaquín => 4     (suspenso)
-->
    <?php
        $estudiantes = [
            "Guillermo" => "3",  
            "Daiana" => "5",      
            "Angel" => "8",       
            "Ayoub" => "7",       
            "Mateo" => "9",       
            "Joaquín" => "4"
        ];
        
        ?>
    <table>
        <caption>Estudiante</caption>
        <thead>
        <tr>
            <th>Estudiantes</th>
            <th>Nota</th>
            <th>Calificacion</th>
        </tr>
    </thead>
        <tbody>
            <?php
            foreach ($estudiantes as $estudiante => $nota) { ?>
                <tr>
                    <td><?php echo $estudiante ?></td>
                    <td><?php echo $nota ?></td>
                    <?php
                    if ($nota < 5 ){?>
                        <td class = "suspenso">Suspenso</td>
                    <?php } else { ?>
                        <td class = "aprobado">Aprobado</td>
                    <?php } ?>
                </tr>
                    <?php  } ?>  
                    
        </tbody>

  
    </table>

   

</body>
</html>