<?php

namespace projetfullstack1\classes;

use projetfullstack1\classes\Produit;

class Panier extends Produit {

    private $produits;

    public function __construct() {
        $this->produits = [];
    }

    public function ajouterProduit(Produit $produit) {
        $this->produits[] = $produit;
    }

    public function viderPanier() {
        $this->produits = [];
    }

    public function nombreProduits(): int {
        return count($this->produits);
    }
    public function getTotalPrice(): int {
        $total = 0;
        foreach ($this->produits as $product) {
            $total += $product->getPrix() * $product->getQuantite();
        }
        return $total;
    }

    public function getProduits() {
        return $this->produits;
    }

    public function supprimerProduit(int $idProduit) {
        foreach ($this->produits as $key => $produit) {
            if ($produit->getId() === $idProduit) {
                unset($this->produits[$key]);
                break;
            }
        }
    }
    public function updateProduit(int $idProduit, int $sign) {
        foreach ($this->produits as $key => $produit) {
            if ($produit->getId() === $idProduit) {

                $nouvelleQuantite = $produit->getQuantite() + $sign;
            
        
                if ($nouvelleQuantite <= 0) {
                    unset($this->produits[$key]);
                } else {
                   
                    $produit->setQuantite($nouvelleQuantite);
                }
              
              
                break;
            }
        }
    }
    
}   
    