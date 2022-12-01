<html>
<head>
    <title>Ropita Linda: Tienda Online</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div class="Container">

    <?php require "header.php" ?>
    <?php require "utilDB/database.php" ?>

    <?php

if($_SERVER['REQUEST_METHOD']=="POST"){

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM clientes WHERE usuario = '$usuario'";
    $resultado = $conexion -> query($sql);

    if($resultado -> num_rows > 0){


        while($fila = $resultado -> fetch_assoc()){

            $hash_contrasena = $fila['contrasena'];
            $rol = $fila['rol'];
            $id = $fila['id'];

        }

        $acceso_valido = password_verify($contrasena, $hash_contrasena);

        if($acceso_valido == TRUE){

            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = $rol;
            $_SESSION['id'] = $id;
            header("location: http://localhost/DesarrolloWebServidor/DesarrolloWebServidor/practica_04/public/prendas/index.php");
            
        }
        else {
            echo "<h2>Contraseña equivocada</h2>";
        }

    }


}

    ?>
    <h1>¡Bienvenido a Nuestra Tienda!</h1>


    <div class="row">
    <div class="col-6">
        <form action="" method="post">
            <div class="form-group mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" type="text" name="usuario">
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" type="password" name="contrasena">
            </div>
            <div class="form-group mb-3">
                <button class="btn btn-primary" type="submit">Iniciar Sesión</button>
                <a href="http://localhost/DesarrolloWebServidor/DesarrolloWebServidor/practica_04/public/clientes/insertarClientes.php" class="btn btn-primary">Registrarte</a>
            </div>
        </form>

    </div>

</div>
</body>
</html>