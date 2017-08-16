<?php
//require für Datenbankverbindungseinstellungen

session_start();


if (!empty($_POST)) {
    if (pruefepasswort()) {

        if ($_POST['delete-objektart'] == 'user') {
            echo "In User!";
            if (pruefeuser($_POST['delete-objektid'])) {
                loescheuser($_POST['delete-objektid']);
            } else {
                // User existiert nicht
            }
        }
        if ($_POST['delete-objektart'] == 'project') {
            if (pruefeprojekt($_POST['delete-objektid'])) {
                loescheprojekt($_POST['delete-objektid']);
            }
        }
    }
    else{
        //Passwort ist falsch!
        header("Location: ../404.php?falschespw");
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

    return false;
}

function pruefeuser($id)
{
    return false;
}

function loescheprojekt($id)
{

    return false;
}

function pruefeprojekt($id)
{
    return false;
}


?>