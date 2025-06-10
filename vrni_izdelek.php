<?php
require_once 'povezava.php';
include_once 'seja.php';

if (!isset($_SESSION['log']) || !isset($_POST['id_isposoje'])) {
    die("Neveljavna zahteva.");
}

$id_isposoje = intval($_POST['id_isposoje']);


$sql = "UPDATE isposoje SET vrnjeno = 1 WHERE id_isposoje = $id_isposoje";
mysqli_query($link, $sql);


header("Location: moje_izposoje.php");


?>