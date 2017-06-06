<?php
/*
 * Title:   MySQL Points to GeoJSON
 * Notes:   Query a MySQL table or view of points with x and y columns and return the results in GeoJSON format, suitable for use in OpenLayers, Leaflet, etc.
 * Author:  Bryan R. McBride, GISP
 * Contact: bryanmcbride.com
 * GitHub:  https://github.com/bmcbride/PHP-Database-GeoJSON
 */
 
 
require_once('../globalconfig.php'); //für DB-Verbindungen

# Connect to MySQL database
//Klartext (XAMPP nicht Web!)
// $conn = new PDO('mysql:host=localhost;dbname=tktestmap;charset=utf8','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$conn = new PDO("mysql:host=".$db_host.";dbname=".$db_name.";charset=utf8",$db_user,$db_pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));



# Build SQL SELECT statement including x (ort_geo_lon) and y (ort_geo_lat) columns
$sql = 'SELECT *, ort_geo_lon AS x, ort_geo_lat AS y FROM '.$db_pref.'_projekte';
/*
* If bbox variable is set, only return records that are within the bounding box
* bbox should be a string in the form of 'southwest_lng,southwest_lat,northeast_lng,northeast_lat'
* Leaflet: map.getBounds().pad(0.05).toBBoxString()
*/

// wird nicht benötigt

/*
if (isset($_GET['bbox']) || isset($_POST['bbox'])) {
    $bbox = explode(',', $_GET['bbox']);
    $sql = $sql . ' WHERE x <= ' . $bbox[2] . ' AND x >= ' . $bbox[0] . ' AND y <= ' . $bbox[3] . ' AND y >= ' . $bbox[1];
}
*/

# Try query or error
$rs = $conn->query($sql);
if (!$rs) {
    echo 'Ein SQL-Fehler ist passiert.';
    exit;
}
# Build GeoJSON feature collection array
$geojson = array(
   'type'      => 'FeatureCollection',
   'features'  => array()
);
# Loop through rows to build feature arrays
while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
    $properties = $row;
    # Remove x and y fields from properties (optional)
    unset($properties['x']);
    unset($properties['y']);
    $feature = array(
        'type' => 'Feature',
        'geometry' => array(
            'type' => 'Point',
            'coordinates' => array(
                $row['x'],
                $row['y']
            )
        ),
        'properties' => $properties
    );
    # Add feature arrays to feature collection array
    array_push($geojson['features'], $feature);
}
#print_r ($geojson);
header('Content-type: application/json');
echo json_encode($geojson);
$conn = NULL;
?>