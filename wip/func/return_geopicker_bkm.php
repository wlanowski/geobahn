<?php
/*
 * Erwartet s für Streckennummer und k für Kilometer um dann koordinaten zurückzugeben
 */

// require_once "../globalconfig.php";

$pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
$pdo->exec("set names utf8");

$sqlabfrage = 'SELECT geogr_breite, geogr_laenge from ' . $db_pref . '_kilometer WHERE streckennu = ' . $_GET['s'] . ' AND km_klar = ' . $_GET['s'] . ';';

return $pdo->query($sqlabfrage);

?>





