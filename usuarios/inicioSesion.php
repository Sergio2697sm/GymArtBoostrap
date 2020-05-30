<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceder</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="../estilos/sweetalert.css">

    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 
</head>

<body>
    <?php
    include "../header.php";
    include '../BBDD/conexionBBDD.php';
    include '../BBDD/usuariosBBDD.php';
    include '../funciones/funciones.php';
    ?>
    <main>
        <section>
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xs-12 col-sm-8 col-lg-12 align-self-center text-center">
                        <div class="contacto">
                            <h1 class="">Iniciar Sesión</h1>
                            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Usuario:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="usuario" <?php mostrar_campo('usuario') ?> aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contraseña:</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="contrasena" <?php mostrar_campo('usuario') ?> placeholder="Escriba aquí su asunto">
                                </div>

                                <button type="submit" class="btn btn-danger rounded-pill boton_enviar">Acceder</button>
                                <a href="registrarUsuario.php"><button type="button" class="boton_registrar btn btn-danger rounded-pill" value="Registrate">Registrate</button></a>
                                
                                <div class="botonAcceso d-flex justify-content-center align-items-center">
                                    <a href="cambiar_contrasena.php"><button type="button" class="boton_olvidar_contrasena btn btn-danger w-100 rounded-pill">¿Olvidaste la contraseña?</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
            if ($_POST) {
                iniciarSesion();
            }
            ?>
    </main>

    <?php
    include "../footer.php";
    ?>
</body>

</html>