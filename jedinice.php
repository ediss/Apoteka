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
                
				<h1>Unos jedinice</h1><br/>
                <form action='' method='POST'>
                    <label>Naziv:</label>
                    <input type='text' name='tbNazivJedinice' class='form-control tbInput'>
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
                    $naziv=$_POST['tbNazivJedinice'];

					$upit="INSERT INTO jedinica(naziv_jedinica) values(:naziv)";
					$sqlPrepare = $db->prepare($upit);
					$sqlPrepare->execute(array(":naziv"=>$naziv));
					
					$database->close();
                }
            ?>
				
				<div class="col-md-6">
				<div class="tabelaa">
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
						
						$upitPrikaz="Select * from jedinica";
						$rez=$db->query($upitPrikaz);
						$counter = 0;
						$rows = $rez->fetchAll();
						foreach($rows as $row){
							$counter++;
						?>
							<tr>
								<td><?php echo $counter; ?></td>
								<td><?php echo $row['naziv_jedinica']?></td>
								<td><a  onclick='return edit_form();' href='jedinice.php?jedinica=<?php echo $row['id_jedinica']?>' ><i class='fas fa-edit fa-lg'></i></a></td>
								<td><a  onclick='return confirm_alert(this);' href='brisanje.php?idJedinica=<?php echo $row['id_jedinica']?>'><i class='fa fa-times fa-lg' name='brisanje' aria-hidden='true'></i></a></td>
							</tr>

						<?php
						}
						$database->close();
						
						?>

				</table>
					<?php
						
					?>
				</div>
				</div>
			<?php 

				if(isset($_GET['jedinica']))
				{
					#include_once("konekcija.php");

					$id=$_GET['jedinica'];
					$upit="Select * from jedinica where id_jedinica=?";
					
					$sqlPrepare = $db->prepare($upit);
					$sqlPrepare -> execute(array($id));

					if($sqlPrepare->rowCount()==1){
						$row = $sqlPrepare->fetch();
					?>	
					<div class='edit_formaa edit' id='edit_form'>
						<h1>Izmena jedinice</h1><br/>
							<form action='' method='POST'>
								<label>Novi naziv:</label>
									<input type='text' name='tbNazivJediniceNovo' value='<?php echo $row['naziv_jedinica'];?>' class='form-control tbInput'>
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
					#include('konekcija.php');
					$id=$_GET['jedinica'];
					$novaJedinica=$_POST['tbNazivJediniceNovo'];
					$izmenaJedinica = "UPDATE jedinica set naziv_jedinica=:jedinica where id_jedinica = :id";
					$prepareSql = $db->prepare($izmenaJedinica);
					$prepareSql -> execute(array(":jedinica"=>$novaJedinica, ":id"=>$id));

					echo "<script> window.location.replace('jedinice.php') </script>";
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
