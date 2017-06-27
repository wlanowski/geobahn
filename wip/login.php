<?php
/*
In Anlehnung an:
http://wiki.selfhtml.org/wiki/Benutzer:Suit/Loginsystem_und_Benutzerregistrierung_mit_PHP_und_MySQL
*/
session_start();

if(isset($_SESSION['login'])){
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


                <form action="./login_task.php" method="post">
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