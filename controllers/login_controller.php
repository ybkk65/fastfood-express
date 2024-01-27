<?php

$redir = false;
$error = [];
$admin = false ;
$usere = false ;
function validationEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if (!isset($_POST['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (isset($_SESSION['token'])) {
            unset($_SESSION['token']);
        }

        if (!empty($email) && !empty($password) && validationEmail($email) && strlen($password) >= 8) {

            try {
                $query = "SELECT password, email, is_admin, id FROM login WHERE email =:email";
                $response = $bdd->prepare($query);
                $response->execute(['email' => $_POST['email']]);
                $user = $response->fetch();

                if ($user) {
                    if (password_verify($password, $user['password'])) {

                        $_SESSION['user'] = [
                            'id' => $user['id'],
                            'email' => $user['email'],
                            'password' => $user['password'],
                            'is_admin' => $user['is_admin']
                        ];

                        if ($user['is_admin'] == 1) {
                            $redir = true;
                        }
                        else{
                            $usere = true;
                            $_SESSION['usere'] = $usere;

                            header('Location: index.php?page=user');
                            exit();
                        }
                    } else {
                        $error = "Le mot de passe est incorrect.";
                    }
                } else {
                    $error = "L'email n'est pas enregistré.";
                }
            } catch (PDOException $e) {
                $error = "Erreur : " . $e->getMessage();
            }
        } else {
            $error = "L'email n'est pas valide ou le mot de passe doit contenir au moins 8 caractères.";
        }
    }

    if ($redir === true) {
        $admin=true;
        $_SESSION['admin']= $admin;
        header('Location: index.php?page=admin');
        exit();
    }
} 

if (isset($error)) {
    $_SESSION['errors'] = $error;
}
require './views/login.php';

