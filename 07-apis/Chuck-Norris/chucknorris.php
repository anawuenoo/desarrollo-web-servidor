<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chistes de Chuck Norris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php 
        // Obtener las categorías desde la API
        $urlCategories = "https://api.chucknorris.io/jokes/categories";
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $urlCategories);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        $categories = json_decode($response, true);
    ?>
    <div class="container mt-5">
        <h1 class="mb-4">Generador de Chistes de Chuck Norris</h1>
        <form action="" method="get">
            <div class="mb-3">
                <label for="category" class="form-label">Selecciona una categoría</label>
                <select name="category" id="category" class="form-select">
                    <option value="" disabled selected hidden>Selecciona una categoría</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category; ?>"><?php echo ucwords($category); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Generar Chiste</button>
        </form>

        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["category"])) {
                $selectedCategory = $_GET["category"];
                $jokeUrl = "https://api.chucknorris.io/jokes/random?category=$selectedCategory";

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $jokeUrl);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $jokeResponse = curl_exec($curl);
                curl_close($curl);

                $jokeData = json_decode($jokeResponse, true);
                $jokeText = $jokeData["value"];
            }
        ?>

        <?php if (!empty($jokeText)): ?>
            <div class="alert alert-success mt-4">
                <strong>Chiste:</strong> <?php echo $jokeText; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
