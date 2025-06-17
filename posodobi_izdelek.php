<?php
require_once 'povezava.php';

$id = intval($_POST['id_oprema']);
$ime =  mysqli_real_escape_string($link,$_POST['ime']);
$tip =  mysqli_real_escape_string($link,$_POST['tip']);
$opis =  mysqli_real_escape_string($link,$_POST['opis']);
$spec =  mysqli_real_escape_string($link,$_POST['specifikacija']);
$kolicina = intval($_POST['kolicina']);
$cena = intval($_POST['cena']);


$ime_slike = mysqli_real_escape_string($link,$_FILES['slika']['name']);
$tmp_slike = $_FILES['slika']['tmp_name'];


if ($tmp_slike !== "")
{
    $bin = addslashes(file_get_contents($tmp_slike));
    $id_oprema = intval($_POST['id_oprema']);
    $query = "UPDATE slike 
              SET ime = '$ime_slike', url = '$bin'
              WHERE id_oprema = $id_oprema ";
            
    mysqli_query($link, $query);

}

$query = "UPDATE opreme 
          SET ime='$ime', tip='$tip', opis='$opis', specifikacija='$spec', kolicina=$kolicina, cena=$cena
          WHERE id_oprema=$id";
mysqli_query($link, $query);

header("Location: admin.php");
exit; 
?>
