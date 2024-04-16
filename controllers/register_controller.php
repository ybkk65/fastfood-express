<?php 

if (!isset($_POST['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'], $_POST['email'], $_POST['password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

  
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

   
    try {
        $query = "INSERT INTO login (name, email, password) VALUES (:name, :email, :password)";
        $response = $bdd->prepare($query);
        $response->execute(['name' => $name, 'email' => $email, 'password' => $hashedPassword]);

       
        header('Location:index.php?page=login');
        exit();
    } catch (PDOException $e) {
        $error = "Erreur : " . $e->getMessage();
    }
}


require './views/register.php';