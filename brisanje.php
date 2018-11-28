<?php
		include_once('konekcija.php');
        $database = new Connection();
        $db = $database->open();
        
        @$id_lek=$_GET['id_lek'];
        @$id_jedinica=$_GET['idJedinica'];
        @$idVrsta=$_GET['idVrsta'];
        @$idUlaz=$_GET['idUlaz'];
        @$idIzlaz=$_GET['idIzlaz'];

        if(isset($_GET['id_lek']))
        {
            $upitDelete="Delete from lekovi Where id_lek ='$id_lek'";
            //$rezDel=@mysqli_query($konekcija, $upitDelete);
            $db->query($upitDelete);
            
            header('Location:lekovi.php');
            
            $database->close();
        }
        elseif(isset($_GET['idJedinica']))
        {
            $upitDelete="Delete from jedinica Where id_jedinica ='$id_jedinica'";
            //$rezDel=@mysqli_query($konekcija, $upitDelete);
            $db->query($upitDelete);
            header('Location:jedinice.php');
            $database->close();
        }
        elseif(isset($_GET['idVrsta']))
        {
            $upitDelete="Delete from vrsta Where id_vrsta ='$idVrsta'";

            $db->query($upitDelete);
            
            header('Location:vrste.php');
            
            $database->close();
            
        }
        elseif(isset($_GET['idUlaz']))
        {
            $upitDelete="Delete from ulaz_lekova Where id_ulaz ='$idUlaz'";
            $db->query($upitDelete);
            header('Location:fontawesome.php');
            $database->close();
        }
        elseif(isset($_GET['idIzlaz']))
        {
            $upitDelete="Delete from izlaz_lekova Where id_izalz ='$idIzlaz'";
            $db->query($upitDelete);
        
            header('Location:izlaz_lekova.php');
            $database->close();
        }
        
?>