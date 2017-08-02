<!-- tabelleorte wird ggf. von JS gefüllt -->

<h4>Beschreibung des Ortes</h4>
<form name="geopicker1" class="form-horizontal form-label-left">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ort_bezeichnung">Bezeichnung des Ortes<span
                    class="required">*</span>:</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="form-control col-md-7 col-xs-12" id="ort_bezeichnung" type="text"
                   placeholder="Bsp.: Stw Halle Ab" required="required"/>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ort_strecke">Strecke (optional):</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="form-control col-md-7 col-xs-12" id="ort_strecke" type="number" placeholder="Bsp.: 6363"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ort_kilometer">Kilometer (optional):</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="form-control col-md-7 col-xs-12" id="ort_kilometer" type="number" placeholder="Bsp.: 12.960"/>
        </div>
    </div>

</form>

<div class="form-group">
    <h4>Orte übernehmen aus...</h4>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">
        Betriebsstellensuche
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg-km">Strecke und
        Kilometer
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg-geo">Koordinaten
        manuell eingeben
    </button>
</div>

<br/>
<br/>

<h4>Karte
    <small>Der Marker ist verschiebbar</small>
</h4>
<div id="aktuellekoordinaten"></div>
<div id="map" style="height: 40em; position: relative; outline: none;"></div>


<button class="col-md-12 col-xs-12 col-sm-12 btn btn-success" onclick="orthinzufügen()">Ort hinzufügen</button>
<h4>Bisher ausgewählte Orte</h4>
<div id="tabelleorte" style="height: 10em">
    Bisher keine Orte ausgewählt


</div>


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
                <div class="">
                    <label>
                        Bezeichnung <input type="checkbox" id="abfrageart_bst" value="abfrageart_bst"
                                           class="js-switch" unchecked/> DS100
                    </label>
                </div>


                <input class="col-md-7 col-xs-12" id="eingabe_bst" type="text" placeholder="Bsp. Buxtehude oder ABX"/>
                <br/><br/>


                <button id="button_bst" type="button" class="btn btn-primary" onclick="suchebst()">Suchen</button>


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
            .addEventListener("keyup", function (event) {
                event.preventDefault();
                if (event.keyCode == 13) {
                    document.getElementById("button_bst").click();
                }
            });

    </script>

</div>
<!-- /Large modal (BST) -->

<!-- Large modal (BKM) -->
<div class="modal fade bs-example-modal-lg-km" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Bahnstrecke und Bahnkilometer eingeben!</h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <!-- Eingabe Strecke -->
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="eingabe_strecke">Streckennummer
                        <span class="required">*</span>
                    </label>
                    <input class="col-md-9 col-md-9 col-xs-12" id="eingabe_strecke" type="number"
                           placeholder="Streckennummer, Bsp: 6363">

                    <br/>
                    <br/>

                    <!-- Eingabe Km -->
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="eingabe_km">Kilometer
                        <span class="required">*</span>
                    </label>


                    <input class="col-md-9 col-md-9 col-xs-12" id="eingabe_km" type="numer" placeholder="12,251"/>
                    <br/>
                    <br/>
                    <br/>

                    <div class="alert alert-warning">Die Kilometerangabe wird ggf. auf volle Kilometer gerundet!</div>

                </div>
                <br/><br/>


                <button id="button_bkm" type="button" class="btn btn-primary" onclick="suchebkm()">Suchen</button>


                <div id="bkmauswahl"></div>
                <!-- bkm auswahl wird von JS aufgefüllt -->


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Abschließen</button>

            </div>

        </div>
    </div>

    <script>
        //Fange Enter ab!
        document.getElementById("eingabe_km")
            .addEventListener("keyup", function (event) {
                event.preventDefault();
                if (event.keyCode == 13) {
                    document.getElementById("button_bkm").click();
                }
            });
        document.getElementById("eingabe_strecke")
            .addEventListener("keyup", function (event) {
                event.preventDefault();
                if (event.keyCode == 13) {
                    document.getElementById("button_bkm").click();
                }
            });

    </script>

</div>
<!-- /Large modal (BKM) -->

<!-- Large modal (Koordinaten) -->
<div class="modal fade bs-example-modal-lg-geo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Koordinaten eingeben</h4>
            </div>
            <div class="modal-body">
                <div class="">

                    <form name="geopicker2" class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label for="latitude">Latitude:</label>
                            <input id="latitude" type="number" value="51.133333"/>
                            <label for="longitude">Longitude:</label>
                            <input id="longitude" type="number" value="10.416667"/>
                            <button type="button" class="btn btn-primary" onclick="setzeOrtKarte()">Übernehmen</button>
                        </div>
                    </form>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Abschließen</button>

            </div>

        </div>
    </div>

    <script>
        //Fange Enter ab!
        document.getElementById("eingabe_km")
            .addEventListener("keyup", function (event) {
                event.preventDefault();
                if (event.keyCode == 13) {
                    document.getElementById("button_bkm").click();
                }
            });
        document.getElementById("eingabe_strecke")
            .addEventListener("keyup", function (event) {
                event.preventDefault();
                if (event.keyCode == 13) {
                    document.getElementById("button_bkm").click();
                }
            });

    </script>

</div>
<!-- /Large modal (Koordinaten) -->


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
     *

     /* Start Karte */


    var tileLayer = L.tileLayer('https://{s}.tile.thunderforest.com/transport/{z}/{x}/{y}.png?apikey=<?php echo $tf_apikey;?>', {
        attribution: '\'Maps © <a href="http://www.thunderforest.com">Thunderforest</a>, Data © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>'
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

    var awesome_nicht = L.AwesomeMarkers.icon({
        icon: 'train',
        prefix: 'fa',
        markerColor: 'blue',
        iconColor: 'white'
    });

    var marker = L.marker([51.133333, 10.416667], {
        icon: awesome,
        draggable: true
    }).addTo(map);

    var markersalt = new L.FeatureGroup();

    marker.on('dragend', function (e) {
        document.getElementById('latitude').value = marker.getLatLng().lat;
        document.getElementById('longitude').value = marker.getLatLng().lng;
        anzeigeaktuell();
    });

    function onMapClick(e) {
        marker.setLatLng(e.latlng);
        document.getElementById('latitude').value = marker.getLatLng().lat;
        document.getElementById('longitude').value = marker.getLatLng().lng;
        anzeigeaktuell();
    }

    map.on('click', onMapClick);
    anzeigeaktuell();

    document.getElementById('map').style.cursor = 'crosshair'


    /*

     Ende Karte
     Start Funktionen!

     */


    function anzeigeaktuell() {
        document.getElementById('aktuellekoordinaten').innerHTML = "aktuelle Koordinaten: "
        document.getElementById('aktuellekoordinaten').innerHTML += document.getElementById('latitude').value
        document.getElementById('aktuellekoordinaten').innerHTML += ", "
        document.getElementById('aktuellekoordinaten').innerHTML += document.getElementById('longitude').value
    }

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
        $('.bs-example-modal-lg-km').modal('hide');
        $('.bs-example-modal-lg-geo').modal('hide');
        anzeigeaktuell();


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

    function suchebkm() {


        var abfragekm = "./func/return_geopicker_bkm.php?s=";
        abfragekm += document.getElementById('eingabe_strecke').value;
        // var js_bkm = document.getElementById('eingabe_km').value;
        // js_bkm.replace(",",".");
        abfragekm += "&k=" + document.getElementById('eingabe_km').value.replace(",", ".");

        //console.log(abfrage);

        $.get(abfragekm, function (data) {
            $('#bkmauswahl').html(data);
        })
    }


    var arrayorte = [];

    function ortlöschen(index) {
        arrayorte = arrayorte.slice(0, index).concat(arrayorte.slice(index + 1));
        markersalt.clearLayers();
        zeichnetabelleorte();
        anzeigeaktuell();
        //console.log(arrayorte);
    }

    function zeichnetabelleorte() {
        //Quelltext für Tabelle zusammenbasteln


        qt = '<table id="datatable-buttons" class="display table table-striped table-bordered" style="background-color:#FFFFFF" cellspacing="0"';
        qt += 'width="100%">';
        qt += '<thead>';
        qt += '<tr>';
        qt += '<th>Bezeichnung</th>';
        qt += '<th>Strecke</th>';
        qt += '<th>Kilometer</th>';
        qt += '<th>Longitude</th>';
        qt += '<th>Latitude</th>';
        qt += '<th>entfernen</th>';
        qt += '</tr>';
        qt += '</thead>';
        qt += '<tbody>';

        for (var i = 0; i < arrayorte.length; i++) {
            qt += '<tr>\n<td>' + arrayorte[i][0];
            qt += '</td>\n<td>' + arrayorte[i][1];
            qt += '</td>\n<td>' + arrayorte[i][2];
            qt += '</td>\n<td>' + arrayorte[i][3];
            qt += '</td>\n<td>' + arrayorte[i][4];
            qt += '</td>\n<td>' + '<button class="btn btn-primary" onclick="ortlöschen(' + i + ')">entfernen</button>';
            qt += '</td>\n</tr>';


            var gesetztermarker = L.marker([arrayorte[i][4], arrayorte[i][3]], {
                icon: awesome_nicht,
            }).bindPopup(arrayorte[i][0]);

            markersalt.addLayer(gesetztermarker);


        }

        map.addLayer(markersalt);

        qt += '</tbody></table><br /><br />';

        /*
        qt += '<input type="text" class="col-md-12 col-xs-12 col-sm-12" id="weitergabeorte" name="weitergabeorte" value="';
        qt += arrayorte;
        qt += '" disabled>';
        */


        document.getElementById('tabelleorte').innerHTML = qt;

    }

    function orthinzufügen() {

        /*
         Format des Arrays
         Ort1, Ort2, Ortn

         Aufbau Ort
         Bezeichnung, Strecke, Kilometer, Lat, Lon
         */

        if (document.getElementById('ort_bezeichnung').value == "") {
            zeigefehler("Sie haben keine Bezeichnung für den Ort eingegeben!");
        } else {

            arrayorte.push([document.getElementById('ort_bezeichnung').value, document.getElementById('ort_strecke').value, document.getElementById('ort_kilometer').value, document.getElementById('longitude').value, document.getElementById('latitude').value]);

            //Debug:
            //console.log(arrayorte);

            //Setze Formulare zurück
            document.geopicker1.reset();
            document.geopicker2.reset();


            zeichnetabelleorte();
        }


    }

    function phpweitergabeorte(weitergabearray) {

        //console.log(weitergabearray);
        arrayorte=weitergabearray;

        document.geopicker1.reset();
        document.geopicker2.reset();

        zeichnetabelleorte();


    }


</script>

<?php
if (isset($_GET['bearbeiten'])) {
    //Siehe Schritt 3
    //echo "<body onload='phpweitergabeorte(".$abfrage['ortgeo'].");phpweitergabebenutzer(" . $abfrage['benutzer'] . ")'></body>";

}

?>
