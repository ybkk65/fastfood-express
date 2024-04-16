
<body>
<section class='tableau'>
    <h1>Liste des Produits</h1>

    <table border="1">
        <tr>
            <th>Nom</th>
            <th>poids</th>
            <th>glucides</th>
            <th>lipides</th>
            <th>proteines</th>
        </tr>
        <?php foreach ($datas as $data): ?>
        <tr>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['poids']; ?></td>
            <td><?php echo $data['glucides']; ?></td>
            <td><?php echo $data['lipides']; ?></td>
            <td><?php echo $data['proteines']; ?></td>
            <td>
                <a href="?delete_id=<?php echo $data['id']; ?>">Supprimer</a>
               
                <a href="modifier_produit.php?id=<?php echo $data['id']; ?>">Modifier</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</section>
</body>
