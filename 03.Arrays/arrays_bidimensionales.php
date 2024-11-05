<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays bidimensionales</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <?php
    $videojuegos = [
        ["FIFA 24","Deporte",70],
        ["Dark Souls","Soulslike",50],
        ["Hollow Knight","Plataformas",30]
    ];
    foreach ($videojuegos as $videojuego ) {
       /*print_r($videojuego);*/
     /*  list($titulo,$categoria,$precio)=$videojuego;
       echo "<p>$titulo,$categoria,$precio</p>";*/
        
    }
    ?>
    <?php
        $nuevo_videojuego = ["Throne and Liberty","MMO",0];
        array_push($videojuegos,$nuevo_videojuego);
        #$_titulo = array_column($videojuegos, 0);
           
        #array_multisort($_titulo,SORT_ASC,$videojuegos);
        #array_multisort($_titulo,SORT_DESC,$videojuegos);
        /*SORT_ASC para orden ascendiente
        SORT_DESC para orden descendiente*/

        #Ej rapido 1: Ordenar por el precio de mas barato a mas caro
        $_precio = array_column($videojuegos,2);
        array_multisort($_precio,SORT_ASC,$videojuegos);
        #Ej rapido 2: Ordenar por la categoria en orden alfabetico inverso
        $_categoria = array_column($videojuegos,1);
        array_multisort($_categoria,SORT_DESC,$videojuegos);
    ?>
    <table>
        <caption>videojuegos</caption>
        <thead>
        <tr>
            <th>titulo</th>
            <th>categoria</th>
            <th>precio</th>
            
        </tr>
    </thead>
        <tbody>
            <?php
            

            foreach ($videojuegos as $videojuego) { 
             list($titulo,$categoria,$precio)=$videojuego;?>
                <tr>
                    <td><?php echo $titulo ?></td>
                    <td><?php echo $categoria ?></td>
                    <td><?php echo $precio ?></td>
                   
                
                    <?php  } ?>  
                </tr>
        </tbody>
    </table>
    <?php 
    
    for($i = 0; $i < count($videojuegos);$i++){  //el count devulve cuantas filas hay
       // $autobuses[$i][4]= "X";
       if ($videojuegos[$i][3]  ) {
        $videojuegos[$i] [4]= "Gratis";
        } else{
            $videojuegos[$i][4] = "Gratis";
        }
            
    } 
    
    ?>
    
    <table>
        <caption>videojuegos</caption>
        <thead>
        <tr>
            <th>titulo</th>
            <th>categoria</th>
            <th>precio</th>
            <th>Gratis o No</th>
        </tr>
    </thead>
        <tbody>
            <?php
            array_push($videojuegos, ["GTA","--",50]);

            foreach ($videojuegos as $videojuego) { 
             list($titulo,$categoria,$precio,$gratis)=$videojuego;?>
                <tr>
                    <td><?php echo $titulo ?></td>
                    <td><?php echo $categoria ?></td>
                    <td><?php echo $precio ?></td>
                    <td><?php echo $gratis ?></td>
                
                    <?php  } ?>  
                </tr>
        </tbody>
    </table>
    

</body>
</html>