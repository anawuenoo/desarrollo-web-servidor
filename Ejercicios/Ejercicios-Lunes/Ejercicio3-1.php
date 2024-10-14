<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Números Primos</title>
    <?php
        // Mostrar todos los errores (esto es útil en desarrollo)
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>

    <h2>Encuentra los números primos dentro de un rango</h2>

    <!-- Formulario HTML para recibir los dos números -->
    <form method="POST" action="">
        <label for="numero1">Número 1:</label>
        <input type="number" id="numero1" name="numero1" required><br><br>

        <label for="numero2">Número 2:</label>
        <input type="number" id="numero2" name="numero2" required><br><br>

        <input type="submit" value="Encontrar Primos">
    </form>

    <?php
    // Función para verificar si un número es primo
    function numero_primo($numero) {
        if ($numero <= 1) return false; // Números menores o iguales a 1 no son primos
        for ($i = 2; $i <= sqrt($numero); $i++) {
            if ($numero % $i == 0) return false; // Si tiene divisores, no es primo
        }
        return true; // Si no tiene divisores, es primo
    }

    // Verificar si el formulario fue enviado con método POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los números ingresados por el usuario
        $numero1 = intval($_POST['numero1']);
        $numero2 = intval($_POST['numero2']);

        // Validar que el primer número sea menor que el segundo
        if ($numero1 > $numero2) {
            echo "<p style='color: red;'>El primer número debe ser menor o igual que el segundo.</p>";
        } else {
            echo "<h3>Los números primos entre $numero1 y $numero2 son:</h3>";
            $encontroPrimos = false;

            // Recorrer el rango y mostrar los números primos
            for ($i = $numero1; $i <= $numero2; $i++) {
                if (numero_primo($i)) {
                    echo $i . " "; // Imprimir el número primo
                    $encontroPrimos = true;
                }
            }

            if (!$encontroPrimos) {
                echo "No se encontraron números primos en este rango.";
            }
        }
    }
    ?>
</body>
</html>
