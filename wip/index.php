<?php
require_once(__DIR__ . '/auth.php');
$seitentitel = 'Neuigkeiten';
require_once(__DIR__ . '/inc/header.php');

// require für Datenbankverbindungseinstellungen

require_once(__DIR__ . '/globalconfig.php');

require_once(__DIR__ . '/inc/layout.php');

?>


    <!-- page content -->

    <div class="right_col" role="main">

        <div class="page-title">
            <div class="title_left">
                <h3><?php
                    echo $seitentitel; ?></h3><br/>
            </div>
        </div>
        <div class="clearfix"></div>

        <!-- Hier kommen die letzten Änderungen -->
        <div class="row">

            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Zuletzt geänderte Projekte</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <ul class="list-unstyled timeline">

                            <?php

                            $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
                            $pdo->exec("set names utf8");

                            $sqlzuletzt = "SELECT ID, projektname, geaendert, geaendertvon FROM " . $db_pref . "_projekte WHERE geaendert ORDER BY geaendert DESC LIMIT 10";

                            foreach ($pdo->query($sqlzuletzt) as $row) {
                                echo '<li><div class="block"><div class="block_content"><h2 class="title">';
                                echo '<a href="projectdetail.php?projectid=' . $row['ID'] . '">' . $row['projektname'] . '</a>';
                                echo '</h2><div class="byline"><span>geändert ';
                                echo date("d.m.Y H:i:s (T)", strtotime($row['geaendert']));
                                echo '</span> von ';

                                $benutzer = $pdo->prepare("SELECT nameclear FROM " . $db_pref . "_users WHERE ID = :u_id;");
                                $benutzer->bindParam(':u_id', $row['geaendertvon']);
                                $benutzer->execute();

                                echo '<a href="user.php?userid=' . $row['geaendertvon'] . '">';
                                echo $benutzer->fetch()['nameclear'];
                                echo '</a></div></div></div></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>


            <!-- Das waren die letzten Änderungen -->

            <!-- Hier kommen die neuen Projekte -->
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <div class="clearfix"></div>
                        <h2>Neu hinzugefügte Projekte</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <ul class="list-unstyled timeline">

                            <?php

                            $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
                            $pdo->exec("set names utf8");

                            $sqlneu = "SELECT ID, projektname, erstellt, erstelltvon FROM " . $db_pref . "_projekte ORDER BY erstellt DESC LIMIT 10";

                            foreach ($pdo->query($sqlneu) as $row) {
                                echo '<li><div class="block"><div class="block_content"><h2 class="title">';
                                echo '<a href="projectdetail.php?projectid=' . $row['ID'] . '">' . $row['projektname'] . '</a>';
                                echo '</h2><div class="byline"><span>hinzugefügt ';
                                echo date("d.m.Y H:i:s (T)", strtotime($row['erstellt']));
                                echo '</span> von ';

                                $benutzer = $pdo->prepare("SELECT nameclear FROM " . $db_pref . "_users WHERE ID = :u_id;");
                                $benutzer->bindParam(':u_id', $row['erstelltvon']);
                                $benutzer->execute();

                                echo '<a href="user.php?userid=' . $row['erstelltvon'] . '">';
                                echo $benutzer->fetch()['nameclear'];
                                echo '</a></div></div></div></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>


            <!-- Das waren die neuen Projekte -->
        </div>
    </div>
    </div>

    </div>


<?php
require_once(__DIR__ . '/inc/footer.content.php');
?>
<?php
require_once(__DIR__ . '/inc/footer.php');
?>