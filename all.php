<?php 
require 'config.php';


$query = "SELECT * FROM produit";
$stmt = $con->prepare($query);
$stmt->execute();
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($produits);