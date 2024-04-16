<?php

require_once './connexion.php';
require './abstracts/BurgerSchema.php';
require './classes/Burger.php';
require './classes/Calorie.php';
require './classes/BurgerIngredients.php';




$availableRoutes = ['contact', 'admin', 'login', 'register',  'user','logout','homepage','categorie','product','ingredients','create_product','dispo_product','dispo_ingredients','panier','commande'];

$route = 'homepage';
if (isset($_GET['page']) and in_array($_GET['page'], $availableRoutes)) {
    $route = $_GET['page'];
}


    require './views/layout.php';   
