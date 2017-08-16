<?php
require_once(__DIR__ . '/auth.php');
$seitentitel = 'Benutzerinformation';
require_once(__DIR__ . '/globalconfig.php');

// BOOL, ob gerade eigenes Profil angeschaut wird
$eigen = ($_SESSION['user']['userid'] == $_GET['userid']);

if (!isset($_GET['userid'])) {
    //echo '<BODY onLoad="zeigefehler(\'Sie haben keinen Benutzer ausgewählt!\')">';
    header("Location: ./userlist.php?nos");
} else {


    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $pdo->exec("set names utf8");

    $sqlbenutzerabfrage = "SELECT ID, username, mail, information, created, nameclear FROM " . $db_pref . "_users WHERE ID= :u_id LIMIT 1";

    $sql = $pdo->prepare($sqlbenutzerabfrage);
    $sql->bindParam(':u_id', $_GET['userid']);
    $sql->execute();

    $sqlergebnis = $sql->fetch();

    //print_r($sqlergebnis);


    if ($sqlergebnis == "") {
        header("Location: ./userlist.php?nf");
    } else {

        $array_erstellt = [];
        $array_berechtigt = [];

        $abfragetext_ber = "SELECT ID, projektname, erstelltvon, benutzer FROM " . $db_pref . "_projekte;";
        $abfrage_ber = $pdo->prepare($abfragetext_ber);
        $abfrage_ber->execute();

        $ergebnis_ber = $abfrage_ber->fetchAll();

        foreach ($ergebnis_ber as $row_ber) {
            $arraybenutzer = json_decode($row_ber['benutzer']);

            if (in_array($_GET['userid'], $arraybenutzer)) {
                array_push($array_berechtigt, [$row_ber['ID'], $row_ber['projektname']]);
            }

            if ($_GET['userid'] == $row_ber['erstelltvon']) {
                array_push($array_erstellt, [$row_ber['ID'], $row_ber['projektname']]);
            }

        }


        //echo 'Erstellt: ' . print_r($array_erstellt);
        //echo '</br>Berechtigt: ' . print_r($array_berechtigt);
    }

}


require_once(__DIR__ . '/inc/header.php');


// require für Datenbankverbindungseinstellungen


require_once(__DIR__ . '/inc/layout.php');
?>


    <!-- page content -->
    <!--
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><?php
    echo $seitentitel; ?></h3><br/>
                </div>
            </div>
        </div>


    </div>
    -->
    <!-- Hier stimmt was nicht
    </div>
    -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3><?php echo $sqlergebnis['nameclear']; ?></h3>
                    </div>
                    <div class="x_content">
                        <!-- Start Tabelle -->
                        <div class="row">
                            <div class="col-xs-12 table">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td class="col-md-5">Name</td>
                                        <td><?php echo $sqlergebnis['nameclear']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-5">Benutzername</td>
                                        <td><?php echo $sqlergebnis['username']; ?></td>

                                    </tr>
                                    <tr>
                                        <td class="col-md-5">Mail</td>
                                        <td>
                                            <!--<i class='fa fa-external-link'></i> <a href="mailto:<?php echo $sqlergebnis['mail']; ?>"><?php echo $sqlergebnis['mail']; ?></a>-->
                                            <a href="mailto:<?php echo $sqlergebnis['mail']; ?>"
                                               class="btn btn-sm btn-success"><i class="fa fa-envelope"></i> Mail</a>
                                            <a target="_tab"
                                               href="https://evi.intranet.deutschebahn.com/evi31/simpleSearchAction.do?filter=' . $projectinfo['ansprechpartner'] . '"
                                               class="btn btn-sm btn-primary"><i class="fa fa-phone"></i> EVI</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-5">Eingetragen seit</td>
                                        <td><?php echo date("d.m.Y H:i:s (T)", strtotime($sqlergebnis['created'])); ?></td>

                                    </tr>
                                    <tr>
                                        <td class="col-md-5">Zusatzinformationen</td>
                                        <td><?php echo $sqlergebnis['information']; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Ende Tabelle -->

                        <h4>Erstellte Projekte</h4>
                        <!-- Start Tabelle -->
                        <div class="row">
                            <div class="col-xs-12 table">
                                <table class="table table-striped">
                                    <tbody>


                                    <?php


                                    //print_r($array_erstellt)
                                    foreach ($array_erstellt as $ue) {
                                        echo '<tr><td class="col-md-5">';
                                        echo $ue[1];
                                        echo '</td><td><a href="projectdetail.php?projectid=';
                                        echo $ue[0];
                                        echo '" class="btn btn-sm btn-success" >Link</a>';

                                        if ($eigen) {
                                            echo '<a href="createproject.php?bearbeiten=';
                                            echo $ue[0];
                                            echo '" class="btn btn-sm btn-success">Projekt bearbeiten</a>';
                                        }


                                        echo '</td></tr>';
                                    }

                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Ende Tabelle -->


                        <h4>Beteiligung an anderen Projekten</h4>
                        <!-- Start Tabelle -->
                        <div class="row">
                            <div class="col-xs-12 table">
                                <table class="table table-striped">
                                    <tbody>

                                    <?php

                                    //print_r($array_erstellt)
                                    foreach ($array_berechtigt as $ue) {
                                        echo '<tr><td class="col-md-5">';
                                        echo $ue[1];
                                        echo '</td><td><a href="projectdetail.php?projectid=';
                                        echo $ue[0];
                                        echo '" class="btn btn-sm btn-success" >Link</a>';

                                        if ($eigen) {
                                            echo '<a href="createproject.php?bearbeiten=';
                                            echo $ue[0];
                                            echo '" class="btn btn-sm btn-success">Projekt bearbeiten</a>';

                                        }
                                        echo '</td></tr>';
                                    }

                                    ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Ende Tabelle -->


                    </div>


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