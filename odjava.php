<?php
session_start();
session_destroy();
header("Location: index.php"); // Preusmeritev nazaj na glavno stran
exit();
?>
