<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog by Breed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1); 
    ?>
</head>
<body>
    <div class="container mt-5">
        <h1>Seleciona un raza de perro</h1>
        <?php 
            $url = "https://dog.ceo/api/breeds/list/all";
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);

            $datos = json_decode($respuesta, true);
            $breeds = $datos["message"];
        ?>

        <form action="" method="get">
            <select name="breeds" class="form-select w-50 my-3">
                <?php foreach ($breeds as $breed => $subbreeds) { ?>
                    <option value="<?php echo $breed; ?>"><?php echo $breed; ?></option>
                        <?php foreach ($subbreeds as $subbreed) { ?>
                    <option value="<?php echo $breed . '/' . $subbreed; ?>">
                        <?php echo $breed . " " . $subbreed; ?>
                    </option>
                        <?php } ?>
                <?php } ?>
            </select>
                <input type="submit" value="Show Dog" class="btn btn-success">
        </form>


        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["breeds"])) {
                $selectedBreed = $_GET["breeds"];
                $url = "https://dog.ceo/api/breed/$selectedBreed/images/random";
                
                $curl = curl_init();          
                curl_setopt($curl, CURLOPT_URL, $url);           
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);          
                $respuesta = curl_exec($curl);
                curl_close($curl);

                $datos = json_decode($respuesta, true);
                $dogImage = $datos["message"];
            }
        ?>
        <br>
        <?php if (isset($dogImage)) { ?>
            <img src="<?php echo $dogImage; ?>" alt="Dog Breed" class="img-fluid rounded">
        <?php } ?>
    </div>
</body>
</html>
