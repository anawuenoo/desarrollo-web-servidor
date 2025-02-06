<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    ?>
    <style>
        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
<?php
    // 1. Obtener los datos de la API usando cURL
    $url = "https://dragonball-api.com/api/characters";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    
    // Verificar si la respuesta es válida
    if ($respuesta === false) {
        echo curl_error($curl); // Notificar error
    }
    curl_close($curl);
    
    // Decodificar el JSON a un array asociativo
    $datos = json_decode($respuesta, true);

    // Verificar si la clave correcta existe en el JSON
    $personajes = array();
    if (isset($datos['items'])) {
        $personajes = $datos['items'];
    }

?>

<h1>¡PERSONAJE RANDOM!</h1>    

<?php
    $res = count($personajes);
    if ($res > 0) {
        $indice = rand(0, $res - 1);
        echo "<p>Índice aleatorio: " . $indice . "</p>";

        // Mostrar personaje aleatorio
        echo "<p><strong>Nombre:</strong> " . $personajes[$indice]['name'] . "</p>";
        echo "<p><strong>Género:</strong> " . $personajes[$indice]['gender'] . "</p>";

        // Verificar si existe la clave 'image' y si no está vacía
        if (isset($personajes[$indice]['image']) && $personajes[$indice]['image'] !== "") {
            echo "<img src='" . $personajes[$indice]['image'] . "' alt='" . $personajes[$indice]['name'] . "'>";
        } else {
            echo "<p>No hay imagen disponible.</p>";
        }
    } else {
        echo "<p>No hay personajes disponibles.</p>";
    }
?>

<form action="" method="GET">
    <button type="submit">¡OTRO!</button>
</form>

</body>
</html>
