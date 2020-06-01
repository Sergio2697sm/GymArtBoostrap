<?php
include '../BBDD/conexionBBDD.php';

if (isset($_REQUEST['typePagos']) == 'mostrarpagos') {
  $variable2 = verPagos();
  return $variable2;
}

if (isset($_REQUEST['typeDeudas']) == 'mostrarDeudas') {
  $variable2 = listaDeudores();
  return $variable2;
}

if (isset($_REQUEST['typeBarras']) == 'mostrarBarras') {
  $variable2 = verGraficosBarra();
  return $variable2;
}

if (isset($_REQUEST['typeCirculo']) == 'mostrarCirculo') {
  $variable2 = graficaCirculoAnio();
  return $variable2;
}


//-----------------------------------------Graficos Barra---------------------------------//
function verGraficosBarra()
{
  graficoAnio();
  graficosMes();
}

//-----------------------------------------Graficos Barra Anio---------------------------------//
function graficoAnio()
{
  //consulta a base de datos de la suma de todos los importes por Año
  $conexion = conectarUsuarios();
  $graficaAnio = "SELECT SUM(Importe) as Importe,Sum(Deuda) as Deuda,Importe - Deuda as Beneficio, Anio FROM pagos GROUP BY Anio ";
  $resultado = $conexion->query($graficaAnio);
?>

  <script type="text/javascript">
    // Load Charts and the corechart package.
    google.charts.load('current', {
      'packages': ['corechart']
    });

    google.setOnLoadCallback(miCuartoGrafico);

    function miCuartoGrafico() {
      //cargamos nuestro array $datos creado en PHP para que se puede utilizar en JavaScript
      var datosFinales = google.visualization.arrayToDataTable([
        ['Año', 'Ingresos', 'Deuda', 'Beneficio'],

        <?php
        //recorremos nuestro array del Año y la suma de esos importes
        while ($fila = $resultado->fetch_array()) {
          echo "['" . $fila["Anio"] . "'," . $fila["Importe"] . "," . $fila["Deuda"] . "," . $fila["Beneficio"] . "],";
        }
        ?>
      ]);
      var options = {
        title: 'Ganancias por Años',
        hAxis: {
          title: 'Años'
        },
        vAxis: {
          title: 'Euros',
          minValue: 0
        },
        legend: 'none',
      };
      var chart = new google.visualization.ColumnChart(document.getElementById('graficoAnio'));
      chart.draw(datosFinales, options);
    }
  </script>

  <div id="graficoAnio" class="graficoAnio"></div>

<?php

}

//-----------------------------------------Graficos Barra Mes---------------------------------//
function graficosMes()
{
  //consulta a base de datos de la suma de todos los importes por Año
  $conexion = conectarUsuarios();
  $graficaAnio = "SELECT SUM(Importe) as Importe,Sum(Deuda) as Deuda,Importe - Deuda as Beneficio,Mes FROM pagos WHERE Anio=2020 GROUP BY Mes ";
  $resultado = $conexion->query($graficaAnio);
?>

  <script type="text/javascript">
    // Load Charts and the corechart package.
    google.charts.load('current', {
      'packages': ['corechart']
    });

    google.setOnLoadCallback(miCuartoGrafico);

    function miCuartoGrafico() {
      //cargamos nuestro array $datos creado en PHP para que se puede utilizar en JavaScript
      var datosFinales = google.visualization.arrayToDataTable([
        ['Año', 'Ingresos', 'Deuda', 'Beneficio'],

        <?php
        //recorremos nuestro array del Año y la suma de esos importes
        while ($fila = $resultado->fetch_array()) {
          echo "['" . $fila["Mes"] . "'," . $fila["Importe"] . "," . $fila["Deuda"] . "," . $fila["Beneficio"] . "],";
        }
        ?>
      ]);
      var options = {
        title: 'Ganancias por meses del año 2020',
        hAxis: {
          title: 'Meses'
        },
        vAxis: {
          title: 'Euros',
          minValue: 0
        },
        legend: 'none',
      };
      var chart = new google.visualization.ColumnChart(document.getElementById('graficoMes'));
      chart.draw(datosFinales, options);
    }
  </script>
  <div id="graficoMes" class="graficoMes"></div>

<?php
}

//-----------------------------------------Graficos Circulo Anio---------------------------------//
function graficaCirculoAnio()
{
  //consulta a base de datos de la suma de todos los importes por Año
  $conexion = conectarUsuarios();
  $graficaAnio = "SELECT SUM(Importe) as Importe,Sum(Deuda) as Deuda,Importe - Deuda as Beneficio FROM pagos WHERE Anio =2020 ";
  $resultado = $conexion->query($graficaAnio);
?>
  <script>
    // Load Charts and the corechart package.
    google.charts.load('current', {
      'packages': ['corechart']
    });
    // Draw the pie chart for the Anthony's pizza when Charts is loaded.
    google.charts.setOnLoadCallback(miSegundoGrafico);

    function miSegundoGrafico() {

      // Create the data table for Anthony's pizza.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Topping');
      data.addColumn('number', 'Slices');

      data.addRows([
        <?php
        //recorremos nuestro array del Año y la suma de esos importes
        while ($fila = $resultado->fetch_array()) {
          echo "['Ingresos', $fila[Importe]],
                ['Beneficio', $fila[Beneficio]],
                ['Deuda', $fila[Deuda]],";
        }
        ?>
      ])


      // Set options for Anthony's pie chart.
      var options = {
        title: 'Ganancias de este año 2020',
        width: 400,
        height: 300
      };

      // Instantiate and draw the chart for Anthony's pizza.
      var chart = new google.visualization.PieChart(document.getElementById('graficos'));
      chart.draw(data, options);
    }
  </script>
  <div id="miSegundoGrafico" style="width: 900px; height: 300px;"></div>


  <?php
}


//-----------------------------------------Buscar Por mes---------------------------------//
function buscarPorMes()
{
  $informacion = $_POST["informacionPorMes"];
  $conexion = conectarUsuarios();
  $buscadorMes = " SELECT clientes.Nombre as nombreCliente, mensualidades.Nombre as nombreMensualidad, pagos.Mes as mes,pagos.Anio as anio,pagos.Pagado as pagado, pagos.Importe as importe
    FROM mensualidades INNER JOIN pagos INNER JOIN clientes ON mensualidades.CodigoMensualidad = pagos.CodigoMensualidad
   WHERE clientes.CodigoCliente=pagos.CodigoCliente AND mes = '$informacion'";
  //    echo $buscadorMes;

  $resultado = $conexion->query($buscadorMes);
  $contador = 0;
  while ($fila = $resultado->fetch_array()) {
    $contador++;
  ?>
    <tbody>
      <tr>
        <td scope="row"><?php echo "${fila['nombreCliente']}"; ?></td>
        <td><?php echo "${fila['nombreMensualidad']}"; ?></td>
        <td><?php echo "${fila['mes']}"; ?></td>
        <td><?php echo "${fila['importe']} €"; ?></td>
        <td> <input type="checkbox" name="pagado"></td>
      </tr>
    </tbody>
    <!-- <div class="divTableCelda">
      <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
        <input type="checkbox" name="pagado">
      </form>
    </div> -->
  <?php
  }
}

//-----------------------------------------Buscar Por Anio---------------------------------//

function buscarPorAnio()
{
  $conexion = conectarUsuarios();
  $buscadorAnio = " SELECT clientes.Nombre as nombreCliente, mensualidades.Nombre as nombreMensualidad, pagos.Mes as mes,pagos.Anio as anio,pagos.Pagado as pagado, pagos.Importe as importe
    FROM mensualidades INNER JOIN pagos INNER JOIN clientes ON mensualidades.CodigoMensualidad = pagos.CodigoMensualidad
   WHERE clientes.CodigoCliente=pagos.CodigoCliente AND pagos.Anio = $_POST[informacionPorAnio] GROUP BY nombreCliente";
  //    echo $buscadorAnio;
  $resultado = $conexion->query($buscadorAnio);
  $contador = 0;
  while ($fila = $resultado->fetch_array()) {
    $contador++;
  ?>
    <tbody>
      <tr>
        <td scope="row"><?php echo "${fila['nombreCliente']}"; ?></td>
        <td><?php echo "${fila['nombreMensualidad']}"; ?></td>
        <td><?php echo "${fila['mes']}"; ?></td>
        <td><?php echo "${fila['importe']} €"; ?></td>
        <td> <input type="checkbox" name="pagado"></td>
      </tr>
    </tbody>
  <?php
  }
}
//-----------------------------------------Ver Pagos de clientes activos---------------------------------//

function verPagos()
{
  $conexion = conectarUsuarios();
  $select_pagos = " SELECT clientes.Nombre as nombreCliente, mensualidades.Nombre as nombreMensualidad, pagos.Mes as mes,pagos.Anio as anio,pagos.Pagado as pagado, pagos.Importe as importe
    FROM mensualidades INNER JOIN pagos INNER JOIN clientes ON mensualidades.CodigoMensualidad = pagos.CodigoMensualidad
   WHERE clientes.CodigoCliente=pagos.CodigoCliente And pagado = 1 AND pagos.Anio='2020' ORDER BY nombreCliente";
  $resultado = $conexion->query($select_pagos);
  $contador = 0;

  while ($fila = $resultado->fetch_array()) {
    $contador++;

  ?>
    <tr>
      <td scope="row"><?php echo "${fila['nombreCliente']}"; ?></td>
      <td><?php echo "${fila['nombreMensualidad']}"; ?></td>
      <td><?php echo "${fila['mes']}"; ?></td>
      <td><?php echo "${fila['importe']} €"; ?></td>
      <td> <input type="checkbox" name="pagado" checked></td>
    </tr>

    <!-- <div class="divTableCelda"><?php //echo "${fila['pagado']}"; 
                                    ?></div> -->
    <!-- <div class="divTableCelda">
                <form action="<?php //echo $_SERVER["PHP_SELF"] 
                              ?>" method="POST">
                    <input type="checkbox" name="pagado" checked>
                </form>
            </div>

        </div> -->
  <?php
  }
}

//-----------------------------------------Ver Pagos de Deudores---------------------------------//

function listaDeudores()
{
  $conexion = conectarUsuarios();
  $select_deudores = " SELECT clientes.Nombre as nombreCliente, 
    mensualidades.Nombre as nombreMensualidad,
    pagos.CodigoPago as CodigoPago, 
    pagos.Mes as mes,
    pagos.Anio as anio, 
    pagos.Importe as importe
    FROM mensualidades INNER JOIN pagos INNER JOIN clientes ON mensualidades.CodigoMensualidad = pagos.CodigoMensualidad
   WHERE clientes.CodigoCliente=pagos.CodigoCliente And pagado = 0 AND pagos.Anio='2020'  ORDER BY nombreCliente";


  $resultado = $conexion->query($select_deudores);
  while ($fila = $resultado->fetch_array()) {
  ?>

    <tr>
      <td scope="row"><?php echo "${fila['nombreCliente']}"; ?></td>
      <td><?php echo "${fila['nombreMensualidad']}"; ?></td>
      <td><?php echo "${fila['mes']}"; ?></td>
      <td><?php echo "${fila['importe']} €"; ?></td>
      <td>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
          <input type='hidden' value="<?php echo "${fila['CodigoPago']}" ?>" name="id">
          <!--El submit -->
          <input type="submit" name="pagado" id="pagar" value="Pagar">
        </form>
      </td>
    </tr>
  <?php

  }
}

function checkPagar()
{

  $conexion = conectarUsuarios();
  $sql = "UPDATE pagos SET Pagado=1 WHERE CodigoPago=$_POST[id] ";
  echo $sql;


  $resultado = $conexion->query($sql);

  if (!$resultado) {
    echo 'Tuvimos problemas con la operacion del cliente, intentalo de nuevo más tarde';
  }
}


function selectNombreCliente()
{
  echo "hola";
  $conexion = conectarUsuarios();
  $sql = "SELECT pagos.CodigoCliente as codigoCliente,clientes.nombre as nombreCliente,clientes.Apellidos as apellidos FROM pagos INNER JOIN clientes on pagos.CodigoCliente = clientes.CodigoCliente GROUP BY nombreCliente";
  $resultado = $conexion->query($sql);
  while ($fila = $resultado->fetch_array()) {
  ?>
    <option value="<?php echo "${fila['codigoCliente']}"; ?>"><?php echo "${fila['nombreCliente']}"; ?> <?php echo "${fila['apellidos']}"; ?></option>
  <?php
  }
}

// //-----------------------------------------Select de las mensualidades de los clientes para insertar un cliente---------------------------------//

function selectMensualidad()
{
  $conexion = conectarUsuarios();
  $sql = "SELECT pagos.CodigoMensualidad as codigoMensualidad,mensualidades.Nombre as nombre FROM pagos INNER JOIN mensualidades on pagos.CodigoMensualidad = mensualidades.CodigoMensualidad GROUP BY nombre";
  $resultado = $conexion->query($sql);
  while ($fila = $resultado->fetch_array()) {
  ?>
    <option value="<?php echo "${fila['codigoMensualidad']}"; ?>"><?php echo "${fila['nombre']}"; ?></option>
<?php
  }
}

function selectImporte()
{
  $conexion = conectarUsuarios();
  $sql = "SELECT Nombre, Precio from mensualidades WHERE Anio=2020 AND Activo=1";
  $resultado = $conexion->query($sql);
  while ($fila = $resultado->fetch_array()) {
  ?>
    <option value="<?php echo "${fila['Precio']}"; ?>"><?php echo "${fila['Nombre']} " ,"-" , " ${fila['Precio']} €"; ?></option>
<?php
  }
}

// //-----------------------------------------Insertar Pagos---------------------------------//

function insertarPagos()
{
  $conexion = conectarUsuarios();
  $codigo = maximoCodigoTabla("pagos", "CodigoPago");
  $insertarPagos = "INSERT INTO pagos (CodigoPago,CodigoCliente,CodigoMensualidad,Mes,Anio,Importe,Deuda,Pagado) VALUES($codigo,$_POST[codigoCliente],$_POST[codigoMensusalidad],'$_POST[mes]',$_POST[anio],$_POST[importe],$_POST[deuda],'$_POST[pagado]')";
  // echo $insertarPagos;
  $resultado = $conexion->query($insertarPagos);
  if ($resultado) {
    echo " <script>
          Swal.fire({
              title: 'Cliente',
              text: 'Se ha insertado un pago correctamente',
              icon: 'success',
          }).then((result) => {
              if (result) {
                  window.location.href = '/GymArtBoostrap/pagos/verPagos.php';
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

//una vez que le de al boton de pagado se me hara la actualizacion del cliente con deudas y se ira a verPagos
if (isset($_POST["pagado"])) {
  checkPagar();
  header("Location:/GymArtBoostrap/pagos/verPagos.php");
}

?>