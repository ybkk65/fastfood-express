<?php
require './views/product.php';

use projetfullstack1\abstracts\BurgerSchema;
use projetfullstack1\classes\BurgerIngredients;
use projetfullstack1\classes\Burger;
use projetfullstack1\classes\Calorie; 

if (isset($_GET['category_id'])) {
    $_SESSION['category_id'] = $_GET['category_id'];
    echo '<section id="card-container">';
    
    $query = "SELECT * FROM products WHERE category_id = :category_id";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':category_id', $_SESSION['category_id']);
    $stmt->execute();
    $datas = $stmt->fetchAll();

    

    foreach ($datas as $data) {
        $composition = '';
        $burgers = [];
        $ingredient = [];
        $idproduct = $data['id'];
        $burgerName = 'burger_' . $idproduct;
        $burgers[$burgerName] = new Burger();

        $query = "SELECT * FROM product_ingredients WHERE product_id = :product_id";
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':product_id', $idproduct);
        $stmt->execute();
        $rep = $stmt->fetchAll();

        foreach ($rep as $pro_ing) {
            $query = "SELECT * FROM ingredients WHERE id = :ingredient_id ";
            $stmt = $bdd->prepare($query);
            $stmt->bindParam(':ingredient_id', $pro_ing['ingredient_id']); 
            $stmt->execute();
            $inf= $stmt->fetchAll();

            foreach ($inf as $inf_ing) {
                $ingredientName = 'ingredient_' . $pro_ing['ingredient_id'];
                $ingredient[$ingredientName] = new BurgerIngredients($inf_ing['name'], $inf_ing['lipides'], $inf_ing['glucides'], $inf_ing['proteines'], $inf_ing['poids']);
                $burgers[$burgerName]->addIngredient($ingredient[$ingredientName], $pro_ing['quantity']);
                $composition .= $inf_ing["name"] . " x". $pro_ing["quantity"] . " " . " : " .$pro_ing["weight_in_grams"]. "gr/".  $ingredient[$ingredientName]->calculerCalories()."cal".'<br>';
               
            }
        }
        echo '<div class="cardCategorie">';
        echo '<img class="imgcard" src="' . $data['image_url'] . '" alt="' . $data['name'] . '">';
        echo '<h2>' . $data['name'] . '</h2>';
        echo '<p>' . $data['description'] . '</p>';
        echo '<p>' . $data['price'] . " €" .'</p>';
        echo '<p>' . $burgers[$burgerName]->calculerTotalNutriments()['totalCalories'] . " ". "cal" . '</p>'; 
        echo '<p>' . $composition . '</p>'; 
        echo '<button  onclick="ajouterPanier(\'' . $data['id'] . '\')">Ajouter au panier</button>';
        echo '</div>';

       
       
    }
}