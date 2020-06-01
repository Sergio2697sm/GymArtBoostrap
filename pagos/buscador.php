<?php
include '../BBDD/pagosBBDD.php';
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
                            <h1 class="">LISTADO DE PAGOS</h1>

                            <?php
                            include 'menuOpciones.php';
                            ?>

                            <div class="buscador">
                                <form action="buscador.php" method="POST">
                                    <div class="buscador">
                                        <form action="buscador.php" method="POST">
                                            <div class="input">
                                                <input type="search" name="informacionPorMes" id="" class="i_buscar" placeholder="Buscar por mes">
                                                <button type="submit" name="buscarMes"><img src="../imagenes/lupa.png" alt=""></button>
                                                <input type="search" name="informacionPorAnio" id="" class="i_buscar" placeholder="Buscar por año">
                                                <button type="submit" name="buscarAnio"><img src="../imagenes/lupa.png" alt=""></button>
                                            </div>
                                        </form>
                                    </div>
                            </div>

                            <div class="selectPagos">
                                <form action="" method="post">
                                    <label>Selecciona que tipo de pago quieres visualizar:</label>
                                    <select class="form-control" onchange="enviar()" name="tiposDePagos" id="eSelPagos">
                                        <option value="" selected>-----------</option>
                                        <option value="listaPagos">Lista de Pagos</option>
                                        <option value="listaDeudores">Lista de Deudores</option>
                                    </select>
                                </form>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Mensualidad</th>
                                        <th scope="col">Mes</th>
                                        <th scope="col">Importe</th>
                                        <th scope="col">Accion</th>
                                    </tr>
                                </thead>
                                <?php
                                if (isset($_POST["buscarMes"])) {
                                    buscarPorMes();
                                } else {
                                    buscarPorAnio();
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