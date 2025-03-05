<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
<?php
    if(!isset($_GET["id"])) {
        header("location: index.php"); 
    }
    $id = $_GET["id"];
    $url = "https://dragonball-api.com/api/characters/$id";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $goku = $datos;
    ?>
    <h1>
        <?php echo $goku["name"] ?>
    </h1>
    <h1>
        <?php echo $goku["race"] ?>
    </h1>
    <h1>
        <?php echo $goku["gender"] ?>
    </h1>
    <img width='100px' height='100px' src="<?php echo $goku["image"]?>">
    <p>
        <?php echo $goku["description"] ?>
    </p>
    
    <?php 
        if ($goku["transformations"]!=[]) {?>
            <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for ($i=0; $i < count($goku["transformations"]); $i++){?>
                        <tr><?php
                        $imagen=$goku["transformations"][$i]["image"]?>
                        <td><?php echo $goku["transformations"][$i]["name"] ?></td>
                        <td><?php echo "<img width='100px' height='100px' src='$imagen'>" ?></td>
                        </tr>
                    <?php
                    } ?>
            </tbody>
            </table>
            <?php
        }
        else {
            echo "<h3>El personaje no tiene transformaciones</h3>";
        }
    ?>
</body>
</html>