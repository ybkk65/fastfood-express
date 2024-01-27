<?php
require './views/admin.php';






$query = "SELECT * FROM categories" ;
$response = $bdd->query($query);
$categories = $response->fetchAll();



$query = "SELECT * FROM ingredients ";
$stmt = $bdd->query($query);
$ingredients = $stmt->fetchAll(PDO::FETCH_ASSOC); 


  

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            try {


        $foodCategory = $_POST['foodCategory'];

        $query = "SELECT id FROM categories WHERE name = :foodCategory";
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':foodCategory', $foodCategory, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $categoryId = $result['id'];


      

       

        $prix = $_POST['totalPrice'];
        $nom = $_POST['name'];
        $description = $_POST['foodDescription'];


        $image_destination = '';

        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] !== '') {
            $image = $_FILES['image']['name'];
            $image_temp = $_FILES['image']['tmp_name'];
            $image_destination = 'images/' . $image;
            move_uploaded_file($image_temp, $image_destination);
        }

        $query = "INSERT INTO products (category_id, name, description, price, image_url, purchase_price) VALUES (:categoryId, :nom, :description, :prix, :image , :prix)";
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':image', $image_destination);
        $stmt->bindParam(':prix', $prix);
        $stmt->execute();

        $lastId = $bdd->lastInsertId();


        


    $ingredientNames=[];

    $query = "SELECT * FROM ingredients";
    $stmt = $bdd->query($query);
    $ingredients = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
    foreach ($ingredients as $ingredient) {
        
        $ingredientNames[] = $ingredient['id'];
    }

    
    foreach ($_POST['quantity'] as $ingredientId => $quantity) {
       
        if ($quantity > 0) {
            
            $query = "SELECT * FROM ingredients WHERE id = :id";
            $stmt = $bdd->prepare($query);
            $stmt->bindParam(':id', $ingredientId);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            
            $weight = (float)$result['poids'] * (float)$quantity;

            
            $query = "INSERT INTO product_ingredients (product_id, ingredient_id, weight_in_grams, quantity) VALUES (:product_id, :ingredient_id, :weight_in_grams, :quantity)";
            $stmt = $bdd->prepare($query);
            $stmt->bindParam(':product_id', $lastId);
            $stmt->bindParam(':ingredient_id', $result['id']);
            $stmt->bindParam(':weight_in_grams', $weight);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->execute();
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
} 

require "./views/create_product.php";