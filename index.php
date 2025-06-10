<?php
require_once 'povezava.php'; 
include_once 'seja.php'; 
include_once 'menu.php';

?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Najemni Sistem</title>
<link rel="stylesheet" href="style.css">


</head>
<body>
  
    <form method="GET" style="text-align:center; margin: 20px;">
    <input type="text" name="iskanje" placeholder="Išči po imenu">
    <select name="tip">
        <option value="">Vsi tipi</option>
        <option value="Športna oprema">Športna oprema</option>
        <option value="Vozila">Vozila</option>
        <option value="Elektronika">Elektronika</option>
    </select>
    <input type="submit" value="Filtriraj">
</form>

<?php

$iskanje = isset($_GET['iskanje']) ? $_GET['iskanje'] : '';
$tip = isset($_GET['tip']) ? $_GET['tip'] : '';

$query = "SELECT o.id_oprema, o.ime AS oprema_ime, o.opis, o.specifikacija, sl.url, sl.ime AS slika_ime 
          FROM opreme o 
          INNER JOIN slike sl ON o.id_oprema = sl.id_oprema 
          WHERE 1=1";

if (!empty($iskanje)) {
    $query .= " AND o.ime LIKE '%" . mysqli_real_escape_string($link, $iskanje) . "%'";
}
if (!empty($tip)) {
    $query .= " AND o.tip = '" . mysqli_real_escape_string($link, $tip) . "'";
}


$result = mysqli_query($link, $query);




echo '<div class="container">';

while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="obrazec" id="obrazec-' . htmlspecialchars($row['id_oprema']) . '">';
    echo '<h1>' . htmlspecialchars($row['oprema_ime']) . '</h1>';
    echo '<div class="izdelek">';
    echo '<a href="oprema.php?id=' . htmlspecialchars($row['id_oprema']) . '">';
    echo '<img src="slika.php?id=' . htmlspecialchars($row['id_oprema']) . '" alt="' . htmlspecialchars($row['slika_ime']) . '">';
    echo '</a>';
    echo '</div>';
    echo '<a class="gumb" href="oprema.php?id=' . htmlspecialchars($row['id_oprema']) . '">NAKUP</a>';
    echo '</div>';
}
echo '</div>';

?>
</body>
</html>
