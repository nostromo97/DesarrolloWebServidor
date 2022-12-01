<?php

session_start();

if(!isset($_SESSION['usuario'])){

    header("location: http://localhost/DesarrolloWebServidor/DesarrolloWebServidor/practica_04/");

}

?>