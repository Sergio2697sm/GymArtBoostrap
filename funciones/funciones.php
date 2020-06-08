<?php
//Funcion para mostrar los errores, recorriendo un array
function mostrar_errores($errores)
{

    foreach ($errores as $error) {
        echo $error;
    }
}

//funcion para mostrar los valores de los campos del formulario
function mostrar_campo($campo)
{
    if (isset($_POST[$campo]))
        echo 'value="' . $_POST[$campo] . '"';
}

//funcion para comprobar el correo
function validad_email($str)
{
    return (false !== strpos($str, "@") && false !== strpos($str, "."));
}

//funcion para validar el DNI
function validarDni($string)
{
    if (strlen($string) != 9 || preg_match('/^([XYZ]?)([0-9]{7,8})([A-Z])$/i', $string, $matches) !== 1)
        return false;

    $map = 'TRWAGMYFPDXBNJZSQVHLCKE';
    list(, $nieLetter, $number, $letter) = $matches;

    if ($nieLetter == 'Y')
        $number = '1' . $number;
    else if ($nieLetter == 'Z')
        $number = '2' . $number;

    return strtoupper($letter) === $map[((int) $number) % 23];
}

//funcion para validar solo texto
function validarNombre($campo) {
    if (!preg_match("/^[a-zA-Z]+/", $campo)) {
       return true;
    }
}

// *Funciones Requeridas para los clientes*/
function maximoCodigoTabla($tabla, $codigo)
{
    $conexion = conectarUsuarios();
    //para insertar el nuevo id
    //buscar en la BD el mayor id(max)
    $sql = "SELECT MAX($codigo) FROM $tabla";
    $resultado = $conexion->query($sql);
    //hay que utilizar row porque no le hemos dado nombre a la columna seleccionada
    $fila = $resultado->fetch_row();
    $max_id = $fila[0];
    $nuevo_id = $max_id + 1;
    unset($conexion);
    return $nuevo_id;
}
