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
  
    <form method="GET" class="centriraj">
    <input type="text" name="iskanje" placeholder="Išči po imenu">
    <select name="tip">
        <option value="">Vsi tipi</option>
      
        <?php 

        $query = "SELECT DISTINCT o.tip FROM opreme o";
        
        $tipi = mysqli_query($link, $query);
        while ($row = mysqli_fetch_array($tipi)) { ?>
            <option value="<?php echo ($row['tip']) ?>"><?php echo ($row['tip']) ?></option>
        <?php } ?>


    </select>
    <input type="submit" value="Filtriraj">
</form>

<?php

$iskanje = isset($_GET['iskanje']) ? mysqli_real_escape_string($link,$_GET['iskanje']) : '';
$tip = isset($_GET['tip']) ? mysqli_real_escape_string($link,$_GET['tip']) : '';

$query = "SELECT o.id_oprema, o.ime AS oprema_ime, o.opis, o.specifikacija, sl.url, sl.ime AS slika_ime 
          FROM opreme o 
          INNER JOIN slike sl ON o.id_oprema = sl.id_oprema 
          WHERE 1=1";

if (!empty($iskanje)) {
    $query .= " AND o.ime LIKE '%" . $iskanje . "%'";
}
if (!empty($tip)) {
    $query .= " AND o.tip = '" .  $tip . "'";
}

$result = mysqli_query($link, $query);

echo '<div class="container">';

while ($row = mysqli_fetch_array($result)) {
 ?>   
    <div class="obrazec" >
    <h1><?php echo htmlspecialchars($row['oprema_ime']) ?></h1>
    <div class="izdelek">
    <a href="oprema.php?id=<?php echo $row['id_oprema'] ?>">
    <img src="slika.php?id=<?php echo $row['id_oprema'] ?>" alt="<?php echo htmlspecialchars($row['slika_ime'])  ?>">
    </a>
    </div>
     <a class="gumb" href="oprema.php?id=<?php echo $row['id_oprema'] ?>">NAKUP</a>
   </div>
<?php } 
?>
</div>


</body>
</html>
