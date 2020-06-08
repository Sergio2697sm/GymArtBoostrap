<?php
//para que no me salga error en el header
ob_start();
include '../funciones/funciones.php';
//------------------------------------------------BUSCAR CLIENTES ---------------------------------------------------------------------------------------//
function buscarClientes($estado)
{
    $conexion = conectarUsuarios();

    $buscar = $_POST["informacion"];
    $buscador = "SELECT * FROM clientes WHERE Activo = $estado AND (Nombre LIKE '%$buscar%' OR Apellidos LIKE '%$buscar%')";
    //echo $buscador;
    $resultado = $conexion->query($buscador);
    $contador = 0;
    while ($fila = $resultado->fetch_array()) {
        $contador++;
?>
        <tbody>
            <tr>
                <th scope="row"><?php echo "${fila['Nombre']}"; ?></div>
                </th>
                <td><?php echo "${fila['Apellidos']}"; ?></div>
                </td>
                <td><?php echo "${fila['Telefono']}"; ?></td>
                <td>

                    <div class="boton d-flex justify-content-center align-items-center">
                        <input type="checkbox" class="boton-checkbox" id="eChkBotones<?php echo $contador ?>">
                        <label for="eChkBotones<?php echo $contador ?>" class="tresbotones">...</label>
                        <form class="a-ocultar " action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                            <button type="submit" name="verMas"><img src="../imagenes/verMas.png" alt=""></button>
                        </form>

                        <form class="a-ocultar" name="editar" action="modificarClientes.php" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                            <!-- <input type="submit" name="editar_cliente" value="modificar"> -->
                            <button type="submit" name="ediar_cliente"><img src="../imagenes/editar.png" alt=""></button>
                        </form>

                        <form class="a-ocultar" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
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

//------------------------------------------------ VER CLIENTES ---------------------------------------------------------------------------------------//
function verClientes($estado)
{
    $conexion = conectarUsuarios();

    // $select_cliente = "SELECT * from clientes where Activo = 1 ";
    $select_cliente = "SELECT * from clientes where Activo = $estado";


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
                            <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                            <button type="submit" name="verMas"><img src="../imagenes/verMas.png" alt=""></button>
                        </form>

                        <form class="a-ocultar" name="editar" action="modificarClientes.php" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                            <!-- <input type="submit" name="editar_cliente" value="modificar"> -->
                            <button type="submit" name="ediar_cliente"><img src="../imagenes/editar.png" alt=""></button>
                        </form>

                        <form class="a-ocultar" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                            <!-- <input type="submit" name="borrar" value="borrar"> -->
                            <button type="submit" name="borrar"><img src="../imagenes/delete.png" alt=""></button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>

    <?php
    }
    ?>

    <?php
    if (isset($_POST["borrar"])) {
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
    $select_cliente = "SELECT * FROM clientes WHERE CodigoCliente = $_POST[id] ";

    $resultado = $conexion->query($select_cliente);

    while ($fila = $resultado->fetch_array()) {
        $correoElectronico = $fila['CorreoElectronico'];
        $telefono = $fila['Telefono'];
        $poblacion = $fila['Poblacion'];
        $edad = $fila['Edad'];
        $altura = $fila['Altura'];
        $peso = $fila['Peso'];
        $imc = $fila["MasaCorporal"];
        $actividadFisica = $fila['ActividadFisica'];
        $lesiones = $fila['Lesiones'];
        $domicilio = $fila['Domicilio'];


        echo "<script> Swal.fire({
            title: 'OTRA INFORMACION',
            html: '<b>Correo:</b> $correoElectronico </br> <b>Telefono:</b> $telefono </br> <b>poblacion:</b> $poblacion <br> <b>Domicilio:</b> $domicilio <br> <b>Edad:</b> $edad años <br> <b>Altura:</b> $altura metros <br> <b>Peso:</b> $peso kg <br> <b>IMC:</b>  $imc <br> <b>Lesiones:</b>  $lesiones <br><b>Actividad Fisica:</b> $actividadFisica',
            type: 'error',
          });</script>";
    }
}



//------------------------------------------------CAMBIAR DE ESTADO ACTIVO A INACTIVO---------------------------------------------------------------------------------------//

function CambiarEstadoClientes()
{
    $conexion = conectarUsuarios();
    $select_cliente = "SELECT activo from clientes where CodigoCliente=$_POST[id] and activo = 1";
    //echo $select_cliente;
    $resultado_cliente = $conexion->query($select_cliente);

    if ($resultado_cliente->fetch_array() != null) {
        $cambiarEstadoCliente = "UPDATE clientes " .
            "SET Activo=0 " .
            "WHERE CodigoCliente=$_POST[id]";

        // echo $cambiarEstadoCliente;
        $resultado = $conexion->query($cambiarEstadoCliente);

        if ($resultado) {
            header("Location:verClientes.php");
        } else {

            echo '<p>Tuvimos problemas con la operacion del cliente, intentalo de nuevo más tarde</p>';
        }
    } else {
        $cambiarEstadoClientes = "UPDATE clientes " .
            "SET Activo=1 " .
            "WHERE CodigoCliente=$_POST[id]";

        // echo $cambiarEstadoClientes;
        $resultados = $conexion->query($cambiarEstadoClientes);

        if ($resultados) {
            header("Location:verClientes.php");
            // echo '<p>Operacion correcta1</p>';
        } else {

            echo '<p>Tuvimos problemas con la operacion del cliente, intentalo de nuevo más tarde</p>';
        }
    }
}


//------------------------------------------------MODIFICAR CLIENTES---------------------------------------------------------------------------------------//

function modificarClientes()
{
    $conexion = conectarUsuarios();
    if ($_POST) {
        //si me piden que modifique los datos los modifico
        if (isset($_POST["modificar_datos_clientes"])) {

            //Guardo los parametros en variables
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $domicilio = $_POST["domicilio"];
            $poblacion = $_POST["poblacion"];
            $correoElectronico = $_POST["mail"];
            $telefono = $_POST["telefono"];
            $Observaciones = $_POST["Observaciones"];
            $peso = $_POST["peso"];
            $altura = $_POST["altura"];
            $edad = $_POST["edad"];
            $actividadFisica = $_POST["actividad"];
            $lesiones = $_POST["lesiones"];

            if (!validad_email($correoElectronico)) {
                $errores[] = "<script>  Swal.fire({
                    icon: 'error',
                    title: 'Correo',
                    text: 'Tiene que ser un correo valido',
                    type: 'error',
                  });</script>";
            }

            if ($errores) {
                mostrar_errores($errores);
                unset($errores);
            } else {
                $actualizarCliente =
                    "UPDATE clientes " .
                    "SET Nombre = '$nombre', Apellidos='$apellidos', Domicilio='$domicilio',Poblacion='$poblacion', CorreoElectronico='$correoElectronico', " .
                    " Telefono=$telefono, Observaciones= '$Observaciones', Peso=$peso, Altura = $altura, Edad=$edad, ActividadFisica='$actividadFisica', " .
                    " Lesiones='$lesiones' " .
                    "WHERE CodigoCliente=$id";
                echo $actualizarCliente;
                //exit;
                $resultado = $conexion->query($actualizarCliente);

                if ($resultado) {
                    echo " <script>
                Swal.fire({
                    title: 'Cliente',
                    text: 'Se ha cambiado la informacion exitosamente',
                    icon: 'success',
                }).then((result) => {
                    if (result) {
                        window.location.href = '/GymArtBoostrap/clientes/verClientes.php';
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

    visualizarDatosCliente();
}

//------------------------------------------------VISUALIZAR DATOS DE CLIENTES---------------------------------------------------------------------------------------//

function visualizarDatosCliente()
{
    $conexion = conectarUsuarios();

    $select_cliente = "SELECT * from clientes WHERE CodigoCliente=$_POST[id]";
    $resultado = $conexion->query($select_cliente);

    $fila = $resultado->fetch_array();
    ?>

    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xs-12 col-sm-8 col-lg-12 align-self-center text-center">
                <form action=" <?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                    <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                    <div class="Modificar">
                        <div class="datosPersonales">
                            <h1 class="">Datos Personales</h1>
                            <div class="form-group">
                                <label for="ModificarNombre">Nombre:</label>
                                <input type="text" value="<?php echo "${fila['Nombre']}" ?>" class="form-control" id="ModificarNombre" name="nombre" required>
                            </div>

                            <div class="form-group">
                                <label for="modificarApellidos">Apellidos:</label>
                                <input type="text" value="<?php echo "${fila['Apellidos']}" ?>" class="form-control" id="modificarApellidos" name="apellidos" required>
                            </div>

                            <div class="form-group">
                                <label for="modificarDomicilio">Domicilio:</label>
                                <input type="text" value="<?php echo "${fila['Domicilio']}" ?>" class="form-control" id="modificarDomicilio" name="domicilio" required>
                            </div>

                            <div class="form-group">
                                <label for="modificarPoblacion">Poblacion:</label>
                                <input type="text" value="<?php echo "${fila['Poblacion']}" ?>" class="form-control" id="modificarPoblacion" name="poblacion" required>
                            </div>

                            <div class="form-group">
                                <label for="modificarEmail">Email:</label>
                                <input type="email" value="<?php echo "${fila['CorreoElectronico']}" ?>" class="form-control" id="modificarEmail" name="mail" required>
                            </div>

                            <div class="form-group">
                                <label for="modificarTelefono">Telefono:</label>
                                <input type="number" value="<?php echo "${fila['Telefono']}" ?>" class="form-control" id="modificarTelefono" name="telefono" required>
                            </div>


                        </div>

                        <div class="datosAdicionales d-flex flex-column justify-content-center align-self-center ">
                            <h1>Información adicional</h1>
                            <div class="form-group">
                                <label for="modificarObservaciones">Observaciones:</label>
                                <input type="text" value="<?php echo "${fila['Observaciones']}" ?>" class="form-control" id="modificarObservaciones" name="Observaciones" required>
                            </div>

                            <div class="form-group">
                                <label for="modificarPeso">Peso:</label>
                                <input type="number" value="<?php echo "${fila['Peso']}" ?>" class="form-control" id="modificarPeso" name="peso" required>
                            </div>

                            <div class="form-group">
                                <label for="modificarAltura">Altura:</label>
                                <input type="number" value="<?php echo "${fila['Altura']}" ?>" class="form-control" id="modificarAltura" name="altura" required>
                            </div>

                            <div class="form-group">
                                <label for="modificarEdad">Edad:</label>
                                <input type="number" value="<?php echo "${fila['Edad']}" ?>" class="form-control" id="modificarEdad" name="edad" required>
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
                                <input type="text" value="<?php echo "${fila['Lesiones']}" ?>" class="form-control" id="modificarLesiones" name="lesiones">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger rounded-pill boton_enviar w-100" name="modificar_datos_clientes">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
}



//------------------------------------------------AÑADIR CLIENTES---------------------------------------------------------------------------------------//

function insertarClientes()
{
    $conexion = conectarUsuarios();

    //Guardo los parametros en variables
    $codigo = maximoCodigoTabla("clientes", "CodigoCliente");
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $domicilio = $_POST["domicilio"];
    $poblacion = $_POST["poblacion"];
    $correoElectronico = $_POST["mail"];
    $telefono = $_POST["telefono"];
    $Observaciones = $_POST["Observaciones"];
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];
    //calcular el induce de masa corporal
    $imc = ($peso / ($altura * $altura)) * 10000;
    $edad = $_POST["edad"];
    $actividadFisica = $_POST["actividad"];
    $lesiones = $_POST["lesiones"];

    $errores = [];
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
            title: 'Apellidos',
            text: 'No puede contener numeros',
            type: 'error',
          });</script>";
    }

    if (strlen($_POST["telefono"]) < 9) {
        $errores[] = "<script> Swal.fire({
            icon: 'error',
            title: 'Telefono',
            text: 'Numero de telefono incorrecto',
            type: 'error',
          });</script>";
    }

    if (!validad_email($correoElectronico)) {
        $errores[] = "<script>  Swal.fire({
            icon: 'error',
            title: 'Correo',
            text: 'Tiene que ser un correo valido',
            type: 'error',
          });</script>";
    }

    if ($errores) {
        mostrar_errores($errores);
        unset($errores);
    } else {
        $anadir_cliente = "INSERT INTO clientes (CodigoCliente,Nombre,Apellidos,Domicilio,Poblacion,
        CorreoElectronico,Telefono,Observaciones,Peso,Altura,MasaCorporal,Edad,ActividadFisica,Lesiones,Activo) 
        VALUES($codigo,'$nombre','$apellidos','$domicilio','$poblacion','$correoElectronico',
        $telefono,'$Observaciones',$peso,$altura,$imc,$edad,'$actividadFisica','$lesiones',1)";
        // echo "<p>$anadir_cliente </p>";
        $resultado = $conexion->query($anadir_cliente);

        if ($resultado) {
            echo " <script>
                Swal.fire({
                    title: 'Cliente',
                    text: 'Se ha insertado un cliente correctamente',
                    icon: 'success',
                }).then((result) => {
                    if (result) {
                        window.location.href = '/GymArtBoostrap/clientes/verClientes.php';
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
