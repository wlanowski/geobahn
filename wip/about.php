<?php
require_once(__DIR__ . '/auth.php');
$seitentitel = 'Über';
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
            <div class="x_title">
                <h2>Wo kann ich mehr erfahren?</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                Es gibt Bewegungen, das Projekt praxistauglich zu machen.
                Informationen: <a href="https://kreativworkshop.tk">kreativworkshop.tk</a>
            </div>
        </div>


        <div class="x_panel">
            <div class="x_title">
                <h2>Was ist das hier?</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                Die hier vorgestellte Software ist Hauptbestandteil meiner wissenschaftlichen Arbeit (T2000). Sie soll
                als unterstützendes Werkzeug in der Projektdokumentation und im Projektmanagement in der Bahnbranche dienen.
            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>Wie soll das funktionieren?</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                Man kann über ein Formular Projekte erstellen und dabei wichtige Punkte zu diesem Projekt auf einer Karte
                eintragen. Auf diese Karte hat jeder Zugang, der Zugangsdaten zu diesem System hat. So kann jeder
                Benutzer sehen, wo gerade welches Projekt läuft, wie sein Status ist, und wen man im Zweifelsfall fragen
                kann. Damit soll Schluss sein, mit redundanten Projekten und dem "Wow, du arbeitest ja am selben Standort
                wie ich"-Effekt am Mittagstisch
            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>Wie hast du das gemacht?</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                Schaus dir einfach an! Der Quellcode für diese Seite ist unter der MIT-Lizenz frei verfügbar. Gerne kannst du
                die Software auch deinen Bedürfnissen anpassen. Beachte dabei stets die Lizenzen unter denen beispielsweise
                die Geodaten der DB Netz AG freigegeben sind.
            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>Was wird in nächster Zeit kommen?</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                Ob die Software nach meiner Verteidigung noch weiter entwickelt wird steht in den Sternen. Sollte es so
                kommen ist die Performanceverbesserung der Karte, sowie die Einbindung der Projekte und einer Streckenkarte
                in den Inspektor wichtige Punkte auf der Roadmap. Solltest du Ideen oder Featurewünsche haben, kannst du mir
                das sehr gerne mitteilen.
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