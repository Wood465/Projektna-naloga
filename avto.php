<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avto - Najem</title>
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
        .container {
            max-width: 1200px;
            display: flex;
            gap: 20px;
            margin: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .slika-del {
            flex: 1;
        }
        .slika-del img {
            width: 100%;
            border-radius: 8px;
        }
        .info-del {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .info-del h1 {
            color: rgb(184, 59, 59);
            margin: 0 0 20px;
        }
        .info-del p {
            color: #333;
            line-height: 1.6;
        }
        .forma-del {
            flex: 1;
            padding: 20px;
            background-color: rgb(245, 245, 245);
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .forma-del h2 {
            margin: 0 0 20px;
        }
        .skupina-forma {
            margin-bottom: 20px;
        }
        .skupina-forma label {
            display: block;
            margin-bottom: 10px;
        }
        .skupina-forma input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .skupina-forma button {
            background-color: rgb(184, 59, 59);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .skupina-forma button:hover {
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
        .gumb-nazaj button {
            background-color: orange;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .gumb-nazaj button:hover {
            background-color: rgb(255, 102, 0);
        }
    </style>
    <script>
        function izracunajCeno() {
            const dnevnaCena = 50; // Cena na dan za avto
            const kolicina = parseInt(document.getElementById("kolicina").value) || 0;
            const dnevi = parseInt(document.getElementById("dnevi").value) || 0;
            const skupaj = dnevnaCena * kolicina * dnevi;
            document.getElementById("cena").innerText = `Cena: €${skupaj}`;
        }
    </script>
    <div class="gumb-nazaj">
        <button onclick="window.location.href='glavna_stran.php'">Nazaj na Glavno Stran</button>
    </div>
</head>
<body>
    <div class="container">
        <!-- Slika Del -->
        <div class="slika-del">
            <img src="avto.png" alt="Avto">
        </div>
        <!-- Informacije Del -->
        <div class="info-del">
            <h1>Avto za najem</h1>
            <p>
                Naš avto je idealen za dolge poti ali dnevne vožnje po mestu. 
                Nudimo zanesljivost, udobje in ekonomičnost.
            </p>
            <p>
                <strong>Specifikacije:</strong>
                <ul>
                    <li>Model: Sedan 2023</li>
                    <li>Gorivo: Bencin</li>
                    <li>Menjalnik: Samodejni</li>
                    <li>Prostornost: 5 oseb</li>
                </ul>
            </p>
            <p>
                Avto je redno servisiran in pripravljen za vožnjo. 
                Cena vključuje zavarovanje in asistenco na cesti.
            </p>
        </div>
        <!-- Forma Del -->
        <div class="forma-del">
            <h2>Naročilo</h2>
            <div class="skupina-forma">
                <label for="kolicina">Količina (število avtomobilov):</label>
                <input type="number" id="kolicina" name="kolicina" min="1" onchange="izracunajCeno()">
            </div>
            <div class="skupina-forma">
                <label for="dnevi">Število dni:</label>
                <input type="number" id="dnevi" name="dnevi" min="1" onchange="izracunajCeno()">
            </div>
            <div class="skupina-forma">
                <p id="cena" class="cena">Cena: €0</p>
            </div>
            <div class="skupina-forma">
                <button type="button" onclick="alert('Uspešno naročeno!')">Oddaj naročilo</button>
            </div>
        </div>
    </div>
</body>
</html>
