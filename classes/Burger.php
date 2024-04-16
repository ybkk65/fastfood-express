<?php
namespace projetfullstack1\classes;



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

