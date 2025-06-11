<?php
require_once 'povezava.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT url, tip FROM slike WHERE id_oprema = $id LIMIT 1";
    $result = mysqli_query($link, $sql);
    
    if ($row = mysqli_fetch_array($result)) {
        header("Content-Type: " . $row['tip']);
        echo $row['url'];
        exit;
    }
}


?>