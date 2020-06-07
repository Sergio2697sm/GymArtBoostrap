<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quienes somos</title>
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
        <section class="d-flex justify-content-center align-items-center col-xs-12 col-sm-8 col-md-12 col-lg-12">
            <div id="tagDivMapa" class="mapa"></div>
            <div id="tagDivPanorama" class=""></div>
        </section>
    </main>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfulz2jpJ3DGJQRHy-cpOjARGoGIUSLY8&callback=initMap">
    </script>

    <script type="text/javascript">
        function initMap() {
            //Ponemos el mapa
            var coord = {
                lat: 37.667544,
                lng: -1.701064
            };

            var map = new google.maps.Map(document.getElementById('tagDivMapa'), {
                zoom: 16,
                center: coord
            });

            //crear el marcador
            var marker = new google.maps.Marker({
                position: coord,
                map: map
            });

            //creamos el cuadrado pequeño
            let panorama = new google.maps.StreetViewPanorama(
                tagDivPanorama, {
                    position: coord,
                    // pov: {
                    //     heading: 150,
                    //     pitch: 10
                    // }
                }
            );
        }
    </script>
    <?php
    include 'footer.php';
    ?>
</body>

</html>