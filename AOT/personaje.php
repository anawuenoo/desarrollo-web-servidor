<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen parte 2 Dragon Ball</title>
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

    <?php
    /*Ejercicio 2: Añade, en el nombre de cada personaje, un enlace que nos llevará a una página llamada personaje.php, donde se mostrará la siguiente información del personaje:
   Nombre 
   Edad
   Género 
   Imagen
   Roles  
   En una lista sin ordenar. Si el personaje no tiene roles, se mostrará un encabezado h3 que lo indique.
   */

    if (!isset($_GET["id"])) {
        header("location: index.php");
    }
    $id = $_GET["id"];
    $url = "https://api.attackontitanapi.com/characters/$id";

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
    if (isset($datos['items'])) {
        $personajes = $datos['items'];
    }


    ?>
    <h1>TABLA DE DRAGON BALL AMPLIADA</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Genero</th>
                <th>Imagen</th>
                <th>Roles</th>
            </tr>
        </thead>
        <tbody>
            <tr>

                <td><?php echo $datos["name"]; ?></td>
                <td><?php echo $datos["age"]; ?></td>
                <td><?php echo $datos["gender"]; ?></td>

                <td>
                    <?php
                    if (isset($datos["img"])) {
                        $imagen = $datos["img"];
                        $imagen = substr($imagen, 0, strpos($imagen, ".png") + 4);
                        echo "<img width='200px' src='" . $imagen . "' alt='Imagen de " . $datos["name"] . "'>";
                    } else {
                        echo "Este personaje no tiene imagen";
                    }
                    ?>
                </td>

                <td>
                    <?php if (isset($datos["roles"]) && count($datos["roles"]) > 0) { ?>
                        <ol>
                            <?php foreach ($datos["roles"] as $role) { ?>
                                <li><?php echo $role; ?></li>
                            <?php } ?>
                        </ol>
                    <?php } else { ?>
                        <h3>Este personaje no tiene roles asignados.</h3>
                    <?php } ?>
                </td>
            </tr>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>