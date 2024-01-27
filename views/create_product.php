<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Burger or Pizza</title>
    <link rel="stylesheet" href="cssFichiers/index.css">
</head>
<body>

<form id="foodForm" action="" method="post" enctype="multipart/form-data">
    <label for="foodCategory">Choisir la Catégorie:</label>
    <select id="foodCategory" name="foodCategory" onchange="toggleIngredientsForm()">
        <?php foreach ($categories as $numacategorie) { ?>
            <option value="<?= $numacategorie['name']; ?>"><?=$numacategorie['name']; ?></option>
        <?php } ?>
    </select> <br>

    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" required><br>

    <label for="foodDescription"> Description:</label>
    <textarea id="foodDescription" name="foodDescription" required></textarea><br>

    <label for="image"> Image:</label>
    <input type="file" id="image" name="image" accept="image/*" required><br>

    <div id="burgerIngredients" >
        <h2>Ingredients:</h2><br>
        
        <?php 
        foreach ($ingredients as $reponse) {
            $ingredient = $reponse['name']; 
        ?>
            <label for="<?= $ingredient?>"><?= $ingredient ?> Quantité:</label>
            <input type="number" id="<?= $reponse['id'] ?>" name="quantity[<?= $reponse['id'] ?>]" min="0" value="0"><br>
        <?php 
        } 
        ?>
        

<label for="totalPrice">Total Price (€):</label>
    <input type="number" id="totalPrice" name="totalPrice" min="0" value="0.00" ><br>

    <input type="submit" value="Ajouter">

    </div>




<div id="pizzaIngredients" style="display: none;">

    <h2>Ingredients:</h2><br>
       
    <?php 
        foreach ($ingredients as $reponse) {
            $ingredient = $reponse['name']; 
        ?>
            <label for="<?= $ingredient?>"><?= $ingredient ?> Quantité:</label>
            <input type="number" id="<?= $reponse['id'] ?>" name="quantity[<?= $reponse['id'] ?>]" min="0" value="0"><br>
        <?php 
        } 
        ?>
        

<label for="totalPrice">Total Price (€):</label>
    <input type="number" id="totalPrice" name="totalPrice" min="0" value="0.00" ><br>

    <input type="submit" value="Ajouter">
</div>
</form>
<script src="index.js"></script>

</body>
</html>
 