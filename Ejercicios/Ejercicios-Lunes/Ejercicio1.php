<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <?php
      error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    /**
     *  Realiza un formulario que reciba 3 números y devuelva el mayor de ellos
     */
    ?>

    <form action="" method="post">
        <label for = "numeros">Numero mayor</label>
        <input type = "number" name="num1" id="num1">
        <input type = "number" name="num2" id="num2">
        <input type = "number" name="num3" id="num3">
        <input type = "submit" value="Enviar">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $num3 = $_POST["num3"];

            $mayor = max($num1,$num2,$num3);
            
            echo "<p>El numero $mayor es el mayor</p>";
        }
    ?>
</body>
</html>