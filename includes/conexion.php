<?php


//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conexion = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db)



  // $servername = "us-cdbr-east-04.cleardb.com";
  // $username = "bc5d5f8a1cef56";
  // $password = "78a9d54e";
  // $dbname = "hotel";

  // Crea la Conexión
  // $conexion = mysqli_connect($servername, $username, $password, $dbname);




  
  // Verifica la Conexión
/*
  if (!$conexion) {
    die("La Conexión ha fallado: " . mysqli_connect_error());
  }else{
  echo "Conexión exitosa <br>";
  }
  */
  //La conexión se cerrará automáticamente cuando finalice el script. 
  //Para cerrar la conexión antes, usa: mysqli_close($conexion);
  
?>