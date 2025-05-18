<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kolo - Najem</title>
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
        .slika {
            flex: 1;
        }
        .slika img {
            width: 100%;
            border-radius: 8px;
        }
        .info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .info h1 {
            color: rgb(184, 59, 59);
            margin: 0 0 20px;
        }
        .info p {
            color: #333;
            line-height: 1.6;
        }
        .obrazec {
            flex: 1;
            padding: 20px;
            background-color: rgb(245, 245, 245);
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .obrazec h2 {
            margin: 0 0 20px;
        }
        .vnos {
            margin-bottom: 20px;
        }
        .vnos label {
            display: block;
            margin-bottom: 10px;
        }
        .vnos input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .vnos gumb {
            background-color: rgb(184, 59, 59);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .vnos gumb:hover {
            background-color: darkred;
        }
        .cena {
            font-size: 20px;
            font-weight: bold;
            color: rgb(184, 59, 59);
        }
        .nazaj {
            position: sticky;
            top: 10px;
            right: 10px;
            float: right;
        }
        .nazaj button {
            background-color: orange;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .nazaj button:hover {
            background-color: rgb(255, 102, 0);
        }
    </style>
    <script>
        function izracunajCeno() {
            const dnevnaCena = 10; // Cena na dan za kolo
            const kolicina = parseInt(document.getElementById("kolicina").value) || 0;
            const dnevi = parseInt(document.getElementById("dnevi").value) || 0;
            const skupaj = dnevnaCena * kolicina * dnevi;
            document.getElementById("cena").innerText = `Cena: €${skupaj}`;
        }
    </script>
    <div class="nazaj">
        <button onclick="window.location.href='glavna_stran.php'">Nazaj na Glavno Stran</button>
    </div>
</head>
<body>
    <div class="container">
        <!-- Sekcija za sliko -->
        <div class="slika">
            <img src="gorsko-kolo.jpeg" alt="Kolo">
        </div>
        <!-- Informacijska sekcija -->
        <div class="info">
            <h1>Kolo za najem</h1>
            <p>
                Naša kolesa so idealna za vse vrste terena, od mestnih ulic do gorskih poti. 
                Ponašajo se z udobjem in vzdržljivostjo, ki omogočata brezskrbno kolesarjenje.
            </p>
            <p>
                <strong>Specifikacije:</strong>
                <ul>
                    <li>Tip: Gorsko kolo</li>
                    <li>Material: Aluminijast okvir</li>
                    <li>Prestave: 21 hitrosti</li>
                    <li>Velikost koles: 29 palcev</li>
                </ul>
            </p>
            <p>
                Kolesa so redno servisirana in primerna za kratkoročni ali dolgoročni najem. 
                Cena vključuje osnovno vzdrževanje in čelado.
            </p>
        </div>
        <!-- Obrazec za naročilo -->
        <div class="obrazec">
            <h2>Naročilo</h2>
            <div class="vnos">
                <label for="kolicina">Količina (število koles):</label>
                <input type="number" id="kolicina" name="kolicina" min="1" onchange="izracunajCeno()">
            </div>
            <div class="vnos">
                <label for="dnevi">Število dni:</label>
                <input type="number" id="dnevi" name="dnevi" min="1" onchange="izracunajCeno()">
            </div>
            <div class="vnos">
                <p id="cena" class="cena">Cena: €0</p>
            </div>
            <div class="vnos">
                <button type="button" onclick="alert('Uspešno naročeno!')">Oddaj naročilo</button>
            </div>
        </div>
    </div>
</body>
</html>
