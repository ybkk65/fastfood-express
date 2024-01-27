<?php
session_start();

require './abstracts/BurgerSchema.php';
require './classes/Burger.php';
require './classes/Calorie.php';
require './classes/BurgerIngredients.php';

require './connexion.php';

$availableRoutes = ['contact', 'admin', 'login', 'register',  'user','logout','homepage','categorie','product','ingredients','create_product'];

$route = 'homepage';
if (isset($_GET['page']) and in_array($_GET['page'], $availableRoutes)) {
    $route = $_GET['page'];
}


    require './views/layout.php';   
