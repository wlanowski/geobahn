<?php

$seitentitel = 'Kontrollzentrum';


// require für Datenbankverbindungseinstellungen

require_once(__DIR__ . '/globalconfig.php');
require_once(__DIR__ . '/auth.php');
if ($_SESSION['user']['role'] != 1) {
    header('Location: index.php?nb');
}


require_once(__DIR__ . '/inc/header.php');
require_once(__DIR__ . '/inc/layout.php');
?>


    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><?php
                        echo $seitentitel; ?></h3><br/>
                </div>
            </div>
        </div>


        <!-- Start der Benutzer -->
        <div class="x_panel">
            <div class="x_title">
                <h2>Benutzer verwalten</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <table id="datatable-buttons-user" class="display table table-striped table-bordered"
                           cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Benutzername</th>
                            <th>Klarname</th>
                            <th>Email-Adresse</th>
                            <th>EVI</th>
                            <th>Aktionen</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Benutzername</th>
                            <th>Klarname</th>
                            <th>Email-Adresse</th>
                            <th>EVI</th>
                            <th>Aktionen</th>
                        </tr>
                        </tfoot>


                        <tbody>
                        <?php
                        $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);

                        $sql = $pdo->prepare("SELECT ID,username, mail, nameclear FROM " . $db_pref . "_users");
                        $sql->execute();

                        foreach ($sql->fetchAll() as $row) {
                            echo "<tr>\n<td>";
                            echo $row['ID'];
                            echo "</td>\n<td>";

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

                            echo "</td>\n<td>";
                            echo '<a href="control_user.php?userid=' . $row['ID'] . '" class="btn btn-sm btn-primary">Benutzer verwalten</a>';
                            echo '<a href="control_delete.php?userid=' . $row['ID'] . '" class="btn btn-sm btn-danger">Benutzer löschen</a>';
                            echo "</td>\n</tr>";

                        }
                        ?>
                        </tbody>
                    </table>
                    <br/><br/>
                    <div class="col-md-12 col-xs-12">
                        <a href="control_adduser.php" class="col-md-12 col-xs-12 btn btn-sm btn-success">Neuen Benutzer
                            hinzufügen</a>
                    </div>
                    <br/>
                </div>
            </div>
        </div>

        <!-- Ende Benutzer -->
        <!-- Start Projekte -->

        <div class="x_panel">
            <div class="x_title">
                <h2>Projekte verwalten</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <table id="datatable-buttons-projects" class="display table table-striped table-bordered"
                           cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Projektname</th>
                            <th>Ansprechpartner</th>
                            <th>Angelegt</th>
                            <th>Status</th>
                            <th>Aktionen</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Projektname</th>
                            <th>Ansprechpartner</th>
                            <th>Angelegt</th>
                            <th>Status</th>
                            <th>Aktionen</th>
                        </tr>
                        </tfoot>


                        <tbody>


                        <?php
                        $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);

                        $sql = $pdo->prepare("SELECT ID, projektname, ort, ansprechpartner, status, erstellt FROM " . $db_pref . "_projekte");
                        $sql->execute();

                        foreach ($sql->fetchAll() as $row) {
                            echo "<tr>\n<td>";
                            echo $row['ID'];
                            echo "</td>\n<td>";

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

                            echo "</td>\n<td>";


                            echo '<a href="createproject.php?bearbeiten=' . $row['ID'] . '" class="btn btn-sm btn-primary">Projekt verwalten</a>';
                            echo '<a href="control_delete.php?projectid=' . $row['ID'] . '" class="btn btn-sm btn-danger">Projekt löschen</a>';


                            echo "</td>\n</tr>";

                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
        <!-- Ende Projekte -->


    </div>
    </div>

<?php
require_once(__DIR__ . '/inc/footer.content.php');
?>

    </div>

<?php
require_once(__DIR__ . '/inc/footer.php');
?>