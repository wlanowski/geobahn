<?php
require_once(__DIR__.'/auth.php');
$seitentitel = 'Projektübersicht';
require_once (__DIR__ . '/inc/header.php');

// require für Datenbankverbindungseinstellungen

require_once (__DIR__ . '/globalconfig.php');


require_once (__DIR__ . '/inc/layout.php');
 ?>



        

        <!-- page content -->
		
<div class="right_col" role="main" style="background-color:#ffffff;">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3><?php
echo $seitentitel; ?></h3><br />
			</div>
			</div>
			</div>








		
<!-- Start der Tabelle -->			
<div class="col-md-12 col-sm-12 col-xs-12">	

<table id="datatable-buttons" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Projektname</th>
                          <th>Ort</th>
                          <th>Ansprechpartner</th>
						  <th>Angelegt</th>
                        </tr>
                      </thead>
					  
					  <tfoot>
						<tr>
						  <th>Projektname</th>
                          <th>Ort</th>
                          <th>Ansprechpartner</th>
						  <th>Angelegt</th>
						</tr>
					</tfoot>


                      <tbody>
					  
						
	<?php
		$pdo = new PDO('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_pass);

		$sql = "SELECT * FROM ".$db_pref."_projekte";
		foreach ($pdo->query($sql) as $row) 
		{
			echo "<tr>\n<td>";
			
			echo "<a href='projectdetail.php?projectid=";
			echo $row['ID']."'><i class='fa fa-external-link'></i> ";
			echo $row['projektname'];
			echo "</a>";
			echo "</td>\n<td>";
			
			echo $row['ort'];			
			echo "</td>\n<td>";
			
			$sqlname = "SELECT nameclear FROM ".$db_pref."_users WHERE username='".$row['ansprechpartner']."'";
			$stmt = $pdo->query($sqlname);
			$rowname = $stmt->fetchObject();
			echo "<a href =user.php?username=".$row['ansprechpartner']."><i class='fa fa-external-link'></i> ".$rowname->nameclear."  </a>";
			echo "</td>\n<td>";
			
			$date = new DateTime($row['erstellt']);
			echo $date->format('d.m.Y H:i:s')."<br />";
			
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