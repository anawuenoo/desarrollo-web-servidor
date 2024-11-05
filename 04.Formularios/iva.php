<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IVA</title>
    <?php
      error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <?php
    //declaracion de constante, para hacerlo mas facil ya que si cambian los porceranjes de los impuesto no hay q cambairlo en todo el codigo.
      define("GENERAL",1.21);
      define("REDUCIDO",1.1);
      define("SUPERREDUCIDO",1.04);
    ?>
</head>
<body>
    <form action="" method="post">
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio"><br><br>
        <label for="iva">IVA</label>
        <select name = "iva" id="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducido</option>

        </select><br><br>
        <input type="submit" value="Calcular PVP">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $precio = $_POST["precio"];
        $iva = $_POST["iva"];
    
        $pvp = match($iva){
            "general" => $precio * GENERAL,
            "reducido" => $precio * REDUCIDO,
            "superreducido" => $precio * SUPERREDUCIDO
        };
        echo "<p> $precio </p>";
    }
    ?>
</body>
</html>