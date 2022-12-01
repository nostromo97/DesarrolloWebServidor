<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap referencia -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Ejercicio 1: Agustín Arcos Reyes 2DAW</title>
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <table class="table table-success table-striped">
        <th><h5>Ejercicio 1</h5></th>
        <th><h6>Crea un array que almacene nombres de productos y sus respectivos precios.<br>
         Muestra en una tabla los productos con sus precios, ordenados alfabéticamente por el nombre del producto. <br>
         Muestra también el precio total de todos los productos y cuántos productos hay en el array.
        </h6></th>
    </table>
    <?php

        $productos = [

        "79.95" => "Callisto Protocol",
        "89.95" => "Resident Evil 4: Remake",
        "56.95" => "A Plague Tale: Requiem",
        "89.95" => "Silent Hill f"];

        $contador = 0;

        asort($productos);

    ?>

    <!-- Tabla con productos y precios -->
        <table class="table table-dark table-striped-columns">
    <tr>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>_TOTAL_</th>
    </tr>
    <?php
    foreach($productos as $precio => $producto){
    $contador += $precio; 
    ?>
    <tr>
        <td><?php echo $producto ?></td>
        <td><?php echo $precio ?></td>
        <td></td>
    </tr><?php

    }
    ?>
    <tr>
        <td></td>
        <td></td>
        <td><?php echo $contador ?></td>
    </tr>
</table>
    
</body>
</html>