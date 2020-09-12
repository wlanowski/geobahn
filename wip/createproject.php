<?php
require_once(__DIR__ . '/auth.php');
if ($_SESSION['user']['role'] == 99) {
    header('Location: map.php?nb');
}

//Seitentitel wird später definiert
//$seitentitel = 'Projekterstellung';


// require für Datenbankverbindungseinstellungen

require_once(__DIR__ . '/globalconfig.php');


?>

<?php
//Bearbeitungsmöglichkeiten werden initialisiert.

/*
 * Issi ist blöd.
 */
$berechtigt = false;


// Array nur zur Vorbeugung von E_NOTICE-Meldung wegen nicht definitierten Indizies
$abfrage = array(
    'ID' => '',
    'projektname' => '',
    'typ' => '',
    'ort' => '',
    'ortgeo' => '',
    'ort_geo_lat' => '',
    'ansprechpartner' => '',
    'projektleiter' => '',
    'start' => '',
    'ende' => '',
    'ende_prog' => '',
    'status' => '',
    'zusatz' => '',
    'erstellt' => '',
    'benutzer' => '',
    'erstelltvon' => '',
    'geändertvon' => '',
    'strecke' => '');

if (isset($_GET['bearbeiten'])) {
    // Überprüfe ob Projekt überhaupt vorhanden

    $seitentitel = 'Projekt bearbeiten';

    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $pdo->exec("set names utf8");

    $sql = $pdo->prepare("SELECT * FROM " . $db_pref . "_projekte WHERE ID= :uebergabe LIMIT 1");
    $sql->bindParam(':uebergabe', $_GET['bearbeiten']);
    $sql->execute();

    $abfrage = $sql->fetch();

    if ($abfrage == "") {
        //Kein Ergebnis, Projekt existiert nicht
        header('location: ./projects.php?nv');
        exit();

    }

    if ($_SESSION['user']['role'] == !1) {

        $berechtigte_benutzer = json_decode($abfrage['benutzer']);
        if ((in_array($_SESSION['user']['userid'], $berechtigte_benutzer)) OR ($_SESSION['user']['userid'] == $abfrage['erstelltvon'])) {
            $berechtigt = true;
        }


    } else {
        $berechtigt = true;
    }

    if (!$berechtigt) {
        header('location: ./projectdetail.php?projectid='.$_GET['bearbeiten'].'&nb');
        exit();
    } else {
        //Für eine sichere (?) Übertragung der Projekt-ID an das Formular
        $_SESSION['changeproject'] = $_GET['bearbeiten'];
    }

}
else
{
    $seitentitel = 'Projekt erstellen';
}

function val($standartterm, $bearbeitungsterm)
{
    if (isset($_GET['bearbeiten'])) {
        return $bearbeitungsterm;
    } else {
        return $standartterm;
    }
}


?>


<?php
require_once(__DIR__ . '/inc/header.php');
require_once(__DIR__ . '/inc/layout.php');
?>
    <script>
        /*
        Für das Escapen von unsicheren Arrays
         */

        function escapeHTML(unsicher) {
            /*
            unsicher.replace(/&/g,"&amp;");
            unsicher.replace(/</g,"&lt;");
            unsicher.replace(/>/g,"&gt;");
            unsicher.replace(/"/g,"&quot;");
            unsicher.replace(/'/g,"&#039;");*/

            unsicher.replace('\'','\\\'');
            unsicher.replace('\"','\\\"');

            return unsicher;
        }

        function makearraysafe(arrayweiter) {

            for (var i = 0; i < arrayweiter.length; i++) {
                arrayweiter[i] = arrayweiter(quiz[i]);
            }
        }

    </script>

    <!-- page content -->

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><?php echo $seitentitel; ?></h3>
                </div>


            </div>
            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <!-- Smart Wizard -->
                        <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps">
                                <li>
                                    <a href="#step-1">
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                              Schritt 1<br/>
                                              <small>Allgemeine Daten</small>
                                          </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#step-2">
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                              Schritt 2<br/>
                                              <small>Orte festlegen</small>
                                          </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-3">
                                        <span class="step_no">3</span>
                                        <span class="step_descr">
                                              Schritt 3<br/>
                                              <small><?php echo $projectxname; ?>-Einstellungen</small>
                                          </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-4">
                                        <span class="step_no">4</span>
                                        <span class="step_descr">
                                              Schritt 4<br/>
                                              <small>Abschluss</small>
                                          </span>
                                    </a>
                                </li>
                            </ul>
                            <div id="step-1">
                                <?php require_once('./inc/project_step1.php'); ?>
                            </div>
                            <div id="step-2">
                                <?php require_once('./inc/project_step2.php'); ?>
                            </div>
                            <div id="step-3">
                                <?php require_once('./inc/project_step3.php'); ?>

                            </div>
                            <div id="step-4">
                                <?php require_once('./inc/project_step4.php'); ?>
                            </div>

                        </div>
                        <!-- End SmartWizard Content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- Smart Wizard -->
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <script>
        $('#wizard').smartWizard({
            // Properties
            selected: 0,  // Selected Step, 0 = first step
            keyNavigation: false, // Enable/Disable key navigation(left and right keys are used if enabled)
            enableAllSteps: true,  // Enable/Disable all steps on first load
            transitionEffect: 'fade', // Effect on navigation, none/fade/slide/slideleft
            contentURL: null, // specifying content url enables ajax content loading
            contentURLData: null, // override ajax query parameters
            contentCache: true, // cache step contents, if false content is fetched always from ajax url
            cycleSteps: false, // cycle step navigation
            enableFinishButton: false, // makes finish button enabled always
            hideButtonsOnDisabled: false, // when the previous/next/finish buttons are disabled, hide them instead
            errorSteps: [],    // array of step numbers to highlighting as error steps
            labelNext: 'Weiter', // label for Next button
            labelPrevious: 'zurück', // label for Previous button
            labelFinish: 'Fertigstellen',  // label for Finish button
            noForwardJumping: false,
            ajaxType: 'POST',
            // Events
            onLeaveStep: null, // triggers when leaving a step
            onShowStep: function () {
                aktuallisierefin()
            },  // triggers when showing a step
            onFinish: null,  // triggers when Finish button is clicked
            buttonOrder: ['prev', 'next']  // button order, to hide a button remove it from the list
        });

        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');
        $('.su')
        $('.buttonNext').attr("id", "nextbutton");
        /*
        $("#nextbutton").click(function()
        {
           zeigefehler("hallo");
        });
        $(".wizard_steps").click(function()
        {
            zeigefehler("hallo");
        });
        */

    </script>

<?php
require_once(__DIR__ . '/inc/footer.content.php');
?>
<?php
require_once(__DIR__ . '/inc/footer.php');
?>