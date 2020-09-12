<!-- Anfang Layout -->
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
                    <a href="index.php" class="site_title"><i class="fa fa-subway"></i> <span><?php
                            echo $projectxname ?></span></a>
                </div>


                <!-- Ende Einfügungen -->


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
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>


                <!-- sidebar menu -->


                <!-- Todo: Klasse "menu_fixed" einbauen? -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <!-- <h3>General</h3> -->
                        <ul class="nav side-menu">

                            <li><a href="map.php"><i class="fa fa-globe"></i> Karte </a></li>

                            <?php
                            if ($_SESSION['user']['role'] != 99)
                            {
                                echo '
                            <li><a><i class="fa fa-tasks"></i> Daten<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="projects.php">Projektübersicht</a></li>
                                    <li><a href="createproject.php">Projekt erstellen</a></li>
                                    <li><a href="userlist.php">Benutzerübersicht</a></li>
                                </ul>
                            </li>';}?>
                            <li><a href="inspector.php"><i class="fa fa-search"></i> Inspektor </a></li>
                            <!--<li><a href="dateien.php"><i class="fa fa-file-o"></i> Download </a></li>-->
                            <li><a><i class="fa fa-info"></i> Informationen<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="about.php">Über</a></li>
                                    <li><a href="license.php">Lizenz</a></li>
                                    <li><a href="impressum.php">Impressum</a></li>

                                </ul>
                            </li>
                            <?php
                             if($_SESSION['user']['role']==1)
                             {
                                 echo '<li><a href="control.php"><i class="fa fa-cog"></i> Kontrollzentrum </a></li>';
                             }


                            ?>

                            <!-- <li><a href = "mailto:john.nitzsche@deutschebahn.com?cc=nitzschejohn@gmail.com?subject=Geodaten%20Bahn"><i class = "fa fa-comment"></i> Mailsupport </a></li> -->
                        </ul>
                    </div>
                </div>

                <!-- /sidebar menu -->

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
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <?php echo($_SESSION['user']['username_clear']); ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="user.php?userid=<?php echo $_SESSION['user']['userid']; ?>">Mein Profil /
                                        Meine Projekte</a></li>


                                <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i>Logout</a></li>
                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->


        <!-- Ende Layout -->