<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
    <title>Prueba11Octubre</title>
</head>
<body>
    <h4>
    Introduce tu videojuego.
    </h4>
    <form action ="Ejercicio7.php" method = "post">

        <label>Título:</label><br>
        <input type="hidden" name="f" value="f_titulo">
        <input type="text" name="titulo"><br><br>

        <label>Consola:</label><br>
        <input type="hidden" name="f" value="f_consola">
        <select name = "consola">
            <option value = "ps5">PS5</option>
            <option value = "xbox">XBOX Series X</option>
            <option value = "switch">Nintendo Switch</option><br>
        </select> <br><br>

        <label>¿Edición Espcial?</label><br>
        <input type="hidden" name="f" value="f_especial">
        <input type = "checkbox" name= "especial" value="si"><br>

    
        <input type="submit" value="Enviar">

    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $titulo = $_POST["titulo"];
            $consola = $_POST["consola"];
            $especial = "";
            if(isset ($_POST["especial"])){
                $especial = $_POST["especial"];
            }
        }

        $precio = 0;
        //Comprobamos consola
        
        if($consola == "ps5"){
        $precio = 60;
        }else if($consola = "xbox"){
        $precio = 70;
        }else if($consola = "switch"){
        $precio = 40;
        }

        //COMPROBAR EDICION ESPECIAL
        if($especial == "si"){
            $precio *= 1.25;
        }

        echo "<h4>Título: $titulo <br> Consola: $consola <br> Edición Especial: $especial</h4>";
    ?>
</body>
</html>