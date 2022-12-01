<html>
<head>
    <title>Ropa Linda: Compras</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<?php 
require "../../utilDB/sesion.php";
?>
<?php require '../../utilDB/database.php' ?>

<div class="container">
<?php require "../../header.php" ?>
<?php if ($_SESSION['rol']=="administrador"){$usuario = $_GET['usuario'];} ?>

<?php
    if($_SESSION['rol'] == "cliente"){

        $usuario = $_SESSION['usuario'];

    }
    ?>
    <h1>Compras del Usuario: <?php echo $usuario ?></h1>
    <?php
    $sql_vista = "SELECT * FROM vw_clientes_prendas WHERE usuario ='" . $usuario . "'";
    $sql_cliente = "SELECT * FROM clientes WHERE usuario='" . $usuario . "'";

    $resultado_cliente = $conexion -> query($sql_cliente);
    $resultado_vista = $conexion -> query($sql_vista);

    $fila_cliente = $resultado_cliente -> fetch_assoc();

    $contador = 0;
    

?>  
<table class="table table-striped table-hover">
    <thead class="table-primary">
        <tr>
            <th>Usuario</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Fecha</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($fila_vista = $resultado_vista -> fetch_assoc()){
            
            $producto = $fila_vista['nombre'];
            $cantidad = $fila_vista['cantidad'];
            $precio = $fila_vista['precio'];
            $fecha = $fila_vista['fecha'];
            $contador += $cantidad*$precio;
        ?>
        <tr>
            <td><?php echo $fila_cliente['nombre'] . " " . $fila_cliente['primer_apellido'] . " " . $fila_cliente['segundo_apellido'] ?></td>
            <td><?php echo $producto ?></td>
            <td><?php echo $cantidad ?></td>
            <td><?php echo $precio . "€"?></td>
            <td><?php echo $fecha ?></td>
            <td>-----</td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td>-----</td>
            <td>-----</td>
            <td>-----</td>
            <td>-----</td>
            <td>-----</td>
            <td><?php echo $contador . "€"?></td>
    </tbody>
</table>    
</body>
</html>