<?php
// Conecta con la BD
include 'https://intense-wave-81866.herokuapp.com/includes/conexion.php';

// sql para consultar una tabla
$sql = "SELECT * FROM `clientes`";
$resultado = mysqli_query($conexion, $sql);  

if (mysqli_num_rows($resultado) > 0) {
  // Salida de datos para cada fila
  while($row = mysqli_fetch_assoc($resultado)) {
    // echo "id: " . $row["id"]. " - Nombre: " . $row["nombre"]. " " . $row["apellido"]. "<br>";
    var_dump($row);
  }
} else {
  echo "Sin resultados";
}

//cierra la conexión con la BD
mysqli_close($conexion);
?>


