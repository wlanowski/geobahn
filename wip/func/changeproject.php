<?php

/* Hier werden Projekte geändert! */
//require für Datenbankverbindungseinstellungen

require_once(dirname(__DIR__) . '/globalconfig.php');
session_start();

if (!empty($_POST)) {

    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $pdo->exec("set names utf8");

    //$sql = "SELECT * FROM " . $db_pref . "_alles WHERE strecke=" . $_GET['strecke'] . " ORDER BY km_i ASC";

    $start = strtotime($_POST['fin-start']);
    $start = date('Y-m-d', $start);

    $ende = strtotime($_POST['fin-ende']);
    $ende = date('Y-m-d', $ende);

    //$sqlabfrage = 'INSERT INTO ' . $db_pref . '_projekte (projektname, ortgeo, ansprechpartner, projektleiter, start, ende, zusatz, erstelltvon, benutzer, status) VALUES (:u_projektname, :u_ortgeo, :u_ansprechpartner, :u_projektleiter, :u_start, :u_ende, :u_zusatz, :u_erstelltvon, :u_benutzer, :u_status)';
    $sqlabfrage = 'UPDATE' . $db_pref . '_projekte SET projektname = :u_projektname, ortgeo = :u_ortgeo, ansprechpartner = :u_ansprechpartner, projektleiter = :u_projektleiter, start = :u_start, ende = :u_ende, zusatz = :u_zusatz, geändertvon = :u_geändertvon, benutzer = :u_benutzer, status = :u_status, geändert = NOW()  WHERE ID = :u_id;';

    $sql = $pdo->prepare($sqlabfrage);

    //echo $sql;

    $notice_name = htmlspecialchars($_POST['fin-name'], ENT_QUOTES);
    $notice_ansprech = htmlspecialchars($_POST['fin-ansprechpartner'], ENT_QUOTES);
    $notice_projekt =
    $notice_zusatz = htmlspecialchars($_POST['fin-zusatz'], ENT_QUOTES);
    $notice_status = htmlspecialchars($_POST['fin-status'], ENT_QUOTES);
    $notice_projekt = htmlspecialchars($_POST['fin-projektleiter'], ENT_QUOTES);


    $sql->bindParam(':u_projektname', $notice_name);
    $sql->bindParam(':u_ortgeo', $_POST['fin-orte']);
    $sql->bindParam(':u_ansprechpartner', $notice_ansprech);
    $sql->bindParam(':u_projektleiter', $notice_projekt);
    $sql->bindParam(':u_start', $start);
    $sql->bindParam(':u_ende', $ende);
    $sql->bindParam(':u_zusatz', $notice_zusatz);
    $sql->bindParam(':u_geändertvon', $_SESSION['user']['userid']);
    $sql->bindParam(':u_benutzer', $_POST['fin-benutzerids']);
    $sql->bindParam(':u_status', $notice_status);
    $sql->bindparam(':u_id', $_SESSION['changeproject']);


    $sql->execute();

    $sql->fetch();
    //echo $antwort;

    $id = $_SESSION['changeproject'];

    echo "Versuch 1:" . $id;

    $_SESSION['changeproject'] = '';
    echo "Versuch 2:" . $id;
    //header('location:../projectdetail.php?projectid='.$id.'&g');


} else {
    echo 'leer';
}
?>