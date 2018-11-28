<?php
    include('header.php');
    include('left_side.php');
?>

<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="wthree-font-awesome">
            
         

				
                <div class="cola-md-6">
            
                    <div class="statistikaBox">
					<i class="far fa-calendar-alt fa-3x"></i><br/>
                            <a href ="" >Po vremenskom periodu</a><br/><br/>
                            <div class='programDatum2'>
                            <!--<label>Kliknite kako bi izabrali datum</label>-->
                            <form action='' method='POST' name='mojaForma'>
                                
                                <input type='text' id="datepicker" class="input-group daste mojDatum form-control" name='odDatuma' placeholder='od..' data-date-format="dd.mm.yyyy">
                                <input type='text' id="datepicker2" class="input-group daste mojDatum form-control" name='doDatuma' placeholder='do..' data-date-format="dd.mm.yyyy"><br/><br/>
                                <input type='submit' name='btnFaktura' value='Prikazi' class='btn btn-primary btnFaktura'>
                            </form>
                            </div><br/>
                      
                            
                            
                    </div>


				<div class="tabelaFakturaIzlaz">
                <!--<div class="table-responsive tabelaUlaz">-->
            
                <?php
                    if(isset($_POST['btnFaktura']))
                    {
                    ?>
                        <table border='1' bordercolor='gainsboro' class='table table-hover' id='sample1'>
                            <thead>	
                                <tr>
                                    <th>Redni broj</th>
                                    <th>Naziv</th>
                                    <th>Kolicina</th>
                                    <th>Ukupno placeno</th>
                                </tr>
                            </thead>
                <?php
                        include_once('konekcija.php');
                        $database = new Connection();
                        $db = $database->open();
                        
                        $od=$_POST['odDatuma'];
                        $do=$_POST['doDatuma'];

                        $timestamp1 = strtotime($od);
                        $timestamp2 = strtotime($do);

                        $upitFaktura="Select *, SUM(kolicina) as kolicina_ukupno, SUM(ukupna_cena) as cena_ulaz_ukupno from ulaz_lekova u LEFT JOIN lekovi l on u.lek_id = l.id_lek Where u.datumUlaza BETWEEN ? and ?  GROUP BY id_lek";
                        $resultFacture = $db->prepare($upitFaktura);
                        $resultFacture->execute(array($timestamp1, $timestamp2));
                                                                                                                                                                                                 
                        
                        $counter = 0;
                        $mojIznos=0;
                        foreach($resultFacture->fetchAll() as $row){
                            $counter++;
                            $iznos= $row['cena_ulaz_ukupno'];

                            $mojIznos+=$iznos;
                        ?>
                            <tr>
                                <td><?php echo $counter;?></td>
                                <td><?php echo $row['naziv_lek'];?></td>
                                <td><?php echo $row['kolicina_ukupno'];?></td>
                                <td><?php echo $row['cena_ulaz_ukupno'];?></td>
                            </tr>
                        <?php
                        }
                        ?>
                            <tr>
                                <td  colspan='4'>Ukupno:<br/><?php echo $mojIznos.".00RSD";?></td>
                            </tr>
                     <?php     
                           
                    }
                 
                ?>
				
				

				</table>
					
                </div>

                </div>
                <div class='cleaner'></div>

        </div>


          

        
  
		
</section>
<!-- footer -->
	<div class="footer">
		<div class="wthree-copyright">
			<p>© 2018 Swiss Medica Apoteka. All rights reserved | Developed by <a href=''><b><em>Edis Skenderi</em></b><a/></p>
		</div>
	</div>
<!-- //footer -->
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
