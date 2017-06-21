<!-- Anfang Layout -->
            
<div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <!-- <img src="images/img.jpg" alt="..." class="img-circle profile_img"> -->
              </div>
              <div class="profile_info">
                <span>Herzlich Willkommen</span>
              </div>
            </div>
            <!-- /menu profile quick info -->

			<!-- wegen fehlendem Profilbild mehr Umbrüche (tested) -->
             <br />
             <br />
             <br />
             <br />
             <br />
			
				

			
			
			
			<!-- sidebar menu -->
            
			
			
			<!-- Todo: Klasse "menu_fixed" einbauen? -->
			<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <!-- <h3>General</h3> -->
                <ul class="nav side-menu">
				
					<li><a href = "map.php"><i class="fa fa-globe"></i> Karte </a></li>
					<li><a href = "projects.php"><i class = "fa fa-tasks"></i> Projektübersicht </a>
					<li><a href = "inspector.php"><i class = "fa fa-search"></i> Streckeninspektor </a></li>
					<li><a href = "dateien.php"><i class = "fa fa-file-o"></i> Dateidownload </a></li>
					
					<!-- <li><a href = "mailto:john.nitzsche@deutschebahn.com?cc=nitzschejohn@gmail.com?subject=Geodaten%20Bahn"><i class = "fa fa-comment"></i> Mailsupport </a></li> -->
				</ul>
              </div>
            </div>
		
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
			
			
            <!--
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
			--> 
			
			<a data-toggle="tooltip" data-placement="top" title="Support" href="mailto:john.nitzsche@deutschebahn.com">
				<span class= "fa fa-comment" aria-hidden="true"></span>
			</a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
               <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
            </div>
            <!-- /menu footer buttons -->
			
			</div>
</div>
			
			<!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $_COOKIE["nameclear"]; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;">Profil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span>Einstellungen</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Support</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i>Logout</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
		
	
		
		

<!-- Ende Layout -->