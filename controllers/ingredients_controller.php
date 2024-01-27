<?php 

require './views/admin.php'; 
require './views/ingredients.php'; 


use projetfullstack1\classes\Calorie ;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try { 

        $name = $_POST['nom'];  
        $poids = $_POST['poids'];
        $glucides = $_POST['glucides'];
        $lipides = $_POST['lipides'];
        $proteines = $_POST['proteines']; 

    
       


        $query = "INSERT INTO ingredients (name , poids, glucides , lipides , proteines) VALUES (:name , :poids , :glucides , :lipides , :proteines )";

        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':poids', $poids);
        $stmt->bindParam(':glucides', $glucides);
        $stmt->bindParam(':lipides', $lipides);
        $stmt->bindParam(':proteines', $proteines);
        $stmt->execute();

    } catch (PDOException $e) {
        $_SESSION['message'] = "Erreur lors de l'ajout du produit : " . $e->getMessage();
    }
} 


/* a utiliser apres pour supp 
if (isset($_POST['supprimer'])) {
    $idIngredient = $_POST['id_ingredient'];

    $query = "DELETE FROM ingredients WHERE id = :id";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':id', $idIngredient);
    $stmt->execute();

    $_SESSION['message'] = "Ingrédient supprimé avec succès!";
}
*/