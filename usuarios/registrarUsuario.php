<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
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
                            <h1 class="">Registrate</h1>
                            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Usuario:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="nick" <?php mostrar_campo('usuario') ?> aria-describedby="emailHelp" placeholder="Nombre" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Contraseña:</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="contrasena" <?php mostrar_campo('contrasena') ?> placeholder="Escriba su contraseña" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Repetir Contraseña:</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="contrasena-repetida" <?php mostrar_campo('contrasena-repetida') ?> placeholder="Vuelva a escribir su contraseña" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Correo Electrónico:</label>
                                    <input type="email" class="form-control" id="exampleInputPassword1" name="mail" <?php mostrar_campo('mail') ?> placeholder="Introduzca su correo electronico" required>
                                </div>

                                <a href="inicioSesion.php" class="btn btn-danger rounded-pill boton_enviar">Atras</a>
                                <button type="submit" name="registrar_usuario" class="btn btn-danger rounded-pill boton_enviar">Registrate</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        if ($_POST) {
            registrarUsuarios();
        }
        ?>
    </main>
    <?php
    include "../footer.php";
    ?>
</body>

</html>