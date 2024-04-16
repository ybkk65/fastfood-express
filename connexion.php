<?php 

session_start();

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    if (isset($_SESSION['token'])) {
        unset($_SESSION['token']);
    }
}


try
{
    $bdd = new PDO('mysql:host=localhost;dbname=fastfood;charset=utf8', 'youness', '0000');
  
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
