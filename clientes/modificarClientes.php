<?php
include '../BBDD/conexionBBDD.php';
include '../BBDD/clientesBBDD.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Clientes</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="../estilos/sweetalert.css">

    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include '../header.php'; ?>
    <main>
        <section>
            <?php
            modificarClientes();
            ?>
        </section>
    </main>
    <?php include '../footer.php'; ?>
</body>

</html>