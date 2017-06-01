<?php
$seitentitel = 'Start';
require_once(__DIR__.'/inc/header.php');

//require für Datenbankverbindungseinstellungen
require_once(__DIR__.'/globalconfig.php');




require_once(__DIR__.'/auth.php');

?>







  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
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
		<div>Inhalte folgen hier!</div>
 </div>
</div>




<?php require_once(__DIR__.'/inc/footer.content.php'); ?>
<?php require_once(__DIR__.'/inc/footer.php'); ?>