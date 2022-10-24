<!DOCTYPE html>
<html lang="eS">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 01: Agustín Arcos. 2ºDAW</title>
    
</head>
<body> 


    <div>
    <h2 id="ej1">Ejercicio 1</h2>
    <h5>Formulario que recibe dos números “a” y “b”. 
        El formulario devolverá como respuesta los “a” primeros números primos empezando por “b”. 
    </h5><br>
    <!-- action result ha sido la solución. -->
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

</body>
</html>

