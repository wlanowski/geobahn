<?php
/*
In Anlehnung an:
http://wiki.selfhtml.org/wiki/Benutzer:Suit/Loginsystem_und_Benutzerregistrierung_mit_PHP_und_MySQL
*/
session_start();

if (isset($_SESSION['login'])) {
    // dann sind wir ja schon eingeloggt :)
    header('Location: ./map.php');
}

$seitentitel = 'Login';
require_once(__DIR__ . '/inc/header.php');

//require für Datenbankverbindungseinstellungen
require_once(__DIR__ . '/globalconfig.php');
?>


    <body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">


            <?php
            //Fehlermeldungen
            if (isset($_GET['status'])) {
                switch ($_GET['status']) {
                    case 'logout':
                        $klasse = 'success';
                        $message = '<strong>Erfolgreich!</strong> Sie wurden erfolgreich abgemeldet';
                        break;
                    case 'notloggedin':
                        $klasse = 'warning';
                        $message = '<strong>Achtung!</strong> Sie müssen sich anmelden um diese Seite besuchen zu können';
                        break;
                    case 'naf':
                        $klasse = 'danger';
                        $message = '<strong>Fehler!</strong> Sie haben nicht alle Felder ausgefüllt';
                        break;
                    case 'fpass':
                        $klasse = 'danger';
                        $message = '<strong>Fehler!</strong> Das Passwort ist nicht korrekt';
                        break;
                    case 'fuser':
                        $klasse = 'danger';
                        $message = '<strong>Fehler!</strong> Der Benutzer ist nicht bekannt';
                        break;
                    default:
                        $klasse = 'danger';
                        $message = '<strong>Fehler!</strong> Ein unbekannter Fehler ist eingetreten...';
                }

                echo '<div class="alert alert-' . $klasse . ' alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' . $message . '</div>';
            }
            ?>


            <section class="login_content">


                <?php
                if (ISSET($_GET["weiter"])) {
                    echo '<form action="func/login_task.php?weiter=' . $_GET['weiter'] . '" method="post">';
                } else {
                    echo '<form action="func/login_task.php" method = "post" > ';
                }
                ?>


                <h1>Login</h1>


                <div>
                    <input type="TEXT" class="form-control" placeholder="Benutzername" required=""
                           name="f[username]"/>
                </div>
                <div>
                    <input type="password" class="form-control" placeholder="Passwort" required=""
                           name="f[password]"/>
                </div>
                <div>

                    <input type="submit" class="btn btn-default submit" name="submit" value="Login"/>
                    <a class="reset_pass" href="#">Passwort vergessen?</a>

                </div>

                <div class="clearfix">


                </div>

                <div class="separator">

                    </p>

                    <div class="clearfix"></div>
                    <br/>

                    <div>
                        <p>WIP! von John Nitzsche (2017)</p>
                    </div>
                </div>
                </form>
            </section>
        </div>
    </div>
</div>
<?php
require_once(__DIR__ . '/inc/footer.php');
?>