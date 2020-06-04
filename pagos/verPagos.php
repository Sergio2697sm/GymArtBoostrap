<?php
include '../BBDD/conexionBBDD.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="../estilos/sweetalert.css">

    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>
    <?php
    include "../header.php";
    ?>
    <main>
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xs-12 col-sm-8 col-lg-12 align-self-center text-center">
                        <div class="tablasPagos">
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

                            <div class="selectPagos d-flex justify-content-center align-items-center">
                                <form action="" method="post">
                                    <label>Selecciona que tipo de pago quieres visualizar:</label>
                                    <select class="form-control" onchange="enviar()" name="tiposDePagos" id="eSelPagos">
                                        <option value="" selected>-----------</option>
                                        <option value="listaPagos">Lista de Pagos</option>
                                        <option value="listaDeudores">Lista de Deudores</option>
                                    </select>
                                </form>
                            </div>
                            <table class="table text-center table-striped table-bordered h-100">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Mensualidad</th>
                                        <th scope="col">Mes</th>
                                        <th scope="col">Importe</th>
                                        <th scope="col">Accion</th>
                                    </tr>
                                </thead>
                                <tbody id="divTableBody"></tbody>
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

    <script>
        var select = document.getElementById("eSelPagos");

        function enviar() {
            // console.log(select.value)
            if (select.value == "listaPagos") {
                $.ajax({
                    url: '../BBDD/pagosBBDD.php',
                    type: 'post',
                    data: {
                        typePagos: 'mostrarpagos',
                    },
                    dataType: "html",
                    success: function(resultado) {
                        $('#divTableBody').html(resultado);
                    }
                })
            } else {
                $.ajax({
                    url: '../BBDD/pagosBBDD.php',
                    type: 'post',
                    data: {
                        typeDeudas: 'mostrarDeudas',
                    },
                    dataType: "html",
                    success: function(resultado) {
                        $('#divTableBody').html(resultado);
                    }
                })
            }
        }
    </script>
</body>

</html>