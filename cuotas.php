<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuotas</title>
    <link rel="stylesheet" href="./estilos/estilos.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="./node_modules/jquery/dist/jquery.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <main>
        <section>


            <div class="container w-100 h-100">
                <div class="row justify-content-center  w-100 h-100">
                    <div class="col-sm-8 align-self-center text-center">
                        <div class="cuotas">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                <div class="titulo-precioB d-flex flex-column justify-content-center align-items-center">
                                    <h1>BASICA</h1>
                                    <p>29,90€/mes</p>
                                </div>

                                <div class="incluye incluye d-flex flex-column justify-content-center align-items-center w-100 h-100">
                                    <ul class="nav navbar-nav">
                                        <li>Clases GYM</li>
                                        <li>Maquinas</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                <div class="titulo-precioA d-flex flex-column justify-content-center align-items-center">
                                    <h1>AVANZADA</h1>
                                    <p>36,50€/mes</p>
                                </div>

                                <div class="incluye incluye d-flex flex-column justify-content-center align-items-center w-100 h-100">
                                    <ul class="nav navbar-nav ">
                                        <li>Clases GYM</li>
                                        <li>Maquinas</li>
                                        <li>Sauna</li>
                                        <li>Piscina</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="titulo-precioU d-flex flex-column justify-content-center align-items-center">
                                    <h1>ULTRA</h1>
                                    <p>50€/mes</p>
                                </div>

                                <div class="incluye d-flex flex-column justify-content-center align-items-center w-100 h-100">
                                    <ul class="nav navbar-nav ">
                                        <li>Clases GYM</li>
                                        <li>Las respectivas clases de GYM</li>
                                        <li>Maquinas</li>
                                        <li>Entrenador personal</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="container d-flex flex-column justify-content-center align-items-center">
                    <div class="row  d-flex flex-row justify-content-center align-items-center">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
                            <div class="titulo-precioB d-flex flex-column justify-content-center align-items-center">
                                <h1>BASICA</h1>
                                <p>29,90€/mes</p>
                            </div>

                            <div class="incluye incluye d-flex flex-column justify-content-center align-items-center w-100 h-100">
                                <ul class="nav navbar-nav">
                                    <li>Clases GYM</li>
                                    <li>Maquinas</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">

                            <div class="titulo-precioA d-flex flex-column justify-content-center align-items-center">
                                <h1>AVANZADA</h1>
                                <p>36,50€/mes</p>
                            </div>

                            <div class="incluye incluye d-flex flex-column justify-content-center align-items-center w-100 h-100">
                                <ul class="nav navbar-nav ">
                                    <li>Clases GYM</li>
                                    <li>Maquinas</li>
                                    <li>Sauna</li>
                                    <li>Piscina</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
                            <div class="titulo-precioU d-flex flex-column justify-content-center align-items-center">
                                <h1>ULTRA</h1>
                                <p>50€/mes</p>
                            </div>

                            <div class="incluye d-flex flex-column justify-content-center align-items-center w-100 h-100">
                                <ul class="nav navbar-nav ">
                                    <li>Clases GYM</li>
                                    <li>Las respectivas clases de GYM</li>
                                    <li>Maquinas</li>
                                    <li>Entrenador personal</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </section>
    </main>
    <?php
    include 'footer.php';
    ?>

</body>

</html>