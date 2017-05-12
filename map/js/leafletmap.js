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
    "OpenStreetMap": base_OSM

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



var markers_dbnetz_stationen = L.markerClusterGroup();

$.getJSON("geojsondbnetz/railwayStationNodes.geojson", function(data) {
    var geojson = L.geoJson(data, {
        onEachFeature: function(feature, layer) {

            // USE A CUSTOM MARKER
            //layer.setIcon(L.mapbox.marker.icon({'marker-symbol': 'circle-stroked', 'marker-color': '59245f'}));

            // ADD A POPUP WITH A CHART
            layer.bindPopup("<b>" + feature.properties.geographicalName + "</b><br>Kürzel: <tab id=t1>" + feature.properties.railwayStationCode + "<br>ID: <tab to=t1>" + feature.properties.id);



        }
    });
    markers_dbnetz_stationen.addLayer(geojson);

    //markers_dbnetz.addTo(mymap);


    //geojsonLayer_dbnetz.addTo(mymap);
});



// LayerGroups
var groupedoverlays = {
    "OpenRailwayMap": {
        "<i>ausschalten</i>": ORM_empty,
        "Infrastruktur": ORM_INFRA,
        "Maximale Geschwindigkeiten": ORM_SPEED,
        "Signalisierung": ORM_SIGNAL

    },
    "DB Netz AG": {
        "Bahnhöfe/Stationen (CC-BY 4.0)": markers_dbnetz_stationen
    }
};

var mymap = L.map('mapid', {
    center: [51.652, 11.250],
    zoom: 10,
    layers: [base_cartolight, ORM_empty]
});

var options = {
    exclusiveGroups: ["OpenRailwayMap"],
    groupCheckboxes: true

};

var layerControl = L.control.groupedLayers(baseLayers, groupedoverlays, options);
mymap.addControl(layerControl);


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