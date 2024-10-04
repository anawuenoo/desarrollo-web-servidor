<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autobuses</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    
</head>
<body>
    <?php
    $autobuses=[
        ["Málaga","Ronda",90,10],
        ["Churriana","Málaga",20,3],
        ["Málaga","Granada",120,15],
        ["Torremolinos","Málaga",00,3.5]
    ];
    /**
     * Ejercicio 1: Añadir dos lineas de autobús.
     * 
     * Ejercicio 2: Ordenar por duración de más duración a menos.
     * 
     * Ejercicio 3: Mostrar las líneas en una tabla.
     */
    ?>
<?php
        #EJERCICIO 1
        $nuevo_autobus = ["Málaga","Jaén",110,28];
        $nuevo_autobus1 = ["Jaén","Villacarrillo",60,20] ; 
        array_push($autobuses,$nuevo_autobus,$nuevo_autobus1);

        #EJERCICIO 2
        $_duracion = array_column($autobuses,2);
        array_multisort($_duracion,SORT_DESC,$autobuses);

       
    ?>
<table>
        <caption>Autobuses</caption>
        <thead>
        <tr>
            <th>Origen</th>
            <th>Destino</th>
            <th>Duracion</th>
            <th>Precio</th>
        </tr>
    </thead>
        <tbody>
            <?php
            $_origen = array_column($autobuses,0);
            $_duracion = array_column($autobuses,2);
            $_precio = array_column($autobuses,3);
            array_multisort($_origen,SORT_ASC,$_duracion,SORT_ASC,$_precio,SORT_ASC,$autobuses,); #CUANDO HAY VARIOS IGUALES, OSEA MALAGA SE REPITE SE ORDENA POR LA DURACION POR EJEMPLO
           
            //unset($autobuses[2]); para borrar un autobus pero tiene que ser en la psocion que este por ejemplo si esta en la 1 hay q poner 1
            //unset($autobuses[5]); hay q tener cuidado ya que al borrar un autobus y queremos borrar otro tenemos que tener en cuenta la clave principal, pq si borrar la 1 se queda pero vacio
            /**
             * Ejercicio 4: Insertar 3 autobuses más
             * 
             * Ejercicio 5: Ordenar, primero por el origen, luego por el destino
             * 
             * Ejercicio 6: Ordenar, primero por la duracion, luego por el precio
             */
           
             #Ejercicio 4:
            array_push($autobuses, ["Málaga","Madrid",110,37]);
            array_push($autobuses, ["Jaén","Úbeda",40,10]);
           
            #Ejercicio 5:
            $_origen = array_column($autobuses,0);
            $destino = array_column($autobuses,1);
           // array_multisort($_origen,SORT_ASC,$destino,SORT_ASC,$autobuses);
            
           #Ejercicio 6:
            $_duracion = array_column($autobuses,2);
            $_precio = array_column($autobuses,3);
            //array_multisort($_duracion,SORT_ASC,$_precio,SORT_ASC,$autobuses);




            foreach ($autobuses as $autobus) { 
             list($origen,$destino,$duracion,$precio)=$autobus;?>
                <tr>
                    <td><?php echo $origen ?></td>
                    <td><?php echo $destino ?></td>
                    <td><?php echo $duracion ?></td>
                    <td><?php echo $precio ?></td>
                    <?php  } ?>  
                </tr>
        </tbody>
    </table>

    <?php 
    
    for($i = 0; $i < count($autobuses);$i++){  //el count devulve cuantas filas hay
       // $autobuses[$i][4]= "X";
       if ($autobuses[$i][2] <= 30) {
        $autobuses[$i] [4]= "Corta Distancia";
        } elseif ($autobuses[$i][4] > 30 && $autobuses[$i][2] <=120){
            $autobuses[$i][4]= "Media Distancia";
        } elseif ($autobuses[$i][2] <=120){
            $autobuses[$i] [4]= "Larga Distancia";
        }
            
    } 
    /**
     * Si duración <= 30 ENTONCES = Corta distancia
     * Si duración > 30 && <= 120 ENTONCES = Media distancia
     * Si duración < 120 ENTONCES = Larga distancia
     */
    ?>
       <table>
        <caption>Autobuses 1</caption>
        <thead>
        <tr>
            <th>Origen</th>
            <th>Destino</th>
            <th>Duracion</th>
            <th>Precio</th>
            <th>Tipo</th>
           

        </tr>
    </thead>
        <tbody>
            <?php

            foreach ($autobuses as $autobus) { 
             list($origen,$destino,$duracion,$precio,$tipo,$corta,$media,$larga)=$autobus;?>
                <tr>
                    <td><?php echo $origen ?></td>
                    <td><?php echo $destino ?></td>
                    <td><?php echo $duracion ?></td>
                    <td><?php echo $precio ?></td>
                    <td><?php echo $tipo ?></td>
                    
                    <?php  } ?>  
                </tr>
        </tbody>
    </table>
</body>
</html>