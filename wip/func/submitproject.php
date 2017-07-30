<?php
//require für Datenbankverbindungseinstellungen
require_once(dirname(__DIR__) . '/globalconfig.php');
session_start();


if (!empty($_POST)) {

    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $pdo->exec("set names utf8");


    //$sql = "SELECT * FROM " . $db_pref . "_alles WHERE strecke=" . $_GET['strecke'] . " ORDER BY km_i ASC";

    $start = strtotime($_POST['fin-start']);
    $start = date('Y-m-d',$start);

    $ende= strtotime($_POST['fin-ende']);
    $ende = date('Y-m-d',$ende);



    $sqlabfrage = 'INSERT INTO ' . $db_pref . '_projekte (projektname, ortgeo, ansprechpartner, projektleiter, start, ende, zusatz, erstelltvon, benutzer, status) VALUES (:u_projektname, :u_ortgeo, :u_ansprechpartner, :u_projektleiter, :u_start, :u_ende, :u_zusatz, :u_erstelltvon, :u_benutzer, :u_status)';
    $sql = $pdo->prepare($sqlabfrage);

    //echo $sql;


    $sql->bindParam(':u_projektname', $_POST['fin-name']);
    $sql->bindParam(':u_ortgeo', serialize($_POST['fin-orte']));
    $sql->bindParam(':u_ansprechpartner', $_POST['fin-ansprechpartner']);
    $sql->bindParam(':u_projektleiter', $_POST['fin-projektleiter']);
    $sql->bindParam(':u_start', $start);
    $sql->bindParam(':u_ende', $ende);
    $sql->bindParam(':u_zusatz', $_POST['zusatz']);
    $sql->bindParam(':u_erstelltvon', $_SESSION['user']['userid']);
    $sql->bindParam(':u_benutzer',serialize($_POST['fin-benutzerids']));
    $sql->bindParam(':u_status', $_POST['fin-name']);

    $sql->execute();

    $antwort = $sql->fetch();

    echo $antwort;



} else {
    //$message['notice'] = 'Geben Sie Ihre Zugangsdaten ein um sich anzumelden.<br />' .
    //    'Wenn Sie noch kein Konto haben, gehen Sie <a href="./register.php">zur Registrierung</a>.';
   echo 'leer';
}
?>