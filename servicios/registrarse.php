<?php
header("Content-Type:application/json");

// Conecta con la BD
include '../includes/conexion.php';

// sql para consultar una tabla
$sql = "INSERT INTO clientes (nombre, telefono, email, clave) VALUES ('".$_GET['name']."', ".$_GET['telefono'].", '".$_GET['email']."', '".$_GET['clave']."');";

$resultado = mysqli_query($conexion, $sql);  

$sqlUsuario = "SELECT id FROM clientes WHERE email = '".$_GET['email']."' LIMIT 1";
$resultadoUsuario = mysqli_query($conexion, $sqlUsuario);  

while($row = mysqli_fetch_assoc($resultadoUsuario)) {
    $id_cliente = $row["id"];
}

if ($resultado) {
    // Significa que se registor correctamente
    respuesta(200, 'registrado', $id_cliente);
} else {
    // Algo paso y no puedo registrar
    respuesta(200, 'NO registrado', $id_cliente);
}

//cierra la conexión con la BD
mysqli_close($conexion);

// De aqui para abajo no hay que cambiar nada
function respuesta($status, $mensaje, $id_cliente)
    {
        header("HTTP/1.1 $status $mensaje");
        $response['status'] = $status;
        $response['mensaje'] = $mensaje;
        $response["usuario"] = $_GET['email'];
        $response["clave"] = $_GET['clave'];
        $response["id_cliente"] = $id_cliente;
        $json_response = json_encode($response);
        echo $json_response;
    }
?>


