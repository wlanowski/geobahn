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


       INHALTE



    </div>
    </div>

<?php
require_once(__DIR__ . '/inc/footer.content.php');
?>

    </div>

<?php
require_once(__DIR__ . '/inc/footer.php');
?>