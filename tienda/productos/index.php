<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );  

        require('../conexion.php')
    ?>
</head>
<body>
    <div class="container">
        <?php
            $sql = "SELECT * FROM productos";
            $resultado = $_conexion -> query($sql);
        ?>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>

            
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $resultado -> fetch_assoc()) {
                    echo"<tr>";
                    echo"<td>" .$fila["nombre"] . "</td>";
                    echo"<td>" .$fila["precio"] . "</td>";
                    echo"<td>" .$fila["stock"] . "</td>";
                    echo"<td>" .$fila["descripcion"] . "</td>";
                    echo"<td>" .$fila["imagen"] . "</td>";
                    echo"</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>