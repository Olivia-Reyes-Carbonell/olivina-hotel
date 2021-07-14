<?php
// Conecta con la BD
    include '../includes/conexion.php.php';

// sql para insertar un registro
$sql = "DELETE FROM usuario WHERE nick like 'Candy' ";

if (mysqli_query($conexion, $sql)) {
  echo "Usuario eliminado";
} else {
  echo "Error eliminando usuario: " . mysqli_error($conexion);
}

//cierra la conexión con la BD
mysqli_close($conexion);
?>
