<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="./node_modules/jquery/dist/jquery.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include 'header.php';

    //Llamamos a los campos
    if ($_POST) {
        $nombre = $_POST['nombre'];
        $asunto = $_POST['asunto'];
        $correo = $_POST['correo'];
        $mensaje = $_POST['mensaje'];

        //Datos para el correo
        $destinatario = "sergiomartinez2m@gmail.com";

        $carta = "De: $nombre";
        $carta = "Para: $correo";
        $carta = "Mensaje: $mensaje";

        // // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        // $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        // $cabeceras .= 'Content-type: text/html; charset=UTF_8' . "\r\n";
        // $cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
        // $cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";

        //Enviar Correo
        $envio = mail($destinatario, $asunto, $carta);

        if ($envio) {
            echo "Se ha enviado el corrreo perfectamente";
        } else {
            echo "No se ha enviado correctamente";
        }
    }
    ?>
    <main>
        <section>
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xs-12 col-sm-8 col-lg-12 align-self-center text-center">
                        <div class="contacto">
                            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="nombre" aria-describedby="emailHelp" placeholder="Nombre">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Asunto:</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="asunto" placeholder="Escriba aquí su asunto">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Correo Electronico:</label>
                                    <input type="email" class="form-control" id="exampleInputPassword1" name="correo" placeholder="Escriba aquí su correo">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mensaje:</label>
                                    <textarea name="mensaje" cols="30" rows="10" placeholder="Escriba aquí su mensaje..."></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger">Borrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    include 'footer.php';
    ?>
</body>

</html>