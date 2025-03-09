<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POKEAPI</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);    
    ?>
</head>
<body>
    <?php
    $url = $_GET["personaje"];
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $personaje = $datos;
    ?>

    <table border="1px">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>habilidades</th>
                <th>tipos</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo "<tr>";
            echo "<td>";
            echo "<h3>" . $personaje["name"] . "</h3>";
            echo "</td>";
            echo "<td>";
            echo "<h3>" . $personaje["types"] . "</h3>";
            echo "</td>";
            echo "<td>";
            ?>
            <img src="<?php echo $personaje["sprites"]["front_shiny"]; ?>">
            <?php
            echo "</td>";
            echo "</tr>";
            ?>
        </tbody>
    </table>

    <div>
        <ul>
            <?php
            foreach($personaje["abilities"] as $transformaciones) { 
                echo "<li>" . $transformaciones["ability"]["name"] . "</li>";
            }
            ?>
        </ul>
    </div>

</body>
</html>