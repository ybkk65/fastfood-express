<?php 





if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $query = "DELETE * FROM products WHERE id = :id";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':id', $delete_id);
    $stmt->execute();
   
}

$query = "SELECT * FROM products";
$response = $bdd->query($query);
$datas = $response->fetchAll();


require './views/admin.php'; 
require './views/dispo_product.php'; 