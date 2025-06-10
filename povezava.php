<?php
$host = "localhost"; 
$username = "root"; 
$password = "";      
$database = "projektna_naloga";


$link = mysqli_connect($host, $username, $password, $database);

if (!$link) {
    die("Povezava z bazo ni uspela: " . mysqli_connect_error());
}
?>
