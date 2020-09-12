<?php
require_once(__DIR__ . '/auth.php');
$seitentitel = 'Karte';
require_once(__DIR__ . '/inc/header.php');

// require für Datenbankverbindungseinstellungen

require_once(__DIR__ . '/globalconfig.php');

require_once(__DIR__ . '/inc/layout.php');

    if (isset($_GET['nb'])) {
    echo '<BODY onLoad="zeigefehler(\'Sie haben nur Zugriff auf die eingeschränkten Funktionen ohne Projektbezug!\')">';
}

?>
    <!-- page content -->

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">

            </div>
        </div>


        <!-- style="height: auto; min-height:500px;height:auto !important; height:500px; margin:0" -->
        <div class="col-md-12 col-sm-12 col-xs-12" style="height: 100%; border: 0; margin: 0">
            <div id="mapid"></div>
            <script src="js/leafletmap.js"></script>
            <script src="js/viewportmap.js"></script>
        </div>


    </div>
    </div>


<?php
require_once(__DIR__ . '/inc/footer.content.php');
?>
    </div>
<?php
require_once(__DIR__ . '/inc/footer.php');
?>