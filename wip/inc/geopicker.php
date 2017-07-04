<div class="form-group">
    <h4>Orte übernehmen aus...</h4>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">
        Betriebsstellensuche
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Strecke und
        Kilometer
    </button>
</div>
<h4>Karte
    <small>Der Marker ist verschiebbar</small>
</h4>
<div id="map" style="height: 40em; position: relative; outline: none;"></div>
<h4>Manuelle Eingabe</h4>
<form class="form-horizontal form-label-left">
    <div class="form-group">
        <label for="latitude">Latitude:</label>
        <input id="latitude" type="number" value="51.133333"/>
        <label for="longitude">Longitude:</label>
        <input id="longitude" type="number" value="10.416667"/>
        <button type="button" class="btn btn-primary" onclick="setzeOrtKarte()">Übernehmen</button>
    </div>
</form>


<!-- Large modal (BST) -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Aus Betriebsstellen wählen</h4>
            </div>
            <div class="modal-body">


                <!--<form class="form-horizontal form-label-left">
                    <div class="form-group">
-->
                        <div class="">
                            <label>
                                Bezeichnung <input type="checkbox" id="abfrageart_bst" value="abfrageart_bst"
                                                   class="js-switch" unchecked/> DS100
                            </label>
                        </div>



                        <input class="col-md-7 col-xs-12" id="eingabe_bst" type="text" placeholder="Bsp. Buxtehude oder ABX"/>
                        <br/><br/>






                        <button id="button_bst" type="button" class="btn btn-primary" onclick="suchebst()">Suchen</button>
                    <!--</div>
                </form>-->


                    <div id="bstauswahl"></div>
                    <!-- bstauswahl wird von JS aufgefüllt -->


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Abschließen</button>

            </div>

        </div>
    </div>

    <script>
        //Fange Enter ab!

        document.getElementById("eingabe_bst")
            .addEventListener("keyup", function(event) {
                event.preventDefault();
                if (event.keyCode == 13) {
                    document.getElementById("button_bst").click();
                }
            });

    </script>

</div>
<!-- /Large modal (BST) -->


<!-- Skripte und Styles -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css"
      integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ=="
      crossorigin=""/>

<link rel="stylesheet" href="css/testmap.css">

<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"
        integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg=="
        crossorigin="">
</script>
<!-- font-awesome -->
<link rel="stylesheet" href="src/font-awesome-4.7.0/css/font-awesome.min.css">

<!-- awesome-markers -->
<link rel="stylesheet" href="src/leaflet-awesomemarkers/leaflet.awesome-markers.css">
<script src="src/leaflet-awesomemarkers/leaflet.awesome-markers.js"></script>
<script>
    /*
     var tileLayer = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
     attribution: 'Map tiles by Carto, under CC BY 3.0. Data by OpenStreetMap, under ODbL.'
     });
     */
    var tileLayer = L.tileLayer('http://{s}.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    });

    var map = new L.Map('map', {
        'center': [51.133333, 10.416667],
        'zoom': 5,
        'layers': [tileLayer]
    });

    var awesome = L.AwesomeMarkers.icon({
        icon: 'train',
        prefix: 'fa',
        markerColor: 'red',
        iconColor: 'white'
    });

    var marker = L.marker([51.133333, 10.416667], {
        icon: awesome,
        draggable: true
    }).addTo(map);

    marker.on('dragend', function (e) {
        document.getElementById('latitude').value = marker.getLatLng().lat;
        document.getElementById('longitude').value = marker.getLatLng().lng;
    });

    function onMapClick(e) {
        marker.setLatLng(e.latlng);
        document.getElementById('latitude').value = marker.getLatLng().lat;
        document.getElementById('longitude').value = marker.getLatLng().lng;
    }

    map.on('click', onMapClick);

    function setzeOrtKarte() {
        marker.setLatLng([document.getElementById('latitude').value, document.getElementById('longitude').value]);
        map.setView([document.getElementById('latitude').value, document.getElementById('longitude').value], 12,
            {
                "animate": true,
                "pan": {duration: 10}
            });
    }

    function waehleort(breite, laenge) {
        marker.setLatLng([breite, laenge]);
        document.getElementById('latitude').value = breite;
        document.getElementById('longitude').value = laenge;
        map.setView([breite, laenge], 12);
        $('.bs-example-modal-lg').modal('hide');


    }


    function suchebst() {
        if (document.getElementById('abfrageart_bst').checked) {
            var t = 'k';
        }
        else {
            var t = 's';
        }

        var abfrage = "./func/return_geopicker_bst.php?";
        abfrage += t + '=' + document.getElementById('eingabe_bst').value;

        //console.log(abfrage);

        $.get(abfrage, function (data) {
            $('#bstauswahl').html(data);
        })


    }
</script>
