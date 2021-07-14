<?php
header("Content-Type:application/json");

// Conecta con la BD
include '../includes/conexion.php';

// sql para consultar una tabla
$sql = "SELECT * FROM habitaciones WHERE id NOT IN (SELECT id_habitaciones FROM reservas WHERE
fecha_entrada <= '".$_GET['entrada']."' AND fecha_salida >= '".$_GET['entrada']."' OR
fecha_entrada < '".$_GET['salida']."' AND fecha_salida > '".$_GET['salida']."' OR 
fecha_entrada > '".$_GET['entrada']."' AND fecha_salida < '".$_GET['salida']."');";

$resultado = mysqli_query($conexion, $sql);  

if (mysqli_num_rows($resultado) > 0) {
  // Salida de datos para cada fila
  $habitaciones = array(
    "deluxe" => 0,
    "estandar" => 0,
    "suite" => 0
  );

  $disponibles = 0;

  while($row = mysqli_fetch_assoc($resultado)) {
    $disponibles++;

    if(!$habitaciones[$row["tipo"]]){
      $habitaciones[$row["tipo"]] = array();
    }

    array_push($habitaciones[$row["tipo"]], $row["id"]);
  }

  respuesta(200, $disponibles, $habitaciones);

} else {
  echo "Sin resultados";
}

//cierra la conexión con la BD
mysqli_close($conexion);

// De aqui para abajo no hay que cambiar nada
function respuesta($status, $mensaje, $datos)
    {
        header("HTTP/1.1 $status $mensaje");
        $response['status'] = $status;
        $response['disponibles'] = $mensaje;
        $response['habitaciones_disponibles'] = $datos;
 
        $json_response = json_encode($response);
        echo $json_response;
    }

?>


