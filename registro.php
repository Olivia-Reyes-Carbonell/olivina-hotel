<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Club Olivina</title>
    <meta name="HotelOlivina" content="HotelOlivinaWeb" name="OliviaReyes">
    <!-- Estilo CSS y Recursos Externos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilo.css">

</head>

<body class="body reg">
    <header>
        <h1>Registro Club Olivina<br> &#9734; &#9734; &#9734; &#9734; &#9734;</h1>


    </header>
    <div class="row">
        <form action="" method="POST" class="form reg">
            <label class="label">Nombre Completo</label>
            <input type="text" name="usuario" required>

            <label class="label">Clave</label>
            <input type="text" name="clave" required>

            <label class="label">Email</label>
            <input type="text" name="email" required>

            <label class="label">Teléfono</label>
            <input type="text" name="telefono" required>

            <input type="submit" name="submit">
        </form>
    </div>

    <div class="row">
        <div>
            <img src="img/piscina.jpg" class="foto reg">
        </div>
        </article>

    </div>
    <footer>
        <a href="#"><i class="fa fa-facebook-official hover-opacity"></i></a>
        <a href="#"><i class="fa fa-instagram hover-opacity"></i></a>
        <a href="#"><i class="fa fa-snapchat hover-opacity"></i></a>
        <a href="#"><i class="fa fa-pinterest-p hover-opacity"></i></a>
        <a href="#"><i class="fa fa-twitter hover-opacity"></i></a>
        <a href="#"><i class="fa fa-linkedin hover-opacity"></i></a>
    </footer>

</body>

</html>

<?php
if (isset($_POST["submit"])) {    // esperando al botón
    $u = htmlspecialchars($_POST["usuario"]);
    $c = htmlspecialchars($_POST["clave"]);
    $e = htmlspecialchars($_POST["email"]);

    // Conecta con la BD
    include 'includes/conexion.php';

    // sql para insertar un registro
    $sql = "INSERT INTO usuario VALUES ( null, '$u', '$c', '$e')";
    echo $sql;

    if (mysqli_query($conexion, $sql)) {
        echo "<br><h1>Bienvenido: $u</h1>";
        print <<<AQUI
            <form action="login.php" method="POST">
                <input type="submit" name="login">
            </form>
        AQUI;
    } else {
        echo "Error inténtelo más tarde: " . mysqli_error($conexion);
    }

    //cierra la conexión con la BD
    mysqli_close($conexion);
}

?>