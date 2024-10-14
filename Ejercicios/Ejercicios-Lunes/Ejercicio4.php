<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejericio 4</title>
    <?php
      error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?> 
</head>
<body>
    <?php
   
    ?>
<form action="" method="POST">

        <label for = "grados">Conversor de Temperaturas</label>
        <input type="text" name="grados" id="grados">   
        <select name="num1" id="num1">
            <option value="Celsius">Celsius</option>
            <option value="Kelvin">Kelvin</option>
            <option value="Fahrenheit">Fahrenheit</option>
        </select>
        <br>
        <br>
    
        <select name="num2" id="num2">
            <option value="Celsius">Celsius</option>
            <option value="Kelvin">Kelvin</option>
            <option value="Fahrenheit">Fahrenheit</option>
        </select>
        <br>
        <br>

        <input type="submit" value="Convertir">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $grados = $_POST["grados"];
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];

        function convertir($grados, $num1, $num2) {
            if ($num1 == $num2) return $grados;
            
            if ($num1 == "Celsius") {
                if ($num2 == "Kelvin") return $grados + 273.15;
                if ($num2 == "Fahrenheit") return ($grados * 9/5) + 32;
            }
            if ($num1 == "Kelvin") {
                if ($num2 == "Celsius") return $grados - 273.15;
                if ($num2 == "Fahrenheit") return ($grados - 273.15) * 9/5 + 32;
            }
            if ($num1 == "Fahrenheit") {
                if ($num2 == "Celsius") return ($grados - 32) * 5/9;
                if ($num2 == "Kelvin") return ($grados - 32) * 5/9 + 273.15;
            }
            return null;
        }

        $resultado = convertir($grados, $num1, $num2);
        echo "$grados grados $num1 son $resultado grados $num2.";
    }
    ?>
    
</body>
</html>