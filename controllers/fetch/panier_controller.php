<?php

require_once '../../connexion.php';
require_once '../../classes/Produit.php';
require_once '../../classes/Panier.php';

use projetfullstack1\classes\Produit;
use projetfullstack1\classes\Panier;

$response = array();

if (!isset($_SESSION['panier'])) {
    $panier = new Panier();
} else {
    $panier = unserialize($_SESSION['panier']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['method']) && $data['method'] === 'supprimer') {
        $productId = intval($data['productId']);
        $panier->supprimerProduit($productId);
        $_SESSION['panier'] = serialize($panier);
       
        $response = array(
            'panier' => $panier->nombreProduits()
        );
    } else if (isset($data['method']) && $data['method'] === 'ajouter') {
        $productId = intval($data['productId']);

        $query = "SELECT * FROM products WHERE id = $productId";
        $result = $bdd->query($query); 
        $data = $result->fetch();

        if ($data) {
            $name = $data['name'];
            $price = $data['price'];
            $image_url = $data['image_url'];
            $quantite = 1;

            $produit = new Produit($productId, $name, $price, $image_url, $quantite);
            $panier->ajouterProduit($produit);
            $response = array(
                'panier' => $panier->nombreProduits()
            );
        }
    } else if (isset($data['method']) && $data['method'] === 'modifier') {
        $productId = intval($data['productId']);
        $signe =  $data['signe'];

        foreach ($panier->getProduits() as $produit) {
            if ($produit->getId() === $productId) {
                $panier->updateProduit($productId , (int)$signe, 50);
                $qte = $produit->getQuantite();
                $price = $produit->getPrix();
                $_SESSION['panier'] = serialize($panier);
            }
        }
        $response = array(
            'panier' => $panier->nombreProduits(),
            'qte' => $qte,
            'price' => $price
        );
    }

    $_SESSION['nombre'] = $response['panier'];
} 

$_SESSION['panier'] = serialize($panier);

header('Content-Type: application/json');
echo json_encode($response);
?>
