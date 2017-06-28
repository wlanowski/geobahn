<form>
    <label for="latitude">Latitude:</label>
    <input id="latitude" type="text"/>
    <label for="longitude">Longitude:</label>
    <input id="longitude" type="text"/>
</form>
<div id="map" style="height: 25em; position: relative; outline: none;"></div>


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
    var tileLayer = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
        attribution: 'Map tiles by Carto, under CC BY 3.0. Data by OpenStreetMap, under ODbL.'
    });

    var map = new L.Map('map', {
        'center': [51.441767, 5.480247],
        'zoom': 12,
        'layers': [tileLayer]
    });

    var awesome = L.AwesomeMarkers.icon({
        icon: 'train',
        prefix: 'fa',
        markerColor: 'blue',
        iconColor: 'white'
    });

    var marker = L.marker([51.441767, 5.470247], {
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
</script>
