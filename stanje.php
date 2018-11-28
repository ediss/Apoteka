<?php
    include('header.php');
    include('left_side.php');
?>

<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="wthree-font-awesome">
            
         

  
				<div class="cola-md-6 levo">
				<div class="tabelaUlaz">
                <!--<div class="table-responsive tabelaUlaz">-->
				<table border="1" bordercolor="gainsboro" class="table table-hover" id='sample1'>
				    <thead>	<!--<h1>Prikaz</h1>-->
					<tr>
						<th>Redni broj</th>
                        <th>Naziv</th>
                        <th>Kolicina</th>
						<th>Komada</th>

                    </tr>
                    </thead>
					<?php
						include_once('konekcija.php');
						$database = new Connection();
						$db = $database->open();

						$upitPrikazLekova="Select * from stanje s  LEFT JOIN lekovi l on s.lek_id=l.id_lek";
						$result = $db->query($upitPrikazLekova);
						$rows=$result->fetchAll();
						$counter = 0;

						foreach($rows as $row){
							$counter++;
						?>
						<tr>
							<td><?php echo $counter; ?></td>
                            <td><?php echo $row['naziv_lek'];?></td>
							<td><?php echo $row['kolicina_stanje'];?></td>
							<td><?php echo $row['stanje_komad'];?></td>			
						</tr>
					
					<?php
					 	}
				
					?>

				</table>
					
                </div>

                </div>
                <div class='cleaner'></div>
                <?php 


?>
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
