<?php
/*
In Anlehnung an:
http://wiki.selfhtml.org/wiki/Benutzer:Suit/Loginsystem_und_Benutzerregistrierung_mit_PHP_und_MySQL
*/
session_start();
$seitentitel = 'Login';
require_once(__DIR__ . '/inc/header.php');

//require für Datenbankverbindungseinstellungen
require_once(__DIR__ . '/globalconfig.php');

if (isset($_SESSION['login'])) {
    header('Location: ./map.php');
} else {
    if (!empty($_POST)) {
        if (
            empty($_POST['f']['username']) ||
            empty($_POST['f']['password'])
        ) {
            $message['error'] = 'Es wurden nicht alle Felder ausgefüllt.';
        } else {
            $mysqli = @new mysqli($db_host, $db_user, $db_pass, $db_name);
            if ($mysqli->connect_error) {
                $message['error'] = 'Datenbankverbindung fehlgeschlagen: ' . $mysqli->connect_error;
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
                        // setcookie("nameclear", $row['nameclear'], time()+7200);
                        // setcookie("nameclear", $row['nameclear']);

                        $message['success'] = 'Anmeldung erfolgreich, <a href="map.php">weiter zum Inhalt.';
                        header('Location: ./map.php');
                    } else {
                        $message['error'] = 'Das Kennwort ist nicht korrekt.';
                    }
                } else {
                    $message['error'] = 'Der Benutzer wurde nicht gefunden.';
                }
                $mysqli->close();
            }
        }
    } else {
        $message['notice'] = 'Geben Sie Ihre Zugangsdaten ein um sich anzumelden.<br />' .
            'Wenn Sie noch kein Konto haben, gehen Sie <a href="./register.php">zur Registrierung</a>.';
    }
}
?>









    <body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">

            <?php if (isset($message['error'])): ?>

                <div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span>
                    </button>
                    <strong>Fehler!</strong> <?php echo $message['error']; ?>
                </div>


            <?php endif;
            if (isset($message['success'])): ?>
                <!-- <fieldset class="success"><legend>Erfolg</legend><?php echo $message['success'] ?></fieldset> -->
            <?php endif;
            if (isset($message['notice'])): ?>
                <!-- <fieldset class="notice"><legend>Hinweis</legend><?php echo $message['notice'] ?></fieldset> -->
            <?php endif; ?>


            <?php
            if (isset($_GET['status'])) {
                if ($_GET['status'] == 'logout') {
                    echo '
				<div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Erfolgreich!</strong> Sie wurden erfolgreich abgemeldet.
				</div>';
                } elseif ($_GET['status'] == 'notloggedin') {
                    echo '
				<div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Fehler!</strong> Sie sind nicht angemeldet!
				</div> ';
                }
            }

            ?>


            <section class="login_content">


                <form action="./login.php" method="post">
                    <h1>Login</h1>


                    <div>
                        <input type="text" class="form-control" placeholder="Benutzername" required=""
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