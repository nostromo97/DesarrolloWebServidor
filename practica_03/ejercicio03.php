<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap referencia -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Ejercicio 3:Agustín Arcos Reyes</title>
</head>
<body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <table class="table table-success table-striped">
        <th><h5>Ejercicio 3</h5></th>
        <th><h6>Crea un array que contenga los números del 1 al 50. <br>
        Elimina mediante un bucle y la función unset los números que sean divisibles entre 3. 
        </h6></th>
    </table>
    <?php
        $numeros = [];
        
        for ($i = 1; $i <= 50; $i++){
        $numeros[$i] = $i;
    }

        foreach($numeros as $key => $value){

            if($key%3==0){
                unset($numeros[$value]);
        }
    
    }
    
        foreach($numeros as $key => $value){
            echo  $value . " ";   
    }
?>
</body>
</html>