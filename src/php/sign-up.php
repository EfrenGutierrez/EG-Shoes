
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EG-Shoes</title>
    <link rel="stylesheet" href="dist/css/app.css">
</head>
<body>
<header class="header">
        <div class="div__header">
            <h1>EG-Shoes</h1>
            <h2>Tu tienda de zapatillas</h2>
        </div>      
    </header>
    <nav class="nav">
        <a href="index.html">Inicio</a>
        <a href="login.hmtl">Login</a>
        <a href="sign-up.html">Sing up</a>
    </nav>
    <main>
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
                echo "<h2><b>Conexion establecida con exito</b></h2>";

                $insertUser = "INSERT INTO usuarios (usuario, nombre, apellido1, apellido2, contraseña) VALUES ('$usu', '$nom', '$ape1', '$ape2', '$cont')";
                try{
                    $con->exec($insertUser);
                    echo "<div>
                            <h2>Bienvenido $usu </h2>;
                         </div>";
                }catch(Exception $e){
                    die("Usuario no registrado: <br>" . $e->getMessage());
                }
            
            }catch(Exception $e){
                die("<h1><b>Fallo de conexion:</b></h1><br>" . $e->getMessage());
            }
            $con = null;


        ?>

    </main>

    <footer></footer>

</body>
</html>