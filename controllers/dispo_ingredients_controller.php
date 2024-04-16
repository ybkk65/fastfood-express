<?php 



if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $query = "DELETE FROM ingredients  WHERE id = :id";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':id', $delete_id);
    $stmt->execute();
    
}


$query = "SELECT * FROM ingredients ";
$response = $bdd->query($query);
$datas = $response->fetchAll();


require './views/admin.php';
require './views/dispo_ingredients.php';