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
        if (isset($_GET["cantidad"])) {
            $limit=$_GET["cantidad"];
        }
        else {
            $limit=5;
        }
        if (isset($_GET["page"])) {
            $page=$_GET["page"];
            $limit=$_GET["limit"];
        }
        else {
            $page=1;
        }
        $url = "https://dragonball-api.com/api/characters/?page=$page&limit=$limit";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);
        $datos = json_decode($respuesta, true);
        $gokus = $datos["items"];?>
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
            <?php
                foreach ($gokus as $goku) {
                    $imagen=$goku["image"]?>
                    <tr>
                        <td>
                            <a href="personaje.php?id=<?php echo $goku["id"] ?>">
                                <?php echo $goku["name"] ?>
                            </a>
                        </td>
                        <td><?php echo $goku["race"] ?></td>
                        <td><?php echo $goku["gender"] ?></td>
                        <td><?php echo "<img width='100px' height='100px' src='$imagen'>" ?></td>
                    </tr>
                <?php
                }
            ?>
            </tbody>
        </table>
        <?php
        if ($page>=3) { 
            ?>
            <button>
            <a href="index.php?page=1&limit=<?php echo $limit ?>">
                Inicio
            </a>
        </button>
        <?php
        }
        if ($page!=1) { 
            ?>
            <button>
            <a href="index.php?page=<?php echo $page-1 ?>&limit=<?php echo $limit ?>">
                Anterior
            </a>
        </button>
        <?php
        }
        $limite=60/$limit;
        if ($page<$limite) { 
            ?>
            <button>
            <a href="index.php?page=<?php echo $page+1 ?>&limit=<?php echo $limit ?>">
                Siguiente
            </a>
        </button>
        <?php
        }
        if ($page<$limite) { 
            ?>
            <button>
            <a href="index.php?page=<?php echo $limite ?>&limit=<?php echo $limit ?>">
                Final
            </a>
        </button>
        <?php
        }
        ?>
        <br>
        <form action="" method="get">
        <label>Cantidad de personajes: </label>
        <input type="text" name="cantidad">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>