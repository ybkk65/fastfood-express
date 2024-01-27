<?php 
require './views/homepage.php'; 



echo '<section id = card-container>';
$query = "SELECT * FROM categories";
$response = $bdd->query($query);
$datas = $response->fetchAll();

foreach ($datas as $data) {
   

    echo '<div class="cardCategorie">';
echo '<img class="imgcard" src="' . $data['image'] . '" alt="' . $data['name'] . '">';
echo '<h2>' . $data['name'] . '</h2>';
echo '<p>' . $data['description'] . '</p>';
echo '<a href="?page=product&category_id=' . $data['id'] . '" class="">Tous les produits</a>';
echo '</div>';

}
echo'</section>'; 

if(isset($_GET['category_id'])) {
    $_SESSION['category_id'] = $_GET['category_id'];
    
}