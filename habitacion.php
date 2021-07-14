<?php

session_start();

if(isset($_POST["consultar"])){ 
    $entrada= $_POST["entrada"];
    $salida= $_POST["salida"];
    $url="https://olivina.herokuapp.com/servicios/consultarDisponibilidad.php?entrada=$entrada&salida=$salida";
    $data = json_decode(file_get_contents("$url"), true);

    $_SESSION['entrada'] = $entrada;
    $_SESSION['salida'] = $salida;
    $_SESSION['habitaciones_disponibles'] = $data['habitaciones_disponibles'];

    // Disponibilidad en numeros
    $estandar = count($data['habitaciones_disponibles']['estandar']);
    $deluxe = count($data['habitaciones_disponibles']['deluxe']);
    $suite = count($data['habitaciones_disponibles']['suite']);
    $disponibleTotal = $estandar + $deluxe + $suite;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitaciones</title>
    <meta name="HotelPlayaazul" content="HotelPorticoWeb" name="OliviaReyes">
    <!-- Estilo CSS y Recursos Externos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilo.css">

</head>

<body>
    <!-- Incluir navegacion y header con foto -->
    <?php include './includes/navHead.php'; ?>
    
    <h1 class="section-title"><?php echo $disponibleTotal; ?> Habitaciones disponibles</h1>
    <div class="habitaciones">
        <article>
            <div>
                <h2 class="med-title"><?php echo $estandar; ?> Habitación Estándar</h2>
                <a href="https://olivina.herokuapp.com/reservas.php?habitacion=estandar">
                    <img src="img/habitacion.jpg" class="foto one">
                </a>
            </div>
        </article>
        <article>
            <div>
                <h2 class="med-title"><?php echo $deluxe; ?> Habitación Deluxe</h2>
                <a href="https://olivina.herokuapp.com/reservas.php?habitacion=deluxe">
                    <img src="img/deluxe.jpg" class="foto one">
                </a>
            </div>
        </article>
        <article>
            <div>
                <h2 class="med-title"><?php echo $suite; ?> Habitación Suite Jacuzzi</h2>
                <a href="https://olivina.herokuapp.com/reservas.php?habitacion=suite">
                    <img src="img/suite.jpg" class="foto one">
                </a>
            </div>
        </article>
    </div>

    <!-- Incluir footrer -->
    <?php include './includes/footer.php'; ?>

</body>

</html>