<?php
require_once 'povezava.php'; 
include_once 'seja.php'; 

if (isset($_POST['submit'])) {
    $e_naslov = mysqli_real_escape_string($link,$_POST['e_naslov']);
    $geslo = $_POST['geslo'];
    $geslo2 = password_hash($geslo, PASSWORD_DEFAULT); 


    
    $query = "SELECT * FROM uporabniki WHERE `e-naslov` = '$e_naslov' ";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_array($result);
         
        if (password_verify($geslo, $row['geslo']))
        {
            $_SESSION['name'] = $row['ime'];
            $_SESSION['surname'] = $row['priimek'];
            $_SESSION['idu'] = $row['Id_Uporabniki'];
            $_SESSION['log'] = TRUE;
            $_SESSION['vloga'] = $row['vloga'];
            if ($_SESSION['vloga']=="admin"){
                header("Location: admin.php");
                exit;
            }
            
        
            header("Location: index.php");
            exit; 
        } else {
            echo "Napačen e-naslov ali geslo.";
        }
    }
    else {
        echo "Napačen e-naslov ali geslo.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="prijava">
    <h2>Vnesite e-naslov in geslo</h2>
        <form action="#" method="post">
            <p>
                <input type="email" name="e_naslov" class="polje" placeholder="Vnesi e-naslov">
            </p>
            <p>
                <input type="password" name="geslo" class="polje" placeholder="Vnesi geslo">
            </p>
            <p>
                <input type="submit" name="submit" class="gumb" value="Prijava">
            </p>
        </form>
        <br>
        <a href="registracija.php" class="povezava">Ustvari račun</a>
        <a href="index.php" class="povezava">Nazaj na Glavno Stran</a>
       


  </body>
</html>
