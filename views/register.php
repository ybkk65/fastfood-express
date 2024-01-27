<h2>Inscription</h2>
    <form action="" method="post" value="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Nom d'utilisateur:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Adresse e-mail:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="S'inscrire">
    </form>