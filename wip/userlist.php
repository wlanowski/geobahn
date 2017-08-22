<?php
require_once(__DIR__ . '/auth.php');
$seitentitel = 'Benutzerübersicht';
require_once(__DIR__ . '/inc/header.php');

// require für Datenbankverbindungseinstellungen

require_once(__DIR__ . '/globalconfig.php');


require_once(__DIR__ . '/inc/layout.php');
?>


    <!-- page content -->
<?php
if (isset($_GET['nos'])) {
    echo '<BODY onLoad="zeigefehler(\'Sie haben keinen Benutzer ausgewählt!\')">';
}
if (isset($_GET['nf'])) {
    echo '<BODY onLoad="zeigefehler(\'Der Benutzer wurde nicht gefunden!\')">';
}
?>

    <div class="right_col" role="main" style="background-color:#ffffff;">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><?php
                        echo $seitentitel; ?></h3><br/>
                </div>
            </div>
        </div>


        <!-- Start der Tabelle -->
        <div class="col-md-12 col-sm-12 col-xs-12">

            <table id="datatable-buttons" class="display table table-striped table-bordered" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>Benutzername</th>
                    <th>Klarname</th>
                    <th>Email-Adresse</th>
                    <th>EVI</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Benutzername</th>
                    <th>Klarname</th>
                    <th>Email-Adresse</th>
                    <th>EVI</th>
                </tr>
                </tfoot>


                <tbody>
                <?php
                $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
                $pdo->exec("set names utf8");

                $sql = $pdo->prepare("SELECT ID,username, mail, nameclear FROM " . $db_pref . "_users");
                $sql->execute();

                foreach ($sql->fetchAll() as $row) {
                    echo "<tr>\n<td>";

                    echo "<a href='user.php?userid=";
                    echo $row['ID'] . "'><i class='fa fa-external-link'></i> ";
                    echo $row['username'];
                    echo "</a>";
                    echo "</td>\n<td>";

                    echo $row['nameclear'];
                    echo "</td>\n<td>";

                    echo "<a href='mailto:" . $row['mail'] . "'><i class='fa fa-external-link'></i> " . $row['mail'] . "  </a>";

                    echo "</td>\n<td>";

                    echo '<a target="_tab" href="https://evi.intranet.deutschebahn.com/evi31/simpleSearchAction.do?filter=' . $row['username'] . '" class="btn btn-sm btn-primary"><i class="fa fa-phone"></i> EVI</a>';

                    echo "</td>\n</tr>";

                }
                ?>
                </tbody>
            </table>
        </div>
        <!-- Ende der Tabelle -->


    </div>
    </div>


<?php
require_once(__DIR__ . '/inc/footer.content.php');
?>

    </div>

<?php
require_once(__DIR__ . '/inc/footer.php');
?>