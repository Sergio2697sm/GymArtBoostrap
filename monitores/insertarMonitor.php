<?php
include '../BBDD/conexionBBDD.php';
include '../BBDD/monitoresBBDD.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Clientes</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="../estilos/sweetalert.css">

    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>
    <?php
    include '../header.php';
    if (isset($_POST["insertarMonitor"])) {
        anadirMonitor();
    }

    ?>
    <main>
        <section>
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xs-12 col-sm-8 col-lg-12 align-self-center text-center ">
                        <form action=" <?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                            <div class="ModificarMensualidad">
                                <div class="datosPersonales">
                                    <h1 class="">Información Monitor</h1>
                                    <div class="form-group">
                                        <label for="ModificarNombre">Nombre de la Monitor:</label>
                                        <input type="text"  class="form-control text-center" <?php mostrar_campo("nombre")?> id="ModificarNombre" name="nombre" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="modificarApellidos">Apellidos:</label>
                                        <input type="text"  class="form-control text-center" <?php mostrar_campo("apellidos")?> id="modificarApellidos" name="apellidos" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="modificarTelefono">Telefono:</label>
                                        <input type="number"  class="form-control text-center" <?php mostrar_campo("telefono")?> id="modificarTelefono" name="telefono" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="modificarDni">Dni:</label>
                                        <input type="text" class="form-control text-center" <?php mostrar_campo("dni")?> id="modificarDni" name="dni" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="modificarSalario">Salario:</label>
                                        <input type="number" class="form-control text-center" <?php mostrar_campo("salario")?> id="modificarSalario" name="salario" required>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-danger rounded-pill boton_enviar w-100" name="insertarMonitor">Insertar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
    include '../footer.php';
    ?>
</body>

</html>