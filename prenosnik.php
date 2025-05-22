<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prenosnik - Najem</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(240, 240, 240);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .vsebnik {
            max-width: 1200px;
            display: flex;
            gap: 20px;
            margin: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .slikovni-odsek {
            flex: 1;
        }
        .slikovni-odsek img {
            width: 100%;
            border-radius: 8px;
        }
        .informacijski-odsek {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .informacijski-odsek h1 {
            color: rgb(184, 59, 59);
            margin: 0 0 20px;
        }
        .informacijski-odsek p {
            color: #333;
            line-height: 1.6;
        }
        .obrazec-odsek {
            flex: 1;
            padding: 20px;
            background-color: rgb(245, 245, 245);
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .obrazec-odsek h2 {
            margin: 0 0 20px;
        }
        .obrazec-skupina {
            margin-bottom: 20px;
        }
        .obrazec-skupina label {
            display: block;
            margin-bottom: 10px;
        }
        .obrazec-skupina input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .gumb {
            background-color: rgb(184, 59, 59);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }
        .gumb:hover {
            background-color: darkred;
        }
        .cena {
            font-size: 20px;
            font-weight: bold;
            color: rgb(184, 59, 59);
        }
        .gumb-nazaj {
            position: sticky;
            top: 10px;
            right: 10px;
            float: right;
        }
        .gumb-nazaj a {
            background-color: orange;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .gumb-nazaj a:hover {
            background-color: rgb(255, 102, 0);
        }
    </style>
</head>
<body>
    <div class="gumb-nazaj">
        <a href="glavna_stran.php">Nazaj na Glavno Stran</a>
    </div>
    <div class="vsebnik">
        <!-- Slikovni Odsek -->
        <div class="slikovni-odsek">
            <img src="prenosnik.jpg" alt="Prenosnik">
        </div>
        <!-- Informacijski Odsek -->
        <div class="informacijski-odsek">
            <h1>Prenosnik za najem</h1>
            <p>
                Naši prenosniki so opremljeni z najnovejšo tehnologijo, ki omogoča vrhunsko produktivnost, 
                ne glede na to, ali jih potrebujete za delo, študij ali zabavo.
            </p>
            <p>
                <strong>Specifikacije:</strong>
                <ul>
                    <li>Procesor: Intel Core i7</li>
                    <li>RAM: 16GB</li>
                    <li>Disk: 512GB SSD</li>
                    <li>Zaslon: 15.6 palcev Full HD</li>
                </ul>
            </p>
            <p>
                Idealni za kratkoročno ali dolgoročno najemanje. Cena vključuje popolnoma nameščeno programsko opremo.
            </p>
        </div>
        <!-- Obrazec Odsek -->
        <div class="obrazec-odsek">
            <h2>Naročilo</h2>
            <form action="narocilo_prenosnik.php" method="POST">
                <div class="obrazec-skupina">
                    <label for="kolicina">Količina (število prenosnikov):</label>
                    <input type="number" id="kolicina" name="kolicina" min="1" required>
                </div>
                <div class="obrazec-skupina">
                    <label for="dnevi">Število dni:</label>
                    <input type="number" id="dnevi" name="dnevi" min="1" required>
                </div>
                <div class="obrazec-skupina">
                    <p class="cena">Cena: </p>
                </div>
                <div class="obrazec-skupina">
                    <button type="submit" class="gumb">Oddaj naročilo</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
