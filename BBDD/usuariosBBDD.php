<?php
//para que no me salga error en el header
ob_start ();

function iniciarSesion()
{
    $errores = [];
    if (empty($_POST['usuario'])) {
        $errores[] = "<script> Swal.fire({
            icon: 'error',
            title: 'Usuario',
            text: 'El usuario tiene que estar rellena',
            type: 'error',
          });</script>";
    }

    if (empty($_POST['contrasena'])) {
        $errores[] = "<script> Swal.fire({
            icon: 'error',
            title: 'Contraseña',
            text: 'la contraseña tiene que estar rellena',
            type: 'error',
          });</script>";
    }


    if ($errores) {
        mostrar_errores($errores);
        unset($errores);
    } else {
        $conexion = conectarUsuarios();
        $usuario = $_POST['usuario'];
        $contrasena = md5($_POST['contrasena']);

        $select_usuario = "SELECT Nombre FROM usuarios WHERE Nombre = '$usuario' AND Contrasena ='$contrasena'";
        $resultado = $conexion->query($select_usuario);


        if ($resultado->fetch_row()) {
            $_SESSION['usuario'] = $usuario;
            header('Location:/GymArtBoostrap/index.php');
        } else {
            echo "<script>  Swal.fire({
                title: 'Error',
                text: 'La conexion no se ha establecido con exito',
                type: 'error',
              });</script>";
        }
    }
}

function maximoCodigoUsuario()
{
    $conexion = conectarUsuarios();
    //para insertar el nuevo id
    //buscar en la BD el mayor id(max)
    $sql = "SELECT MAX(CodigoUsuario) FROM usuarios";
    $resultado = $conexion->query($sql);
    //hay que utilizar row porque no le hemos dado nombre a la columna seleccionada
    $fila = $resultado->fetch_row();
    $max_id = $fila[0];
    $nuevo_id = $max_id + 1;
    unset($conexion);
    return $nuevo_id;
}


function registrarUsuarios()
{
    $conexion = conectarUsuarios();
    $nick = $_POST["nick"];
    $contraseña = md5($_POST["contrasena"]);
    $contraseñaRepetida = md5($_POST["contrasena-repetida"]);
    $correo = $_POST["mail"];
    $errores = [];

    //este primer if sirve para comprobar que solo se esta metiendo una cadena de caracteres y no numeros
    if (validarNombre($nick)) {
        $errores[] = "<script> Swal.fire({
            icon: 'error',
            title: 'Nombre',
            text: 'No puede contener numeros',
            type: 'error',
          });</script>";
    }

    if (strlen($_POST['nick']) <= 3) {
        $errores[] = "<script> Swal.fire({
            icon: 'error',
            title: 'Usuario',
            text: 'El usuario tiene que tener mas de 3 caracteres',
            type: 'error',
          });</script>";
    }

    if (strlen($_POST['contrasena']) <= 5) {
        $errores[] = "<script> Swal.fire({
            icon: 'error',
            title: 'Contraseña',
            text: 'La contraseña tiene que tener mas de 5 caracteres',
            type: 'error',
          });</script>";
    }

    if ($contraseña != $contraseñaRepetida) {
        $errores[] = "<script> Swal.fire({
            icon: 'error',
            title: 'Contraseña',
            text: 'La contraseña tienen que ser iguales',
            type: 'error',
          });</script>";
    }

    if (!validad_email($correo)) {
        $errores[] = "<script>  Swal.fire({
            icon: 'error',
            title: 'Correo',
            text: 'Tiene que ser un correo válido',
            type: 'error',
          });</script>";
    }

    //comprueba que no se crea un usuario igual que el que esta registrado en la Base de Datos
    $usuario_unico = 'SELECT Nombre FROM usuarios where Nombre="' . $nick . '"';
    // echo $usuario_unico;
    $resultado_select = $conexion->query($usuario_unico);
    if ($resultado_select->fetch_array() != null) {
        $errores[] = "<script>  Swal.fire({
            icon: 'error',
            title: 'Usuario Repetido',
            text: 'Tiene que ser un usuario nuevo',
            type: 'error',
            });</script>";
    }

    if ($errores) {
        mostrar_errores($errores);
        unset($errores);
    } else {
        $codigo = maximoCodigoUsuario();
        $insert = "INSERT INTO usuarios (CodigoUsuario,Nombre,Contrasena,Email) VALUES($codigo,'$nick','$contraseña','$correo')";
        $resultado = $conexion->query($insert);

        //si se ha podido hacer una insercion que me lleve a esa pagina
        if ($resultado != null) {
            echo " <script>
                Swal.fire({
                    title: 'Usuario',
                    text: 'Se ha creado el usuario correctamente',
                    icon: 'success',
                }).then((result) => {
                    if (result) {
                        window.location.href = '/GymArtBoostrap/usuarios/inicioSesion.php';
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


function olvidarContrasena()
{
    $conexion = conectarUsuarios();
    $contraseña = md5($_POST["contrasena"]);
    $contraseñaRepetida = md5($_POST["contrasena-repetida"]);
    $nick = $_POST["nick"];


    $errores = [];

    if (strlen($_POST['contrasena']) <= 5) {
        $errores[] = "<script>  Swal.fire({
            icon: 'error',
            title: 'Contraseña',
            text: 'La contraseña tiene que tener un minimo de 5 caracteres',
            type: 'error',
            });</script>";
    }

    if (strlen($_POST["contrasena-repetida"]) <= 5) {
        $errores[] = "<script>  Swal.fire({
            icon: 'error',
            title: 'Contraseña',
            text: 'La contraseña tiene que tener un minimo de 5 caracteres',
            type: 'error',
            });</script>";
    }

    if ($contraseña != $contraseñaRepetida) {
        $errores[] = "<script>  Swal.fire({
            icon: 'error',
            title: 'Contraseña',
            text: 'La contraseña tienen que ser identicas',
            type: 'error',
            });</script>";
    }

    if ($errores) {
        mostrar_errores($errores);
        unset($errores);
    } else {
        $update_contrasena = "UPDATE usuarios SET Contrasena = '$contraseña' WHERE Nombre = '$nick' ";
        // echo $update_contrasena;
        $resultado = $conexion->query($update_contrasena);

        if ($resultado != null) {
            echo " <script>
            Swal.fire({
                title: 'Contraseña',
                text: 'Se ha cambiado la contraseña perfectamente',
                icon: 'success',
            }).then((result) => {
                if (result) {
                    window.location.href = '/GymArtBoostrap/usuarios/inicioSesion.php';
                }
            });
        </script> ";
        } else {
            echo '<p>Compruebe el correo o la contraseña</p>';
        }
    }
}
?>