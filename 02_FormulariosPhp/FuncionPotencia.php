<?php
/**
 * Función que devuelve el resultado de elevar $base a $exponente.
 * Si $exponente es menor q 0, devuelve -1.
 */
        function potencia (int $base, int $exponente) {
            $resultado = null;
            if($exponente <0){
                $resultado =-1;
            }elseif ($exponente == 0){
                $resultado = 1;
            } else {
                for($ = 1; $i <= $exponente; $i++){
                    $resultado = $resultado * $base;
                }
            }
        }
        return $resultado;

?>