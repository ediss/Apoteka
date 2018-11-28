<?php
$q=$_GET["q"];


include_once('konekcija.php');
$database = new Connection();
$db = $database->open();

$upit="Select * from lekovi where id_lek= ? ";
$rez = $db->prepare($upit);
$rez->execute(array($q));

if($rez->rowCount()==1){
    $row = $rez->fetch();

    if($row['jedinica_id']==1 || $row['jedinica_id']==2 || $row['jedinica_id']==3 || $row['jedinica_id']==4)
    {
        echo " <label>Komada:</label>
               <input type='text' name='tbKomad'  class='form-control'>";
    }
    else
    {
        echo"<label>Kolicina:</label>
             <input type='text' name='tbKolicina' placeholder='kolicina' class='form-control kolicina'>";
    }
}




?>