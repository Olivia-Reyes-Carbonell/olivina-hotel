<?php 

session_start(); //session_destroy();

$tomorrow = date("Y-m-d", strtotime('tomorrow'));
$nextWeek = date("Y-m-d", strtotime('today +7 day'));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gran Hotel Olivina</title>
    <meta name="HotelOlivina" content="HotelOlivinaWeb" name="OliviaReyes">
    <!-- Estilo CSS y Recursos Externos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilo.css">

</head>

<body>
    <!-- Incluir navegacion y header con foto -->
    <?php include './includes/navHead.php'; ?>

    <div class="fechas">
        <form action="/habitacion.php" method="POST">
            <div class="form-group">
                <input type="date" name="entrada" value="<?php echo $tomorrow; ?>" placeholder="Check-in" class="form-control">
            </div>
            <div class="form-group">
                <input type="date" name="salida" value="<?php echo $nextWeek; ?>" placeholder="Check-out" class="form-control">
            </div>
            <button type="salida" class="btn btn-primary" name="consultar">Buscar</button>
        </form>
    </div>

    <!-- Incluir footrer -->
    <?php include './includes/footer.php'; ?>

</body>

</html>