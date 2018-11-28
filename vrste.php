<?php
	include('header.php');
	include('left_side.php');
?>>


<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="typo-agile">
		

            
            <!--OVDE STAMPAMO TABELU SA SVIM JEDINICIMA(OBLICIMA) U BAZI-->

        
            <div class="grid_3 grid_4 w3layouts unos">
                
				<h1>Unos vrste</h1><br/>
                <form action='' method='POST'>
                    <label>Naziv:</label>
                    <input type='text' name='tbNazivVrste' class='form-control tbInput'>
                    <div class='cleaner'></div>
                <br/>
                     <div class='dugmici'>
                        <input type='submit' name='btnUnos' value='Unesi' class='btn btn-primary btnUnos'>
                        <input type="reset" class='btn btn-danger btnOdustani' name="btnOdustani" value='Odustani'>
                    </div>

                </form>
            </div>
            <?php
                if(isset($_POST['btnUnos']))
                {
					include_once('konekcija.php');
					$database = new Connection();
					$db = $database->open();
                    $naziv=$_POST['tbNazivVrste'];

					$upit=$db->prepare("INSERT INTO vrsta(naziv_vrsta) values(:vrsta)");
					$upit->execute(array(":vrsta"=>$naziv));

					if($upit){
						echo "<div class='alert alert-success' role='alert'>Uspesno ste uneli novi proizvod.</div>";
					}
					else{
						echo "<div class='alert alert-warning' role='alert'>Trenutno nismo u mogucnosti da obradimo zahtev. Probajte ponovo.</div>";
					}
					
					$database->close();
                }
            ?>

				<div class="col-md-6">
				<div class="tabelaVrsta">
				<table border="1" bordercolor="gainsboro" class="table table-hover" id='sample1'>
					<!--<h1>Prikaz</h1>-->
					<tr>
						<th>Redni broj</th>
						<th>Naziv</th>
						<th>Izmeni</th>
						<th>Obrisi</th>
					</tr>
					<?php
						include_once('konekcija.php');
						$database = new Connection();
						$db = $database->open();

						$upitPrikaz="Select * from vrsta";
						$rezPrikaz=$db->query($upitPrikaz);
						$rows=$rezPrikaz->fetchAll();
						$counter = 0;
						foreach($rows as $row){
							$counter++
						?>
							<tr>
								<td><?php echo $counter ?></td>
								<td><?php echo $row['naziv_vrsta']?></td>
								<td><a  onclick='return edit_form();' href='vrste.php?vrsta=<?php echo $row['id_vrsta']?>' ><i class='fas fa-edit fa-lg'></i></a></td>
								<td><a  onclick='return confirm_alert(this);' href='brisanje.php?idVrsta=<?php echo $row['id_vrsta']?>'><i class='fa fa-times fa-lg' name='brisanje' aria-hidden='true'></i></a></td>
							</tr>
						<?php
						}
						$database->close();
						?>

				</table>
					
				</div>
				</div>
			<?php 

				if(isset($_GET['vrsta']))
				{
					
					$id=$_GET['vrsta'];
					$upit="Select * from vrsta where id_vrsta=?";
					$stmt= $db->prepare($upit);
					$stmt->execute(array($id));

					if($stmt->rowCount()==1){
					   
					   $row = $stmt->fetch();
					?>
					<div class='edit_formaa edit' id='edit_form'>
						<h1>Izmena vrste</h1><br/>
							<form action='' method='POST'>
								<label>Novi naziv:</label>
									<input type='text' name='tbNazivVrsteNovo' value="<?php echo $row['naziv_vrsta'] ?>" class='form-control tbInput'>
								<div class='cleaner'></div><br/>
								
								<div class='dugmici'>
									<input type='submit' name='btnIzmena' value='Izmeni' class='btn btn-primary btnUnos'>
									<input type='reset' class='btn btn-danger btnOdustani' name='btnOdustani' value='Odustani'>
								</div>
							</form>  
					</div>
							
					<?php
					$database->close();
					}

					
				}

				if(isset($_POST['btnIzmena']))
				{
					include_once('konekcija.php');
					$id=$_GET['vrsta'];
					$novaVrsta=$_POST['tbNazivVrsteNovo'];
					$izmenaVrsta = $db->prepare( "UPDATE vrsta set naziv_vrsta=:vrsta where id_vrsta = :id");
					$izmenaVrsta->execute(array(':vrsta'=>$novaVrsta, ':id'=>$id));
					//$rezIzmena = mysqli_query($konekcija, $izmenaJedinica);

					echo "<script> window.location.replace('vrste.php') </script>";
				}
			?>
				<div class="clearfix"> </div>
			</div>

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
