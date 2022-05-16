<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Leaflet Map</title>
    <script src="assets\js\autocompletion.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <link rel="stylesheet" type="text/css" href="assets\css\style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/813af80c02.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.css" type="text/css">
    <script src="//unpkg.com/leaflet-gesture-handling"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />

</head>

<body>
    <div id="conteneur">
        <form onsubmit="return false" autocomplete="off" action="coordonees.php" method="POST">
            <div id="autocomplete" class="autocomplete">
                <input id="recherche" type="text" name="ville" placeholder="Entrez le nom d'une ville">
            </div>
            <p><i id="icon2" class="fa fa-search fa-lg"></i></p>
            <button class="recherche" onclick="goToLoca()"><i id="icon" class="fa-solid fa-arrow-right-long fa-lg"></i></button>
            <script type="text/javascript">
                $.ajax({
                        type: "GET",
                        url: '/ville'
                    })
                    .done(function(response) {
                        console.log(response.split(";"));
                        autocomplete(document.getElementById("recherche"), response.split(";"));
                    })
            </script>

            <div id="map"></div>
            <script type="text/javascript">
                var carte = L.map("map").setView([43.918466289753, 2.145517385159], 9);
                var tuiles = L.tileLayer(" https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png ").addTo(carte);
                carte.gestureHandling.enable();
                var LayerGroup = L.layerGroup();

                function goToLoca() {

                    var ville = document.getElementById('recherche').value.split(",");
                    var slug = ville[0].toLowerCase();
                    console.log(slug);
                    for (let i = 0; i < slug.length; i++) {
                        if (slug[i] == "'") {
                            slug = slug.replace(/'/g, ' ');
                        }
                        if (slug[i] == "-") {
                            slug = slug.replace(/-/g, ' ');
                        }
                        if (slug[i] == "è" || slug[i] == "é") {
                            slug = slug.replace(/-/g, 'e');
                        }

                    }
                    console.log(slug);

                    $.ajax({
                            type: 'GET',
                            url: '/coordonnees',
                            data: "ville=" + slug

                        })
                        .done(function(response) {
                            console.log(response);
                            var tab = response.split(",");
                            var coordonees = L.latLng(parseFloat(tab[0]), parseFloat(tab[1]));
                            carte.panTo(coordonees, 10)
                            $.ajax({
                                    type: 'GET',
                                    url: "/rayon",
                                    data: {
                                        gps_lat: parseFloat(tab[0]),
                                        gps_lng: parseFloat(tab[1]),
                                        ville: slug
                                    }
                                })
                                .done(function(response) {
                                    if (response) {
                                        LayerGroup.eachLayer(function(layer) {
                                            LayerGroup.removeLayer(layer);
                                        })
                                    }
                                    var rayon = response.split(";");
                                    var coordonneesRayon;
                                    console.log(rayon.length);
                                    console.log(rayon);
                                    for (var i = 1; i <= rayon.length - 1; i = i + 2) {
                                        coordonneesRayon = L.latLng(parseFloat(rayon[i - 1]), parseFloat(rayon[i]));
                                        marker = L.marker(coordonneesRayon);
                                        LayerGroup.addLayer(marker);
                                    }
                                    LayerGroup.addTo(carte);
                                })

                        })
                        .fail(function(error) {
                            console.log(error);
                        })

                }
            </script>



        </form>


    </div>
</body>
<footer>
    <a href="/gestionclient"> Gestion des clients </a>
</footer>


</html>