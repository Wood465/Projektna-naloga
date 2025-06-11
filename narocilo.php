<?php
require_once 'povezava.php';
include_once 'seja.php';


if (!isset($_SESSION['idu'])) {
    echo "<p>Morate biti prijavljeni, da lahko naročite .</p>";
      header("refresh:4;url=prijava.php"); 
    exit();
}

if (isset($_POST['id_oprema'])) {
    $id_oprema = intval($_POST['id_oprema']);
    $kolicina = intval($_POST['kolicina']);
    $dnevi = intval($_POST['dnevi']);
    $idu = $_SESSION['idu'];

    
    $datumIzposoje = date("Y-m-d", strtotime("+1 day")) . " 00:00:00";
    $datumVrnitev = date("Y-m-d", strtotime("+1 day +$dnevi days")) . " 00:00:00";


  
    

  
    $sql = "SELECT kolicina,cena FROM opreme WHERE id_oprema = $id_oprema";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    $skupna_kolicina = $row['kolicina'];
    $osnovnaCena = $row['cena'];
    $cena = $osnovnaCena  * $kolicina * $dnevi;
   
    $sql2 = "
        SELECT SUM(kolicina) AS zasedeno
        FROM isposoje
        WHERE id_oprema = $id_oprema
        AND vrnjeno = 0;
    ";
    $res2 = mysqli_query($link, $sql2);
    $row2 = mysqli_fetch_array($res2);
    $zasedeno = $row2['zasedeno'] ?? 0;

    $na_voljo = $skupna_kolicina - $zasedeno;
  header("refresh:3;url=index.php"); 
    if ($kolicina > $na_voljo) {
        echo "<p>Na voljo je samo $na_voljo kosov v izbranem terminu.</p>";
        exit;
    }

  
    $query = "
        INSERT INTO isposoje (datum_izposoje, datum_vrnitve, Id_Uporabniki, cena, kolicina, id_oprema)
        VALUES ('$datumIzposoje', '$datumVrnitev', $idu, $cena, $kolicina, $id_oprema)
    ";

    if (mysqli_query($link, $query)) {
        echo "<p>Izposoja uspešna! Hvala za vaš nakup.</p>";
    } else {
        echo "<p>Napaka pri vnosu: " . mysqli_error($link) . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Hvala za nakup</title>
</head>
<body>
    <h1>HVALA ZA NAKUP</h1>
</body>
</html>
