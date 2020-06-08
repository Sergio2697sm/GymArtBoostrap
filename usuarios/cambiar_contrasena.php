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
                            <h1 class="">Olvidar Contraseña</h1>
                            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">

                                <div class="form-group">
                                    <label for="insertarNombre">Introduce tu usuario:</label>
                                    <input type="text" class="form-control" id="insertarNombre" name="nick" <?php mostrar_campo('nick') ?> aria-describedby="emailHelp" placeholder="Escribe tu usuario" required>
                                </div>

                                <div class="form-group">
                                    <label for="insertarContrasena">Nueva Contraseña:</label>
                                    <input type="password" class="form-control" id="insertarContrasena" name="contrasena" <?php mostrar_campo('contrasena') ?> placeholder="Escriba su contraseña">
                                </div>

                                <div class="form-group">
                                    <label for="insertarRepeContrasena">Repeta Contraseña:</label>
                                    <input type="password" class="form-control" id="insertarRepeContrasena" name="contrasena-repetida" <?php mostrar_campo('contrasena-repetida') ?> placeholder="Vuelva a escribir su contraseña">
                                </div>


                                <button type="submit" name="recuperarContrasena" class="btn btn-danger rounded-pill boton_enviar">Cambiar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        if (isset($_POST["recuperarContrasena"])) {
            olvidarContrasena();
        }
        ?>
    </main>
    <?php
    include "../footer.php";
    ?>
</body>

</html>