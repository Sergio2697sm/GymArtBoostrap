<?php
include '../BBDD/pagosBBDD.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Graficas</title>
  <link rel="stylesheet" href="../estilos/estilos.css">
  <link rel="stylesheet" href="../estilos/sweetalert.css">

  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <script src="../node_modules/jquery/dist/jquery.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</head>

<body>
  <?php
  include '../header.php';

  ?>
  <main>
  <section>

  <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xs-12 col-sm-8 col-lg-12 align-self-center text-center ">
                         <div class="sectionGraficos">

        <div class="selectGrafico"> 
          <form action="" method="post">
            <label>Seleccione la grafica:</label>
            <select onchange="verGraficas()" name="tiposGraficos" id="eSelGraficas">
              <option value="" selected>---------------------</option>
              <option value="graficasBarras">Grafica de barras</option>
              <option value="graficasCirculares">Grafica Circular</option>
            </select>
          </form>
        </div>

        <div id="graficos"></div>
      </div>
                    </div>
                </div>
            </div>
        </section>
   
  </main>
  <?php
  include '../footer.php';
  ?>


  <script>
    var select = document.getElementById("eSelGraficas");

    function verGraficas() {
      console.log(select.value)
      if (select.value == "graficasBarras") {
        $.ajax({
          url: '../BBDD/pagosBBDD.php',
          type: 'post',
          data: {
            typeBarras: 'mostrarBarras',
          },
          dataType: "html",
          success: function(resultado) {
            console.log(resultado)
            $('#graficos').html(resultado);
          }
        })
      } else {
        $.ajax({
          url: '../BBDD/pagosBBDD.php',
          type: 'post',
          data: {
            typeCirculo: 'mostrarCirculo',
          },
          dataType: "html",
          success: function(resultado) {
            console.log("hola1")

            $('#graficos').html(resultado);
          }
        })
      }
    }
  </script> 

</body>

</html>