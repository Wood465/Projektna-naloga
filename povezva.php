<?php
$host='localhost';
$user='root';
$password='';
$database='projektna_naloga';


$link=mysqli_connect($host,$user,$password,$database);
//or die("povezovanje ni mogoče.")

 mysqli_set_charset($link,"utf8");
?>