<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smuči - Najem</title>
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
        .obrazec-skupina button {
            background-color: rgb(184, 59, 59);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .obrazec-skupina button:hover {
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
            const dnevnaCena = 10; // Cena na dan
            const kolicina = parseInt(document.getElementById("kolicina").value) || 0;
            const dnevi = parseInt(document.getElementById("dnevi").value) || 0;
            const skupno = dnevnaCena * kolicina * dnevi;
            document.getElementById("cena").innerText = `Cena: €${skupno}`;
        }
    </script>
    <div class="gumb-nazaj">
        <button onclick="window.location.href='glavna_stran.php'">Nazaj na Glavno Stran</button>
    </div>
</head>
<body>
    <div class="vsebnik">
        <!-- Slikovni Odsek -->
        <div class="slikovni-odsek">
            <img src="smuci.png" alt="Smuči">
        </div>
        <!-- Informacijski Odsek -->
        <div class="informacijski-odsek">
            <h1>Smuči za najem</h1>
            <p>
                Naše smuči so vrhunske kakovosti in primerne za vse vrste snežnih razmer. 
                Nudimo različne velikosti in modele, ki bodo ustrezali začetnikom, kot tudi izkušenim smučarjem.
            </p>
            <p>
                <strong>Specifikacije:</strong>
                <ul>
                    <li>Material: Karbon in kompozit</li>
                    <li>Dolžine: 150cm, 170cm, 190cm</li>
                    <li>Vrsta: All-mountain, Carving</li>
                    <li>Vključene palice in vezi</li>
                </ul>
            </p>
            <p>
                Na voljo za kratkoročni ali dolgoročni najem. 
                Cena je zelo ugodna in vključuje servisiranje.
            </p>
        </div>
        <!-- Obrazec Odsek -->
        <div class="obrazec-odsek">
            <h2>Naročilo</h2>
            <div class="obrazec-skupina">
                <label for="kolicina">Količina (število smuči):</label>
                <input type="number" id="kolicina" name="kolicina" min="1" onchange="izracunajCeno()">
            </div>
            <div class="obrazec-skupina">
                <label for="dnevi">Število dni:</label>
                <input type="number" id="dnevi" name="dnevi" min="1" onchange="izracunajCeno()">
            </div>
            <div class="obrazec-skupina">
                <p id="cena" class="cena">Cena: €0</p>
            </div>
            <div class="obrazec-skupina">
                <button type="button" onclick="alert('Uspešno naročeno!')">Oddaj naročilo</button>
            </div>
        </div>
    </div>
</body>
</html>
