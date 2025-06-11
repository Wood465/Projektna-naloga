<?php
require_once 'povezava.php';
include_once 'seja.php';

if ($_SESSION['vloga'] !== 'admin') {
    die("Dostop zavrnjen.");
}

$ime = $_POST['ime'];
$tip = $_POST['tip'];
$opis = $_POST['opis'];
$spec = $_POST['specifikacija'];
$kolicina = $_POST['kolicina'];
$cena = $_POST['cena'];

$ime_slike = $_FILES['slika']['name'];
$tmp_slike = $_FILES['slika']['tmp_name'];
$bin = addslashes(file_get_contents($tmp_slike));


mysqli_query($link, "INSERT INTO opreme (ime, tip, opis, specifikacija, kolicina, cena) 
                     VALUES ('$ime', '$tip', '$opis', '$spec', '$kolicina','$cena')");

$id_oprema = mysqli_insert_id($link);


mysqli_query($link, "INSERT INTO slike (url, ime, id_oprema) 
                     VALUES ('$bin', '$ime_slike', $id_oprema)");


header("Location: admin.php");
?>
