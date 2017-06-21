<?php
 require_once('globalconfig.php');
 ?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php
		echo $seitentitel;
		echo ' | ';
		echo $projectxname;?>
	</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">
	
	 <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
	
	
	
	<!-- Tabellen -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

	
	<!--<link href="css/map.css" rel="stylesheet"> -->
	
	
	<!-- Jetzt beginnt alles was für die Map ist -->
	<?php
		if (basename($_SERVER['SCRIPT_NAME']) == 'map.php')
		{ echo'
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta charset="UTF-8">

				<title>Testseite für Leaflet</title>

				<!-- Stylesheets und Skripte im Header -->

				<!-- <script>L_PREFER_CANVAS =true;</script>"  -->
				<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin="" />

				<link rel="stylesheet" href="css/testmap.css">

				<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js" integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg==" crossorigin=""></script>


				<!-- Leaflet GLC -->
				<link rel="stylesheet" href="src/leaflet-glc/leaflet.groupedlayercontrol.min.css">
				<script src="src/leaflet-glc/leaflet.groupedlayercontrol.min.js"></script>

				<!-- Leaflet-ajax -->
				<script src="src/leaflet-ajax/leaflet-ajax.min.js"></script>

				<!-- Leaflet-markercluster -->
				<link rel="stylesheet" href="src/leaflet-markercluster/MarkerCluster.css">
				<link rel="stylesheet" href="src/leaflet-markercluster/MarkerCluster.Default.css">
				<script src="src/leaflet-markercluster/leaflet.markercluster.js"></script>

				<!-- Jquery -->
				<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

				<!-- font-awesome -->
				<link rel="stylesheet" href="src/font-awesome-4.7.0/css/font-awesome.min.css">
				
				<!-- awesome-markers -->
				<link rel="stylesheet" href="src/leaflet-awesomemarkers/leaflet.awesome-markers.css">
				<script src="src/leaflet-awesomemarkers/leaflet.awesome-markers.js"></script> <meta name="viewport" content="width=device-width, initial-scale=1">
				<meta charset="UTF-8">

				<title>Testseite für Leaflet</title>

				<!-- Stylesheets und Skripte im Header -->

				<!-- <script>L_PREFER_CANVAS =true;</script>"  -->
				<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin="" />

				<link rel="stylesheet" href="css/testmap.css">

				<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js" integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg==" crossorigin=""></script>


				<!-- Leaflet GLC -->
				<link rel="stylesheet" href="src/leaflet-glc/leaflet.groupedlayercontrol.min.css">
				<script src="src/leaflet-glc/leaflet.groupedlayercontrol.min.js"></script>

				<!-- Leaflet-ajax -->
				<script src="src/leaflet-ajax/leaflet-ajax.min.js"></script>

				<!-- Leaflet-markercluster -->
				<link rel="stylesheet" href="src/leaflet-markercluster/MarkerCluster.css">
				<link rel="stylesheet" href="src/leaflet-markercluster/MarkerCluster.Default.css">
				<script src="src/leaflet-markercluster/leaflet.markercluster.js"></script>

				<!-- Jquery -->
				<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

				<!-- font-awesome -->
				<link rel="stylesheet" href="src/font-awesome-4.7.0/css/font-awesome.min.css">
				
				<!-- awesome-markers -->
				<link rel="stylesheet" href="src/leaflet-awesomemarkers/leaflet.awesome-markers.css">
				<script src="src/leaflet-awesomemarkers/leaflet.awesome-markers.js"></script>
		';}
	?>
	
	
	
	
	



  </head>

