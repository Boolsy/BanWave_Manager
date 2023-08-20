<?php

include_once 'check.php';

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $login = trim($_POST['username']);

    $user = getUser('username', $_POST['username']);


    if ($user) {
        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['id'] = $user->id;

            if ($user->admin == 1) {
                $_SESSION['admin'] = 'Oui';
            } else {
                $_SESSION['admin'] = 'Non';
            }


            $_SESSION['alert'] = 'Welcome ' . $user->username . '!';
            $_SESSION['alert-color'] = 'success';
            $url = 'index.php?page=page/profil';
        } else {
            $_SESSION['alert'] = 'Wrong password';
            $url = 'index.php?page=page/login';
        }
    } else {
        $_SESSION['alert'] = 'Unregistered user';
        $url = 'index.php?page=page/login';
    }


    header('Location: ' . $url);
    die;
} else {
    $_SESSION['alert'] = 'Please fill in all fields';
    header('Location: index.php?page=page/login');
    die;
}