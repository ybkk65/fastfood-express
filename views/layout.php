<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssFichiers/index.css">
    <link rel="stylesheet" href="cssFichiers/admin.css">
    <link rel="stylesheet" href="cssFichiers/homepage.css">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <header>
        <nav class='barnav'>
            <?php
           $admin = isset($_SESSION['admin']) ? $_SESSION['admin'] : false;
           $usere = isset($_SESSION['usere']) ? $_SESSION['usere'] : false;

            ?><div><a href="<?php
            $adminClass = ($admin === true) ? 'logoa' : 'logo';
            ?><div class="container">
                    <a href="<?php echo (($admin === true) ? 'index.php?page=admin' : 'index.php?page=homepage'); ?>">
                        <img class="<?php echo $adminClass; ?>" src="images/logo.png" alt="logo">
                    </a>
                  </div>
            <div class="choix"><?php

            if ($usere === true) {
                ?><a class='commande' href="?page=commande">commande</a><?php

                if ($admin === false) {
                    if(isset($_SESSION['nombre'])){
                    $nombreProduit =  $_SESSION['nombre'];
                    echo "<a class='paniernombre' href='?page=panier'><i class='fa-solid fa-cart-shopping' style='color: #ffffff;'></i>".$nombreProduit. "</a>";
                    }else{
                        echo "<a class='paniernombre' href='?page=panier'><i class='fa-solid fa-cart-shopping' style='color: #ffffff;'></i></a>";
                        
                    }
                }
                
            } 

            if ($usere === false && $admin === false) {
             
                ?><div><a href='index.php?page=login'><i id='login' class='fa-regular fa-user'></i></a></div><?php
            } elseif ($usere === true or $admin === true) {
                ?><div><a href='index.php?page=logout'><i id='logout' class='fa-solid fa-right-to-bracket'></i></a></div><?php
            }
            ?></div>
        </nav>
    </header>
    <script src="./index.js" ></script>
    <?php require './controllers/' . $route . '_controller.php'; ?>
</body>

</html>

