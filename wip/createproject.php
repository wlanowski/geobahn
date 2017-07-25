<?php
require_once(__DIR__ . '/auth.php');
$seitentitel = 'Projekterstellung';
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
            onShowStep: null,  // triggers when showing a step
            onFinish: null,  // triggers when Finish button is clicked
            buttonOrder: ['prev', 'next', 'finish']  // button order, to hide a button remove it from the list
        });

        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');
    </script>

<?php
require_once(__DIR__ . '/inc/footer.content.php');
?>
<?php
require_once(__DIR__ . '/inc/footer.php');
?>