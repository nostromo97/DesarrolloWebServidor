<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap referencia -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Ejercicio 4: Agustín Arcos Reyes</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <table class="table table-success table-striped">
        <th><h5>Ejercicio 4</h5></th>
        <th><h6>Crea un array de dos dimensiones que contenga el nombre de cada persona, su apellido y su edad, que será un número aleatorio entre 0 y 100.<br>
        Muestra los datos en una tabla que además contenga una columna que indique si la persona es menor de edad, mayor de edad, o está jubilada (+65 años).
        </h6></th>
    </table>

    <?php
    /**Función que te dice si la persona es menor de edad, mayor o jubilada mediante un random de 0 a 100 de edad para cada persona.*/
    function Edad(int $a){

    $mensaje = match(TRUE){

        $a < 18 => "Persona menor de edad.",
        $a < 65 => "Persona mayor de edad.",
        $a >= 65 => "Persona jubilada.",
        };
        
        return $mensaje;
    }

    $personas = [
        ["Cheryl", "Mason"],
        ["James", "Sunderland"],
        ["Henry", "Townshend"],
        ["Dahlia", "Gillespie"],
    ];

    for($i = 0; $i < count($personas); $i++){
        $personas[$i][2] = rand(0,100);
    }

?>
    <table class="table table-warning table-hover">
        <tr>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>EDAD</th>
            <th>COLUMNA</th>
        </tr>
        <?php

    foreach($personas as $persona){

        [$nombre, $apellido, $edad] = $persona;
        ?>
        <tr>
            <td><?php echo $nombre ?></td>
            <td><?php echo $apellido ?></td>
            <td><?php echo $edad ?></td>
            <td><?php echo Edad($edad) ?></td>
        </tr>
    <?php
    }

    ?>
    </table>

</body>
</html>