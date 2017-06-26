<?php
$seitentitel = 'Projektübersicht';
require_once (__DIR__ . '/inc/header.php');

// require für Datenbankverbindungseinstellungen

require_once (__DIR__ . '/globalconfig.php');
require_once(__DIR__.'/auth.php');

require_once (__DIR__ . '/inc/layout.php');
 ?>



        

        <!-- page content -->
		
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3><?php
echo $seitentitel; ?></h3><br />
			</div>
			</div>
			</div>



<div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>TODO!</strong> Tasten von englisch ins Deutsche übersetzen! (06.06.17)
</div>




		
<!-- Start der Tabelle -->			
<div class="col-md-12 col-sm-12 col-xs-12">	
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

		$sql = "SELECT * FROM ".$db_pref."_projekte WHERE ansprechpartner='".($_SESSION['user']['username'])."'";
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
<!-- Ende der Tabelle -->
	
	
	
	

	</div>
	</div>





<?php
require_once (__DIR__ . '/inc/footer.content.php');
 ?>
 
 </div>
 
<?php
require_once (__DIR__ . '/inc/footer.php');
 ?>