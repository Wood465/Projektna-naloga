<?php
require_once 'povezava.php'; 

if (isset($_POST['register'])) {
    $ime = mysqli_real_escape_string($link, $_POST['ime']);
    $priimek = mysqli_real_escape_string($link, $_POST['priimek']);
    $email = mysqli_real_escape_string($link, $_POST['e_naslov']);
    $geslo = mysqli_real_escape_string($link, $_POST['geslo']);
    $geslo2 = sha1($geslo); 

    
    $checkQuery = "SELECT * FROM uporabniki WHERE `e-naslov` = '$e_naslov';";
    $checkResult = mysqli_query($link, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "Uporabnik s tem e-naslovom že obstaja.";
    } else {
       
        $insertQuery = "INSERT INTO uporabniki (ime, priimek, `e-naslov`, geslo) VALUES ('$ime', '$priimek', '$e_naslov', '$geslo2');";
        if (mysqli_query($link, $insertQuery)) {
            echo "Registracija uspešna! Sedaj se lahko prijavite.";
          
             header("refresh:2;url=prijava.php"); 
            exit;
        } else {
            echo "Napaka pri registraciji: " . mysqli_error($link);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="registracija">
        <h2>Registrirajte se</h2>
        <form action="#" method="post">
            <p>
                <input type="text" name="ime" class="polje" placeholder="Vnesi ime" required>
            </p>
            <p>
                <input type="text" name="priimek" class="polje" placeholder="Vnesi priimek" required>
            </p>
            <p>
                <input type="email" name="e_naslov" class="polje" placeholder="Vnesi e-naslov" required>
            </p>
            <p>
                <input type="password" name="geslo" class="polje" placeholder="Vnesi geslo" required>
            </p>
            <p>
                <input type="submit" name="register" class="gumb" value="Registracija">
            </p>
        </form>
        <br>
        <a href="prijava.php" class="povezava">Nazaj na prijavo</a>
        <a href="index.php" class="povezava">Nazaj na Glavno Stran</a>
    </div>
</body>
</html>

