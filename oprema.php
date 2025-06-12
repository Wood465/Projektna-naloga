<?php
require_once 'povezava.php'; 
include_once 'seja.php'; 
include_once 'menu.php';




if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM opreme o  where o.id_oprema='$id' limit 1;";
    $result = mysqli_query($link, $query);
    $danes =date("Y-m-d") ;

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_array($result);
        $ime = $row['ime'];
        $opis = $row['opis'];
        $specifikacije = $row['specifikacija'];
        $skupna = $row['kolicina'];
        $osnovnaCena = $row['cena']; 
 


       
        $q2 = mysqli_query($link, "
            SELECT SUM(kolicina) AS zasedeno 
            FROM isposoje 
            WHERE id_oprema = $id
            AND vrnjeno = 0
        ");
        $row2 = mysqli_fetch_array($q2);
        $zasedeno = $row2['zasedeno'] ?? 0;

      
        $na_voljo = $skupna - $zasedeno;
        $q3 = mysqli_query($link,"
            SELECT MIN(datum_vrnitve) AS najblizji_vracilo 
            FROM isposoje 
            WHERE id_oprema = $id 
            AND vrnjeno = 0 
            AND datum_vrnitve >= '$danes';
        ");
        $row3 = mysqli_fetch_array($q3);
        $najblizji_vracilo = $row3['najblizji_vracilo'] ?? "neznano";


    } else {
        $ime = "Neznani izdelek";
        $opis = "Ups, nekaj je šlo narobe.";
        $specifikacije = "Ni podatkov.";
        $url = "default.png";
        $osnovnaCena = 0;
    }
    
}
?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $ime ?></title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
    <div class="vsebnik">
        
        <div class="slikovni-odsek">
            <img class="oprema-slike" src="slika.php?id=<?php echo $row['id_oprema'] ?>" alt="<?php echo $ime ?>">
        </div>
       
        <div class="informacijski-odsek">
            <h1><?php echo $ime ?></h1>
            <p><?php echo $opis ?></p>
            <p><?php echo $specifikacije ?></p>
        </div>
   
        <div class="obrazec-odsek">
            <h2>Naročilo</h2>
            <form method="GET" action="oprema.php">

                <input type="hidden" name="id_oprema" value="<?php echo $id; ?>">
                <div class="obrazec-skupina">

                    <label for="kolicina">Količina: <?php        
                    if ($na_voljo>0){
                        echo " Na voljo: $na_voljo ";
                    }
                    else {
                         echo " Na voljo: $najblizji_vracilo ";
                        }?></label>
                    <input type="number" id="kolicina" name="kolicina" min="1" required value="<?php echo $_GET['kolicina'] ?? ''; ?>">
                
                </div>
                                
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="obrazec-skupina">
                    <label for="dnevi">Število dni:</label>
              <input type="number" id="dnevi" name="dnevi" min="1" required value="<?php echo $_GET['dnevi'] ?? ''; ?>">
                </div>
                <div class="obrazec-skupina">
                    <p class="cena" id="cena">
                    Cena:
                     <?php
                    if (isset($_GET['kolicina']) && isset($_GET['dnevi'])) {
                        $kol = intval($_GET['kolicina']);
                        $dn = intval($_GET['dnevi']);
                        $izracunana = $kol * $dn * $osnovnaCena;
                        echo "<span >{$izracunana} €</span>";
                    }
                    
                    ?>

                    <button type="submit" name="akcija" value="izracun" class="gumb2" >Izračunaj</button><br>
                   
                </p>

                </div>
                


            </form>
            <form method="POST" action="narocilo.php">
                <input type="hidden" name="id_oprema" value="<?php echo $id; ?>">
                <input type="hidden" name="kolicina" value="<?php echo $_GET['kolicina'] ?? ''; ?>">
                <input type="hidden" name="dnevi" value="<?php echo $_GET['dnevi'] ?? ''; ?>">
                <button type="submit" class="gumb" 
                    <?php 
                        if (!isset($_GET['akcija']) || $_GET['akcija'] !== 'izracun') {
                            echo 'disabled';
                        }
                    ?>>
                    Oddaj naročilo
                </button>
            </form>

        </div>
    </div>
</body>
</html>
