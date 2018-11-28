<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Flot_chart :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<!-- charts -->
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<link rel="stylesheet" href="css/morris.css">
<!-- //charts -->

</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        VISITORS
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-tasks"></i>
                <span class="badge bg-success">8</span>
            </a>
            <ul class="dropdown-menu extended tasks-bar">
                <li>
                    <p class="">You have 8 pending tasks</p>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Target Sell</h5>
                                <p>25% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="45">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Product Delivery</h5>
                                <p>45% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="78">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Payment collection</h5>
                                <p>87% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="60">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Target Sell</h5>
                                <p>33% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="90">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>

                <li class="external">
                    <a href="#">See All Tasks</a>
                </li>
            </ul>
        </li>
        <!-- settings end -->
        <!-- inbox dropdown start-->
        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-important">4</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    <p class="red">You have 4 Mails</p>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/3.png"></span>
                                <span class="subject">
                                <span class="from">Jonathan Smith</span>
                                <span class="time">Just now</span>
                                </span>
                                <span class="message">
                                    Hello, this is an example msg.
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/1.png"></span>
                                <span class="subject">
                                <span class="from">Jane Doe</span>
                                <span class="time">2 min ago</span>
                                </span>
                                <span class="message">
                                    Nice admin template
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/3.png"></span>
                                <span class="subject">
                                <span class="from">Tasi sam</span>
                                <span class="time">2 days ago</span>
                                </span>
                                <span class="message">
                                    This is an example msg.
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/2.png"></span>
                                <span class="subject">
                                <span class="from">Mr. Perfect</span>
                                <span class="time">2 hour ago</span>
                                </span>
                                <span class="message">
                                    Hi there, its a test
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">See all messages</a>
                </li>
            </ul>
        </li>
        <!-- inbox dropdown end -->
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning">3</span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
                <li>
                    <div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #1 overloaded.</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-danger clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #2 overloaded.</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-success clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> Server #3 overloaded.</a>
                        </div>
                    </div>
                </li>

            </ul>
        </li>
        <!-- notification dropdown end -->
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/2.png">
                <span class="username">John Doe</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="login.html"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>UI Elements</span>
                    </a>
                    <ul class="sub">
						<li><a href="typography.html">Typography</a></li>
						<li><a href="glyphicon.html">glyphicon</a></li>
                        <li><a href="grids.html">Grids</a></li>
                    </ul>
                </li>
                <li>
                    <a href="fontawesome.html">
                        <i class="fa fa-bullhorn"></i>
                        <span>Font awesome </span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Data Tables</span>
                    </a>
                    <ul class="sub">
                        <li><a href="basic_table.html">Basic Table</a></li>
                        <li><a href="responsive_table.html">Responsive Table</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
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
                    <a class="active" href="javascript:;">
                        <i class=" fa fa-bar-chart-o"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub">
                        <li><a href="chartjs.html">Chart js</a></li>
                        <li><a class="active" href="flot_chart.html">Flot Charts</a></li>
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
                </li>
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="chart_agile">
			<div class="col-md-6 floatcharts_w3layouts_left">
				<div class="floatcharts_w3layouts_top">
					<div class="floatcharts_w3layouts_bottom">
					
                    <h1>Ulaz lekova <img src='images/pill.png' ></h1>
                            <div class='unos2'>
                            <form action='' method='POST'>
                                <label>Naziv leka:</label>
                                <select name='artical' class='form-control'>
                                    <option value='choose'>Izaberi lek</option>
                                <?php
                                    include('konekcija.php');
                                    $upitPrikaz="Select * from lekovi";
                                    $rez=mysqli_query($konekcija, $upitPrikaz);
                
                                    while($red=mysqli_fetch_array($rez))
                                    {
                                        echo "<option value =".$red['id_lek'].">".$red['naziv_lek']."";
                                        //hidden polja
                        
                                    }
                                ?>
                                </select>
                                <div class='cleaner'></div>
                                <br>
                                <label>Vrsta:</label>
                                <select name='ddlVrsta' class='form-control'>
                                    <option value='choose'>Izaberi vrstu</option>
                                    <?php
                                    include('konekcija.php');
                                    $upitVrsta="SELECT * FROM vrsta";
                                    $rez = mysqli_query($konekcija, $upitVrsta);
                
                                    while($red=mysqli_fetch_array($rez))
                                    {
                                        echo"<option value=".$red['id_vrsta'].">".$red['naziv_vrsta']."</option>";
                                    }
                                ?>
                                </select> 
                                
                              
                
                
                                <div class='cleaner'></div>
                                <br>
                                <label>Jedinica:</label>
                                <select name='ddlJedinica' class='form-control'id='ddlJedinica'>
                                    <option value='choose'>Izaberi jedinicu</option>
                                    <?php
                                        include('konekcija.php');
                                        $upitJedinica="SELECT * FROM jedinica";
                                        $rez = mysqli_query($konekcija, $upitJedinica);
                
                                        while($red=mysqli_fetch_array($rez))
                                        {
                                            echo"<option value=".$red['id_jedinica'].">".$red['naziv_jedinica']."</option>";
                                        }
                                    ?>
                                </select>
                
                                <div class='cleaner'></div>
                                <br>
                                <div class='tbKomad' id='poKomadu'>
                                    <label>Komada:</label>
                                    <input type='text' name='tbKomad' id='poKomadu' class='form-control'>
                                </div>
                                <div class='cleaner'></div>
                                <br>
                
                                <label>Kolicina:</label>
                                <input type='text' name='tbKolicina' placeholder="kolicina" class='form-control kolicina'>
                
                                <div class='cleaner'></div>
                                <br>
                                <label>Cena:</label>
                                <input type='text' name='tbCena' placeholder="0.00RSD" class='form-control'>
                
                                <div class='cleaner'></div>
                                <br>
                                <label>Porez:</label>
                                <select name='porez' class='form-control'>
                                    <option value='choose'>Izaberi porez</option>
                                    <option value='0.1'>10%</option>
                                    <option value='0.18'>18%</option>
                                    <option value='0.20'>20%</option>
                                </select>
                
                                
                                <div class='cleaner'></div>
                                <br>
                                <label>Rabat:</label>
                                <select name='rabat' class='form-control'>
                                    <option value='choose'>Izaberi rabat</option>
                                    <option value='0'>Rabat 1</option>
                                    <option value='1'>Rabat 2</option>
                                </select>
                
                                <div class='cleaner'></div>
                                <br>
                                <label>Datum:</label>
                                <input type='text'  id='datepicker' value="<?php echo(date('d-m-Y')); ?>" class='input-group date datum form-control' name='datum4' data-date-format='dd-mm-yyyy'>
                                    
                                
                                <div class='cleaner'></div>
                                <br/>
                                <div class='dugmici'>
                                    <input type='submit' name='btnUnos' value='Unesi' class='btn btn-primary btnUnos'>
                                    <input type="reset" class='btn btn-danger btnOdustani' name="btnOdustani" value='Odustani'>
                                </div>
                               
                            </form>
                 
                            <?php
                            
                      
                            /////////////////////////
                                if(isset($_POST['btnUnos']))
                                {
                                    include('konekcija.php');
                                    
                                    $lek=$_POST['artical'];
                                    $vrsta=$_POST['ddlVrsta'];
                                    $jedinica=$_POST['ddlJedinica'];
                                    $kolicina=$_POST['tbKolicina'];
                                    $cena=$_POST['tbCena'];
                                    $porez=$_POST['porez'];
                                    $rabat=$_POST['rabat'];
                                    $date=$_POST['datum4'];
                                    $datum=strtotime($date);
                                   // $vrsta=$_POST['tbvrsta'];
                                    //$jedinica=$_POST['tbjedinica'];
                                       //komad
                                    if(isset($_POST['tbKomad'])&& $_POST['tbKomad']!='')
                                    {
                                        $poKomadu=$_POST['tbKomad'];
                                        $cenaKomad=(($cena/$poKomadu)+($cena/$poKomadu)*$porez);
                                    }
                                    else
                                    {
                                        $poKomadu=0;
                                        $cenaKomad=(($cena)+($cena*$porez));    
                                    }
                                    
                
                                  //  echo $cenaKomad."<br/><br/>";
                
                                    $upitInsert="Insert into ulaz_lekova values ('', '$lek', '$vrsta', '$jedinica','$poKomadu', '$kolicina', '$cena','$porez','$rabat','$datum', '$cenaKomad')";
                                    $rez2=mysqli_query($konekcija, $upitInsert);
                              
                
                                    //echo $datum;
                                    
                                }
                            ?>
                            </div>
			

					</div>
				</div>
			</div>
			<div class="col-md-6 floatcharts_w3layouts_left">
				<div class="floatcharts_w3layouts_top">
					<div class="floatcharts_w3layouts_bottom">
						<div id="graph5">
                        <div class="tabelaUlaz">
				<table border="1" bordercolor="gainsboro" class="table table-hover" id='sample1'>
					<!--<h1>Prikaz</h1>-->
					<tr>
						<th>Redni broj</th>
                        <th>Naziv</th>
                        <th>Vrsta</th>
                        <th>Jedinica</th>
                        <th>Komad</th>
                        <th>Kolicina</th>
                        <th>Cena</th>
                        <th>Porez</th>
                        <th>Rabat</th>
                        <th>Cena po komadu</th>
                        <th>Datum ulaza</th>
						<th>Izmeni</th>
						<th>Obrisi</th>
					</tr>
					<?php
						include('konekcija.php');
						$upitPrikazLekova="Select * from ((ulaz_lekova ul LEFT JOIN jedinica j on ul.jedinica_id=j.id_jedinica) LEFT JOIN vrsta v on ul.vrsta_id=v.id_vrsta)LEFT JOIN lekovi l on ul.lek_id=l.id_lek";
						$rez3 = mysqli_query($konekcija, $upitPrikazLekova);
						$counter = 0;
						while($red=mysqli_fetch_array($rez3))
						{
                            $counter++;
                            $datumUnosa=date('d-m-Y',$red['datumUlaza']);
                            $porezPrikaz= $red['porez']*100;
							echo"<tr>
								<td>".$counter."</td>
                                <td>".$red['naziv_lek']."</td>
                                <td>".$red['naziv_vrsta']."</td>
                                <td>".$red['naziv_jedinica']."</td>
                                <td>".$red['komada']."</td>
                                <td>".$red['kolicina']."</td>
                                <td>".$red['cena']."</td>
                                <td>".$porezPrikaz."%</td>
                                <td>".$red['rabat']."</td>
                                <td>".$red['cena_komad']."</td>
                                <td>".$datumUnosa."</td>
								<td><a  onclick='return edit_form();' href='jedinice.php?jedinica=".$red['id_jedinica']."' ><i class='fas fa-edit fa-lg'></i></a></td>
								<td><a  onclick='return confirm_alert(this);' href='brisanje.php?idUlaz=".$red['id_ulaz']." ''><i class='fa fa-times fa-lg' name='brisanje' aria-hidden='true'></i></a></td>
								</tr>";
						}
						?>

				</table>
					
				</div>
                        </div>
				

					</div>

				</div>
			</div>
			<div class="col-md-6 floatcharts_w3layouts_left">
				<div class="floatcharts_w3layouts_top">
					<div class="floatcharts_w3layouts_bottom">
						<div id="graph7"></div>
						<script>
						// This crosses a DST boundary in the UK.
						Morris.Area({
						  element: 'graph7',
						  data: [
							{x: '2013-03-30 22:00:00', y: 3, z: 3},
							{x: '2013-03-31 00:00:00', y: 2, z: 0},
							{x: '2013-03-31 02:00:00', y: 0, z: 2},
							{x: '2013-03-31 04:00:00', y: 4, z: 4}
						  ],
						  xkey: 'x',
						  ykeys: ['y', 'z'],
						  labels: ['Y', 'Z']
						});
						</script>

					</div>
				</div>
			</div>
			<div class="col-md-6 floatcharts_w3layouts_left">
				<div class="floatcharts_w3layouts_top">
					<div class="floatcharts_w3layouts_bottom">
						<div id="graph8"></div>
						<script>
						/* data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type */
						var day_data = [
						  {"period": "2012-10-01", "licensed": 3407, "sorned": 660},
						  {"period": "2012-09-30", "licensed": 3351, "sorned": 629},
						  {"period": "2012-09-29", "licensed": 3269, "sorned": 618},
						  {"period": "2012-09-20", "licensed": 3246, "sorned": 661},
						  {"period": "2012-09-19", "licensed": 3257, "sorned": 667},
						  {"period": "2012-09-18", "licensed": 3248, "sorned": 627},
						  {"period": "2012-09-17", "licensed": 3171, "sorned": 660},
						  {"period": "2012-09-16", "licensed": 3171, "sorned": 676},
						  {"period": "2012-09-15", "licensed": 3201, "sorned": 656},
						  {"period": "2012-09-10", "licensed": 3215, "sorned": 622}
						];
						Morris.Bar({
						  element: 'graph8',
						  data: day_data,
						  xkey: 'period',
						  ykeys: ['licensed', 'sorned'],
						  labels: ['Licensed', 'SORN'],
						  xLabelAngle: 60
						});
						</script>

					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
            <p>© 2018 Swiss Medica Apoteka. All rights reserved | Developed by <a href=''><b><em>Edis Skenderi</em></b><a/></p>
			</div>
		  </div>
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
