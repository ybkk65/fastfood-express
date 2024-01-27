<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssFichiers/index.css">
    <title>Ajouter un Ingrédient</title>
</head>
<body>
<section class='ingre'>
<h2>Formulaire d'Ajout d'Ingrédient</h2>

<form action="" method="post">
    <label for="nom">Nom de l'ingrédient:</label>
    <input type="text" name="nom" required><br>

    <label for="poids">Poids (en grammes):</label>
    <input type="number" name="poids" step="0.01" required><br>

    <label for="glucides">Glucides (en grammes):</label>
    <input type="number" name="glucides" step="0.01" required><br>

    <label for="lipides">Lipides (en grammes):</label>
    <input type="number" name="lipides" step="0.01" required><br>

    <label for="proteines">Protéines (en grammes):</label>
    <input type="number" name="proteines" step="0.01" required><br>

    <input type="submit" value="Ajouter l'ingrédient">
</form>

</section>
</body>
</html>
