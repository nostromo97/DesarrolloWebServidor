<?php

    $numero = $_GET["numero"];

    $resultado = 0;
    if($numero >= 1){
        for($i = 1; $i <= $numero; $i++){
            $resultado = $resultado * $i;
            // $resultado *= $i (Resultado alternativo)
        }
    
        echo "<p>Resultado: $resultado</p>";
    }else{
        echo "El número debe ser igual o más que 1";
    }
    
?>

<h5><a href="../../02_formularios_php/index.php">■ Volver a la página principal ■</a></h5>