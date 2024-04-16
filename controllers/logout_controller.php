<?php





if ($_SERVER["REQUEST_METHOD"] === "POST") {


        if (isset($_POST['confirm'])) {
            // Effacer toutes les données de session et détruire la session
            session_unset();
            session_destroy();

            // Rediriger l'utilisateur vers la page d'accueil
            header("Location: ?page=homepage");
            exit();
        }
    }

require './views/logout.php';