<?php
/**
    * Hier erfolgt die Loginmagie
    */

// Session starten
session_start();

//require für Datenbankverbindungseinstellungen
require_once(__DIR__ . '/globalconfig.php');

$url = "http://maps.wlanowski.de/wip";

if (!empty($_POST)) {
    if (
        empty($_POST['f']['username']) ||
        empty($_POST['f']['password'])
    ) {
        echo "Es wurden nicht alle Felder ausgefüllt.";
        //$message['error'] = 'Es wurden nicht alle Felder ausgefüllt.';
        //header('Location: '.$url.'/login.php');
    } else {
        $mysqli = @new mysqli($db_host, $db_user, $db_pass, $db_name);
        if ($mysqli->connect_error) {
            echo "Datenbankverbindung fehlgeschlagen: " . $mysqli->connect_error;
            //$message['error'] = 'Datenbankverbindung fehlgeschlagen: ' . $mysqli->connect_error;
            //header('Location: '.$url.'/login.php');
        } else {
            $query = sprintf(
                "SELECT username, password, nameclear FROM " . $db_pref . "_users WHERE username = '%s'",
                $mysqli->real_escape_string($_POST['f']['username'])
            );
            $result = $mysqli->query($query);

            if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                if (crypt($_POST['f']['password'], $row['password']) == $row['password']) {

                    $_SESSION = array(
                        'login' => true,
                        'user' => array(
                            'username' => $row['username'],
                            'username_clear' => $row['nameclear']
                        )
                    );

                    echo "Anmeldung erfolgreich, <a href=\"map.php\">weiter zum Inhalt.";
                    //$message['success'] = 'Anmeldung erfolgreich, <a href="map.php">weiter zum Inhalt.';
                    //header('Location: '.$url.'/map.php');
                } else {
                    echo "Das Kennwort ist nicht korrekt.";
                    //$message['error'] = 'Das Kennwort ist nicht korrekt.';
                    //header('Location: '.$url.'/login.php');
                }
            } else {
                echo "Der Benutzer wurde nicht gefunden.";
                //$message['error'] = 'Der Benutzer wurde nicht gefunden.';
                //header('Location: '.$url.'/login.php');
            }
            $mysqli->close();
        }
    }
} else {
    echo "Zugangsadten eingeben";
    //$message['notice'] = 'Geben Sie Ihre Zugangsdaten ein um sich anzumelden.<br />' .
    //    'Wenn Sie noch kein Konto haben, gehen Sie <a href="./register.php">zur Registrierung</a>.';
    //header('Location: '.$url.'/login.php');
}
?>