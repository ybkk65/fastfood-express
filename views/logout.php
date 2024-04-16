<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
    <link rel="stylesheet" href="cssFichier/logout.css">
</head>

<body>
    <section class="logout">
        <div class="confirmation">Vous êtes sur le point de vous déconnecter. Voulez-vous continuer ?</div>
        <div id="buttons">
            <form action="" method="post">
                <input class='logoutbutt' type="submit" name="confirm" value="Confirmer">
            </form>

            <?php
                $admin = isset($_SESSION['admin']) ? $_SESSION['admin'] : false;
                $usere = isset($_SESSION['usere']) ? $_SESSION['usere'] : false;
                
                if($admin){
                    echo "<a href='?page=admin'><button class='logoutbutt'>Annuler</button></a>";
                } else {
                    echo "<a href='?page=homepage'><button class='logoutbutt'>Annuler</button></a>";
                }
            ?>
        </div>
    </section>
</body>
</html>
