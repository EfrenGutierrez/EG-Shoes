<?php
#Se obtienen los datos del formulario.
$usu = $_POST['user'];
$nom = $_POST['name'];
$ape1 = $_POST['surname1'];
$ape2 = $_POST['surname2'];
$cont = $_POST['pass'];

//variables del servidor
$serv_name = "localhost";
$username = "root";
$serv_pass = "";
$serv_DB = "egshoes";

//se crea la conexion con el servidor con PDO
try{
    $con = new PDO("mysql:host=$serv_name;dbname=$serv_DB",$username,$serv_pass);
    echo "<h1><b>Conexion establecida con exito</b></h1>";

    $insertUser = "INSERT INTO usuarios (usuario, nombre, apellido1, apellido2, contraseña) VALUES ('$usu', '$nom', '$ape1', '$ape2', '$cont')";
    try{
        $con->exec($insertUser);
        echo "Usuario guardado con exito";
    }catch(Exception $e){
        die("Usuario no registrado: <br>" . $e->getMessage());
    }
 
}catch(Exception $e){
    die("<h1><b>Fallo de conexion:</b></h1><br>" . $e->getMessage());
}
$con = null;


?>