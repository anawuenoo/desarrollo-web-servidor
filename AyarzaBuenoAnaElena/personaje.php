<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen parte 2 Dragon Ball</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        img{
            width: 80px;
            height: 80px;
        }

        td{
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
    
    if(!isset($_GET["id"])) {
        header("location: index.php"); 
    }
    $id = $_GET["id"];
    $url = "https://dragonball-api.com/api/characters/$id";
    
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
            <th>Raza</th>
            <th>Genero</th>
            <th>Descripción</th>
            <th>Transformación</th>
            <th>Imagen</th>
        </tr>
    </thead>
    <tbody>
            <tr>
               
                <td><?php echo $datos["name"];?></td>
                <td><?php echo $datos["gender"];?></td>
                <td><?php echo $datos["race"];?></td>
                <td><?php echo $datos["description"];?></td>
                <td>
                    <ol>

                <?php foreach ($datos["transformations"] as $fila)  {  ?>
                   <li> <?php echo $fila["name"]; ?> 
                    <img src="<?php echo $fila ["image"]?>" >
                   
                    </li> 
                <?php 
                }
                ?>
                </ol>
                </td>

                <td><img src="<?php echo $datos["image"]; ?>">
            </tr>
    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
