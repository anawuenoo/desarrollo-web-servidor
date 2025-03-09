<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personaje Pokemons</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        img {
            width: 80px;
            height: 80px;
        }

        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <?php
    /*Ejercicio 2: Añade, en el nombre de cada personaje, un enlace que nos llevará a una página llamada personaje.php, donde se mostrará la siguiente información del personaje:
       Nombre - Primera letra en mayúscula
       Raza - Primera letra en mayúscula
       Género - Primera letra en mayúscula
       Imagen
       Descripción
       Nombre e imagen de sus transformaciones - En una lista ordenada. Si el personaje no tiene transformaciones, se mostrará un encabezado h3 que lo indique.*/

    $url = "https://pokeapi.co/api/v2/pokemon/";

    if (!empty($_GET["id"])) {
        $id = $_GET["id"];
        $url .= "/" . $id;
    } else {
        header("location: index.php");
    }

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    if ($respuesta === false) {
        echo curl_error($curl);
    }
    curl_close($curl);
    $datos = json_decode($respuesta, true);

    $personajes = array();
    if (isset($datos['results'])) {
        $personajes = $datos['results'];
    }


    ?>
    <h1>TABLA DE POKEMONS AMPLIADA</h1>
    <table>
        <thead>
            <tr>
                <th>Habilidades</th>
                <th>Formas</th>
                <th>Imagen/tr></th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>
            <ol>
                <?php
                        if (count($datos["abilities"]) > 0) {
                            foreach ($datos["abilities"] as $dz) { ?>
                                <li><?php echo $dz["ability"]["name"] ?> </li>
                            <?php }
                        } else { ?>
                            <h3>No hay transformaciones</h3>
                        <?php } ?>  
                </ol>
                                        
                </td>

                <td>
                <ol>
                        <?php
                        if (count($datos["forms"]) > 0) {
                            foreach ($datos["forms"] as $dz) { ?>
                                <li><?php echo $dz["name"] ?> </li>
                            <?php }
                        } else { ?>
                            <h3>No hay transformaciones</h3>
                        <?php } ?>  
                    </ol>                
                </td>
                <td>
                    <img src="<?php echo $datos["sprites"]["front_default"]; ?>" alt="Imagen de <?php echo $datos["name"]; ?>">
                </td>

            </tr>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-primary">Inicio</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>