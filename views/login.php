

<section class='logbody'>
    <a href="index.php?page=homepage"><h3>retour</h3></a>
    <main>
        <form class='formlog' action="" method="post" >
            <h2>Connexion</h2>
            <input type="hidden" name="token" id="token" value="<?= $_SESSION['token'] ?>">
            <div class='inter'>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" required><br>
            <label for="password">Mot de passe:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input  class='valid'type="submit" value="Se connecter">
            <a class='sinsc' href="index.php?page=register"><h3>s'inscrire</h3></a>
            </div>
        </form>
    </main>
</section>
