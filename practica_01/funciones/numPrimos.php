<?php
    function numPrimos($numero1,$numero2)
    {
        if ($numero1 == 2 || $numero1 == 3 || $numero1 == 5 || $numero1 == 7) {
            return True;
        } else {
            // Para saber si es par
            if ($numero1 % 2 != 0) {
                // Para saber si es impar
                for ($i = 3; $i <= sqrt($numero1); $i += 2) {
                    if ($numero1 % $i == 0) {
                        return False;
                    }
                }
                return True;
            }
        }
        return False;
    }
?>