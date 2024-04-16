<?php 

namespace projetfullstack1\classes;

class Produit {


    public function __construct( public int $id , public string $nom, public int $prix, public string $image_url , public int $quantite) {
    
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getPrix(): int {
        return $this->prix;
    }

    public function getImageUrl(): string {
        return $this->image_url;
    }

    public function getQuantite(): int {
        return $this->quantite ;
    }


    public function getId(): int {
        return $this->id;
    }
    public function setQuantite(int $nouvelleQuantite): void {
        $this->quantite = $nouvelleQuantite;
    } 

    public function setPrix(int $nouveauxPrix): void {
        $this->prix = $nouveauxPrix;
    }

}

