<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
</head>
<body>
    <!--
    CREAR UN FORMULARIO QUE RECIBA DOS VALORES: EL NOMBREE Y LA EDAD DE UNA PERSONA

    Si la persona tiene:

        <18 años, se mostrará "X ES MENOR DE EDAD" (X es el nombre)
        >= 18 && < 65, se mostrará "X ES MAYOR DE EDAD"
        >= 65, se mostrará "X SE HA JUBILADO"
        Hacer la lógica con la estructura MATCH

    -->
    <form action="" method="post">
        <input type="text" name="nombre"><br><br>
        <input type="text" name="edad"><br><br>
        <input type="submit" value="Comprobar">
    </form>

    <?php
    function depurar (string $entrada) : string{
        $salida = htmlspecialchars($entrada); //como texto plano
        $salida = trim($salida);//quitar los espacios en blanco de los lados
        $salida = preg_replace('/\s+/', ' ', $salida);//quitaba los esapcios en blanco en uno, siempre deja uno, 
        return $salida;
        //'  pepe   luis  ' -> 'pepe luis'
    }
    ?>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = depurar($_POST ["nombre"]);
        $edad = depurar($_POST ["edad"]); 
        $resultado = match (true) {
            $edad <18 => "es menor de edad",
            $edad >=18 and $edad < 65 => "es mayor de edad",
            $edad >=65 => "es menor de edad"
        };
        
        echo "<h1> $nombre $resultado</h1>";
        
    }
    ?>
</body>
</html>