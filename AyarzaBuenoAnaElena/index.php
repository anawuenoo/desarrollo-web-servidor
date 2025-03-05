<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen parte 1 Dragon Ball</title>
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
/*Ejercicio 1: Crea una página llamada index.php que nos muestre una tabla con el nombre, raza, género y una imagen de los 5 primeros personajes. 
El nombre, la raza y el género se mostrarán con la primera letra de cada palabra que lo componga en mayúscula. Únicamente se solicitarán 5 personajes a la API.*/

    $url = "https://dragonball-api.com/api/characters?limit=5";
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
    /**Ejercicio 2: Añade, en el nombre de cada personaje, un enlace que nos llevará a una página llamada personaje.php, donde se mostrará la siguiente información del personaje:
    Nombre - Primera letra en mayúscula
    Raza - Primera letra en mayúscula
    Género - Primera letra en mayúscula
    Imagen
    Descripción
    Nombre e imagen de sus transformaciones - En una lista ordenada. Si el personaje no tiene transformaciones, se mostrará un encabezado h3 que lo indique.*/
    $personaje_seleccionado = null;
    if(isset($_GET['personaje'])){
        $selecionar = $_GET['personaje'];
        foreach ($personajes as $personaje) {
           if($personaje['name'] === $seleccionado){
            $personaje_seleccionado = $personaje;
            break;
           }
        }
    }
    /*Ejercicio 3: Por defecto se muestran 5 personajes, pero la API tiene muchos más. Añade enlaces de “Siguiente” y “Anterior” 
    para mostrar los siguientes o anteriores 5 personajes. Si estamos en la primera página, no se mostrará el botón de “Anterior”. 
    También habrá un enlace llamado “Inicio” a la izquierda de “Siguiente”, y otro llamado “Final” a la derecha de “Anterior”. “Inicio” solo se mostrará 
    a partir de la tercera página, y llevará de vuelta a la primera página. “Final” llevará directamente a la última página, y sólo se mostrará desde la primera 
    página hasta la antepenúltima.*/
?>

<h1>TABLA DE DRAGON BALL</h1>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Raza</th>
            <th>Genero</th>
            <th>Imagen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($personajes as $fila): ?>
            <tr>
                <td> <a href="personaje.php?id=<?php echo $fila["id"] ?>" > <?php echo $fila["name"] ?> </a>  </td>
                <td><?php echo $fila["gender"];?></td>
                <td><?php echo $fila["race"];?></td>
                <td><img src="<?php echo $fila["image"]; ?>">
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>
<button type="button" onclick="">Inicio</button>
<button type="button" onclick="">Anterior</button>
<button type="button" onclick="">Siguiente</button>
<button type="button" onclick="">Final</button>
<?php
//PARTE 2
if ($personaje_seleccionado) {
  
    echo "<h2>Detalles del personaje:</h2>";
    echo "<p><strong>Nombre:</strong> " . $personaje_seleccionado['name'] . "</p>";
    echo "<p><strong>Género:</strong> " . $personaje_seleccionado['gender'] . "</p>";
    echo "<p><strong>Raza:</strong> " . $personaje_seleccionado['race'] . "</p>";
}
?>

<div class="container mt-5">
       
        <form action="" method="get">
        <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad de Personajes</label>
                <input type="number" class="form-control" name="cantidad" id="cantidad" min="1">
            </div>
            <div class="mb-3">
                <input class="btn btn-success" type="submit" value="Ver">
            </div>
        </form>    
       
    </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
