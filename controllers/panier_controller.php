<?php

require_once './classes/Produit.php';
require_once './classes/Panier.php';

use projetfullstack1\classes\Produit;
use projetfullstack1\classes\Panier;

require './views/panier.php';

if (!isset($_SESSION['panier'])) {
    echo '<h2> Panier vide </h2>';
} else {
    $panier = unserialize($_SESSION['panier']);

    echo "<h2>Contenu du Panier</h2>";
    echo "<div id='panierContainer'>"; // Début du conteneur du panier
    echo "<table border='1'>";
    echo "<tr>
            <th>Images</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Quantité</th>
        </tr>";
    
        foreach ($panier->getProduits() as $produit) {
            echo "<tr id='" . $produit->getId() . "'>";
            echo "<td><img class='panierimg' src='" . $produit->getImageUrl() . "' alt='image' ></td>";
            echo "<td>" . $produit->getNom() . "</td>";
            echo "<td id='prix_" . $produit->getId() . "'>" . $produit->getPrix() . "</td>";
            echo "<td id='quantite_" . $produit->getId() . "'>" . $produit->getQuantite() . "</td>";
            echo "<td><button onclick='updateProduit(" . $produit->getId() . ", 1 )'>+</button></td>";
            echo "<td><button onclick='updateProduit(" . $produit->getId() . ", -1 )'>-</button></td>";
            echo "<td><button onclick='supprimerDuPanier(" . $produit->getId() . ")'>Poubelle</button></td>";
            echo "</tr>";
        }
        echo '</table>';
      
        echo "</div>"; 
    

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action']) && $_POST['action'] === 'Vider_panier') { 
        unset($_SESSION['panier']);
        header("Location: ?page=homepage");
        exit();
    }
}
?>

<?php if (isset($_SESSION['panier'])) { ?>
    <form class="formValider" method="post" action="">
        <input type="hidden" name="action" value="Vider_panier"/>
        <button class='valider' type="submit">Vider le panier</button>
    </form> 
<?php } ?>
