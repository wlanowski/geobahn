<?php
//Formular-Task zum Erstellen von Benutzern
require_once (dirname(__DIR__) . '/auth.php');
if($_SESSION['user']['role']!=1)
{
    echo 'Sie sind nicht berechtigt diese Seite aufzurufen';
    die();
}

require_once(dirname(__DIR__) . '/globalconfig.php');


/*

print_r($_POST);

if (isset ($_POST['user_role'])) {
    echo "<h2>JA</h2>";
} else {
    echo "<h2>Nein</h2>";
}

*/
function generierePasswort()
{
    //generiert 8-stelliges Passwort aus Groß- und Kleinbuchstaben
    $alphabet = 'abcdefghjkmnpqrstuvwxyz';
    $alphabet .= strtoupper($alphabet);
    $temp = str_shuffle($alphabet);
    $pass = substr($temp, 0, 8);
    $pass = str_shuffle($pass);
    return $pass;
}


if (!empty($_POST)) {
    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $pdo->exec("set names utf8");

    // Überprüfe ob Benutzer schon vorhanden ist

    $abfragedup = 'SELECT username FROM ' . $db_pref . '_users WHERE username=:u_usernamedup';
    $sqldup = $pdo->prepare($abfragedup);
    $sqldup->bindParam(':u_usernamedup', $_POST['user_username']);
    $sqldup->execute();

    if ($sqldup->fetch() != '') {
        // Der Benutzer existiert bereits

        echo '        <!DOCTYPE html>
<html lang="de">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Neuer Benutzer erstellt</title>

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <h1>Fehler</h1>
               
               
                <div>
                     Es existiert bereits ein Benutzer mit dem Benutzernamen ' . $_POST['user_username'] . '</br>
                    <a class="btn btn-default" href="../control.php">Zurück zum Kontrollzentrum</a>
                </div>

                <div class="clearfix"></div>


            </section>
        </div>
    </div>
</body>
</html>   ';


    } else {
        // Der Benutzername ist noch frei! Weiter gehts...


        $abfrage = 'INSERT INTO ' . $db_pref . '_users (username, mail, role, password, nameclear) VALUES (:u_username, :u_mail, :u_role, :u_passwort, :u_nameclear)';
        $sql = $pdo->prepare($abfrage);

        $notice_username = htmlspecialchars($_POST['user_username']);
        $notice_mail = htmlspecialchars($_POST['user_mail']);
        $notice_nameclear = htmlspecialchars($_POST['user_nameclear']);
        /*

        $password = zufällig generiertes Passwort in Klartext
        $password = mit Salt gehashtes Passwort für die Datenbank

         */
        $password = generierePasswort();
        $salt = '';
        for ($i = 0; $i < 22; $i++) {
            $salt .= substr('./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', mt_rand(0, 63), 1);
        }
        $passworddb = crypt($password, '$2a$10$' . $salt);


        $sql->bindParam(':u_username', $notice_username);
        $sql->bindParam(':u_mail', $notice_mail);
        $sql->bindParam(':u_nameclear', $notice_nameclear);
        $sql->bindParam(':u_passwort', $passworddb);


        $role = 0;

        if (isset ($_POST['user_role'])) {
            $role = 1;
        }
        $sql->bindParam(':u_role', $role);

        /*
         * Der Benutzername ist unique. Deshalb auch in der Tabelle so eingetragen. Es wird über Try/Catch ggf. unique-Fehler abgefangen.
         * In Anlehnung an https://stackoverflow.com/posts/10775192/revisions
         */


        $sql->execute();
        // Erfolg


        //START ENDE SEITE
        echo '
        
<!DOCTYPE html>
<html lang="de">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <h1>Zugangsdaten</h1>
                Der Benutzer wurde erfolgreich erstellt. Hier sehen Sie die Zugangsdaten des neu erstellten Benutzers. Teilen Sie diesem diese Zugangsdaten mit. Dies ist der einzige Zeitpunkt an dem das Passwort in Klartext zu sehen ist. Nach Schließen dieses Fensters, werden Sie das Passwort nicht mehr einsehen können. Setzen Sie das Passwort ggf. zurück. </br><b>Fordern Sie den Benutzer auf das Passwort zu ändern!</b>
                <div>
                    <input type="text" class="form-control" placeholder="Username" value="' . $notice_username . '"
                           readonly/>
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Password" value="' . $password . '" readonly/>
                </div>
                <div>
                    <a class="btn btn-default submit" href="../user.php?userid=' . $pdo->lastInsertId() . '">Zum Neuen
                        Benutzer</a>
                    <a class="btn btn-default" href="../control.php">Zurück zum Kontrollzentrum</a>
                </div>

                <div class="clearfix"></div>


            </section>
        </div>
    </div>
</body>
</html>   ';
        // ENDE ENDE SEITE


    }
}

?>