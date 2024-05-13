<?php

require 'config.php';


//  check if the form is submitted
if (isset($_POST['name']) && !empty($_POST['name'])) {
    if (isset($_POST['price']) && !empty($_POST['price'])) {
        $name = $_POST['name'];
        $decription = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $query = "INSERT INTO produit (name, description, price, image) VALUES (:name, :description, :price, :image)";
        $stmt = $con->prepare($query);
        $stmt->execute(['name' => $name, 'description' => $decription, 'price' => $price, 'image' => $image]);
        if ($stmt) {
            $data[]['message'] = 'Product added successfully';
        } else {
            $data[]['message'] = 'Failed to add product';
        }
    } else {
        $data[]['message'] = 'Price is required';
    }
} else {
    $data[]['message'] = 'please fill all fields';
}
echo json_encode($data);
