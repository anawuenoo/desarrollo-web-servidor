<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        $url = "http://localhost/desarrollo-web-servidor/06-Base_de_datos/animes/api/apis.php";
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL, $url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
        $repuesta = curl_exec($curl);
        curl_close($curl);

        $estudio = json_decode($repuesta,true);

        //print_r($estudio);
        
    ?>
    <table>
        <thead>
            <tr>
                <th>Estudio</th>
                <th>Ciudad</th>
                <th>Año de fundacion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($estudio as $estudio) { ?>
            <tr>
                <td><?php echo $estudio["nombre_estudio"] ?></td>
                <td><?php echo $estudio["ciudad"] ?></td>
                <td><?php echo $estudio["anno_fundacion"] ?></td>
            </tr>
        <?php }  ?>
        </tbody>
    </table>
</body>
</html>