<?php 
    session_start();
    // Si habitacion es pasada en get entonces añadirla a la sesion
    if(isset($_GET['habitacion'])){
        $tipo = $_GET['habitacion'];
        $_SESSION['habitacion_tipo'] = $tipo;
        $_SESSION['id_habitaciones'] = array_shift($_SESSION['habitaciones_disponibles'][$tipo]);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilo.css">

</head>

<body>
    <?php 
        // Incluir navegacion y header con foto
        include './includes/navHead.php'; 

        // Secciones
        if($_SESSION["usuario"] && $_SESSION["clave"]) { 
            // Incluir Pagina pago si esta logeado
            include "pago.php";
        } else { 
            // Incluir login si NO esta logeado
            include "login.php";
        }
        
        // Incluir Footer
        include './includes/footer.php';
     ?>
</body>

</html>