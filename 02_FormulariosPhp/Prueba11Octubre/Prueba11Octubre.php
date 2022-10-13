<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba11Octubre</title>
</head>
<body>
    <p>
    Con esta forma hacemos la respuesta del php en un mismo documento,
    debajos del form metemos php y utilizamos $_SERVER, EL METODO TIENE QUE ESTAR EN POST.
    </p>
    <form action ="Prueba11Octubre.php" method = "post">
        <label>Número</label><br>
        <input type="text" name="numero"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo $_POST ["numero"];
        }

    ?>
</body>
</html>