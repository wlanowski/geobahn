<?php
require_once(__DIR__.'/auth.php');
$seitentitel = 'Details';
require_once (__DIR__ . '/inc/header.php');

// require für Datenbankverbindungseinstellungen

require_once (__DIR__ . '/globalconfig.php');


?>






  <body class="nav-md">
  <!-- Body wird in footer geschlossen, in Footer wird nur Body und HTML geschlossen -->
  <!-- Hier Hintergrund soll weiß, wegen Tabelle -->

  <?php
setlocale(LC_TIME, "de_DE.utf8"); ?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span><?php
echo $projectxname ?></span></a>
            </div>

				<?php
require_once (__DIR__ . '/inc/layout.php');
 ?>



        

        <!-- page content -->
		
<div class="right_col" role="main" style="background-color:#FFFFFF;">
	

		
			
	
	<?php

if (!isset($_GET['projectid']))
	{
	    echo '<BODY onLoad="zeigefehler(\'Bitte Projekt in der Projektübersicht wählen!\')">';
	} else {
		
		
		
		$pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
		$pdo->exec("set names utf8");
		
		$sql = "SELECT * FROM " . $db_pref . "_projekte WHERE id=" . $_GET['projectid']." LIMIT 1";
		
		$projectinfo = $pdo->query($sql)->fetch();
		
		
		echo '<div class=""><div class="page-title"><div class=""><h3>';
		echo $projectinfo ['projektname'];
		echo '</h3><br /></div></div></div> ';
		//echo '<div class="row">';

		/*
		Für große Geräte soll die Verteilung 50/50 sein, links text, rechts karte.  --> col-sm-6 x2
		Für kleine Geräte soll die Verteilung untereinander sein  --> col-xs-12 x2
		*/
		
		// Linke Spalte, falls vorh. (nicht xs)
		//echo '<div class="col-sm-6 col-xs-12">';
		
		echo '
		<div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>New Partner Contracts Consultancy</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <ul class="stats-overview">
                        <li>
                          <span class="name"> Estimated budget </span>
                          <span class="value text-success"> 2300 </span>
                        </li>
                        <li>
                          <span class="name"> Total amount spent </span>
                          <span class="value text-success"> 2000 </span>
                        </li>
                        <li class="hidden-phone">
                          <span class="name"> Estimated project duration </span>
                          <span class="value text-success"> 20 </span>
                        </li>
                      </ul>
                      <br />

                      <div id="mainb" style="height:350px;"></div>

                      <div>

                        <h4>Recent Activity</h4>

                        <!-- end of user messages -->
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
                        <!-- end of user messages -->


                      </div>


                    </div>

                    <!-- start project-detail sidebar -->
                    <div class="col-md-3 col-sm-3 col-xs-12">

                      <section class="panel">


/*
Hier bin ich am Freitag 230617 stehen geblieben
*/




                        <div class="x_title">
                          <h2>Project Description</h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                          <h3 class="green"><i class="fa fa-paint-brush"></i> Gentelella</h3>
<div id="mapid" style="height: 250px; float: left;" class="clearfix"></div>
<script src="js/leafletmap-projectonly.js"></script>
<script> mymap.setView(new L.LatLng('.$projectinfo ['ort_geo_lat'].','.$projectinfo['ort_geo_lon'].'),15);</script>




                          <p>Raw denim TESTETESTE probably haven\'t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
                          <br />

                          <div class="project_detail">

                            <p class="title">Client Company</p>
                            <p>Deveint Inc</p>
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
                            <a href="#" class="btn btn-sm btn-primary">Add files</a>
                            <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                          </div>
                        </div>

                      </section>

                    </div>
                    <!-- end project-detail sidebar -->

                  </div>
                </div>
              </div>
            </div>
          
        <!-- /page content -->';

		














		
/*
		echo'</div>'; // col-sm-6 col-xs-12

		
		// Rechte Spalte, falls vorh. (nicht xs)
		echo '<div class="col-sm-6 col-xs-12">';
		echo '<div id="mapid" style="height: 5px"></div>';
		echo '<script src="js/leafletmap-projectonly.js"></script>';
		echo '<script> mymap.setView(new L.LatLng('.$projectinfo ['ort_geo_lat'].','.$projectinfo['ort_geo_lon'].'),15);</script>';
		echo '</div>';
		echo '</div>'; // class="row"
*/
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}











?>
   
    </div>
	<div class="clearfix"></div>
	<div class="clearfix"></div>
	<div class="clearfix"></div>
	<div class="clearfix"></div>
	<div class="clearfix"></div>
	<div class="clearfix"></div>
	<div class="clearfix"></div>
	<div class="clearfix"></div>
	
	
	
	
	
	
	
	
	

	</div>
	</div>




<?php
require_once (__DIR__ . '/inc/footer.content.php');
 ?>
<?php
require_once (__DIR__ . '/inc/footer.php');
 ?>