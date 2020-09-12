<?php
require_once(__DIR__ . '/auth.php');
$seitentitel = 'Impressum';
require_once(__DIR__ . '/inc/header.php');

// require für Datenbankverbindungseinstellungen

require_once(__DIR__ . '/globalconfig.php');
$seitentitel .= ' ' . $projectxname;


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


        <div class="x_panel">
            <div class="x_content">
                John Nitzsche<br>
                Obertorplatz 1<br>
                01744 Dippoldiswalde<br>
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