<?php
include '../BBDD/conexionBBDD.php';
include '../BBDD/clientesBBDD.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Clientes</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <!-- <link rel="stylesheet" href="../estilos/sweetalert.css"> -->

    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
</head>

<body>
    <?php
    include '../header.php';
    if (isset($_POST["anadir_cliente"])) {
        anadirClientes();
    }

    ?>
    <main>
        <section>
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xs-12 col-sm-8 col-lg-12 align-self-center text-center ">
                        <form action=" <?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                        <div class="Modificar">
                                <div class="datosPersonales">
                                    <h1 class="">Datos Personales</h1>
                                    <div class="form-group">
                                        <label for="ModificarNombre">Nombre:</label>
                                        <input type="text" class="form-control" id="ModificarNombre" name="nombre">
                                    </div>

                                    <div class="form-group">
                                        <label for="modificarApellidos">Apellidos:</label>
                                        <input type="text" class="form-control" id="modificarApellidos" name="apellidos">
                                    </div>

                                    <div class="form-group">
                                        <label for="modificarDomicilio">Domicilio:</label>
                                        <input type="text" class="form-control" id="modificarDomicilio" name="domicilio">
                                    </div>

                                    <div class="form-group">
                                        <label for="modificarPoblacion">Poblacion:</label>
                                        <input type="text" class="form-control" id="modificarPoblacion" name="poblacion">
                                    </div>

                                    <div class="form-group">
                                        <label for="modificarEmail">Email:</label>
                                        <input type="text" class="form-control" id="modificarEmail" name="mail">
                                    </div>

                                    <div class="form-group">
                                        <label for="modificarTelefono">Telefono:</label>
                                        <input type="text" class="form-control" id="modificarTelefono" name="mail">
                                    </div>


                                </div>

                                <div class="datosAdicionales d-flex flex-column justify-content-center align-self-center ">
                                    <h1>Información adicional</h1>
                                    <div class="form-group">
                                        <label for="modificarObservaciones">Observaciones:</label>
                                        <input type="text" class="form-control" id="modificarObservaciones" name="Observaciones">
                                    </div>

                                    <div class="form-group">
                                        <label for="modificarPeso">Peso:</label>
                                        <input type="text" class="form-control" id="modificarPeso" name="peso">
                                    </div>

                                    <div class="form-group">
                                        <label for="modificarAltura">Altura:</label>
                                        <input type="text" class="form-control" id="modificarAltura" name="altura">
                                    </div>

                                    <div class="form-group">
                                        <label for="modificarEdad">Edad:</label>
                                        <input type="text" class="form-control" id="modificarEdad" name="Edad">
                                    </div>

                                    <div class="form-group">
                                        <label for="modificaActividadFisica">ActividadFisica:</label>
                                        <select class="form-control" name="actividad" id="modificaActividadFisica">
                                            <option value="Principiante">Principiante</option>
                                            <option value="Intermedio">Intermedio</option>
                                            <option value="Extremo">Extremo</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="modificarLesiones">Lesiones:</label>
                                        <input type="text" class="form-control" id="modificarLesiones" name="lesiones">
                                    </div>
                                </div>
                                <button type="submit" name="anadir_cliente" class="btn btn-danger rounded-pill  w-100 boton_enviar">Insertar</button>
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