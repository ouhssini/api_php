<?php

require 'config.php';
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM produit WHERE id = :id";
    $stmt = $con->prepare($query);
    $stmt->execute(['id' => $id]);
    if($stmt->rowCount() > 0){
        $data[]['message'] = 'Product deleted successfully';
        $data[]['status'] = 200;
    }else{
        $data[]['message'] = 'Failed to delete product';
        $data[]['status'] = 400;
    }
}
else{
    $data[]['message'] = 'Product id is required';
    $data[]['status'] = 400;
}
echo json_encode($data);