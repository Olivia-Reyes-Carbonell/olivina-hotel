<?php 
    session_start(); 

    if(isset($_POST['registro'])){
        $name= $_POST["name"];
        $email= $_POST["email"];
        $telefono= $_POST["telefono"];
        $clave= $_POST["clave"];
        $url="https://olivina.herokuapp.com/servicios/registrarse.php?name=$name&email=$email&telefono=$telefono&clave=$clave";
        $data = json_decode(file_get_contents("$url"), true);   

        if($data['mensaje'] === 'registrado'){
            $_SESSION['id_cliente'] = $data['id_cliente'];
            $_SESSION['usuario'] = $data['usuario'];
            $_SESSION['clave'] = $data['clave'];
            // Redireccionar a otra pagina
            header('Location: https://olivina.herokuapp.com/reservas.php');
        }  
    }

    if(isset($_POST['login'])){

var_dump($_POST);

        $email= $_POST["email"];
        $clave= $_POST["clave"];
        $url="https://olivina.herokuapp.com/servicios/logearse.php?email=$email&clave=$clave";
        
        
        echo $url;
        
        $data = json_decode(file_get_contents("$url"), true);

        if($data['mensaje'] === 'logeado'){
            $_SESSION['id_cliente'] = $data['id_cliente'];
            $_SESSION['usuario'] = $data['usuario'];
            $_SESSION['clave'] = $data['clave'];
            // Redireccionar a otra pagina
            header('Location: https://olivina.herokuapp.com/reservas.php');
        }        
    }    
?>

<?php if(isset($_GET['login'])) { ?>

    
    <div class="section fechas">
        <form action="" method="POST">     
            <div class="form-group">
                <input name="email" placeholder="Email" class="form-control">
            </div>             
            <div class="form-group">
                <input name="clave" placeholder="Contraseña" class="form-control">
            </div>                                                     
            <button type="submit" class="btn btn-primary" name="login">Logearse</button>
            <p class='small-text registro'>Quieres registrarte? <a href='https://olivina.herokuapp.com/reservas.php?registro=1'>Registro</a></p>
        </form>
    </div>    

<?php } else { ?>

    
    <div class="section fechas">
        <form action="" method="POST">
            <div class="form-group">
                <input name="name" placeholder="Nombre" class="form-control">
            </div>             
            <div class="form-group">
                <input name="email" placeholder="Email" class="form-control">
            </div>    
            <div class="form-group">
                <input name="telefono" placeholder="Telefono" class="form-control">
            </div>           
            <div class="form-group">
                <input name="clave" placeholder="Contraseña" class="form-control">
            </div>                                                     
            <button type="submit" class="btn btn-primary" name="registro">Registrarse</button>
            <p class='small-text'>Ya eres miembro? <a href='https://olivina.herokuapp.com/reservas.php?login=1'>Entrar</a></p>
        </form>
    </div>
    
<?php } ?>