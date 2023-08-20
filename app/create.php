<?php

if (isset($_POST['username'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];


    $errors = [];

    if (empty($username) || strlen($username) < 4 || strlen($username) > 20) {
        $errors[] = 'The username must be between 4 and 20 characters long.';
    }

    if (empty($password) || strlen($password) < 6) {
        $errors[] = 'The password must be at least 6 characters long.';
    }


    if (empty($errors)) {
        if (userExists('username', $username)) {
            $_SESSION['alert'] = 'The username already exists !';
            $_SESSION['alert-color'] = 'danger';
            header('Location: index.php?page=page/create');
            die();
        }
    }


    $connect = connect();

    $countQuery = $connect->prepare("SELECT COUNT(*) FROM user");
    $countQuery->execute();
    $userCount = $countQuery->fetchColumn();

    $isAdmin = ($userCount == 0) ? 1 : null;


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $insert = $connect->prepare("INSERT INTO user (username, password, admin) VALUES (?, ?, ?)");
    $insert->execute([$username, $hashedPassword, $isAdmin]);


    if (!empty($errors)) {
        $_SESSION['alert'] = implode('<br>', $errors);
        $url = 'index.php?page=page/create';
        header('Location: ' . $url);
        die();
    }

    $_SESSION['alert'] = 'User ' . $username . ' has been successfully created.';
    $_SESSION['alert-color'] = 'success';
    $url = 'index.php?page=page/profil';
    header('Location: ' . $url);
    die();
} else {
    $_SESSION['alert'] = 'User creation error.';
    $url = 'index.php?page=page/create';
    header('Location: ' . $url);
    die();


}