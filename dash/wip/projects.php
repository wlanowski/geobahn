<?php
$seitentitel = 'Projektübersicht';
require_once(__DIR__.'/inc/header.php');

//require für Datenbankverbindungseinstellungen
require_once(__DIR__.'/globalconfig.php');




require_once(__DIR__.'/auth.php');

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
				<h3>Projektübersicht</h3>
			</div>
		</div>
	
	
	<div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>TODO!</strong> Tasten von englisch ins Deutsche übersetzen! (06.06.17)
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
                          <th>Ansprechpartner</th>
						  <th>Angelegt</th>
                        </tr>
                      </thead>


                      <tbody>
					  
						
	<?php
		$pdo = new PDO('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_pass);

		$sql = "SELECT * FROM ".$db_pref."_projekte";
		foreach ($pdo->query($sql) as $row) 
		{
			echo "<tr>\n<td>";
			
			echo $row['projektname'];
			echo "</td>\n<td>";
			
			echo $row['ort'];			
			echo "</td>\n<td>";
			
			$sqlname = "SELECT nameclear FROM ".$db_pref."_users WHERE username='".$row['ansprechpartner']."'";
			$stmt = $pdo->query($sqlname);
			$rowname = $stmt->fetchObject();
			echo "<a href =user.php?username=".$row['ansprechpartner'].">".$rowname->nameclear."  <i class='fa fa-external-link'></i></a>";
			echo "</td>\n<td>";
			
			$date = new DateTime($row['erstellt']);
			echo $date->format('d.m.y H:i:s')."<br />";
			
			echo "</td>\n</tr>";
			
		}
	?>
	</tbody></table>
    </div>
	
	
	
	
	
	
	
	
	
	
	</div>
</div>


<?php require_once(__DIR__.'/inc/footer.content.php'); ?>
<?php require_once(__DIR__.'/inc/footer.php'); ?>