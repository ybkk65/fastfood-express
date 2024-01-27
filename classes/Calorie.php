<?php

namespace projetfullstack1\classes;

class Calorie {
    public function __construct(private $nom, private $lipide, private $glucide, private $proteine, private $poids) {

    }
    
   
    public function calculerCalories() {
        $calories = $this->lipide * 9 + $this->glucide * 4 + $this->proteine * 4;
        return $calories ;
    }

    public function getLipide() {
        return $this->lipide;
    }

    public function getGlucide() {
        return $this->glucide;
    }

    public function getProteine() {
        return $this->proteine;
    }

    public function getPoids(){
        return $this->poids;
    }
    
}








