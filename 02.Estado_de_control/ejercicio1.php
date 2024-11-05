<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
/* EJERCICIO 1
CALCULA LA SUMA DE TODOS LOS NUMEROS PARES DEL 0 AL 20
$suma = 0;
for($i=0; $i<=20;$i+=2){
$suma+=$i;
}
echo"La suma de todos los numeros pares de 0 al 20 es $suma ";*/

/*EJERCICIO 2
(HAY QUE INVESTIGAR UN POCO)
MUESTRA POR PANTALLA LA FECHA ACTUAL CON EL SIGUIENTE FORMATO:
Miercoles 25 de Septiembre de 2024*/
$dia_espanol = null ;
switch($dia){
    case'Monday':
        $dia_espanol='Lunes';
    case'Tuesday':
        $dia_espanol='Martes';
    case'Wednesday':
        $dia_espanol='Miercoles';
    case'Thursday':
        $dia_espanol='Jueves';
    case'Friday':
        $dia_espanol='Viernes';
   
        break;
    }
    switch($mes){
        case'January':
            $mes='Enero';
        case'February':
            $mes='Febrero';
        case'March':
            $mes='Marzo';
        case'April':
            $mes='Abril';
        case'June':
            $mes='Junio';
        case'July':
            $mes='Julio';
        case'August':
            $mes='Agosto';
        case'September':
            $mes='Septiembre';
        case'November':
            $mes='Noviembre';
        case'December':
            $mes='Diciembre';
       
            break;
        }
echo ("");




    ?>
</body>
</html>