<?php
include '../BBDD/pagosBBDD.php';
include '../funciones/funciones.php';
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
    if (isset($_POST["anadir_Pago"])) {
        insertarPagos();
    }

    ?>
    <main>
        <section>
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xs-12 col-sm-8 col-lg-12 align-self-center text-center ">
                        <form action=" <?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                            <div class="ModificarMensualidad">
                                <div class="datosPersonales text-center">
                                    <h1 class="">Información Pago</h1>
                                    <div class="form-group d-flex flex-column">
                                        <label for="InsertarNombre text-center">Nombre del clientes:</label>
                                        <select name="codigoCliente" id="InsertarNombre">
                                            <?php
                                            selectNombreCliente();
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group d-flex flex-column">
                                        <label for="InsertarMensualidad">Mensualidad:</label>
                                        <select name="codigoMensusalidad" id="InsertarMensualidad">
                                            <?php
                                            selectMensualidad();
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="InsertarMes">Mes:</label>
                                        <input type="text" class="form-control" <?php mostrar_campo("mes") ?> id="InsertarMes" name="mes">
                                    </div>

                                    <div class="form-group">
                                        <label for="InsertarAnio">Año:</label>
                                        <input type="text" class="form-control" <?php mostrar_campo("anio") ?> id="InsertarAnio" name="anio">
                                    </div>

                                    <div class="form-group d-flex flex-column">
                                        <label for="InsertarImporte">Importe:</label>
                                        <select name="importe" id="InsertarImporte">
                                            <?php
                                            selectImporte();
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="InsertarDeuda">Deuda:</label>
                                        <input type="text" class="form-control"  <?php mostrar_campo("deuda") ?> id="InsertarDeuda" name="deuda">
                                    </div>

                                    <div class="form-group d-flex flex-column">
                                        <label for="InsertarPagado">Pagado:</label>
                                        <select name="pagado" id="InsertarPagado">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select> </div>
                                  
                                    <button type="submit" name="anadir_Pago" class="btn btn-danger rounded-pill  w-100 boton_enviar">Insertar</button>
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