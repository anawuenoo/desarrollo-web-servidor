<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RICKY Y MORTY</title>
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


    $url = "https://rickandmortyapi.com/api/character";

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
    <h1>TABLA DE RICKY Y MORTY AMPLIADA</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Especie</th>
                <th>Genero</th>
                <th>Imagen</th>
                <th>Location</th>
                <th>Origen</th>


            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $datos["name"] ?> </td>
                <td> <?php echo $datos["species"] ?> </td>
                <td> <?php echo $datos["gender"] ?> </td>
                <td> <img src="<?php echo $datos["image"] ?>" alt=""> </td>
                <td>
                    <?php
                    
                    if (isset($datos["location"])) {
                        echo "<p>" . $datos["location"]["name"] . "</p>";
                    } else {
                        echo "<h3>No hay ubicación</h3>";
                    }
                    ?>
                </td>

                <td>
                    <?php
                    
                    if (isset($datos["origin"])) {
                        echo "<p>" . $datos["origin"]["name"] . "</p>";
                    } else {
                        echo "<h3>No hay ubicación</h3>";
                    }
                    ?>
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