<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <style>
        .table-primary{
            --bs-table-color-state:blue;
            --bs-table-bg:white;
        }
    </style>
</head>
<body>
   
    <?php
        if ($_SERVER["REQUEST_METHOD"]=="GET"){
           $cantidad=$_GET["cantidad"];
           $genero=$_GET["genero"];
           $especie=$_GET["especie"];
        $url="https://rickandmortyapi.com/api/character";
            if (!empty($genero)&&!empty($especie)) {
                
                $url=$url . "/?species=$especie&gender=$genero";
            }else {
                $err="todos los campos son obligatorios";
              
            }
        print_r($url);
        $curl=curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos=json_decode($respuesta,true);
        $animes=$datos["results"];
        }
    ?>
    
    <div class="container">
                
        <form action="" method="get" enctype="">
    
        <div class="mb-3">
                <label for="" class="form-label">Cantidad de Personajes</label>
                <input type="text" class="form-control" name="cantidad">
              
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Genero</label>
            <select name="genero" id="" class="form-select">
                <option value="" selected disabled hidden>Elige Genero </option>
                <option value="Female" > Masculino </option>
                <option value="Male" > Femenino </option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Genero</label>
            <select name="especie" id="" class="form-select">
                <option value="" selected disabled hidden>Elige Especie</option>
                <option value="Human" > Humano </option>
                <option value="Alien" > Alien </option>
            </select>
        </div>
            
        <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="Solicitar">
            <a href="index.php" class="btn btn-secondary">Volver</a>
        </div>
        </form>
        <?php if(isset($err)) echo "<span class='error'>$err</span>"; ?>

        
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                  
                    <th>Nombre</th>
                    <th>Genero</th>
                    <th>Especie</th>
                    <th>Origen</th>
                    <th>Imagen</th>

                </tr>
            </thead>
                <tbody>
                <?php  
                    $prueba=0;
                while ($prueba < $cantidad) { ?>
                <tr>
                    <td> <?php echo $animes[$prueba]["name"] ?>  </td>
                    <td>  <?php echo $animes[$prueba]["gender"] ?>  </td>
                    <td>  <?php echo $animes[$prueba]["species"] ?>  </td>
                    <td>  <?php echo $animes[$prueba]["origin"]["name"] ?>  </td> 
                    <td>  <img src="<?php echo $animes[$prueba]["image"] ?>" alt="" >  </td>                    
                </tr>

            <?php 
                if ($prueba+1>=count($animes)) {
                    $prueba=$cantidad;
                }
                $prueba++;
                }   ?>
               
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>