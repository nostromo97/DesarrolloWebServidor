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
        $error_dni = "El campo DNI no puede estar vacío";
    }
    else{

        

        if(strlen($temp_dni)!=9){

            $error_dni = "DNI introducido incorrecto.";
        }
        else{
            $pattern = "/^[0-9]{8}[tTrRwWaAgGmMyYfFpPdDxXbBnNjJzZsSqQvVhHlLcCkKeE]$/";

            if(!preg_match($pattern, $temp_dni)){

                $error_dni = "DNI introducido incorrecto.";
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
                    default => "DNI no valido",

                 };

                 if($letra_dni == $comprobacionLetraDNI){
                    
                    $dni = $temp_dni;
                 }
                 else{
                    $error_dni = "DNI es incorrecto.";
                 }
            }
        }
    }

    if(empty($temp_nombre)){

        $error_nombre = "El campo nombre no puede estar vacio.";
    }
    else{

        $pattern = "/^[a-zA-z áéíóúÁÉÍÓÚñÑ]+$/";

        if(!preg_match($pattern, $temp_nombre)){

            $error_nombre = "El cmapo nombre no puede contener caracteres distintos a letras.";
        }
        else{

            $minus_nombre = strtolower($temp_nombre);
            $nombre = ucwords($minus_nombre);

        }
    }

    if(empty($temp_apellido1)){

        $error_apellido1 = "El campo apellido no puede estar vacio.";
    }
    else{

        $pattern = "/^[a-zA-z áéíóúÁÉÍÓÚñÑ]+$/";

        if(!preg_match($pattern, $temp_apellido1)){

            $error_apellido1 = "El campo apellido no puede contener números ni otros caracteres que no sean letras.";
        }
        else{

            $minus_apellido1 = strtolower($temp_apellido1);
            $apellido1 = ucwords($minus_apellido1);

        }
    }

    if(empty($temp_apellido2)){

        $error_apellido2 = "El campo apellido no puede estar vacío.";
    }
    else{

        $pattern = "/^[a-zA-z áéíóúÁÉÍÓÚñÑ]+$/";

        if(!preg_match($pattern, $temp_apellido2)){

            $error_apellido2 = "El campo apellido no puede contener números ni otros caracteres que no sean letras.";
        }
        else{

            $minus_apellido2 = strtolower($temp_apellido2);
            $apellido2 = ucwords($minus_apellido2);

        }
    }

    if(empty($temp_edad)){
        $error_edad = "El campo edad no puede estar vacía.";
    }
    else{

        $pattern = "/^[0-9]+$/";

        if(!preg_match($pattern, $temp_edad)){

            $error_edad = "El campo edad solo puede contener números.";
        }

        else{

            if($temp_edad > 120){

                $error_edad = "El campo edad no puede ser mayor a 120 años.";
            }
            else{

                if($temp_edad < 18){

                    $error_edad = "El campo usuario es menor de edad.";
                }
                else{

                    $edad = $temp_edad;
                }
            }
        }
    }

    if(empty($temp_email)){

        $error_email = "El campo email no puede estar vacío.";
    }
    else{

        $temp_email_filtrado = filter_var($temp_email, FILTER_VALIDATE_EMAIL);

        if(!$temp_email_filtrado){

            $error_email = "El campo email no es correcto.";
        }
        else{

            if(str_contains($temp_email,"tonto")||str_contains($temp_email,"feo")||str_contains($temp_email,"malito")){

                $error_email = "El campo email no puede tener palabrotas.";
            }
            else{
                $email = $temp_email;
            }
        }
    }

    if(isset($dni) && isset($nombre) && isset($apellido1) && isset($apellido2) && isset($edad) && isset($email)){

        echo "Nombre: $nombre $apellido1 $apellido2 <br> DNI: $dni <br> Edad: $edad <br> Email: $email";

    }

}

?>

<h1>Bienvenid@! Introduzca sus datos</h1>
    <br>
<form action="index.php" method="post">

<p> ☆ DNI: <input type="text" name="dni"> <span> *
<?php if(isset($error_dni)) echo $error_dni ?> </span> </p>

<p> ☺ Nombre: <input type="text" name="nombre"> <span> *
<?php if(isset($error_nombre)) echo $error_nombre ?> </span> </p>

<p> ☺ Primer Apellido: <input type="text" name="apellido1"> <span> *
<?php if(isset($error_apellido1)) echo $error_apellido1 ?> </span> </p>

<p> ☺ Segundo Apellido: <input type="text" name="apellido2"> <span> *
<?php if(isset($error_apellido2)) echo $error_apellido2 ?> </span> </p>

<p> ☆ Edad: <input type="text" name="edad"> <span> *
<?php if(isset($error_edad)) echo $error_edad ?> </span> </p>

<p> ☏ Correo Electronico: <input type="text" name="email"> <span> *
<?php if(isset($error_email)) echo $error_email ?> </span> </p>

<input type="submit" value="Enviar">

</form>