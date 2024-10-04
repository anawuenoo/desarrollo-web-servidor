<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listas</title>
</head>
<body>
<h3>Lista 1</h3>
    <?php 
    $i = 1;
    echo "<ul>";
    while($i < 10){
        echo "<li>$i</li>";
        $i++;
    }
    echo "</ul>";
    
    ?> 
<h3>Lista 2</h3>
<?php 
   $i = 1;
   echo "<ul>";
   while($i < 10):
       echo "<li>$i</li>";
       $i++;
   endwhile;
   echo "</ul>";
   ?> 
   <h3>Lista 3</H3>
   <?php 
  
   /*con while y las estructuras de control necesarias, muestra en una lista sin ordenar todos los multiplos de 3 entre 1 y 30*/

        $i=1;
        echo"<ul>";
        while($i <= 30) :
            if($i % 3 == 0):
            echo "<li>$i</li>";
            endif;
            $i++;
            endwhile;
        echo"</ul>";   

        

    ?> 
    
    <h3>Lista con DO WHILE </H3>
    <?php 
 
   $i = 1;
   echo "<ul>";
   do{
    echo "<li>$i</li>";
    $i++;
   } while ($i <= 10);
   echo "</ul>";
 

    ?> 

<h3>Lista con FOR </H3>
    <?php 

  echo "<ul>";
  for($i = 1; $i <= 10; $i++){
    echo "<li>$i</li>";
  }
  echo "</ul>";

    ?>

<h3>Lista con FOR 2</H3>
    <?php 

  echo "<ul>";
  for($i = 1; ; $i++){
    if($i >= 10) break;
    echo "<li>$i</li>";
  }
  echo "</ul>";

    ?>
    
 <h3>Lista con FOR 3 </H3>
    <?php 
$var=true;
  echo "<ul>";
  for($i = 1; $i <= 10 && $var == true; $i++){
    echo "<li>$i</li>";
  }
  echo "</ul>";

    ?>   
</body>
</html>