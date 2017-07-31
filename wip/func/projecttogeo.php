<?php
/*
 * Diese Datei empfängt die Geodaten aus der Tabelle der Projekte zu einem bestimmten Projekt und gibt die GEOJSON dazu aus.
 *
 */
include "../globalconfig.php";

$pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
$pdo->exec("set names utf8");

if (isset($_GET['projectid'])) {
    // Ein bestimmtes Projekt
    $sqlabfrage = $pdo->prepare('SELECT ID, projektname, ortgeo FROM ' . $db_pref . '_projekte WHERE ID = :u_id;');
    $sqlabfrage->bindParam(':u_id', $_GET['projectid']);

} else {
    // Alle Projekte
    $sqlabfrage = $pdo->prepare('SELECT ID, projektname, ortgeo FROM ' . $db_pref . '_projekte');
}

$sqlabfrage->execute();


$geojson = array(
    'type' => 'FeatureCollection',
    'features' => array()
);


foreach ($sqlabfrage->fetchAll() as $row) {
    //echo ($row['ortgeo']);
    $tmparray = json_decode($row['ortgeo']);
    //var_dump($tmparray);
    foreach ($tmparray as $rowarray) {
        // Hier wird der GEOJSON-Code generiert
        // $properties = $rowarray;
        // print_r($properties);

        $properties = array(
            'projektname' => $row['projektname'],
            'projektid' => $row['ID'],
            'ortsname' => $rowarray['0'],
            'strecke' => $rowarray['1'],
            'bkm' => $rowarray['2']
            );

        /*
         * 4 entspricht y
         * 3 entspricht x
         *
         */
        // unset ($properties[3]);
        // unset ($properties[4]);

        $feature = array(
            'type' => 'Feature',
            'geometry' => array(
                'type' => 'Point',
                'coordinates' => array(
                    floatval($rowarray[3]),
                    floatval($rowarray[4])
                )
            ),
            //'properties' => $properties
            'properties' => $properties
        );
        array_push($geojson['features'], $feature);
    }

}

header('Content-type: application/json');
echo json_encode($geojson);

?>