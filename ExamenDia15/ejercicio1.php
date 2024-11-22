<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_nombre = $_POST["nombre"];
            $tmp_peso = $_POST["peso"];
            if(isset($_POST["género"])) $tmp_genero = $_POST["género"];
            else $tmp_genero = "";
            $tmp_tipo = $_POST["tipo"];
            $tmp_fecha_captura = $_POST["fecha_captura"];
            $tmp_descripcion = $_POST["descripcion"];
            
            /*NOMBRE */
            if($tmp_nombre == '') {
                $err_nombre = "El nombre es obligatorio";
            } else {
                    $patron = "/^[a-zA-Z0-9\ áéíóúÁÉÍÓÚñ]{3,30}+$/";
                    if(!preg_match($patron, $tmp_nombre)) {
                        $err_nombre = "El nombre solo pude contener letras en mayúsculas y minúsculas (con tilde) y tener entre 3 y 30 carácteres.";
                    } else {
                        $nombre = $tmp_nombre;
                    }
                }

                /*PESO */
                if($tmp_peso == '') {
                    $err_peso = "El peso es obligatorio";
                } else {
                        $patron = "/^[0.1-999.9]+$/";
                        if(!preg_match($patron, $tmp_peso)) {
                            $err_peso = "El peso solo pude contener numeros entre 0.1 a 999.99.";
                        } else {
                            $peso = $tmp_peso;
                        }
                    }

                /*GENERO */
                    $genero_valido = ["Hembra","Macho"];
                    if(!in_array($tmp_genero, $genero_valido)) {
                        $err_genero = "Elige un genero valido";
                    } else {
    
                    }
                

                /*TIPO */
                    $tipo = ["Agua","Fuego","Volador","Planta","Eléctrico"];
                    if (!in_array($tmp_tipo,$tipo)) {
                    $err_tipo = "Seleccione un tipo correcto.";
                    }else{
                    $tipo = $tmp_tipo;
                    }
                
               
                /*FECHA DE CAPTURA */
                if($tmp_fecha_captura == '') {
                    $err_fecha_captura = "La fecha de captura es obligatoria";
                } else {
                    $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                    if(!preg_match($patron,$tmp_fecha_captura)) {
                        $err_fecha_captura = "El formato de la fecha es incorrecto";
                    } else {
                        list($anno,$mes,$dia) = explode('-',$tmp_fecha_captura);
                        if($anno < 1994) {
                            $err_fecha_captura = "El año no puede ser anterior a 1994";
                        } else {
                            $anno_actual = date("Y");
                            $mes_actual = date("m");
                            $dia_actual = date("d");
                            if($anno - $anno_actual > 30) {
                                $err_fecha_captura = "El pokemon 
                                    no puede lanzarse dentro de más de 30 años";
                            } elseif($anno - $anno_actual < 30) {
                                //  FECHA VÁLIDA
                                $err_fecha_captura = $tmp_fecha_captura;
                            } else {
                                if($mes - $mes_actual < 0) {
                                    //  FECHA VÁLIDA
                                    $fecha_captura = $tmp_fecha_captura;
                                } elseif($mes - $mes_actual > 0) {
                                    $err_fecha_captura = "El pokemon 
                                        no puede lanzarse dentro de más de 30 años";
                                } else {
                                    if($dia - $dia_actual > 0) {
                                        $err_fecha_captura = "El pokemon 
                                            no puede lanzarse dentro de más de 30 años";
                                    } elseif($dia - $dia_actual <= 0) {
                                        $fecha_captura= $tmp_fecha_captura;
                                    }
                                }
                            }
                        }
                    }
                }

                /* DESCRIPCION */
                if(strlen($tmp_descripcion) > 200) {
                    $err_descripcion = "La descripción no puede tener más de 200 caracteres";
                } else {
                    $patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚñ]+$/";
                    if(!preg_match($patron, $tmp_descripcion)) {
                        $err_descripcion = "La descripción solo puede contener letras con o sin tilde y espacios en blanco";
                    } else {
                        $descripcion = $tmp_descripcion;
                    } 
                }
        }
        ?>
<div class="container">
        <h1>Formulario Pokémons</h1>
        <form class="col-5" action="" method="post"> 

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre *</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
                <?php if (isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
            </div>

            <div class="mb-3">
                <label for="peso" class="form-label">Peso *</label>
                <input type="text" class="form-control" name="peso" id="peso">
                <?php if (isset($err_peso)) echo "<span class='error'>$err_peso</span>" ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Género</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="hembra">
                    <label class="form-check-label">Hembra</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="macho">
                    <label class="form-check-label">Macho</label>
                </div>
                <?php if(isset($err_genero)) echo "<span class='error'>$err_genero</span>" ?>
            </div>

            <div class="mb-4">
                <label for="tipo" class="form-label">Tipo *</label>
                <select name="tipo" class="form-select" id="tipo">
                    <option value="agua">Agua</option>
                    <option value="fuego">Fuego</option>
                    <option value="volador">Volador</option>
                    <option value="planta">Planta</option>
                    <option value="electrico">Eléctrico</option>
                </select>
                <?php if (isset($err_liga)) echo "<span class='error'>$err_liga</span>" ?>
            </div>

            <div class="mb-3">
                <label for="fecha_captura" class="form-label">Fecha de captura *</label>
                <input type="date" class="form-control" name="fecha_captura" id="fecha_captura">
                <?php if (isset($err_fecha_captura)) echo "<span class='error'>$err_fecha_captura</span>" ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion"></textarea>
                <?php if(isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>" ?>
            </div>
            
            <div class="mb-3">
                <input type="submit" value="Enviar" class="btn btn-primary">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>