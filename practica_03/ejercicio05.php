<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap referencia -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Ejercicio 5: Agustín Arcos Reyes</title>
</head>

<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <table class="table table-success table-striped">
        <th><h5>Ejercicio 5</h5></th>
        <th><h6>Crea un array que contenga el DNI y el nombre de cada persona. <br>
        Muestra esa información en una tabla en la que además indiques si el DNI introducido es correcto.
        </h6></th>
    </table>

    <?php

    /**Función para comprobar si la letra de DNI introducida es incorrecta.
     * Return devuelve el mensaje si el DNI es correcto o incorrecto.
     */
    function comprobar(String $a){

    $dniNumero = substr($a , 0, strlen($a)-1);
    $dniLetra = substr($a ,strlen($a)-1 , strlen($a));
    $mensaje;

    $letra = match($dniNumero%23){
        0 => "T",
        1 => "R",
        2 => "W",
        3 => "A",
        4 => "G",
        5 => "M",
        6 => "Y",
        7 => "F",
        8 => "P",
        9 => "D",
        10 => "X",
        11 => "B",
        12 => "N",
        13 => "J",
        14 => "Z",
        15 => "S",
        16 => "Q",
        17 => "V",
        18 => "H",
        19 => "L",
        20 => "C",
        21 => "K",
        22 => "E",
        default => "El DNI no es váldio.",

    };

    if($dniLetra === $letra){
        $mensaje = "Correcto";
    }
    else{
        $mensaje = "Incorrecto";
    }

     return $mensaje;

}

    $personas = [

    "46587654T" => "Agustín",
    "89765476O" => "Manolo",
    "98767567E" => "Antonio"
    ];
?>

<table class="table table-bordered border-primary">
    <tr>
        <th>nombre</th>
        <th>DNI</th>
        <th>comprobación</th>
    </tr>
    <?php

    foreach($personas as $dni => $nombre){
    ?>
        <tr>
            <td><?php echo $nombre; ?></td>   
            <td><?php echo $dni; ?></td>
            <td><?php echo comprobar($dni); ?></td>     
        </tr>
        <?php
       }
?>

</table>
</body>
</html>