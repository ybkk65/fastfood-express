<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
</head>
<body>
    <section class='tableau'>
    <h1>Liste des Produits</h1>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Action</th>
        </tr>
        <?php foreach ($datas as $data): ?>
        <tr>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['description']; ?></td>
            <td><?php echo $data['price']; ?></td>
            <td>
                <a href="?=<?php echo $data['id']; ?>">Supprimer</a>
                <!-- Lien pour modifier un produit -->
                <a href="?id=<?php echo $data['id']; ?>">Modifier</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </section>
</body>
</html>