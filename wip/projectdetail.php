<?php
require_once(__DIR__ . '/auth.php');
$seitentitel = 'Projektübersicht';

if (!isset($_GET['projectid'])) {
    header('Location: projects.php?nos');
}


require_once(__DIR__ . '/inc/header.php');

// require für Datenbankverbindungseinstellungen

require_once(__DIR__ . '/globalconfig.php');


require_once(__DIR__ . '/inc/layout.php');

?>
<!-- page content -->

<div class="right_col" role="main" style="background-color:#FFFFFF;">


    <?php

    if (isset($_GET['c'])) {
        echo '<BODY onLoad="zeigeerfolg(\'Projekt wurde erfolgreich erstellt.\')">';
    }

    if (isset($_GET['g'])) {
        echo '<BODY onLoad="zeigeerfolg(\'Projekt erfolgreich aktuallisiert.\')">';
    }

    if (!isset($_GET['projectid'])) {
        echo '<BODY onLoad="zeigefehler(\'Bitte Projekt in der Projektübersicht wählen!\')">';
    } else {


    // Frage Projektinfos aus Datenbank ab
    $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
    $pdo->exec("set names utf8");

    $sqlprojekte = "SELECT * FROM " . $db_pref . "_projekte WHERE id= :u_id LIMIT 1";
    $abfrage = $pdo->prepare($sqlprojekte);

    $abfrage->bindParam('u_id', $_GET['projectid']);

    $abfrage->execute();

    $projectinfo = $abfrage->fetch();

    // Frage Benutzerinformationen ab ANSPRECHPARTNER
    $sqlansprechpartner = "SELECT * FROM " . $db_pref . "_users WHERE username= :u_an LIMIT 1";
    $abfragean = $pdo->prepare($sqlansprechpartner);
    $abfragean->bindParam('u_an', $projectinfo['ansprechpartner']);
    $abfragean->execute();

    $ansprechpartnerinfo = $abfragean->fetch();

    // Frage Benutzerinformationen ab ERSTELLT VON
    $sqlerstellt = "SELECT * FROM " . $db_pref . "_users WHERE username= :u_an LIMIT 1";
    $abfrageerstellt = $pdo->prepare($sqlerstellt);
    $abfrageerstellt->bindParam('u_an', $projectinfo['erstelltvon']);
    $abfrageerstellt->execute();

    $erstelltinfo = $abfrageerstellt->fetch();

    // Frage Benutzerinformationen ab geändert
    $sqlge = "SELECT * FROM " . $db_pref . "_users WHERE username= :u_an LIMIT 1";
    $abfragege = $pdo->prepare($sqlge);
    $abfragege->bindParam('u_an', $projectinfo['gändertvon']);
    $abfragege->execute();

    $geändertinfo = $abfragege->fetch();


    /*
    echo '<div class=""><div class="page-title"><div class=""><h3>';
    echo $projectinfo ['projektname'];
    echo '</h3><br /></div></div></div> ';
    */


    /* Start und Enddaten vorher auswerten durch neue funktion */
    function datumpruefen($datum)
    {
        if ($datum == NULL) {
            $r = "n. def.";
        } else {
            $date = new DateTime($datum);
            $r = $date->format('d.m.Y');
        }
        return $r;
    }

    // Für Erstell- und Änderungsdaten brauchen wir die Uhrzeit
    function datumpruefenuhr($datum)
    {
        if ($datum == NULL) {
            $r = "n. def.";
        } else {
            $date = new DateTime($datum);
            $r = $date->format('d.m.Y H:i:s');
        }
        return $r;
    }


    // Auswertung des Projektstatus

    switch ($projectinfo['status']) {
        case 0: {
            $status_text = "in Bearbeitung";
            $status_class = "info";
            break;
        }
        case 1: {
            $status_text = "abgeschlossen";
            $status_class = "success";
            break;
        }
        case 2: {
            $status_text = "verzögert";
            $status_class = "warning";
            break;
        }
        case 3: {
            $status_text = "Es gibt Probleme/Projekt pausiert";
            $status_class = "danger";
            break;
        }
        default: {
            $status_text = "nicht definiert";
            $status_class = "primary";
        }
    }


    echo '
		<div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>' . $projectinfo ['projektname'] . '</h3>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="col-md-7 col-sm-7 col-xs-12">

                      <ul class="stats-overview">
                        <li>
                          <span class="name"> Startdatum </span>
                          <span class="value text-success"> ' . datumpruefen($projectinfo['start']) . ' </span>
                        </li>
                        <li>
                          <span class="name"> Enddatum </span>
                          <span class="value text-success"> ' . datumpruefen($projectinfo['ende']) . ' </span>
                        </li>
                        <li>
                          <span class="name"> Aktueller Status </span><br />
                          <span class="label label-' . $status_class . '"> ' . $status_text . ' </span>
                        </li>
                      </ul>
                      <br />

                      <div id="mainb" style="height: 30em; overflow: auto;"><p> ' . nl2br($projectinfo['zusatz']) . '
          
					  </p></div>
					  
					  
					    <!--
                      <div> 

                        <h4>Verlauf</h4>

                        
                        <ul class="messages">
                          <li>
                            <img src="images/img.jpg" class="avatar" alt="Avatar">
                            <div class="message_date">
                              <h3 class="date text-info">24</h3>
                              <p class="month">May</p>
                            </div>
                            <div class="message_wrapper">
                              <h4 class="heading">Desmond Davison</h4>
                              <blockquote class="message">Raw denim you probably haven\'t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                              <br />
                              <p class="url">
                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                              </p>
                            </div>
                          </li>
                          <li>
                            <img src="images/img.jpg" class="avatar" alt="Avatar">
                            <div class="message_date">
                              <h3 class="date text-error">21</h3>
                              <p class="month">May</p>
                            </div>
                            <div class="message_wrapper">
                              <h4 class="heading">Brian Michaels</h4>
                              <blockquote class="message">Raw denim you probably haven\'t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                              <br />
                              <p class="url">
                                <span class="fs1" aria-hidden="true" data-icon=""></span>
                                <a href="#" data-original-title="">Download</a>
                              </p>
                            </div>
                          </li>
                          <li>
                            <img src="images/img.jpg" class="avatar" alt="Avatar">
                            <div class="message_date">
                              <h3 class="date text-info">24</h3>
                              <p class="month">May</p>
                            </div>
                            <div class="message_wrapper">
                              <h4 class="heading">Desmond Davison</h4>
                              <blockquote class="message">Raw denim you probably haven\'t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                              <br />
                              <p class="url">
                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                              </p>
                            </div>
                          </li>
                        </ul>
                        


                      </div>--> 


                    </div>

                    <!-- start project-detail sidebar -->
                    <div class="col-md-5 col-sm-5 col-xs-12">

                      <section class="panel">





                        <div class="x_title">
                          <h2>Projektdaten</h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="panel-body" >
                          
						  
<div id="mapid" style="height: 25em; position: relative; outline: none;"></div>


						<br />

                          <div class="project_detail">

                            <p class="title">Ansprechpartner</p>
                            <p><a href=user.php?username=' . $projectinfo['ansprechpartner'] . '><i class="fa fa-external-link"></i> ' . $ansprechpartnerinfo ['nameclear'] . '</a></p>
                            <!--
                            <p class="title">Project Leader</p>
                            <p>Tony Chicken</p>
                            -->
                          </div>

<!--
                          <br />
                          <h5>Project files</h5>
                          <ul class="list-unstyled project_files">
                            <li><a href=""><i class="fa fa-file-word-o"></i> Functional-requirements.docx</a>
                            </li>
                            <li><a href=""><i class="fa fa-file-pdf-o"></i> UAT.pdf</a>
                            </li>
                            <li><a href=""><i class="fa fa-mail-forward"></i> Email-from-flatbal.mln</a>
                            </li>
                            <li><a href=""><i class="fa fa-picture-o"></i> Logo.png</a>
                            </li>
                            <li><a href=""><i class="fa fa-file-word-o"></i> Contract-10_12_2014.docx</a>
                            </li>
                          </ul>
                          <br />
-->

                          <div class="text-center mtop20">
                            <a href="mailto:' . $ansprechpartnerinfo['mail'] . '" class="btn btn-sm btn-success"><i class="fa fa-envelope"></i> Mail</a>
                            <a target="_tab" href="https://evi.intranet.deutschebahn.com/evi31/simpleSearchAction.do?filter=' . $projectinfo['ansprechpartner'] . '" class="btn btn-sm btn-primary"><i class="fa fa-phone"></i> EVI</a>
                          </div>
		  
						  
						  
                        </div>
							
							<div class="project_detail" style="margin-left: 1em;">
							<small>
							<p class="title">Projekt angelegt von Benutzer</p>
							<p><a href="user.php?userid=' . $projectinfo['erstelltvon'] . '"><i class="fa fa-external-link"></i> ' . $erstelltinfo['username'] . '</a> am ' . datumpruefenuhr($projectinfo['erstellt']) . '</p>
							';

    if ($projectinfo['geändertvon']!="")
{ echo '
                        <p class="title">Projekt zuletzt geändert von Benutzer</p>
                        <p><a href = "user.php?userid=' . $projectinfo['geändertvon'] . '"><i class="fa fa-external-link" ></i> ' . $geändertinfo['username'] . ' </a> am ' . datumpruefenuhr($projectinfo['geändert']) . ' </p>
							 ';}
        echo '</small>
							</div >
						  
                      </section >

                    </div >
                    <!--end project - detail sidebar-->

                  </div >
                </div >
              </div >
            </div >
          
        <!-- /page content-->';
        }
        ?>

    </div>
</div>
</div>


<?php
require_once(__DIR__ . '/inc/footer.content.php');
require_once(__DIR__ . '/inc/footer.php');
?>


<script>


    var base_TPM = L.tileLayer('https://{s}.tile.thunderforest.com/transport/{z}/{x}/{y}.png?apikey=<?php echo $tf_apikey;?>', {
            attribution: '\'Maps © <a href=\'http://www.thunderforest.com\'>Thunderforest</a>, Data © <a href =\'http://www.openstreetmap.org/copyright\'>OpenStreetMap contributors</a>'
        })
    ;

    // Start Layer aus Projekte-Datenbank


    var parts = window.location.search.substr(1).split("&");
    var $_GET = {};
    for (var i = 0; i < parts.length; i++) {
        var temp = parts[i].split("=");
        $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
    }

    var geourl = 'func/projecttogeo.php' + window.location.search;

    //console.log(geourl);

    var geojsonLayer_projekte = L.markerClusterGroup();

    //Pfad eventuell anpassen, gerade auf Repository angepasst
    $.getJSON(geourl, function (data) {
        var geojson_projekte = L.geoJson(data, {
            onEachFeature: function (feature, layer) {

                // USE A CUSTOM MARKER
                //layer.setIcon(L.mapbox.marker.icon({'marker-symbol': 'circle-stroked', 'marker-color': '59245f'}));
                layer.setIcon(L.AwesomeMarkers.icon({
                    icon: 'tasks',
                    prefix: 'fa',
                    markerColor: 'blue',
                    iconColor: 'white'
                }));

                // ADD A POPUP WITH A CHART
                layer.bindPopup("<b>feature.properties.ortsname" + "</b></br>Strecke: " + feature.properties.strecke + "(Bkm:" +
                    feature.properties.bkm + ")");


            }
        });
        // geojsonLayer_projekte.addLayer(geojson_projekte);
        geojson_projekte.addTo(mymap);
        mymap.fitBounds(geojson_projekte.getBounds());
    });


    // LayerGroups
    var mymap = L.map('mapid', {
        center: [51.679, 9.866],
        zoom: 6,
        layers: [base_TPM, geojsonLayer_projekte]
    });


    //mymap.fitBounds(geojsonLayer_projekte.getBounds());
    //console.log(geojsonLayer_projekte.getBounds());

</script>
