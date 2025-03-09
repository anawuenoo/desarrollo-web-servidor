<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POKEAPI
    </title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);    
    ?>
    
</head>
<body>
    <?php
    

    if(!isset($_GET["pagina"])){
        $url="https://pokeapi.co/api/v2/pokemon";
    }else{
        $url=$_GET["pagina"];//ptimero haga la variable url q coje el valor  de un parameto q se lo pasamos cuando le damos siguiente en la pagina,
    }
    

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);

    $personajes = $datos["results"];

    $listaHabilidades = [];


    ?>
      <table border="1px">
        <thead>
            <tr>
                <th>Nombre</th>
           
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($personajes as $personaje) {
                echo "<tr>";
                echo "<td>";
                echo "<a href='personajes.php?personaje=" . $personaje["url"] . "'>" . $personaje["name"]."</a>";
                echo "</td>";
               
            }
            ?>
            <p>Géneros:
                <ul>
                    <?php foreach($personajes["abilities"] as $habilidadad) { ?>
                        <li><?php echo $personajes["name"]; ?></li>
                    <?php } ?>
                </ul>
            </p>

        </tbody>
    </table>
    <?php

    if(isset($datos["next"])){
        ?> <a href='index.php?pagina=<?php echo $datos["next"] ?>'>Siguiente</a> <?php
    }
    ?>
    
</body>
</html>