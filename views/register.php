
<section class='regist'>

<h2>Inscription</h2>
    <form action="" method="post" value="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="hidden" name="token" id="token" value="<?= $_SESSION['token'] ?>">
    <div class='inter'>
        <label for="name">name</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="email">email</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="password">password</label><br>
        <input type="password" id="password" name="password" required><br>

        <input class='valid' type="submit" value="S'inscrire">
        </div>
    </form> 

    </section>