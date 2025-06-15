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
    $query =  "
        SELECT i.*, o.ime AS izdelek_ime,
            DATEDIFF(i.datum_vrnitve, CURDATE()) AS razlika_dni
        FROM isposoje i
        JOIN opreme o ON i.id_oprema = o.id_oprema
        WHERE i.vrnjeno = 0
        AND i.Id_Uporabniki = $id_uporabnik;";
    $result = mysqli_query($link,$query);

?>
<div class ="kontainer">
<h1>Moje aktivne izposoje</h1>
<table  class="tabelca">
<tr><th>Izdelek</th><th>Količina</th><th>Vrnjeno do</th><th>Dejanje</th></tr>

<?php
while ($row = mysqli_fetch_array($result)) {

$razlika_dni = $row['razlika_dni'];

    if ($razlika_dni > 1) {
        $class = "gumb-vrni gumb-zelen";
    } elseif ($razlika_dni >= 0) {
        $class = "gumb-vrni gumb-rumen";
    } else {
        $class = "gumb-vrni gumb-rdec";
    }

?>

    <tr>
    <td><?php echo $row['izdelek_ime'] ?></td>
    <td><?php echo $row['kolicina'] ?></td>
    <td><?php echo $row['datum_vrnitve'] ?></td>
    <td>
            <form method='POST' action='vrni_izdelek.php'>
                <input type='hidden' name='id_isposoje' value='<?php echo $row['id_isposoje'] ?>'>
                <button type='submit' class='<?php echo  $class ?>'>Vrni</button>
            </form>
        </td>

    </tr>
<?php } ?>
</table>
   </div>
</body>
</html>