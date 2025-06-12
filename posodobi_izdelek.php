<?php
require_once 'povezava.php';

$id = intval($_POST['id_oprema']);
$ime =  $_POST['ime'];
$tip =  $_POST['tip'];
$opis =  $_POST['opis'];
$spec =  $_POST['specifikacija'];
$kolicina = intval($_POST['kolicina']);
$cena = intval($_POST['cena']);

$query = "UPDATE opreme 
          SET ime='$ime', tip='$tip', opis='$opis', specifikacija='$spec', kolicina=$kolicina, cena=$cena
          WHERE id_oprema=$id";
          
mysqli_query($link, $query);

header("Location: admin.php");
exit;
?>
