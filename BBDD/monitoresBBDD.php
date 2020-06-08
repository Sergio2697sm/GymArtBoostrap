<?php
//para que no me salga error en el header
ob_start();
include '../funciones/funciones.php';
//------------------------------------------------BUSCAR CLIENTES ---------------------------------------------------------------------------------------//
function buscarMonitor($estado)
{
    $conexion = conectarUsuarios();

    $buscar = $_POST["informacion"];
    $buscador = "SELECT * FROM monitores WHERE Activo = $estado AND (Nombre LIKE '%$buscar%' OR Apellidos LIKE '%$buscar%')";
    //echo $buscador;
    $resultado = $conexion->query($buscador);
    $contador = 0;
    while ($fila = $resultado->fetch_array()) {
        $contador++;
?>
      <tbody>
            <tr>
                <td scope="row"><?php echo "${fila['Nombre']}"; ?></td>
                <td><?php echo "${fila['Apellidos']}"; ?></td>
                <td><?php echo "${fila['Telefono']}"; ?></td>
                <td>
                    <div class="boton d-flex justify-content-center align-items-center">
                        <input type="checkbox" class="boton-checkbox" id="eChkBotones<?php echo $contador ?>">
                        <label for="eChkBotones<?php echo $contador ?>" class="tresbotones">...</label>
                        <form class="a-ocultar " action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoMonitor']}" ?>" name="id">
                            <button type="submit" name="verMas"><img src="../imagenes/verMas.png" alt=""></button>
                        </form>

                        <form class="a-ocultar" name="editar" action="modificarMonitores.php" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoMonitor']}" ?>" name="id">
                            <button type="submit" name="ediar_cliente"><img src="../imagenes/editar.png" alt=""></button>
                        </form>

                        <form class="a-ocultar" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoMonitor']}" ?>" name="id">
                            <!-- <input type="submit" name="borrar" value="borrar"> -->
                            <button type="submit" name="cambiarEstado"><img src="../imagenes/delete.png" alt=""></button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    <?php
    }
}
//------------------------------------------------VER MONITORES---------------------------------------------------------------------------------------//

function verMonitores($estado)
{
    $conexion = conectarUsuarios();
    $select_cliente = "SELECT * from monitores WHERE Activo=$estado";

    //para recorrer los id para los puntos
    $resultado = $conexion->query($select_cliente);
    $contador = 0;

    while ($fila = $resultado->fetch_array()) {
        $contador++;
?>
        <tbody>
            <tr>
                <td scope="row"><?php echo "${fila['Nombre']}"; ?></td>
                <td><?php echo "${fila['Apellidos']}"; ?></td>
                <td><?php echo "${fila['Telefono']}"; ?></td>
                <td>
                    <div class="boton d-flex justify-content-center align-items-center">
                        <input type="checkbox" class="boton-checkbox" id="eChkBotones<?php echo $contador ?>">
                        <label for="eChkBotones<?php echo $contador ?>" class="tresbotones">...</label>
                        <form class="a-ocultar " action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoMonitor']}" ?>" name="id">
                            <button type="submit" name="verMas"><img src="../imagenes/verMas.png" alt=""></button>
                        </form>

                        <form class="a-ocultar" name="editar" action="modificarMonitores.php" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoMonitor']}" ?>" name="id">
                            <button type="submit" name="ediar_cliente"><img src="../imagenes/editar.png" alt=""></button>
                        </form>

                        <form class="a-ocultar" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoMonitor']}" ?>" name="id">
                            <!-- <input type="submit" name="borrar" value="borrar"> -->
                            <button type="submit" name="cambiarEstado"><img src="../imagenes/delete.png" alt=""></button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    <?php
    }
    if (isset($_POST["cambiarEstado"])) {
        CambiarEstadoClientes();
    }

    if (isset($_POST["verMas"])) {
        verMas();
    }
}

//------------------------------------------------VER MAS INFORMACION---------------------------------------------------------------------------------------//
function verMas()
{
    $conexion = conectarUsuarios();
    $select_cliente = "SELECT * FROM monitores WHERE CodigoMonitor = $_POST[id] ";

    $resultado = $conexion->query($select_cliente);

    while ($fila = $resultado->fetch_array()) {
        $dni = $fila["DNI"];
        $salario = $fila["Salario"];


        echo "<script> Swal.fire({
            title: 'OTRA INFORMACION',
            html: '<b>DNI:</b> $dni </br> <b>Salario:</b> $salario € </br> ',
            type: 'error',
          });</script>";
    }
}

//------------------------------------------------CAMBIAR DE ESTADO ACTIVO A INACTIVO---------------------------------------------------------------------------------------//

function CambiarEstadoClientes()
{
    $conexion = conectarUsuarios();
    $select_monitor = "SELECT activo from monitores where CodigoMonitor=$_POST[id] and activo = 1";
    //echo $select_cliente;
    $resultado_cliente = $conexion->query($select_monitor);

    if ($resultado_cliente->fetch_array() != null) {
        $cambiarEstadoCliente = "UPDATE monitores " .
            "SET Activo=0 " .
            "WHERE CodigoMonitor=$_POST[id]";

        // echo $cambiarEstadoCliente;
        $resultado = $conexion->query($cambiarEstadoCliente);

        if ($resultado) {
            header("Location:verMonitores.php");
        } else {

            echo '<p>Tuvimos problemas con la operacion del cliente, intentalo de nuevo más tarde</p>';
        }
    } else {
        $cambiarEstadoMonitor = "UPDATE monitores " .
            "SET Activo=1 " .
            "WHERE CodigoMonitor=$_POST[id]";

        // echo $cambiarEstadoClientes;
        $resultados = $conexion->query($cambiarEstadoMonitor);

        if ($resultados) {
            header("Location:verMonitores.php");
        } else {

            echo '<p>Tuvimos problemas con la operacion del cliente, intentalo de nuevo más tarde</p>';
        }
    }
}

//------------------------------------------------MODIFICAR INFORMACION DEL MONITOR---------------------------------------------------------------------------------------//

function modificarMonitor()
{
    $conexion = conectarUsuarios();
    if ($_POST) {
        //si me piden que modifique los datos los modifico
        if (isset($_POST["modificar_datos_monitor"])) {

            //Guardo los parametros en variables
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $dni = $_POST["dni"];
            $telefono = $_POST["telefono"];
            $salario = $_POST["salario"];

            if (validarNombre($nombre)) {
                $errores[] = "<script> Swal.fire({
                    icon: 'error',
                    title: 'Nombre',
                    text: 'No puede contener numeros',
                    type: 'error',
                  });</script>";
            }

            if (validarNombre($apellidos)) {
                $errores[] = "<script> Swal.fire({
                    icon: 'error',
                    title: 'Nombre',
                    text: 'No puede contener numeros',
                    type: 'error',
                  });</script>";
            }

            if (validarDni($dni)) {
                $errores[] = "<script>  Swal.fire({
                    icon: 'error',
                    title: 'DNI',
                    text: 'Tiene que ser un dni valido',
                    type: 'error',
                  });</script>";
            }

            if (strlen($telefono) < 9) {
                $errores[] = "<script>  Swal.fire({
                    icon: 'error',
                    title: 'Telefono',
                    text: 'Tiene que ser un telefono valido',
                    type: 'error',
                  });</script>";
            }


            if ($errores) {
                mostrar_errores($errores);
                unset($errores);
            } else {
                $actualizarCliente =
                    "UPDATE monitores " .
                    "SET Nombre = '$nombre', Apellidos='$apellidos', DNI='$dni',Telefono=$telefono, Salario=$salario " .
                    "WHERE CodigoMonitor=$id";
                echo $actualizarCliente;
                //exit;
                $resultado = $conexion->query($actualizarCliente);

                if ($resultado) {
                    echo " <script>
                Swal.fire({
                    title: 'Monitor',
                    text: 'Se ha cambiado la informacion exitosamente',
                    icon: 'success',
                }).then((result) => {
                    if (result) {
                        window.location.href = '/GymArtBoostrap/monitores/verMonitores.php';
                    }
                });
            </script> ";
                } else {
                    echo "<script> Swal.fire({
                        title: '¡Error!',
                        text: 'Tuvimos problemas, intentelo mas tarde',
                        type: 'error',
                      });</script>";
                }
            }
            //Vamos a realizar una consulta UPDATE para actuliazar los datos de los clientes

        }
    }

    visualizarDatosPorMensualidad();
}

//------------------------------------------------VISUALIZAR DATOS DE MONITOR---------------------------------------------------------------------------------------//

function visualizarDatosPorMensualidad()
{
    $conexion = conectarUsuarios();

    $select_mensualidades = "SELECT * from monitores WHERE CodigoMonitor = $_POST[id]";
    //echo $select_mensualidades;
    $resultado = $conexion->query($select_mensualidades);

    $fila = $resultado->fetch_array();
    ?>

    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xs-12 col-sm-8 col-lg-12 align-self-center text-center">
                <form action=" <?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                    <input type='hidden' value="<?php echo "${fila['CodigoMonitor']}" ?>" name="id">
                    <div class="ModificarMensualidad">
                        <div class="datosPersonales">
                            <h1 class="">Información Monitor</h1>
                            <div class="form-group">
                                <label for="ModificarNombre">Nombre de la Monitor:</label>
                                <input type="text" value="<?php echo "${fila['Nombre']}" ?>" class="form-control text-center" id="ModificarNombre" name="nombre" required>
                            </div>

                            <div class="form-group">
                                <label for="modificarApellidos">Apellidos:</label>
                                <input type="text" value="<?php echo "${fila['Apellidos']}" ?>" class="form-control text-center" id="modificarApellidos" name="apellidos" required>
                            </div>

                            <div class="form-group">
                                <label for="modificarTelefono">Telefono:</label>
                                <input type="number" value="<?php echo "${fila['Telefono']}" ?>" class="form-control text-center" id="modificarTelefono" name="telefono" required>
                            </div>

                            <div class="form-group">
                                <label for="modificarDni">Dni:</label>
                                <input type="text" value="<?php echo "${fila['DNI']}" ?>" class="form-control text-center" id="modificarDni" name="dni" required>
                            </div>

                            <div class="form-group">
                                <label for="modificarSalario">Salario:</label>
                                <input type="number" value="<?php echo "${fila['Salario']}" ?>" class="form-control text-center" id="modificarSalario" name="salario" required>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-danger rounded-pill boton_enviar w-100" name="modificar_datos_monitor">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}

//------------------------------------------------AÑADIR CLIENTES---------------------------------------------------------------------------------------//

function anadirMonitor()
{
    $conexion = conectarUsuarios();

    //Guardo los parametros en variables
    $codigo = maximoCodigoTabla("monitores","CodigoMonitor");
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $telefono = $_POST["telefono"];
    $salario = $_POST["salario"];

    if (validarNombre($nombre)) {
        $errores[] = "<script> Swal.fire({
            icon: 'error',
            title: 'Nombre',
            text: 'No puede contener numeros',
            type: 'error',
          });</script>";
    }

    if (validarNombre($apellidos)) {
        $errores[] = "<script> Swal.fire({
            icon: 'error',
            title: 'Nombre',
            text: 'No puede contener numeros',
            type: 'error',
          });</script>";
    }

    if (validarDni($dni)) {
        $errores[] = "<script>  Swal.fire({
         icon: 'error',
         title: 'DNI',
         text: 'Tiene que ser un dni valido',
         type: 'error',
       });</script>";
    }

    if (strlen($telefono) < 9) {
        $errores[] = "<script>  Swal.fire({
         icon: 'error',
         title: 'Telefono',
         text: 'Tiene que ser un telefono valido',
         type: 'error',
       });</script>";
    }

    if ($errores) {
        mostrar_errores($errores);
        unset($errores);
    } else {
        $anadir_monitores = "INSERT INTO monitores (CodigoMonitor,Nombre,Apellidos,DNI,Telefono,
        Salario) 
        VALUES($codigo,'$nombre','$apellidos','$dni',$telefono,$salario)";
        //echo "<p>$anadir_monitores </p>";
        $resultado = $conexion->query($anadir_monitores);

        if ($resultado) {
            echo " <script>
                Swal.fire({
                    title: 'Monitores',
                    text: 'Se ha insertado un monitor correctamente',
                    icon: 'success',
                }).then((result) => {
                    if (result) {
                        window.location.href = '/GymArtBoostrap/monitores/verMonitores.php';
                    }
                });
            </script> ";
        } else {
            echo "<script> Swal.fire({
                title: '¡Error!',
                text: 'No se ha creado el usuario, intentelo mas tarde',
                type: 'error',
              });</script>";
        }
    }
}
