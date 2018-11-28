<?php
    include('header.php');
    include('left_side.php');
?>

<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="wthree-font-awesome">


       <div class='cleaner'></div>
				<div class="cola-md-6 ">
				<div class="tabelaUlaz">
                <!--<div class="table-responsive tabelaUlaz">-->
				<table border="1" bordercolor="gainsboro" class="table table-hover" id='sample1'>
				    <thead>	<!--<h1>Prikaz</h1>-->
					<tr>
						<th>Redni broj</th>
                        <th>Naziv</th>
                        <th>Vrsta</th>
                        <th>Jedinica</th>
                        <!--<th>Komad</th>-->
                        <th>Kolicina</th>
                        <th>Cena</th>
                        <!--<th>Porez</th>-->
                        <!--<th>Rabat</th>-->
                        <!--<th>Cena po komadu</th>-->
                        <th>Ukupna cena</th>
                        <th>Datum ulaza</th>
						<th>Izmeni</th>
						<th>Obrisi</th>
                    </tr>
                    </thead>
					<?php
                        include('konekcija.php');
                        include('paginacija.php');
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
                            echo"<li class='page-item'><a class='page-link' href='fontawesome.php?strana=".$strana."'>".$strana."</a></li>";
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
			
                        include_once('konekcija.php');
                        $database = new Connection();
                        $db = $database->open();

                        $prikazLekova="Select * from ((ulaz_lekova ul LEFT JOIN lekovi l on ul.lek_id=l.id_lek) LEFT JOIN vrsta v on l.vrsta_id=v.id_vrsta)LEFT JOIN jedinica j on l.jedinica_id=j.id_jedinica ORDER BY ul.datumUlaza DESC LIMIT ".$limit.','.$po_strani."";
                        $rez = $db->query($prikazLekova);
                        $rows=$rez->fetchAll();
                        $counter=0;
                        
                        foreach($rows as $row){
                            $counter++;
                            $datumUnosa=date('d-M-Y',$row['datumUlaza']);
                        ?>
                            <tr>
								<td><?php echo $counter; ?></td>
                                <td><?php echo $row['naziv_lek'];?></td>
                                <td><?php echo $row['naziv_vrsta'];?></td>
                                <td><?php echo $row['naziv_jedinica'];?></td>
                                
                                <td><?php echo $row['kolicina'];?></td>
                                <td><?php echo $row['cena'];?></td>
                                <td><?php echo $row['ukupna_cena'];?></td>
                                <td class='datum'><?php echo $datumUnosa; ?></td>
                                <td><a  onclick='return edit_form();' href='fontawesome.php?idUlaz=<?php echo $row['id_ulaz']?> &idLek=<?php echo $row['id_lek']?>&idVrsta=<?php echo $row['id_vrsta']?>&idJedinica=<?php echo $row['id_jedinica']?>'><i class='fas fa-edit fa-lg'></i></a></td>
                                                                      
								<td><a  onclick='return confirm_alert(this);' href='brisanje.php?idUlaz=<?php echo $row['id_ulaz']?>'><i class='fa fa-times fa-lg' name='brisanje' aria-hidden='true'></i></a></td>
							</tr>
                        <?php
                        $database->close();
                        }
						
						?>

				</table>
                <?php
                        include_once('konekcija.php');
                        include_once('paginacija.php');
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
                            echo"<li class='page-item'><a class='page-link' href='fontawesome.php?strana=".$strana."'>".$strana."</a></li>";
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

                </div>

                </div>
                
            <div class='unos2'>
            <h1>Ulaz lekova <img src='images/pill.png' ></h1>
            <form action='' method='POST'>
                <label>Naziv leka:</label>
                <select name='artical' class='form-control'>
                    <option value='choose'>Izaberi lek</option>
                <?php
                    //include('konekcija.php');
                    $upitPrikaz="Select * from lekovi";
                    $rez=$db->query($upitPrikaz);
                    
                    $brojZapisa = $rez->fetchAll();
                    foreach($brojZapisa as $red){
                        echo "<option value =".$red['id_lek'].">".$red['naziv_lek']."";
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
                    include_once('konekcija.php');        
                    $lek=$_POST['artical'];
                    
                    $upitPrikazLekova="Select * from lekovi where id_lek= ?";
                    $prepare = $db->prepare($upitPrikazLekova);
                    $prepare -> execute(array($lek));

                    if($prepare->rowCount()==1){
                        
                        $redPrikaza = $prepare->fetch();

                        $cena=$redPrikaza['iznos_po_kutiji'];
                        $kolicina=$_POST['tbKolicina'];
                        $ukupnaCena = $cena*$kolicina;
                        $datumUnosa=$_POST['datum4'];
                        $tsDatumUnosa = strtotime($datumUnosa);
                        
                        if(is_numeric($redPrikaza['komada'])){
                            $komada=$redPrikaza['komada'];
                            $komad = $kolicina*$komada;
                        }
                        else{
                            $komad = 0;
                        }
                        
                    }

                

                    //probaStanje

                    $upitStanje="Select * from stanje where lek_id=?";
                    $prepareMagacin = $db->prepare($upitStanje);
                    $prepareMagacin -> execute(array($lek));

                    //$novaKolicina+=$kolicina;
                    //echo $novaKolicina;
                    if($prepareMagacin->rowCount()==1){
                        
                        $updateStanje="UPDATE stanje set kolicina_stanje=kolicina_stanje+:km, stanje_komad=stanje_komad+:komad where lek_id=:lek" ;
                        
                        $prepareUpdateMagacin = $db->prepare($updateStanje);
                        $prepareUpdateMagacin->execute(array(":km"=>$kolicina, ":komad"=>$komad, ":lek"=>$lek));
                    
                        $database->close();
                    }
              
                    else
                    {
                        $insertStanje="Insert into stanje(lek_id, kolicina_stanje, stanje_komad) values(:lek, :kolicina_stanje, :komad_stanje)";
                        $rezStanje = $db->prepare($insertStanje);
                        $rezStanje->execute(array(':lek'=>$lek, ':kolicina_stanje'=>$kolicina, ':komad_stanje'=>$komad));
                    }
                    //kraj probe
                    
                    //dodaj kolicinu po komadu
                    
                    $insertUlaz="Insert into ulaz_lekova(lek_id, kolicina, datumUlaza, ukupna_cena) values (:lek, :kolicina, :datumUlaza, :ukupno)";
                    $prepare =$db->prepare($insertUlaz);

                    $prepare->execute(array(":lek"=>$lek, ":kolicina"=>$kolicina, ":datumUlaza"=>$tsDatumUnosa, ":ukupno"=>$ukupnaCena));

                    //$rezInsert=mysqli_query($konekcija, $insertUlaz);
          
                    $database->close();
                     echo "<script> window.location.replace('fontawesome.php') </script>";

                }
            ?>
            </div>
                
            <?php 
                if(isset($_GET['idUlaz'])){
                    include("izmenaUlaz.php");
                }
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
