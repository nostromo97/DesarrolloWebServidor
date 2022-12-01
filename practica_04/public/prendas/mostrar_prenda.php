<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Prenda</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<?php 
require "../../utilDB/sesion.php";
?>
<div class="container">
<?php require "../../header.php";
require "../../utilDB/database.php";
?>
    <br>
    <div class="row">
        <div class="col-6">
            <?php

                $id = $_GET['id'];
                $sql = "SELECT * FROM prendas WHERE id =" . $id;
                $resultado = $conexion -> query($sql);


                if($resultado -> num_rows > 0){

                    while($fila = $resultado -> fetch_assoc()){

                        $nombre = $fila['nombre'];
                        $talla = $fila['talla'];
                        $precio = $fila['precio'];
                        $categoria = $fila['categoria'];
                        $imagen = $fila['imagen'];

                    }       
                }
            ?>
            <div class="form-group mb-3">
                <h1><?php echo $nombre ?> </h1>
            </div>
            <div class="form-group mb-6">
                <h2>Talla disponible: <?php echo $talla ?> </h2>
            </div>
            <div class="form-group mb-6">
                <h1>Precio: <?php echo $precio ?>€ </h1>
            </div>
            <div class="form-group mb-6">
                <h1>Tipo: <?php echo $categoria ?> </h1>
            </div>
        </div>
        <div class="col-6">
            <img witdh="200" height="300" src="../..<?php echo $imagen ?>"> 
            <br>   
            
        </div>
    </div>
    <a class="btn btn-primary" href="index.php">Volver</a>
</div>
</body>
</html>