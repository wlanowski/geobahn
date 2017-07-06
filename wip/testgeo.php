<?php
require_once(__DIR__ . '/auth.php');
$seitentitel = 'Plain vorlage';
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

        <br/>
        <br/>

        <?php require_once './inc/project_step2.php'; ?>


    </div>
    </div>


<?php
require_once(__DIR__ . '/inc/footer.content.php');
?>
<?php
require_once(__DIR__ . '/inc/footer.php');
?>