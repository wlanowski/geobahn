<?php
require_once(__DIR__ . '/auth.php');
$seitentitel = 'Benutzerinformation';
require_once(__DIR__ . '/globalconfig.php');

if (!isset($_GET['userid'])) {
    //echo '<BODY onLoad="zeigefehler(\'Sie haben keinen Benutzer ausgewählt!\')">';
    header("Location: ./userlist.php?nos");
} else {


    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $pdo->exec("set names utf8");

    $sqlbenutzerabfrage = "SELECT ID, username, mail, informations, created, nameclear FROM " . $db_pref . "_users WHERE ID= :u_id LIMIT 1";

    $sql = $pdo->prepare($sqlbenutzerabfrage);
    $sql->bindParam(':u_id', $_GET['userid']);
    $sql->execute();

    $sqlergebnis = $sql->fetch();

    //print_r($sqlergebnis);


    if ($sqlergebnis == "") {
        header("Location: ./userlist.php?nf");
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
                        <h3>Hier kommt der Titel</h3>
                    </div>
                    <div class="x_content">
                        Und hier die Inhalte
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