<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap referencia -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Ejercicio 2: Agustín Arcos Reyes</title>
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <table class="table table-success table-striped">
        <th><h5>Ejercicio 2</h5></th>
        <th><h6>Modifica el array anterior para que además de los productos y sus precios almacenen la cantidad que se ha comprado de cada producto.<br>
         Muestra en una columna adicional el precio total de cada producto (producto x cantidad) y al final de la tabla el precio total de todos los productos comprados <br>
         y la cantidad de productos adquiridos.

        </h6></th>
    </table>

    <?php

        $productos = [

        ["79.95", "Callisto Protocol", 20],
        ["89.95", "Resident Evil 4: Remake", 50],
        ["56.95", "A Plague Tale: Requiem", 40],
        ["89.95", "Silent Hill f", 55],
        ];

        $contador = 0;

    ?>

    <!-- Tabla con productos, precios, cantidades, total y precio total -->
        <table class="table table-dark table-striped-columns">
    <tr>
        <th>NOMBRE</th>
        <th>CANTIDAD</th>
        <th>PRECIO</th>
        <th>TOTAL</th>
        <th>PRECIO TOTAL</th>
    </tr>

    <?php
    foreach($productos as $producto){
    [$precio,$nombre,$cantidad] = $producto;
    $contador += $precio*$cantidad;
    ?>
    <tr>
        <td><?php echo $nombre ?></td>
        <td><?php echo $precio ?></td>
        <td><?php echo $cantidad ?></td>
        <td><?php echo $precio*$cantidad ?></td>
        <td></td>
    </tr><?php

    }
    ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?php echo $contador ?></td>
    </tr>
    </table>
    
</body>
</html>