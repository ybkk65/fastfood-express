<?php
namespace projetfullstack1\classes;
require 'connexion.php';


use projetfullstack1\abstracts\BurgerSchema;
use projetfullstack1\classes\BurgerIngredients;





class Burger extends BurgerSchema {
    private $ingredients = [];

    public function addIngredient(BurgerIngredients $ingredient, $quantite = 1) {
        $this->ingredients[] = ['ingredient' => $ingredient, 'quantite' => $quantite];


    }


    public function poidsBurger() {
        $totalPoids = 0;

        foreach ($this->ingredients as $ingredient) {
            $totalPoids += $ingredient['ingredient']->getPoids() * $ingredient['quantite'];
        }

        return $totalPoids;
    }



    public function calculerTotalNutriments() {
        $totalLipides = 0;
        $totalGlucides = 0;
        $totalProteines = 0;
        $totalCalories = 0;

        foreach ($this->ingredients as $ingredient) {
            $totalLipides += $ingredient['ingredient']->getLipide() * $ingredient['quantite'];
            $totalGlucides += $ingredient['ingredient']->getGlucide() * $ingredient['quantite'];
            $totalProteines += $ingredient['ingredient']->getProteine() * $ingredient['quantite'];
            $totalCalories += $ingredient['ingredient']->calculerCalories() * $ingredient['quantite'];
        }

        return [
            'totalLipides' => $totalLipides,
            'totalGlucides' => $totalGlucides,
            'totalProteines' => $totalProteines,
            'totalCalories' => $totalCalories,
        ];
    }

    public function create() {
        global $bdd;
    
        

       

    }

   
}

/*

$burger = new Burger();

$buns = new BurgerIngredients('Buns', 1, 50, 0, 100);
$steak = new BurgerIngredients('Steak', 20, 0, 26, 100);
$cheese = new BurgerIngredients('Cheese', 33,1,25,88);

$burger->addIngredient($buns, 1);
$burger->addIngredient($steak, 1);
$burger->addIngredient($cheese, 1);


$totalNutriments = $burger->calculerTotalNutriments();

echo "Total Lipides: " . $totalNutriments['totalLipides'] . "g\n";
echo "Total Glucides: " . $totalNutriments['totalGlucides'] . "g\n";
echo "Total Proteines: " . $totalNutriments['totalProteines'] . "g\n";
echo "Total Calories: " . $totalNutriments['totalCalories'] . " cal\n";
$totalPoids = $burger->poidsBurger();
echo "Total Poids du Burger: " . $totalPoids . "g\n";

*/