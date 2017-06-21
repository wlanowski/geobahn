

// Basis-Layer
var base_Google = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    attribution: '&copy; 2017 GeoBasis-DE/BKG (&copy;2009), Google'
});
var base_cartolight = L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
    attribution: 'Map tiles by Carto, under CC BY 3.0. Data by OpenStreetMap, under ODbL.'
});
var base_OSM = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap-Mitwirkende</a>'
});

var base_TPM = L.tileLayer('http://{s}.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
});

/*
			Weitere Tile-Server:
			http://wiki.openstreetmap.org/wiki/Tiles
			
			http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png
			http://{s}.tiles.wmflabs.org/bw-mapnik/{z}/{x}/{y}.png
			https://{s}.tile.thunderforest.com/landscape/{z}/{x}/{y}.png
			http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png
			
	
		*/

var baseLayers = {

    "Google Satellit": base_Google,
    "Minimal (s/w)": base_cartolight,
    "OpenStreetMap": base_OSM,
    "TransportMap": base_TPM

};


// ORM-Overlays + DB-Netz Streckennetz
var overlays_ORM = new L.LayerGroup();

var ORM_INFRA = L.tileLayer('http://{s}.tiles.openrailwaymap.org/standard/{z}/{x}/{y}.png', {
    attribution: 'Data <a href="http://www.openstreetmap.org/copyright">© OpenStreetMap contributors</a>, Style: <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA 2.0</a> <a href="http://www.openrailwaymap.org/">OpenRailwayMap</a>'
});

var ORM_SPEED = L.tileLayer('http://{s}.tiles.openrailwaymap.org/maxspeed/{z}/{x}/{y}.png', {
    attribution: 'Data <a href="http://www.openstreetmap.org/copyright">© OpenStreetMap contributors</a>, Style: <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA 2.0</a> <a href="http://www.openrailwaymap.org/">OpenRailwayMap</a>'
});

var ORM_SIGNAL = L.tileLayer('http://{s}.tiles.openrailwaymap.org/signals/{z}/{x}/{y}.png', {
    attribution: 'Data <a href="http://www.openstreetmap.org/copyright">© OpenStreetMap contributors</a>, Style: <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA 2.0</a> <a href="http://www.openrailwaymap.org/">OpenRailwayMap</a>'
});

var ORM_empty = L.tileLayer('');
var markers_dbnetz_empty = L.tileLayer('');


var markers_dbnetz_betriebsstellen = L.markerClusterGroup();


/* 
 *   GEODATEN DB NETZ
 */

// BST
$.getJSON("../geodata/konvertiert/bst/bst.geojson", function(data) {
    var geojson = L.geoJson(data, {
        onEachFeature: function(feature, layer) {

            // USE A CUSTOM MARKER
            //layer.setIcon(L.mapbox.marker.icon({'marker-symbol': 'circle-stroked', 'marker-color': '59245f'}));
            layer.setIcon(L.AwesomeMarkers.icon({
                icon: 'train',
                prefix: 'fa',
                markerColor: 'blue',
                iconColor: 'white'
            }));

            // ADD A POPUP WITH A CHART
            layer.bindPopup("<b>" + feature.properties.bezeichnun + "</b><br>Kürzel: <tab id=t1>" + feature.properties.kuerzel + "<br>Strecke: <tab to=t1>" + feature.properties.streckennu + "<br>Bkm: <tab to=t1>" + feature.properties.km_l);
        }
    });
    markers_dbnetz_betriebsstellen.addLayer(geojson);
});

// BÜ
//Marker

var bueIcon = L.icon({
    iconUrl: 'ico/bue.png',
    iconSize: [30, 26], // size of the icon
});

var markers_dbnetz_bahnuebergang = L.markerClusterGroup();

$.getJSON("../geodata/konvertiert/bue/bue.geojson", function(data) {
    var geojson = L.geoJson(data, {
        onEachFeature: function(feature, layer) {

            // USE A CUSTOM MARKER
            //layer.setIcon(L.mapbox.marker.icon({'marker-symbol': 'circle-stroked', 'marker-color': '59245f'}));
            layer.setIcon(bueIcon);

            // ADD A POPUP WITH A CHART

            layer.bindPopup("<b>" + feature.properties.bezeichnun + "</b><br>Sicherung: <tab id=t1>" + feature.properties.techn_sich + "<br>Straßenart: <tab to=t1>" + feature.properties.strassenar + "<br>Strecke: <tab to=t1>" + feature.properties.strecke_nr + "<br>Bkm: <tab to=t1>" + feature.properties.km_l);
        }
    });
    markers_dbnetz_bahnuebergang.addLayer(geojson);
});




// Kilometer 
var markers_dbnetz_kilometer = L.markerClusterGroup();

$.getJSON("../geodata/konvertiert/km/km.geojson", function(data) {
    var geojson = L.geoJson(data, {
        onEachFeature: function(feature, layer) {

            // USE A CUSTOM MARKER
            //layer.setIcon(L.mapbox.marker.icon({'marker-symbol': 'circle-stroked', 'marker-color': '59245f'}));

            layer.setIcon(L.AwesomeMarkers.icon({
                icon: 'arrows-h',
                prefix: 'fa',
                markerColor: 'blue',
                iconColor: 'white'
            }));

            // ADD A POPUP WITH A CHART
            layer.bindPopup("<br><b>Bkm: <tab to=t1>" + feature.properties.km_l + "</b><br>Strecke: <tab to=t1>" + feature.properties.streckennu);
        }
    });
    markers_dbnetz_kilometer.addLayer(geojson);
});


// Tunnel 
var markers_dbnetz_tunnel = L.markerClusterGroup();

$.getJSON("../geodata/konvertiert/tunnel/tunnel.geojson", function(data) {
    var geojson = L.geoJson(data, {
        onEachFeature: function(feature, layer) {


            // ADD A POPUP WITH A CHART
            layer.bindPopup("<b>" + feature.properties.bezeichnun + "</b><br>Strecke: <tab to=t1>" + feature.properties.streckennu + "<br>Bkm: <tab to=t1>" + feature.properties.von_km_l + " bis " + feature.properties.bis_km_l + "<br>Länge (m): <tab to=t1>" + feature.properties.laenge);
        }
    });
    markers_dbnetz_tunnel.addLayer(geojson);
});


// Brücken
var brueckIcon = L.icon({
    iconUrl: 'ico/BSicon_BRUECKE.png',
    iconSize: [26, 30], // size of the icon
});


var markers_dbnetz_bruecken = L.markerClusterGroup();

$.getJSON("../geodata/konvertiert/bruecken-gross/bruecken-gross.geojson", function(data) {
    var geojson = L.geoJson(data, {
        onEachFeature: function(feature, layer) {

            // layer.setIcon(brueckIcon);

            // ADD A POPUP WITH A CHART
            // ALT: 	layer.bindPopup("Strecke: <tab to=t1>" + feature.properties.streckennu + "<br>Bkm: <tab to=t1>" + feature.properties.km_l + "<br>Länge (m): <tab to=t1>" + feature.properties.laenge);
           layer.bindPopup("Strecke: <tab to=t1>" + feature.properties.streckennu + "<br>Bkm: <tab to=t1>" + feature.properties.von_km_l + " bis " + feature.properties.bis_km_l + "<br>Länge (m): <tab to=t1>" + feature.properties.laenge);
        }
    });
	
	geojson.getAttribution = function() { return 'DB NETZ'; };
	
    markers_dbnetz_bruecken.addLayer(geojson);
});


// Kleine Brücken


$.getJSON("../geodata/konvertiert/bruecken/bruecken.geojson", function(data) {
    var geojson = L.geoJson(data, {
        onEachFeature: function(feature, layer) {

             layer.setIcon(brueckIcon);

            // ADD A POPUP WITH A CHART
            // ALT: 	layer.bindPopup("Strecke: <tab to=t1>" + feature.properties.streckennu + "<br>Bkm: <tab to=t1>" + feature.properties.km_l + "<br>Länge (m): <tab to=t1>" + feature.properties.laenge);
           layer.bindPopup("Strecke: <tab to=t1>" + feature.properties.streckennu + "<br>Bkm: <tab to=t1>" + feature.properties.km_l + "<br>Länge (m): <tab to=t1>" + feature.properties.laenge);
        }
    });
	
	geojson.getAttribution = function() { return 'DB NETZ'; };
	
    markers_dbnetz_bruecken.addLayer(geojson);
});























// Strecke
var markers_dbnetz_strecke = L.markerClusterGroup();

$.getJSON("../geodata/konvertiert/strecke/strecke.geojson", function(data) {
    var geojson = L.geoJson(data, {
        onEachFeature: function(feature, layer) {

            var strecke_richtung = "";
            switch (feature.properties.richtung) {
                case '0':
                    strecke_richtung = "Richtungsgl. parallel oder eingleisig";
                    break;
                case '1':
                    strecke_richtung = "Richtungsgleis";
                    break;
                case '2':
                    strecke_richtung = "Gegenrichtungsgleis";
                    break;
                default:
                    strecke_richtung = "null";
            }

            layer.bindPopup("<b>" + feature.properties.strecke_ku + "</b>(Nr.: " + feature.properties.strecke_nr + ")<br>Richtung: <tab to=t1>" + strecke_richtung + "<br>Bahnart: <tab to=t1>" + feature.properties.bahnart + "<br><br>Elektrifizierung: <tab to=t1>" + feature.properties.elektrifiz + "<br>Geschwindigkeit: <tab to=t1>" + feature.properties.geschwindi + "<br>Bahnnutzung: <tab to=t1>" + feature.properties.bahnnutzun);
        }
    });
    markers_dbnetz_strecke.addLayer(geojson);
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
var groupedoverlays = {
	"Projekte": {
        "Projekte": geojsonLayer_projekte
    },
    "DB Netz AG (Stand: Januar 2017)": {
        "<i>ausschalten</i>": markers_dbnetz_empty,
        "Betriebsstellen": markers_dbnetz_betriebsstellen,
        "Bahnübergänge": markers_dbnetz_bahnuebergang,
        "Bahnkilometer": markers_dbnetz_kilometer,
        "Tunnel": markers_dbnetz_tunnel,
        "Brücken": markers_dbnetz_bruecken,
        "Streckennetz": markers_dbnetz_strecke

    },
	"OpenRailwayMap": {
        "<i>ausschalten</i>": ORM_empty,
        "Infrastruktur": ORM_INFRA,
        "Maximale Geschwindigkeiten": ORM_SPEED,
        "Signalisierung": ORM_SIGNAL
    

    }
};

var mymap = L.map('mapid', {
    center: [51.679, 9.866],
    zoom: 6,
    layers: [base_cartolight, ORM_empty, markers_dbnetz_empty]
});

var options = {
    exclusiveGroups: ["OpenRailwayMap", "DB Netz AG (Stand: Januar 2017)"],
    groupCheckboxes: true

};

var layerControl = L.control.groupedLayers(baseLayers, groupedoverlays, options, null, {
    collapsed: false,
    autoZIndex: false
});
mymap.addControl(layerControl);
mymap.attributionControl.setPrefix('<a href="http://leafletjs.com">Leaflet</a> | <a href="http://data.deutschebahn.com/dataset?groups=datasets&tags=Geo">Geodaten der DB-Netz AG</a> veröffentlicht unter <a href="https://creativecommons.org/licenses/by/4.0/deed.de">CC BY 4.0</a>');

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

$(window).on("resize", function() {
    $("#mapid").height($(window).height()-150);
    mymap.invalidateSize();
}).trigger("resize");