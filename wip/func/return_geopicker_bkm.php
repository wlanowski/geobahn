<?php
/*
 * Erwartet s für Streckennummer und k für Kilometer um dann koordinaten zurückzugeben
 */

include "../globalconfig.php";

$pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
$pdo->exec("set names utf8");

//$sqlabfrage = 'SELECT streckennu, km_l, geogr_breite, geogr_laenge from ' . $db_pref . '_kilometer WHERE streckennu = ' . $_GET['s'] . ' AND (km_klar = TRUNCATE(' . $_GET['k'] . ',0) OR km_klar = TRUNCATE(' . $_GET['k'] . ',0)-1 OR km_klar = TRUNCATE(' . $_GET['k'] . ',0)+1);';
$sqlabfrage = $pdo->prepare('SELECT streckennu, km_l, geogr_breite, geogr_laenge from ' . $db_pref . '_kilometer WHERE streckennu = :uebergabe_s AND (km_klar = TRUNCATE(:uebergabe_k,0) OR km_klar = TRUNCATE(:uebergabe_k,0)-1 OR km_klar = TRUNCATE(:uebergabe_k,0)+1);');


$sqlabfrage->bindParam(':uebergabe_s', $_GET['s']);
$sqlabfrage->bindParam(':uebergabe_k', $_GET['k']);

$sqlabfrage->execute();

$ergebnis = $sqlabfrage->fetchAll();

echo '<table id="datatable-buttons" class="display table table-striped table-bordered" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>Streckennummer</th>
                    <th>Kilometer</th>
                    <th>Auswahl</th>
                    </tr>
                </thead>
                <tbody>';

foreach ($ergebnis as $row) {
    echo "<tr>\n<td>";
    echo $row['streckennu'];
    echo "</td>\n<td>";
    echo $row['km_l'];
    echo "</td>\n<td><a href='javascript:waehleort(";
    echo $row['geogr_breite'] . ',';
    echo $row['geogr_laenge'] . ")' class = \"btn btn-success\">auswählen</a>";
    echo "</td>\n</tr>";
}

echo '</tbody></table>';

?>





