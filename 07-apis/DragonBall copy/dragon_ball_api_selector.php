<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Personaje</title>
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
    // Obtener los datos de la API usando cURL
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

    // Obtener el personaje seleccionado
    $personaje_seleccionado = "";
    if (isset($_GET['personaje'])) {
        $seleccionado = $_GET['personaje'];
        foreach ($personajes as $personaje) {
            if ($personaje['name'] === $seleccionado) {
                $personaje_seleccionado = $personaje;
                break;
            }
        }
    }
?>

<h1>¡ELIGE UN PERSONAJE!</h1>    

<form action="" method="GET">
    <select name="personaje" onchange="this.form.submit()">
        <option value="">-- Selecciona un personaje --</option>
        <?php 
        foreach ($personajes as $personaje) {
            echo "<option value='" . $personaje['name'] . "'";
            if (isset($_GET['personaje'])) {
                if ($_GET['personaje'] === $personaje['name']) {
                    echo " selected";
                }
            }
            echo ">" . $personaje['name'] . "</option>";
        }
        ?>
    </select>
</form>

<?php
if ($personaje_seleccionado) {
    echo "<h2>Detalles del personaje:</h2>";
    echo "<p><strong>Nombre:</strong> " . $personaje_seleccionado['name'] . "</p>";
    echo "<p><strong>Género:</strong> " . $personaje_seleccionado['gender'] . "</p>";
    echo "<p><strong>Kí:</strong> " . $personaje_seleccionado['ki'] . "</p>";
    echo "<p><strong>MaxKi:</strong> " . $personaje_seleccionado['maxKi'] . "</p>";

    if (isset($personaje_seleccionado['image'])) {
        if ($personaje_seleccionado['image'] !== "") {
            echo "<img src='" . $personaje_seleccionado['image'] . "' alt='" . $personaje_seleccionado['name'] . "'>";
        }
    }
}
?>

</body>
</html>
