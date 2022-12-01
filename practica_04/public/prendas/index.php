<html>
<head>
    <title>Ropa Linda: Prendas</title>
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
    <h1>Productos</h1>

    <div class="row">
        <div class="col-9">
            <table class="table table-striped table-hover">
                <thead class="table-secondary">
                    <tr>
                        <th>Nombre</th>
                        <th>Talla</th>
                        <th>Precio</th>
                        <th>Categoria</th>
                        <th>Ver</th>
                        <th>Comprar</th>
                        <th></th>
                        <th></th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody >
                <?php

                    if($_SERVER["REQUEST_METHOD"] == "POST"){

                        if(!isset($_POST["cantidad"])){

                            $id_delete = $_POST["id_delete"];
                            $imagenDelete = $_POST["imagenDelete"];
                            $sql_delete = "DELETE FROM prendas WHERE id=$id_delete";
                            
                            if($conexion -> query($sql_delete) == "TRUE"){

                                unlink("../..$imagenDelete");
                                ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Producto eliminado</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div> 
                                <?php
                            }
                            else{
                                ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>No se ha podido eliminar</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div> 
                                <?php
                            }
                            
                        }
                        else{
                            
                            $id_cliente = $_SESSION['id'];
                            $id_producto = $_POST['id_producto'];
                            $cantidad_producto = $_POST['cantidad'];
                            $fecha_hoy = date("Y-m-d");
                            $sql_comprar = "INSERT INTO clientes_prendas (cliente_id, prenda_id, cantidad, fecha)
                                            VALUES ('$id_cliente', '$id_producto' , '$cantidad_producto' , '$fecha_hoy')";

                            if($conexion -> query($sql_comprar) == "TRUE"){
                                ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Gracias por su compra!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div> 
                                <?php
                            }
                            else{
                                ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Lo sentimos, no pudo realizarse la compra</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div> 
                                <?php
                            }
    
                        }
                    }

                    $sql = "SELECT * FROM prendas";
                    $resultado = $conexion -> query($sql);

                    if($resultado -> num_rows > 0){

                        while($fila = $resultado -> fetch_assoc()){

                            $id = $fila["id"];
                            $nombre = $fila["nombre"];
                            $talla = $fila["talla"];
                            $precio = $fila["precio"];
                            $categoria = $fila["categoria"];
                            $imagen = $fila['imagen'];

                ?>
                        <tr>
                            <td><?php echo $nombre ?></td>
                            <td><?php echo $talla ?></td>
                            <td><?php echo $precio . "€"?></td>
                            <td><a href="categoria.php?Categoria=<?php echo $categoria ?>"><?php echo $categoria ?></a></td>
                            <td>
                                <form action="mostrar_prenda.php" method="get">
                                    <button class="btn btn-primary" type="submit">Ver</button>
                                    <input type="hidden" name="id" value="<?php echo $fila['id'] ?>">
                                </form>
                            </td>
                            <td>
                                <button class="btn btn-primary" onclick="abrir('modal<?php echo $id?>')">Comprar</button>
                                <dialog id="modal<?php echo $id?>">
                                    <form action="" method="post">
                                        <?php
                                            echo "<strong>" . $nombre . "   </strong>";
                                            echo "<img width='100' height='80' src='../..$imagen'>";
                                            echo "<br>";
                                            echo "<strong>Precio: " . $precio . "€</strong>";
                                            ?>
                                            <select name="cantidad" class="form-select">
                                                <option value="" selected disable hidden>---Cantidad---</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <?php
                                            echo "<br>";
                                            
                                        ?>
                                        <input type="hidden" name="id_producto" value="<?php echo $id ?>">
                                        <button class="btn btn-success" type="submit">Comprar</button>
                                    </form> 
                                    <button class="btn btn-danger" onclick="cerrar('modal<?php echo $id?>')">Cerrar</button>
                                </dialog>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <?php
                                    if($_SESSION['rol'] == "administrador"){ ?>
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                    <?php } ?>
                                    <input type="hidden" name="id_delete" value="<?php echo $id ?>">
                                    <input type="hidden" name="imagenDelete" value="<?php echo $imagen ?>">
                                </form>
                            </td>
                            <td>
                                <form action="modificarPrenda.php" method="get">
                                    <?php
                                    if($_SESSION['rol'] == "administrador"){ ?>
                                    <button class="btn btn-success" type="submit">Modificar</button>
                                    <?php } ?>
                                    <input type="hidden" name="id" value="<?php echo $fila['id'] ?>">
                                    <input type="hidden" name="nombre" value="<?php echo $fila['nombre'] ?>">
                                    <input type="hidden" name="talla" value="<?php echo $fila['talla'] ?>">
                                    <input type="hidden" name="precio" value="<?php echo $fila['precio'] ?>">
                                    <input type="hidden" name="categoria" value="<?php echo $fila['categoria'] ?>">
                                </form>
                            </td>
                            <td>
                                <img width="40" height="40" src="../..<?php echo $imagen ?>">
                            </td>
                        </tr>
                        <?php
                        }

                    }
                    
                ?>
                </tbody>
            </table>
            <br>
            <?php
            if($_SESSION['rol'] == "administrador"){ ?>
            <a class="btn btn-secondary" href="insertarPrenda.php">Insertar Prendas</a>
            <?php } ?>
        </div>
        <div class="col-3">
            <img width="100%" height="100%" src="../../resources/images/ropa.jpg">
        </div>
    </div>
</div>
<script>

    var modal = false;

function abrir(id){

    if(!modal){
        document.getElementById(id).show();
    }

    modal = true;

}

function cerrar(id){

    document.getElementById(id).close();
    modal = false;

}

</script>
</body>
</html>