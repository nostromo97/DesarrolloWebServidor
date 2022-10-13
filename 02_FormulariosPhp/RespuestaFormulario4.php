<?php

    $frase = $_GET["frase"];
    $tamanoFrase = (int)$_GET["tamanoFrase"];

    if($tamanoFrase >= 1 && $tamanoFrase <= 6){
        echo "<h$tamanoFrase>$frase</h$tamanoFrase>";
    }else{
        echo "<p>Incorrecto.</p>";
    }

?>