<?php
require_once(__DIR__ . '/auth.php');
$seitentitel = 'Projektübersicht';
require_once(__DIR__ . '/inc/header.php');

// require für Datenbankverbindungseinstellungen

require_once(__DIR__ . '/globalconfig.php');


require_once(__DIR__ . '/inc/layout.php');
?>


    <!-- page content -->
<?php
if (isset($_GET['nos'])) {
    echo '<BODY onLoad="zeigefehler(\'Bitte Projekt in der Projektübersicht wählen!\')">';
}

if (isset($_GET['nv'])) {
    echo '<BODY onLoad="zeigefehler(\'Das eingegebene Projekt ist nicht vorhanden\')">';
}

if (isset($_GET['nb'])) {
    echo '<BODY onLoad="zeigefehler(\'Sie sind nicht berechtigt dieses Projekt zu bearbeiten\')">';
}
if (isset($_GET['nf'])) {
    echo '<BODY onLoad="zeigefehler(\'Das Projekt wurde nicht gefunden. Bitte wählen Sie ihr Projekt\')">';
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
                    <th>Projektname</th>
                    <th>Ansprechpartner</th>
                    <th>Angelegt</th>
                    <th>Status</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Projektname</th>
                    <th>Ansprechpartner</th>
                    <th>Angelegt</th>
                    <th>Status</th>
                </tr>
                </tfoot>


                <tbody>


                <?php
                $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);

                $sql = $pdo->prepare("SELECT ID, projektname, ort, ansprechpartner, status, erstellt FROM " . $db_pref . "_projekte");
                $sql->execute();

                foreach ($sql->fetchAll() as $row) {
                    echo "<tr>\n<td>";

                    echo "<a href='projectdetail.php?projectid=";
                    echo $row['ID'] . "'><i class='fa fa-external-link'></i> ";
                    echo $row['projektname'];
                    echo "</a>";
                    echo "</td>\n<td>";



                    $sqlnameabfrage = "SELECT nameclear FROM " . $db_pref . "_users WHERE username= :u_username";
                    $sqlname = $pdo->prepare($sqlnameabfrage);

                    $sqlname->bindParam(':u_username', $row['ansprechpartner']);
                    $sqlname->execute();


                    $rowname = $sqlname->fetch();
                    echo "<a href='user.php?username=" . $row['ansprechpartner'] . "'><i class='fa fa-external-link'></i> " . $rowname['nameclear'] . "  </a>";
                    echo "</td>\n<td>";

                    $date = new DateTime($row['erstellt']);
                    echo $date->format('d.m.Y H:i:s (T)') . "<br />";

                    echo "</td>\n<td>";

                    switch ($row['status']) {
                        case 0: {
                            $status_text = "in Bearbeitung";
                            $status_class = "info";
                            break;
                        }
                        case 1: {
                            $status_text = "abgeschlossen";
                            $status_class = "success";
                            break;
                        }
                        case 2: {
                            $status_text = "verzögert";
                            $status_class = "warning";
                            break;
                        }
                        case 3: {
                            $status_text = "Es gibt Probleme/Projekt pausiert";
                            $status_class = "danger";
                            break;
                        }
                        default: {
                            $status_text = "nicht definiert";
                            $status_class = "primary";
                        }
                    }

                    echo '<span class="label label-' . $status_class . '"> ' . $status_text . ' </span>';


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