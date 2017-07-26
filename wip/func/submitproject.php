<?php
//require für Datenbankverbindungseinstellungen
require_once(dirname(__DIR__) . '/globalconfig.php');

print_r($HTTP_POST_VARS);

if (!empty($_POST)) {

    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $pdo->exec("set names utf8");
    //$sql = "SELECT * FROM " . $db_pref . "_alles WHERE strecke=" . $_GET['strecke'] . " ORDER BY km_i ASC";

    $sql = "INSERT INTO ".$db_pref."_projekte (projektname, ortgeo, ansprechpartner, projektleiter, start, ende, zusatz, erstelltvon, benutzer, status) VALUES (";
    $sql += $_POST['fin-name'];
    $sql += ",";
    $sql += serialize($_POST['fin-orte']);
    $sql += ",";
    $sql += $_POST['fin-ansprechpartner'];
    $sql += ",";
    $sql += $_POST['fin-projektleiter'];
    $sql += ",";
    $sql += $_POST['fin-start'];
    $sql += ",";
    $sql += $_POST['fin-ende'];
    $sql += ",";
    $sql += $_POST['fin-zusatz'];
    $sql += ",";
    $sql += $_SESSION['user']['userid'];
    $sql += ",";
    $sql += serialize($_POST['fin-benutzerids']);
    $sql += ",";
    $sql += $_POST['fin-statusnr'];
    $sql += ");";

    $pdo->query($sql);





} else {
    //$message['notice'] = 'Geben Sie Ihre Zugangsdaten ein um sich anzumelden.<br />' .
    //    'Wenn Sie noch kein Konto haben, gehen Sie <a href="./register.php">zur Registrierung</a>.';
   echo 'leer';
}
?>