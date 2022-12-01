<html>
<head>
    <title>Ropita Linda: Categoría</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<?php require '../../utilDB/database.php' ?>

<div class="container">
<?php require "../../header.php" ?>
    <h1>Nuestras prendas</h1>

    <div class="row">
        <div class="col-9">
            <table class="table table-striped table-hover">
                <thead class="table-info">
                    <tr>
                        <th>Nombre</th>
                        <th>Talla</th>
                        <th>Precio</th>
                        <th>Categoría</th>
                    </tr>
                </thead>
                <tbody >
                <?php
                    $sql = "SELECT * FROM prendas WHERE categoria = '" . $_GET['Categoria'] . "'";
                    $resultado = $conexion -> query($sql);

                    if($resultado -> num_rows > 0){

                        while($fila = $resultado -> fetch_assoc()){
                            
                            $nombre = $fila["nombre"];
                            $talla = $fila["talla"];
                            $precio = $fila["precio"];
                            $categoria = $fila["categoria"];
                ?>
                        <tr>
                            <td><?php echo $nombre ?></td>
                            <td><?php echo $talla ?></td>
                            <td><?php echo $precio . "€"?></td>
                            <td><?php echo $categoria ?></td>
                        </tr>
                        <?php
                        }

                    }
                    
                ?>
                </tbody>
            </table>
            <br>
            <a class="btn btn-secondary" href="insertarPrenda.php">Insertar Prendas</a>
        </div>
        <div class="col-3">
            <img width="100%" height="100%" src="../../resources/images/ropa.jpg">
        </div>
    </div>
</div>


</body>
</html>