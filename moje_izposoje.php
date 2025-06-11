<?php

require_once 'povezava.php'; 
include_once 'seja.php'; 
include_once 'menu.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    
if (!isset($_SESSION['log'])) {
    die("Najprej se prijavite.");
}

$id_uporabnik = $_SESSION['idu'];

$result = mysqli_query($link, "
    SELECT i.*, o.ime AS izdelek_ime,
           DATEDIFF(i.datum_vrnitve, CURDATE()) AS razlika_dni
    FROM isposoje i
    JOIN opreme o ON i.id_oprema = o.id_oprema
    WHERE i.Id_Uporabniki = $id_uporabnik
      AND i.vrnjeno = 0
");


echo "<h1>Moje aktivne izposoje</h1>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Izdelek</th><th>Količina</th><th>Vrnjeno do</th><th>Dejanje</th></tr>";

while ($row = mysqli_fetch_array($result)) {

$razlika_dni = $row['razlika_dni'];

    if ($razlika_dni > 1) {
        $class = "gumb-vrni gumb-zelen";
    } elseif ($razlika_dni >= 0) {
        $class = "gumb-vrni gumb-rumen";
    } else {
        $class = "gumb-vrni gumb-rdec";
    }



    echo "<tr>";
    echo "<td>{$row['izdelek_ime']}</td>";
    echo "<td>{$row['kolicina']}</td>";
    echo "<td>{$row['datum_vrnitve']}</td>";
    echo "<td>
            <form method='POST' action='vrni_izdelek.php'>
                <input type='hidden' name='id_isposoje' value='{$row['id_isposoje']}'>
                <button type='submit' class='$class'>Vrni</button>
            </form>
        </td>";

    echo "</tr>";
}
echo "</table>";
    ?>
</body>
</html>