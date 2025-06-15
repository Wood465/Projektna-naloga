
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izposojevalnica</title>
</head>
<body>
    
    <div class="navigacija">
        <div class="domov">
            <a href="index.php">Dom</a>
        </div>
    <div class="menu">
        <a href="#">Na vrh</a>
        <a href="onas.php">O Nas</a>
        <?php
        if (isset($_SESSION['vloga']) && $_SESSION['vloga'] === 'admin') {
            echo '<a href="admin.php">Admin pogled</a>';
        }
        ?>
        <?php
    if (isset($_SESSION['log'])) {
        echo '<a href="moje_izposoje.php">Moje izposoje</a>';
    }
    ?>

</div>


<div class="user-info">
<?php
if (isset($_SESSION['log']) && $_SESSION['log'] === TRUE) {
    echo "<span>Prijavljen: {$_SESSION['name']} {$_SESSION['surname']}</span> ";
    echo "<a href='odjava.php' class='odjava-link'>Odjava</a>";
} else {
    echo "<a href='prijava.php' class='odjava-link'>Prijava</a>";
}
?>
</div>

    </div>

<div class="noga">
    <p>Zaključna naloga - Jan Lesjak   <a class ="viri" href="viri.php">moji viri</a> </p> 
</div>   

</body>
</html>