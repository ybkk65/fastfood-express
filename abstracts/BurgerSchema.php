<?php

namespace projetfullstack1\abstracts;

abstract class BurgerSchema {
    const BUNS = 1;
    const STEAK = 1;
    const SALADE = 1;
    const FROMAGE = 1;
    const TOMATE = 1;
    const SAUCE = 1;

    private int $price;

    public abstract function create();
  

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function hydrate(array $props) {
        foreach ($props as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
