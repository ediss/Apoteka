<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
        <?php 
            if(isset($_SESSION['sesijaIdKorisnik']))
            {?>

            
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="stanje.php"><!--index.php-->
                    <i class="fas fa-medkit"></i>
                        <span>Stanje u apoteci</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                    <i class="fas fa-cogs"></i>
                        <span>Upravljanje</span>
                    </a>
                    <ul class="sub">
						<li><a href="lekovi.php">Lekovi</a></li>
						<li><a href="vrste.php">Vrste</a></li>
                        <li><a href="jedinice.php">Jedinice</a></li>
                    </ul>
                </li>
           
                <li class="sub-menu">
                    <a href="javascript:;">
                    <i class="fas fa-exchange-alt"></i>
                        <span>Ulaz / Izlaz</span>
                    </a>
                    <ul class="sub">
                        <li><a href="fontawesome.php">Ulaz lekova</a></li>
                        <li><a href="izlaz_lekova.php">Izlaz lekova</a></li>
                    </ul>
                </li>

                    <li class="sub-menu">
                    <a href="javascript:;">
                    <i class="fas fa-exchange-alt"></i>
                        <span>Faktura</span>
                    </a>
                    <ul class="sub">
                        <li><a href="faktura_ulaz.php">Faktura ulaza</a></li>
                        <li><a href="faktura_izlaz.php">Faktura izlaza</a></li>
                    </ul>
                </li>
               <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Form Components</span>
                    </a>
                    <ul class="sub">
                        <li><a href="form_component.html">Form Elements</a></li>
                        <li><a href="form_validation.html">Form Validation</a></li>
						<li><a href="dropzone.html">Dropzone</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-envelope"></i>
                        <span>Mail </span>
                    </a>
                    <ul class="sub">
                        <li><a href="mail.html">Inbox</a></li>
                        <li><a href="mail_compose.html">Compose Mail</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub">
                        <li><a href="chartjs.html">Chart js</a></li>
                        <li><a href="flot_chart.html">Flot Charts</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="sub">
                        <li><a href="google_map.html">Google Map</a></li>
                        <li><a href="vector_map.html">Vector Map</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-glass"></i>
                        <span>Extra</span>
                    </a>
                    <ul class="sub">
                        <li><a href="gallery.html">Gallery</a></li>
						<li><a href="404.html">404 Error</a></li>
                        <li><a href="registration.html">Registration</a></li>
                    </ul>
                </li>
                <li>
                    <a href="login.html">
                        <i class="fa fa-user"></i>
                        <span>Login Page</span>
                    </a>
                </li>-->
            </ul>  
<?php } ?>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->