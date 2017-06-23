

// Basis-Layer


var base_TPM = L.tileLayer('http://{s}.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
});

// Start Layer aus Projekte-Datenbank
var geojsonLayer_projekte = L.markerClusterGroup();

//Pfad eventuell anpassen, gerade auf Repository angepasst
$.getJSON("func/mysqltogeojson.php", function(data) {
    var geojson_projekte = L.geoJson(data, {
        onEachFeature: function(feature, layer) {

            // USE A CUSTOM MARKER
            //layer.setIcon(L.mapbox.marker.icon({'marker-symbol': 'circle-stroked', 'marker-color': '59245f'}));
            layer.setIcon(L.AwesomeMarkers.icon({
                icon: 'tasks',
                prefix: 'fa',
                markerColor: 'blue',
                iconColor: 'white'
            }));

            // ADD A POPUP WITH A CHART
            layer.bindPopup("<b>" + feature.properties.projektname + "</b><br>Ansprechpartner: <tab id=t1>" + feature.properties.ansprechpartner + "<br>angelegt: <tab to=t1>" + feature.properties.erstellt);



        }
    });
    geojsonLayer_projekte.addLayer(geojson_projekte);
});




// LayerGroups
var mymap = L.map('mapid', {
    center: [51.679, 9.866],
    zoom: 6,
    layers: [base_TPM, geojsonLayer_projekte]
});



// Zoomausblendungen

/*
		mymap.on('zoomend', function() {
    if (mymap.getZoom() <10){
        if (mymap.hasLayer(markers_dbnetz_stationen)) {
            mymap.removeLayer(markers_dbnetz_stationen);
						}	
	}
});


//TODO: Bleibt entfernt beim rauszoomen
*/

