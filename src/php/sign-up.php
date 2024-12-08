<?php
#Se obtienen los datos del formulario.
$usuario = $_POST['user'];
$nombre = $_POST['name'];
$apellido1 = $_POST['surname1'];
$apellido2 = $_POST['surname2'];
$contrasena = $_POST['pass'];

//variables del servidor
$serv_name = "localhost";
$username = "root";
$serv_pass = "";
$serv_DB = "egshoes";
//se crea la conexion con el servidor

?>