<?php
include_once 'prijava.php';
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Najemni Sistem</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(184, 59, 59);
            margin: 0;
            padding: 0;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: white;
            padding: 10px 20px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .menu {
            display: flex;
            gap: 20px;
        }
        .menu a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }
        .menu a:hover {
            text-decoration: underline;
        }
        .iskanje {
            display: flex;
            gap: 10px;
        }
        .iskanje input {
            padding: 5px;
            border: none;
            border-radius: 4px;
        }
        .domov {
            cursor: pointer;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 20px;
            margin: 20px;
        }
        .obrazec {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            flex: 1;
            min-width: 250px;
            max-width: 300px;
        }
        h1 {
            color: #333;
        }
        .izdelek {
            margin: 10px 0;
        }
        .izdelek img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 4px;
            cursor: pointer;
        }
        .gumb {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        .gumb:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="domov" onclick="location.reload()">🏠</div>
        <div class="menu">
            <a href="#" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">Menu</a>
            <a href="onas.html">O Nas</a>
        </div>
        <div class="iskanje">
            <input type="text" placeholder="Search items...">
            <button class="gumb">Search</button>
        </div>
    </div>
    <div class="container">
        <!-- Smuči -->
        <div class="obrazec" id="obrazec-1">
            <h1>Smuči</h1>
            <div class="izdelek">
                <a href="smuci.php">
                    <img src="smuci.png" alt="Smuči">
                </a>
            </div>
            <button class="gumb" onclick="location.href='smuci.php'">NAKUP</button>
        </div>
        
        <!-- Kolo -->
        <div class="obrazec" id="obrazec-2">
            <h1>Kolo</h1>
            <div class="izdelek">
                <a href="kolo.php">
                    <img src="gorsko-kolo.jpeg" alt="Kolo">
                </a>
            </div>
            <button class="gumb" onclick="location.href='kolo.php'">NAKUP</button>
        </div>

        <!-- Avto -->
        <div class="obrazec" id="obrazec-3">
            <h1>Avto</h1>
            <div class="izdelek">
                <a href="avto.php">
                    <img src="avto.png" alt="Avto">
                </a>
            </div>
            <button class="gumb" onclick="location.href='avto.php'">NAKUP</button>
        </div>

        <!-- Prenosniki -->
        <div class="obrazec" id="obrazec-4">
            <h1>Prenosniki</h1>
            <div class="izdelek">
                <a href="prenosnik.php">
                    <img src="prenosnik.jpg" alt="Prenosnik">
                </a>
            </div>
            <button class="gumb" onclick="location.href='prenosnik.php'">NAKUP</button>
        </div>
    </div>
</body>
</html>
