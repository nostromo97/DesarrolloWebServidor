<html>
<head>
    <title>Insertar Prenda</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<?php 
require "../../utilDB/sesion.php";
?>
<?php
require '../../utilDB/database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nombre = $_POST['nombre'];
    $talla = $_POST['talla'];
    $precio = $_POST['precio'];
    

    if(isset($_POST['categoria'])){

        $categoria = $_POST['categoria'];

    }
    else{

        $categoria = "";
    }

    $file_name = $_FILES['imagen']['name'];
    $file_temp_name = $_FILES['imagen']['tmp_name'];
    $path = "../../resources/images/prendas/" . $file_name;
    $imagen = "../../resources/images/prendas/" . $file_name;

    if(!empty($nombre) && !empty($talla) && !empty($precio) && !empty($categoria)){

        $imagen = "/resources/images/prendas/" . $file_name;

        $sql = "INSERT INTO prendas (nombre, talla, precio, categoria, imagen)
                VALUES ('$nombre', '$talla', '$precio', '$categoria', '$imagen')";

        if($conexion -> query($sql) == "TRUE"){

            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Producto registrado</strong>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
            <?php

            if(move_uploaded_file($file_temp_name, $path)){
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Fichero movido exitosamente</strong>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> 
                <?php
            }
            else{
        
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR:</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
        
            }

        }
        else{

            ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>ERROR:</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        }
    }
    else{
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>ERROR:</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        
    }

}
?>
<div class="container">
    <h1>Nueva Prenda</h1>

    <div class="row">
        <div class="col-6">
            <form action="" method="post" enctype="multipart/form-data">  
                <div class="form-group mb-3">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" type="text" name="nombre">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Talla</label>
                    <select name="talla" class="form-select">
                        <option value="" selected disable hidden>-- Talla --</option>
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Precio</label>
                    <input class="form-control" type="text" name="precio">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Categoría</label>
                    <select name="categoria" class="form-select">
                        <option value="" selected disabled hidden>-- Selecciona una categoría --</option>
                        <option value="Camisetas">Camisetas</option>
                        <option value="Pantalones">Pantalones</option>
                        <option value="Accesorios">Accesorios</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Imagen</label>
                    <input type="file" name="imagen" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-primary" type="submit">Crear</button>
                    <a class="btn btn-secondary" href="index.php">Listado Prendas</a>
                </div>
        </div>
    </div>

</div>
</body>
</html>