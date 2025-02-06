<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Personajes</title>
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

    // Variable para almacenar el personaje encontrado
    $personaje_encontrado = "";

    // Verificar si se ha realizado una búsqueda
    if (isset($_GET['busqueda'])) {
        $busqueda = trim($_GET['busqueda']);
        
        foreach ($personajes as $personaje) {
            if (strcasecmp($personaje['name'], $busqueda) === 0) { // Comparación sin distinción entre mayúsculas y minúsculas
                $personaje_encontrado = $personaje;
                break;
            }
        }
    }
?>

<h1>¿A quién buscas?</h1>    

<form action="" method="GET">
    <input type="text" name="busqueda" placeholder="Nombre del personaje">
    <button type="submit">Buscar</button>
</form>

<?php 
if ($personaje_encontrado) { 
    echo "<h2>Resultado:</h2>";
    echo "<p><strong>Nombre:</strong> " . $personaje_encontrado['name'] . "</p>";
    echo "<p><strong>Género:</strong> " . $personaje_encontrado['gender'] . "</p>";

    if (isset($personaje_encontrado['image']) && $personaje_encontrado['image'] != "") {
        echo "<img src='" . $personaje_encontrado['image'] . "' alt='" . $personaje_encontrado['name'] . "'>";
    }
} 

if (isset($_GET['busqueda']) && !$personaje_encontrado) { 
    echo "<p>No se encontró el personaje.</p>";
}
?>

</body>
</html>
