<?php
require_once 'povezava.php';
include_once 'seja.php';
include_once 'menu.php';
if ( $_SESSION['vloga'] !== 'admin') {
    die("Dostop zavrnjen.");
}
?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="kontainer">
        
<table class="tabelca">
<tr><th>ID</th><th>Ime</th><th>Tip</th><th>Količina</th></th><th>Cena</th><th>Dejanje</th></tr>
    <?php


$rez = mysqli_query($link, "SELECT * FROM opreme");

while ($row = mysqli_fetch_assoc($rez)) {
    echo "<tr>";
    echo "<td>{$row['id_oprema']}</td>";
    echo "<td>{$row['ime']}</td>";
    echo "<td>{$row['tip']}</td>";
    echo "<td>{$row['kolicina']}</td>";
    echo "<td>{$row['cena']}</td>";
    echo "<td>
            <form method='POST' style='display:inline;'>
                <input type='hidden' name='izbrisi_id' value='{$row['id_oprema']}'>
                <button type='submit' class='gumb gumb-izbrisi'>Izbriši</button>
            </form>
          </td>";
    echo "</tr>";
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['izbrisi_id'])) {
    $id = intval($_POST['izbrisi_id']);
    mysqli_query($link, "DELETE FROM slike WHERE id_oprema = $id");
    mysqli_query($link, "DELETE FROM opreme WHERE id_oprema = $id");
    header("Location: admin.php");
    exit;
}

?>
</table>

<h1>Admin Panel – Upravljanje izdelkov</h1>
<h2>Dodaj nov izdelek</h2>
<form action="dodaj_izdelek.php" method="POST" enctype="multipart/form-data" >
    <label>Ime:</label><br><input type="text" name="ime" required><br>
    <label>Tip:</label><br><input type="text" name="tip" required><br>
    <label>Opis:</label><br><textarea name="opis" required></textarea><br>
    <label>Specifikacije:</label><br><textarea name="specifikacija" required></textarea><br>
    <label>Količina:</label><br><input type="number" name="kolicina" required><br>
    <label>Cena:</label><br><input type="number" name="cena" required><br>
    <label>Slika:</label><br><input type="file" name="slika" accept="image/*"  required><br><br>
    <button type="submit" class="gumb gumb-dodaj">Dodaj izdelek</button>
</form>
</div>
</body>
</html>

