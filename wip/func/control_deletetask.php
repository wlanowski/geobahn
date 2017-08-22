<?php
//require für Datenbankverbindungseinstellungen

session_start();


if (!empty($_POST)) {
    if (pruefepasswort()) {

        if ($_POST['delete-objektart'] == 'user') {
            echo "In Benutzer!";
            if (pruefeuser($_POST['delete-objektid'])) {
                loescheuser($_POST['delete-objektid']);
                header("Location:../control.php?erfolg");
            } else {
                header("Location: ../404.php?notfound");
            }
        }
        if ($_POST['delete-objektart'] == 'project') {
            if (pruefeprojekt($_POST['delete-objektid'])) {
                loescheprojekt($_POST['delete-objektid']);
                header("Location:../control.php?erfolg");
            } else {
                header("Location: ../404.php?notfound");
            }
        }
    } else {
        //Passwort ist falsch!
        //echo "Location: ../control_delete.php?falschespw=1&".$_POST['delete-objektart']."id=".$_POST['delete-objektid'];
        header("Location: ../control_delete.php?falschespw=1&" . $_POST['delete-objektart'] . "id=" . $_POST['delete-objektid']);

    }
} else {
    header("Location: ../404.php");

}


/*
 * Prüffunktionen prüfen ob Element überhaupt vorhanden ist
 * Löschfunktionen löschen das Element
 */
function pruefepasswort()
{
    //Überprüft ob das Passwort richtig ist.
    $ru = false;

    include(dirname(__DIR__) . '/globalconfig.php');

    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $pdo->exec("set names utf8");

    $abfrage = "SELECT password FROM " . $db_pref . "_users WHERE username = :u_ue";

    $sql = $pdo->prepare($abfrage);
    $sql->bindParam(':u_ue', $_SESSION['user']['username']);


    $sql->execute();
    $erg = $sql->fetch();


    if (crypt($_POST['delete-passwort'], $erg['password']) == $erg['password']) {
        $ru = true;
    }

    return $ru;
}

function loescheuser($id)
{
    include(dirname(__DIR__) . '/globalconfig.php');
    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $pdo->exec("set names utf8");

    $abfrage = "DELETE FROM " . $db_pref . "_users WHERE ID = :u_ue";

    $sql = $pdo->prepare($abfrage);
    $sql->bindParam(':u_ue', $id);

    $sql->execute();
    $erg = $sql->fetch();

    if ($erg != '') {
        return true;

    } else {
        return false;
    }
}

function pruefeuser($id)
{
    include(dirname(__DIR__) . '/globalconfig.php');
    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $pdo->exec("set names utf8");

    $abfrage = "SELECT ID FROM " . $db_pref . "_users WHERE ID = :u_ue";

    $sql = $pdo->prepare($abfrage);
    $sql->bindParam(':u_ue', $id);

    $sql->execute();
    $erg = $sql->fetch();

    if ($erg != '') {
        return true;

    } else {
        return false;
    }
}

function loescheprojekt($id)
{

    include(dirname(__DIR__) . '/globalconfig.php');
    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $pdo->exec("set names utf8");

    $abfrage = "DELETE FROM " . $db_pref . "_projekte WHERE ID = :u_ue";

    $sql = $pdo->prepare($abfrage);
    $sql->bindParam(':u_ue', $id);

    $sql->execute();
    $erg = $sql->fetch();

    if ($erg != '') {
        return true;

    } else {
        return false;
    }
}

function pruefeprojekt($id)
{
    include(dirname(__DIR__) . '/globalconfig.php');
    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $pdo->exec("set names utf8");

    $abfrage = "SELECT ID FROM " . $db_pref . "_projekte WHERE ID = :u_ue";

    $sql = $pdo->prepare($abfrage);
    $sql->bindParam(':u_ue', $id);

    $sql->execute();
    $erg = $sql->fetch();

    if ($erg != '') {
        return true;

    } else {
        return false;
    }
}


?>