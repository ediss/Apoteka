<?php
    include('header.php');
    include('left_side.php');
?>

<!--sidebar end-->
<!--main content start-->
       
<section id="main-content">
	<section class="wrapper">
		<div class="wthree-font-awesome">
  

       
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
                        <th>Komad</th>
                        <th>Kolicina</th>
                        <th>Ukupna cena izlaza po kolicini</th>
                        <th>Cena izlaza po komadu</th>
                        <th>Datum izlaza</th>
						<th>Izmeni</th>
						<th>Obrisi</th>
                    </tr>
                    </thead>
                    <?php
                        include_once('konekcija.php');
                        $database = new Connection();
                        $db = $database->open();

                        $po_strani=5;

                        $upitPaginacija="SELECT * FROM izlaz_lekova";
                        $rezPaginacija = $db->query($upitPaginacija);
                        
                        $brojZapisa = count($rezPaginacija->fetchAll());
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
                            echo"<li class='page-item'><a class='page-link' href='izlaz_lekova.php?strana=".$strana."'>".$strana."</a></li>";
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
						//include('konekcija.php');
                        //$upitPrikazLekova="Select * from ((izlaz_lekova ul LEFT JOIN jedinica j on ul.jedinica_id=j.id_jedinica) LEFT JOIN vrsta v on ul.vrsta_id=v.id_vrsta)LEFT JOIN lekovi l on ul.lek_id=l.id_lek ORDER BY datum_izlaza DESC LIMIT ".$limit.','.$po_strani."";
                        $prikazLekova="Select * from ((izlaz_lekova ul LEFT JOIN lekovi l on ul.lek_id=l.id_lek) LEFT JOIN vrsta v on l.vrsta_id=v.id_vrsta)LEFT JOIN jedinica j on l.jedinica_id=j.id_jedinica ORDER BY ul.datum_izlaza DESC LIMIT ".$limit.','.$po_strani."";
                        $rez3 = $db->query($prikazLekova);
                        
                        $rows = $rez3->fetchAll();
                        $counter = 0;
                        
                        foreach($rows as $row){
                            $counter++;
                            $datumUnosa=date('d-M-Y',$row['datum_izlaza']);
                        ?>
                        <tr>
							<td><?php echo $counter;?></td>
                            <td><?php echo $row['naziv_lek'];?></td>
                            <td><?php echo $row['naziv_vrsta'];?></td>
                            <td><?php echo $row['naziv_jedinica'];?></td>
                            <?php
                                if(($row['komada_izlaz'])==0)
                                {
                                    echo "<td>/</td>";
                                }
                                else
                                {
                                    echo"<td>".$row['komada_izlaz']."</td>";
                                }

                                if(($row['kolicina_izlaz'])==0)
                                {
                                    echo "<td>/</td>";
                                }
                                else
                                {
                                    echo"<td>".$row['kolicina_izlaz']."</td>";
                                }
                               ?> 
                            <td><?php echo $row['ukupna_cena_kolicina_izlaz'];?></td>
                            <td><?php echo $row['ukupna_cena_komad_izlaz'];?></td>
                            <td class='datum'><?php echo $datumUnosa; ?></td>
                            <td><a  onclick='return edit_form();' href='izlaz_lekova.php?idIzlaz=<?php echo $row['id_izalz']?>&idLek=<?php echo $row['lek_id'];?>&idVrsta=<?php echo $row['vrsta_id'];?>&idJedinica=<?php echo $row['jedinica_id'];?>'><i class='fas fa-edit fa-lg'></i></a></td>
							<td><a  onclick='return confirm_alert(this);' href='brisanje.php?idIzlaz=<?php echo $row['id_izalz']?>'><i class='fa fa-times fa-lg' name='brisanje' aria-hidden='true'></i></a></td>
						</tr>
                                <?php
                        }
					
                        
                
						?>

				</table>
					
                </div>

                </div>
                <div class='cleaner'></div>
                          <h1>Izlaz lekova <img src='images/pill.png' ></h1>
            <div class='unos2'>
            <form action='' method='POST'>
                <label>Naziv leka:</label>
                <select name='artical' class='form-control' onchange="vrednostLeka(this.value)">
                    <option value='0'>Izaberi lek</option>
                <?php
                    //include('konekcija.php');
                    $upitPrikaz="Select * from lekovi";
                    //$rez=mysqli_query($konekcija, $upitPrikaz);
                    $rez = $db->query($upitPrikaz);

                    foreach($rez->fetchall() as $row){
                        echo "<option value =".$row['id_lek'].">".$row['naziv_lek']."";
                    }
              
                ?>
                </select>
                <div class='cleaner'></div>
                <br>
               
             
               
               <div  id='poKomadu'>
              
                </div>
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
                    //include('konekcija.php');        
                    $lek=$_POST['artical'];
                    
                    $upitPrikazLekova="Select * from lekovi where id_lek= ? ";
                    $result = $db->prepare($upitPrikazLekova);
                    $result->execute(array($lek));

                    if($result->rowCount()==1){
                        $row = $result->fetch();

                        $cena=$row['iznos_po_kutiji'];
                        $cenaPoKomadu=$row['iznos_po_komadu'];
                        $poKomadu=$row['komada'];
                        if(isset($_POST['tbKolicina'])&& $_POST['tbKolicina']!='')
                        {
                            $kolicina=$_POST['tbKolicina'];
                            $cenaKolicina = $cena*$kolicina;
                        }
                        else
                        {
                            $kolicina="/";
                            $cenaKolicina="/";
                        }

                        $datumUnosa=$_POST['datum4'];
                        $tsDatumUnosa = strtotime($datumUnosa);
                        
                        if(isset($_POST['tbKomad'])&& $_POST['tbKomad']!='')
                        {
                            $komada=$_POST['tbKomad'];
                            $cenaKomad=$cenaPoKomadu*$komada;
                            $kolicina=$komada/$poKomadu;
                        }
                        else
                        {
                            $komada="/";
                            $cenaKomad="/";  
                        }
                    }
                    
                 
               
                    
                    //proba

                    $upitStanje="Select * from stanje where lek_id= ?";
                    $rezStanje= $db->prepare($upitStanje);
                    $rezStanje->execute(array($lek));

                    if($rezStanje->rowCount()>0){
                        
                        $updateStanje="UPDATE stanje set kolicina_stanje=kolicina_stanje-:kolicina, stanje_komad=stanje_komad-:komad where lek_id=:id";
                        $resultUpdate = $db -> prepare($updateStanje);
                        $resultUpdate->execute(array(":kolicina"=>$kolicina, ":komad"=>$komada, ":id"=>$lek));
                       
                    }
                
               
                
                    //kraj probe

                    $upitInsert="Insert into izlaz_lekova(lek_id, komada_izlaz, kolicina_izlaz, ukupna_cena_kolicina_izlaz, datum_izlaza, ukupna_cena_komad_izlaz) values (:lek, :komada, :kolicina, :cenaKolicina, :datumUnosa, :cenaKomad)";
                    $resultInsert = $db->prepare($upitInsert);
                    $resultInsert->execute(array(":lek"=>$lek, ":komada"=>$komada, ":kolicina"=>$kolicina, ":cenaKolicina"=>$cenaKolicina, ":datumUnosa"=>$tsDatumUnosa, ":cenaKomad"=>$cenaKomad));
                    
                   

                    //echo $datum;
                    echo "<script> window.location.replace('izlaz_lekova.php') </script>";
                    
                }
            ?>
            </div>
                <div class='cleaner'></div>
                <?php 

if(isset($_GET['idUlaz']))
{
    //include("izmenaUlaz.php");
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
