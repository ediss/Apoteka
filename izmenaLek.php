
<?php
	if(isset($_POST['btnIzmena']))
	{
        $idLek=$_GET['id_lek'];
		$noviLek=$_POST['tbNazivLekaNovo'];
		$novaVrsta=$_POST['ddlVrstaNovo'];
		$novaJedinica=$_POST['ddlJedinicaNovo'];
		$noviPorez=$_POST['tbPorezNovo'];
		$noviRabat=$_POST['tbRabatNovo'];
		$novaCena=$_POST['tbCenaNovo'];

		if(is_numeric($novaCena)){
			$noviIznos=($novaCena+($novaCena*$noviPorez)-($novaCena*$noviRabat));
		}

		
		
		if((!isset($_POST['tbKomadNovo']) && $_POST['tbKomadNovo'])=="/")
		{
			$komad="/";
			$cenaKomad="/";
			
		}
		else{
			if(is_numeric($_POST['tbKomadNovo'])){
				$komad=$_POST['tbKomadNovo'];
				$cenaKomad= $noviIznos/$komad;
			}
			
		}
		if($_POST['ddlJedinicaNovo']!=1)
		{
			$komad='/';
			$cenaKomad='/';
		}
		
		
		$IzmenaLek="UPDATE lekovi SET naziv_lek= :lek, vrsta_id=:vrsta, jedinica_id=:jedinica, komada=:komad, porez=:porez, rabat=:rabat, cena=:cena, iznos_po_kutiji=:kutija, iznos_po_komadu=:ukupnoKomad Where id_lek=:id";
		
		$statement = $db->prepare($IzmenaLek);
		$exe = $statement->execute(array(":lek"=>$noviLek, ":vrsta"=>$novaVrsta, ":jedinica"=>$novaJedinica, ":komad"=>$komad, ":porez"=>$noviPorez, ":rabat"=>$noviRabat, ":cena"=>$novaCena, ":kutija"=>$noviIznos, ":ukupnoKomad"=>$cenaKomad, ":id"=>$idLek));
		
		//echo "<script> window.location.replace('lekovi.php') </script>";
		 
		 //OBAVEZNO ODRADITI KADA SE RADI EDIT LEKA CIJA JE JEDINICA KOMAD ILI TABLETA DA AUTOMATSKI IZBACUJE POLJE KOMADA I UPISANU VREDNOST!
        

		
	   
	
    }
?>

<?php
	$database = new Connection();
	$db = $database ->open();
    $id   = $_GET['id_lek'];
    $upit = "Select * from (lekovi l LEFT JOIN vrsta v ON l.vrsta_id=v.id_vrsta)LEFT JOIN jedinica j on l.jedinica_id=j.id_jedinica  where l.id_lek='$id'";
	$rez  = $db->query($upit);
	
	
	//$rez=mysqli_query($konekcija,$upit);
	//while($red=mysqli_fetch_array($rez))
	if($rez->rowCount()==1)
    {
		$red = $rez->fetch();
	?>
    
		<div class='edit_formaa edit' id='edit_form'>
			<h1>Izmena leka</h1><br/>
			<form action='' method='POST'>
				<label>Lek:</label>
				<input type='text' name='tbNazivLekaNovo' value="<?php echo $red['naziv_lek']; ?>" class='form-control tbInput'>
				<div class='cleaner'></div>
				<br>

				<label>Vrsta:</label>
				<select name='ddlVrstaNovo' class='form-control'>
				<option value="<?php echo $red['id_vrsta']; ?>"><?php echo $red['naziv_vrsta'];?></option>
				
			
				<?php	
					$upitVrsta="SELECT * FROM vrsta";
					$rezVrsta = $db->query($upitVrsta);
					$vrste = $rezVrsta->fetchAll();
					foreach($vrste as $vrsta){
						echo "<option value ='".$vrsta['id_vrsta']."'>".$vrsta['naziv_vrsta']."</option>";
					}
					
				?>
				</select>
				<div class='cleaner'></div>
				<br>

				<label>Jedinica:</label>
				<select name='ddlJedinicaNovo' class='form-control'id='ddlJedinicaNovo'>
				<option value="<?php echo $red['id_jedinica']; ?>"><?php echo $red['naziv_jedinica'];?></option>
					
				<?php
					
					$upitJedinica="SELECT * FROM jedinica";
					$rezJedinica = $db->query($upitJedinica);
					$jedinice = $rezJedinica->fetchAll();
					foreach($jedinice as $jedinica){
						echo "<option value ='".$jedinica['id_jedinica']."'>".$jedinica['naziv_jedinica']."</option>";
					}
				?>
				</select>
				<div class='cleaner'></div>
				<br>

				<div class='tbKomadNovo' id='tbKomadNovo'>
                    <label>Komada:</label>
                    <input type='text' name='tbKomadNovo' id='tbKomadNovo' class='form-control' value="<?php echo $red['komada'] ?>">
                </div>
                <div class='cleaner'></div>
                <br>
				<label>Porez:</label>
				
				<?php
					$porezIzmena=$red['porez']*100;

					$porez = $red['porez'];
					//$escaped_porez = mysqli_real_escape_string($konekcija,$porez);
				?>
				<select name='tbPorezNovo' class='form-control'>
					<option value="<?php echo $porez; ?>"><?php echo $porezIzmena."%"; ?></option>";
					<option value='0.1'>10%</option>
                    <option value='0.18'>18%</option>
                    <option value='0.20'>20%</option>
				</select>

					<div class='cleaner'></div>
					<br>
				
				<label>Rabat:</label>
				
				<?php
					$rabatIzmena=$red['rabat']*100;

					$rabat = $red['rabat'];
					//$escaped_rabat = mysqli_real_escape_string($konekcija,$rabat);
				?>
				<select name='tbRabatNovo' class='form-control'>
					<option value="<?php echo $rabat; ?>"><?php echo $rabatIzmena."%"; ?></option>";
					<option value='0.05'>5%</option>
                    <option value='0.10'>10%</option>
                    <option value='0.15'>15%</option>
                    <option value='0.20'>20%</option>
				</select>

					<div class='cleaner'></div>
					<br>
					<label>Cena:</label>
					<input type='text' name='tbCenaNovo' value="<?php echo $red['cena'];?>" class='form-control tbInput'>
					<div class='cleaner'></div>
					<br>
			
					<div class='dugmici'>
						<input type='submit' name='btnIzmena' value='Izmeni' class='btn btn-primary btnUnos'>
						<input type='reset' class='btn btn-danger btnOdustani' name='btnOdustani' value='Odustani'>
					</div>

			</form> 

	</div>
  <?php  } 
  
?>