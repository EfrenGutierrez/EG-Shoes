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

$con = new mysqli($serv_name,$username,$serv_pass);

if($con->connect_error){
    echo "conexion fallida";
}
else{
    echo "conexionn exitosa";
}

$sql = "CREATE DATABASE egshoes";
if($con->query($sql)===true){
    echo "DB creada con exito";
}
else{
    echo "error al crear la DB " . $con->error;
}

$con->close();

?>