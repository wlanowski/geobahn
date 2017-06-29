<?php
function r_bst()
{
    require_once "../globalconfig.php";

    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $pdo->exec("set names utf8");

//$sqlprojekte = "SELECT * FROM " . $db_pref . "_projekte WHERE id=" . $_GET['projectid'] . " LIMIT 1";
    if (isset($_GET['s'])) {
        $sqlabfrage = 'SELECT bezeichnung, strecke, km_l, geogr_breite, geogr_laenge from ' . $db_pref . '_bst WHERE bezeichnung LIKE "%' . $_GET['s'] . '%" LIMIT 50;';
    }
    if (isset($_GET['k'])) {
        $sqlabfrage = 'SELECT bezeichnung, strecke, km_l, geogr_breite, geogr_laenge from ' . $db_pref . '_bst WHERE kuerzel LIKE "%' . $_GET['s'] . '%" LIMIT 50;';
    }

    return ($pdo->query($sqlabfrage);
}

function r_km()
{
    require_once "../globalconfig.php";

    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $pdo->exec("set names utf8");

    $sqlabfrage = 'SELECT bezeichnung, strecke, km_l, geogr_breite, geogr_laenge from ' . $db_pref . '_bst WHERE bezeichnung LIKE "%' . $_GET['s'] . '%" LIMIT 50;';


    return ($pdo->query($sqlabfrage);
}

?>