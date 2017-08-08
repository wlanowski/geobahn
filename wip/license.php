<?php
require_once(__DIR__ . '/auth.php');
$seitentitel = 'Lizenz';
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


        <div class="x_panel">
            <div class="x_title">
                <h2>Lizenz für Geo-Bahn</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                Diese Software basiert auf Geo-Bahn von John Nitzsche. Geo-Bahn ist freie Software unter der <b>MIT-Lizenz</b>.
                <hr>
                <div class="row">
                    <div class="col-md-6 col-xs-12" style="text-align: justify">


                        <b>Copyright (c) 2017 John Nitzsche</b><br/><br/>

                        Permission is hereby granted, free of charge, to any person obtaining a copy
                        of this software and associated documentation files (the "Software"), to deal
                        in the Software without restriction, including without limitation the rights
                        to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
                        copies of the Software, and to permit persons to whom the Software is
                        furnished to do so, subject to the following conditions:<br/><br/>

                        The above copyright notice and this permission notice shall be included in all
                        copies or substantial portions of the Software.<br/><br/>

                        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
                        IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
                        FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
                        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
                        LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                        OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
                        SOFTWARE.<br/><br/>
                    </div>
                    <div class="col-md-6 col-xs-12" style="text-align: justify">
                        <b>Copyright (c) 2017 John Nitzsche</b><br/><br/>
                        Hiermit wird unentgeltlich jeder Person, die eine Kopie der Software und der zugehörigen
                        Dokumentationen (die "Software") erhält, die Erlaubnis erteilt, sie uneingeschränkt zu nutzen,
                        inklusive und ohne Ausnahme mit dem Recht, sie zu verwenden, zu kopieren, zu verändern,
                        zusammenzufügen, zu veröffentlichen, zu verbreiten, zu unterlizenzieren und/oder zu verkaufen,
                        und Personen, denen diese Software überlassen wird, diese Rechte zu verschaffen, unter den
                        folgenden
                        Bedingungen:<br/><br/>

                        Der obige Urheberrechtsvermerk und dieser Erlaubnisvermerk sind in allen Kopien oder Teilkopien
                        der Software beizulegen.<br/><br/>

                        DIE SOFTWARE WIRD OHNE JEDE AUSDRÜCKLICHE ODER IMPLIZIERTE GARANTIE BEREITGESTELLT,
                        EINSCHLIEẞLICH DER GARANTIE ZUR BENUTZUNG FÜR DEN VORGESEHENEN ODER EINEM BESTIMMTEN ZWECK SOWIE
                        JEGLICHER RECHTSVERLETZUNG, JEDOCH NICHT DARAUF BESCHRÄNKT. IN KEINEM FALL SIND DIE AUTOREN ODER
                        COPYRIGHTINHABER FÜR JEGLICHEN SCHADEN ODER SONSTIGE ANSPRÜCHE HAFTBAR ZU MACHEN, OB INFOLGE DER
                        ERFÜLLUNG EINES VERTRAGES, EINES DELIKTES ODER ANDERS IM ZUSAMMENHANG MIT DER SOFTWARE ODER
                        SONSTIGER VERWENDUNG DER SOFTWARE ENTSTANDEN.<br/><br/>
                    </div>
                </div>
                <hr/>
            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>Anderweitig verwendete Software und Daten</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <h3>Gentellela</h3>
                        <ul>
                            <li>Gentella (MIT)</li>
                            <li>Bootstrap</li>
                            <li>Font Awesome</li>
                            <li>jQuery-Autocomplete</li>
                            <li>FullCalendar</li>
                            <li>Charts.js</li>
                            <li>Bootstrap Colorpicker</li>
                            <li>Cropper</li>
                            <li>dataTables</li>
                            <li>Date Range Picker for Bootstrap</li>
                            <li>Dropzone</li>
                            <li>easyPieChart</li>
                            <li>ECharts</li>
                            <li>bootstrap-wysiwyg</li>
                            <li>Flot - Javascript plotting library for jQuery.</li>
                            <li>gauge.js</li>
                            <li>iCheck</li>
                            <li>jquery.inputmask plugin</li>
                            <li>Ion.RangeSlider</li>
                            <li>jQuery</li>
                            <li>jVectorMap</li>
                            <li>moment.js</li>
                            <li>Morris.js - pretty time-series line graphs</li>
                            <li>PNotify - Awesome JavaScript notifications</li>
                            <li>NProgress</li>
                            <li>Pace</li>
                            <li>Parsley</li>
                            <li>bootstrap-progressbar</li>
                            <li>select2</li>
                            <li>Sidebar Transitions - simple off-canvas navigations</li>
                            <li>Skycons - canvas based wather icons</li>
                            <li>jQuery Sparklines plugin</li>
                            <li>switchery - Turns HTML checkbox inputs into beautiful iOS style switches</li>
                            <li>jQuery Tags Input Plugin</li>
                            <li>Autosize - resizes text area to fit text</li>
                            <li>validator - HTML from validator using jQuery</li>
                            <li>jQuery Smart Wizard</li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <h3>Leaflet</h3>
                        <ul>
                            <li>Leaflet</li>
                            <li>Font Awesome</li>
                            <li>leaflet-ajax</li>
                            <li>leaflet-awesomemarkers</li>
                            <li>leaflet-glc</li>
                            <li>leaflet-locationpicker</li>
                            <li>leaflet-markercluster</li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <h3>Sonstige Software/Quellen</h3>
                        <ul>
                            <li><a href="https://andylangton.co.uk/blog/development/get-viewportwindow-size-width-and-height-javascript"><i class='fa fa-external-link'></i> Andy Langton</a></li>
                            <li><a href="http://www.knothemedia.de/iframe-responsive-gestalten.html"><i class='fa fa-external-link'></i> Knothemedia</a></li>
                            <li><a href="https://kau-boys.de/643/webentwicklung/arrays-und-andere-komplexe-daten-mit-php-in-einer-mysql-datenbank-speichern"><i class='fa fa-external-link'></i> Kau-Boys.de</a></li>
                            <li><a href="https://github.com/bmcbride/PHP-Database-GeoJSON"><i class='fa fa-external-link'></i> PHP-Database-GeoJSON von bmcbride</a></li>
                        </ul>
                        <h3>Daten</h3>
                        <ul>
                            <li>Geodaten der DB-Netz-AG: <a href="http://data.deutschebahn.com/dataset?groups=datasets&tags=Geo"><i class='fa fa-external-link'></i> Link</a> veröffentlicht unter <a href="https://creativecommons.org/licenses/by/4.0/legalcode.de"><i class='fa fa-external-link'></i> CC-BY 4.0</a></li>
                        </ul>
                    </div>
                </div>
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