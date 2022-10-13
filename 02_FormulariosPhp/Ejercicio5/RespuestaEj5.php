<?php

    $base = (int)$_GET["base"];
    $exponente = (int)$_GET["exponente"];
    $resultado = 1;

    if($exponente < 0){
        echo "<p>El exponente debe ser positivo</p>";
    } elseif($exponente == 0){
        echo "Resultado: $resultado";
    } else {
        for($i = 1; $i<= $base; $i++){
            $resultado = $resultado * $exponente;
        }
    }

?>

<h5><a href="../../02_formularios_php/index.php">■ Volver a la página principal ■</a></h5>