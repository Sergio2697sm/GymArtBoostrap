<?php
include '../BBDD/conexionBBDD.php';
include '../BBDD/mensualidadesBBDD.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Antiguos</title>
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
    ?>
    <main>
        <section>
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xs-12 col-sm-8 col-lg-12 align-self-center text-center ">
                        <div class="tablas">
                            <h1 class="">BUSCADOR DE MENSUALIDAD</h1>

                            <?php
                            include 'menuOpciones.php';
                            ?>
                            <div class="buscador">
                                <form action="buscador.php" method="POST">
                                    <div class="input">
                                        <input type="search" name="informacion" id="" class="i_buscar" placeholder="Buscar por apellido o nombre">
                                        <button type="submit" name="buscarInactivo"><img src="../imagenes/lupa.png" alt=""></button>
                                    </div>
                                </form>
                            </div>

                            <div class="clientesAntiguos ">
                                <button class="botonDerecha btn btn-danger rounded-pill float-right"><a href="verClientes.php">CLIENTES ACTIVOS</a></button>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Clase/Equipamiento</th>
                                        <th scope="col">Días a la semana</th>
                                        <th scope="col">Precio mensual</th>
                                        <th scope="col">Accion</th>
                                    </tr>
                                </thead>
                                <?php
                                if (isset($_POST["buscarActivo"])) {
                                    buscarMensualidad(1);
                                } else {
                                    buscarMensualidad(0);
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    include "../footer.php";
    ?>
</body>

</html>