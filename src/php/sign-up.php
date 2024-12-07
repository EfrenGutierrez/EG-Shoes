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

//se crea la conexion con el servidor
$con = new mysqli($serv_name,$username,$serv_pass);

if($con -> connect_error){
    die("conexion fallida: " . $con -> conect_error);
}
else{
    echo "conexion correcta <br>";

}

//se crea una base de datos, pero antes se comprueba si existe.
$existe_bd = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'EGShoes'";

if($existe_bd === false){
    $sql = "CREATE DATABASE EGShoes";
    if ($con->query($sql) === TRUE) {
      echo "base de datos creada con exito <br>";
    } else {
      echo "Error creating database: " . $conn->error;
    }
}else{
    echo "la BD ya existe. <br>";
}

//crea la tabla usuarios si no existe
$existe_usuarios = "SELECT TABLE_NAME 
                    FROM information_schema.tables 
                    WHERE table_schema = 'EGShoes' 
                    AND table_name = 'usuarios'";

if($existe_usuarios === false){
    $tabla_Usuarios = "CREATE TABLE usuarios ( 
    usuario varchar(20), 
    nombre varchar(20),
    apellido1 varchar(20),
    apellido2 varchar(20),
    contraseña varchar(4)),
    PRIMARY KEY (usuario)";
    $con
    addUser($usuario,$nombre,$apellido1,$apellido2,$contrasena);
    echo "Tabla creada y usuario añadido <br>";
}
else{
    addUser($usuario,$nombre,$apellido1,$apellido2,$contrasena);
    echo "Usuario añadido <br>";
}


function addUser($nom,$ape,$ape2,$pass){
    $add = "INSERT INTO usuarios (usuario, nombre, apellido1, apellido2, contraseña) VALUES ($nom,$ape,$ape2,$pass)";
}
mysqli_close($con);

?>