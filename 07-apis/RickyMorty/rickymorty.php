<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rick & Morty API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
    <style>
        .table-primary {
            --bs-table-color-state: blue;
            --bs-table-bg: white;
        }
    </style>
</head>
<body>
    <?php
        $cantidad = isset($_GET["cantidad"]) ? intval($_GET["cantidad"]) : 0;
        $genero = isset($_GET["genero"]) ? $_GET["genero"] : "";
        $especie = isset($_GET["especie"]) ? $_GET["especie"] : "";
        $animes = [];

        if (!empty($genero) && !empty($especie)) {
            $url = "https://rickandmortyapi.com/api/character/?species=$especie&gender=$genero";
            echo "<p>$url</p>"; // Mostrar la URL para depuración

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);

            $datos = json_decode($respuesta, true);
            $animes = isset($datos["results"]) ? $datos["results"] : [];
        }
    ?>
    
    <div class="container">
        <h2 class="mt-4">Rick & Morty API</h2>
        <form action="" method="get">
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad de Personajes</label>
                <input type="number" class="form-control" name="cantidad" id="cantidad" min="1">
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <select name="genero" id="genero" class="form-select">
                    <option value="" selected disabled hidden>Elige Género</option>
                    <option value="Male">Masculino</option>
                    <option value="Female">Femenino</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="especie" class="form-label">Especie</label>
                <select name="especie" id="especie" class="form-select">
                    <option value="" selected disabled hidden>Elige Especie</option>
                    <option value="Human">Humano</option>
                    <option value="Alien">Alien</option>
                </select>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Solicitar">
                <a href="index.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>

        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Género</th>
                    <th>Especie</th>
                    <th>Origen</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    for ($i = 0; $i < $cantidad && $i < count($animes); $i++) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($animes[$i]["name"]); ?></td>
                            <td><?php echo htmlspecialchars($animes[$i]["gender"]); ?></td>
                            <td><?php echo htmlspecialchars($animes[$i]["species"]); ?></td>
                            <td><?php echo htmlspecialchars($animes[$i]["origin"]["name"]); ?></td> 
                            <td><img src="<?php echo htmlspecialchars($animes[$i]["image"]); ?>" alt="Imagen" width="100"></td>                    
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
