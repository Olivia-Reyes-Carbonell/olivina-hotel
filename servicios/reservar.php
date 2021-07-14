<?php
header("Content-Type:application/json");

// Conecta con la BD
include '../includes/conexion.php';

// sql para consultar una tabla
$sql = "INSERT INTO reservas (id_cliente, id_habitaciones, fecha_entrada, fecha_salida) VALUES ('".$_GET['id_cliente']."', ".$_GET['id_habitaciones'].", '".$_GET['fecha_entrada']."', '".$_GET['fecha_salida']."');";

$resultado = mysqli_query($conexion, $sql);  

if ($resultado) {
    // Significa que se registor correctamente
    respuesta(200, 'reservado', 1);
} else {
    // Algo paso y no puedo registrar
    respuesta(200, 'NO reservado', 0);
}

//cierra la conexión con la BD
mysqli_close($conexion);

// De aqui para abajo no hay que cambiar nada
function respuesta($status, $mensaje, $datos)
    {
        header("HTTP/1.1 $status $mensaje");
        $response['status'] = $status;
        $response['mensaje'] = $mensaje;
        $response['reservado'] = $datos;
        $json_response = json_encode($response);
        echo $json_response;
    }
?>


