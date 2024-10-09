<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de multiplicars</title>
</head>
<body>
    <!--
        Crear un formulario que reciba un número.Se mostrará en una tabla HTML la 
        tabla de multiplicar de ese número. Ejemplo:
         3 x 1 = 3
         3 x 2 = 6
         3 x 3 = 9
         ...
         3 x 10 = 30
    -->
         

   
    <form action="" method="post">
        <label for = "numero">Numero</label>
        <input type="text" name="numero1" id="numero1" placeholder="Introduce un número">
        <br><br>
        <input type="submit" value="Genera tabla de multiplicar">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $numero1 = $_POST["numero1"];
    

        for($i = 1; $i <= 10; $i++){
            echo "<p>$numero x $i  = " . $numero*$i . "</p>";

           
        }
    }
    
    
    ?>
   
</body>
</html>