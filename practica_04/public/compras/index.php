<html>
<head>
    <title>Ropa Linda: Lista de Compras</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<?php 
require "../../utilDB/sesion.php";
?>
<?php require '../../utilDB/database.php' ?>

<?php 
if($_SESSION['rol'] == "cliente"){
    header("location: comprasUsuario.php");
}
?>

<div class="container">
<?php require "../../header.php" ?>
<h1>Lista de Compras</h1>
<table class="table table-striped table-hover">
    <thead class="table-primary">
        <tr>
            <th>Cliente</th>
            <th>Prenda</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Fecha</th>
            <th>Precio Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM vw_clientes_prendas";
            $resultado = $conexion -> query($sql);

            if($resultado -> num_rows > 0){

                while($fila = $resultado -> fetch_assoc()){

                    $usuario = $fila['usuario'];
                    $producto = $fila["nombre"];
                    $cantidad = $fila['cantidad'];
                    $precio_unitario = $fila["precio"];
                    $fecha = $fila['fecha'];

                    ?>
                    <tr>
                        <td><a href="comprasUsuario.php?usuario=<?php echo $usuario?>"><?php echo $usuario ?></a></td>
                        <td><?php echo $producto ?></td>
                        <td><?php echo $cantidad ?></td>
                        <td><?php echo $precio_unitario . "€" ?></td>
                        <td><?php echo $fecha ?></td>
                        <td><?php echo $precio_unitario*$cantidad . "€"?></td>
                    </tr>
                    <?php

                }

            }
            ?>
    </tbody>
</table>
</body>
</html>