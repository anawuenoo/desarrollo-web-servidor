<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <?php
      error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?> 
</head>
<body>
    <form method="POST" action="">
        <label for="numero1">Numero 1</label>
        <input type="number" name="numero1" id="numero1"><br><br>

        <label for="numero2">Numero 2</label>
        <input type="number" name="numero2" id="numero2"  ><br><br>
        <input type="submit" value="Buscador">
    </form>
<?php
    /**
     * 
     *Realiza un formulario que reciba dos números y devuelva todos los números 
     *primos dentro de ese rango (incluidos los extremos).
     * 
     */

     function numero_primo($numero) {
        if ($numero <= 1) return false;
        for ($i = 2; $i <= sqrt($numero); $i++) {
            if ($numero % $i == 0) return false;
        }
        return true;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];

        echo "Los números primos entre $numero1 y $numero2 son: ";
        for ($i = $numero1; $i <= $numero2; $i++) {
            if (numero_primo($i)) {
                echo $i . " ";
            }
        }
    }
    ?>
    
</body>
</html>