
<?php
	$database = new Connection();
	$db = $database->open();
	if(isset($_POST['btnIzmena']))
	{
        $idUlaz=$_GET['idUlaz'];
		$noviLek=$_POST['ddlNazivLekNovo'];
		
		$upitPrikazLekova="Select * from lekovi where id_lek= ? ";
		//$result= $db -> query($upitPrikazLekova);
		$result = $db->prepare($upitPrikazLekova);
		$result ->execute(array($noviLek));
			
		$row=$result->fetch();
		
		$cena=$row['iznos_po_kutiji'];	
        $novoKolicina=$_POST['tbKolicinaNovo'];
        $ukupnaCena = $cena*$novoKolicina;
        $datumUnosa=$_POST['datumNovo'];
        $tsDatumUnosa = strtotime($datumUnosa);
		$dateNovo=$_POST['datumNovo'];
		$datumNovo=strtotime($dateNovo);

		$IzmenaUlaz="UPDATE ulaz_lekova SET lek_id=:lek,  kolicina=:kolicina, datumUlaza=:datum, ukupna_cena=:ukupnaCena Where id_ulaz=:id";

		$rezIzmena = $db->prepare($IzmenaUlaz);
		$rezIzmena->execute(array(":lek"=>$noviLek, ":kolicina"=>$novoKolicina, ":datum"=>$datumNovo,":ukupnaCena"=>$ukupnaCena, ":id"=>$idUlaz));
		
        echo "<script> window.location.replace('fontawesome.php') </script>";
        
    }
?>



<?php
		include_once('konekcija.php');
		$database = new Connection();
		$db = $database->open();
		$idUlaz=$_GET['idUlaz'];
		//$upitPrikazLekova="Select * from ((ulaz_lekova ul LEFT JOIN jedinica j on ul.jedinica_id=j.id_jedinica) LEFT JOIN vrsta v on ul.vrsta_id=v.id_vrsta)LEFT JOIN lekovi l on ul.lek_id=l.id_lek where ul.id_ulaz='$idUlaz'";
		$prikazIzmeneLekova="Select * from ((ulaz_lekova ul LEFT JOIN lekovi l on ul.lek_id=l.id_lek) LEFT JOIN vrsta v on l.vrsta_id=v.id_vrsta)LEFT JOIN jedinica j on l.jedinica_id=j.id_jedinica where ul.id_ulaz = ? ";
		//$result = $db->query($prikazIzmeneLekova);
		$result = $db->prepare($prikazIzmeneLekova);
		$result->execute(array($idUlaz));
		
		//$rowsUlaz = $result->fetchAll();
		$counter = 0;
		
		if($result->rowCount()==1){
			$row = $result->fetch();
			$datumUnosa=date('d-m-Y',$row['datumUlaza']);

			$kolicina = $row['kolicina'];
		
			
		?>
		<div class='edit_formaqa ediqt' id='edit_form'>

			<h1>Izmena ulaza</h1><br/>
				<form action='' method ='POST'>
					<label>Naziv:</label>

					<select name='ddlNazivLekNovo' class='form-control'>

						<?php
						$sql="Select * from lekovi";
						$result = $db->query($sql);

						$rowsDrugs = $result->fetchAll();

						foreach($rowsDrugs as $row){
							if($row['id_lek']==$_GET['idLek']){
								$selected ='selected';
								echo"<option value='".$row['id_lek']."' ".$selected.">".$row['naziv_lek']."</option> ";
							}
							else{
								/*$selected='';*/
								echo"<option value='".$row['id_lek']."'>".$row['naziv_lek']."</option> ";
							}

						}
						?>
					</select>
					<div class='cleaner'></div><br/>

					<label>Kolicina:</label>
						<input type='text' name='tbKolicinaNovo' class='form-control' value="<?php echo $kolicina ?>">
					<div class='cleaner'></div><br/>

					<label>Datum:</label>
						<input type='text'  id='datepicker2' value="<?php echo $datumUnosa ?>" class='input-group date datum form-control' name='datumNovo' data-date-format='dd-mm-yyyy'>
					<div class='cleaner'></div><br/>

					<div class='dugmici'>
						<input type='submit' name='btnIzmena' value='Izmeni' class='btn btn-primary btnUnos'>
						<input type='reset' class='btn btn-danger btnOdustani' name='btnOdustani' value='Odustani'>
					</div>
				</form>
		</div>	
	<?php
		}
	?>
		
			
	

      
			
      