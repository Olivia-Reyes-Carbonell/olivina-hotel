<?php
header("Content-Type:application/json");

// Conecta con la BD
include '../includes/conexion.php';

// sql para consultar una tabla
$sql = "SELECT * FROM clientes WHERE email='".$_GET['email']."' AND clave='".$_GET['clave']."' LIMIT 1;";

$resultado = mysqli_query($conexion, $sql);  

$usuario = array();

while($row = mysqli_fetch_assoc($resultado)) {
    $usuario['id_cliente'] = $row['id'];
    $usuario['email'] = $row['email'];
    $usuario['clave'] = $row['clave'];
}

if (count($usuario)) {
    // Significa que se registor correctamente
    respuesta(200, 'logeado', $usuario);
} else {
    // Algo paso y no puedo registrar
    respuesta(200, 'NO logeado', $usuario);
}

//cierra la conexión con la BD
mysqli_close($conexion);

// De aqui para abajo no hay que cambiar nada
function respuesta($status, $mensaje, $usuario)
    {
        header("HTTP/1.1 $status $mensaje");
        $response['status'] = $status;
        $response['mensaje'] = $mensaje;
        $response["id_cliente"] = $usuario['id_cliente'];
        $response["usuario"] = $usuario['email'];
        $response["clave"] = $usuario['clave'];
        $json_response = json_encode($response);
        echo $json_response;
    }
?>


