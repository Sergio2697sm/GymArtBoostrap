<?php
include '../funciones/funciones.php';
//------------------------------------------------BUSCAR MENSUALIDADES---------------------------------------------------------------------------------------//

function buscarMensualidad($estado)
{
    $conexion = conectarUsuarios();

    $buscar = $_POST["informacion"];
    $buscador = "SELECT * FROM mensualidades WHERE Activo = $estado AND (Nombre LIKE '%$buscar%' OR Anio LIKE '%$buscar%')";
    // echo $buscador;
    $resultado = $conexion->query($buscador);
    $contador = 0;
    while ($fila = $resultado->fetch_array()) {
        $contador++;
?>
        <tr>
            <th scope="row"><?php echo "${fila['Nombre']}"; ?></div>
            </th>
            <td><?php echo "${fila['DiasSemanas']}"; ?></div>
            </td>
            <td><?php echo "${fila['Precio']} €"; ?></td>
            <td>

                <div class="boton d-flex justify-content-center align-items-center">
                    <input type="checkbox" class="boton-checkbox" id="eChkBotones<?php echo $contador ?>">
                    <label for="eChkBotones<?php echo $contador ?>" class="tresbotones">...</label>
                    <!-- <form class="a-ocultar " action="<?php //echo $_SERVER["PHP_SELF"]  
                                                            ?>" method="POST">
                        <input type='hidden' value="<?php //echo "${fila['CodigoMensualidad']}" 
                                                    ?>" name="id">
                        <button type="submit" name="verMas"><img src="../imagenes/verMas.png" alt=""></button>
                    </form> -->

                    <form class="a-ocultar" name="editar" action="modificarClientes.php" method="POST">
                        <input type='hidden' value="<?php echo "${fila['CodigoMensualidad']}" ?>" name="id">
                        <!-- <input type="submit" name="editar_cliente" value="modificar"> -->
                        <button type="submit" name="ediar_cliente"><img src="../imagenes/editar.png" alt=""></button>
                    </form>

                    <form class="a-ocultar" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                        <input type='hidden' value="<?php echo "${fila['CodigoMensualidad']}" ?>" name="id">
                        <!-- <input type="submit" name="borrar" value="borrar"> -->
                        <button type="submit" name="borrar"><img src="../imagenes/delete.png" alt=""></button>
                    </form>
                </div>
            </td>
        </tr>
        </tbody>
    <?php
    }
}

//------------------------------------------------ VER MENSUALIDADES ---------------------------------------------------------------------------------------//

function verMensualidades($estado)
{
    $conexion = conectarUsuarios();
    $select_mensualidades = "SELECT * from mensualidades WHERE Activo=$estado ";
    $resultado = $conexion->query($select_mensualidades);
    $contador = 0;
    while ($fila = $resultado->fetch_array()) {
        $contador++;
    ?>
        <tbody>
            <tr>
                <th scope="row"><?php echo "${fila['Nombre']}"; ?>
                </th>
                <td><?php echo "${fila['DiasSemanas']}"; ?>
                </td>
                <td><?php echo "${fila['Precio']} €"; ?></td>
                <td>
                    <div class="boton d-flex justify-content-center align-items-center">
                        <input type="checkbox" class="boton-checkbox" id="eChkBotones<?php echo $contador ?>">
                        <label for="eChkBotones<?php echo $contador ?>" class="tresbotones">...</label>
                        <!-- <form class="a-ocultar " action="<?php //echo $_SERVER["PHP_SELF"]  
                                                                ?>" method="POST">
                            <input type='hidden' value="<?php //echo "${fila['CodigoMensualidad ']}" 
                                                        ?>" name="id">
                            <button type="submit" name="verMas"><img src="../imagenes/verMas.png" alt=""></button>
                        </form> -->

                        <form class="a-ocultar" name="editar" action="modificarMensualidad.php" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoMensualidad']}" ?>" name="id">
                            <!-- <input type="submit" name="editar_cliente" value="modificar"> -->
                            <button type="submit" name="editar_mensualidad"><img src="../imagenes/editar.png" alt=""></button>
                        </form>

                        <form class="a-ocultar" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoMensualidad']}" ?>" name="id">
                            <!-- <input type="submit" name="borrar" value="borrar"> -->
                            <button type="submit" name="borrar"><img src="../imagenes/delete.png" alt=""></button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    <?php
    };
    if (isset($_POST["borrar"])) {
        CambiarEstadoMensualidad();
    }
}

//------------------------------------------------ CAMBIAR DE ESTADO ACTIVO A INACTIVO ---------------------------------------------------------------------------------------//
function CambiarEstadoMensualidad()
{
    $conexion = conectarUsuarios();
    $select_cliente = "SELECT activo from clientes where CodigoCliente=$_POST[id] and activo = 1";
    //echo $select_cliente;
    $resultado_cliente = $conexion->query($select_cliente);

    if ($resultado_cliente->fetch_array() != null) {
        $cambiarEstadoMensualidad = "UPDATE mensualidades" .
            "SET Activo=0 " .
            "WHERE CodigoMensualidad=$_POST[id]";

        // echo $cambiarEstadoCliente;
        $resultado = $conexion->query($cambiarEstadoMensualidad);

        if ($resultado) {
            header("Location:verMensualidades.php");
        } else {

            echo '<p>Tuvimos problemas con la operacion del cliente, intentalo de nuevo más tarde</p>';
        }
    } else {
        $cambiarEstadoMensualidades = "UPDATE mensualidades " .
            "SET Activo=1 " .
            "WHERE CodigoMensualidad=$_POST[id]";

        // echo $cambiarEstadoClientes;
        $resultados = $conexion->query($cambiarEstadoMensualidades);

        if ($resultados) {
            header("Location:verMensualidades.php");
            // echo '<p>Operacion correcta1</p>';
        } else {

            echo '<p>Tuvimos problemas con la operacion del cliente, intentalo de nuevo más tarde</p>';
        }
    }
}

//------------------------------------------------MODIFICAR CLIENTES---------------------------------------------------------------------------------------//

function modificarMensualidades()
{
    $conexion = conectarUsuarios();
    if ($_POST) {
        //si me piden que modifique los datos los modifico
        if (isset($_POST["modificar_datos_mensualidades"])) {

            //Guardo los parametros en variables
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $diasSemana = $_POST["diasSemana"];
            $precio = $_POST["precio"];

            //Vamos a realizar una consulta UPDATE para actuliazar los datos de los clientes
            $actualizarMensualidades =
                "UPDATE mensualidades 
                SET Nombre='$nombre',DiasSemanas=$diasSemana,Precio=$precio WHERE CodigoMensualidad =$id";
            echo $actualizarMensualidades;
            //exit;
            $resultado = $conexion->query($actualizarMensualidades);

            if ($resultado) {
                header("Location:verMensualidades.php");
                echo "<p>Se ha modificado $conexion->affected_rows registros con exito</p>";
            } else {
                echo "Tuvimos problemas en la modificacion, intentelo de nuevo mas tarde";
            }
        }
    }

    visualizarDatosPorMensualidad();
}
function visualizarDatosPorMensualidad()
{
    $conexion = conectarUsuarios();

    $select_mensualidades = "SELECT * from mensualidades WHERE CodigoMensualidad = $_POST[id]";
    echo $select_mensualidades;
    $resultado = $conexion->query($select_mensualidades);

    $fila = $resultado->fetch_array();
    ?>

    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xs-12 col-sm-8 col-lg-12 align-self-center text-center">
                <form action=" <?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                    <input type='hidden' value="<?php echo "${fila['CodigoMensualidad']}" ?>" name="id">
                    <div class="ModificarMensualidad">
                        <div class="datosPersonales">
                            <h1 class="">Información Mensualidad</h1>
                            <div class="form-group">
                                <label for="ModificarNombre">Nombre de la mensualidad:</label>
                                <input type="text" value="<?php echo "${fila['Nombre']}" ?>" class="form-control text-center" id="ModificarNombre" name="nombre" required>
                            </div>

                            <div class="form-group">
                                <label for="modificarDias">Días a la semana:</label>
                                <input type="number" value="<?php echo "${fila['DiasSemanas']}" ?>" class="form-control text-center" id="modificarDias" name="diasSemana" required>
                            </div>

                            <div class="form-group">
                                <label for="modificarPrecio">Precio:</label>
                                <input type="number" value="<?php echo "${fila['Precio']}" ?>" class="form-control text-center" id="modificarPrecio" name="precio" required>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-danger rounded-pill boton_enviar w-100" name="modificar_datos_mensualidades">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}


// function borrarMensualidades()
// {
//     $conexion = conectarUsuarios();

//     $borrar_cliente = "DELETE from mensualidades WHERE id=$_POST[id]";
//     $resultado = $conexion->query($borrar_cliente);

//     if ($resultado) {
//         header("Location:verMensualidades.php");
//         echo '<p>Se ha borrado un cliente' . $conexion->affected_rows . ' registro con exito</p>';
//     } else {
//         echo '<p>Tuvimos problemas con la eliminacion del clientes, intentalo de nuevo más tarde</p>';
//     }
// }

function insertarMensualidad()
{
    $conexion = conectarUsuarios();

    //Guardo los parametros en variables
    $id = maximoCodigoTabla("mensualidades", "CodigoMensualidad");
    $nombre = $_POST["nombre"];
    $diasSemana = $_POST["diasSemana"];
    $precio = $_POST["precio"];
    $anio = $_POST["anio"];

    $anadir_mensualidad = "INSERT INTO mensualidades (CodigoMensualidad,Nombre,DiasSemanas,Precio,Anio) 
            VALUES($id,'$nombre',$diasSemana,$precio,$anio)";
    $resultado = $conexion->query($anadir_mensualidad);

    if ($resultado) {
        echo " <script>
            Swal.fire({
                title: 'Mensualidad',
                text: 'Se ha insertado una mensualidad correctamente',
                icon: 'success',
            }).then((result) => {
                if (result) {
                    window.location.href = '/GymArtBoostrap/mensualidades/verMensualidades.php';
                }
            });
        </script> ";
    } else {
        echo "<script> Swal.fire({
            title: '¡Error!',
            text: 'Tuvimos un problema, intentelo mas tarde',
            type: 'error',
          });</script>";
    }
}
?>