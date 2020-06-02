<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['cerrar-session'])) {
    session_unset();
    header('Location:/GymArtBoostrap/index.php');
}
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/GymArtBoostrap/index.php"><img src="/GymArtBoostrap/imagenes/logo1.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="botonHamburguesa navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbar-center " id="navbarSupportedContent">
            <ul class="nav navbar-nav navbar-center">
                <?php
                if ($_SESSION) {
                ?>
                    <li class="nav-item"><a class="nav-link" href="/GymArtBoostrap/clientes/verClientes.php">CLIENTES</a></li>
                    <li class="nav-item"><a class="nav-link" href="/GymArtBoostrap/monitores/verMonitores.php"> MONITORES</a></li>
                    <li class="nav-item"><a class="nav-link" href="/GymArtBoostrap/mensualidades/verMensualidades.php">MENSUALIDADES</a></li>
                    <li class="nav-item"><a class="nav-link" href="/GymArtBoostrap/pagos/verPagos.php"> PAGOS</a></li>

                <?php
                } else {
                ?>
                    <li class="nav-item"><a class="nav-link" href="/GymArtBoostrap/cuotas.php">SERVICIOS</a></li>
                    <li class="nav-item"><a class="nav-link" href="/GymArtBoostrap/quienesSomos.php">QUIENES SOMOS</a></li>
                    <li class="nav-item"><a class="nav-link" href="/GymArtBoostrap/contacto.php">CONTACTO</a></li>
                <?php
                }
                ?>
            </ul>
        </div>

        <div class="float-sm-center d-flex flex-column">
            <?php
            if ($_SESSION) {
            ?>
                <div class="cerrarSesion">
                    <p>Bienvenido, <?php echo $_SESSION['usuario']
                                    ?></p>
                    <form action="<?php echo $_SERVER["PHP_SELF"] . "/index.php"  ?>" method="POST">
                        <input class="botonCerrar btn btn-danger rounded-pill w-100" type="submit" value="Cerrar sesión" name="cerrar-session">
                    </form>
                </div>
            <?php
            } else {
            ?>
                <a href="/GymArtBoostrap/usuarios/inicioSesion.php"><img src="/GymArtBoostrap/imagenes/usuario.png" alt=""></a>
            <?php
            }
            ?>
            <!-- <p>Bienvenido,usuario</p>
            <button type="submit" class="btn btn-danger">
                <span class="glyphicon glyphicon-log-out">Cerrar Sesión</span> 
            </button> -->
        </div>

    </nav>
</header>