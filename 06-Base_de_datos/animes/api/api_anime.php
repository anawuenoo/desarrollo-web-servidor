<?php
    /*
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    */

    header("Content-type: application/json");
    include("conexion_pdo.php");

    $metodo = $_SERVER["REQUEST_METHOD"];
    $entrada = json_decode(file_get_contents('php://input'), true);

    switch($metodo) {
        case "GET":
            manejarGet($_conexion);
            break;
        case "POST":
            manejarPost($_conexion, $entrada);
            break;
        case "PUT":
            manejarPut($_conexion, $entrada);
            break;
        case "DELETE":
            manejarDelete($_conexion, $entrada);
            break;
        default:
            echo json_encode(["mensaje" => "Petición no válida"]);
    }

    function manejarGet($_conexion) {
        //echo json_encode(["metodo" => "get"]);
       /* $sql = "SELECT * FROM animes";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute();
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);*/

        echo json_encode(["estudio" => $_GET["estudio"]]);
    }

    function manejarPost($_conexion, $entrada) { //insertar
        //echo json_encode(["metodo" => "post"]);
        $sql = "INSERT INTO animes (titulo,nombre_estudio,anno_estreno,num_temporadas,imagen) VALUES (:titulo,:nombre_estudio,:anno_estreno,:num_temporadas,:imagen)";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "titulo" => $entrada["titulo"],
            "nombre_estudio" => $entrada["nombre_estudio"],
            "anno_estreno" => $entrada["anno_estreno"],
            "num_temporadas" => $entrada["num_temporadas"],
            "imagen" => $entrada["imagen"]
        ]);
        if($stmt){
            echo json_encode(["mensaje" => "el anime se ha creado"]);
        }else{
            echo json_encode(["mensaje" => "error al crear el anime"]);
        }
    }

    function manejarPut($_conexion, $entrada) {
        echo json_encode(["metodo" => "put"]);
    }


    function manejarDelete($_conexion, $entrada) {
        //echo json_encode(["metodo" => "delete"]);
        $sql = "DELETE FROM animes WHERE nombre_estudio = :nombre_estudio";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute ([
            "nombre_estudio" => $entrada["nombre_estudio"]
        ]);
        if($stmt){
            echo json_encode(["mensaje" => "el anime se ha borrado"]);
        }else{
            echo json_encode(["mensaje" => "error al borrar el anime"]);
        }

    }
?>