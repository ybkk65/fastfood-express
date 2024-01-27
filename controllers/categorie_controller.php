<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        
        $nom = ($_POST['name']);
        $description = ($_POST['description']);

      
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        $image_destination = 'images/' . $image;

        move_uploaded_file($image_temp, $image_destination);
     
        $query = "INSERT INTO categories (name, description, image) VALUES (:name, :description, :image)";
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':name', $nom);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image_destination); 
        $stmt->execute();

        $_SESSION['message'] = "La catégorie a été ajoutée avec succès.";
    } catch (PDOException $e) {
        $_SESSION['message'] = "Erreur lors de l'ajout de la catégorie : " . $e->getMessage();
    }


}
 require './views/admin.php'; 
require './views/categorie.php'; 



