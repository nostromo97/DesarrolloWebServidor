<!DOCTYPE html>
<html lang="eS">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 01: Agustín Arcos. 2ºDAW</title>
    <!-- Referencia al CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body> 
    <h2 id="yo">Agustín Arcos Reyes</h2><br>
    <h3 id="curso">2ºDAW</h3>
    <!-- Ejercicio 1 -->
    <div id="divEjercicio1">
    <h2 id="ej1">Ejercicio 1</h2>
    <h5>*Formulario que recibe dos números “a” y “b”.<br>
        _El formulario devolverá como respuesta los “a” primeros números primos empezando por “b”. 
    </h5><br>
    <!-- action result también funciona. -->
    <form action = "#ej1" method = "POST">
        <label>Número 1:</label><br>
        <input type="text" name="numero1"><br><br>

        <label> Número 2:</label><br>
        <input type="text" name="numero2"><br><br>

        <input type="submit" value="Enviar">
        <input type="hidden" name="f" value="fEj1">
    </form>

    <?php
    //Ejercicio 1_Números primos.
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        if($_POST['f']=="fEj1"){

            $num1 = $_POST['numero1'];
            $num2 = $_POST['numero2'];
            $contador = 0;
            $sumatorio = 2;
            echo "<p id='p1'>";
            while($contador < $num1){
            
                if($sumatorio>=$num2 && $contador==0){
                    echo "$num2 ";
                    $num2++;
                    $sumatorio = 2;
                    $contador++;
             }
                else if ($sumatorio>=$num2){
                    echo "|| $num2 ";
                    $num2++;
                    $sumatorio = 2;
                    $contador++;
                }
                else if($num2%$sumatorio==0){
                    $num2++;
                    $sumatorio = 2;
                }
                else{
                    $sumatorio++;
                }
            
            }
            echo "</p>";

        }

    }
    ?>

    </div>


        <!-- Ejercicio 2 -->
    <div id="divEjercicio2">
    <h2 id="ej2">Ejercicio 2</h2>
    <h5>
        *Formulario que comprueba si el DNI introducido es válido.
    </h5><br>

    <form action = "#ej2" method = "POST">
        <label>Introduce DNI:</label><br>
        <input type="text" name="dni"><br><br>
        <input type="submit" value="Enviar">
        <input type="hidden" name="f" value="fEj2">
    </form>

    <?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $dni = $_POST['dni'];
    $numDni = (int)substr($dni,0,8);
    $letraDni = strtoupper(substr($dni,8,1));

    if(strlen($dni)!=9){
        echo "No es válido.";
    }
    else {

        if(strlen($numDni) != 8){
            echo "No es válido.";
        }
        
        else{

            $mensaje = match($letraDni){
                            "T" => "DNI válido",
                            "R" => "DNI válido",
                            "W" => "DNI válido",
                            "A" => "DNI válido",
                            "G" => "DNI válido",
                            "M" => "DNI válido",
                            "Y" => "DNI válido",
                            "F" => "DNI válido",
                            "P" => "DNI válido",
                            "D" => "DNI válido",
                            "X" => "DNI válido",
                            "B" => "DNI válido",
                            "N" => "DNI válido",
                            "J" => "DNI válido",
                            "Z" => "DNI válido",
                            "S" => "DNI válido",
                            "Q" => "DNI válido",
                            "V" => "DNI válido",
                            "H" => "DNI válido",
                            "L" => "DNI válido",
                            "C" => "DNI válido",
                            "K" => "DNI válido",
                            "E" => "DNI válido",
                            default => "DNI no valido",

                         };
                echo "$mensaje";

        }

    }
}
    ?> 
    </div>

    <!-- Ejercicio 3 -->
    <div id="divEjercicio3">
    <h2 id="ej3">Ejercicio 3</h2>
    <h5>
        *Tablas de multiplicar del 1 al 10.
    </h5><br>
    <?php

    for ($i = 1; $i<=10; $i++){

        echo "<table id='tabla" . $i . "'>";
        echo "<tr><td id='td_" . $i . "'><h3>Tabla del " . $i ."</h3></td></tr>";
    
         for($o = 1; $o <= 10; $o++){
    
                    echo "<tr><td> $i X $o = " . $i*$o . " </td></tr>";
    
            }
            
            echo "</table>";
    
        }
    ?>
    </div>

</body>
</html>

