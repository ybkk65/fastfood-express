


<?php

require './views/logout.php';


    if (isset($_POST['confirm'])) {
  
       session_unset();
        session_destroy();

       
        header("Location: ?page=homepage");
        exit();
    }
    ?>

