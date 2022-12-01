<html>
<head>
    <title>Insertar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<?php
require '../../utilDB/database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $fechaNac = $_POST['fecha_nacimiento'];
    $rol = $_POST['rol'];
    
    $file_name = $_FILES['avatar']['name'];
    $file_temp_name = $_FILES['avatar']['tmp_name'];
    $path = "../../resources/images/clientes/" . $file_name;
    
    if(empty($file_name)){

        $imagen = "/resources/images/ropa.jpg";

    }
    else{

        $imagen = "/resources/images/clientes/" . $file_name;
        

    }

    if(!empty($usuario) && !empty($contrasena) && !empty($nombre) && !empty($apellido1) && !empty($fechaNac) && !empty($rol)){

        $apellido2 = !empty($apellido2) ? "'$apellido2'" : "NULL";

        $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO clientes (usuario, nombre, primer_apellido, segundo_apellido, fecha_nacimiento, contrasena, rol)
                VALUES ('$usuario', '$nombre', '$apellido1', $apellido2 , '$fechaNac', '$contrasena_hash', '$rol')";

        if($conexion -> query($sql) == "TRUE"){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                 CLIENTE INTRODUCIDO EXITOSAMENTE
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>           
            <?php
            if(!empty($file_temp_name)){

            
                if(move_uploaded_file($file_temp_name, $path)){
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>FICHERO MOVIDO EXITOSAMENTE</strong>
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
            header("location: http://localhost/DesarrolloWebServidor/DesarrolloWebServidor/practica_04/");
        }
        else{
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>ERROR:</strong> USUARIO YA EXISTENTE
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }
    }
    else{
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>ERROR:</strong> NO PUEDE HABER CAMPOS VACÍOS
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
    }

}
?>
<div class="container">
    <h1>Nuevo Cliente</h1>

    <div class="row">
        <div class="col-6">
            <form action="" method="post" enctype="multipart/form-data">  
                <div class="form-group mb-3">
                    <label class="form-label">Nombre Usuario</label>
                    <input class="form-control" type="text" name="usuario">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Contraseña</label>
                    <input class="form-control" type="password" name="contrasena">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" type="text" name="nombre">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Primer Apellido</label>
                    <input class="form-control" type="text" name="apellido1">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Sregundo Apellido</label>
                    <input class="form-control" type="text" name="apellido2">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Fecha Nacimiento</label>
                    <input class="form-control" type="date" name="fecha_nacimiento">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Avatar</label>
                    <input class="form-control" type="file" name="avatar">
                </div>
                <div class="form-group mb-3">
                    <select class="form-select" name="rol">
                        <option value="" selected hidden disable>---Rol de Usuario---</option>
                        <option value="administrador">Administrador</option>
                        <option value="cliente">Cliente</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-primary" type="submit">Crear</button>
                    <a class="btn btn-secondary" href="index.php">Volver</a>
                </div>
            
        </div>
    </div>

</div>
</body>
</html>