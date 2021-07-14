<?php 
    //  echo "<pre>";
    //  print_r($_SESSION);
    //  echo "</pre>";

    if($_GET['logout']){
        $_SESSION['usuario'] = null;
        $_SESSION['clave'] = null;
    }

    if($_SESSION['usuario'] && $_SESSION['clave']){
        $usuario = $_SESSION['usuario'];
    }
?>

<nav>
    <ul class="top-info-menu">
        <ul>
            <?php 
                if($_SESSION["reserva_mensaje"]){
                    echo "<li>".$_SESSION['reserva_mensaje']."</li>";
                }
                if($usuario) {
                    echo "<li>$usuario</li>";
                    echo "<li><a href='https://olivina.herokuapp.com/inicio.php?logout=1'>log-out</a></li>";
                } else {
                    echo "<li><a href='https://olivina.herokuapp.com/reservas.php?login=1'>log-in</a></li>";                  
                }
            ?>
        </ul>
    </ul>    
</nav>
<header>
    <div class="header-title-wrapper">
        <a href="https://olivina.herokuapp.com/inicio.php">
            Gran Hotel Olivina
        </a>
        <br>
        <span class="header-stars">
            <i class="fa fa-star hover-opacity"></i>
            <i class="fa fa-star hover-opacity"></i>
            <i class="fa fa-star hover-opacity"></i>
            <i class="fa fa-star hover-opacity"></i>
            <i class="fa fa-star hover-opacity"></i>
        </span>
        <p class="header-subtitle">Tenerife - Spain</p>
    </div>
</header>