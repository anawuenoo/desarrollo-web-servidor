<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRACTICA ATAQUE A LOS TITANES</title>
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

        table {
            margin-left: 580px;
        }

        h1 {
            margin-left: 550px;
        }
    </style>
</head>

<body>

    <!-- Ejercicio 1: Crea una página llamada index.php que nos muestre una tabla con el nombre, edad, género y una imagen de los 20 primeros personajes. -->
    <?php
    //para el ejercicio 3
    if (isset($_GET["cantidad"])) {
        $limit=$_GET["cantidad"];
    }
    else {
        $limit=20;
    }
    if (isset($_GET["page"])) {
        $page=$_GET["page"];
        $limit=$_GET["limit"];
    }
    else {
        $page=1;
    }

    $url = "https://api.attackontitanapi.com/characters?page=$page&limit=$limit";
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
    
    /*Ejercicio 2: Añade, en el nombre de cada personaje, un enlace que nos llevará a una página llamada personaje.php, donde se mostrará la siguiente información del personaje:
    Nombre 
    Edad
    Género 
    Imagen
    Roles  - En una lista sin ordenar. Si el personaje no tiene roles, se mostrará un encabezado h3 que lo indique.
    */

    $personaje_seleccionado = null;
    if (isset($_GET['personaje'])) {
        $selecionar = $_GET['personaje'];
        foreach ($personajes as $personaje) {
            if ($personaje['name'] === $seleccionado) {
                $personaje_seleccionado = $personaje;
                break;
            }
        }
    }

    ?>

    <h1>TABLA DE ATAQUE A LOS TITANES</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Genero</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($personajes as $personaje) {
                echo "<tr>";
                echo "<td>";
                echo "<a href='personaje.php?id=" . $personaje["id"] . "'>" . $personaje["name"] . "</a>";
                echo "</td>";
                echo "<td>" . $personaje["age"] . "</td>";
                echo "<td>" . $personaje["gender"] . "</td>";
                if (isset($personaje["img"])) {
                    $imagen = $personaje["img"];
                    $imagen = substr($imagen, 0, strpos($imagen, ".png") + 4);
                    echo "<td> <img width='200px' src='" . $imagen . "'></td>";
                } else {
                    echo "<td> Este personaje no tiene imagen  </td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
        if ($page>=3) { 
            ?>
            <button>
            <a href="index.php?page=1&limit=<?php echo $limit ?>" class="btn btn-primary">
                Inicio
            </a>
        </button>
        <?php
        }
        if ($page!=1) { 
            ?>
            <button>
            <a href="index.php?page=<?php echo $page - 1 ?>&limit=<?php echo $limit ?>" class="btn btn-secondary">
                Anterior
            </a>
        </button>
        <?php
        }
        $limite=188/$limit;
        if ($page<$limite) { 
            ?>
            <button>
            <a href="index.php?page=<?php echo $page + 1 ?>&limit=<?php echo $limit ?>" class="btn btn-secondary">
                Siguiente
            </a>
        </button>
        <?php
        }
        if ($page<$limite) { 
            ?>
            <button>
            <a href="index.php?page=<?php echo $limite ?>&limit=<?php echo $limit ?>" class="btn btn-primary">
                Final
            </a>
        </button>
        <?php
        }
        ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>