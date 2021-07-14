<?php 
    session_start(); 

    if(isset($_POST["reservar"])){ 
        $id_cliente = $_SESSION["id_cliente"];
        $id_habitaciones = $_SESSION["id_habitaciones"];
        $fecha_entrada = $_SESSION["entrada"];
        $fecha_salida = $_SESSION["salida"];

        $url="https://intense-wave-81866.herokuapp.com/servicios/reservar.php?id_cliente=$id_cliente&id_habitaciones=$id_habitaciones&fecha_entrada=$fecha_entrada&fecha_salida=$fecha_salida";
       
        $data = json_decode(file_get_contents("$url"), true);

        if($data['mensaje'] === 'reservado'){
            $_SESSION["reserva_mensaje"] = "Reserva confirmada";
            session_destroy();
            header("Location: https://intense-wave-81866.herokuapp.com/inicio.php");
        } else {
            $_SESSION["reserva_mensaje"] = "No se pudo reservar, intentalo de nuevo";
        }
    }

    if($_SESSION["id_cliente"] && $_SESSION["id_habitaciones"] && $_SESSION["entrada"] && $_SESSION["salida"]){
        $canBook = true;
    }
?>

<?php if($canBook) { ?>

    <!-- Mostrar Reservar unicamente si tenemos toda la informacion que necesitamos -->
    <div class="section">
        <form action="" method="POST">
            <input type="submit" name="reservar" value="Reserva ya!">
        </form>
    </div>

<?php
    // Redirecionar al inicio si el login esta bien
    } else { 
        header('Location: https://intense-wave-81866.herokuapp.com/inicio.php'); 
    }

?>