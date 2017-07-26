<?php
//require für Datenbankverbindungseinstellungen
require_once(dirname(__DIR__) . '/globalconfig.php');

if (!empty($_POST)) {

    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $pdo->exec("set names utf8");
    //$sql = "SELECT * FROM " . $db_pref . "_alles WHERE strecke=" . $_GET['strecke'] . " ORDER BY km_i ASC";

    $sql = "INSERT INTO ".$db_pref."_projekte (ID, projektname, typ, ort, ortgeo, ansprechpartner, start, ende, zusatz, erstellt, erstelltvon) VALUES ";





} else {
    //$message['notice'] = 'Geben Sie Ihre Zugangsdaten ein um sich anzumelden.<br />' .
    //    'Wenn Sie noch kein Konto haben, gehen Sie <a href="./register.php">zur Registrierung</a>.';
    header('Location: ../createproject.php');
}
?>