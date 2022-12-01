<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 2: Agustín Arcos Reyes.2ºDAW</title>
</head>
<body>
    <h2 id="yo">Agustín Arcos Reyes</h2><br>
    <h3 id="curso">2ºDAW</h3> 
    
    <form action=index.php method="POST">
        <h5 id="titulo">¡Bienvendio! Introduce tus datos</h5 ñ

        <!-- Campo DNI -->
        <p> DNI: <input type="text" name="dni"> <span>
        <?php if(isset($error_dni)) echo $error_dni ?> </span> </p>

        <!-- Campo Nombre -->
        <p> Nombre: <input type="text" name="nombre"> <span>
        <?php if(isset($error_nombre)) echo $error_nombre ?> </span> </p>

        <!-- Campo Primer Apellido -->
        <p> Primer Apellido: <input type="text" name="apellido1"> <span> *
        <?php if(isset($error_apellido1)) echo $error_apellido1 ?> </span> </p>

        <!-- Campo Segundo Apellido -->
        <p> Segundo Apellido: <input type="text" name="apellido2"> <span> *
        <?php if(isset($error_apellido2)) echo $error_apellido2 ?> </span> </p>

        <!-- Campo Edad -->
        <p> Edad: <input type="text" name="edad"> <span> *
        <?php if(isset($error_edad)) echo $error_edad ?> </span> </p>

        <!-- Campo Correo Electrónico -->
        <p> Correo Electronico: <input type="text" name="email"> <span> *
        <?php if(isset($error_email)) echo $error_email ?> </span> </p>

        <input type="submit" value="Enviar">

    </form>


    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){

        function depurar($dato){
            $dato = trim($dato);
            $dato = stripslashes($dato);
            $dato = htmlspecialchars($dato);
            return $dato;
        }
    
        $temp_dni = depurar($_POST['dni']);
        $temp_nombre = depurar($_POST['nombre']);
        $temp_apellido1 = depurar($_POST['apellido1']);
        $temp_apellido2 = depurar($_POST['apellido2']);
        $temp_edad = depurar($_POST['edad']);
        $temp_email = depurar($_POST['email']);
    
        if(empty($temp_dni)){
            $error_dni = "El DNI no puede estar vacío";
        }
        else{
       
            if(strlen($temp_dni)!=9){
    
                $error_dni = "DNI incorrecto";
            }
            else{
                $pattern = "/^[0-9]{8}[tTrRwWaAgGmMyYfFpPdDxXbBnNjJzZsSqQvVhHlLcCkKeE]$/";
    
                if(!preg_match($pattern, $temp_dni)){
    
                    $error_dni = "DNI incorrecto";
                }
                else{
    
                    $num_dni = (int)substr($temp_dni,0,8);
                    $letra_dni = substr($temp_dni,8,1);
    
                    $comprobacionDNI = $num_dni%23;
                     
                    $comprobacionLetraDNI = match($comprobacionDNI){
                        0 => "T",
                        1 => "R",
                        2 => "W",
                        3 => "A",
                        4 => "G",
                        5 => "M",
                        6 => "Y",
                        7 => "F",
                        8 => "P",
                        9 => "D",
                        10 => "X",
                        11 => "B",
                        12 => "N",
                        13 => "J",
                        14 => "Z",
                        15 => "S",
                        16 => "Q",
                        17 => "V",
                        18 => "H",
                        19 => "L",
                        20 => "C",
                        21 => "K",
                        22 => "E",
                        default => "DNI incorrecto",
    
                     };
    
                     if($letra_dni == $comprobacionLetraDNI){
                        
                        $dni = $temp_dni;
                     }
                     else{
                        $error_dni = "DNI incorrecto";
                     }
                }
            }
        }
    
        if(empty($temp_nombre)){
    
            $error_nombre = "Incorrecto. El nombre no puede estar vacío.";
        }
        else{
    
            $pattern = "/^[a-zA-z áéíóúÁÉÍÓÚñÑ]+$/";
    
            if(!preg_match($pattern, $temp_nombre)){
    
                $error_nombre = "Incorrecto. El nombre solo puede contener letras.";
            }
            else{
    
                $minus_nombre = strtolower($temp_nombre);
                $nombre = ucwords($minus_nombre);
    
            }
        }
    
        if(empty($temp_apellido1)){
    
            $error_apellido1 = "Incorrecto. Primer apellido vacío.";
        }
        else{
    
            $pattern = "/^[a-zA-z áéíóúÁÉÍÓÚñÑ]+$/";
    
            if(!preg_match($pattern, $temp_apellido1)){
    
                $error_apellido1 = "Incorrecto. El apellido solo puede contener letras.";
            }
            else{
    
                $minus_apellido1 = strtolower($temp_apellido1);
                $apellido1 = ucwords($minus_apellido1);
    
            }
        }
    
        if(empty($temp_apellido2)){
    
            $error_apellido2 = "Incorrecto. Segundo apellido vacío.";
        }
        else{
    
            $pattern = "/^[a-zA-z áéíóúÁÉÍÓÚñÑ]+$/";
    
            if(!preg_match($pattern, $temp_apellido2)){
    
                $error_apellido2 = "Incorrecto. El apellido solo puede contener letras.";
            }
            else{
    
                $minus_apellido2 = strtolower($temp_apellido2);
                $apellido2 = ucwords($minus_apellido2);
    
            }
        }
    
        if(empty($temp_edad)){
            $error_edad = "Incorrecto. Edad vacía.";
        }
        else{
    
            $pattern = "/^[0-9]+$/";
    
            if(!preg_match($pattern, $temp_edad)){
    
                $error_edad = "Incorrecto. La edad solo puede contener números.";
            }
    
            else{
    
                if($temp_edad > 120){
    
                    $error_edad = "Incorrecto. La edad no puede ser mayor a 120 años.";
                }
                else{
    
                    if($temp_edad < 18){
    
                        $error_edad = "No puede acceder con menos de 18 años.";
                    }
                    else{
    
                        $edad = $temp_edad;
                    }
                }
            }
        }
    
        if(empty($temp_email)){
    
            $error_email = "Incorrecto. El email no puede estar vacío.";
        }
        else{
    
            $temp_email_filtrado = filter_var($temp_email, FILTER_VALIDATE_EMAIL);
    
            if(!$temp_email_filtrado){
    
                $error_email = "Incorrecto. Email introducido inválido";
            }
            else{
    
                if(str_contains($temp_email,"puta")||str_contains($temp_email,"mamapinga")||str_contains($temp_email,"hijodelagrandísimaputamadre")){
    
                    $error_email = "Incorrecto. Palabras incorrectas.";
                }
                else{
                    $email = $temp_email;
                }
            }
        }
    
        if(isset($dni) && isset($nombre) && isset($apellido1) && isset($apellido2) && isset($edad) && isset($email)){
    
            echo "Bienvenido: $nombre $apellido1 $apellido2 <br>DNI: $dni <br>Edad: $edad años <br>Email: $email.";
    
        }
    
    }
    

    ?>

</body>
</html>