<!-- Soll dann nur dem Administrator angezeigt werden -->
<?php
/*
In Anlehnung an:
http://wiki.selfhtml.org/wiki/Benutzer:Suit/Loginsystem_und_Benutzerregistrierung_mit_PHP_und_MySQL
*/

$seitentitel = 'Benutzerkonto erstellen';
require_once(__DIR__.'/inc/header.php');

//require für Datenbankverbindungseinstellungen
require_once(__DIR__.'/globalconfig.php');


	$message = array();
	if (!empty($_POST)) {
		if (
			empty($_POST['f']['username']) ||
			empty($_POST['f']['password']) ||
			empty($_POST['f']['password_again'])
		) {
			$message['error'] = 'Es wurden nicht alle Felder ausgefüllt.';
		} else if ($_POST['f']['password'] != $_POST['f']['password_again']) {
			$message['error'] = 'Die eingegebenen Passwörter stimmen nicht überein.';
		} else {
			unset($_POST['f']['password_again']);
			$salt = ''; 
			for ($i = 0; $i < 22; $i++) { 
				$salt .= substr('./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', mt_rand(0, 63), 1); 
			}
			$_POST['f']['password'] = crypt(
				$_POST['f']['password'],
				'$2a$10$' . $salt
			);
			
			$mysqli = @new mysqli($db_host, $db_user, $db_pass, $db_name);
			if ($mysqli->connect_error) {
				$message['error'] = 'Datenbankverbindung fehlgeschlagen: ' . $mysqli->connect_error;
			}
			$query = sprintf(
				"INSERT INTO ".$db_pref."_users (username, password)
				SELECT * FROM (SELECT '%s', '%s') as new_user
				WHERE NOT EXISTS (
					SELECT username FROM ".$db_pref."_users WHERE username = '%s'
				) LIMIT 1;",
				$mysqli->real_escape_string($_POST['f']['username']),
				$mysqli->real_escape_string($_POST['f']['password']),
				$mysqli->real_escape_string($_POST['f']['username'])
			);
			$mysqli->query($query);
			if ($mysqli->affected_rows == 1) {
				$message['success'] = 'Neuer Benutzer (' . htmlspecialchars($_POST['f']['username']) . ') wurde angelegt, <a href="login.php">weiter zur Anmeldung</a>.';
			/*header('Location: http://' . $_SERVER['HTTP_HOST'] . '/login.php'); */
			} else {
				$message['error'] = 'Der Benutzername ist bereits vergeben.';
			}
			$mysqli->close();
		}
	} else {
		$message['notice'] = 'Übermitteln Sie das ausgefüllte Formular um ein neues Benutzerkonto zu erstellen.';
	}
?>
<body>

<?php if (isset($message['error'])): ?>
			
			<div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Fehler!</strong> <?php echo $message['error']; ?>
			</div>
				
			
<?php endif;
	if (isset($message['success'])): ?>
			<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Erfolgreich!</strong><?php> echo $message['success']; ?>
            </div>			
<?php endif;
	if (isset($message['notice'])): ?>
			<!-- <fieldset class="notice"><legend>Hinweis</legend><?php echo $message['notice'] ?></fieldset>-->
<?php endif; ?>

<!-- Start Eingabe -->
<form action="./register.php" method="post">
	<h1>Neues Benutzerkonto erstellen</h1>
	<div>
		<input type="text" class="form-control" placeholder="Benutzername" required ="" name="f[username]" />
	</div>
	<div>
		<input type="password" class="form-control" placeholder="Passwort" required ="" name="f[password]" />
	</div>
	<div>
		<input type="password" class="form-control" placeholder="Passwort wiederholen" required ="" name="f[password_again]" />
	</div>
	<div>
	<input type="submit" name="submit" value="OK" />
	</div>
</form>
<?php require(__DIR__.'/inc/footer.php'); ?>
