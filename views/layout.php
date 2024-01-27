<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssFichiers/index.css">
    <link rel="stylesheet" href="cssFichiers/admin.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <?php
           $admin = isset($_SESSION['admin']) ? $_SESSION['admin'] : false;
           $usere = isset($_SESSION['usere']) ? $_SESSION['usere'] : false;

            ?><div><a href="<?php
            $adminClass = ($admin === true) ? 'logoa' : 'logo';
            ?><div class="container">
                    <a href="<?php echo (($admin === true) ? 'index.php?page=admin' : 'index.php?page=homepage'); ?>">
                        <img class="<?php echo $adminClass; ?>" src="images/BILLBURGER-9.svg" alt="logo">
                    </a>
                  </div>
            <div class="choix"><?php

            if ($usere === true) {
                ?><div class="nav-container">
                    <ul class="nav-items">
                        <li class="nav-item nav-item-dropdown">
                            <a class="dropdown-trigger" href="#">Settings</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-menu-item">
                                    <a href="#">Dropdown Item 1</a>
                                </li>
                                <li class="dropdown-menu-item">
                                    <a href="#">Dropdown Item 2</a>
                                </li>
                                <li class="dropdown-menu-item">
                                    <a href="#">Dropdown Item 3</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div><?php

                if ($admin === false) {
                    ?><i  class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i><?php
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
    <?php require './controllers/' . $route . '_controller.php'; ?>
</body>

</html>
