<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssFichiers/admin.css">
    <title>Admin</title>
</head>
<body>

<section class='all'>

    <section class='panneau'>

        <div class="group">
            <svg viewBox="0 0 24 24" aria-hidden="true" class="icon">
                <g>
                    <path
                        d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"
                    ></path>
                </g>
            </svg>
            <input class="input" type="search" placeholder="Search" />
        </div>

        <section id='lien'>
            <div class='lien' >
                <a id='1'href='?page=categorie'  onclick=hauteur()>ajouter catégorie </a> <br>
            </div>
            <div class='lien' >
                <a id='2'href='?page=create_product' >Ajouter produits </a> <br>
            </div>
            <div class='lien' >
                <a id='2'href='?page=ingredients' >Ajouter ingredients  </a> <br>
            </div>
        </section>
    </section>

    

</section>
<script src="index.js"></script>
</body>
</html>
