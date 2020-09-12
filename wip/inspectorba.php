<?php
require_once(__DIR__ . '/auth.php');
$seitentitel = 'Streckeninspektor';
require_once(__DIR__ . '/inc/header.php');

// require für Datenbankverbindungseinstellungen

require_once(__DIR__ . '/globalconfig.php');

require_once(__DIR__ . '/inc/layout.php');
?>


    <!-- page content -->

    <div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?php
                    echo $seitentitel; ?></h3><br/>
            </div>
        </div>
    </div>


<?php

if (isset($_GET['strecke']))
{
    echo '
<div>		
<br />
<br />
			Andere Strecke wählen?<br />
			<form action="inspector.php" method="get">
			<div class="input-group">
                            <input name="strecke" type="number" class="form-control" placeholder="Streckennummer, Bsp: 6605">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Okay</button>
                            </span>
                          </div>
			</form>
			</div>
';

    // Wenn Strecke gesetzt...

    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $pdo->exec("set names utf8");


    $sql = $pdo->prepare("SELECT * FROM " . $db_pref . "_alles WHERE strecke= :uebergabe ORDER BY km_i ASC");
    $sqlstrecke = $pdo->prepare('SELECT strecke_ku FROM " . $db_pref . "_strecke WHERE strecke= :uebergabe LIMIT 1;');

    $sql->bindParam(':uebergabe', $_GET['strecke']);
    $sqlstrecke->bindParam(':uebergabe', $_GET['strecke']);

    $sql->execute();
    $sqlstrecke->execute();


    //$streckekurz = $pdo->query($sqlstrecke)->fetch();
    $streckekurz = $sql->fetch();

    $ergebnis = $sql->fetchAll();

    ?>
    <h4>Strecke <?php echo $_GET['strecke'] . ': ' . $streckekurz['strecke_ku'] ?></h4>

    <div class="clearfix"></div>

    <!-- TABS -->
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab"
                                                  aria-expanded="true">Streckenelemente</a>
        </li>
        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"
                                            aria-expanded="false">Streckenabschnitte</a>
        </li>

    </ul>
    <!-- START STRECKENELEMENTE -->
    <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
        <ul class="messages">
            <?php
            foreach ($ergebnis as $row) {
                switch ($row['geoart']) {
                    case 'bruecke': // BRÜCKE
                        echo '							
							<li>
                                <img src="img/bruecke.png" class="avatar" alt="Avatar">
                                <div class="message_date">
                                  <h3 class="date text-info">Bkm</h3>
                                  <p class="month">' . $row['km_l']. '</p>
                                </div>
                                <div class="message_wrapper">
                                  <h4>Brückenbauwerk</h4>
                                  Richtung:';
                        switch ($row['richtung']) {
                            case 0:
                                echo 'Parallellaufend oder eingleisige Strecke';
                                break;

                            case 1:
                                echo 'Richtungsgleis';
                                break;

                            case 2:
                                echo 'Gegenrichtungsgleis';
                                break;

                            default:
                                echo 'k. A.';
                        }

                        echo '
								  
                                  <br />
                                 Länge:' . $row['laenge'] . '
                                </div>
                            </li>
							';
                        break;


// kleine Brücken mit Geodaten 2019 entfallen
/*
                    case 'kleinebruecken': // KLEINE BRÜCKE
                        echo '							
							<li>
                                <img src="img/bruecke.png" class="avatar" alt="Avatar">
                                <div class="message_date">
                                  <h3 class="date text-info">Bkm</h3>
                                  <p class="month">' . $row['km_l'] . '</p>
                                </div>
                                <div class="message_wrapper">
                                  <h4>Brückenbauwerk</h4>
                                  Richtung:';
                        switch ($row['richtung']) {
                            case 0:
                                echo 'Parallellaufend oder eingleisige Strecke';
                                break;

                            case 1:
                                echo 'Richtungsgleis';
                                break;

                            case 2:
                                echo 'Gegenrichtungsgleis';
                                break;

                            default:
                                echo 'k. A.';
                        }
*/
                        echo '
								  
                                  <br />
                                 Länge:' . $row['laenge'] . '
                                </div>
                            </li>
							';
                        break;

                    case 'bst': // Betriebsstelle
                        echo '							
							<li>
                                <img src="img/bst.png" class="avatar" alt="Avatar">
                                <div class="message_date">
                                  <h3 class="date text-info">Bkm</h3>
                                  <p class="month">' . $row['km_l'] . '</p>
                                </div>
                                <div class="message_wrapper">
                                  <h4>Betriebsstelle: ' . $row['bezeichnung'] . '</h4>
                                  Kürzel: ' . $row['kuerzel'] . '								  
                                  <br />
                                 Art: ' . $row['stelle_art'] . '
                                </div>
                            </li>
							';
                        break;

                    case 'bue': // Bahnübergänge
                        echo '
							<li>
                                <img src="img/bue.png" class="avatar" alt="Avatar">
                                <div class="message_date">
                                  <h3 class="date text-info">Bkm</h3>
                                  <p class="month">' . $row['km_l'] . '</p>
                                </div>
                                <div class="message_wrapper">
                                  <h4>BÜ: ' . $row['bezeichnung'] . '</h4>
                                  Sicherung: ' . $row['techn_sicherung'] . '								  
                                  <br />
                                 Art: ' . $row['strassenart'] . '
								 <br />
								  Bkm: ' . $row['km_l'] . '
								 <br />
								 Richtung:';
                        switch ($row['richtung']) {
                            case 0:
                                echo 'Parallellaufend oder eingleisige Strecke';
                                break;

                            case 1:
                                echo 'Richtungsgleis';
                                break;

                            case 2:
                                echo 'Gegenrichtungsgleis';
                                break;

                            default:
                                echo 'k. A.';
                        }

                        echo '
								  
                                  <br />
                                </div>
                            </li>
							';
                        break;

                    case 'tunnel': // Tunnel
                        echo '							
							<li>
                                <img src="img/tunnel.png" class="avatar" alt="Avatar">
                                <div class="message_date">
                                  <h3 class="date text-info">Bkm</h3>
                                  <p class="month">' . $row['von_km_l'] . ' – ' . $row['bis_km_l'] . '</p>
                                </div>
                                <div class="message_wrapper">
                                  <h4>' . $row['bezeichnung'] . '</h4>
                                  Richtung:';
                        switch ($row['richtung']) {
                            case 0:
                                echo 'Parallellaufend oder eingleisige Strecke';
                                break;

                            case 1:
                                echo 'Richtungsgleis';
                                break;

                            case 2:
                                echo 'Gegenrichtungsgleis';
                                break;

                            default:
                                echo 'k. A.';
                        }

                        echo '
								  
                                  <br />
                                 Länge:' . $row['laenge'] . '
                                </div>
                            </li>
							';
                        break;

                    case 'strecke':
                        break;

                    default:
                        echo '							
							<li>
                                <img src="img/FEHLER.png" class="avatar" alt="Avatar">
                                <div class="message_date">
                                  <h3 class="date text-info">Bkm</h3>
                                  <p class="month">XXX</p>
                                </div>
                                <div class="message_wrapper">
                                  <h4>Fehler in der Dartenverarbeitung</h4>
                                  Richtung:
								  
                                </div>
                            </li>
							';

                }
            }

            ?>
        </ul>
    </div>


    <!-- START STRECKENVERLAUF -->

    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
    <ul class="messages">
    <?php
    foreach ($ergebnis as $row) {
        if ($row['geoart'] == 'strecke') {
            echo '							
							<li>
                                <img src="img/strecke.png" class="avatar" alt="Avatar">
                                <div class="message_date">
                                  <h3 class="date text-info">Bkm</h3>
                                  <p class="month">' . $row['von_km_l'] . ' – ' . $row['bis_km_l'] . '</p>
                                </div>
                                <div class="message_wrapper">
                                  <h4>Streckenabschnitt ' . $row['von_km_l'] . ' – ' . $row['bis_km_l'] . '</h4>
                                  Richtung:';
            switch ($row['richtung']) {
                case 0:
                    echo 'Parallellaufend oder eingleisige Strecke';
                    break;

                case 1:
                    echo 'Richtungsgleis';
                    break;

                case 2:
                    echo 'Gegenrichtungsgleis';
                    break;

                default:
                    echo 'k. A.';
            }

            echo '
								  
                                  <br />
                                 Länge: ' . $row['laenge'] . '<br />
								 Elektrifizierung: ' . $row['elektrifiz'] . '<br />
								 Benutzung: ' . $row['benutzun'] . '<br />
								 Geschwindigkeiten: ' . $row['geschwindi'] . '<br />
								 Gleisanzahl: ' . $row['gleisanzahl'] . '<br />';

            if ($row['kmspru_typ'] != '' OR $row['kmspru_t00'] != '') {
                echo '<b>Kilometersprung - Anfang: ';
                echo $row['kmspru_typ'];
                echo '<br />Kilometersprung - Ende: ';
                echo $row['kmspru_t00'] . '</b>';

            }

            echo '
                                </div>
                            </li>
							';

        }


    }


    echo '</ul></div></div>';


}
else {

    // ... sonst setzte Strecke

    echo '
			
		
		<div>
		<br />
		<br />
			Bitte Strecken wählen!<br />
			<form action="inspector.php" method="get">
			<div class="input-group">
                            <input name="strecke" type="number" class="form-control" placeholder="Streckennummer, Bsp: 6605">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Okay</button>
                            </span>
                          </div>
			</form>

		</div>

		';
}

?>















    </div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>


    </div>
    </div>




<?php
require_once(__DIR__ . '/inc/footer.content.php');
?>
<?php
require_once(__DIR__ . '/inc/footer.php');
?>