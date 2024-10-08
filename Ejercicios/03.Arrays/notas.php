<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <?php
      error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
<?php 

/**
     * Ejercicio 1: Añadir al array 4 estudiantes con sus asignaturas
     * 
     * Ejercicio 2: Eliminar 1 estudiante y su asignatura a libre 
     * elección
     * 
     * Ejercicio 3: Añadir una 3 columna que será la nota, obtenida 
     * aleatoriamente entre el 1 y 10.
     * 
     * Ejercicio 4: Añadir una cuarta columna que indique APTO o NO APTO,
     * dependiendo de si la nota es igual o superior a 5 o no.
     * 
     * Ejercicio 5: Ordenar alfabéticamente por los alumnos y luego por
     * nota.SI hay varias filas con el mismo nombre y la misma nota,ordenar 
     * por la asignatura alfabéticamente.
     * 
     * Ejercicio 6:Mostrarlo todo en una tabla.
     */

    $notas = [
        ["Paco","Desarrollo web servidor"],
        ["Paco","Desarrollo web cliente"],
        ["Manu","Desarrollo web servidor"],
        ["Manu","Desarrollo web cliente"]
    ];
    array_push($notas,["Guillermo","Diseño de interfaces"]);
    array_push($notas,["Guillermo","Despliegue de aplicaciones web"]);
    array_push($notas,["Guillermo","Desarrollo web cliente"]);
    array_push($notas,["Joaquín","Diseño de interfaces"]);

    unset($notas[1]);
    $notas = array_values($notas); //reordena las notas
    
    for($i = 0; $i < count ($notas); $i++){
        $notas [$i][2] = rand (1,10);

    }
    for($i = 0; $i < count ($notas); $i++){
        $nota = $nota [$i][2];
        if($nota[$i][2] < 5) $notas [$i][3]="NO APTO";
        else $notas [$i][3] = "APTO";
    }

    $_estudiante = array_column($notas,0);
    $_asignatura = array_column($notas,1);
    $_nota = array_column($notas,2);

    array_multisort($_estudiante,SORT_ASC,$_nota,SORT_ASC,$_asignatura,SORT_ASC);
    
    ?>

<table>
        <caption>NOTAS</caption>
        <thead>
        <tr>
            <th>Estudiante</th>
            <th>Asignaturas</th>
            <th>Nota</th>
            <th>Calificacion</th>
        </tr>
    </thead>
        <tbody>
         
            <?php
            foreach($notas as $nota){
               list($estudiante,$asignatura,$puntos,$calificacion) = $nota; ?>
               <tr>
               <td> <?php echo $estudiante ?></td>
               <td> <?php echo $asignatura  ?></td>
               <td> <?php echo $puntos ?></td>
              <td> <?php echo $calificacion ?></td>
               </tr>
               
               <?php } ?> 
           
                    
                </tr>
        </tbody>
    </table>
</body>
</html>