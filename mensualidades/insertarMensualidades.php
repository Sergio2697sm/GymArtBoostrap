<?php
include '../BBDD/conexionBBDD.php';
include '../BBDD/mensualidadesBBDD.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Mensualidad</title>
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
    if (isset($_POST["insertarMensualudades"])) {
        insertarMensualidad();
    }

    ?>
    <main>
        <section>
        <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xs-12 col-sm-8 col-lg-12 align-self-center text-center">
                <form action=" <?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                    <input type='hidden' value="<?php echo "${fila['CodigoMensualidad']}" ?>" name="id">
                    <div class="ModificarMensualidad">
                        <div class="datosPersonales">
                            <h1 class="">Insertar Mensualidad</h1>
                            <div class="form-group">
                                <label for="insertarNombre">Nombre de la mensualidad:</label>
                                <input type="text" class="form-control text-center" <?php mostrar_campo("nombre")?> id="insertarNombre" name="nombre" required>
                            </div>

                            <div class="form-group">
                                <label for="insertarDias">Días a la semana:</label>
                                <input type="number"  class="form-control text-center" <?php mostrar_campo("diasSemana")?> id="insertarDias" name="diasSemana" required>
                            </div>

                            <div class="form-group">
                                <label for="insertarPrecio">Precio:</label>
                                <input type="number"  class="form-control text-center" <?php mostrar_campo("precio")?> id="insertarPrecio" name="precio" required>
                            </div>

                            <div class="form-group">
                                <label for="insertarAnio">Anio:</label>
                                <input type="number"  class="form-control text-center" <?php mostrar_campo("anio")?> id="insertarAnio" name="anio" required>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-danger rounded-pill boton_enviar w-100" name="insertarMensualudades">Insertar</button>
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