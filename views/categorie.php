

<head>
<link rel="stylesheet" href="cssFichiers/admin.css">
<link rel="stylesheet" href="cssFichiers/index.css">
</head>


<section id="interior">
<div class='categorie'>   


<h2>Nouvelle Categories </h2>

<form action="" method="post" enctype="multipart/form-data">

    
    <label for="name">Nom :</label>
    <input type="text" name="name" required><br>

    <label for="description">Description :</label>
    <textarea name="description" rows="4" required></textarea><br>

    <label for="image">Photo :</label>
    <input type="file" name="image" accept="image/*" required><br>

    <input type="submit" value="Ajouter">
</form>

</div>
</section>
