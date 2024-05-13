<?php
require 'config.php';

$response = [];

try {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM produit WHERE id = :id";
        $params = [':id' => $id];
    } else {
        $query = "SELECT * FROM produit";
        $params = [];
    }

    // Prepare and execute query
    $stmt = $con->prepare($query);
    $stmt->execute($params);
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if records were found
    if (count($produits) > 0) {
        $response['status'] = 'success';
        $response['status_code'] =   200;
        $response['count'] = count($produits) . " records were found";
        $response['data'] = $produits;
        http_response_code(200);
    } else {
        $response['status'] = 'error';
        $response['status_code'] =  404;
        $response['message'] = 'No records were found!';
        http_response_code(404);
    }
} catch (PDOException $e) {
    $response['status'] = 'error';
    $response['status_code'] =  500;
    $response['message'] = 'Database error: ' . $e->getMessage();
    http_response_code(500);
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
