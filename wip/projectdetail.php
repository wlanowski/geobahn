<?php
require_once(__DIR__.'/auth.php');
$seitentitel = 'Projektübersicht';
require_once (__DIR__ . '/inc/header.php');

// require für Datenbankverbindungseinstellungen

require_once (__DIR__ . '/globalconfig.php');


require_once (__DIR__ . '/inc/layout.php');

?>









        

        <!-- page content -->
		
<div class="right_col" role="main" style="background-color:#FFFFFF;">
	

		
			
	
	<?php

if (!isset($_GET['projectid']))
	{
	    echo '<BODY onLoad="zeigefehler(\'Bitte Projekt in der Projektübersicht wählen!\')">';
	} else {
		
		
		// Frage Projektinfos aus Datenbank ab
		$pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
		$pdo->exec("set names utf8");
		
		$sqlprojekte = "SELECT * FROM " . $db_pref . "_projekte WHERE id=" . $_GET['projectid']." LIMIT 1";
				
		$projectinfo = $pdo->query($sqlprojekte)->fetch();
		
		// Frage Benutzerinformationen ab
		$sqlansprechpartner = "SELECT * FROM " . $db_pref . "_users WHERE username='" . $projectinfo['ansprechpartner']. "'	LIMIT 1";
		$ansprechpartnerinfo = $pdo ->query($sqlansprechpartner)->fetch();
		
		/*
		echo '<div class=""><div class="page-title"><div class=""><h3>';
		echo $projectinfo ['projektname'];
		echo '</h3><br /></div></div></div> ';
		*/
		
		
		
		/* Start und Enddaten vorher auswerten durch neue funktion */
		function datumpruefen($datum)
		{
			if ($datum == NULL)
			{
				$r="n. def.";
			}else{
				$date = new DateTime($datum);
				$r= $date->format('d.m.Y');
			}
			return $r;			
		}
		
		// Für Erstell- und Änderungsdaten brauchen wir die Uhrzeit
		function datumpruefenuhr($datum)
		{
			if ($datum == NULL)
			{
				$r="n. def.";
			}else{
				$date = new DateTime($datum);
				$r= $date->format('d.m.Y H:i:s');
			}
			return $r;			
		}
		
		
		
		
		// Auswertung des Projektstatus
		
		switch ($projectinfo['status'])
		{
			case 0: {$status_text = "in Bearbeitung"; $status_class="info"; break;}
			case 1: {$status_text = "abgeschlossen"; $status_class="success"; break;}
			case 2: {$status_text = "verzögert"; $status_class="warning"; break;}
			case 3: {$status_text = "Es gibt Probleme/Projekt pausiert"; $status_class="danger"; break;}
			default: {$status_text = "nicht definiert"; $status_class="primary"; }
		}
		
		
		

		
		echo '
		<div class="row">
              <div class="col-md-12">
                <!--<div class="x_panel">-->
                  <div class="x_title">
                    <h3>'.$projectinfo ['projektname'].'</h3>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <ul class="stats-overview">
                        <li>
                          <span class="name"> Startdatum </span>
                          <span class="value text-success"> '.datumpruefen($projectinfo['start']).' </span>
                        </li>
                        <li>
                          <span class="name"> Enddatum </span>
                          <span class="value text-success"> '.datumpruefen($projectinfo['ende']).' </span>
                        </li>
                        <li>
                          <span class="name"> Aktueller Status </span><br />
                          <span class="label label-'.$status_class.'"> '.$status_text.' </span>
                        </li>
                      </ul>
                      <br />

                      <div id="mainb" style="height:350px;"><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
					  </p></div>
					  
					  
					
                     <!-- <div> 

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
                        


                      </div>  -->


                    </div>

                    <!-- start project-detail sidebar -->
                    <div class="col-md-3 col-sm-3 col-xs-12">

                      <section class="panel">





                        <div class="x_title">
                          <h2>Projektdaten</h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="panel-body" >
                          
						  
<div id="mapid" style="height: 25em; position: relative; outline: none;"></div>
<script src="js/leafletmap-projectonly.js"></script>
<script> mymap.setView(new L.LatLng('.$projectinfo ['ort_geo_lat'].','.$projectinfo['ort_geo_lon'].'),15);</script>
						<br />

                          <div class="project_detail">

                            <p class="title">Ansprechpartner</p>
                            <p><a href=user.php?username='.$projectinfo['ansprechpartner'].'><i class="fa fa-external-link"></i> '.$ansprechpartnerinfo ['nameclear'].'</p>
                            <p class="title">Project Leader</p>
                            <p>Tony Chicken</p>
                          </div>

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

                          <div class="text-center mtop20">
                            <a href="mailto:'.$ansprechpartnerinfo['mail'].'" class="btn btn-sm btn-success"><i class="fa fa-envelope"></i> Mail</a>
                            <a target="_tab" href="https://evi.intranet.deutschebahn.com/evi31/simpleSearchAction.do?filter='.$projectinfo['ansprechpartner'].'" class="btn btn-sm btn-primary"><i class="fa fa-phone"></i> EVI</a>
                          </div>
						  
						  
						  
                        </div>
							
							<div class="project_detail">
							<small>
							<p class="title">Projekt angelegt von Benutzer</p>
							<p><a href="user.php?username='.$projectinfo['erstelltvon'].'"><i class="fa fa-external-link"></i> '.$projectinfo['erstelltvon'].' am '.datumpruefenuhr($projectinfo['erstellt']).'</a></p>
							<p class="title">Projekt zuletzt geändert von Benutzer</p>
							<p><a href="user.php?username='.$projectinfo['geändertvon'].'"><i class="fa fa-external-link"></i> '.$projectinfo['geändertvon'].' am '.datumpruefenuhr($projectinfo['geändert']).'</a></p>
							</small>
							</div>
						  
                      </section>

                    </div>
                    <!-- end project-detail sidebar -->

                  </div>
                <!--</div>-->
              </div>
            </div>
          
        <!-- /page content -->';
	}
?>
   
    </div>
	</div>
	</div>




<?php
require_once (__DIR__ . '/inc/footer.content.php');
 ?>
<?php
require_once (__DIR__ . '/inc/footer.php');
 ?>