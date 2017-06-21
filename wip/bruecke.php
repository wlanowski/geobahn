<?php
$seitentitel = 'Brücken';
require_once(__DIR__.'/inc/header.php');

//require für Datenbankverbindungseinstellungen
require_once(__DIR__.'/globalconfig.php');

?>



<!-- Hier Hintergrund soll weiß, wegen Tabelle -->
<style>
body .container.body .right_col {
    background: #FFFFFF;
}
</style>



  <body class="nav-md">
  <?php setlocale(LC_TIME, "de_DE.utf8");?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span><?php echo $projectxname ?></span></a>
            </div>

				<?php require_once(__DIR__.'/inc/layout.php');  ?>


        

        <!-- page content -->
		
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Brücken</h3><br>
			</div>
		<div class="clearfix"></div>
			<div>
			Nach Streckennummer filtern:
			<form action="bruecke.php" method="get">
			<div class="input-group">
                            <input name="strecke" type="number" class="form-control">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Okay</button>
                            </span>
                          </div>
			</form>

		</div>
	
	



	
	
	
	
	<div class="col-md-12 col-sm-12 col-xs-12">
                  <!--
				  <div class="x_title">
                    <h2>Button Example <small>Users</small></h2>
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
				  -->
                    
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Projektname</th>
                          <th>Ort</th>
                        </tr>
                      </thead>


                      <tbody>
					  
						
	<?php
		$pdo = new PDO('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_pass);
		
		if(isset($_GET['strecke'])){
			$sql = "SELECT * FROM ".$db_pref."_bruecke WHERE strecke=".$_GET['strecke'];
		} else
			$sql = "SELECT * FROM ".$db_pref."_bruecke";
		
		
		
		foreach ($pdo->query($sql) as $row) 
		{
			echo "<tr>\n<td>";
			
			echo $row['strecke'];
			echo "</td>\n<td>";
			
			echo $row['laenge'];			
						
						
			echo "</td>\n</tr>";
			
		}
	?>
	</tbody></table>
    </div>
	
	
	
	
	
	
	
	
	
	
	</div>
</div>


<?php require_once(__DIR__.'/inc/footer.content.php'); ?>
<?php require_once(__DIR__.'/inc/footer.php'); ?>