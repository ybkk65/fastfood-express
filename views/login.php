<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>


<a href="index.php?page=homepage"><h3>retour</h3></a>
   <main>
    <form action="" method="post">
        <h2>Connexion</h2>
        <input type="hidden" name="token" id="token" value="<?= $_SESSION['token'] ?>">


        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" required><br>
        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Se connecter">
    </form>
   </main>
</body>
</html>


<a href="index.php?page=register"><h3>s'inscire</h3></a>