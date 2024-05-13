<?php
require_once 'config.php';

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $query = "update produit set name=:name, description=:description, price=:price, image=:image where id=:id";
    $stmt = $con->prepare($query);
    $stmt->execute(['id'=>$id,'name' => $name, 'description' => $description, 'price' => $price, 'image' => $image]);
    if ($stmt->rowCount() > 0) {
        $data[]['message'] = 'the product was successfully updated';
        $data[]['status'] = 200;
    } else {
        $data[]['message'] = 'an error occurred while updating the product';
        $data[]['status'] = 400;
    }
} else {
    $data[]['message'] = 'the product you requested was not found';
    $data[]['status'] = 404;
}
echo json_encode($data);
