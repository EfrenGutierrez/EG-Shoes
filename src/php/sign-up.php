<?php
$usuario = $_POST['user'];
$nombre = $_POST['name'];
$apellido2 = $_POST['surname2'];
$contrasena = $_POST['pass']

function usuario(){
    echo "usuario: " . $usuario . " nombre: " . $nombre ; 
}

usuario();
?>