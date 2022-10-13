
<?php
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $numero = $_POST["numero"];

    echo "Nombre: $nombre <br> Edad: $edad";
    
    for($i =1; $i <= $numero; $i++){
    echo "<li> $i </li>";
    }

?>
