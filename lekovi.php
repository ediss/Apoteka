<!--URADITI AJAX INSERT -->
<?php
	@include('header.php');
	@include('left_side.php');
?>


<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="typo-agile">

		<div class="tabela">
					
                
					<!--<table border='1' class="table">-->
				<!--	<table border="1" bordercolor="gainsboro" class="table table-striped table-bordered table-hover tabela" style="width:100%;"  id='sample1'>-->
					<table border="1" bordercolor="gainsboro" class="table table-hover" id='sample1'>
						<tr>
						<th>Redni broj</th>
						<th>Naziv</th>
						<th>Vrsta</th>
						<th>Jedinica</th>
						<th>Komad</th>
						<th>Porez</th>
						<th>Rabat</th>
						<th>Cena</th>
						<th>Cena po kutiji</th>
						<th>Cena po komadu</th>
						<th>Izmeni</th>
						<th>Izbrisi</th>
						</tr>
						<?php
						include_once('konekcija.php');
						
						$database = new Connection();
						$db = $database->open();

                        $po_strani=5;

                        $upitPaginacija="SELECT * FROM lekovi";
						$rezPaginacija = $db->query($upitPaginacija);
						$brojZapisa = count($rezPaginacija->fetchAll());

						
                        #$brojZapisa = mysqli_num_rows($rezPaginacija);



                        $broj_strana= ceil($brojZapisa/$po_strani);

                        if(!isset($_GET['strana'])){
                            $strana=1;
                        }
                        else{
                            $strana = $_GET['strana'];
                        }

                        $limit = ($strana-1)*$po_strani;


                    ?>
                    <nav aria-label="Page navigation example">
                       <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                    
                    <?php
                        for($strana=1; $strana<=$broj_strana;$strana++)
                        {
                            echo"<li class='page-item'><a class='page-link' href='lekovi.php?strana=".$strana."'>".$strana."</a></li>";
                        }

                    ?>
                            
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav> 
					
						<?php
							#include_once('konekcija.php');
						/*	#$database = new Connection();*/
							#$db = $database->open();
							
							$upitPrikaz="Select * from (lekovi l LEFT JOIN vrsta v ON l.vrsta_id=v.id_vrsta)LEFT JOIN jedinica j on l.jedinica_id=j.id_jedinica ORDER BY id_lek DESC LIMIT ".$limit.','.$po_strani."";
							
							$counter =0;
							foreach($db->query($upitPrikaz) as $row){
								$counter ++;
							
								$porez=($row['porez']*100);
								$rabat=($row['rabat']*100);	
							?>
								<tr>
									<td><?php echo $counter ?></td>
									<td><?php echo $row['naziv_lek'] ?></td>
									<td><?php echo $row['naziv_vrsta'] ?></td>
									<td><?php echo $row['naziv_jedinica'] ?></td>
									<td><?php echo $row['komada'] ?></td>
									<td><?php echo $porez ?>%</td>
									<td><?php echo $rabat ?>%</td>
									<td><?php echo $row['cena'] ?></td>
									<td><?php echo $row['iznos_po_kutiji'] ?></td>
									<td><?php echo $row['iznos_po_komadu'] ?></td>
									<td><a  onclick='return edit_form();' href='lekovi.php?id_lek=<?php echo $row['id_lek']?>' data-id="<?php $row['id_lek']?>"><i class='fas fa-edit fa-lg'></i></a></td>
									<td><a  onclick='return confirm_alert(this);' href='brisanje.php?id_lek=<?php echo $row['id_lek']?> '><i class='fa fa-times fa-lg' name='brisanje' aria-hidden='true'></i></a></td>
								</tr>
						<?php
							}
							$database->close();
						?>
	
		  
						
	
					</table>
					
				</div>
				<div class='cleaner'></div>
		
			<div class="grid_3 grid_4 w3layouts unos">
                
				<h1>Unos lekova</h1><br/>
                <form action='' method='POST'>
                    <label>Lek:</label>
                    <input type='text' name='tbNazivLeka' class='form-control tbInput'>
                    <div class='cleaner'></div>
                <br>
				
				<label>Vrsta:</label>
                <select name='ddlVrsta' class='form-control'>
                    <option value='choose'>Izaberi vrstu</option>
					<?php
					#include('konekcija.php');
					$upitVrsta="SELECT * FROM vrsta";
					//$rez = mysqli_query($konekcija, $upitVrsta);
					
					foreach($db->query($upitVrsta) as $row){
						echo"<option value=".$row['id_vrsta'].">".$row['naziv_vrsta']."</option>";
					}
					/*while($red=mysqli_fetch_array($rez))
					{
						echo"<option value=".$red['id_vrsta'].">".$red['naziv_vrsta']."</option>";
					}*/
				?>
                </select>
				<div class='cleaner'></div>
				<br>
                <label>Jedinica:</label>
                <select name='ddlJedinica' class='form-control'id='ddlJedinica'>
					<option value='choose'>Izaberi jedinicu</option>
					<?php
						#include('konekcija.php');
						$upitJedinica="SELECT * FROM jedinica";
						
						foreach($db->query($upitJedinica) as $row){
							echo"<option value=".$row['id_jedinica'].">".$row['naziv_jedinica']."</option>";
						}
					?>
                </select>
				<div class='cleaner'></div>
				<br/>

				<div class='tbKomad' id='poKomadu'>
                    <label>Komada:</label>
                    <input type='text' name='tbKomad' id='poKomadu' class='form-control'>
                </div>
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
                    <option value='0.00'>0%</option>
					<option value='0.05'>5%</option>
                    <option value='0.10'>10%</option>
                    <option value='0.15'>15%</option>
                    <option value='0.20'>20%</option>
                </select>

                <div class='cleaner'></div>
                <br>

				
					<label>Cena:</label>
                    <input type='text' name='tbCena' class='form-control tbInput'>
                    <div class='cleaner'></div>
                <br>

                
                
                <div class='dugmici'>
                    <input type='submit' name='btnUnos' value='Unesi' class='btn btn-primary btnUnos'>
                    <input type="reset" class='btn btn-danger btnOdustani' name="btnOdustani" value='Odustani'>
                </div>

				</form>
				<?php
					if(isset($_POST['btnUnos']))
					{
						
						#include('konekcija.php');
						$lek=$_POST['tbNazivLeka'];
						$vrsta=$_POST['ddlVrsta'];
						$jedinica=$_POST['ddlJedinica'];
					
						$rabat=$_POST['rabat'];
						$porez=$_POST['porez'];
						$cena=$_POST['tbCena'];

						$iznos = ($cena+($cena*$porez)-($cena*$rabat));
						//$komad= 0;
						if(isset($_POST['tbKomad'])&& ($_POST['tbKomad'])!="")
						{
							$komad=$_POST['tbKomad'];
							$cenaKomad= $iznos/$komad;
						}
						else{
							$komad= "/";
							$cenaKomad="/";
						}


						

						$stmt = $db->prepare("INSERT INTO lekovi(naziv_lek, vrsta_id, jedinica_id, komada, porez, rabat, cena, iznos_po_kutiji, iznos_po_komadu) VALUES (:lek, :vrsta, :jedinica, :komad, :porez, :rabat, :cena, :kutija, :ukupno_komad)");
						$stmt->execute(array(':lek'=>$lek, ':vrsta'=>$vrsta, ':jedinica'=>$jedinica, ':komad'=>$komad, ':porez'=>$porez, ':rabat'=>$rabat, ':cena'=>$cena, ':kutija'=>$iznos, ':ukupno_komad'=>$cenaKomad));

						if($stmt){
							echo "<div class='alert alert-success' role='alert'>Uspesno ste uneli novi proizvod.</div>";
						}
						else{
							echo "<div class='alert alert-warning' role='alert'>Trenutno nismo u mogucnosti da obradimo zahtev. Probajte ponovo.</div>";
						}
				
						//ovde select 
						
					
						$database->close();
						
					
						
						//echo "<script> window.location.replace('lekovi.php') </script>";
						
					}
				?>
            </div>
            
       
					
					
			
<?php 

	if(isset($_GET['id_lek']))
	{
		include("izmenaLek.php");
	}
?>

		
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

<script>   
	function confirm_alert(node) {
		return confirm("Da li ste sigurni da zelite da obriste lek? Kliknite OK da bi obrisali ili CANCEL da obustavite.");
	}
	

</script>

<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
