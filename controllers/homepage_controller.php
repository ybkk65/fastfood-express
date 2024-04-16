<?php 

require './views/homepage.php'; 

$query = "SELECT * FROM categories";
$response = $bdd->query($query);
$datas = $response->fetchAll();

echo '<section id ="card-container">';
foreach ($datas as $data) {



echo '<div class="cardCategorie">';
echo '<img class="imgcard" src="' . $data['image'] . '" alt="' . $data['name'] . '">';
echo '<h2 class="titre_categorie">' . $data['name'] . '</h2>';
echo '<p class="texte_categorie">' . $data['description'] . '</p>';
echo '<a class = "lien_categorie" href="?page=product&category_id=' . $data['id'] . '" >Tous les produits</a>';
echo '</div> ';

}
echo'</section> '; 

if(isset($_GET['category_id'])) {
    $_SESSION['category_id'] = $_GET['category_id'];
    
} 


