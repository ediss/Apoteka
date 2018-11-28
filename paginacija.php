<?php

  $database = new Connection();
  $db = $database->open();
  $po_strani=4;

  $upitPaginacija="SELECT * FROM ulaz_lekova";
  $rezPaginacija =$db->query($upitPaginacija);
  $brojZapisa = count($rezPaginacija->fetchAll());



  $broj_strana= ceil($brojZapisa/$po_strani);

  if(!isset($_GET['strana'])){
      $strana=1;
  }
  else{
      $strana = $_GET['strana'];
  }

  $limit = ($strana-1)*$po_strani;

$database->close();
?>


