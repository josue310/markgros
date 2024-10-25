<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=markgros;charset=utf8', 'root', 'josue2005');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>