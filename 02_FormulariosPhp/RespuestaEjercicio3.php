<?php

    $nombre = $_GET["nombre"];
    $edad = (int)$_GET["edad"];

    /* Función ucwords pone to las palabras la primera en minúsucla.
    */
    $nombre = ucwords(strtolower($nombre));

    if($edad < 18 && $edad >=0){
        echo "<p>$nombre, eres menor de edad</p>";
    }elseif($edad >= 18 && $edad <65){
        echo "<p>$nombre, eres mayor de edad</p>";
    }elseif ($edad >= 65 && $edad <= 118){
        echo "<p>$nombre, estas jubilado</p>";
    }else {
        echo "<p>Incorrecto</p>";
    }

?>