<?php
$seitentitel = 'Exceltabellen';
require_once(__DIR__ . '/inc/header.php');

// require für Datenbankverbindungseinstellungen

require_once(__DIR__ . '/globalconfig.php');
require_once(__DIR__ . '/auth.php');

require_once(__DIR__ . '/inc/layout.php');
?>


    <!-- page content -->

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Unbearbeitete Exceltabellen</h3><br/>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div>
            Die von der DB Netz AG veröffentlichten Geodaten beinhalten auch Exceltabellen. Diese können hier
            unbearbeitet heruntergeladen werden. Die Exceltabellen geben teilweise nur einen Auszug der Informationen
            wieder.

            <h4>Bahnübergänge</h4>
            <a class="btn btn-success" href="../geodata/geliefert/geo-bahnuebergang/bahnuebergaenge.xlsx"><i
                        class="fa fa-file-excel-o"></i> Excel</a>
            <a class="btn btn-primary"
               href="../geodata/geliefert/geo-bahnuebergang/Datenstruktur_Bahnuebergaenge_Excel.pdf"><i
                        class="fa fa-file-pdf-o"></i> Datenstruktur</a>
            <br/>

            <h4>Betriebsstellen</h4>
            <a class="btn btn-success" href="../geodata/geliefert/geo-betriebsstelle/betriebsstellen.xlsx"><i
                        class="fa fa-file-excel-o"></i> Excel</a>
            <a class="btn btn-primary"
               href="../geodata/geliefert/geo-betriebsstelle/Datenstruktur_Betriebsstellen_Excel.pdf"><i
                        class="fa fa-file-pdf-o"></i> Datenstruktur</a>
            <br/>

            <h4>Brücken</h4>
            In der Originalversion nur punktuelle Informationen bestimmter Bauwerke in der Excel-Tabelle<br/>
            <a class="btn btn-success" href="../geodata/geliefert/geo-bruecken/bruecken.xlsx"><i
                        class="fa fa-file-excel-o"></i> Excel</a>
            <a class="btn btn-primary" href="../geodata/geliefert/geo-bruecken/Datenstruktur_Bruecken_Excel.pdf"><i
                        class="fa fa-file-pdf-o"></i> Datenstruktur</a>
            <br/>

            <h4>Strecken</h4>
            <a class="btn btn-success" href="../geodata/geliefert/geo-strecke/strecken.xlsx"><i
                        class="fa fa-file-excel-o"></i> Excel</a>
            <a class="btn btn-primary" href="../geodata/geliefert/geo-strecke/Datenstruktur_Strecken_Excel.pdf"><i
                        class="fa fa-file-pdf-o"></i> Datenstruktur</a>
            <br/>

            <div class="clearfix"></div>

            <br/>
            <h3>Bearbeitete und konvertierte Geodaten</h3>


            <h4>Tunnel</h4>
            Zu den Tunneln wurden keine Exceltabellen veröffentlicht. Mit Hilfe von OpenOffice und Microsoft Excel wurde
            die im dBASE-Format gelieferte Datenbank zu Excel konvertiert.<br/>
            <a class="btn btn-success" href="../geodata/konvertiert/tunnel/tunnel_polyline.xlsx"><i
                        class="fa fa-file-excel-o"></i> Excel</a>

            <h4>SQL-Dateien</h4>
            Zur Auswertung der Geodaten wurden diese in eine MySQL-Datenbank überführt. Die exportierten Datenbanken
            stehen hier als SQL-Dateien zur Verfügung.<br/>
            <a class="btn btn-success" href="../geodata/sql/geodataonly.sql"><i class="fa fa-file-code-o"></i>
                SQL</a><br/>

            <h4>Kilometer und weitere Formate</h4>
            Auf eine Bearbeitung der Kilometerdaten wurde verzichtet. Weitere Formate können auf Anfrage erstellt und
            geschickt werden.


        </div>


    </div>


<?php
require_once(__DIR__ . '/inc/footer.content.php');
?>
<?php
require_once(__DIR__ . '/inc/footer.php');
?>