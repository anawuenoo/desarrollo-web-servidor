<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            width: 100px;
            height: 100px;
        }

        td{
            border: 1px solid black;
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

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Genero</th>
            <th>Imagen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($personajes as $fila): ?>
            <tr>
                <td><?php echo $fila["name"]; ?></td>
                <td><?php echo $fila["gender"]; ?></td>
                <td><img src="<?php echo $fila["image"]; ?>">
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
