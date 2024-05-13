<?php
// declration des variables de l'environnement

$host = 'localhost';
$user = 'root';
$pass = '199716';
$db = 'shop';

try {
    $con = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}